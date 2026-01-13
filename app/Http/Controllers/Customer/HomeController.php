<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Services\Customer\ProductService;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        try {

            /* ------------------------------
             | CATEGORIES (Top 6)
             |------------------------------*/
            $categories = Category::with('image')
                ->where('status', 1)
                ->whereNull('parent_id')
                ->orderBy('sort_order')
                ->limit(6)
                ->get(['id', 'name', 'slug', 'description', 'image_id']);

            /* ------------------------------
             | CATEGORY PRODUCTS
             |------------------------------*/
            $categoryProducts = [];

            foreach ($categories as $category) {
                $products = $this->productService->getProducts(
                    [
                        'category_id' => $category->id,
                        'sort_by'     => 'featured',
                    ],
                    8,
                    1
                )->items();

                // ✅ Normalize data (VERY IMPORTANT)
                $categoryProducts[$category->id] = collect($products)
                    ->filter(fn ($p) => is_array($p) && isset($p['id']))
                    ->values()
                    ->toArray();
            }

            /* ------------------------------
             | FEATURED PRODUCTS
             |------------------------------*/
            $featuredProducts = collect(
                $this->productService->getProducts(
                    ['is_featured' => true, 'sort_by' => 'newest'],
                    8,
                    1
                )->items()
            )->filter(fn ($p) => is_array($p))->values()->toArray();

            /* ------------------------------
             | BESTSELLER PRODUCTS
             |------------------------------*/
            $bestsellerProducts = collect(
                $this->productService->getProducts(
                    ['is_bestseller' => true, 'sort_by' => 'popular'],
                    4,
                    1
                )->items()
            )->filter(fn ($p) => is_array($p))->values()->toArray();

            /* ------------------------------
             | NEW ARRIVALS
             |------------------------------*/
            $newProducts = collect(
                $this->productService->getProducts(
                    ['is_new' => true, 'sort_by' => 'newest'],
                    6,
                    1
                )->items()
            )->filter(fn ($p) => is_array($p))->values()->toArray();

            /* ------------------------------
             | TESTIMONIALS
             |------------------------------*/
            $testimonials = Testimonial::where('status', 1)
                ->orderBy('sort_order')
                ->limit(3)
                ->get();

            /* ------------------------------
             | STATS
             |------------------------------*/
            $stats = [
                'customer_count' => Customer::where('status', 1)->count(),
                'product_count'  => Product::where('status', 'active')->count(),
                'order_count'    => Order::where('status', 'delivered')->count(),
                'review_count'   => 98,
            ];

            /* ------------------------------
             | PROMO SLIDER
             |------------------------------*/
            $promoSlides = [
                [
                    'title' => 'Party Collection',
                    'highlight' => 'BUY 2 GET 1 FREE',
                    'subtitle' => 'Statement Jewelry',
                    'description' => 'Sparkle at every party with trendy imitation jewelry.',
                    'cta' => 'Shop Now',
                    'icon' => 'fas fa-glass-cheers',
                    'bg_color' => 'from-pink-100 via-purple-200 to-pink-300',
                    'text_color' => 'text-purple-800',
                    'image' => 'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=1200',
                    'badge' => 'PARTY',
                    'badge_color' => 'badge-party',
                ],
                [
                    'title' => 'Latest Fashion',
                    'highlight' => 'UP TO 50% OFF',
                    'subtitle' => 'Trending Designs',
                    'description' => 'Stay ahead with our latest fashion jewelry.',
                    'cta' => 'Explore',
                    'icon' => 'fas fa-gem',
                    'bg_color' => 'from-purple-100 via-pink-200 to-purple-300',
                    'text_color' => 'text-pink-800',
                    'image' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=1200',
                    'badge' => 'FASHION',
                    'badge_color' => 'badge-fashion',
                ],
            ];

            return view('customer.home.index', compact(
                'categories',
                'categoryProducts',
                'featuredProducts',
                'bestsellerProducts',
                'newProducts',
                'testimonials',
                'stats',
                'promoSlides'
            ));

        } catch (\Throwable $e) {

            Log::error('Home page error', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);

            return view('customer.home.index', [
                'categories' => collect(),
                'categoryProducts' => [],
                'featuredProducts' => [],
                'bestsellerProducts' => [],
                'newProducts' => [],
                'testimonials' => collect(),
                'stats' => [],
                'promoSlides' => [],
            ]);
        }
    }
}
