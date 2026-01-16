// ===== ADD THIS CODE TO edit.blade.php AFTER THE GLOBAL VARIABLES SECTION =====

// Add loading overlay HTML
const loadingHTML = `
    <div id="pageLoadingOverlay" class="fixed inset-0 bg-white bg-opacity-95 z-50 flex items-center justify-center" style="backdrop-filter: blur(4px);">
        <div class="text-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-indigo-600 mx-auto mb-4"></div>
            <p class="text-gray-700 text-lg font-medium">Loading product data...</p>
            <p class="text-gray-500 text-sm mt-2">Please wait...</p>
        </div>
    </div>
`;

// Insert loading overlay on page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
        document.body.insertAdjacentHTML('afterbegin', loadingHTML);
    });
} else {
    document.body.insertAdjacentHTML('afterbegin', loadingHTML);
}

// Disable form initially
const formElement = document.getElementById('productForm');
if (formElement) {
    formElement.style.pointerEvents = 'none';
    formElement.style.opacity = '0.6';
}

// ===== MODIFY THE loadProductData FUNCTION =====
// Replace the existing loadProductData function with this:

async function loadProductData() {
    try {
        const response = await axiosInstance.get(`/products/${productId}`);

        if (response.data.success) {
            productData = response.data.data;
            console.log('Product data loaded:', productData);

            // Populate form fields
            populateForm(productData);

            // Load dropdown data and wait for completion
            await loadDropdownData();

            // Set selected values in dropdowns AFTER they're loaded
            setTimeout(() => {
                if (productData.main_category_id) {
                    const categorySelect = document.getElementById('categoryId');
                    if (categorySelect) {
                        categorySelect.value = productData.main_category_id;
                        // DISABLE category - cannot be changed
                        categorySelect.disabled = true;
                        categorySelect.style.opacity = '0.7';
                        categorySelect.style.cursor = 'not-allowed';
                        categorySelect.parentElement.insertAdjacentHTML('beforeend', 
                            '<p class="text-xs text-amber-600 mt-1"><i class="fas fa-lock mr-1"></i>Category cannot be changed after creation</p>');
                    }
                }

                if (productData.brand_id) {
                    const brandSelect = document.getElementById('brandId');
                    if (brandSelect) brandSelect.value = productData.brand_id;
                }

                if (productData.tax_class_id) {
                    const taxSelect = document.getElementById('taxClassId');
                    if (taxSelect) taxSelect.value = productData.tax_class_id;
                }
            }, 500);

            // DISABLE product type - cannot be changed
            const productTypeInputs = document.querySelectorAll('input[name="product_type"]');
            productTypeInputs.forEach(input => {
                input.disabled = true;
                const parent = input.closest('.product-type-option');
                if (parent) {
                    parent.style.opacity = '0.6';
                    parent.style.cursor = 'not-allowed';
                    parent.style.pointerEvents = 'none';
                }
            });
            
            // Add notice about product type
            const productTypeContainer = document.querySelector('input[name="product_type"]').closest('.grid');
            if (productTypeContainer && !document.getElementById('productTypeNotice')) {
                productTypeContainer.insertAdjacentHTML('afterend', 
                    '<p id="productTypeNotice" class="text-xs text-amber-600 mt-2"><i class="fas fa-info-circle mr-1"></i>Product type cannot be changed after creation</p>');
            }

            // Load images
            loadProductImages(productData);

            // Load tags
            loadProductTags(productData);

            // Load variants if configurable
            if (productData.product_type === 'configurable') {
                loadProductVariants(productData);
            }

            // Remove loading overlay and enable form
            setTimeout(() => {
                const overlay = document.getElementById('pageLoadingOverlay');
                if (overlay) overlay.remove();
                
                if (formElement) {
                    formElement.style.pointerEvents = '';
                    formElement.style.opacity = '1';
                }
                
                toastr.success('Product data loaded successfully');
            }, 800);
        }
    } catch (error) {
        console.error('Error loading product:', error);
        toastr.error('Failed to load product data');
        
        const overlay = document.getElementById('pageLoadingOverlay');
        if (overlay) overlay.remove();
        
        if (formElement) {
            formElement.style.pointerEvents = '';
            formElement.style.opacity = '1';
        }
    }
}

// ===== MODIFY THE loadProductImages FUNCTION =====
// Add or replace this function:

function loadProductImages(product) {
    const container = document.getElementById('selectedImagesContainer');
    if (!container) return;
    
    container.innerHTML = '';
    
    // Get images from default variant
    let images = [];
    if (product.default_variant && product.default_variant.images) {
        images = Array.isArray(product.default_variant.images) 
            ? product.default_variant.images 
            : [];
    }
    
    if (images.length === 0) {
        container.innerHTML = '<p class="text-gray-500 text-sm">No images uploaded</p>';
        return;
    }
    
    images.forEach((image, index) => {
        const imageUrl = image.url || image.path || (typeof image === 'string' ? image : '');
        if (!imageUrl) return;
        
        // Ensure absolute URL
        const fullUrl = imageUrl.startsWith('http') ? imageUrl : 
                       imageUrl.startsWith('/') ? imageUrl : 
                       '/storage/' + imageUrl;
        
        const imageDiv = document.createElement('div');
        imageDiv.className = 'relative group';
        imageDiv.innerHTML = `
            <img src="${fullUrl}" 
                 class="w-full h-32 object-cover rounded-lg border border-gray-200"
                 onerror="this.src='/images/placeholder.jpg'; this.onerror=null;">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center gap-2">
                <button type="button" onclick="removeExistingImage(${index})" 
                        class="px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">
                    <i class="fas fa-trash mr-1"></i>Remove
                </button>
            </div>
            ${image.is_primary ? '<span class="absolute top-2 left-2 bg-green-500 text-white text-xs px-2 py-1 rounded shadow">Primary</span>' : ''}
        `;
        container.appendChild(imageDiv);
    });
}

// ===== ADD THIS HELPER FUNCTION =====

function removeExistingImage(index) {
    if (confirm('Remove this image?')) {
        // Implement image removal logic
        toastr.info('Image removal functionality - implement as needed');
    }
}
