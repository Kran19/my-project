@extends('customer.layouts.master')

    @section('title', ($category->name ?? 'Products') . ' - APIQO Jewellery')

    @section('meta_description',
        $category->meta_description ??
        'Discover our exquisite collection of jewellery crafted
        with precision and passion.')

    @section('og_title', ($category->name ?? 'Collection') . ' - APIQO Jewellery')

    @section('og_description',
        $category->meta_description ??
        'Premium quality jewellery collection with genuine
        precious metals and gemstones.')

    @section('og_image', $category->featured_image ? asset($category->featured_image) :
        'https://images.unsplash.com/photo-1596703923538-b6d4bb0a44ea?w=400&h=500&fit=crop')


    @section('styles')
        <style>
            /* Animation Keyframes */
            @keyframes fade-in-up {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes bounce-in {
                0% {
                    transform: scale(0);
                }

                50% {
                    transform: scale(1.1);
                }

                100% {
                    transform: scale(1);
                }
            }

            @keyframes slide-up {
                from {
                    opacity: 0;
                    transform: translateY(50px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes scale-in {
                from {
                    opacity: 0;
                    transform: scale(0.9);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            @keyframes heart-beat {
                0% {
                    transform: scale(1);
                }

                14% {
                    transform: scale(1.3);
                }

                28% {
                    transform: scale(1);
                }

                42% {
                    transform: scale(1.3);
                }

                70% {
                    transform: scale(1);
                }
            }

            /* Animation Classes */
            .animate-fade-in-up {
                animation: fade-in-up 0.8s ease-out both;
            }

            .animate-bounce-in {
                animation: bounce-in 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) both;
            }

            .animate-slide-up {
                animation: slide-up 0.6s ease-out both;
            }

            .animate-scale-in {
                animation: scale-in 0.6s ease-out both;
            }

            .heart-beat {
                animation: heart-beat 1s ease-in-out;
            }

            /* Standardized Hero Banner */
            .category-hero-banner {
                width: 100%;
                position: relative;
                overflow: hidden;
                aspect-ratio: 1920 / 800;
                min-height: 600px;
                max-height: 800px;
            }

            /* When there IS a category image: keep the tall cinematic aspect ratio */
            .category-hero-banner.has-image {
                aspect-ratio: 1920 / 800;
                min-height: 600px;
                max-height: 800px;
            }

            /* When there is NO image: auto height, no forced aspect ratio */
            .category-hero-banner.no-image {
                aspect-ratio: unset;
                min-height: unset;
                max-height: unset;
                height: auto;
            }

            @media (max-width: 768px) {
                /* WITH image on mobile: shrink but keep cinematic crop */
                .category-hero-banner.has-image {
                    aspect-ratio: 16 / 9;
                    min-height: unset;
                    max-height: 70vh;
                }

                /* WITHOUT image on mobile: just let it be as tall as content needs */
                .category-hero-banner.no-image {
                    aspect-ratio: unset;
                    min-height: unset;
                    max-height: none;
                    height: auto;
                    padding-top: 7rem;   /* clear the sticky header */
                    padding-bottom: 2rem;
                }

                /* Shrink the big title on mobile so it doesn't overflow */
                .category-hero-banner.no-image .brand-title {
                    font-size: 2.25rem !important;
                    line-height: 1.2;
                }
            }

            /* Product hover effects */
            .product-card:hover img {
                transform: scale(1.1);
            }

            .product-card {
                transition: all 0.3s ease;
            }

            .product-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px rgba(139, 69, 19, 0.1);
            }

            /* Line clamp for product names */
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Custom transitions */
            .transition-transform {
                transition: transform 0.3s ease;
            }

            .hover\:scale-110:hover {
                transform: scale(1.1);
            }
        </style>
    @endsection

    @section('content')
        <!-- ============================================
            CATEGORY HERO SECTION
            ============================================ -->
        <section class="category-hero-banner {{ $category->image ? 'has-image' : 'no-image' }} {{ $category->image ? 'bg-gray-900 border-b border-gray-800' : 'bg-gradient-to-b from-amber-50 to-beige-100' }} flex items-center justify-center w-full overflow-hidden">
            @if($category->image)
                <!-- Category Image Background -->
                <div class="absolute inset-0 z-0">
                    <img src="{{ $category->image->url }}" alt="{{ $category->name }}" class="w-full h-full object-cover opacity-40">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
                </div>
            @else
                <!-- Original Background Elements -->
                <div class="absolute inset-0 pointer-events-none">
                    <div class="absolute top-0 left-0 w-96 h-96 bg-amber-200/20 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 right-0 w-80 h-80 bg-amber-300/10 rounded-full blur-3xl"></div>
                </div>
            @endif

            <div class="max-w-7xl mx-auto w-full px-4 relative z-10">
                @if(!$category->image)
                    <!-- Breadcrumb -->
                    <div class="mb-8">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('customer.home.index') }}"
                                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-amber-600 transition-colors">
                                        <i class="fas fa-home mr-2"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                        <a href="{{ route('customer.products.list') }}"
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2 transition-colors">
                                            Categories
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                            {{ $category->name ?? 'Category' }}
                                        </span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                @endif

                <!-- Hero Content -->
                <div class="text-center">
                    @if(!$category->image)
                        <div class="inline-flex items-center justify-center gap-3 mb-6 animate-fade-in-up">
                            <div class="w-16 h-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
                            <span class="text-sm font-semibold tracking-widest text-amber-700">CATEGORY</span>
                            <div class="w-16 h-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
                        </div>
                    @endif

                    <div class="flex flex-col items-center justify-center mb-8">
                        @if(!$category->image)
                            <div
                                class="w-24 h-24 bg-gradient-to-br from-amber-100 to-amber-200 rounded-full flex items-center justify-center shadow-lg mb-6 animate-bounce-in">
                                @if ($category->icon ?? false)
                                    <i class="{{ $category->icon }} text-4xl text-amber-700"></i>
                                @else
                                    <i class="fas fa-gem text-4xl text-amber-700"></i>
                                @endif
                            </div>
                            <h1 class="brand-title text-5xl md:text-6xl text-gray-800 mb-4 animate-fade-in-up"
                                style="animation-delay: 0.2s;">
                                {{ $category->name ?? 'Collection' }}
                            </h1>
                            @if ($category->description ?? false)
                                <p class="text-xl text-gray-600 max-w-2xl animate-fade-in-up" style="animation-delay: 0.4s;">
                                    {{ $category->description }}
                                </p>
                            @endif
                        @endif
                    </div>

                    @if(!$category->image)
                        <!-- Category Stats -->
                        <div class="flex flex-wrap justify-center gap-8 mb-12 animate-fade-in-up"
                            style="animation-delay: 0.6s;">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-amber-700 mb-2">{{ $paginator['total'] ?? 0 }}</div>
                                <div class="text-sm text-gray-600">Products</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-amber-700 mb-2">4.8</div>
                                <div class="text-sm text-gray-600">Average Rating</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-amber-700 mb-2">98%</div>
                                <div class="text-sm text-gray-600">Happy Customers</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- ============================================
            PRODUCTS GRID SECTION
            ============================================ -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <!-- Products Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12">
                    <div>
                        <h2 class="brand-title text-3xl md:text-4xl text-gray-800 mb-2">All
                            {{ $category->name ?? 'Products' }}</h2>
                        <p class="text-gray-600">Showing {{ $paginator['from'] ?? 0 }}-{{ $paginator['to'] ?? 0 }} of
                            {{ $paginator['total'] ?? 0 }} products</p>
                    </div>

                    <!-- Sort Options -->
                    <div class="mt-4 md:mt-0">
                        <select id="sortBy" onchange="updateSorting()"
                            class="px-4 py-2 rounded-full border border-amber-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-200 transition-all hover:shadow-lg">
                            <option value="newest" {{ $sortBy == 'newest' ? 'selected' : '' }}>Sort by: Newest</option>
                            <option value="price_asc" {{ $sortBy == 'price_asc' ? 'selected' : '' }}>Price: Low to High
                            </option>
                            <option value="price_desc" {{ $sortBy == 'price_desc' ? 'selected' : '' }}>Price: High to Low
                            </option>
                            <option value="popular" {{ $sortBy == 'popular' ? 'selected' : '' }}>Most Popular</option>
                            <option value="featured" {{ $sortBy == 'featured' ? 'selected' : '' }}>Featured</option>
                        </select>
                    </div>
                </div>

                <!-- Child Categories (if any) -->
                @if (isset($childCategories) && $childCategories->count() > 0)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Sub Categories</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($childCategories as $child)
                                <a href="{{ route('customer.products.category', $child->slug) }}"
                                    class="px-4 py-2 rounded-full border border-amber-200 text-amber-700 hover:bg-amber-50 transition-all">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Mobile Filter Toggle -->
                <div class="block lg:hidden mb-4">
                    <button onclick="openFilters()" class="w-full py-3 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center justify-center text-gray-700 font-semibold hover:bg-amber-50 transition-colors max-w-full">
                        <i class="fas fa-filter mr-2 text-amber-600"></i>
                        Filter & Sort
                    </button>
                </div>

                <div class="flex flex-col lg:flex-row gap-5">
                    <!-- Mobile Filter Overlay -->
                    <div id="filterOverlay" onclick="closeFilters()" class="fixed inset-0 bg-black bg-opacity-20 backdrop-blur-sm z-40 hidden transition-opacity duration-300 lg:hidden" aria-hidden="true"></div>

                    <!-- Sidebar Filters -->
                    <div id="filterSidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-white shadow-xl transform -translate-x-full transition-transform duration-300 lg:relative lg:transform-none lg:translate-x-0 lg:w-44 lg:min-w-[11rem] lg:shadow-none lg:bg-transparent lg:border-r lg:border-gray-100 lg:pr-4 overflow-y-auto lg:overflow-visible">
                        <div class="bg-white rounded-xl shadow p-5 filter-section lg:shadow-none lg:p-0 lg:rounded-none lg:bg-transparent lg:relative">
                            <!-- Mobile Sidebar Header -->
                            <div class="flex justify-between items-center mb-6 lg:hidden border-b pb-4">
                                <h3 class="text-xl font-bold text-gray-800">Filters</h3>
                                <button onclick="closeFilters()" class="p-2 text-gray-500 hover:text-red-500 transition-colors">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>

                            <!-- Desktop Header -->
                            <div class="flex justify-between items-center mb-6 hidden lg:flex border-b border-gray-100 pb-2">
                                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Filters</h3>
                                @if (request()->hasAny(['min_price', 'max_price', 'in_stock']))
                                    <a href="{{ route('customer.products.category', $category->slug) }}"
                                        class="text-xs font-medium text-amber-600 hover:text-amber-700 transition">Clear All</a>
                                @endif
                            </div>

                            <div class="space-y-8">
                                <!-- Price Filter -->
                                <div>
                                    <h4 class="text-xs font-bold text-gray-900 uppercase tracking-wide mb-4">Price Range</h4>
                                    <div class="flex items-center gap-2">
                                        <div class="relative w-full">
                                            <span class="absolute left-3 top-2 text-gray-400 text-xs">₹</span>
                                            <input type="number" id="minPrice" placeholder="Min" value="{{ $minPrice ?? '' }}"
                                                class="w-full pl-6 pr-2 py-1.5 border border-gray-200 rounded text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none">
                                        </div>
                                        <span class="text-gray-400">-</span>
                                        <div class="relative w-full">
                                            <span class="absolute left-3 top-2 text-gray-400 text-xs">₹</span>
                                            <input type="number" id="maxPrice" placeholder="Max" value="{{ $maxPrice ?? '' }}"
                                                class="w-full pl-6 pr-2 py-1.5 border border-gray-200 rounded text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none">
                                        </div>
                                    </div>
                                    <button onclick="applyPriceFilter()"
                                        class="mt-3 w-full py-2 bg-gray-900 text-white rounded hover:bg-black text-xs font-bold uppercase tracking-wide transition-colors">
                                        Update Price
                                    </button>
                                </div>

                                <!-- In Stock Filter -->
                                @if (isset($inStock))
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-900 uppercase tracking-wide mb-4">Stock</h4>
                                        <div class="relative">
                                            <select id="inStock" onchange="applyInStockFilter()"
                                                class="w-full appearance-none px-3 py-2 border border-gray-200 rounded text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none bg-white">
                                                <option value="">All Availability</option>
                                                <option value="1" {{ $inStock == '1' ? 'selected' : '' }}>In Stock</option>
                                                <option value="0" {{ $inStock == '0' ? 'selected' : '' }}>Out of Stock</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Mobile Apply Button -->
                                <div class="mt-auto lg:hidden pt-4">
                                     <button onclick="closeFilters()" class="w-full py-3 bg-gray-900 text-white rounded-lg hover:bg-gray-800 font-semibold shadow-lg">
                                        Show Results
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Content -->
                    <div class="flex-1">
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($products as $product)
                        <div
                            class="product-card bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group h-full flex flex-col animate-scale-in">
                            <!-- Product Image -->
                            <a href="{{ route('customer.products.details', $product['slug']) }}"
                                class="block relative overflow-hidden">
                                <div class="relative aspect-[4/5] overflow-hidden flex-shrink-0 group">
                                    <img src="{{ asset('storage/' . $product['main_image']) }}"
                                        alt="{{ $product['name'] }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />


                                    <div class="absolute top-4 right-4 flex flex-col gap-2 items-end">
                                        <!-- Discount Badge -->
                                        @if ($product['discount_percent'] > 0)
                                            <div
                                                class="bg-gradient-to-r from-amber-600 to-amber-800 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                                {{ $product['discount_percent'] }}% OFF
                                            </div>
                                        @endif

                                        <!-- New Badge -->
                                        @if ($product['is_new'])
                                            <div
                                                class="bg-gradient-to-r from-green-600 to-green-800 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                                NEW
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Wishlist Button -->
                                    <button onclick="addToWishlist({{ $product['id'] }})"
                                        class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 group wishlist-btn"
                                        data-product-id="{{ $product['id'] }}">
                                        <i class="fas fa-heart text-gray-400 group-hover:text-red-500"></i>
                                    </button>
                                </div>
                            </a>

                            <!-- Product Details -->
                            <div class="p-6 flex-grow flex flex-col">
                                <!-- Rating -->
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="flex">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($product['rating']))
                                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                            @elseif($i - 0.5 <= $product['rating'])
                                                <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                                            @else
                                                <i class="fas fa-star text-gray-300 text-sm"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-sm text-gray-600">{{ number_format($product['rating'], 1) }}</span>
                                    <span class="text-sm text-gray-400">({{ $product['review_count'] }})</span>
                                </div>

                                <!-- Product Name -->
                                <a href="{{ route('customer.products.details', $product['slug']) }}" class="block group">
                                    <h3
                                        class="font-semibold text-gray-800 mb-3 text-lg group-hover:text-amber-700 transition-colors cursor-pointer line-clamp-2 hover:underline">
                                        {{ $product['name'] }}
                                    </h3>
                                </a>

                                <!-- Pricing -->
                                <div class="mt-auto">
                                    <div class="flex items-center gap-2 mb-4">
                                        <p class="text-2xl font-bold text-gray-900 hover:text-amber-800 transition-colors">
                                            ₹{{ number_format($product['price']) }}
                                        </p>
                                        @if ($product['compare_price'])
                                            <p
                                                class="text-sm text-gray-400 line-through hover:text-gray-600 transition-colors">
                                                ₹{{ number_format($product['compare_price']) }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex gap-2">
                                        <button
                                            class="flex-1 bg-gray-900 text-white py-3 rounded-full font-semibold hover:bg-gray-800 transition-all duration-300 transform hover:scale-105 text-sm add-to-cart-btn hover:shadow-lg"
                                            onclick="addToCart(this, {{ $product['default_variant_id'] ?? $product['id'] }})">
                                            <i class="fas fa-shopping-cart mr-2"></i>
                                            {{ $product['is_in_stock'] ? 'Add to Cart' : 'Out of Stock' }}
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <div class="w-24 h-24 mx-auto mb-6 bg-amber-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-search text-3xl text-amber-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">No products found</h3>
                            <p class="text-gray-600 mb-6">Try adjusting your filters or check back later.</p>
                            <a href="{{ route('customer.products.list') }}"
                                class="px-6 py-3 bg-amber-600 text-white rounded-full hover:bg-amber-700 transition-colors">
                                Browse All Products
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if (isset($paginator) && $paginator['total'] > 0)
                    <div class="flex justify-center mt-16">
                        <nav class="flex items-center gap-2">
                            @if ($paginator['current_page'] > 1)
                                <a href="{{ request()->fullUrlWithQuery(['page' => $paginator['current_page'] - 1]) }}"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-amber-50 text-amber-700 hover:bg-amber-100 transition-colors hover:scale-110">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            @for ($i = 1; $i <= min(5, $paginator['last_page']); $i++)
                                <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}"
                                    class="w-10 h-10 flex items-center justify-center rounded-full {{ $i == $paginator['current_page'] ? 'bg-amber-600 text-white' : 'bg-amber-50 text-amber-700 hover:bg-amber-100' }} transition-colors hover:scale-110">
                                    {{ $i }}
                                </a>
                            @endfor

                            @if ($paginator['current_page'] < $paginator['last_page'])
                                <a href="{{ request()->fullUrlWithQuery(['page' => $paginator['current_page'] + 1]) }}"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-amber-50 text-amber-700 hover:bg-amber-100 transition-colors hover:scale-110">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @endif
                        </nav>
                    </div>
                @endif
                </div>
              </div>
            </div>
        </section>

        <!-- ============================================
            CATEGORY FEATURES
            ============================================ -->
        <section class="py-16 bg-gradient-to-b from-white to-amber-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="brand-title text-3xl md:text-4xl text-gray-800 mb-4">Why Choose Our
                        {{ $category->name ?? 'Jewellery' }}</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Premium quality, certified materials, and expert craftsmanship in every piece.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="text-center p-8 rounded-3xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 animate-slide-up"
                        style="animation-delay: 0.1s;">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-amber-100 to-amber-200 rounded-2xl flex items-center justify-center shadow-lg hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-award text-3xl text-amber-700"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 hover:text-amber-700 transition-colors">Authentic
                            Materials</h3>
                        <p class="text-gray-600">
                            Made with genuine precious metals and gemstones, certified for quality.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="text-center p-8 rounded-3xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 animate-slide-up"
                        style="animation-delay: 0.2s;">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-amber-100 to-amber-200 rounded-2xl flex items-center justify-center shadow-lg hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-hands text-3xl text-amber-700"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 hover:text-amber-700 transition-colors">Handcrafted
                        </h3>
                        <p class="text-gray-600">
                            Each piece is meticulously crafted by skilled artisans with attention to detail.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="text-center p-8 rounded-3xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 animate-slide-up"
                        style="animation-delay: 0.3s;">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-amber-100 to-amber-200 rounded-2xl flex items-center justify-center shadow-lg hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-shield-alt text-3xl text-amber-700"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 hover:text-amber-700 transition-colors">
                            Quality Assurance
                        </h3>
                        <p class="text-gray-600">
                            Every product is carefully inspected to meet our quality standards before delivery.
                        </p>
                    </div>

                </div>
            </div>
        </section>
    @endsection

    @push('scripts')
    <script>
        // Mobile Sidebar Functions
        function openFilters() {
            // Desktop: do nothing
            if (window.innerWidth >= 1024) return;

            const sidebar = document.getElementById('filterSidebar');
            const overlay = document.getElementById('filterOverlay');
            
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            // Prevent body scrolling
            document.body.style.overflow = 'hidden';
        }

        function closeFilters() {
            // Desktop: do nothing
            if (window.innerWidth >= 1024) return;
            
            const sidebar = document.getElementById('filterSidebar');
            const overlay = document.getElementById('filterOverlay');
            
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            // Restore body scrolling
            document.body.style.overflow = '';
        }
    </script>
        <!-- Include Axios -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script>
            // CSRF Token setup for Axios
            axios.defaults.headers.common['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
            axios.defaults.headers.common['Accept'] = 'application/json';

            // Wishlist functionality
            function addToWishlist(productId) {
                const isLoggedIn = {{ Auth::guard('customer')->check() ? 'true' : 'false' }};
                if (!isLoggedIn) {
                    showNotification('You need to login for this feature', 'info');
                    return;
                }

                fetch('{{ route('customer.wishlist.toggle') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            product_id: productId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const heartIcon = document.querySelector(`[data-product-id="${productId}"] i`);
                            if (heartIcon) {
                                if (data.status === 'added') {
                                    heartIcon.className = 'fas fa-heart text-red-500';
                                    showNotification('Added to wishlist!', 'success');
                                } else {
                                    heartIcon.className = 'fas fa-heart text-gray-400 group-hover:text-red-500'; 
                                    showNotification('Removed from wishlist', 'info');
                                }
                            } else {
                                showNotification(data.message, 'success');
                            }
                            
                            // Update wishlist count globally if function exists
                            if (typeof updateWishlistCount === 'function') {
                                updateWishlistCount(data.count);
                            }
                        } else {
                            showNotification(data.message || 'Error updating wishlist', 'info');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        showNotification('Failed to update wishlist', 'error');
                    });
            }

            // Add to cart functionality
            async function addToCart(button, productId) {
                const originalText = button.innerHTML;

                // Show loading state
                button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Adding...';
                button.disabled = true;

                try {
                    const response = await axios.post('/cart/add', {
                        variant_id: productId,
                        quantity: 1
                    });

                    if (response.data.success) {
                        // Change button state
                        button.innerHTML = '<i class="fas fa-check"></i> ADDED';
                        button.classList.remove('bg-gray-900', 'hover:bg-gray-800');
                        button.classList.add('bg-green-600', 'hover:bg-green-700');
                        button.classList.add('animate-pulse');

                        // Update cart count
                        const cartCountElements = document.querySelectorAll('.cart-count');
                        cartCountElements.forEach(el => {
                            el.textContent = response.data.cart_count || 0;
                            if (response.data.cart_count > 0) {
                                el.classList.remove('hidden');
                                el.classList.add('animate-bounce');
                                setTimeout(() => el.classList.remove('animate-bounce'), 1000);
                            }
                        });

                        showNotification('Added to cart successfully!');

                        // Reset button after 2 seconds
                        setTimeout(() => {
                            button.innerHTML = originalText;
                            button.classList.remove('bg-green-600', 'hover:bg-green-700', 'animate-pulse');
                            button.classList.add('bg-gray-900', 'hover:bg-gray-800');
                            button.disabled = false;
                        }, 2000);
                    } else {
                        showNotification(response.data.message || 'Failed to add to cart', 'error');
                        button.innerHTML = originalText;
                        button.disabled = false;
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showNotification(error.response?.data?.message || 'Failed to add to cart', 'error');
                    button.innerHTML = originalText;
                    button.disabled = false;
                }
            }

            // Update sorting
            function updateSorting() {
                const sortBy = document.getElementById('sortBy').value;
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('sort_by', sortBy);
                currentUrl.searchParams.set('page', 1); // Reset to first page
                window.location.href = currentUrl.toString();
            }

            // Apply price filter
            function applyPriceFilter() {
                const minPrice = document.getElementById('minPrice').value;
                const maxPrice = document.getElementById('maxPrice').value;
                const currentUrl = new URL(window.location.href);

                if (minPrice) {
                    currentUrl.searchParams.set('min_price', minPrice);
                } else {
                    currentUrl.searchParams.delete('min_price');
                }

                if (maxPrice) {
                    currentUrl.searchParams.set('max_price', maxPrice);
                } else {
                    currentUrl.searchParams.delete('max_price');
                }

                currentUrl.searchParams.set('page', 1); // Reset to first page
                window.location.href = currentUrl.toString();
            }

            // Apply in-stock filter
            function applyInStockFilter() {
                const inStock = document.getElementById('inStock').value;
                const currentUrl = new URL(window.location.href);

                if (inStock) {
                    currentUrl.searchParams.set('in_stock', inStock);
                } else {
                    currentUrl.searchParams.delete('in_stock');
                }

                currentUrl.searchParams.set('page', 1); // Reset to first page
                window.location.href = currentUrl.toString();
            }

            // Show notification (Toast style from listing)
            function showNotification(message, type = 'success') {
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 px-4 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300 ${
            type === 'success'
                ? 'bg-green-100 text-green-800 border border-green-200'
                : (type === 'info' ? 'bg-amber-100 text-amber-800 border border-amber-200' : 'bg-red-100 text-red-800 border border-red-200')
        }`;

                notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : (type === 'info' ? 'fa-info-circle' : 'fa-exclamation-circle')} mr-2"></i>
                <span>${message}</span>
            </div>
        `;

                notification.style.cssText = `
            animation: slideInRight 0.3s ease-out;
            font-family: 'Inter', sans-serif;
            min-width: 300px;
        `;

                document.body.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.style.opacity = '1';
                    notification.style.transform = 'translateX(0)';
                }, 10);

                setTimeout(() => {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.parentNode.removeChild(notification);
                        }
                    }, 300);
                }, 3000);

                // Add styles if not present
                if (!document.getElementById('notification-styles')) {
                    const style = document.createElement('style');
                    style.id = 'notification-styles';
                    style.textContent = `
                @keyframes slideInRight {
                    from { opacity: 0; transform: translateX(100%); }
                    to { opacity: 1; transform: translateX(0); }
                }
            `;
                    document.head.appendChild(style);
                }
            }
        </script>
    @endpush