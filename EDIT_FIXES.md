# Admin Products Edit Page Fixes

## Issues to Fix:
1. Category should be disabled (not editable) once product is created
2. Product type cannot be changed from simple to configurable
3. Selected values not showing in dropdowns
4. Images not displaying
5. Page should wait for API data to load before showing form

## Implementation:

Add these changes to edit.blade.php in the @push('scripts') section:

```javascript
// Add loading overlay
let isDataLoaded = false;
const loadingOverlay = `
    <div id="loadingOverlay" class="fixed inset-0 bg-white bg-opacity-90 z-50 flex items-center justify-center">
        <div class="text-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-indigo-600 mx-auto mb-4"></div>
            <p class="text-gray-600 text-lg">Loading product data...</p>
        </div>
    </div>
`;
document.body.insertAdjacentHTML('beforeend', loadingOverlay);

// Disable form until data loads
document.getElementById('productForm').style.pointerEvents = 'none';
document.getElementById('productForm').style.opacity = '0.5';

// Load product data
async function loadProductData() {
    try {
        const productId = document.getElementById('productId').value;
        const response = await axiosInstance.get(`/products/${productId}`);
        
        if (response.data.success) {
            const product = response.data.data;
            
            // Populate form fields
            document.getElementById('productName').value = product.name || '';
            document.getElementById('productSlug').value = product.slug || '';
            document.getElementById('productCode').value = product.product_code || '';
            
            // Set product type and DISABLE it
            const productType = product.product_type || 'simple';
            document.querySelector(`input[name="product_type"][value="${productType}"]`).checked = true;
            document.querySelectorAll('input[name="product_type"]').forEach(input => {
                input.disabled = true;
                input.closest('.product-type-option').style.opacity = '0.6';
                input.closest('.product-type-option').style.cursor = 'not-allowed';
            });
            
            // Load and set category (DISABLED)
            await loadCategories();
            if (product.main_category_id) {
                document.getElementById('categoryId').value = product.main_category_id;
                document.getElementById('categoryId').disabled = true;
                document.getElementById('categoryId').style.opacity = '0.6';
                document.getElementById('categoryId').style.cursor = 'not-allowed';
            }
            
            // Load and set brand
            await loadBrands();
            if (product.brand_id) {
                document.getElementById('brandId').value = product.brand_id;
            }
            
            // Load and set tax class
            await loadTaxClasses();
            if (product.tax_class_id) {
                document.getElementById('taxClassId').value = product.tax_class_id;
            }
            
            // Set other fields
            document.getElementById('shortDescription').value = product.short_description || '';
            document.getElementById('description').value = product.description || '';
            document.getElementById('metaTitle').value = product.meta_title || '';
            document.getElementById('metaDescription').value = product.meta_description || '';
            document.getElementById('metaKeywords').value = product.meta_keywords || '';
            
            // Set checkboxes
            document.getElementById('isActive').checked = product.status === 'active';
            document.getElementById('isFeatured').checked = product.is_featured || false;
            document.getElementById('isNew').checked = product.is_new || false;
            document.getElementById('isBestseller').checked = product.is_bestseller || false;
            
            // Load images
            if (product.default_variant?.images) {
                displayExistingImages(product.default_variant.images);
            }
            
            // Load tags
            if (product.tags && product.tags.length > 0) {
                const tagIds = product.tags.map(t => t.id);
                $('#productTags').val(tagIds).trigger('change');
            }
            
            isDataLoaded = true;
            
            // Remove loading overlay
            document.getElementById('loadingOverlay').remove();
            document.getElementById('productForm').style.pointerEvents = '';
            document.getElementById('productForm').style.opacity = '1';
            
            toastr.success('Product data loaded');
        }
    } catch (error) {
        console.error('Error loading product:', error);
        toastr.error('Failed to load product data');
        document.getElementById('loadingOverlay').remove();
    }
}

// Display existing images
function displayExistingImages(images) {
    const container = document.getElementById('selectedImagesContainer');
    if (!container) return;
    
    container.innerHTML = '';
    
    images.forEach((image, index) => {
        const imageUrl = image.url || (typeof image === 'string' ? image : '');
        if (!imageUrl) return;
        
        const imageDiv = document.createElement('div');
        imageDiv.className = 'relative group';
        imageDiv.innerHTML = `
            <img src="${imageUrl}" class="w-full h-32 object-cover rounded-lg">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                <button type="button" onclick="removeImage(${index})" class="text-white hover:text-red-500">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            ${image.is_primary ? '<span class="absolute top-2 left-2 bg-green-500 text-white text-xs px-2 py-1 rounded">Primary</span>' : ''}
        `;
        container.appendChild(imageDiv);
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    loadProductData();
});
```

## Additional CSS for loading overlay:
Add to @push('styles'):

```css
#loadingOverlay {
    backdrop-filter: blur(4px);
}
```
