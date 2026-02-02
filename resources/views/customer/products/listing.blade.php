@extends('customer.layouts.master')

@section('title', 'All Imitation Jewelry - APIQO Fashion Jewelry')
@section('meta_description',
    'Browse our complete collection of fashionable imitation jewelry including earrings, necklaces, rings,
    bracelets, bangles and pendants at affordable prices.')
@section('og_title', 'Shop All Imitation Jewelry - APIQO Fashion Jewelry')
@section('og_description', 'Discover our complete collection of stylish and affordable imitation jewelry.')

@section('styles')
    <style>
        .filter-section {
            transition: all 0.3s ease;
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .material-tag {
            display: inline-block;
            background: #fef3c7;
            color: #92400e;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            margin-right: 4px;
            margin-bottom: 2px;
        }

        .attribute-tag {
            display: inline-block;
            background: #dbeafe;
            color: #1e40af;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            margin-right: 4px;
            margin-bottom: 2px;
        }

        .discount-badge {
            background: #dc2626;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        .color-swatch {
            display: inline-block;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 1px solid #e5e7eb;
            vertical-align: middle;
            margin-right: 4px;
        }

        /* Fix for consistent image size */
        .product-image-container {
            aspect-ratio: 4/5;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
        }

        /* List view styles */
        .product-card.list-view {
            flex-direction: row !important;
            height: auto !important;
        }

        .list-view .product-image-container {
            width: 250px;
            aspect-ratio: 1/1 !important;
            flex-shrink: 0;
        }

        .list-view .product-details {
            flex: 1;
            padding: 1.5rem;
        }

        /* Button styles */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .btn-add-to-cart {
            flex: 1;
            background: #d97706;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: background 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-add-to-cart:hover {
            background: #b45309;
        }

        .btn-add-to-cart:disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }

        .btn-wishlist {
            width: 40px;
            height: 40px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-wishlist:hover {
            background: #fef3c7;
            color: #92400e;
            border-color: #fef3c7;
        }

        /* Grid view button positioning */
        .grid-view .action-buttons {
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            right: 1rem;
            opacity: 1;
        }

        .grid-view .btn-add-to-cart {
            padding: 0.625rem 1rem;
            font-size: 0.875rem;
        }

        /* List view button positioning */
        .list-view .action-buttons {
            margin-top: auto;
        }


    </style>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-amber-50 py-4">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('customer.home.index') }}"
                            class="inline-flex items-center text-sm text-amber-700 hover:text-amber-800">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            <span class="ml-3 text-sm font-medium text-gray-700">All Products</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Fashion Imitation Jewelry Collection</h1>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                Discover trendy and affordable imitation jewelry that complements your style without breaking the bank.
            </p>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (isset($error))
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                {{ $error }}
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-5">


            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Results Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <div>
                        <p class="text-gray-700">
                            @if (isset($paginator['total']) && $paginator['total'] > 0)
                                Showing <span class="font-semibold">{{ $paginator['from'] ?? 0 }}</span> to
                                <span class="font-semibold">{{ $paginator['to'] ?? 0 }}</span> of
                                <span class="font-semibold">{{ $paginator['total'] ?? 0 }}</span> products
                            @else
                                No products found
                            @endif
                        </p>
                        @if (!empty($search))
                            <p class="text-sm text-gray-600 mt-1">
                                Search results for: "<span class="font-semibold">{{ $search }}</span>"
                            </p>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Sort Form -->
                        <form method="GET" action="{{ route('customer.products.list') }}">
                            @foreach (request()->except('sort_by', 'page') as $key => $value)
                                @if (is_array($value))
                                    @foreach ($value as $val)
                                        <input type="hidden" name="{{ $key }}[]" value="{{ $val }}">
                                    @endforeach
                                @else
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach

                            <select name="sort_by" onchange="this.form.submit()"
                                class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 focus:outline-none">
                                <option value="newest" {{ ($sortBy ?? 'newest') == 'newest' ? 'selected' : '' }}>Newest
                                    First</option>
                                <option value="featured" {{ ($sortBy ?? '') == 'featured' ? 'selected' : '' }}>Featured
                                </option>
                                <option value="price_asc" {{ ($sortBy ?? '') == 'price_asc' ? 'selected' : '' }}>Price:
                                    Low to High</option>
                                <option value="price_desc" {{ ($sortBy ?? '') == 'price_desc' ? 'selected' : '' }}>Price:
                                    High to Low</option>
                                <option value="name_asc" {{ ($sortBy ?? '') == 'name_asc' ? 'selected' : '' }}>Name: A to
                                    Z</option>
                                <option value="name_desc" {{ ($sortBy ?? '') == 'name_desc' ? 'selected' : '' }}>Name: Z
                                    to A</option>
                                <option value="popular" {{ ($sortBy ?? '') == 'popular' ? 'selected' : '' }}>Most Popular
                                </option>
                            </select>
                        </form>


                    </div>
                </div>

                <!-- Products Grid -->
                @if (count($products ?? []) > 0)
                    <div id="productsContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div
                                class="product-card bg-white rounded-xl shadow overflow-hidden group grid-view flex flex-col">
                                <!-- Product Image -->
                                <div class="product-image-container relative">
                                    <a href="{{ route('customer.products.details', $product['slug']) }}">
                                        <img src="{{ asset('storage/' . $product['main_image']) }}"
                                            alt="{{ $product['name'] }}" class="product-image"
                                            onerror="this.src='/images/placeholder-product.jpg'">
                                    </a>

                                    <!-- Badges -->
                                    <div class="absolute top-3 right-3 space-y-1">
                                        @if ($product['discount_percent'] > 0)
                                            <span class="discount-badge">{{ $product['discount_percent'] }}% OFF</span>
                                        @endif
                                        @if ($product['is_new'])
                                            <span class="bg-green-600 text-white text-xs px-2 py-1 rounded">NEW</span>
                                        @endif
                                        @if ($product['is_featured'])
                                            <span
                                                class="bg-purple-600 text-white text-xs px-2 py-1 rounded">FEATURED</span>
                                        @endif
                                        @if ($product['is_bestseller'])
                                            <span class="bg-red-600 text-white text-xs px-2 py-1 rounded">BESTSELLER</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Product Details -->
                                <div class="p-4 flex flex-col flex-grow relative">
                                    <a href="{{ route('customer.products.details', $product['slug']) }}" class="block">
                                        <h3
                                            class="font-semibold text-gray-800 mb-2 hover:text-amber-700 transition-colors line-clamp-2 min-h-[3rem]">
                                            {{ $product['name'] }}
                                        </h3>
                                    </a>

                                    <!-- Material Tags -->
                                    @if (!empty($product['materials']))
                                        <div class="mb-2">
                                            @foreach (array_slice($product['materials'], 0, 3) as $material)
                                                <span class="material-tag">{{ $material }}</span>
                                            @endforeach
                                            @if (count($product['materials']) > 3)
                                                <span class="material-tag">+{{ count($product['materials']) - 3 }}
                                                    more</span>
                                            @endif
                                        </div>
                                    @endif

                                    <!-- Attribute Tags -->
                                    @if (!empty($product['attributes']))
                                        <div class="mb-2">
                                            @foreach (array_slice($product['attributes'], 0, 3) as $attribute)
                                                <span class="attribute-tag">
                                                    @if ($attribute['color_code'])
                                                        <span class="color-swatch"
                                                            style="background-color: {{ $attribute['color_code'] }}"></span>
                                                    @endif
                                                    {{ $attribute['label'] ?? $attribute['value'] }}
                                                </span>
                                            @endforeach
                                            @if (count($product['attributes']) > 3)
                                                <span class="attribute-tag">+{{ count($product['attributes']) - 3 }}
                                                    more</span>
                                            @endif
                                        </div>
                                    @endif

                                    <!-- Rating -->
                                    @if ($product['rating'] > 0)
                                        <div class="flex items-center gap-1 mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($product['rating']))
                                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                @elseif($i == ceil($product['rating']) && $product['rating'] % 1 >= 0.5)
                                                    <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                                                @else
                                                    <i class="far fa-star text-gray-300 text-sm"></i>
                                                @endif
                                            @endfor
                                            <span
                                                class="text-xs text-gray-500 ml-1">({{ $product['review_count'] ?? 0 }})</span>
                                        </div>
                                    @endif

                                    <!-- Price -->
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="text-xl font-bold text-amber-800">
                                            ₹{{ number_format($product['price'] ?? 0) }}
                                        </span>
                                        @if ($product['compare_price'] && $product['compare_price'] > $product['price'])
                                            <span class="text-sm text-gray-400 line-through">
                                                ₹{{ number_format($product['compare_price']) }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Stock & Variants -->
                                    {{-- <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                                        <p
                                            class="text-xs {{ $product['is_in_stock'] ? 'text-green-600' : 'text-red-600' }}">
                                            <i
                                                class="fas {{ $product['is_in_stock'] ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                            {{ $product['is_in_stock'] ? 'In Stock' : 'Out of Stock' }}
                                        </p>
                                        @if ($product['has_variants'] && ($product['variants_count'] ?? 0) > 0)
                                            <p class="text-xs text-blue-600">
                                                <i class="fas fa-layer-group mr-1"></i>
                                                {{ $product['variants_count'] ?? 0 }} variants
                                            </p>
                                        @endif
                                    </div> --}}

                                    <!-- Action Buttons -->
                                    <div class="action-buttons">
                                        <button type="button"
                                            class="btn-add-to-cart add-to-cart-btn"
                                            data-product-id="{{ $product['id'] }}"
                                            data-variant-id="{{ $product['default_variant_id'] ?? $product['id'] }}"
                                            {{ !$product['is_in_stock'] ? 'disabled' : '' }}>
                                            <i class="fas fa-shopping-cart mr-2"></i>
                                            Add to Cart
                                        </button>
                                        <button onclick="addToWishlist({{ $product['id'] }})"
                                            class="btn-wishlist wishlist-btn"
                                            data-product-id="{{ $product['id'] }}"
                                            title="Add to Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if (isset($paginator['last_page']) && $paginator['last_page'] > 1)
                        <div class="mt-12">
                            <div class="flex justify-center">
                                <nav class="flex items-center gap-1">
                                    <!-- Previous Page -->
                                    @if ($paginator['current_page'] > 1)
                                        <a href="{{ route('customer.products.list', array_merge(request()->query(), ['page' => $paginator['current_page'] - 1])) }}"
                                            class="w-10 h-10 flex items-center justify-center rounded-lg text-gray-600 hover:bg-amber-50 hover:text-amber-700">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    @endif

                                    <!-- Page Numbers -->
                                    @php
                                        $start = max(1, $paginator['current_page'] - 2);
                                        $end = min($paginator['last_page'], $paginator['current_page'] + 2);
                                    @endphp

                                    @for ($i = $start; $i <= $end; $i++)
                                        <a href="{{ route('customer.products.list', array_merge(request()->query(), ['page' => $i])) }}"
                                            class="w-10 h-10 flex items-center justify-center rounded-lg
                                                {{ $i == $paginator['current_page'] ? 'bg-amber-600 text-white' : 'text-gray-700 hover:bg-amber-50 hover:text-amber-700' }}">
                                            {{ $i }}
                                        </a>
                                    @endfor

                                    <!-- Next Page -->
                                    @if ($paginator['current_page'] < $paginator['last_page'])
                                        <a href="{{ route('customer.products.list', array_merge(request()->query(), ['page' => $paginator['current_page'] + 1])) }}"
                                            class="w-10 h-10 flex items-center justify-center rounded-lg text-gray-600 hover:bg-amber-50 hover:text-amber-700">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    @endif
                                </nav>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- No Products Found -->
                    <div class="text-center py-16 bg-white rounded-xl shadow">
                        <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Products Found</h3>
                        <p class="text-gray-600 mb-6">Try adjusting your filters or search terms</p>
                        <a href="{{ route('customer.products.list') }}"
                            class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                            Reset All Filters
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

    </script>
    <!-- Include Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- CSRF Token setup -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        // Wishlist functionality
        // Wishlist functionality
        function addToWishlist(productId, variantId = null) {
            const isLoggedIn = {{ Auth::guard('customer')->check() ? 'true' : 'false' }};
            if (!isLoggedIn) {
                showToast('You need to login for this feature', 'info');
                return;
            }

            const variantIdToUse = variantId || document.querySelector(`[data-product-id="${productId}"]`)?.dataset?.variantId || null;

            fetch('{{ route("customer.wishlist.toggle") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    product_id: productId,
                    product_variant_id: variantIdToUse
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const heartIcon = document.querySelector(`[data-product-id="${productId}"] i`);
                    if (heartIcon) {
                        if (data.status === 'added') {
                            heartIcon.className = 'fas fa-heart text-red-500';
                            showToast('Added to wishlist!', 'success');
                        } else {
                            heartIcon.className = 'far fa-heart text-gray-400'; // Or whatever the default empty state class is
                            showToast('Removed from wishlist', 'info');
                        }
                    } else {
                         showToast(data.message, 'success');
                    }

                    if (typeof updateWishlistCount === 'function') {
                        updateWishlistCount(data.count);
                    }
                } else {
                    showToast(data.message || 'Error updating wishlist', 'error');
                }
            })
            .catch(error => {
                console.error(error);
                showToast('Failed to update wishlist', 'error');
            });
        }

        // CSRF Token setup for Axios
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Configure Axios for API calls
        axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        axios.defaults.headers.common['Accept'] = 'application/json';

        document.addEventListener('DOMContentLoaded', function() {
            // View mode toggle
            document.getElementById('gridView')?.addEventListener('click', function() {
                setViewMode('grid');
                this.classList.add('bg-amber-100', 'text-amber-700');
                this.classList.remove('text-gray-500');
                document.getElementById('listView').classList.remove('bg-amber-100', 'text-amber-700');
                document.getElementById('listView').classList.add('text-gray-500');
            });

            document.getElementById('listView')?.addEventListener('click', function() {
                setViewMode('list');
                this.classList.add('bg-amber-100', 'text-amber-700');
                this.classList.remove('text-gray-500');
                document.getElementById('gridView').classList.remove('bg-amber-100', 'text-amber-700');
                document.getElementById('gridView').classList.add('text-gray-500');
            });

            // Add to cart functionality
            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const productId = this.getAttribute('data-product-id');
                    const variantId = this.getAttribute('data-variant-id') || productId;
                    const button = this;
                    const originalText = button.innerHTML;

                    if (button.disabled) return;

                    // Show loading state
                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Adding...';
                    button.disabled = true;

                    try {
                        const response = await axios.post('/cart/add', {
                            variant_id: variantId,
                            quantity: 1
                        });

                        if (response.data.success) {
                            showToast('Product added to cart successfully!', 'success');
                            // Update cart count if needed
                            updateCartCount(response.data.cart_count || 0);
                        } else {
                            showToast(response.data.message || 'Failed to add to cart', 'error');
                        }
                    } catch (error) {
                        console.error('Add to cart error:', error);
                        if (error.response?.data?.message) {
                            showToast(error.response.data.message, 'error');
                        } else {
                            showToast('An error occurred. Please try again.', 'error');
                        }
                    } finally {
                        // Reset button state
                        button.innerHTML = originalText;
                        button.disabled = false;
                    }
                });
            });



            // Quick view functionality
            document.querySelectorAll('.quick-view').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productSlug = this.getAttribute('data-product-slug');
                    quickView(productSlug);
                });
            });

            // Price form validation
            document.getElementById('priceForm')?.addEventListener('submit', function(e) {
                const minPrice = this.querySelector('input[name="min_price"]').value;
                const maxPrice = this.querySelector('input[name="max_price"]').value;

                if (minPrice && maxPrice && parseInt(minPrice) > parseInt(maxPrice)) {
                    e.preventDefault();
                    showToast('Minimum price cannot be greater than maximum price', 'error');
                }
            });

            // Load saved view mode
            const savedViewMode = localStorage.getItem('productViewMode') || 'grid';
            if (savedViewMode === 'list') {
                document.getElementById('listView')?.click();
            } else {
                document.getElementById('gridView')?.click();
            }
        });

        // Set view mode
        function setViewMode(mode) {
            const productsContainer = document.getElementById('productsContainer');
            if (!productsContainer) return;

            // Update container class
            if (mode === 'grid') {
                productsContainer.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6';
            } else {
                productsContainer.className = 'grid grid-cols-1 gap-6';
            }

            // Update each product card
            productsContainer.querySelectorAll('.product-card').forEach(card => {
                if (mode === 'grid') {
                    card.classList.remove('list-view');
                    card.classList.add('grid-view', 'flex-col');

                    // Restore image aspect ratio
                    const imageContainer = card.querySelector('.product-image-container');
                    if (imageContainer) {
                        imageContainer.classList.remove('w-64', 'h-64', 'flex-shrink-0');
                        imageContainer.classList.add('aspect-[4/5]');
                    }

                    // Restore details layout
                    const details = card.querySelector('.p-4');
                    if (details) {
                        details.classList.remove('flex-1', 'p-6');
                    }
                } else {
                    card.classList.remove('grid-view', 'flex-col');
                    card.classList.add('list-view', 'flex-row');

                    // Adjust image for list view
                    const imageContainer = card.querySelector('.product-image-container');
                    if (imageContainer) {
                        imageContainer.classList.remove('aspect-[4/5]');
                        imageContainer.classList.add('w-64', 'h-64', 'flex-shrink-0');
                    }

                    // Adjust details for list view
                    const details = card.querySelector('.p-4');
                    if (details) {
                        details.classList.add('flex-1', 'p-6');
                    }
                }
            });

            localStorage.setItem('productViewMode', mode);
        }

        // Filter by attribute
        function filterByAttribute(attributeCode, attributeValue) {
            const url = new URL(window.location.href);
            url.searchParams.set('attribute', attributeCode);
            url.searchParams.set('attribute_value', attributeValue);
            url.searchParams.delete('page'); // Reset to page 1

            window.location.href = url.toString();
        }

        // Filter by specification
        function filterBySpecification(specCode, specValue) {
            const url = new URL(window.location.href);
            url.searchParams.set('specification', specCode);
            url.searchParams.set('specification_value', specValue);
            url.searchParams.delete('page'); // Reset to page 1

            window.location.href = url.toString();
        }

        // Quick view with AJAX
        async function quickView(productSlug) {
            try {
                const response = await axios.get(`/products/${productSlug}/quick-view`);
                if (response.data.success) {
                    // TODO: Implement quick view modal
                    // For now, redirect to product page
                    window.location.href = `/product/${productSlug}`;
                }
            } catch (error) {
                console.error('Quick view error:', error);
                // Fallback to product page
                window.location.href = `/product/${productSlug}`;
            }
        }

        // Update cart count
        function updateCartCount(count) {
            const cartCountElements = document.querySelectorAll('.cart-count');
            cartCountElements.forEach(element => {
                element.textContent = count;
                element.style.display = count > 0 ? 'inline' : 'none';
            });
        }

        // Toast notification
        function showToast(message, type = 'success') {
            // Remove existing toasts
            document.querySelectorAll('.custom-toast').forEach(toast => toast.remove());

            const toast = document.createElement('div');
            toast.className = `custom-toast fixed top-4 right-4 px-4 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300 ${
                type === 'success'
                    ? 'bg-green-100 text-green-800 border border-green-200'
                    : 'bg-red-100 text-red-800 border border-red-200'
            }`;
            toast.innerHTML = `
                <div class="flex items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} mr-2"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(toast);

            // Animate in
            setTimeout(() => {
                toast.style.opacity = '1';
                toast.style.transform = 'translateX(0)';
            }, 10);

            // Remove after 3 seconds
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>
@endpush
