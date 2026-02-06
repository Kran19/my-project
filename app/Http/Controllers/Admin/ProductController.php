<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\TaxClass;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $query = Product::with(['mainCategory', 'brand', 'defaultVariant.images', 'taxClass']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('product_code', 'like', "%{$search}%")
                  ->orWhereHas('defaultVariant', function($v) use ($search) {
                      $v->where('sku', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type')) {
            $query->where('product_type', $request->type);
        }

        $products = $query->latest()->paginate(10)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $brands = Brand::where('status', 1)->get();
        $taxClasses = TaxClass::all();
        $tags = Tag::all();

        return view('admin.products.create', compact('categories', 'brands', 'taxClasses', 'tags'));
    }

    public function store(Request $request)
    {
        // Basic Validation needed before hitting Service, mostly for UX feedback 
        // Service handles deep validation usually, but good to catch obvious ones here.
        $request->validate([
            'name' => 'required|string|max:255',
            'main_category_id' => 'required|exists:categories,id',
            'product_type' => 'required|in:simple,configurable',
            'price' => 'required_if:product_type,simple|nullable|numeric|min:0',
        ]);

        if ($request->input('product_type') === 'configurable' && empty($request->input('variants'))) {
            return back()->withInput()->with('error', 'Configurable products must have at least one variant generated. Please select attributes and generate variants.');
        }

        $result = $this->productService->createProduct($request->all());

        if ($result['success']) {
            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        }

        return back()->withInput()->with('error', $result['error']);
    }

    public function edit($id)
    {
        // Eager load everything needed for the view, mirroring Service logic but as Eloquent model
        $product = Product::with([
            'tags', 
            'categories', 
            'defaultVariant.images', // For simple product data
            'brand',
            'mainCategory',
            'variants.images',
            'variants.primaryImage.media',
            'specifications' => function($q) {
                $q->with('values'); 
            }
        ])->findOrFail($id);
        
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $brands = Brand::where('status', 1)->get();
        $taxClasses = TaxClass::all();
        $tags = Tag::all();
        
        $attributes = [];
        if ($product->product_type === 'configurable' && $product->main_category_id) {
             try {
                $attributes = $this->productService->getCategoryAttributes($product->main_category_id);
             } catch (\Exception $e) {
                 // Log error but continue
                 \Log::error('Failed to preload attributes for edit: ' . $e->getMessage());
             }
        }
        
        return view('admin.products.edit', compact('product', 'categories', 'brands', 'taxClasses', 'tags', 'attributes'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        // Prevent changing immutable fields logic if needed here, 
        // but User requested "cannot be updated", usually handled by 'disabled' inputs in view.
        // If inputs are disabled, they won't be in $request->all(), so Service might need to be careful?
        // Service `updateProduct` does: 'product_type' => $data['product_type'],
        // If it's missing from request, it will error or set null.
        // We might need to merge existing values for disabled fields if Service relies on them.
        
        $data = $request->all();
        if (!isset($data['product_type'])) {
            $data['product_type'] = $product->product_type;
        }
        
        // Prevent Configurable -> Simple
        if ($product->product_type === 'configurable' && $data['product_type'] === 'simple') {
             return back()->withInput()->with('error', 'Cannot change Configurable product to Simple.');
        }

        if (!isset($data['main_category_id'])) {
             // If disabled, we should probably keep existing.
             // But category MIGHT be editable? User said "on edit category , product type cannot be update".
             // So we keep existing.
             $data['main_category_id'] = $product->main_category_id;
        }

        $result = $this->productService->updateProduct($product, $data);

        if ($result['success']) {
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        }

        return back()->withInput()->with('error', $result['error']);
    }

    public function destroy(Product $product)
    {
        if ($product->orderItems()->exists()) {
             return back()->with('error', 'Cannot delete product. It has associated orders.');
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    // AJAX Endpoints used by Blade Views (axios)
    
    public function getCategorySpecifications($categoryId)
    {
        try {
            $specs = $this->productService->getCategorySpecifications($categoryId);
            return response()->json([
                'success' => true,
                'data' => $specs
            ]);
        } catch (\Exception $e) {
             return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getCategoryAttributes($categoryId)
    {
        try {
            $attrs = $this->productService->getCategoryAttributes($categoryId);
            return response()->json([
                'success' => true,
                'data' => $attrs
            ]);
        } catch (\Exception $e) {
             return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function attributes()
    {
        return view('admin.products.attributes');
    }

    public function specifications()
    {
        return view('admin.products.specifications');
    }

    public function tags()
    {
        return view('admin.products.tags');
    }

    public function search(Request $request)
    {
        $query = Product::with(['defaultVariant.images', 'variants.images']);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('product_code', 'like', "%{$search}%")
                  ->orWhereHas('variants', function($qv) use ($search) {
                        $qv->where('sku', 'like', "%{$search}%");
                  });
            });
        }
        
        // Optional: Filter active products if needed, but user might want to see drafts in admin.
        // $query->where('status', '!=', 'archived'); 

        $products = $query->latest()->limit(20)->get();

        return response()->json([
            'success' => true,
            'data' => $products->map(function ($product) {
                // Determine image: try default variant, then first variant, then placeholder
                $imagePath = null;
                
                // 1. Try Main Image Accessor (usually default variant's primary image)
                try {
                     if ($product->main_image) {
                         $imagePath = $product->main_image;
                     }
                } catch (\Exception $e) {
                    // ignore accessor errors
                }

                // 2. Fallback: Try to find any variant with an image if main_image failed
                if (!$imagePath) {
                    $firstVariantWithImage = $product->variants->first(function($variant) {
                        return $variant->images->isNotEmpty();
                    });
                    
                    if ($firstVariantWithImage) {
                         $imagePath = $firstVariantWithImage->images->first()->file_path;
                    }
                }
                
                // 3. Construct URL
                $imageUrl = asset('assets/img/placeholder.png');
                if ($imagePath) {
                     // Check if path is absolute or needs storage prefix
                     if (str_starts_with($imagePath, 'http')) {
                         $imageUrl = $imagePath;
                     } else {
                         $imageUrl = asset('storage/' . $imagePath);
                     }
                }

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $imageUrl,
                ];
            })
        ]);
    }

    public function getPresetProducts(Request $request)
    {
        $type = $request->type; // 'featured' or 'bestseller'
        $query = Product::with(['defaultVariant.images', 'variants.images'])->where('status', 'active'); // 'active' enum matches migration

        if ($type === 'featured') {
            $query->where('is_featured', 1);
        } elseif ($type === 'bestseller') {
            $query->where('is_bestseller', 1);
        } elseif ($type === 'new_arrival') {
            $query->where('is_new', 1);
        } elseif ($type === 'on_sale') {
             $query->where('discount', '>', 0);
        }

        $products = $query->latest()->limit(50)->get();

        return response()->json([
            'success' => true,
            'data' => $products->map(function ($product) {
                // Determine image
                $imagePath = null;
                
                try {
                     if ($product->main_image) {
                         $imagePath = $product->main_image;
                     }
                } catch (\Exception $e) {}

                if (!$imagePath) {
                    $firstVariantWithImage = $product->variants->first(function($variant) {
                         return $variant->images->isNotEmpty();
                    });
                    
                    if ($firstVariantWithImage) {
                         $imagePath = $firstVariantWithImage->images->first()->file_path;
                    }
                }

                $imageUrl = asset('assets/img/placeholder.png');
                if ($imagePath) {
                     if (str_starts_with($imagePath, 'http')) {
                         $imageUrl = $imagePath;
                     } else {
                         $imageUrl = asset('storage/' . $imagePath);
                     }
                }

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $imageUrl,
                ];
            })
        ]);
    }
}
