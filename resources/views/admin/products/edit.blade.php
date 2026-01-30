@extends('admin.layouts.master')

@section('title', 'Edit Product')

@section('content')
<div class="mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Edit Product: {{ $product->name }}</h2>
            <nav class="text-sm text-gray-500">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-500">Dashboard</a>
                <span class="mx-2">/</span>
                <a href="{{ route('admin.products.index') }}" class="hover:text-blue-500">Products</a>
                <span class="mx-2">/</span>
                <span class="text-gray-700">Edit</span>
            </nav>
        </div>
        <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
            Back to List
        </a>
    </div>
</div>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" id="product-form" class="space-y-6">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Basic Info -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Basic Information</h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-gray-50">
                            @error('slug') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="product_code" class="block text-sm font-medium text-gray-700 mb-1">Product Code (Art. No.)</label>
                            <input type="text" name="product_code" id="product_code" value="{{ old('product_code', $product->product_code) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            @error('product_code') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Description</h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                        <textarea name="short_description" id="short_description" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">{{ old('short_description', $product->short_description) }}</textarea>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Full Description</label>
                        <textarea name="description" id="description" rows="6"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Media -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100" id="media-section">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Product Images</h3>
                
                <!-- Main Image -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Main Image</label>
                    <input type="hidden" name="main_image_id" id="main_image_id" value="{{ old('main_image_id', $product->main_image_id) }}">
                    
                    <div id="main-image-preview" class="mb-3">
                         @if($product->main_image)
                              <img src="{{ asset('storage/' . $product->main_image) }}" class="h-32 object-cover rounded border">
                         @endif
                    </div>
                    
                    <button type="button" onclick="openMediaModal('main')" 
                        class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg border border-blue-200 hover:bg-blue-100 transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Select Main Image
                    </button>
                    @error('main_image_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Gallery Images (For Simple Product / Product Level) -->
                <!-- Only relevant if product is Simple, or if we treat Configurable parent images as generic gallery. 
                     Usually Configurable products have a main image representation, but variants have specific images.
                     We'll keep this for simple products mostly. -->
                <div>
                     <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
                     <div id="gallery-container" class="grid grid-cols-3 md:grid-cols-5 gap-4 mb-3">
                         @if($product->defaultVariant && $product->defaultVariant->images)
                             @foreach($product->defaultVariant->images as $img)
                                 @if(!$img->pivot->is_primary)
                                     <div class="relative group border rounded-lg overflow-hidden h-24">
                                        <img src="{{ asset('storage/' . $img->file_path) }}" class="w-full h-full object-cover">
                                        <input type="hidden" name="gallery_image_ids[]" value="{{ $img->id }}">
                                        <button type="button" onclick="this.parentElement.remove()" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </button>
                                    </div>
                                 @endif
                             @endforeach
                         @endif
                     </div>
                     <button type="button" onclick="openMediaModal('gallery')" 
                        class="bg-gray-50 text-gray-600 px-4 py-2 rounded-lg border border-gray-200 hover:bg-gray-100 transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Add Images
                    </button>
                </div>
            </div>

            <!-- Simple Product Fields -->
            @if($product->product_type === 'simple')
            <div id="simple-product-fields" class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Pricing & Inventory</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">₹</span>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="sku" class="block text-sm font-medium text-gray-700 mb-1">SKU <span class="text-red-500">*</span></label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                        @error('sku') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity <span class="text-red-500">*</span></label>
                        <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                         @error('stock_quantity') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                     <div>
                        <label for="compare_price" class="block text-sm font-medium text-gray-700 mb-1">Compare at Price</label>
                        <input type="number" name="compare_price" value="{{ old('compare_price', $product->compare_price) }}" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                </div>
            </div>
            @endif

            <!-- CONFIGURABLE VARIANTS SECTION -->
            <!-- CONFIGURABLE VARIANTS SECTION -->
            <div id="configurable-product-fields" class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 {{ $product->product_type === 'configurable' ? '' : 'hidden' }}">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Product Variants</h3>
                
                <!-- Variant Generator & Adder (New) -->
                <div class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h4 class="text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">Manage Variants</h4>
                    
                    <!-- Tabs or Sections -->
                    <div class="space-y-6">
                        <!-- Bulk Generator -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="block text-sm font-medium text-gray-700">Generate Combinations</label>
                                <button type="button" onclick="document.getElementById('bulk-generator-panel').classList.toggle('hidden')" class="text-blue-600 text-xs hover:underline">Toggle Generator</button>
                            </div>
                            
                            <div id="bulk-generator-panel" class="hidden space-y-4">
                                <div id="attributes-loading" class="text-gray-500 italic hidden">Loading attributes...</div>
                                <div id="attributes-selector" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                     <!-- Loaded via JS -->
                                </div>
                                <button type="button" onclick="generateVariants()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 text-sm">
                                    Generate All Combinations
                                </button>
                            </div>
                        </div>

                        <!-- Single Variant Adder -->
                        <div class="pt-4 border-t border-gray-200">
                             <label class="block text-sm font-medium text-gray-700 mb-2">Add Single Variant</label>
                             <div class="flex flex-wrap items-end gap-2" id="single-variant-adder">
                                 <!-- Dynamic Selects will be injected here -->
                                 <div id="single-adder-placeholders" class="text-sm text-gray-400 italic">Select a category to load attributes...</div>
                             </div>
                             <button type="button" onclick="addSingleVariant()" class="mt-2 text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded shadow transition">
                                 + Add Variant
                             </button>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Variant</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase w-32">SKU</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase w-24">Price</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase w-24">Stock</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase w-48">Images</th>
                                <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase w-16">Default</th>
                                <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase w-16">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="variants-container">
                            <!-- PHP RENDERED VARIANTS -->
                            @if($product->product_type === 'configurable')
                            @foreach($product->variants as $idx => $variant)
                                <!-- Removing skip logic to show all variants -->
                                     
                                <tr id="variant-row-{{ $idx }}">
                                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-700">
                                        {{-- Variant Name Construction --}}
                                        @php
                                            $name = $variant->attributes->map(function($a) {
                                                return $a->value ?? 'NA'; 
                                            })->join(' / ');
                                        @endphp
                                        {{ $name ?: 'Variant #' . ($idx + 1) }}
                                        
                                        <input type="hidden" name="variants[{{ $idx }}][id]" value="{{ $variant->id }}">
                                        
                                        {{-- We need to preserve attributes? Usually on Edit we don't change attribs of existing variant, just values --}}
                                        {{-- But we need to send them back if we want to "sync"? 
                                             Actually, ProductService update logic for existing variants might just check SKU/ID.
                                             Let's look at ProductService::updateProduct:
                                             It usually iterates variants.
                                             If basic update, we just need ID.
                                        --}}
                                    </td>
                                    <td class="px-3 py-2">
                                        <input type="text" name="variants[{{ $idx }}][sku]" value="{{ $variant->sku }}" class="w-full px-2 py-1 border rounded text-sm">
                                    </td>
                                    <td class="px-3 py-2">
                                        <input type="number" name="variants[{{ $idx }}][price]" value="{{ $variant->price }}" step="0.01" class="w-full px-2 py-1 border rounded text-sm">
                                    </td>
                                    <td class="px-3 py-2">
                                        <input type="number" name="variants[{{ $idx }}][stock_quantity]" value="{{ $variant->stock_quantity }}" class="w-full px-2 py-1 border rounded text-sm">
                                    </td>
                                    <td class="px-3 py-2">
                                        <div id="variant-images-{{ $idx }}" class="flex gap-1 flex-wrap items-center">
                                            {{-- Main Image --}}
                                            <div class="relative w-10 h-10 variant-main-thumb {{ $variant->primaryImage && $variant->primaryImage->media ? 'border-2 border-blue-500' : 'border border-dashed border-gray-300' }}">
                                                @if($variant->primaryImage && $variant->primaryImage->media)
                                                    <img src="{{ asset('storage/' . $variant->primaryImage->media->file_path) }}" class="w-full h-full object-cover">
                                                    <button type="button" onclick="removeVariantMainImage({{ $idx }})" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-0.5 w-4 h-4 flex items-center justify-center text-[10px] shadow-sm hover:bg-red-600 transition">x</button>
                                                @else
                                                     <div class="flex items-center justify-center w-full h-full bg-gray-50 text-[10px] text-gray-400">Main</div>
                                                @endif
                                            </div>

                                            {{-- Gallery --}}
                                            @foreach($variant->images as $vImg)
                                                @if(!$vImg->pivot->is_primary)
                                                <div class="relative w-10 h-10 border border-gray-200 group">
                                                    <img src="{{ asset('storage/' . $vImg->file_path) }}" class="w-full h-full object-cover">
                                                     <button type="button" onclick="this.parentElement.remove(); removeVariantGalleryInput({{ $idx }}, {{ $vImg->id }})" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-0.5 w-4 h-4 flex items-center justify-center text-[10px] opacity-0 group-hover:opacity-100 shadow-sm hover:bg-red-600 transition">x</button>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <button type="button" onclick="openVariantMediaModal({{ $idx }})" class="text-xs text-blue-600 hover:text-blue-800 mt-1">Manage Images</button>
                                        
                                        {{-- Hidden Inputs for Images --}}
                                        <input type="hidden" name="variants[{{ $idx }}][main_image_id]" id="variant-main-input-{{ $idx }}" value="{{ ($variant->primaryImage && $variant->primaryImage->media) ? $variant->primaryImage->media_id : '' }}">
                                        <div id="variant-gallery-inputs-{{ $idx }}">
                                            @foreach($variant->images as $vImg)
                                                <input type="hidden" name="variants[{{ $idx }}][gallery_image_ids][]" value="{{ $vImg->id }}">
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 text-center">
                                       <input type="radio" name="default_variant_index" value="{{ $idx }}" {{ $variant->is_default ? 'checked' : '' }} onclick="document.querySelectorAll('.is-default-input').forEach(el => el.value=0); document.getElementById('is-default-{{ $idx }}').value=1;">
                                       <input type="hidden" id="is-default-{{ $idx }}" name="variants[{{ $idx }}][is_default]" value="{{ $variant->is_default ? '1' : '0' }}" class="is-default-input">
                                    </td>
                                    <td class="px-3 py-2 text-center">
                                         <button type="button" onclick="document.getElementById('variant-row-{{ $idx }}').remove()" class="text-red-500 hover:text-red-700 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                         </button>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Dynamic Specifications -->
            <div id="specifications-wrapper" class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Specifications</h3>
                <div id="specifications-container" class="space-y-6">
                    <!-- Loaded via JS -->
                </div>
            </div>

        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Publish Status (Same as above) -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Publish</h3>
                <div class="space-y-4">
                     <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="pending" {{ old('status', $product->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                            class="rounded text-blue-500 focus:ring-blue-500 h-4 w-4">
                        <label for="is_featured" class="text-sm text-gray-700">Featured Product</label>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="is_new" id="is_new" value="1" {{ old('is_new', $product->is_new) ? 'checked' : '' }}
                            class="rounded text-blue-500 focus:ring-blue-500 h-4 w-4">
                        <label for="is_new" class="text-sm text-gray-700">New Arrival</label>
                    </div>

                     <div class="flex items-center space-x-2">
                        <input type="checkbox" name="is_bestseller" id="is_bestseller" value="1" {{ old('is_bestseller', $product->is_bestseller) ? 'checked' : '' }}
                            class="rounded text-blue-500 focus:ring-blue-500 h-4 w-4">
                        <label for="is_bestseller" class="text-sm text-gray-700">Bestseller</label>
                    </div>

                    <div class="pt-4 border-t">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                            Update Product
                        </button>
                    </div>
                </div>
            </div>

            <!-- Organization -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Organization</h3>
                
                <div class="space-y-4">
                     <div>
                        <label for="product_type" class="block text-sm font-medium text-gray-700 mb-1">Product Type</label>
                        @if($product->product_type === 'simple')
                            <select name="product_type" id="product_type" onchange="toggleProductType()"
                                class="w-full px-4 py-2 border border-blue-200 bg-blue-50 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="simple" selected>Simple Product</option>
                                <option value="configurable">Configurable Product</option>
                            </select>
                        @else
                            <input type="text" value="{{ ucfirst($product->product_type) }}" disabled class="w-full px-4 py-2 border border-gray-200 bg-gray-100 rounded-lg text-gray-500 cursor-not-allowed">
                            <input type="hidden" name="product_type" id="product_type" value="{{ $product->product_type }}">
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Category</label>
                         <input type="text" value="{{ $product->mainCategory ? $product->mainCategory->name : 'None' }}" disabled class="w-full px-4 py-2 border border-gray-200 bg-gray-100 rounded-lg text-gray-500 cursor-not-allowed">
                         <input type="hidden" name="main_category_id" id="main_category_id" value="{{ $product->main_category_id }}">
                    </div>

                    <div>
                        <label for="brand_id" class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                        <select name="brand_id" id="brand_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="tag_ids" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                        <select name="tag_ids[]" id="tag_ids" multiple class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 h-32">
                            @php
                                $selectedTags = old('tag_ids', $product->tags->pluck('id')->toArray());
                            @endphp
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Hold Ctrl (Windows) or Cmd (Mac) to select multiple tags.</p>
                    </div>
                </div>
            </div>

            <!-- Shipping -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Shipping</h3>
                <div class="space-y-4">
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700 mb-1">Weight (kg)</label>
                        <input type="number" name="weight" id="weight" value="{{ old('weight', $product->weight) }}" step="0.01"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div class="grid grid-cols-3 gap-2">
                        <div>
                             <label class="block text-xs text-gray-500">Length</label>
                             <input type="number" name="length" value="{{ old('length', $product->length) }}" placeholder="cm" class="w-full px-2 py-1 border rounded">
                        </div>
                        <div>
                             <label class="block text-xs text-gray-500">Width</label>
                             <input type="number" name="width" value="{{ old('width', $product->width) }}" placeholder="cm" class="w-full px-2 py-1 border rounded">
                        </div>
                        <div>
                             <label class="block text-xs text-gray-500">Height</label>
                             <input type="number" name="height" value="{{ old('height', $product->height) }}" placeholder="cm" class="w-full px-2 py-1 border rounded">
                        </div>
                    </div>

                     <div>
                        <label for="tax_class_id" class="block text-sm font-medium text-gray-700 mb-1">Tax Class</label>
                        </select>
                    </div>

                    <div class="flex items-center space-x-2 pt-2">
                        <input type="checkbox" name="cod_available" id="cod_available" value="1" {{ old('cod_available', $product->cod_available) ? 'checked' : '' }}
                            class="rounded text-blue-500 focus:ring-blue-500 h-4 w-4">
                        <label for="cod_available" class="text-sm text-gray-700">COD Available</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Media Modal (Same as Create) -->
<div id="media-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeMediaModal()"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Select Media</h3>
                    <button type="button" onclick="closeMediaModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="flex flex-col md:flex-row justify-between mb-4 space-y-2 md:space-y-0">
                    <input type="text" id="media-search" placeholder="Search files..." class="border rounded px-3 py-2 w-full md:w-1/3">
                     <div class="flex items-center space-x-2">
                        <label class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow transition">
                            <span>Upload New</span>
                            <input type="file" id="media-upload" class="hidden" multiple onchange="handleFileUpload(this)">
                        </label>
                    </div>
                </div>

                <div id="media-grid" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 max-h-96 overflow-y-auto p-2 border rounded">
                    <!-- Loaded dynamically -->
                    <div class="col-span-full text-center py-10 text-gray-500">Loading media...</div>
                </div>

                <div id="media-pagination" class="mt-4 flex justify-between items-center">
                    <!-- Pagination links -->
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="media-select-btn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-50">
                    Select
                </button>
                <button type="button" onclick="closeMediaModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Prepare existing specs mapping
    const existingSpecs = @json($product->specifications->map(function($s){ 
       return [
           'specification_id' => $s->id, 
           'specification_value_id' => $s->pivot->specification_value_id,
           'custom_value' => $s->pivot->custom_value
       ];
    }));

    // Prepare Global State
    let availableAttributes = [];
    let currentVariantCount = {{ $product->variants->count() }};
    
    document.addEventListener('DOMContentLoaded', function() {
        toggleProductType(); // Init state
        
        // Populate single adder if configurable
        const catId = document.getElementById('main_category_id').value;
        const type = document.getElementById('product_type').value;
        if(catId && type === 'configurable') {
             fetchAttributes(catId);
        }
    });

    // =============== PRODUCT TYPE LOGIC ===============
    function toggleProductType() {
        const typeInput = document.getElementById('product_type');
        const type = typeInput ? typeInput.value : '{{ $product->product_type }}';
        
        const simpleFields = document.getElementById('simple-product-fields');
        const configFields = document.getElementById('configurable-product-fields');
        const mediaSection = document.getElementById('media-section');
        
        if (type === 'simple') {
            if(simpleFields) simpleFields.classList.remove('hidden');
            if(configFields) configFields.classList.add('hidden');
            if(mediaSection) mediaSection.classList.remove('hidden');
        } else {
            if(simpleFields) simpleFields.classList.add('hidden');
            if(configFields) configFields.classList.remove('hidden');
            if(mediaSection) mediaSection.classList.add('hidden');
            
            // Trigger attribute load if needed
            const catId = document.getElementById('main_category_id').value;
            if(catId && availableAttributes.length === 0) fetchAttributes(catId);
        }
    }

    function handleCategoryChange(categoryId) {
         // Existing Logic for specs
         fetchSpecifications(categoryId);
         // New Logic for attributes
         if(document.getElementById('product_type').value === 'configurable') {
             fetchAttributes(categoryId);
         }
    }

    // =============== ATTRIBUTES & VARIANTS LOGIC ===============
    
    async function fetchAttributes(categoryId) {
        const loading = document.getElementById('attributes-loading');
        const selector = document.getElementById('attributes-selector');
        const singleAdder = document.getElementById('single-adder-placeholders'); // Placeholder to remove
        const singleAdderContainer = document.getElementById('single-variant-adder');
        
        if(loading) loading.classList.remove('hidden');
        if(selector) selector.innerHTML = '';
        availableAttributes = [];

        try {
            const response = await axios.get(`{{ route('admin.products.category.attributes', ':id') }}`.replace(':id', categoryId));
            if(loading) loading.classList.add('hidden');

            if(response.data.success && response.data.data.length > 0) {
                availableAttributes = response.data.data;
                renderAttributeSelector(response.data.data);
                renderSingleVariantAdder(response.data.data);
            } else {
                if(selector) selector.innerHTML = '<p class="text-gray-500 text-sm">No variant attributes found for this category.</p>';
                 if(singleAdderContainer) singleAdderContainer.innerHTML = '<p class="text-gray-500 text-sm">No attributes available.</p>';
            }
        } catch (error) {
            console.error('Attr fetch error:', error);
            if(loading) loading.classList.add('hidden');
        }
    }

    function renderAttributeSelector(attributes) {
        const selector = document.getElementById('attributes-selector');
        if(!selector) return;

        let html = '';
        attributes.forEach((attr, idx) => {
            html += `
            <div class="border rounded-lg p-3 bg-white">
                <div class="flex items-center mb-2">
                    <input type="checkbox" id="attr-enable-${attr.id}" class="attr-enable w-4 h-4 text-blue-600 rounded">
                    <label for="attr-enable-${attr.id}" class="ml-2 font-medium text-gray-700">${attr.name}</label>
                </div>
                <select multiple id="attr-values-${attr.id}" class="w-full h-24 p-2 border rounded text-xs focus:ring-1 focus:ring-blue-500" disabled>
                    ${attr.options.map(opt => `<option value="${opt.id}">${opt.value}</option>`).join('')}
                </select>
            </div>
            `;
        });
        selector.innerHTML = html;

        document.querySelectorAll('.attr-enable').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const attrId = this.id.replace('attr-enable-', '');
                document.getElementById(`attr-values-${attrId}`).disabled = !this.checked;
            });
        });
    }

    function renderSingleVariantAdder(attributes) {
        const container = document.getElementById('single-variant-adder');
        if(!container) return;

        let html = '';
        attributes.forEach(attr => {
             html += `
             <div class="flex flex-col">
                 <label class="text-xs text-gray-500 mb-1">${attr.name}</label>
                 <select data-attr-id="${attr.id}" data-attr-name="${attr.name}" class="single-adder-select px-3 py-2 border rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                     <option value="">Select ${attr.name}</option>
                     ${attr.options.map(opt => `<option value="${opt.id}">${opt.value}</option>`).join('')}
                 </select>
             </div>
             `;
        });
        container.innerHTML = html;
    }

    // --- Bulk Generation ---
    function generateVariants() {
        const selectedAttrs = [];
        availableAttributes.forEach(attr => {
             const checkbox = document.getElementById(`attr-enable-${attr.id}`);
             if(checkbox && checkbox.checked) {
                 const select = document.getElementById(`attr-values-${attr.id}`);
                 const values = Array.from(select.selectedOptions).map(opt => ({
                     id: opt.value,
                     value: opt.text
                 }));
                 if(values.length > 0) selectedAttrs.push({ id: attr.id, name: attr.name, values: values });
             }
        });

        if(selectedAttrs.length === 0) {
            toastr.warning('Please select at least one attribute and value.');
            return;
        }

        const combinations = cartesianProduct(selectedAttrs.map(a => a.values));
        
        // Append instead of replace? User might want to keep existing.
        // We will append.
        combinations.forEach(combo => {
             const attributes = combo.map((c, i) => ({
                 attribute_id: selectedAttrs[i].id,
                 attribute_name: selectedAttrs[i].name,
                 attribute_value_id: c.id,
                 value: c.value
             }));
             addVariantRow(attributes);
        });
        
        toastr.success(`${combinations.length} variants generated.`);
        document.getElementById('product_type').disabled = true; // Lock type once variants exist
    }

    function cartesianProduct(arrays) {
        return arrays.reduce((acc, curr) => acc.flatMap(x => curr.map(y => [...x, y])), [[]]);
    }

    // --- Single Add ---
    function addSingleVariant() {
        const selects = document.querySelectorAll('.single-adder-select');
        const attributes = [];
        let allSelected = true;

        selects.forEach(select => {
            if(!select.value) {
                allSelected = false;
                select.classList.add('border-red-500');
            } else {
                select.classList.remove('border-red-500');
                attributes.push({
                    attribute_id: select.getAttribute('data-attr-id'),
                    attribute_name: select.getAttribute('data-attr-name'),
                    attribute_value_id: select.value,
                    value: select.options[select.selectedIndex].text
                });
            }
        });

        if(!allSelected) {
            toastr.error('Please select all attributes.');
            return;
        }

        addVariantRow(attributes);
    }

    function addVariantRow(attributes) {
         // Check Duplicate
         if(isDuplicateVariant(attributes)) {
             toastr.warning('This variant combination already exists.');
             return;
         }

         const idx = currentVariantCount++;
         const container = document.getElementById('variants-container');
         
         const baseSku = document.getElementById('product_code').value || 'SKU';
         const skuSuffix = attributes.map(a => a.value.substring(0,3).toUpperCase()).join('-');
         const variantSku = `${baseSku}-${skuSuffix}-${idx}`;
         
         const variantName = attributes.map(a => a.value).join(' / ');

         const tr = document.createElement('tr');
         tr.id = `variant-row-${idx}`;
         tr.innerHTML = `
            <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-700">
                ${variantName}
                ${attributes.map((a, i) => `
                    <input type="hidden" name="variants[${idx}][attributes][${i}][attribute_id]" value="${a.attribute_id}">
                    <input type="hidden" name="variants[${idx}][attributes][${i}][attribute_value_id]" value="${a.attribute_value_id}">
                `).join('')}
            </td>
            <td class="px-3 py-2"><input type="text" name="variants[${idx}][sku]" value="${variantSku}" class="w-full px-2 py-1 border rounded text-sm"></td>
            <td class="px-3 py-2"><input type="number" name="variants[${idx}][price]" value="{{ $product->price }}" step="0.01" class="w-full px-2 py-1 border rounded text-sm"></td>
            <td class="px-3 py-2"><input type="number" name="variants[${idx}][stock_quantity]" value="0" class="w-full px-2 py-1 border rounded text-sm"></td>
            <td class="px-3 py-2">
                <div id="variant-images-${idx}" class="flex gap-1 flex-wrap items-center">
                     <div class="relative w-10 h-10 variant-main-thumb border-2 border-dashed border-gray-300 rounded flex items-center justify-center bg-gray-50 text-xs text-gray-400">
                        <span class="text-[0.6rem]">No Img</span>
                    </div>
                </div>
                <button type="button" onclick="openVariantMediaModal(${idx})" class="text-xs text-blue-600 hover:text-blue-800 mt-1">Manage Images</button>
                <input type="hidden" name="variants[${idx}][main_image_id]" id="variant-main-input-${idx}">
                <div id="variant-gallery-inputs-${idx}"></div>
            </td>
            <td class="px-3 py-2 text-center">
                <input type="radio" name="default_variant_index" value="${idx}" onclick="document.querySelectorAll('.is-default-input').forEach(el => el.value=0); document.getElementById('is-default-${idx}').value=1;">
                <input type="hidden" id="is-default-${idx}" name="variants[${idx}][is_default]" value="0" class="is-default-input">
            </td>
            <td class="px-3 py-2 text-center">
                <button type="button" onclick="document.getElementById('variant-row-${idx}').remove()" class="text-red-500 hover:text-red-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </button>
            </td>
         `;
         container.appendChild(tr);
    }

    function isDuplicateVariant(newAttributes) {
        // Simple check: iterate rows, check hidden inputs
        // A robust way creates a signature (e.g. sorted value IDs)
        // Here we can just check if we can find a row with matching value IDs
        // NOTE: This implementation is basic. For full robustness, meaningful IDs are better.
        
        let isDuplicate = false;
        // Logic to scan DOM hidden inputs is complex. 
        // Simpler: Construct a "signature" of value IDs for the new variant
        const newSig = newAttributes.map(a => a.attribute_value_id).sort().join('_');
        
        // Scan existing rows
        document.querySelectorAll('#variants-container tr').forEach(row => {
            const valueInputs = row.querySelectorAll('input[name*="[attribute_value_id]"]');
            const rowValues = Array.from(valueInputs).map(i => i.value).sort().join('_');
            if(rowValues === newSig) isDuplicate = true;
        });

        return isDuplicate;
    }

    // --- Image Removal ---
    function removeVariantMainImage(idx) {
        document.getElementById(`variant-main-input-${idx}`).value = '';
        const container = document.getElementById(`variant-images-${idx}`);
        const thumb = container.querySelector('.variant-main-thumb');
        
        // Reset thumb to placeholder
        thumb.className = 'relative w-10 h-10 variant-main-thumb border-2 border-dashed border-gray-300 rounded flex items-center justify-center bg-gray-50 text-xs text-gray-400';
        thumb.innerHTML = '<span class="text-[0.6rem]">No Img</span>';
    }
    
    function removeVariantGalleryInput(idx, imgId) {
         // The passed imgId is the media ID.
         // We need to find the hidden input with this value and remove it.
         const container = document.getElementById(`variant-gallery-inputs-${idx}`);
         if(!container) return;
         
         const input = container.querySelector(`input[value="${imgId}"]`);
         if(input) input.remove();
    }



    document.getElementById('name').addEventListener('input', function() {
        let slug = this.value.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        document.getElementById('slug').value = slug;
    });

    async function fetchSpecifications(categoryId) {
        if (!categoryId) return;
        
        const container = document.getElementById('specifications-container');
        container.innerHTML = '<p class="text-gray-500">Loading specifications...</p>';

        try {
            const response = await axios.get(`{{ route('admin.products.category.specifications', ':id') }}`.replace(':id', categoryId));
            
            if(response.data.success) {
                renderSpecifications(response.data.data);
            } else {
                container.innerHTML = '<p class="text-red-500">Failed to load specifications.</p>';
            }
        } catch (error) {
            console.error('Spec fetch error:', error);
            container.innerHTML = '<p class="text-red-500">Error loading specifications.</p>';
        }
    }

    function renderSpecifications(groups) {
         const container = document.getElementById('specifications-container');
         container.innerHTML = '';

         if (!groups || groups.length === 0) {
             container.innerHTML = '<p class="text-gray-500">No specifications found for this category.</p>';
             return;
         }

         let html = '';
         let specIndex = 0;

         groups.forEach(group => {
             html += `<div class="mb-6">`;
             html += `<h4 class="font-medium text-gray-700 mb-3 bg-gray-50 p-2 rounded">${group.group_name}</h4>`;
             html += `<div class="grid grid-cols-1 md:grid-cols-2 gap-4">`;
             
             group.specifications.forEach(spec => {
                 const fieldName = `specifications[${specIndex}]`;
                 
                 const match = existingSpecs.find(s => s.specification_id === spec.id);
                 const existingValId = match ? match.specification_value_id : null;
                 const existingCustom = match ? match.custom_value : '';

                 html += `<div>`;
                 html += `<input type="hidden" name="${fieldName}[specification_id]" value="${spec.id}">`;
                 html += `<label class="block text-sm text-gray-600 mb-1">${spec.name} ${spec.is_required ? '<span class="text-red-500">*</span>' : ''}</label>`;
                 
                 if (['select', 'multiselect', 'radio'].includes(spec.input_type)) {
                     html += `<select name="${fieldName}[specification_value_id]" class="w-full px-3 py-2 border rounded-lg outline-none focus:ring-1 focus:ring-blue-500">`;
                     html += `<option value="">Select ${spec.name}</option>`;
                     html += `<option value="">None</option>`;
                     if(spec.values) {
                         spec.values.forEach(val => {
                             const selected = (existingValId == val.id) ? 'selected' : '';
                             html += `<option value="${val.id}" ${selected}>${val.value}</option>`;
                         });
                     }
                     html += `</select>`;
                 } else if (spec.input_type === 'textarea') {
                     const val = existingCustom || '';
                     html += `<textarea name="${fieldName}[custom_value]" rows="3" class="w-full px-3 py-2 border rounded-lg outline-none focus:ring-1 focus:ring-blue-500">${val}</textarea>`;
                 } else if (spec.input_type === 'checkbox') {
                     const checked = existingCustom == '1' ? 'checked' : '';
                     html += `
                        <div class="flex items-center mt-2">
                            <input type="hidden" name="${fieldName}[custom_value]" value="0">
                            <input type="checkbox" name="${fieldName}[custom_value]" value="1" ${checked} class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">Yes</span>
                        </div>
                     `;
                 } else {
                     const val = existingCustom || '';
                     html += `<input type="text" name="${fieldName}[custom_value]" value="${val}" class="w-full px-3 py-2 border rounded-lg outline-none focus:ring-1 focus:ring-blue-500">`;
                 }
                 
                 html += `</div>`;
                 specIndex++;
             });
             
             html += `</div></div>`;
         });

         container.innerHTML = html;
    }
    
    // Initial Load
    const initialCategory = document.getElementById('main_category_id').value;
    if(initialCategory) {
        fetchSpecifications(initialCategory);
    }


    // Media Manager
    let currentMode = 'main';
    let selectedMediaId = null;
    let currentVariantIndex = null; // For variant images

    function openMediaModal(mode) {
        currentMode = mode;
        document.getElementById('media-modal').classList.remove('hidden');
        loadMedia(1);
    }

    function closeMediaModal() {
        document.getElementById('media-modal').classList.add('hidden');
    }
    
    // Variant Modal Intent
    function openVariantMediaModal(idx) {
        currentVariantIndex = idx;
        Swal.fire({
            title: 'Manage Variant Images',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Set Main Image',
            denyButtonText: 'Add Gallery Images',
        }).then((result) => {
            if (result.isConfirmed) {
                openMediaModal('variant-main');
            } else if (result.isDenied) {
                openMediaModal('variant-gallery');
            }
        });
    }

    async function loadMedia(page = 1, search = '') {
        const grid = document.getElementById('media-grid');
        grid.innerHTML = '<div class="col-span-full text-center">Loading...</div>';
        
        try {
            const response = await axios.get('{{ route("admin.media.data") }}', {
                params: { page, search }
            });
            renderMediaGrid(response.data);
        } catch (error) {
            console.error(error);
            grid.innerHTML = '<div class="col-span-full text-red-500">Error loading media</div>';
        }
    }

    function renderMediaGrid(data) {
        const grid = document.getElementById('media-grid');
        grid.innerHTML = '';
        
        data.data.forEach(media => {
             const div = document.createElement('div');
             div.className = `relative group cursor-pointer border rounded-lg overflow-hidden ${selectedMediaId === media.id ? 'ring-2 ring-blue-500' : ''}`;
             div.onclick = () => selectMedia(media.id, media.url);
             div.innerHTML = `
                <img src="${media.thumb_url || media.url}" class="w-full h-32 object-cover">
                <div class="p-2 text-xs truncate">${media.filename}</div>
             `;
             grid.appendChild(div);
        });

         const pag = document.getElementById('media-pagination');
         let pagHtml = `<span class="text-sm">Page ${data.current_page} of ${data.last_page}</span>`;
         pagHtml += `<div class="space-x-1">`;
         if(data.prev_page_url) pagHtml += `<button type="button" onclick="loadMedia(${data.current_page - 1})" class="px-2 py-1 border rounded hover:bg-gray-50">Prev</button>`;
         if(data.next_page_url) pagHtml += `<button type="button" onclick="loadMedia(${data.current_page + 1})" class="px-2 py-1 border rounded hover:bg-gray-50">Next</button>`;
         pagHtml += `</div>`;
         pag.innerHTML = pagHtml;
    }

    function selectMedia(id, url) {
        selectedMediaId = id;
        const items = document.getElementById('media-grid').children;
        for(let item of items) {
            item.classList.remove('ring-2', 'ring-blue-500');
            if(item.querySelector('img').src.includes(url)) {
                 item.classList.add('ring-2', 'ring-blue-500');
            }
        }
        
        const btn = document.getElementById('media-select-btn');
        btn.onclick = () => confirmSelection(id, url);
    }

    function confirmSelection(id, url) {
        if(currentMode === 'main') {
            document.getElementById('main_image_id').value = id;
            document.getElementById('main-image-preview').innerHTML = `<img src="${url}" class="h-32 object-cover rounded border">`;
        } else if (currentMode === 'gallery') {
            addGalleryImage(id, url);
        } else if (currentMode === 'variant-main') {
            setVariantMainImage(currentVariantIndex, id, url);
        } else if (currentMode === 'variant-gallery') {
            addVariantGalleryImage(currentVariantIndex, id, url);
        }
        
        if(!currentMode.includes('gallery')) {
             closeMediaModal();
        } else {
             toastr.success('Image added to gallery');
        }
    }
    
    function addGalleryImage(id, url) {
        const inputs = document.querySelectorAll('input[name="gallery_image_ids[]"]');
        for(let input of inputs) {
            if(input.value == id) return;
        }
        
        const container = document.getElementById('gallery-container');
        const div = document.createElement('div');
        div.className = "relative group border rounded-lg overflow-hidden h-24";
        div.innerHTML = `
            <img src="${url}" class="w-full h-full object-cover">
            <input type="hidden" name="gallery_image_ids[]" value="${id}">
            <button type="button" onclick="this.parentElement.remove()" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        `;
        container.appendChild(div);
    }

    function setVariantMainImage(idx, id, url) {
        const container = document.getElementById(`variant-images-${idx}`);
        const input = document.getElementById(`variant-main-input-${idx}`);
        
        const existing = container.querySelector('.variant-main-thumb');
        if(existing) existing.remove();
        
        input.value = id;
        
        const thumb = document.createElement('div');
        thumb.className = 'relative w-10 h-10 variant-main-thumb border-2 border-blue-500';
        thumb.innerHTML = `<img src="${url}" class="w-full h-full object-cover">`;
        container.prepend(thumb);
    }

    function addVariantGalleryImage(idx, id, url) {
        const container = document.getElementById(`variant-images-${idx}`);
        const hiddenContainer = document.getElementById(`variant-gallery-inputs-${idx}`);
        
        if(hiddenContainer.querySelector(`input[value="${id}"]`)) return;
        
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = `variants[${idx}][gallery_image_ids][]`;
        input.value = id;
        hiddenContainer.appendChild(input);
        
        const thumb = document.createElement('div');
        thumb.className = 'relative w-10 h-10 border border-gray-200';
        thumb.innerHTML = `<img src="${url}" class="w-full h-full object-cover">`;
        container.appendChild(thumb);
    }
    
    async function handleFileUpload(input) {
        if (!input.files.length) return;
        
        const formData = new FormData();
        for (let i = 0; i < input.files.length; i++) {
            formData.append('files[]', input.files[i]);
        }
        
        try {
            await axios.post('{{ route("admin.media.upload") }}', formData, {
                headers: { 'Content-Type': 'multipart/form-data' }
            });
            loadMedia(1); 
        } catch (error) {
            alert('Upload failed');
        }
    }

    document.getElementById('media-search').addEventListener('input', _.debounce((e) => {
        loadMedia(1, e.target.value);
    }, 500));
</script>
@endpush
