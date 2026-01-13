@extends('admin.layouts.master')

@section('title', 'Add New Product')

@section('content')
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Add New Product</h2>
                <p class="text-gray-600">Create a new product in your catalog</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Back to Products
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Product Information</h3>
        </div>

        <form id="productForm" class="p-6" novalidate>
            @csrf

            <div class="space-y-8">
                <!-- Basic Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Basic Information</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="productName" class="block text-sm font-medium text-gray-700 mb-2">Product Name
                                *</label>
                            <input type="text" id="productName" name="name" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="Enter product name">
                            <div id="nameError" class="hidden mt-1 text-sm text-rose-600"></div>
                        </div>
                        <div>
                            <label for="productSlug" class="block text-sm font-medium text-gray-700 mb-2">Slug *</label>
                            <input type="text" id="productSlug" name="slug" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="product-url-slug">
                            <div id="slugError" class="hidden mt-1 text-sm text-rose-600"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label for="productCode" class="block text-sm font-medium text-gray-700 mb-2">Product
                                Code</label>
                            <input type="text" id="productCode" name="product_code"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="PROD-CODE-001">
                            <div id="productCodeError" class="hidden mt-1 text-sm text-rose-600"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Type *</label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="product-type-option cursor-pointer">
                                    <input type="radio" name="product_type" value="simple" class="sr-only" checked>
                                    <div class="p-4 border-2 border-indigo-500 rounded-xl text-center">
                                        <i class="fas fa-cube text-2xl text-indigo-600 mb-2"></i>
                                        <p class="font-medium">Simple Product</p>
                                        <p class="text-xs text-gray-500 mt-1">Single variant</p>
                                    </div>
                                </label>
                                <label class="product-type-option cursor-pointer">
                                    <input type="radio" name="product_type" value="configurable" class="sr-only">
                                    <div class="p-4 border-2 border-gray-200 rounded-xl text-center">
                                        <i class="fas fa-layer-group text-2xl text-gray-400 mb-2"></i>
                                        <p class="font-medium">Configurable</p>
                                        <p class="text-xs text-gray-500 mt-1">Multiple variants</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category & Brand -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Category & Brand</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="categoryId" class="block text-sm font-medium text-gray-700 mb-2">Main Category
                                *</label>
                            <select id="categoryId" name="main_category_id" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="">Select Category</option>
                                <!-- Categories will be loaded dynamically -->
                            </select>
                            <div id="categoryError" class="hidden mt-1 text-sm text-rose-600"></div>
                        </div>
                        <div>
                            <label for="brandId" class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                            <select id="brandId" name="brand_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="">Select Brand</option>
                                <!-- Brands will be loaded dynamically -->
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="additionalCategories" class="block text-sm font-medium text-gray-700 mb-2">Additional
                            Categories</label>
                        <select id="additionalCategories" name="category_ids[]" multiple
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <!-- Additional categories will be loaded dynamically -->
                        </select>
                    </div>
                </div>

                <!-- Product Images -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Product Images</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Simple Product Main Image -->
                        <div id="simpleProductImageSection">
                            <h4 class="text-md font-semibold text-gray-700 mb-3">Main Product Image *</h4>
                            <div class="space-y-4">
                                <div id="mainImagePreview"
                                    class="w-full h-64 bg-gray-100 border-2 border-dashed border-gray-300 rounded-xl flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 transition"
                                    onclick="openMediaPicker('main')">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-2"></i>
                                    <span class="text-gray-500">Click to upload main image</span>
                                    <span class="text-xs text-gray-400 mt-1">Recommended: 800x800px, PNG/JPG</span>
                                </div>
                                <input type="hidden" id="mainImageId" name="main_image_id">
                                <div id="mainImageError" class="hidden mt-2 text-sm text-rose-600"></div>
                            </div>
                        </div>

                        <!-- Gallery Images (for simple products) -->
                        <div id="simpleGallerySection">
                            <h4 class="text-md font-semibold text-gray-700 mb-3">Gallery Images</h4>
                            <div class="space-y-4">
                                <div id="galleryPreview"
                                    class="grid grid-cols-3 gap-3 mb-3 min-h-[100px] p-3 border border-gray-200 rounded-xl">
                                    <div class="col-span-3 text-center text-gray-500 text-sm py-8">
                                        No gallery images selected
                                    </div>
                                </div>
                                <button type="button" onclick="openMediaPicker('gallery')" class="btn-secondary w-full">
                                    <i class="fas fa-plus mr-2"></i>Add Gallery Images
                                </button>
                                <input type="hidden" id="galleryImageIds" name="gallery_image_ids[]">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Simple Product Fields (Initially Visible) -->
                <div id="simpleProductFields">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Pricing & Inventory</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div>
                            <label for="simpleSku" class="block text-sm font-medium text-gray-700 mb-2">SKU *</label>
                            <input type="text" id="simpleSku" name="sku" required data-required="true"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="PRODUCT-SKU-001">
                            <div id="skuError" class="hidden mt-1 text-sm text-rose-600"></div>
                        </div>
                        <div>
                            <label for="simplePrice" class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">₹</span>
                                </div>
                                <input type="number" id="simplePrice" name="price" step="0.01" min="0"
                                    required data-required="true"
                                    class="pl-8 w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label for="simpleComparePrice" class="block text-sm font-medium text-gray-700 mb-2">Compare
                                Price</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">₹</span>
                                </div>
                                <input type="number" id="simpleComparePrice" name="compare_price" step="0.01"
                                    min="0"
                                    class="pl-8 w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label for="simpleCostPrice" class="block text-sm font-medium text-gray-700 mb-2">Cost
                                Price</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">₹</span>
                                </div>
                                <input type="number" id="simpleCostPrice" name="cost_price" step="0.01"
                                    min="0"
                                    class="pl-8 w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label for="simpleStock" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity
                                *</label>
                            <input type="number" id="simpleStock" name="stock_quantity" min="0" required
                                data-required="true"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="0">
                        </div>
                        <div>
                            <label for="simpleStockStatus" class="block text-sm font-medium text-gray-700 mb-2">Stock
                                Status</label>
                            <select id="simpleStockStatus" name="stock_status"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="in_stock">In Stock</option>
                                <option value="out_of_stock">Out of Stock</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Configurable Product Fields (Initially Hidden) -->
                <div id="configurableProductFields" class="hidden">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-blue-500 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-blue-800">Configurable Product</h4>
                                <p class="text-sm text-blue-600 mt-1">Configure variants in the "Product Variants" section
                                    below</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Variants Section (Initially Hidden) -->
                <div id="variantsSection" class="hidden">
                    <div class="border-t pt-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-6">Product Variants</h3>

                        <!-- Attribute Selection -->
                        <div id="attributeSelection" class="space-y-6 mb-8">
                            <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                                Select a category to load attributes for variants
                            </div>
                        </div>

                        <!-- Generate Variants Button -->
                        <div class="mb-8">
                            <button type="button" id="generateVariantsBtn" onclick="generateVariants()"
                                class="btn-primary px-6 py-3 rounded-lg font-medium hidden">
                                <i class="fas fa-bolt mr-2"></i>Generate Variants
                            </button>
                        </div>

                        <!-- Variants Table -->
                        <div id="variantsContainer" class="hidden">
                            <div class="mb-6 flex justify-between items-center">
                                <h4 class="text-lg font-semibold text-gray-700">Generated Variants</h4>
                                <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full"
                                    id="variantsCount">0 variants</span>
                            </div>

                            <div class="overflow-x-auto border border-gray-200 rounded-xl">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Variant</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                SKU</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Compare Price</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cost Price</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Stock</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Images</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Default</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="variantsTableBody" class="bg-white divide-y divide-gray-200">
                                        <!-- Variants will be generated here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tax & Pricing -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Tax & Pricing</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="taxClassId" class="block text-sm font-medium text-gray-700 mb-2">Tax Class</label>
                            <select id="taxClassId" name="tax_class_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="">Select Tax Class</option>
                                <!-- Tax classes will be loaded dynamically -->
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Manage Stock</label>
                            <div class="flex items-center">
                                <input type="checkbox" id="manageStock" name="manage_stock" checked
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="manageStock" class="ml-2 text-sm text-gray-700">
                                    Yes, track inventory for this product
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Description</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="shortDescription" class="block text-sm font-medium text-gray-700 mb-2">Short
                                Description</label>
                            <textarea id="shortDescription" name="short_description" rows="3"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="Brief product description for listings"></textarea>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Long Description
                                *</label>
                            <textarea id="description" name="description" rows="6" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="Detailed product description with features, specifications, etc."></textarea>
                            <div id="descriptionError" class="hidden mt-1 text-sm text-rose-600"></div>
                        </div>
                    </div>
                </div>

                <!-- Specifications -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Specifications</h3>
                    <div id="specificationsContainer" class="space-y-6">
                        <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                            Select a category to load specifications
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Product Tags</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Select Tags</label>
                            <select id="tags" name="tag_ids[]" multiple
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <!-- Tags will be loaded dynamically -->
                            </select>
                        </div>
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-2"></i>
                            Type to search or create new tags
                        </div>
                    </div>
                </div>

                <!-- SEO Settings -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">SEO Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="metaTitle" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" id="metaTitle" name="meta_title"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="Meta title for SEO (max 60 characters)">
                        </div>
                        <div>
                            <label for="metaDescription" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                Description</label>
                            <textarea id="metaDescription" name="meta_description" rows="2"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="Meta description for SEO (max 160 characters)"></textarea>
                        </div>
                        <div>
                            <label for="metaKeywords" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                Keywords</label>
                            <input type="text" id="metaKeywords" name="meta_keywords"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="keyword1, keyword2, keyword3">
                        </div>
                        <div>
                            <label for="canonicalUrl" class="block text-sm font-medium text-gray-700 mb-2">Canonical
                                URL</label>
                            <input type="text" id="canonicalUrl" name="canonical_url"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="https://example.com/product-url">
                        </div>
                    </div>
                </div>

                <!-- Dimensions & Weight -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Dimensions & Weight</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700 mb-2">Weight (kg)</label>
                            <input type="number" id="weight" name="weight" step="0.01" min="0"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="0.00">
                        </div>
                        <div>
                            <label for="length" class="block text-sm font-medium text-gray-700 mb-2">Length (cm)</label>
                            <input type="number" id="length" name="length" step="0.01" min="0"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="0.00">
                        </div>
                        <div>
                            <label for="width" class="block text-sm font-medium text-gray-700 mb-2">Width (cm)</label>
                            <input type="number" id="width" name="width" step="0.01" min="0"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="0.00">
                        </div>
                        <div>
                            <label for="height" class="block text-sm font-medium text-gray-700 mb-2">Height (cm)</label>
                            <input type="number" id="height" name="height" step="0.01" min="0"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="0.00">
                        </div>
                    </div>
                </div>

                <!-- Additional Settings -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Additional Settings</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox" id="isFeatured" name="is_featured"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="isFeatured" class="ml-2 text-sm text-gray-700">
                                    Featured Product
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="isNew" name="is_new"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="isNew" class="ml-2 text-sm text-gray-700">
                                    Mark as New
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="isBestseller" name="is_bestseller"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="isBestseller" class="ml-2 text-sm text-gray-700">
                                    Mark as Bestseller
                                </label>
                            </div>
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select id="status" name="status" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="draft">Draft</option>
                                <option value="pending">Pending Review</option>
                                <option value="active" selected>Published</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 border-t pt-6">
                    <a href="{{ route('admin.products.index') }}" class="btn-secondary px-6 py-3">Cancel</a>
                    <button type="submit" id="submitBtn" class="btn-primary px-6 py-3">
                        <i class="fas fa-save mr-2"></i>Save Product
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Media Library Modal -->
    <div id="mediaLibraryModal"
        class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl max-w-6xl w-full max-h-[90vh] overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800" id="mediaModalTitle">Select Image</h3>
                <button onclick="closeMediaLibrary()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 120px)">
                <div class="mb-4">
                    <div class="relative" style="width: 300px;">
                        <input type="text" id="mediaSearchInput" placeholder="Search media..."
                            class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <div id="mediaGrid"
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 overflow-y-auto"
                    style="max-height: 60vh;">
                    <!-- Media items will be loaded here -->
                </div>

                <div class="flex justify-end space-x-4 mt-6 pt-6 border-t">
                    <button type="button" onclick="closeMediaLibrary()" class="btn-secondary">Cancel</button>
                    <button type="button" onclick="confirmMediaSelection()" class="btn-primary">
                        <i class="fas fa-check mr-2"></i>Select
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Variant Image Modal -->
    <div id="variantImageModal"
        class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800" id="variantModalTitle">Select Variant Images</h3>
                <button onclick="closeVariantImageModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 120px)">
                <div class="mb-4">
                    <div class="relative" style="width: 300px;">
                        <input type="text" id="variantMediaSearchInput" placeholder="Search media..."
                            class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <div id="variantMediaGrid"
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 overflow-y-auto mb-6"
                    style="max-height: 50vh;">
                    <!-- Media items will be loaded here -->
                </div>

                <!-- Gallery Images Selection for Variants -->
                <div class="mt-6 pt-6 border-t">
                    <h4 class="text-md font-semibold text-gray-700 mb-3">Gallery Images (Optional)</h4>
                    <div id="variantGalleryPreview"
                        class="grid grid-cols-4 gap-3 mb-3 min-h-[80px] p-3 border border-gray-200 rounded-xl">
                        <div class="col-span-4 text-center text-gray-500 text-sm py-4">
                            No gallery images selected
                        </div>
                    </div>
                    <button type="button" onclick="openVariantGalleryPicker()" class="btn-secondary w-full mb-4">
                        <i class="fas fa-plus mr-2"></i>Add Gallery Images
                    </button>
                </div>

                <div class="flex justify-end space-x-4 mt-6 pt-6 border-t">
                    <button type="button" onclick="closeVariantImageModal()" class="btn-secondary">Cancel</button>
                    <button type="button" onclick="confirmVariantImages()" class="btn-primary">
                        <i class="fas fa-check mr-2"></i>Select Images
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #d1d5db !important;
            border-radius: 0.5rem !important;
            padding: 0.5rem !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.1) !important;
        }

        .select2-container .select2-search--inline .select2-search__field {
            margin-top: 0 !important;
        }

        .specification-input {
            min-width: 200px;
        }

        .variant-input {
            min-width: 120px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Axios instance
        const axiosInstance = axios.create({
            baseURL: '{{ url('') }}/api/admin',
            headers: {
                'Authorization': `Bearer ${window.ADMIN_API_TOKEN || "{{ session('admin_api_token') }}"}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        });

        // Global variables
        let selectedMediaType = null;
        let selectedMediaId = null;
        let selectedMediaUrl = null;
        let selectedGalleryImages = [];
        let selectedVariantGalleryImages = [];
        let currentVariantForImages = null;
        let variantImages = {};
        let categoryAttributes = [];
        let selectedAttributes = {};
        let generatedVariants = [];
        let currentCategoryId = null;
        let specificationsData = {};

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Product create page loaded');

            // Initialize form
            initProductForm();

            // Load initial data
            loadInitialData();

            // Setup event listeners
            setupEventListeners();


            // Force update UI on load
            updateProductTypeUI();
        });

        // Initialize product form
        function initProductForm() {
            // Auto-generate slug from product name
            document.getElementById('productName').addEventListener('blur', function() {
                const name = this.value.trim();
                if (name) {
                    const slugInput = document.getElementById('productSlug');
                    if (!slugInput.value) {
                        const slug = name.toLowerCase()
                            .replace(/[^a-z0-9 -]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-')
                            .substring(0, 255);
                        slugInput.value = slug;
                    }
                }
            });

            // Auto-generate product code from name
            document.getElementById('productName').addEventListener('input', function() {
                const name = this.value.trim();
                if (name) {
                    const codeInput = document.getElementById('productCode');
                    if (!codeInput.value) {
                        const code = name.toUpperCase()
                            .replace(/[^A-Z0-9]/g, '')
                            .substring(0, 20);
                        codeInput.value = 'PROD-' + code;
                    }
                }
            });

            // Auto-generate SKU from product name for simple product
            document.getElementById('productName').addEventListener('blur', function() {
                const name = this.value.trim();
                if (name) {
                    const skuInput = document.getElementById('simpleSku');
                    if (!skuInput.value) {
                        const sku = name.toUpperCase()
                            .replace(/[^A-Z0-9]/g, '')
                            .substring(0, 20);
                        skuInput.value = sku + '-001';
                    }
                }
            });

            // Product type option click - ONLY ONE SET OF LISTENERS
            document.querySelectorAll('.product-type-option').forEach(option => {
                option.addEventListener('click', function(e) {
                    // Prevent multiple triggers
                    e.stopPropagation();

                    const radio = this.querySelector('input[type="radio"]');
                    if (!radio.checked) {
                        radio.checked = true;

                        // Update UI styling
                        document.querySelectorAll('.product-type-option').forEach(opt => {
                            opt.querySelector('div').classList.remove('border-indigo-500',
                                'text-indigo-600');
                            opt.querySelector('div').classList.add('border-gray-200',
                                'text-gray-400');
                            opt.querySelector('i').classList.remove('text-indigo-600');
                            opt.querySelector('i').classList.add('text-gray-400');
                        });

                        this.querySelector('div').classList.remove('border-gray-200', 'text-gray-400');
                        this.querySelector('div').classList.add('border-indigo-500', 'text-indigo-600');
                        this.querySelector('i').classList.remove('text-gray-400');
                        this.querySelector('i').classList.add('text-indigo-600');

                        // Call product type change
                        selectProductType(radio.value);
                    }
                });
            });

            // Also add change listeners to radio buttons directly
            document.querySelectorAll('input[name="product_type"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Update UI styling
                    document.querySelectorAll('.product-type-option').forEach(opt => {
                        opt.querySelector('div').classList.remove('border-indigo-500',
                            'text-indigo-600');
                        opt.querySelector('div').classList.add('border-gray-200', 'text-gray-400');
                        opt.querySelector('i').classList.remove('text-indigo-600');
                        opt.querySelector('i').classList.add('text-gray-400');
                    });

                    const parentOption = this.closest('.product-type-option');
                    if (parentOption) {
                        parentOption.querySelector('div').classList.remove('border-gray-200',
                            'text-gray-400');
                        parentOption.querySelector('div').classList.add('border-indigo-500',
                            'text-indigo-600');
                        parentOption.querySelector('i').classList.remove('text-gray-400');
                        parentOption.querySelector('i').classList.add('text-indigo-600');
                    }

                    selectProductType(this.value);
                });
            });

            // Initialize Select2 for tags
            $('#tags').select2({
                tags: true,
                placeholder: 'Select or create tags',
                allowClear: true,
                multiple: true,
                width: '100%',
                createTag: function(params) {
                    return {
                        id: params.term,
                        text: params.term,
                        newTag: true
                    };
                }
            });

            // Initialize Select2 for additional categories
            $('#additionalCategories').select2({
                placeholder: 'Select additional categories',
                allowClear: true,
                multiple: true,
                width: '100%'
            });

            // Initialize UI with selected product type
            updateProductTypeUI();
        }

        // Add this new function to update UI styling
        function updateProductTypeUI() {
            const selectedRadio = document.querySelector('input[name="product_type"]:checked');
            if (selectedRadio) {
                document.querySelectorAll('.product-type-option').forEach(opt => {
                    opt.querySelector('div').classList.remove('border-indigo-500', 'text-indigo-600');
                    opt.querySelector('div').classList.add('border-gray-200', 'text-gray-400');
                    opt.querySelector('i').classList.remove('text-indigo-600');
                    opt.querySelector('i').classList.add('text-gray-400');
                });

                const parentOption = selectedRadio.closest('.product-type-option');
                if (parentOption) {
                    parentOption.querySelector('div').classList.remove('border-gray-200', 'text-gray-400');
                    parentOption.querySelector('div').classList.add('border-indigo-500', 'text-indigo-600');
                    parentOption.querySelector('i').classList.remove('text-gray-400');
                    parentOption.querySelector('i').classList.add('text-indigo-600');
                }
            }
        }


        // Load initial data
        async function loadInitialData() {
            try {
                const [categories, brands, taxClasses, tags] = await Promise.all([
                    loadCategories(),
                    loadBrands(),
                    loadTaxClasses(),
                    loadTags()
                ]);

                console.log('All initial data loaded');
            } catch (error) {
                console.error('Error loading initial data:', error);
                toastr.error('Failed to load initial data');
            }
        }

        // Load categories
        async function loadCategories() {
            try {
                const response = await axiosInstance.get('/categories/dropdown');
                if (response.data.success) {
                    const categories = response.data.data;
                    const select = document.getElementById('categoryId');
                    const additionalSelect = document.getElementById('additionalCategories');

                    select.innerHTML = '<option value="">Select Category</option>';

                    // Clear additional categories select2
                    $('#additionalCategories').empty();
                    $('#additionalCategories').append('<option value="">Select Additional Categories</option>');

                    function addOptions(categoryList, level = 0, targetElement, isSelect2 = false) {
                        categoryList.forEach(category => {
                            const prefix = '— '.repeat(level);
                            if (isSelect2) {
                                const option = new Option(prefix + category.name, category.id, false, false);
                                targetElement.append(option);
                            } else {
                                const option = document.createElement('option');
                                option.value = category.id;
                                option.textContent = prefix + category.name;
                                targetElement.appendChild(option);
                            }

                            if (category.children && category.children.length > 0) {
                                addOptions(category.children, level + 1, targetElement, isSelect2);
                            }
                        });
                    }

                    addOptions(categories, 0, select);
                    addOptions(categories, 0, $('#additionalCategories'), true);
                }
            } catch (error) {
                console.error('Error loading categories:', error);
                toastr.error('Failed to load categories');
            }
        }

        // Load brands
        async function loadBrands() {
            try {
                const response = await axiosInstance.get('/brands/dropdown');
                if (response.data.success) {
                    const brands = response.data.data;
                    const select = document.getElementById('brandId');
                    select.innerHTML = '<option value="">Select Brand</option>';

                    brands.forEach(brand => {
                        const option = document.createElement('option');
                        option.value = brand.id;
                        option.textContent = brand.name;
                        select.appendChild(option);
                    });
                }
            } catch (error) {
                console.error('Error loading brands:', error);
                toastr.error('Failed to load brands');
            }
        }

        // Load tax classes
        async function loadTaxClasses() {
            try {
                const response = await axiosInstance.get('/tax-classes/dropdown');
                if (response.data.success) {
                    const taxClasses = response.data.data;
                    const select = document.getElementById('taxClassId');
                    select.innerHTML = '<option value="">Select Tax Class</option>';

                    taxClasses.forEach(taxClass => {
                        const option = document.createElement('option');
                        option.value = taxClass.id;
                        option.textContent = `${taxClass.name} (${taxClass.rate}%)`;
                        select.appendChild(option);
                    });
                }
            } catch (error) {
                console.error('Error loading tax classes:', error);
            }
        }

        // Load tags
        async function loadTags() {
            try {
                const response = await axiosInstance.get('/tags/dropdown');
                if (response.data.success) {
                    const tags = response.data.data;
                    const select = $('#tags');

                    select.empty();
                    tags.forEach(tag => {
                        const option = new Option(tag.name, tag.id, false, false);
                        select.append(option);
                    });

                    // Trigger change to refresh Select2
                    select.trigger('change');
                }
            } catch (error) {
                console.error('Error loading tags:', error);
            }
        }

        // Setup event listeners
        function setupEventListeners() {
            // Category change event
            document.getElementById('categoryId').addEventListener('change', async function() {
                const categoryId = this.value;
                currentCategoryId = categoryId;

                if (categoryId) {
                    // Load category specifications
                    await loadCategorySpecifications(categoryId);

                    // Load category attributes for variants
                    await loadCategoryAttributes(categoryId);
                } else {
                    // Clear specifications and attributes
                    document.getElementById('specificationsContainer').innerHTML = `
                    <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                        Select a category to load specifications
                    </div>
                `;

                    document.getElementById('attributeSelection').innerHTML = `
                    <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                        Select a category to load attributes for variants
                    </div>
                `;

                    document.getElementById('generateVariantsBtn').classList.add('hidden');
                    document.getElementById('variantsContainer').classList.add('hidden');
                }
            });

            // Form submission
            document.getElementById('productForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveProduct();
            });

            // Check SKU availability
            document.getElementById('simpleSku').addEventListener('blur', function() {
                checkSkuAvailability(this.value);
            });
        }

        // Select product type
        function selectProductType(type) {
            console.log('Selecting product type:', type); // Debug log

            if (type === 'simple') {
                // Show simple product fields
                document.getElementById('simpleProductFields').classList.remove('hidden');
                document.getElementById('simpleProductImageSection').classList.remove('hidden');
                document.getElementById('simpleGallerySection').classList.remove('hidden');

                // Hide configurable product fields
                document.getElementById('configurableProductFields').classList.add('hidden');
                document.getElementById('variantsSection').classList.add('hidden');

                // Enable simple fields
                setContainerState('simpleProductFields', true);

            } else if (type === 'configurable') {
                // Hide simple product fields
                document.getElementById('simpleProductFields').classList.add('hidden');
                document.getElementById('simpleProductImageSection').classList.add('hidden');
                document.getElementById('simpleGallerySection').classList.add('hidden');

                // Show configurable product fields
                document.getElementById('configurableProductFields').classList.remove('hidden');

                // Disable simple fields
                setContainerState('simpleProductFields', false);

                // Show variants section if category is selected
                if (currentCategoryId) {
                    document.getElementById('variantsSection').classList.remove('hidden');
                } else {
                    // If no category selected, show message
                    document.getElementById('variantsSection').classList.remove('hidden');
                    document.getElementById('attributeSelection').innerHTML = `
                <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                    Please select a category first to load attributes for variants
                </div>
            `;
                }
            }
        }



        // Load category specifications
        async function loadCategorySpecifications(categoryId) {
            try {
                const container = document.getElementById('specificationsContainer');
                container.innerHTML = `
                <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                    <i class="fas fa-spinner fa-spin mr-2"></i>Loading specifications...
                </div>
            `;

                const response = await axiosInstance.get(`/products/category/${categoryId}/specifications`);

                if (response.data.success) {
                    const specificationGroups = response.data.data;
                    specificationsData = specificationGroups;

                    if (!specificationGroups || specificationGroups.length === 0) {
                        container.innerHTML = `
                        <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                            No specifications found for this category
                        </div>
                    `;
                        return;
                    }

                    let html = '<div class="space-y-8">';

                    specificationGroups.forEach((group) => {
                        if (group.specifications && group.specifications.length > 0) {
                            html += `
                            <div class="specification-group border rounded-xl p-6">
                                ${group.group_name ? `
                                                    <div class="mb-4 pb-3 border-b">
                                                        <h4 class="text-lg font-semibold text-gray-800">${group.group_name}</h4>
                                                        ${group.group_description ? `<p class="text-sm text-gray-600 mt-1">${group.group_description}</p>` : ''}
                                                    </div>
                                                ` : ''}

                                <div class="space-y-6">
                        `;

                            group.specifications.forEach((spec) => {
                                const specKey = `spec_${spec.id}`;
                                html += `
                                <div class="specification-item p-4 border rounded-lg">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        ${spec.name}
                                        ${spec.is_required ? '<span class="text-rose-500 ml-1">*</span>' : ''}
                                    </label>

                                    ${renderSpecificationInput(spec, specKey)}

                                    ${spec.description ? `
                                                        <p class="text-xs text-gray-500 mt-2">${spec.description}</p>
                                                    ` : ''}
                                </div>
                            `;
                            });

                            html += `
                                </div>
                            </div>
                        `;
                        }
                    });

                    html += '</div>';
                    container.innerHTML = html;

                    // Initialize multiselect for specifications
                    initializeSpecificationSelects();
                } else {
                    container.innerHTML = `
                    <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                        No specifications found for this category
                    </div>
                `;
                }
            } catch (error) {
                console.error('Error loading specifications:', error);
                container.innerHTML = `
                <div class="text-sm text-rose-500 p-4 bg-rose-50 rounded-lg text-center">
                    Failed to load specifications: ${error.message}
                </div>
            `;
            }
        }

        // Initialize specification select inputs
        function initializeSpecificationSelects() {
            // Find all multiselect specification inputs
            document.querySelectorAll('select[data-input-type="multiselect"]').forEach(select => {
                $(select).select2({
                    placeholder: 'Select options',
                    allowClear: true,
                    multiple: true,
                    width: '100%'
                });
            });
        }

        // Render specification input
        function renderSpecificationInput(spec, specKey) {
            let inputHtml = `
            <input type="hidden" name="specifications[${specKey}][specification_id]" value="${spec.id}">
        `;

            const inputType = spec.input_type || 'text';
            const isRequired = spec.is_required || false;
            const values = spec.values || [];

            switch (inputType) {
                case 'textarea':
                    inputHtml += `
                    <textarea name="specifications[${specKey}][custom_value]"
                        ${isRequired ? 'required' : ''}
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent specification-input"
                        placeholder="Enter ${spec.name}"></textarea>
                `;
                    break;

                case 'multiselect':
                    if (values.length > 0) {
                        inputHtml += `
                        <select name="specifications[${specKey}][specification_value_ids][]"
                            ${isRequired ? 'required' : ''}
                            multiple
                            data-input-type="multiselect"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent specification-input">
                            ${values.map(value => `
                                                <option value="${value.id}">${value.label || value.value}</option>
                                            `).join('')}
                        </select>
                    `;
                    } else {
                        inputHtml += `
                        <input type="text" name="specifications[${specKey}][custom_value]"
                            ${isRequired ? 'required' : ''}
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent specification-input"
                            placeholder="Enter ${spec.name}">
                    `;
                    }
                    break;

                case 'select':
                    if (values.length > 0) {
                        inputHtml += `
                        <div class="flex gap-2">
                            <select name="specifications[${specKey}][specification_value_id]"
                                ${isRequired ? 'required' : ''}
                                class="flex-grow border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent specification-input">
                                <option value="">Select ${spec.name}</option>
                                ${values.map(value => `
                                                    <option value="${value.id}">${value.label || value.value}</option>
                                                `).join('')}
                            </select>
                            <button type="button" onclick="addCustomSpecificationValue('${specKey}')"
                                class="btn-secondary px-3 py-2 text-sm">
                                <i class="fas fa-plus mr-1"></i>Custom
                            </button>
                        </div>
                        <div id="custom_${specKey}" class="hidden mt-2">
                            <input type="text" name="specifications[${specKey}][custom_value]"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="Enter custom value">
                        </div>
                    `;
                    } else {
                        inputHtml += `
                        <input type="text" name="specifications[${specKey}][custom_value]"
                            ${isRequired ? 'required' : ''}
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent specification-input"
                            placeholder="Enter ${spec.name}">
                    `;
                    }
                    break;

                case 'checkbox':
                    inputHtml += `
                    <label class="flex items-center">
                        <input type="checkbox" name="specifications[${specKey}][custom_value]" value="1"
                            ${isRequired ? 'required' : ''}
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">${spec.name}</span>
                    </label>
                `;
                    break;

                case 'radio':
                    if (values.length > 0) {
                        let radioHtml = '<div class="space-y-2">';
                        values.forEach((value, index) => {
                            radioHtml += `
                            <label class="flex items-center">
                                <input type="radio" name="specifications[${specKey}][custom_value]"
                                       value="${value.value}"
                                       ${index === 0 && isRequired ? 'required' : ''}
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                <span class="ml-2 text-sm text-gray-700">${value.label || value.value}</span>
                            </label>
                        `;
                        });
                        radioHtml += `
                        <div class="flex items-center mt-2">
                            <input type="radio" name="specifications[${specKey}][custom_value]"
                                   id="custom_radio_${specKey}"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <input type="text" id="custom_radio_input_${specKey}"
                                   placeholder="Custom value"
                                   class="ml-2 flex-grow border border-gray-300 rounded-lg px-3 py-1 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                   onchange="document.getElementById('custom_radio_${specKey}').value = this.value">
                        </div>
                    `;
                        radioHtml += '</div>';
                        inputHtml += radioHtml;
                    } else {
                        inputHtml += `
                        <input type="text" name="specifications[${specKey}][custom_value]"
                            ${isRequired ? 'required' : ''}
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent specification-input"
                            placeholder="Enter ${spec.name}">
                    `;
                    }
                    break;

                default: // text, number, etc.
                    const htmlInputType = inputType === 'number' ? 'number' : 'text';
                    inputHtml += `
                    <input type="${htmlInputType}" name="specifications[${specKey}][custom_value]"
                        ${isRequired ? 'required' : ''}
                        ${htmlInputType === 'number' ? 'step="any"' : ''}
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent specification-input"
                        placeholder="Enter ${spec.name}">
                `;
            }

            return inputHtml;
        }

        // Add custom specification value
        function addCustomSpecificationValue(specKey) {
            const customDiv = document.getElementById(`custom_${specKey}`);
            const select = document.querySelector(`select[name="specifications[${specKey}][specification_value_id]"]`);

            if (customDiv.classList.contains('hidden')) {
                customDiv.classList.remove('hidden');
                if (select) select.required = false;
            } else {
                customDiv.classList.add('hidden');
                if (select) select.required = true;
            }
        }

        // Load category attributes
        async function loadCategoryAttributes(categoryId) {
            try {
                const container = document.getElementById('attributeSelection');
                container.innerHTML = `
                <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                    <i class="fas fa-spinner fa-spin mr-2"></i>Loading attributes...
                </div>
            `;

                const response = await axiosInstance.get(`/products/category/${categoryId}/attributes`);

                if (response.data.success) {
                    categoryAttributes = response.data.data;

                    if (!categoryAttributes || categoryAttributes.length === 0) {
                        container.innerHTML = `
                        <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                            No attributes found for variants in this category
                        </div>
                    `;
                        document.getElementById('generateVariantsBtn').classList.add('hidden');
                        return;
                    }

                    let html = '<div class="space-y-6">';

                    categoryAttributes.forEach(attribute => {
                        const attributeId = `attr-${attribute.id}`;
                        html += `
                        <div class="attribute-item border rounded-xl p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <h5 class="font-medium text-gray-800">${attribute.name}</h5>
                                    <div class="flex items-center space-x-2 mt-1">
                                        <span class="text-xs px-2 py-1 bg-gray-100 rounded">${attribute.type}</span>
                                        ${attribute.is_required ? '<span class="text-xs px-2 py-1 bg-red-100 text-red-800 rounded">Required</span>' : ''}
                                        <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded">Variant</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <label class="flex items-center">
                                        <input type="checkbox"
                                               id="${attributeId}"
                                               data-attribute-id="${attribute.id}"
                                               data-attribute-name="${attribute.name}"
                                               class="attribute-select-checkbox h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-700">Use for variants</span>
                                    </label>
                                </div>
                            </div>
                            <div class="attribute-options-container hidden mt-4" id="options-${attribute.id}">
                                <h6 class="text-sm font-medium text-gray-700 mb-2">Select Options:</h6>
                                ${renderAttributeOptions(attribute)}
                            </div>
                        </div>
                    `;
                    });

                    html += '</div>';
                    container.innerHTML = html;
                    document.getElementById('generateVariantsBtn').classList.remove('hidden');

                    // Setup event listeners for attribute selection
                    setupAttributeEventListeners();

                } else {
                    container.innerHTML = `
                    <div class="text-sm text-gray-500 p-4 bg-gray-50 rounded-lg text-center">
                        No attributes found for variants in this category
                    </div>
                `;
                }
            } catch (error) {
                console.error('Error loading attributes:', error);
                container.innerHTML = `
                <div class="text-sm text-rose-500 p-4 bg-rose-50 rounded-lg text-center">
                    Failed to load attributes: ${error.message}
                </div>
            `;
            }
        }

        // Render attribute options
        function renderAttributeOptions(attribute) {
            if (!attribute.options || attribute.options.length === 0) {
                return `
                <div class="text-sm text-gray-500 p-3 bg-gray-50 rounded-lg text-center">
                    No predefined options. You'll need to enter values manually when creating variants.
                </div>
            `;
            }

            let html = `
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
        `;

            attribute.options.forEach(option => {
                const optionId = `opt-${attribute.id}-${option.id}`;
                const colorStyle = option.color_code ? `style="background-color: ${option.color_code}"` : '';
                html += `
                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                    <input type="checkbox"
                           id="${optionId}"
                           data-attribute-id="${attribute.id}"
                           data-option-id="${option.id}"
                           data-option-value="${option.value}"
                           data-option-label="${option.label || option.value}"
                           class="attribute-option-checkbox h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <div class="ml-2 flex items-center">
                        ${option.color_code ? `<div class="w-6 h-6 rounded-full mr-2 border border-gray-300" ${colorStyle}></div>` : ''}
                        ${option.image_url ? `<img src="${option.image_url}" alt="${option.label}" class="w-6 h-6 rounded mr-2 object-cover">` : ''}
                        <span class="text-sm text-gray-700">${option.label || option.value}</span>
                    </div>
                </label>
            `;
            });

            html += `
            </div>
            <div class="mt-3 text-xs text-gray-500">
                <i class="fas fa-info-circle mr-1"></i>
                Select one or more options to create variants
            </div>
        `;
            return html;
        }

        // Setup attribute event listeners
        function setupAttributeEventListeners() {
            // Attribute checkbox change
            document.addEventListener('change', function(e) {
                // Attribute selection checkboxes
                if (e.target.classList.contains('attribute-select-checkbox')) {
                    const attributeId = e.target.getAttribute('data-attribute-id');
                    const optionsContainer = document.getElementById(`options-${attributeId}`);

                    if (e.target.checked) {
                        optionsContainer.classList.remove('hidden');

                        // Initialize attribute in selectedAttributes
                        selectedAttributes[attributeId] = {
                            name: e.target.getAttribute('data-attribute-name'),
                            attribute_id: attributeId,
                            values: []
                        };
                    } else {
                        optionsContainer.classList.add('hidden');
                        delete selectedAttributes[attributeId];

                        // Uncheck all options for this attribute
                        document.querySelectorAll(`.attribute-option-checkbox[data-attribute-id="${attributeId}"]`)
                            .forEach(opt => {
                                opt.checked = false;
                            });
                    }

                    updateGenerateButton();
                }

                // Attribute option checkboxes
                if (e.target.classList.contains('attribute-option-checkbox')) {
                    const attributeId = e.target.getAttribute('data-attribute-id');
                    const attributeCheckbox = document.querySelector(
                        `.attribute-select-checkbox[data-attribute-id="${attributeId}"]`);

                    if (!attributeCheckbox || !attributeCheckbox.checked) {
                        e.target.checked = false;
                        return;
                    }

                    const optionId = e.target.getAttribute('data-option-id');
                    const optionValue = e.target.getAttribute('data-option-value');
                    const optionLabel = e.target.getAttribute('data-option-label');

                    // Initialize attribute if not exists
                    if (!selectedAttributes[attributeId]) {
                        selectedAttributes[attributeId] = {
                            name: attributeCheckbox.getAttribute('data-attribute-name'),
                            attribute_id: attributeId,
                            values: []
                        };
                    }

                    if (e.target.checked) {
                        // Add option if not already in array
                        if (!selectedAttributes[attributeId].values.some(opt => opt.id == optionId)) {
                            selectedAttributes[attributeId].values.push({
                                id: optionId,
                                value: optionValue,
                                label: optionLabel
                            });
                        }
                    } else {
                        // Remove option from array
                        selectedAttributes[attributeId].values = selectedAttributes[attributeId].values.filter(
                            opt => opt.id != optionId
                        );

                        // If no options selected, remove the attribute
                        if (selectedAttributes[attributeId].values.length === 0) {
                            delete selectedAttributes[attributeId];
                        }
                    }

                    updateGenerateButton();
                }
            });
        }

        // Update generate button state
        function updateGenerateButton() {
            const hasSelectedAttributes = Object.keys(selectedAttributes).length > 0;
            const hasSelectedOptions = Object.values(selectedAttributes).some(attr => attr.values.length > 0);

            const generateBtn = document.getElementById('generateVariantsBtn');
            if (hasSelectedAttributes && hasSelectedOptions) {
                generateBtn.classList.remove('hidden');
                generateBtn.disabled = false;
            } else {
                generateBtn.classList.add('hidden');
                document.getElementById('variantsContainer').classList.add('hidden');
                generateBtn.disabled = true;
            }
        }

        // Generate variants
        async function generateVariants() {
            // Prepare data for API call
            const attributesData = [];
            let baseSku = document.getElementById('productName').value.toUpperCase().replace(/[^A-Z0-9]/g, '')
                .substring(0, 10) || 'PRODUCT';
            let basePrice = parseFloat(document.getElementById('simplePrice')?.value) || 0;

            Object.keys(selectedAttributes).forEach(attributeId => {
                const attribute = selectedAttributes[attributeId];
                if (attribute.values.length > 0) {
                    attributesData.push({
                        attribute_id: parseInt(attributeId),
                        attribute_name: attribute.name,
                        values: attribute.values
                    });
                }
            });

            if (attributesData.length === 0) {
                toastr.warning('Please select at least one attribute with options');
                return;
            }

            // Show loading
            const generateBtn = document.getElementById('generateVariantsBtn');
            const originalText = generateBtn.innerHTML;
            generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Generating...';
            generateBtn.disabled = true;

            try {
                const response = await axiosInstance.post('/products/generate-variants', {
                    attributes: attributesData,
                    base_sku: baseSku,
                    base_price: basePrice
                });

                if (response.data.success) {
                    generatedVariants = response.data.data.variants || [];
                    displayGeneratedVariants(generatedVariants);
                    toastr.success(response.data.data.message ||
                        `${generatedVariants.length} variants generated successfully`);
                } else {
                    toastr.error(response.data.message || 'Failed to generate variants');
                }
            } catch (error) {
                console.error('Error generating variants:', error);
                toastr.error(error.response?.data?.message || 'Failed to generate variants');
            } finally {
                generateBtn.innerHTML = originalText;
                generateBtn.disabled = false;
            }
        }

        // Display generated variants
        function displayGeneratedVariants(variants) {
            const container = document.getElementById('variantsContainer');
            const tableBody = document.getElementById('variantsTableBody');
            const countElement = document.getElementById('variantsCount');

            if (!variants || variants.length === 0) {
                container.classList.add('hidden');
                toastr.warning('No variants generated');
                return;
            }

            // Update count
            countElement.textContent = `${variants.length} variant${variants.length !== 1 ? 's' : ''}`;

            // Clear table
            tableBody.innerHTML = '';

            // Add rows
            variants.forEach((variant, index) => {
                const rowId = `variant-${index}`;
                const combinationDisplay = variant.combination_display || variant.variant_name || variant.sku;

                const row = document.createElement('tr');
                row.id = rowId;
                row.className = 'variant-row hover:bg-gray-50';
                row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                    <input type="hidden" name="variants[${index}][combination]" value='${JSON.stringify(variant.combination || [])}'>
                    <input type="hidden" name="variants[${index}][attributes]" value='${JSON.stringify(variant.attributes || [])}'>
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">${combinationDisplay}</div>
                            <div class="text-sm text-gray-500">${variant.combination?.map(attr => attr.value).join(' / ') || ''}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <input type="text"
                           name="variants[${index}][sku]"
                           value="${variant.sku}"
                           required
                           class="w-full min-w-[150px] border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent variant-input"
                           placeholder="Variant-SKU">
                </td>
                <td class="px-6 py-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">₹</span>
                        </div>
                        <input type="number"
                               name="variants[${index}][price]"
                               value="${variant.price || 0}"
                               step="0.01"
                               min="0"
                               required
                               class="pl-8 w-full min-w-[120px] border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent variant-input"
                               placeholder="0.00">
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">₹</span>
                        </div>
                        <input type="number"
                               name="variants[${index}][compare_price]"
                               value="${variant.compare_price || ''}"
                               step="0.01"
                               min="0"
                               class="pl-8 w-full min-w-[120px] border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent variant-input"
                               placeholder="0.00">
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">₹</span>
                        </div>
                        <input type="number"
                               name="variants[${index}][cost_price]"
                               value="${variant.cost_price || ''}"
                               step="0.01"
                               min="0"
                               class="pl-8 w-full min-w-[120px] border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent variant-input"
                               placeholder="0.00">
                    </div>
                </td>
                <td class="px-6 py-4">
                    <input type="number"
                           name="variants[${index}][stock_quantity]"
                           value="${variant.stock_quantity || 0}"
                           min="0"
                           required
                           class="w-full min-w-[100px] border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent variant-input"
                           placeholder="0">
                </td>
                <td class="px-6 py-4">
                    <select name="variants[${index}][status]"
                            class="w-full min-w-[120px] border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent variant-input">
                        <option value="active" ${variant.status === 'active' ? 'selected' : ''}>Active</option>
                        <option value="inactive" ${variant.status === 'inactive' ? 'selected' : ''}>Inactive</option>
                        <option value="draft" ${variant.status === 'draft' ? 'selected' : ''}>Draft</option>
                    </select>
                </td>
                <td class="px-6 py-4">
                    <button type="button"
                            onclick="openVariantImageModal('${rowId}')"
                            class="btn-secondary text-sm px-4 py-2">
                        <i class="fas fa-image mr-2"></i>Select Images
                    </button>
                    <div class="variant-images-preview mt-2 space-y-2" id="${rowId}-images">
                        ${variantImages[rowId] ? `
                                            <div class="flex items-center space-x-2">
                                                <img src="${variantImages[rowId].main_url}" class="w-12 h-12 rounded object-cover">
                                                <span class="text-xs text-gray-600">Main</span>
                                            </div>
                                            ${variantImages[rowId].gallery_urls?.length ? `
                                <div class="text-xs text-gray-500">+${variantImages[rowId].gallery_urls.length} gallery images</div>
                            ` : ''}
                                        ` : ''}
                    </div>
                    <input type="hidden" name="variants[${index}][main_image_id]" id="${rowId}-main-image-id" value="${variantImages[rowId]?.main_id || ''}">
                    <input type="hidden" name="variants[${index}][gallery_image_ids]" id="${rowId}-gallery-image-ids" value="${variantImages[rowId]?.gallery_ids ? JSON.stringify(variantImages[rowId].gallery_ids) : ''}">
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-center">
                        <input type="radio" name="default_variant" value="${index}" ${variant.is_default ? 'checked' : ''}
                               class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-center">
                        <button type="button"
                                onclick="removeVariant('${rowId}')"
                                class="text-rose-600 hover:text-rose-800 p-2 rounded-full hover:bg-rose-50">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            `;

                tableBody.appendChild(row);
            });

            container.classList.remove('hidden');
        }

        // Check SKU availability
        async function checkSkuAvailability(sku) {
            if (!sku) return false;

            try {
                const response = await axiosInstance.post('/products/check-sku', {
                    sku: sku
                });

                if (response.data.success) {
                    const available = response.data.data.available;
                    const errorElement = document.getElementById('skuError');

                    if (!available) {
                        errorElement.textContent = 'This SKU is already in use';
                        errorElement.classList.remove('hidden');
                        return false;
                    } else {
                        errorElement.classList.add('hidden');
                        return true;
                    }
                }
            } catch (error) {
                console.error('Error checking SKU:', error);
            }
            return false;
        }

        // Save product
        async function saveProduct() {
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
            submitBtn.disabled = true;

            // Clear previous errors
            document.querySelectorAll('[id$="Error"]').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });

            try {
                // Collect form data
                const formData = new FormData(document.getElementById('productForm'));
                const data = {};

                // Get product type
                const productType = document.querySelector('input[name="product_type"]:checked').value;
                data.product_type = productType;

                // Convert FormData to object with proper array handling
                for (let [key, value] of formData.entries()) {
                    // Handle arrays
                   if (key.endsWith('[]')) {
    const cleanKey = key.slice(0, -2);

    if (!data[cleanKey]) {
        data[cleanKey] = [];
    }

    // Push values normally
    if (cleanKey === 'gallery_image_ids') {
        const numValue = parseInt(value);
        if (!isNaN(numValue)) {
            data[cleanKey].push(numValue);
        }
    } else if (cleanKey === 'category_ids' || cleanKey === 'tag_ids') {
        const numValue = parseInt(value);
        if (!isNaN(numValue)) {
            data[cleanKey].push(numValue);
        }
    } else {
        data[cleanKey].push(value);
    }
}
 else {
                        // Handle special cases
                        if (key === 'main_category_id' || key === 'brand_id' || key === 'tax_class_id') {
                            data[key] = value ? parseInt(value) : null;
                        } else if (key === 'price' || key === 'compare_price' || key === 'cost_price') {
                            data[key] = value ? parseFloat(value) : null;
                        } else if (key === 'stock_quantity' || key === 'weight' || key === 'length' ||
                            key === 'width' || key === 'height') {
                            data[key] = value ? parseFloat(value) : null;
                        } else if (key === 'is_featured' || key === 'is_new' || key === 'is_bestseller' || key ===
                            'manage_stock') {
                            data[key] = value === 'on' ? true : false;
                        } else if (key === 'status') {
                            data[key] = value;
                        } else if (key === 'main_image_id') {
                            data[key] = value ? parseInt(value) : null;
                        } else if (key === 'gallery_image_ids') {
                            // Already handled above
                        } else {
                            data[key] = value;
                        }
                    }
                }

                // Ensure arrays exist
                if (!data.category_ids) data.category_ids = [];
                if (!data.tag_ids) data.tag_ids = [];
                if (!data.gallery_image_ids) data.gallery_image_ids = [];

                // Handle specifications
                const specifications = [];
                const specInputs = document.querySelectorAll('[name^="specifications["]');

                // Group specifications by their ID
                const specMap = {};
                specInputs.forEach(input => {
                    const name = input.name;
                    const matches = name.match(/specifications\[([^\]]+)\]\[(\w+)\]/);
                    if (matches) {
                        const specKey = matches[1];
                        const field = matches[2];

                        if (!specMap[specKey]) {
                            specMap[specKey] = {};
                        }

                        if (field === 'specification_id') {
                            specMap[specKey][field] = parseInt(input.value);
                        } else if (field === 'specification_value_id') {
                            specMap[specKey][field] = input.value ? parseInt(input.value) : null;
                        } else if (field === 'specification_value_ids') {
                            if (!specMap[specKey][field]) {
                                specMap[specKey][field] = [];
                            }
                            specMap[specKey][field].push(parseInt(input.value));
                        } else if (field === 'custom_value') {
                            if (input.type === 'checkbox') {
                                specMap[specKey][field] = input.checked ? input.value : null;
                            } else {
                                specMap[specKey][field] = input.value || null;
                            }
                        }
                    }
                });

                // Convert map to array
                Object.values(specMap).forEach(spec => {
                    if (spec.specification_id) {
                        specifications.push(spec);
                    }
                });

                if (specifications.length > 0) {
                    data.specifications = specifications;
                }

                // Handle simple product fields
                if (productType === 'simple') {
                    // Ensure required fields exist
                    if (!data.sku && document.getElementById('simpleSku')) {
                        data.sku = document.getElementById('simpleSku').value;
                    }
                    if (!data.price && document.getElementById('simplePrice')) {
                        data.price = parseFloat(document.getElementById('simplePrice').value) || 0;
                    }
                    if (!data.compare_price && document.getElementById('simpleComparePrice')) {
                        const comparePrice = document.getElementById('simpleComparePrice').value;
                        data.compare_price = comparePrice ? parseFloat(comparePrice) : null;
                    }
                    if (!data.cost_price && document.getElementById('simpleCostPrice')) {
                        const costPrice = document.getElementById('simpleCostPrice').value;
                        data.cost_price = costPrice ? parseFloat(costPrice) : null;
                    }
                    if (!data.stock_quantity && document.getElementById('simpleStock')) {
                        data.stock_quantity = parseInt(document.getElementById('simpleStock').value) || 0;
                    }
                    if (!data.stock_status && document.getElementById('simpleStockStatus')) {
                        data.stock_status = document.getElementById('simpleStockStatus').value;
                    }
                    if (data.manage_stock === undefined) {
                        data.manage_stock = document.getElementById('manageStock')?.checked || false;
                    }

                    // For simple products, create variants array with single variant
                    data.variants = [{
                        sku: data.sku,
                        price: data.price,
                        compare_price: data.compare_price,
                        cost_price: data.cost_price,
                        stock_quantity: data.stock_quantity,
                        status: data.status || 'active',
                        is_default: true,
                        main_image_id: data.main_image_id,
                        gallery_image_ids: data.gallery_image_ids || []
                    }];
                } else {
                    // Handle configurable product variants
                    const variants = [];
                    const variantRows = document.querySelectorAll('.variant-row');

                    variantRows.forEach((row, index) => {
                        const variant = {
                            sku: row.querySelector(`input[name="variants[${index}][sku]"]`)?.value,
                            price: parseFloat(row.querySelector(`input[name="variants[${index}][price]"]`)
                                ?.value) || 0,
                            compare_price: row.querySelector(
                                    `input[name="variants[${index}][compare_price]"]`)?.value ?
                                parseFloat(row.querySelector(
                                    `input[name="variants[${index}][compare_price]"]`).value) : null,
                            cost_price: row.querySelector(`input[name="variants[${index}][cost_price]"]`)
                                ?.value ?
                                parseFloat(row.querySelector(`input[name="variants[${index}][cost_price]"]`)
                                    .value) : null,
                            stock_quantity: parseInt(row.querySelector(
                                `input[name="variants[${index}][stock_quantity]"]`)?.value) || 0,
                            status: row.querySelector(`select[name="variants[${index}][status]"]`)?.value ||
                                'active',
                            is_default: document.querySelector(
                                `input[name="default_variant"][value="${index}"]`)?.checked || false
                        };

                        // Get attributes from hidden input
                        const attributesInput = row.querySelector(
                            `input[name="variants[${index}][attributes]"]`);
                        if (attributesInput && attributesInput.value) {
                            try {
                                const attributes = JSON.parse(attributesInput.value);
                                variant.attributes = attributes;
                            } catch (e) {
                                console.error('Error parsing attributes:', e);
                            }
                        }

                        // Get combination
                        const combinationInput = row.querySelector(
                            `input[name="variants[${index}][combination]"]`);
                        if (combinationInput && combinationInput.value) {
                            try {
                                const combination = JSON.parse(combinationInput.value);
                                variant.combination = combination;
                            } catch (e) {
                                console.error('Error parsing combination:', e);
                            }
                        }

                        // Handle variant images
                        const mainImageId = document.getElementById(`${row.id}-main-image-id`)?.value;
                        if (mainImageId) {
                            variant.main_image_id = parseInt(mainImageId);
                        }

                        const galleryIds = document.getElementById(`${row.id}-gallery-image-ids`)?.value;
                        if (galleryIds) {
                            try {
                                const parsed = JSON.parse(galleryIds);
                                if (Array.isArray(parsed)) {
                                    variant.gallery_image_ids = parsed.filter(id => !isNaN(id));
                                }
                            } catch (e) {
                                variant.gallery_image_ids = galleryIds.split(',')
                                    .filter(id => id.trim() !== '')
                                    .map(id => parseInt(id))
                                    .filter(id => !isNaN(id));
                            }
                        } else {
                            variant.gallery_image_ids = [];
                        }

                        variants.push(variant);
                    });

                    data.variants = variants;
                }

                // Remove the token from data (not needed for API)
                delete data._token;

                console.log('Sending data:', data);

                const response = await axiosInstance.post('/products', data);

                if (response.data.success) {
                    toastr.success('Product created successfully!');

                    // Redirect after delay
                    setTimeout(() => {
                        window.location.href = '{{ route('admin.products.index') }}';
                    }, 1500);
                } else {
                    toastr.error(response.data.message || 'Failed to save product');
                }
            } catch (error) {
                console.error('Save error:', error.response || error);

                if (error.response && error.response.status === 422) {
                    // Handle validation errors
                    const errors = error.response.data.errors;

                    Object.keys(errors).forEach(field => {
                        // Map field names to error element IDs
                        let errorElementId = field + 'Error';

                        const errorElement = document.getElementById(errorElementId);
                        if (errorElement) {
                            errorElement.textContent = errors[field][0];
                            errorElement.classList.remove('hidden');
                        } else {
                            // If no specific element, show general error
                            toastr.error(`${field}: ${errors[field][0]}`);
                        }
                    });

                    toastr.error('Please fix the validation errors');
                } else {
                    toastr.error(error.response?.data?.message || 'Failed to save product. Please try again.');
                }
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        }

        // ==================== MEDIA LIBRARY FUNCTIONS ====================

        // Open media picker
        async function openMediaPicker(type) {
            selectedMediaType = type;

            try {
                const response = await axiosInstance.get('/media');
                if (response.data.success) {
                    const mediaItems = response.data.data.data || response.data.data || [];

                    console.log('Media items loaded:', mediaItems.length);

                    const mediaGrid = document.getElementById('mediaGrid');
                    const modalTitle = document.getElementById('mediaModalTitle');

                    // Update modal title
                    if (type === 'main') {
                        modalTitle.textContent = 'Select Main Image';
                    } else if (type === 'gallery') {
                        modalTitle.textContent = 'Select Gallery Images';
                    } else {
                        modalTitle.textContent = 'Select Images';
                    }

                    // Clear and populate grid
                    mediaGrid.innerHTML = '';

                    if (!mediaItems || mediaItems.length === 0) {
                        mediaGrid.innerHTML = `
                        <div class="col-span-full text-center py-8">
                            <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                            <p class="text-sm text-gray-500 mt-2">No media found</p>
                        </div>
                    `;
                        return;
                    }

                    mediaItems.forEach(media => {
                        const mediaItem = document.createElement('div');
                        mediaItem.className = 'media-item relative group cursor-pointer';
                        mediaItem.dataset.id = media.id;

                        // Get the correct URL
                        const mediaUrl = media.thumbnail_url || media.url || media.full_url ||
                            media.path || '/images/default-image.jpg';
                        mediaItem.dataset.url = mediaUrl;

                        mediaItem.innerHTML = `
                        <div class="relative overflow-hidden rounded-lg border-2 border-transparent group-hover:border-indigo-500 transition-colors">
                            <img src="${mediaUrl}"
                                 alt="${media.file_name || media.name || 'Media'}"
                                 class="w-full h-32 object-cover"
                                 onerror="this.src='/images/default-image.jpg'">
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-opacity"></div>
                            <div class="absolute top-2 right-2 hidden group-hover:block">
                                <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-600 truncate">${media.file_name || media.name || 'Unnamed'}</p>
                        <p class="text-xs text-gray-400 truncate">${media.size_formatted || ''}</p>
                    `;

                        mediaItem.addEventListener('click', function() {
                            if (type === 'main') {
                                // Single selection for main image
                                document.querySelectorAll('#mediaGrid .media-item').forEach(item => {
                                    item.classList.remove('selected-media');
                                    item.querySelector('.border-2').classList.remove(
                                        'border-indigo-500');
                                    item.querySelector('.border-2').classList.add(
                                        'border-transparent');
                                });

                                this.classList.add('selected-media');
                                this.querySelector('.border-2').classList.remove('border-transparent');
                                this.querySelector('.border-2').classList.add('border-indigo-500');

                                selectedMediaId = this.dataset.id;
                                selectedMediaUrl = this.dataset.url;
                            } else {
                                // Multiple selection for gallery
                                this.classList.toggle('selected-media');
                                const borderDiv = this.querySelector('.border-2');
                                if (this.classList.contains('selected-media')) {
                                    borderDiv.classList.remove('border-transparent');
                                    borderDiv.classList.add('border-indigo-500');
                                } else {
                                    borderDiv.classList.remove('border-indigo-500');
                                    borderDiv.classList.add('border-transparent');
                                }
                            }
                        });

                        mediaGrid.appendChild(mediaItem);
                    });

                    document.getElementById('mediaLibraryModal').classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error loading media:', error);
                toastr.error('Failed to load media library');
            }
        }

        // Close media library
        function closeMediaLibrary() {
            document.getElementById('mediaLibraryModal').classList.add('hidden');
            selectedMediaType = null;
            selectedMediaId = null;
            selectedMediaUrl = null;
        }

        // Confirm media selection
        function confirmMediaSelection() {
            if (selectedMediaType === 'main') {
                if (selectedMediaId && selectedMediaUrl) {
                    document.getElementById('mainImageId').value = selectedMediaId;
                    const preview = document.getElementById('mainImagePreview');
                    preview.innerHTML = `
                    <div class="relative w-full h-full">
                        <img src="${selectedMediaUrl}" alt="Selected image" class="w-full h-full object-cover rounded-xl">
                        <button type="button" onclick="removeMainImage()"
                                class="absolute top-2 right-2 w-8 h-8 bg-rose-500 text-white rounded-full flex items-center justify-center hover:bg-rose-600 transition-colors">
                            <i class="fas fa-times text-sm"></i>
                        </button>
                    </div>
                `;
                    closeMediaLibrary();
                } else {
                    toastr.warning('Please select an image first');
                }
            } else if (selectedMediaType === 'gallery') {
                const selectedItems = document.querySelectorAll('#mediaGrid .media-item.selected-media');
                if (selectedItems.length > 0) {
                    const preview = document.getElementById('galleryPreview');
                    preview.innerHTML = '';

                    selectedGalleryImages = [];

                    selectedItems.forEach((item, index) => {
                        const mediaId = item.dataset.id;
                        const mediaUrl = item.dataset.url;

                        selectedGalleryImages.push({
                            id: parseInt(mediaId),
                            url: mediaUrl
                        });

                        // Add to preview
                        const imgDiv = document.createElement('div');
                        imgDiv.className = 'relative';
                        imgDiv.innerHTML = `
                        <div class="relative h-24">
                            <img src="${mediaUrl}" alt="Gallery image" class="w-full h-full object-cover rounded-lg">
                            <button type="button" onclick="removeGalleryImage(${index})"
                                    class="absolute top-1 right-1 w-6 h-6 bg-rose-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-rose-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                        preview.appendChild(imgDiv);
                    });

                    // Update hidden input as JSON array
                    const galleryIds = selectedGalleryImages.map(img => img.id);
                    const container = document.getElementById('simpleGallerySection');

                    // Remove old inputs
                    container.querySelectorAll('input[name="gallery_image_ids[]"]').forEach(el => el.remove());

                    // Add new inputs
                    galleryIds.forEach(id => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'gallery_image_ids[]';
                        input.value = id;
                        container.appendChild(input);
                    });
                    closeMediaLibrary();
                } else {
                    toastr.warning('Please select at least one image');
                }
            }
        }

        // Remove main image
        function removeMainImage() {
            document.getElementById('mainImageId').value = '';
            const preview = document.getElementById('mainImagePreview');
            preview.innerHTML = `
            <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-2"></i>
            <span class="text-gray-500">Click to upload main image</span>
            <span class="text-xs text-gray-400 mt-1">Recommended: 800x800px, PNG/JPG</span>
        `;
        }

        // Remove gallery image
        function removeGalleryImage(index) {
            selectedGalleryImages.splice(index, 1);

            // Update hidden input as JSON array
            const galleryIds = selectedGalleryImages.map(img => img.id);
            document.getElementById('galleryImageIds').value = JSON.stringify(galleryIds);

            // Update preview
            const preview = document.getElementById('galleryPreview');
            preview.innerHTML = '';

            selectedGalleryImages.forEach((img, idx) => {
                const imgDiv = document.createElement('div');
                imgDiv.className = 'relative';
                imgDiv.innerHTML = `
                <div class="relative h-24">
                    <img src="${img.url}" alt="Gallery image" class="w-full h-full object-cover rounded-lg">
                    <button type="button" onclick="removeGalleryImage(${idx})"
                            class="absolute top-1 right-1 w-6 h-6 bg-rose-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-rose-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
                preview.appendChild(imgDiv);
            });

            if (selectedGalleryImages.length === 0) {
                preview.innerHTML =
                    '<div class="col-span-3 text-center text-gray-500 text-sm py-8">No gallery images selected</div>';
            }
        }

        // ==================== VARIANT IMAGE FUNCTIONS ====================

        let variantSelectedMediaId = null;
        let variantSelectedMediaUrl = null;
        let variantSelectedGalleryImages = [];

        // Open variant image modal
        async function openVariantImageModal(variantId) {
            currentVariantForImages = variantId;
            variantSelectedMediaId = null;
            variantSelectedMediaUrl = null;
            variantSelectedGalleryImages = [];

            try {
                const response = await axiosInstance.get('/media');
                if (response.data.success) {
                    const mediaItems = response.data.data.data || response.data.data || [];

                    const mediaGrid = document.getElementById('variantMediaGrid');
                    const modalTitle = document.getElementById('variantModalTitle');

                    modalTitle.textContent = `Select Images for ${variantId.replace('variant-', 'Variant ')}`;

                    // Clear and populate grid
                    mediaGrid.innerHTML = '';

                    if (!mediaItems || mediaItems.length === 0) {
                        mediaGrid.innerHTML = `
                        <div class="col-span-full text-center py-8">
                            <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                            <p class="text-sm text-gray-500 mt-2">No media found</p>
                        </div>
                    `;
                        return;
                    }

                    mediaItems.forEach(media => {
                        const mediaItem = document.createElement('div');
                        mediaItem.className = 'variant-media-item relative group cursor-pointer';
                        mediaItem.dataset.id = media.id;

                        // Get the correct URL
                        const mediaUrl = media.thumbnail_url || media.url || media.full_url ||
                            media.path || '/images/default-image.jpg';
                        mediaItem.dataset.url = mediaUrl;

                        mediaItem.innerHTML = `
                        <div class="relative overflow-hidden rounded-lg border-2 border-transparent group-hover:border-indigo-500 transition-colors">
                            <img src="${mediaUrl}"
                                 alt="${media.file_name || media.name || 'Media'}"
                                 class="w-full h-32 object-cover"
                                 onerror="this.src='/images/default-image.jpg'">
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-opacity"></div>
                            <div class="absolute top-2 right-2 hidden group-hover:block">
                                <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-600 truncate">${media.file_name || media.name || 'Unnamed'}</p>
                    `;

                        mediaItem.addEventListener('click', function() {
                            // Single selection for variant main image
                            document.querySelectorAll('#variantMediaGrid .variant-media-item').forEach(
                                item => {
                                    item.classList.remove('selected-media');
                                    item.querySelector('.border-2').classList.remove(
                                        'border-indigo-500');
                                    item.querySelector('.border-2').classList.add(
                                        'border-transparent');
                                });

                            this.classList.add('selected-media');
                            this.querySelector('.border-2').classList.remove('border-transparent');
                            this.querySelector('.border-2').classList.add('border-indigo-500');

                            variantSelectedMediaId = this.dataset.id;
                            variantSelectedMediaUrl = this.dataset.url;
                        });

                        mediaGrid.appendChild(mediaItem);
                    });

                    // Clear gallery preview
                    const galleryPreview = document.getElementById('variantGalleryPreview');
                    galleryPreview.innerHTML =
                        '<div class="col-span-4 text-center text-gray-500 text-sm py-4">No gallery images selected</div>';

                    document.getElementById('variantImageModal').classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error loading media:', error);
                toastr.error('Failed to load media library');
            }
        }

        // Open variant gallery picker
        async function openVariantGalleryPicker() {
            try {
                const response = await axiosInstance.get('/media');
                if (response.data.success) {
                    const mediaItems = response.data.data.data || response.data.data || [];

                    // Clear and populate grid
                    const mediaGrid = document.getElementById('variantMediaGrid');
                    mediaGrid.innerHTML = '';

                    const modalTitle = document.getElementById('variantModalTitle');
                    modalTitle.textContent = 'Select Gallery Images';

                    if (!mediaItems || mediaItems.length === 0) {
                        mediaGrid.innerHTML = `
                        <div class="col-span-full text-center py-8">
                            <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                            <p class="text-sm text-gray-500 mt-2">No media found</p>
                        </div>
                    `;
                        return;
                    }

                    mediaItems.forEach(media => {
                        const mediaItem = document.createElement('div');
                        mediaItem.className = 'variant-gallery-item relative group cursor-pointer';
                        mediaItem.dataset.id = media.id;

                        // Get the correct URL
                        const mediaUrl = media.thumbnail_url || media.url || media.full_url ||
                            media.path || '/images/default-image.jpg';
                        mediaItem.dataset.url = mediaUrl;

                        mediaItem.innerHTML = `
                        <div class="relative overflow-hidden rounded-lg border-2 border-transparent group-hover:border-indigo-500 transition-colors">
                            <img src="${mediaUrl}"
                                 alt="${media.file_name || media.name || 'Media'}"
                                 class="w-full h-32 object-cover"
                                 onerror="this.src='/images/default-image.jpg'">
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-opacity"></div>
                            <div class="absolute top-2 right-2 hidden group-hover:block">
                                <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-600 truncate">${media.file_name || media.name || 'Unnamed'}</p>
                    `;

                        mediaItem.addEventListener('click', function() {
                            // Multiple selection for gallery
                            this.classList.toggle('selected-media');
                            const borderDiv = this.querySelector('.border-2');
                            if (this.classList.contains('selected-media')) {
                                borderDiv.classList.remove('border-transparent');
                                borderDiv.classList.add('border-indigo-500');
                            } else {
                                borderDiv.classList.remove('border-indigo-500');
                                borderDiv.classList.add('border-transparent');
                            }
                        });

                        mediaGrid.appendChild(mediaItem);
                    });
                }
            } catch (error) {
                console.error('Error loading media:', error);
                toastr.error('Failed to load media library');
            }
        }

        // Close variant image modal
        function closeVariantImageModal() {
            document.getElementById('variantImageModal').classList.add('hidden');
            currentVariantForImages = null;
            variantSelectedMediaId = null;
            variantSelectedMediaUrl = null;
            variantSelectedGalleryImages = [];
        }

        // Confirm variant images
        function confirmVariantImages() {
            if (currentVariantForImages) {
                // Get selected gallery images
                const selectedGalleryItems = document.querySelectorAll(
                    '#variantMediaGrid .variant-gallery-item.selected-media');
                variantSelectedGalleryImages = [];

                selectedGalleryItems.forEach((item) => {
                    variantSelectedGalleryImages.push({
                        id: parseInt(item.dataset.id),
                        url: item.dataset.url
                    });
                });

                // Update variantImages object
                variantImages[currentVariantForImages] = {
                    main_id: variantSelectedMediaId,
                    main_url: variantSelectedMediaUrl,
                    gallery_ids: variantSelectedGalleryImages.map(img => img.id),
                    gallery_urls: variantSelectedGalleryImages.map(img => img.url)
                };

                // Update hidden inputs
                const mainImageIdInput = document.getElementById(`${currentVariantForImages}-main-image-id`);
                const galleryImageIdsInput = document.getElementById(`${currentVariantForImages}-gallery-image-ids`);
                const preview = document.getElementById(`${currentVariantForImages}-images`);

                if (variantSelectedMediaId) {
                    mainImageIdInput.value = variantSelectedMediaId;
                }

                // Set gallery images as JSON array
                const galleryIds = variantSelectedGalleryImages.map(img => img.id);
                galleryImageIdsInput.value = JSON.stringify(galleryIds);

                // Update preview
                preview.innerHTML = '';

                // Show main image if selected
                if (variantSelectedMediaId && variantSelectedMediaUrl) {
                    preview.innerHTML += `
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="relative">
                            <img src="${variantSelectedMediaUrl}" alt="Main image" class="w-12 h-12 rounded object-cover">
                            <span class="absolute bottom-1 left-1 bg-blue-500 text-white text-xs px-1 rounded">Main</span>
                        </div>
                        <span class="text-sm text-gray-600">Main Image</span>
                    </div>
                `;
                }

                // Show gallery images if selected
                if (variantSelectedGalleryImages.length > 0) {
                    let galleryHtml =
                        '<div class="mt-2"><p class="text-sm text-gray-600 mb-1">Gallery Images:</p><div class="flex flex-wrap gap-1">';
                    variantSelectedGalleryImages.forEach((img, index) => {
                        galleryHtml += `
                        <div class="relative">
                            <img src="${img.url}" alt="Gallery image ${index + 1}" class="w-12 h-12 object-cover rounded">
                        </div>
                    `;
                    });
                    galleryHtml += '</div></div>';
                    preview.innerHTML += galleryHtml;
                }

                closeVariantImageModal();
                toastr.success('Variant images updated successfully');
            } else {
                toastr.warning('Please select an image first');
            }
        }

        // Remove variant
        function removeVariant(rowId) {
            const row = document.getElementById(rowId);
            if (row) {
                if (confirm('Are you sure you want to remove this variant?')) {
                    row.remove();
                    updateVariantsCount();
                    delete variantImages[rowId];
                    toastr.success('Variant removed successfully');
                }
            }
        }

        // Update variants count
        function updateVariantsCount() {
            const rows = document.querySelectorAll('.variant-row');
            const countElement = document.getElementById('variantsCount');
            countElement.textContent = `${rows.length} variant${rows.length !== 1 ? 's' : ''}`;

            if (rows.length === 0) {
                document.getElementById('variantsContainer').classList.add('hidden');
            }
        }


        function setContainerState(containerId, enabled) {
            const container = document.getElementById(containerId);
            if (!container) return;

            container.querySelectorAll('input, select, textarea').forEach(el => {
                if (enabled) {
                    el.disabled = false;
                    if (el.dataset.required === 'true') {
                        el.required = true;
                    }
                } else {
                    if (el.required) {
                        el.dataset.required = 'true';
                    }
                    el.required = false;
                    el.disabled = true;
                }
            });
        }


        // Make functions available globally
        window.openMediaPicker = openMediaPicker;
        window.closeMediaLibrary = closeMediaLibrary;
        window.confirmMediaSelection = confirmMediaSelection;
        window.removeMainImage = removeMainImage;
        window.removeGalleryImage = removeGalleryImage;
        window.openVariantImageModal = openVariantImageModal;
        window.openVariantGalleryPicker = openVariantGalleryPicker;
        window.closeVariantImageModal = closeVariantImageModal;
        window.confirmVariantImages = confirmVariantImages;
        window.removeVariant = removeVariant;
        window.generateVariants = generateVariants;
        window.selectProductType = selectProductType;
        window.addCustomSpecificationValue = addCustomSpecificationValue;
    </script>
@endpush
