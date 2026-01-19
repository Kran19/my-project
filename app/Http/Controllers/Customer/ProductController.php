<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\Customer\ProductService;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Product listing page
     */
    public function listing(Request $request)
    {
        try {
            $perPage = $request->get('per_page', 12);
            $page = $request->get('page', 1);

            $filters = [
                'search' => $request->get('search', ''),
                'sort_by' => $request->get('sort_by', 'newest'),
                'min_price' => $request->get('min_price'),
                'max_price' => $request->get('max_price'),
                'category_id' => $request->get('category_id'),
                'brand_id' => $request->get('brand_id'),
                'attribute' => $request->get('attribute'),
                'attribute_value' => $request->get('attribute_value'),
                'specification' => $request->get('specification'),
                'specification_value' => $request->get('specification_value'),
                'in_stock' => $request->get('in_stock'),
                'is_featured' => $request->get('is_featured'),
                'is_new' => $request->get('is_new'),
                'is_bestseller' => $request->get('is_bestseller'),
            ];

            $products = $this->productService->getProducts($filters, $perPage, $page);
            $allFilters = $this->productService->getAllFilters();

            return view('customer.products.listing', [
                'products' => $products->items(),
                'paginator' => [
                    'current_page' => $products->currentPage(),
                    'per_page' => $products->perPage(),
                    'total' => $products->total(),
                    'last_page' => $products->lastPage(),
                    'from' => $products->firstItem(),
                    'to' => $products->lastItem(),
                ],
                'filters' => $allFilters,
                'sortBy' => $filters['sort_by'],
                'search' => $filters['search'],
                'minPrice' => $filters['min_price'],
                'maxPrice' => $filters['max_price'],
                'categoryId' => $filters['category_id'],
                'brandId' => $filters['brand_id'],
                'inStock' => $filters['in_stock'],
                'isFeatured' => $filters['is_featured'],
                'isNew' => $filters['is_new'],
                'isBestseller' => $filters['is_bestseller'],
                'title' => 'All Products - APIQO Fashion Jewelry',
            ]);

        } catch (\Exception $e) {
            Log::error('Product listing error: ' . $e->getMessage());
            return view('customer.products.listing', [
                'products' => [],
                'paginator' => [],
                'filters' => $this->productService->getAllFilters(),
                'error' => 'Failed to load products. Please try again.',
                'title' => 'Products - Error',
            ]);
        }
    }

    /**
     * Category products page
     */
    public function category($slug, Request $request)
    {
        try {
            $category = $this->productService->getCategoryBySlug($slug);

            // if (!$category) {
            //     return redirect()->route('customer.products.list')
            //         ->with('error', 'Category not found.');
            // }

            $perPage = $request->get('per_page', 12);
            $page = $request->get('page', 1);

            $filters = [
                'category_id' => $category->id,
                'sort_by' => $request->get('sort_by', 'newest'),
                'min_price' => $request->get('min_price'),
                'max_price' => $request->get('max_price'),
                'brand_id' => $request->get('brand_id'),
                'attribute' => $request->get('attribute'),
                'attribute_value' => $request->get('attribute_value'),
                'specification' => $request->get('specification'),
                'specification_value' => $request->get('specification_value'),
                'in_stock' => $request->get('in_stock'),
            ];

            $products = $this->productService->getProducts($filters, $perPage, $page);
            $categoryFilters = $this->productService->getCategoryFilters($category->id);
            $childCategories = $this->productService->getChildCategories($category->id);
            $relatedCategories = $this->productService->getRelatedCategories($category->id);

            return view('customer.products.category', [
                'category' => $category,
                'products' => $products->items(),
                'paginator' => [
                    'current_page' => $products->currentPage(),
                    'per_page' => $products->perPage(),
                    'total' => $products->total(),
                    'last_page' => $products->lastPage(),
                    'from' => $products->firstItem(),
                    'to' => $products->lastItem(),
                ],
                'filters' => $categoryFilters,
                'childCategories' => $childCategories,
                'relatedCategories' => $relatedCategories,
                'sortBy' => $filters['sort_by'],
                'minPrice' => $filters['min_price'],
                'maxPrice' => $filters['max_price'],
                'brandId' => $filters['brand_id'],
                'inStock' => $filters['in_stock'],
                'title' => $category->name . ' - APIQO Fashion Jewelry',
                'meta_description' => $category->description,
            ]);

        } catch (\Exception $e) {
            Log::error('Category page error: ' . $e->getMessage());
            return redirect()->route('customer.products.list')
                ->with('error', 'Failed to load category. Please try again.');
        }
    }

    /**
     * Product details page
     */
    public function details($slug)
    {
        try {
            $product = $this->productService->getProductBySlug($slug);

            if (!$product) {
                return redirect()->route('customer.products.list')
                    ->with('error', 'Product not found.');
            }

            $relatedProducts = $this->productService->getRelatedProducts($product['id'], 4);
            
            // Fetch reviews
            $reviews = \App\Models\Review::where('product_id', $product['id'])
                        ->where('status', true)
                        ->latest()
                        ->get();

            return view('customer.products.details', [
                'product' => $product,
                'relatedProducts' => $relatedProducts,
                'reviews' => $reviews,
                'title' => $product['name'] . ' - APIQO Fashion Jewelry',
                'meta_title' => $product['meta_title'] ?? $product['name'],
                'meta_description' => $product['meta_description'] ?? $product['short_description'],
                'meta_keywords' => $product['meta_keywords'] ?? null,
            ]);

        } catch (\Exception $e) {
            Log::error('Product details error: ' . $e->getMessage());
            return redirect()->route('customer.products.list')
                ->with('error', 'Product not found.');
        }
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        try {
            $searchQuery = $request->get('q', '');

            if (empty($searchQuery)) {
                return redirect()->route('customer.products.list');
            }

            $perPage = $request->get('per_page', 12);
            $page = $request->get('page', 1);

            $filters = [
                'sort_by' => $request->get('sort_by', 'newest'),
                'min_price' => $request->get('min_price'),
                'max_price' => $request->get('max_price'),
                'category_id' => $request->get('category_id'),
                'brand_id' => $request->get('brand_id'),
                'in_stock' => $request->get('in_stock'),
                'is_featured' => $request->get('is_featured'),
                'is_new' => $request->get('is_new'),
                'is_bestseller' => $request->get('is_bestseller'),
            ];

            $products = $this->productService->searchProducts($searchQuery, $filters, $perPage, $page);
            $allFilters = $this->productService->getAllFilters();

            return view('customer.products.search', [
                'searchQuery' => $searchQuery,
                'products' => $products->items(),
                'paginator' => [
                    'current_page' => $products->currentPage(),
                    'per_page' => $products->perPage(),
                    'total' => $products->total(),
                    'last_page' => $products->lastPage(),
                    'from' => $products->firstItem(),
                    'to' => $products->lastItem(),
                ],
                'filters' => $allFilters,
                'sortBy' => $filters['sort_by'],
                'minPrice' => $filters['min_price'],
                'maxPrice' => $filters['max_price'],
                'categoryId' => $filters['category_id'],
                'brandId' => $filters['brand_id'],
                'inStock' => $filters['in_stock'],
                'title' => 'Search: ' . $searchQuery . ' - APIQO Fashion Jewelry',
                'meta_description' => 'Search results for ' . $searchQuery . ' in APIQO Fashion Jewelry',
            ]);

        } catch (\Exception $e) {
            Log::error('Search error: ' . $e->getMessage());
            return view('customer.products.search', [
                'searchQuery' => $request->get('q', ''),
                'products' => [],
                'paginator' => [],
                'filters' => $this->productService->getAllFilters(),
                'error' => 'Search failed. Please try again.',
                'title' => 'Search Error',
            ]);
        }
    }

    /**
     * Quick view product
     */
    public function quickView($slug)
    {
        try {
            $product = $this->productService->getProductBySlug($slug);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $product,
                'html' => view('customer.products.partials.quick-view', ['product' => $product])->render()
            ]);

        } catch (\Exception $e) {
            Log::error('Quick view error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }
    }
}
