@extends('admin.layouts.master')

@section('title', 'Stock Adjustments')

@section('content')
<div class="mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Stock Adjustments</h2>
            <p class="text-gray-600">Make bulk stock updates and adjustments</p>
        </div>
        <a href="{{ route('admin.inventory.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Back to Inventory
        </a>
    </div>
</div>

<!-- Bulk Stock Update Form -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Bulk Stock Update</h3>
    </div>
    <form id="bulkUpdateForm" class="p-6">
        <div class="space-y-6">
            <!-- Step 1: Select Products -->
            <div>
                <h4 class="text-md font-semibold text-gray-700 mb-3">Step 1: Select Products</h4>
                <div class="flex space-x-4 mb-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Filter by Category</label>
                        <select id="bulkCategoryFilter" onchange="filterBulkProducts()"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="jewelry">Jewelry</option>
                            <option value="home-kitchen">Home & Kitchen</option>
                            <option value="wearables">Wearables</option>
                            <option value="accessories">Accessories</option>
                            <option value="fitness">Fitness</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Filter by Brand</label>
                        <select id="bulkBrandFilter" onchange="filterBulkProducts()"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">All Brands</option>
                            <option value="nike">Nike</option>
                            <option value="adidas">Adidas</option>
                            <option value="apple">Apple</option>
                            <option value="samsung">Samsung</option>
                            <option value="sony">Sony</option>
                            <option value="logitech">Logitech</option>
                        </select>
                    </div>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 max-h-64 overflow-y-auto">
                    <div id="bulkProductsList" class="space-y-2">
                        <!-- Products will be loaded here -->
                    </div>
                </div>
                <div class="flex justify-between items-center mt-3">
                    <span id="selectedCount" class="text-sm text-gray-600">0 products selected</span>
                    <button type="button" onclick="selectAllBulkProducts()" class="text-sm text-indigo-600 hover:text-indigo-800">
                        Select All
                    </button>
                </div>
            </div>

            <!-- Step 2: Stock Update Details -->
            <div>
                <h4 class="text-md font-semibold text-gray-700 mb-3">Step 2: Update Details</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Update Type</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" name="bulkUpdateType" value="add" checked class="mr-2">
                                <span class="text-sm text-gray-700">Add Stock</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="bulkUpdateType" value="remove" class="mr-2">
                                <span class="text-sm text-gray-700">Remove Stock</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="bulkUpdateType" value="set" class="mr-2">
                                <span class="text-sm text-gray-700">Set Stock to Specific Value</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span id="quantityLabelText">Quantity to Add</span>
                        </label>
                        <input type="number" id="bulkUpdateQuantity" name="quantity" min="0" step="1"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Enter quantity" required>
                    </div>
                </div>
            </div>

            <!-- Step 3: Additional Information -->
            <div>
                <h4 class="text-md font-semibold text-gray-700 mb-3">Step 3: Additional Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Reason for Update</label>
                        <select id="bulkUpdateReason" name="reason"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="restock">Restock/Inventory Replenishment</option>
                            <option value="sale">Sale/Order Fulfillment</option>
                            <option value="return">Customer Return</option>
                            <option value="damage">Damaged/Defective Items</option>
                            <option value="adjustment">Stock Adjustment</option>
                            <option value="transfer">Warehouse Transfer</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Reference/PO Number</label>
                        <input type="text" id="bulkReference" name="reference"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Optional">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                    <textarea id="bulkUpdateNotes" name="notes" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Add any additional notes about this stock adjustment..."></textarea>
                </div>
            </div>

            <!-- Preview -->
            <div id="bulkUpdatePreview" class="hidden p-4 bg-gray-50 rounded-lg border border-gray-200">
                <h4 class="text-md font-semibold text-gray-700 mb-3">Update Preview</h4>
                <div id="previewContent">
                    <!-- Preview will be loaded here -->
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <button type="button" onclick="resetBulkForm()" class="btn-secondary">
                    Reset
                </button>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save mr-2"></i>Apply Stock Update
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Recent Stock Adjustments -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Recent Stock Adjustments</h3>
    </div>
    <div class="p-6">
        <div id="recentAdjustments" class="space-y-4">
            <!-- Recent adjustments will be loaded here -->
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-exchange-alt text-4xl mb-3 opacity-50"></i>
                <p>No recent stock adjustments</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Use the same inventory data from index.php
window.inventoryData = [
    {
        id: 1,
        name: "Apple AirPods Pro",
        sku: "APP-AIRPRO",
        category: "electronics",
        brand: "apple",
        current_stock: 20,
        min_stock: 5,
        status: "in_stock",
        image: "",
        last_updated: "2025-01-01 10:00"
    },
    {
        id: 2,
        name: "Nike Running Shoes",
        sku: "NIKE-RUN-01",
        category: "clothing",
        brand: "nike",
        current_stock: 8,
        min_stock: 3,
        status: "low_stock",
        image: "",
        last_updated: "2025-01-01 12:00"
    },
    {
        id: 3,
        name: "Samsung Galaxy Watch",
        sku: "SAM-WATCH-4",
        category: "wearables",
        brand: "samsung",
        current_stock: 0,
        min_stock: 2,
        status: "out_of_stock",
        image: "",
        last_updated: "2025-01-01 14:00"
    }
];

let bulkSelectedProducts = new Set();

// Load products for bulk update
function loadBulkProducts() {
    const productList = document.getElementById('bulkProductsList');
    productList.innerHTML = '';
    
    const categoryFilter = document.getElementById('bulkCategoryFilter').value;
    const brandFilter = document.getElementById('bulkBrandFilter').value;
    
    // Filter products
    const filteredProducts = window.inventoryData.filter(product => {
        if (categoryFilter && product.category !== categoryFilter) return false;
        if (brandFilter && product.brand !== brandFilter) return false;
        return true;
    });
    
    // Populate product list
    filteredProducts.forEach(product => {
        const isSelected = bulkSelectedProducts.has(product.id);
        const productDiv = document.createElement('div');
        productDiv.className = 'flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg hover:bg-gray-50';
        productDiv.innerHTML = `
            <div class="flex items-center space-x-3">
                <input type="checkbox" value="${product.id}" 
                    ${isSelected ? 'checked' : ''}
                    onchange="toggleBulkProduct(${product.id})"
                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <div class="w-8 h-8 bg-gray-100 rounded flex items-center justify-center overflow-hidden">
                    ${product.image ? 
                        `<img src="${product.image}" class="w-full h-full object-cover">` : 
                        `<i class="fas fa-box text-gray-400 text-xs"></i>`
                    }
                </div>
                <div>
                    <p class="font-medium text-gray-900 text-sm">${product.name}</p>
                    <p class="text-xs text-gray-500">${product.sku}</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium ${product.status === 'in_stock' ? 'text-emerald-600' : product.status === 'low_stock' ? 'text-amber-600' : 'text-rose-600'}">
                    ${product.current_stock} in stock
                </p>
                <p class="text-xs text-gray-500">Min: ${product.min_stock}</p>
            </div>
        `;
        productList.appendChild(productDiv);
    });
    
    updateSelectedCount();
}

// Toggle product selection
function toggleBulkProduct(productId) {
    if (bulkSelectedProducts.has(productId)) {
        bulkSelectedProducts.delete(productId);
    } else {
        bulkSelectedProducts.add(productId);
    }
    updateSelectedCount();
    updateBulkPreview();
}

// Select all products
function selectAllBulkProducts() {
    const checkboxes = document.querySelectorAll('#bulkProductsList input[type="checkbox"]');
    const allSelected = Array.from(checkboxes).every(cb => cb.checked);
    
    checkboxes.forEach(cb => {
        const productId = parseInt(cb.value);
        if (allSelected) {
            bulkSelectedProducts.delete(productId);
            cb.checked = false;
        } else {
            bulkSelectedProducts.add(productId);
            cb.checked = true;
        }
    });
    
    updateSelectedCount();
    updateBulkPreview();
}

// Update selected count
function updateSelectedCount() {
    document.getElementById('selectedCount').textContent = 
        `${bulkSelectedProducts.size} products selected`;
}

// Filter products when category/brand changes
function filterBulkProducts() {
    loadBulkProducts();
}

// Update bulk preview
function updateBulkPreview() {
    const quantity = parseInt(document.getElementById('bulkUpdateQuantity').value) || 0;
    const updateType = document.querySelector('input[name="bulkUpdateType"]:checked').value;
    const previewDiv = document.getElementById('bulkUpdatePreview');
    
    if (bulkSelectedProducts.size === 0 || quantity <= 0) {
        previewDiv.classList.add('hidden');
        return;
    }
    
    previewDiv.classList.remove('hidden');
    
    let previewHTML = '<div class="space-y-3">';
    
    // Get selected products
    const selectedProducts = window.inventoryData.filter(p => bulkSelectedProducts.has(p.id));
    
    selectedProducts.forEach(product => {
        let newStock = product.current_stock;
        let changeText = '';
        
        switch(updateType) {
            case 'add':
                newStock = product.current_stock + quantity;
                changeText = `+${quantity}`;
                break;
            case 'remove':
                if (quantity > product.current_stock) {
                    newStock = 0;
                    changeText = `-${product.current_stock} (insufficient)`;
                } else {
                    newStock = product.current_stock - quantity;
                    changeText = `-${quantity}`;
                }
                break;
            case 'set':
                newStock = quantity;
                changeText = `Set to ${quantity}`;
                break;
        }
        
        const stockClass = newStock <= 0 ? 'text-rose-600' : 
                          newStock <= product.min_stock ? 'text-amber-600' : 'text-emerald-600';
        
        previewHTML += `
            <div class="flex justify-between items-center p-2 bg-white border border-gray-200 rounded">
                <div>
                    <p class="text-sm font-medium">${product.name}</p>
                    <p class="text-xs text-gray-500">Current: ${product.current_stock}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm ${stockClass} font-medium">${changeText}</p>
                    <p class="text-xs text-gray-500">New: ${newStock}</p>
                </div>
            </div>
        `;
    });
    
    previewHTML += '</div>';
    document.getElementById('previewContent').innerHTML = previewHTML;
}

// Update quantity label based on update type
function updateQuantityLabel() {
    const updateType = document.querySelector('input[name="bulkUpdateType"]:checked').value;
    const label = document.getElementById('quantityLabelText');
    
    switch(updateType) {
        case 'add':
            label.textContent = 'Quantity to Add';
            break;
        case 'remove':
            label.textContent = 'Quantity to Remove';
            break;
        case 'set':
            label.textContent = 'Set Stock To';
            break;
    }
    
    updateBulkPreview();
}

// Reset bulk form
function resetBulkForm() {
    bulkSelectedProducts.clear();
    document.getElementById('bulkUpdateQuantity').value = '';
    document.getElementById('bulkReference').value = '';
    document.getElementById('bulkUpdateNotes').value = '';
    document.getElementById('bulkCategoryFilter').value = '';
    document.getElementById('bulkBrandFilter').value = '';
    document.querySelector('input[name="bulkUpdateType"][value="add"]').checked = true;
    
    loadBulkProducts();
    updateQuantityLabel();
    updateBulkPreview();
    
    toastr.info('Form has been reset');
}

// Handle bulk form submission
document.getElementById('bulkUpdateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (bulkSelectedProducts.size === 0) {
        toastr.error('Please select at least one product');
        return;
    }
    
    const quantity = parseInt(document.getElementById('bulkUpdateQuantity').value);
    if (!quantity || quantity <= 0) {
        toastr.error('Please enter a valid quantity');
        return;
    }
    
    const updateType = document.querySelector('input[name="bulkUpdateType"]:checked').value;
    const reason = document.getElementById('bulkUpdateReason').value;
    const reference = document.getElementById('bulkReference').value;
    const notes = document.getElementById('bulkUpdateNotes').value;
    
    // Check for insufficient stock in remove operations
    if (updateType === 'remove') {
        const insufficientProducts = [];
        bulkSelectedProducts.forEach(productId => {
            const product = window.inventoryData.find(p => p.id === productId);
            if (product && quantity > product.current_stock) {
                insufficientProducts.push(product.name);
            }
        });
        
        if (insufficientProducts.length > 0) {
            Swal.fire({
                title: 'Insufficient Stock',
                html: `
                    <div class="text-left">
                        <p class="mb-3">Cannot remove ${quantity} items from:</p>
                        <ul class="list-disc pl-5 text-sm text-gray-600">
                            ${insufficientProducts.map(p => `<li>${p}</li>`).join('')}
                        </ul>
                        <p class="mt-3 text-sm text-gray-500">These products will be set to 0 stock.</p>
                    </div>
                `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Proceed Anyway',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    applyBulkUpdate(updateType, quantity, reason, reference, notes);
                }
            });
            return;
        }
    }
    
    applyBulkUpdate(updateType, quantity, reason, reference, notes);
});

function applyBulkUpdate(updateType, quantity, reason, reference, notes) {
    let updatedCount = 0;
    let errors = [];
    
    bulkSelectedProducts.forEach(productId => {
        const productIndex = window.inventoryData.findIndex(p => p.id === productId);
        if (productIndex !== -1) {
            const product = window.inventoryData[productIndex];
            let newStock = product.current_stock;
            
            switch(updateType) {
                case 'add':
                    newStock = product.current_stock + quantity;
                    break;
                case 'remove':
                    newStock = Math.max(0, product.current_stock - quantity);
                    break;
                case 'set':
                    newStock = quantity;
                    break;
            }
            
            // Update stock
            window.inventoryData[productIndex].current_stock = newStock;
            
            // Update status
            if (newStock <= 0) {
                window.inventoryData[productIndex].status = 'out_of_stock';
            } else if (newStock <= product.min_stock) {
                window.inventoryData[productIndex].status = 'low_stock';
            } else {
                window.inventoryData[productIndex].status = 'in_stock';
            }
            
            // Update timestamp
            window.inventoryData[productIndex].last_updated = new Date().toISOString().slice(0, 16).replace('T', ' ');
            
            updatedCount++;
            
            // Add to history
            const historyEntry = {
                id: Date.now(),
                product_id: productId,
                product_name: product.name,
                old_stock: product.current_stock,
                new_stock: newStock,
                action: updateType,
                quantity: quantity,
                reason: reason,
                reference: reference,
                notes: notes,
                updated_by: 'Admin',
                updated_at: new Date().toISOString()
            };
            
            // Save to localStorage
            let history = JSON.parse(localStorage.getItem('stockHistory') || '[]');
            history.unshift(historyEntry);
            localStorage.setItem('stockHistory', JSON.stringify(history.slice(0, 100)));
        }
    });
    
    // Show success message
    Swal.fire({
        title: 'Success!',
        text: `Updated stock for ${updatedCount} product(s)`,
        icon: 'success',
        confirmButtonText: 'OK'
    }).then(() => {
        // Reset form
        resetBulkForm();
        
        // Reload recent adjustments
        loadRecentAdjustments();
    });
}

// Load recent adjustments
function loadRecentAdjustments() {
    const container = document.getElementById('recentAdjustments');
    let history = JSON.parse(localStorage.getItem('stockHistory') || '[]');
    
    // Get recent adjustments (last 5)
    const recent = history.slice(0, 5);
    
    if (recent.length === 0) {
        container.innerHTML = `
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-exchange-alt text-4xl mb-3 opacity-50"></i>
                <p>No recent stock adjustments</p>
            </div>
        `;
        return;
    }
    
    container.innerHTML = '';
    
    recent.forEach(entry => {
        const date = new Date(entry.updated_at);
        const actionIcon = entry.action === 'add' ? 
            '<i class="fas fa-plus-circle text-emerald-500"></i>' : 
            entry.action === 'remove' ? 
            '<i class="fas fa-minus-circle text-rose-500"></i>' : 
            '<i class="fas fa-equals-circle text-indigo-500"></i>';
        
        const actionText = entry.action === 'add' ? 'Stock Added' : 
                          entry.action === 'remove' ? 'Stock Removed' : 'Stock Set';
        
        const adjustmentDiv = document.createElement('div');
        adjustmentDiv.className = 'p-4 border border-gray-200 rounded-lg hover:bg-gray-50';
        adjustmentDiv.innerHTML = `
            <div class="flex justify-between items-start mb-2">
                <div class="flex items-center space-x-2">
                    ${actionIcon}
                    <span class="font-medium text-gray-800">${entry.product_name}</span>
                </div>
                <span class="text-sm text-gray-500">${date.toLocaleDateString()} ${date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
            </div>
            <div class="grid grid-cols-3 gap-4 text-sm">
                <div>
                    <span class="text-gray-500">Action:</span>
                    <span class="ml-2 font-medium">${actionText}</span>
                </div>
                <div>
                    <span class="text-gray-500">Change:</span>
                    <span class="ml-2 font-medium ${entry.action === 'add' ? 'text-emerald-600' : entry.action === 'remove' ? 'text-rose-600' : 'text-indigo-600'}">
                        ${entry.action === 'add' ? '+' : entry.action === 'remove' ? '-' : '='}${entry.quantity}
                    </span>
                </div>
                <div>
                    <span class="text-gray-500">New Stock:</span>
                    <span class="ml-2 font-bold">${entry.new_stock}</span>
                </div>
            </div>
            <div class="mt-2 text-sm text-gray-600">
                <span class="text-gray-500">Reason:</span> ${entry.reason}
                ${entry.reference ? ` • Ref: ${entry.reference}` : ''}
            </div>
            ${entry.notes ? `<div class="mt-1 text-sm text-gray-500">${entry.notes}</div>` : ''}
        `;
        container.appendChild(adjustmentDiv);
    });
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    // Load products
    loadBulkProducts();
    
    // Load recent adjustments
    loadRecentAdjustments();
    
    // Update quantity label when radio changes
    document.querySelectorAll('input[name="bulkUpdateType"]').forEach(radio => {
        radio.addEventListener('change', function() {
            updateQuantityLabel();
        });
    });
    
    // Update preview when quantity changes
    document.getElementById('bulkUpdateQuantity').addEventListener('input', updateBulkPreview);
    
    // Initial label update
    updateQuantityLabel();
});
</script>
@endpush