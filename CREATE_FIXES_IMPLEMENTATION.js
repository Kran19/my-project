// ===== ADD THIS CODE TO create.blade.php IN THE @push('scripts') SECTION =====

// Add loading overlay for API data
const loadingHTML = `
    <div id="apiLoadingOverlay" class="fixed inset-0 bg-white bg-opacity-95 z-50 flex items-center justify-center" style="backdrop-filter: blur(4px);">
        <div class="text-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-indigo-600 mx-auto mb-4"></div>
            <p class="text-gray-700 text-lg font-medium">Loading form data...</p>
            <p class="text-gray-500 text-sm mt-2">Fetching categories, brands, and other options...</p>
        </div>
    </div>
`;

// Insert loading overlay
document.addEventListener('DOMContentLoaded', function() {
    document.body.insertAdjacentHTML('afterbegin', loadingHTML);
    
    // Disable form until data loads
    const formElement = document.getElementById('productForm');
    if (formElement) {
        formElement.style.pointerEvents = 'none';
        formElement.style.opacity = '0.6';
    }
});

// ===== MODIFY THE INITIALIZATION FUNCTION =====
// Wrap all API loading in Promise.all to wait for everything:

async function initializeCreateForm() {
    try {
        // Load all dropdown data in parallel
        await Promise.all([
            loadCategories(),
            loadBrands(),
            loadTaxClasses(),
            loadTags(),
            loadAttributes()
        ]);
        
        // Remove loading overlay
        const overlay = document.getElementById('apiLoadingOverlay');
        if (overlay) {
            overlay.style.opacity = '0';
            overlay.style.transition = 'opacity 0.3s';
            setTimeout(() => overlay.remove(), 300);
        }
        
        // Enable form
        const formElement = document.getElementById('productForm');
        if (formElement) {
            formElement.style.pointerEvents = '';
            formElement.style.opacity = '1';
            formElement.style.transition = 'opacity 0.3s';
        }
        
        toastr.success('Form ready');
        
    } catch (error) {
        console.error('Error initializing form:', error);
        toastr.error('Failed to load form data');
        
        // Remove overlay even on error
        const overlay = document.getElementById('apiLoadingOverlay');
        if (overlay) overlay.remove();
        
        // Enable form anyway
        const formElement = document.getElementById('productForm');
        if (formElement) {
            formElement.style.pointerEvents = '';
            formElement.style.opacity = '1';
        }
    }
}

// ===== MODIFY loadCategories TO RETURN PROMISE =====

async function loadCategories() {
    try {
        const response = await axiosInstance.get('/categories');
        if (response.data.success) {
            const categories = response.data.data;
            const select = document.getElementById('categoryId');
            if (select) {
                select.innerHTML = '<option value="">Select Category</option>';
                categories.forEach(cat => {
                    select.innerHTML += `<option value="${cat.id}">${cat.name}</option>`;
                });
            }
        }
    } catch (error) {
        console.error('Error loading categories:', error);
        throw error;
    }
}

// ===== MODIFY loadBrands TO RETURN PROMISE =====

async function loadBrands() {
    try {
        const response = await axiosInstance.get('/brands');
        if (response.data.success) {
            const brands = response.data.data;
            const select = document.getElementById('brandId');
            if (select) {
                select.innerHTML = '<option value="">Select Brand</option>';
                brands.forEach(brand => {
                    select.innerHTML += `<option value="${brand.id}">${brand.name}</option>`;
                });
            }
        }
    } catch (error) {
        console.error('Error loading brands:', error);
        throw error;
    }
}

// ===== MODIFY loadTaxClasses TO RETURN PROMISE =====

async function loadTaxClasses() {
    try {
        const response = await axiosInstance.get('/tax-classes');
        if (response.data.success) {
            const taxClasses = response.data.data;
            const select = document.getElementById('taxClassId');
            if (select) {
                select.innerHTML = '<option value="">No Tax</option>';
                taxClasses.forEach(tax => {
                    select.innerHTML += `<option value="${tax.id}">${tax.name} (${tax.rate}%)</option>`;
                });
            }
        }
    } catch (error) {
        console.error('Error loading tax classes:', error);
        throw error;
    }
}

// ===== CALL INITIALIZATION ON PAGE LOAD =====

document.addEventListener('DOMContentLoaded', function() {
    initializeCreateForm();
});
