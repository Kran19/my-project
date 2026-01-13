@extends('admin.layouts.master')

@section('title', 'Products Management')

@section('content')
<div class="mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Products Management</h2>
            <p class="text-gray-600">Manage your product catalog, inventory, and pricing</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.products.create') }}" class="btn-primary">
                <i class="fas fa-plus mr-2"></i>Add New Product
            </a>
            <button onclick="refreshAllData()" class="btn-secondary">
                <i class="fas fa-sync-alt mr-2"></i>Refresh
            </button>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Products</p>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="totalProducts">0</p>
            </div>
            <div class="p-3 bg-indigo-50 rounded-xl">
                <i class="fas fa-box text-indigo-600 text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Active Products</p>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="activeProducts">0</p>
            </div>
            <div class="p-3 bg-emerald-50 rounded-xl">
                <i class="fas fa-check-circle text-emerald-600 text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Featured</p>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="featuredProducts">0</p>
            </div>
            <div class="p-3 bg-amber-50 rounded-xl">
                <i class="fas fa-star text-amber-600 text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Simple</p>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="simpleProducts">0</p>
            </div>
            <div class="p-3 bg-blue-50 rounded-xl">
                <i class="fas fa-cube text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Configurable</p>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="configurableProducts">0</p>
            </div>
            <div class="p-3 bg-purple-50 rounded-xl">
                <i class="fas fa-layer-group text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Filters -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Filters</h3>
    <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
            <select id="filterType" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Types</option>
                <option value="simple">Simple</option>
                <option value="configurable">Configurable</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select id="filterStatus" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="draft">Draft</option>
                <option value="pending">Pending</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
            <select id="filterStock" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Stock</option>
                <option value="in_stock">In Stock</option>
                <option value="out_of_stock">Out of Stock</option>
                <option value="low_stock">Low Stock</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Featured</label>
            <select id="filterFeatured" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All</option>
                <option value="1">Featured</option>
                <option value="0">Not Featured</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">New</label>
            <select id="filterNew" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All</option>
                <option value="1">New</option>
                <option value="0">Not New</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Bestseller</label>
            <select id="filterBestseller" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All</option>
                <option value="1">Bestseller</option>
                <option value="0">Not Bestseller</option>
            </select>
        </div>
    </div>
</div>

<!-- Bulk Actions Bar -->
<div id="bulkActionsBar"
    class="hidden fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-white rounded-xl shadow-lg border border-gray-200 p-4 z-50 w-full max-w-lg">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-indigo-600 mr-2"></i>
                <span id="selectedCount" class="font-semibold text-gray-800">0</span>
                <span class="text-gray-600 ml-1">product(s) selected</span>
            </div>
            <div class="hidden sm:block border-l border-gray-300 h-6"></div>
            <div class="hidden sm:block text-sm text-gray-500">
                Click bulk action buttons to apply to selected items
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <button id="clearSelection"
                class="text-sm text-gray-600 hover:text-gray-800 px-3 py-1 rounded-lg hover:bg-gray-100">
                <i class="fas fa-times mr-1"></i> Clear
            </button>
            <div class="flex space-x-2">
                <button id="bulkDeleteBtn"
                    class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 transition-colors text-sm">
                    <i class="fas fa-trash mr-1"></i> Delete Selected
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Main Table -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">All Products</h3>
            <div class="flex space-x-2">
                <button id="productsBulkActionsBtn" class="btn-secondary">
                    <i class="fas fa-bolt mr-2"></i>Bulk Actions
                </button>
                <button id="productsColumnVisibilityBtn" class="btn-secondary">
                    <i class="fas fa-columns mr-2"></i>Columns
                </button>
                <div class="relative group">
                    <button id="productsExportBtn" class="btn-primary">
                        <i class="fas fa-file-export mr-2"></i>Export
                    </button>
                    <div class="absolute mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 hidden group-hover:block right-0">
                        <button data-export="csv" class="export-btn w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-indigo-600 text-sm">
                            <i class="fas fa-file-csv mr-2"></i>CSV
                        </button>
                        <button data-export="xlsx" class="export-btn w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-indigo-600 text-sm">
                            <i class="fas fa-file-excel mr-2"></i>Excel
                        </button>
                        <button data-export="print" class="export-btn w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-indigo-600 text-sm">
                            <i class="fas fa-print mr-2"></i>Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-6">
        <!-- Search Bar -->
        <div class="mb-4">
            <div class="relative">
                <input type="text" id="productsSearchInput" placeholder="Search products by name, SKU, or category..."
                    class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>

        <!-- Loading State -->
        <div id="loadingState" class="text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
            <p class="mt-2 text-gray-500">Loading products...</p>
        </div>

        <!-- Tabulator Table Container -->
        <div id="productsTable" class="w-full overflow-x-auto"></div>

        <!-- Pagination Info -->
        <div id="paginationInfo" class="mt-4 text-sm text-gray-500 text-center"></div>
    </div>
</div>

<!-- Bulk Actions Modal -->
<div id="bulkActionsModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 text-center">Bulk Actions</h3>
            <div class="space-y-3">
                <button onclick="applyBulkAction('activate')" class="w-full btn-secondary text-left">
                    <i class="fas fa-toggle-on mr-2 text-emerald-600"></i>Activate Selected
                </button>
                <button onclick="applyBulkAction('inactivate')" class="w-full btn-secondary text-left">
                    <i class="fas fa-toggle-off mr-2 text-rose-600"></i>Inactivate Selected
                </button>
                <button onclick="applyBulkAction('draft')" class="w-full btn-secondary text-left">
                    <i class="fas fa-edit mr-2 text-blue-600"></i>Mark as Draft
                </button>
                <button onclick="applyBulkAction('pending')" class="w-full btn-secondary text-left">
                    <i class="fas fa-clock mr-2 text-amber-600"></i>Mark as Pending
                </button>
                <button onclick="applyBulkAction('feature')" class="w-full btn-secondary text-left">
                    <i class="fas fa-star mr-2 text-amber-500"></i>Mark as Featured
                </button>
                <button onclick="applyBulkAction('unfeature')" class="w-full btn-secondary text-left">
                    <i class="far fa-star mr-2 text-gray-500"></i>Remove from Featured
                </button>
                <button onclick="applyBulkAction('new')" class="w-full btn-secondary text-left">
                    <i class="fas fa-certificate mr-2 text-blue-500"></i>Mark as New
                </button>
                <button onclick="applyBulkAction('not_new')" class="w-full btn-secondary text-left">
                    <i class="fas fa-times-circle mr-2 text-gray-500"></i>Remove from New
                </button>
                <button onclick="applyBulkAction('delete')" class="w-full btn-secondary text-left border-rose-200 text-rose-600 hover:bg-rose-50">
                    <i class="fas fa-trash mr-2"></i>Delete Selected
                </button>
            </div>
            <div class="mt-6 flex justify-center">
                <button onclick="closeBulkActions()" class="btn-secondary">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Quick View Modal -->
<div id="quickViewModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Product Details</h3>
            <button onclick="closeQuickView()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 120px)">
            <div id="quickViewContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Products Tabulator Styles */
    #productsTable {
        border: none !important;
        background: transparent !important;
        min-height: 400px;
    }

    .tabulator-tableholder {
        background: transparent !important;
        border: none !important;
    }

    .tabulator .tabulator-header {
        border: none !important;
        border-bottom: 1px solid #e5e7eb !important;
        background-color: #f9fafb !important;
        font-weight: 600;
        color: #374151;
    }

    .tabulator .tabulator-col {
        background-color: #f9fafb !important;
        border-right: 1px solid #e5e7eb !important;
        padding: 12px 8px !important;
    }

    .tabulator .tabulator-col:last-child {
        border-right: none !important;
    }

    .tabulator-row {
        border-bottom: 1px solid #f3f4f6 !important;
        transition: background-color 0.2s ease;
    }

    .tabulator-row.tabulator-selectable:hover {
        background-color: #f9fafb !important;
    }

    .tabulator-row.tabulator-selected {
        background-color: #e0e7ff !important;
    }

    .tabulator-cell {
        padding: 12px 8px !important;
        border-right: 1px solid #f3f4f6 !important;
        vertical-align: middle !important;
    }

    .tabulator-cell:last-child {
        border-right: none !important;
    }

    .tabulator-footer {
        border-top: 1px solid #e5e7eb !important;
        background-color: #f9fafb !important;
        padding: 12px !important;
    }

    /* Status badges */
    .status-badge {
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .status-active { background-color: #d1fae5; color: #065f46; }
    .status-inactive { background-color: #fee2e2; color: #991b1b; }
    .status-draft { background-color: #f3f4f6; color: #374151; }
    .status-pending { background-color: #fef3c7; color: #92400e; }

    /* Type badges */
    .type-badge {
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .type-simple { background-color: #dbeafe; color: #1e40af; }
    .type-configurable { background-color: #e9d5ff; color: #7e22ce; }

    /* Stock status */
    .stock-in { color: #059669; }
    .stock-out { color: #dc2626; }
    .stock-low { color: #d97706; }

    /* Bulk Actions Bar Styles */
    #bulkActionsBar {
        animation: slideUp 0.3s ease-out;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    @keyframes slideUp {
        from {
            transform: translate(-50%, 100%);
            opacity: 0;
        }
        to {
            transform: translate(-50%, 0);
            opacity: 1;
        }
    }

    /* Loading state */
    #loadingState {
        display: none;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .tabulator .tabulator-col {
            min-width: 100px !important;
        }

        .tabulator-cell {
            padding: 8px 4px !important;
        }

        #bulkActionsBar {
            width: 95%;
            padding: 12px;
        }

        #bulkActionsBar .flex {
            flex-direction: column;
            gap: 8px;
        }

        #bulkActionsBar .space-x-4 {
            justify-content: center;
            width: 100%;
        }

        #bulkActionsBar .space-x-2 {
            justify-content: center;
            width: 100%;
        }

        .mobile-swal {
            width: 95% !important;
            margin: 0 auto;
        }
    }

    /* Selection styles */
    .tabulator-row.tabulator-selected {
        background-color: #e0e7ff !important;
    }

    .tabulator-row.tabulator-selected:hover {
        background-color: #c7d2fe !important;
    }

    /* Checkbox styling for select all */
    .tabulator-col.select-checkbox .tabulator-col-content {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tabulator-col.select-checkbox input[type="checkbox"] {
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    .tabulator-cell.select-checkbox input[type="checkbox"] {
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    /* Product image styling */
    .tabulator-cell .w-10.h-10 {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
    }

    .tabulator-cell .w-10.h-10 img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>
@endpush

@push('scripts')
<script>
    // Axios instance with interceptors
    const axiosInstance = axios.create({
        baseURL: '{{ url('') }}/api/admin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Authorization': `Bearer ${window.ADMIN_API_TOKEN || "{{ session('admin_api_token') }}"}`
        }
    });

    // Add request interceptor for token refresh if needed
    axiosInstance.interceptors.request.use(
        config => {
            // Add CSRF token for non-GET requests
            if (config.method !== 'get') {
                config.headers['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            }
            return config;
        },
        error => Promise.reject(error)
    );

    // Add response interceptor for error handling
    axiosInstance.interceptors.response.use(
        response => response,
        error => {
            if (error.response?.status === 401) {
                // Token expired, redirect to login
                window.location.href = '{{ route("admin.login") }}';
            }
            return Promise.reject(error);
        }
    );

    // Global variables
    let productsTable = null;
    let currentPage = 1;
    let perPage = 10;
    let filters = {};

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing products...');

        // Load data
        loadProductsData();
        loadStatistics();

        // Setup event listeners
        setupEventListeners();
        setupModals();
    });

    // ==================== DATA LOADING FUNCTIONS ====================

    // Refresh all data
    async function refreshAllData() {
        console.log('Refreshing all data...');

        try {
            await Promise.all([
                loadProductsData(),
                loadStatistics()
            ]);
            console.log('All data refreshed successfully');
            toastr.info('Data refreshed');
        } catch (error) {
            console.error('Error refreshing data:', error);
            toastr.error('Failed to load data');
        }
    }

    // Load products data
    async function loadProductsData(page = 1, perPage = 10) {
        console.log('Loading products data...');

        try {
            // Show loading state
            document.getElementById('loadingState').style.display = 'block';

            const params = {
                page: page,
                per_page: perPage,
                sort_by: 'created_at',
                sort_dir: 'desc',
                ...filters
            };

            const response = await axiosInstance.get('/products', { params });

            console.log('Products API Response:', response.data);

            if (response.data.success) {
                // Correct access to nested data
                const products = response.data.data.data || [];
                const meta = response.data.data.meta || {};

                // Update pagination info
                currentPage = meta.current_page || 1;
                perPage = meta.per_page || 10;

                // Initialize or update Tabulator
                if (!productsTable) {
                    initializeProductsTable(products);
                } else {
                    productsTable.setData(products);
                    updatePaginationInfo(meta);
                }

                // Hide loading state
                document.getElementById('loadingState').style.display = 'none';
            } else {
                toastr.error('Failed to load products: ' + (response.data.message || 'Unknown error'));
                document.getElementById('loadingState').style.display = 'none';
            }
        } catch (error) {
            console.error('Error loading products:', error);
            toastr.error('Failed to load products. Check console for details.');
            document.getElementById('loadingState').style.display = 'none';

            // Initialize table with empty data if error
            if (!productsTable) {
                initializeProductsTable([]);
            }
        }
    }

    // Update pagination info
    function updatePaginationInfo(meta) {
        const paginationInfo = document.getElementById('paginationInfo');
        if (paginationInfo && meta) {
            paginationInfo.innerHTML = `
                Showing ${meta.from || 0} to ${meta.to || 0} of ${meta.total || 0} products
            `;
        }
    }

    // Load statistics
    async function loadStatistics() {
        console.log('Loading statistics...');

        try {
            const response = await axiosInstance.get('/products/statistics');

            if (response.data.success) {
                const stats = response.data.data;
                updateElementText('totalProducts', stats.total_products || 0);
                updateElementText('activeProducts', stats.active_products || 0);
                updateElementText('featuredProducts', stats.featured_products || 0);
                updateElementText('simpleProducts', stats.simple_products || 0);
                updateElementText('configurableProducts', stats.configurable_products || 0);
            }
        } catch (error) {
            console.error('Error loading statistics:', error);
            toastr.error('Failed to load statistics');
        }
    }

    // ==================== TABULATOR INITIALIZATION ====================

    // Initialize products table
    function initializeProductsTable(data = []) {
        console.log('Initializing products table...');

        productsTable = new Tabulator("#productsTable", {
            data: data,
            layout: "fitDataFill",
            height: "100%",
            responsiveLayout: "hide",
            pagination: true,
            paginationSize: perPage,
            paginationSizeSelector: [10, 25, 50, 100],
            paginationCounter: "rows",
            rowFormatter: function(row) {
                const rowEl = row.getElement();
                rowEl.classList.add('hover:bg-gray-50');
            },
            rowSelectionChanged: function(data, rows) {
                updateBulkActions(data.length);
            },
            columns: [
                {
                    title: "<input type='checkbox' id='selectAllProducts'>",
                    field: "id",
                    formatter: "rowSelection",
                    titleFormatter: "rowSelection",
                    hozAlign: "center",
                    headerSort: false,
                    width: 50,
                    cssClass: "select-checkbox",
                    responsive: 0
                },
                {
                    title: "ID",
                    field: "id",
                    width: 70,
                    sorter: "number",
                    hozAlign: "center",
                    headerFilter: "input",
                    headerFilterPlaceholder: "Search ID…",
                    responsive: 0
                },
                {
                    title: "Product",
                    field: "name",
                    widthGrow: 2,
                    sorter: "string",
                    headerFilter: "input",
                    headerFilterPlaceholder: "Search name",
                    formatter: function(cell) {
                        const rowData = cell.getRow().getData();

                        // Debug: Check what image data is available
                        console.log('Product image data:', rowData);

                        // Try different image paths
                        let imageUrl = null;

                        // Check various possible image locations
                        if (rowData.main_image && rowData.main_image !== '') {
                            imageUrl = rowData.main_image;
                        } else if (rowData.default_variant?.images?.find(img => img.is_primary)?.url) {
                            imageUrl = rowData.default_variant.images.find(img => img.is_primary).url;
                        } else if (rowData.default_variant?.image_url) {
                            imageUrl = rowData.default_variant.image_url;
                        } else if (rowData.image_url) {
                            imageUrl = rowData.image_url;
                        }

                        // Always use absolute URL for images
                        if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                            imageUrl = '/' + imageUrl;
                        }

                        return `
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden flex-shrink-0">
                                    ${imageUrl ?
                                        `<img src="${imageUrl}" alt="${rowData.name}"
                                              class="w-full h-full object-cover"
                                              onerror="this.onerror=null; this.parentElement.innerHTML='<i class=\"fas fa-box text-gray-400\"></i>';">` :
                                        `<i class="fas fa-box text-gray-400"></i>`
                                    }
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center space-x-2 mb-1">
                                        <p class="font-medium text-gray-900 truncate">${rowData.name}</p>
                                        ${rowData.has_variants ?
                                            '<span class="px-2 py-0.5 bg-purple-100 text-purple-800 text-xs rounded-full whitespace-nowrap">Variants</span>' : ''}
                                    </div>
                                    <p class="text-sm text-gray-500 truncate">SKU: ${rowData.sku || 'N/A'}</p>
                                    ${rowData.main_category_name ?
                                        `<p class="text-xs text-gray-400 truncate">${rowData.main_category_name}</p>` : ''}
                                </div>
                            </div>
                        `;
                    }
                },
                {
                    title: "Type",
                    field: "product_type",
                    width: 120,
                    hozAlign: "center",
                    headerFilter: "select",
                    headerFilterParams: {
                        values: {
                            "": "All",
                            "simple": "Simple",
                            "configurable": "Configurable"
                        }
                    },
                    formatter: function(cell) {
                        const type = cell.getValue();
                        return type === 'configurable' ?
                            `<span class="type-badge type-configurable">
                                <i class="fas fa-layer-group mr-1"></i>Configurable
                            </span>` :
                            `<span class="type-badge type-simple">
                                <i class="fas fa-cube mr-1"></i>Simple
                            </span>`;
                    },
                    responsive: 1
                },
                {
                    title: "Price",
                    field: "current_price",
                    width: 120,
                    sorter: "number",
                    hozAlign: "right",
                    formatter: function(cell) {
                        const price = cell.getValue();
                        const rowData = cell.getRow().getData();

                        let html = `<span class="font-semibold text-gray-900">₹${parseFloat(price || 0).toFixed(2)}</span>`;

                        if (rowData.compare_price && rowData.compare_price > price) {
                            html += `<div class="text-xs text-rose-600 line-through">₹${parseFloat(rowData.compare_price).toFixed(2)}</div>`;
                        }

                        if (rowData.has_variants) {
                            html += `<div class="text-xs text-gray-500">From</div>`;
                        }

                        return html;
                    },
                    responsive: 1
                },
                {
                    title: "Stock",
                    field: "total_stock",
                    width: 120,
                    sorter: "number",
                    hozAlign: "center",
                    formatter: function(cell) {
                        const stock = cell.getValue() || 0;
                        const rowData = cell.getRow().getData();

                        let statusClass = 'text-emerald-600';
                        let icon = 'fa-check-circle';
                        let statusText = 'In Stock';

                        if (stock === 0) {
                            statusClass = 'text-rose-600';
                            icon = 'fa-times-circle';
                            statusText = 'Out of Stock';
                        } else if (stock < 10) {
                            statusClass = 'text-amber-600';
                            icon = 'fa-exclamation-triangle';
                            statusText = 'Low Stock';
                        }

                        return `
                            <div class="text-center">
                                <div class="font-semibold ${statusClass}">${stock}</div>
                                <div class="text-xs ${statusClass}">
                                    <i class="fas ${icon} mr-1"></i>${statusText}
                                </div>
                            </div>
                        `;
                    },
                    responsive: 1
                },
                {
                    title: "Brand",
                    field: "brand_name",
                    width: 150,
                    sorter: "string",
                    headerFilter: "input",
                    headerFilterPlaceholder: "Search brand",
                    formatter: function(cell) {
                        const brand = cell.getValue();
                        if (!brand) return '<span class="text-gray-400">No brand</span>';
                        return `<span class="text-gray-700">${brand}</span>`;
                    },
                    responsive: 2
                },
                {
                    title: "Status",
                    field: "status",
                    width: 120,
                    hozAlign: "center",
                    headerFilter: "select",
                    headerFilterParams: {
                        values: {
                            "": "All",
                            "active": "Active",
                            "inactive": "Inactive",
                            "draft": "Draft",
                            "pending": "Pending"
                        }
                    },
                    formatter: function(cell) {
                        const status = cell.getValue();
                        const row = cell.getRow();
                        const data = row.getData();

                        const statusConfig = {
                            'active': { class: 'status-active', icon: 'fa-toggle-on', next: 'inactive' },
                            'inactive': { class: 'status-inactive', icon: 'fa-toggle-off', next: 'active' },
                            'draft': { class: 'status-draft', icon: 'fa-edit', next: 'active' },
                            'pending': { class: 'status-pending', icon: 'fa-clock', next: 'active' }
                        };

                        const config = statusConfig[status] || statusConfig['draft'];

                        return `
                            <button onclick="toggleProductStatus(${data.id}, '${config.next}')"
                                    class="status-badge ${config.class}">
                                <i class="fas ${config.icon}"></i>
                                <span>${status.charAt(0).toUpperCase() + status.slice(1)}</span>
                            </button>
                        `;
                    },
                    responsive: 1
                },
                {
                    title: "Featured",
                    field: "is_featured",
                    width: 100,
                    hozAlign: "center",
                    headerFilter: "select",
                    headerFilterParams: {
                        values: {
                            "": "All",
                            "true": "Yes",
                            "false": "No"
                        }
                    },
                    formatter: function(cell) {
                        const isFeatured = cell.getValue();
                        const row = cell.getRow();
                        const data = row.getData();

                        return isFeatured ?
                            `<button onclick="toggleProductFeatured(${data.id}, false)"
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 hover:bg-amber-200">
                                <i class="fas fa-star mr-1"></i>Yes
                            </button>` :
                            `<button onclick="toggleProductFeatured(${data.id}, true)"
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 hover:bg-gray-200">
                                <i class="far fa-star mr-1"></i>No
                            </button>`;
                    },
                    responsive: 2
                },
                {
                    title: "New",
                    field: "is_new",
                    width: 100,
                    hozAlign: "center",
                    headerFilter: "select",
                    headerFilterParams: {
                        values: {
                            "": "All",
                            "true": "Yes",
                            "false": "No"
                        }
                    },
                    formatter: function(cell) {
                        const isNew = cell.getValue();
                        const row = cell.getRow();
                        const data = row.getData();

                        return isNew ?
                            `<button onclick="toggleProductNew(${data.id}, false)"
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 hover:bg-blue-200">
                                <i class="fas fa-certificate mr-1"></i>Yes
                            </button>` :
                            `<button onclick="toggleProductNew(${data.id}, true)"
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 hover:bg-gray-200">
                                <i class="far fa-certificate mr-1"></i>No
                            </button>`;
                    },
                    responsive: 2
                },
                {
                    title: "Created",
                    field: "created_at_formatted",
                    width: 120,
                    sorter: "date",
                    hozAlign: "center",
                    formatter: function(cell) {
                        const date = cell.getValue();
                        return `<span class="text-sm text-gray-600">${date || ''}</span>`;
                    },
                    responsive: 2
                },
                {
                    title: "Actions",
                    field: "id",
                    width: 150,
                    hozAlign: "center",
                    headerSort: false,
                    formatter: function(cell) {
                        const id = cell.getValue();
                        const row = cell.getRow();
                        const data = row.getData();

                        const editUrl = "{{ route('admin.products.edit', ':id') }}".replace(':id', id);

                        return `
                            <div class="flex space-x-2 justify-center">
                                <button onclick="quickViewProduct(${id})"
                                        class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors"
                                        title="Quick View">
                                    <i class="fas fa-eye text-sm"></i>
                                </button>
                                <a href="${editUrl}"
                                        class="w-8 h-8 flex items-center justify-center bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-100 transition-colors"
                                        title="Edit Product">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                                <button onclick="deleteProduct(${id})"
                                        class="w-8 h-8 flex items-center justify-center bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-100 transition-colors"
                                        title="Delete Product">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </div>
                        `;
                    },
                    responsive: 0
                }
            ]
        });

        // Fix layout after table is built
        productsTable.on("tableBuilt", function(){
            // Redraw table to ensure proper layout
            setTimeout(() => {
                productsTable.redraw(true);
            }, 100);

            // Initialize table functionality
            initProductsSearch();
            initProductsExport();
            initProductsColumnVisibility();
            initBulkActions();

            // Add click event for select all checkbox
            $(document).on('click', '#selectAllProducts', function() {
                if ($(this).is(':checked')) {
                    productsTable.selectRow();
                } else {
                    productsTable.deselectRow();
                }
            });
        });
    }

    // ==================== SETUP FUNCTIONS ====================

    // Setup event listeners
    function setupEventListeners() {
        // Filter inputs
        document.querySelectorAll('#filterType, #filterStatus, #filterStock, #filterFeatured, #filterNew, #filterBestseller').forEach(filter => {
            filter.addEventListener('change', function() {
                const field = this.id.replace('filter', '').toLowerCase();
                const value = this.value;

                if (value === '') {
                    delete filters[field];
                } else {
                    filters[field] = value;
                }

                loadProductsData();
            });
        });
    }

    // Setup modals
    function setupModals() {
        // Close modals when clicking outside
        document.querySelectorAll('[id$="Modal"]').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    if (modal.id === 'bulkActionsModal') closeBulkActions();
                    if (modal.id === 'quickViewModal') closeQuickView();
                }
            });
        });

        // Escape key to close modals
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeBulkActions();
                closeQuickView();
            }
        });
    }

    // ==================== BULK ACTIONS SYSTEM ====================

    function initBulkActions() {
        const bulkActionsBar = document.getElementById('bulkActionsBar');
        const selectedCount = document.getElementById('selectedCount');
        const selectAllProducts = document.getElementById('selectAllProducts');
        const clearSelection = document.getElementById('clearSelection');
        const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
        const bulkActionsBtn = document.getElementById('productsBulkActionsBtn');

        // Update selected count and show/hide bulk actions bar
        function updateBulkActions(selectedCountNum) {
            if (selectedCount) {
                selectedCount.textContent = selectedCountNum;
            }

            if (bulkActionsBar) {
                if (selectedCountNum > 0) {
                    bulkActionsBar.classList.remove('hidden');
                    bulkActionsBar.classList.add('flex');
                    // Scroll to bottom for mobile
                    if (window.innerWidth < 768) {
                        setTimeout(() => {
                            bulkActionsBar.scrollIntoView({ behavior: 'smooth', block: 'end' });
                        }, 100);
                    }
                } else {
                    bulkActionsBar.classList.remove('flex');
                    bulkActionsBar.classList.add('hidden');
                }
            }

            // Update select all checkbox
            const totalRows = productsTable.getDataCount();
            if (selectAllProducts) {
                selectAllProducts.checked = selectedCountNum === totalRows && totalRows > 0;
                selectAllProducts.indeterminate = selectedCountNum > 0 && selectedCountNum < totalRows;
            }
        }

        // Row selection event
        productsTable.on("rowSelectionChanged", function(data, rows) {
            updateBulkActions(data.length);
        });

        // Clear selection
        if (clearSelection) {
            clearSelection.addEventListener('click', function() {
                productsTable.deselectRow();
                if (selectAllProducts) {
                    selectAllProducts.checked = false;
                    selectAllProducts.indeterminate = false;
                }
                updateBulkActions(0);
                toastr.info('Selection cleared');
            });
        }

        // Bulk Delete Function
        async function handleBulkDelete() {
            const selectedRows = productsTable.getSelectedRows();
            const selectedIds = selectedRows.map(row => row.getData().id);

            if (selectedIds.length === 0) {
                toastr.warning('Please select at least one product to delete.');
                return;
            }

            const itemName = 'product';
            const itemCount = selectedIds.length;

            // Get selected products data
            const selectedProducts = selectedRows.map(row => row.getData());

            Swal.fire({
                title: `Delete ${itemCount} ${itemName}${itemCount > 1 ? 's' : ''}?`,
                html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-700">You are about to delete <strong>${itemCount}</strong> ${itemName}${itemCount > 1 ? 's' : ''}.</p>

                    <div class="bg-rose-50 border border-rose-200 rounded-lg p-4">
                        <div class="flex items-center text-rose-800 mb-2">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <span class="font-semibold">Warning</span>
                        </div>
                        <ul class="text-sm text-rose-700 space-y-1 list-disc pl-5">
                            <li>All product variants and images will be permanently deleted</li>
                            <li>This action cannot be undone</li>
                            <li>Order history will remain but products will show as "deleted"</li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Selected product${itemCount > 1 ? 's' : ''}:</p>
                        <div class="max-h-32 overflow-y-auto">
                            ${getSelectedProductsPreview(selectedProducts)}
                        </div>
                    </div>

                    <div class="flex items-center p-3 bg-amber-50 rounded-lg border border-amber-200">
                        <input type="checkbox" id="confirmDelete" class="w-4 h-4 text-rose-600 bg-white border-gray-300 rounded focus:ring-rose-500">
                        <label for="confirmDelete" class="ml-3 text-sm font-medium text-amber-800">
                            I understand this action cannot be undone
                        </label>
                    </div>
                </div>
            `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `Delete ${itemCount} ${itemName}${itemCount > 1 ? 's' : ''}`,
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                width: '600px',
                customClass: {
                    popup: 'mobile-swal',
                    actions: 'flex gap-2',
                    confirmButton: 'btn-danger',
                    cancelButton: 'btn-secondary'
                },
                preConfirm: () => {
                    if (!document.getElementById('confirmDelete').checked) {
                        Swal.showValidationMessage('Please confirm that you understand this action cannot be undone.');
                        return false;
                    }
                    return { ids: selectedIds };
                }
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await performBulkDelete(selectedIds, itemName);
                }
            });
        }

        // Helper: Get selected products preview HTML
        function getSelectedProductsPreview(selectedProducts) {
            if (selectedProducts.length === 0) return '<p class="text-sm text-gray-500">No products selected</p>';

            return selectedProducts.map(product => `
                <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                            ${product.main_image ?
                                `<img src="${product.main_image}" alt="${product.name}" class="w-full h-full object-cover">` :
                                `<i class="fas fa-box text-gray-400 text-xs"></i>`
                            }
                        </div>
                        <div class="min-w-0">
                            <span class="text-sm text-gray-900 truncate block">${product.name || 'Unnamed'}</span>
                            <span class="text-xs text-gray-500">${product.sku || 'No SKU'}</span>
                        </div>
                    </div>
                    <span class="text-xs text-gray-500">ID: ${product.id}</span>
                </div>
            `).join('');
        }

        // Helper: Perform bulk delete
        async function performBulkDelete(selectedIds, itemName) {
            const ids = selectedIds.map(id => parseInt(id));

            Swal.fire({
                title: 'Deleting...',
                text: `Please wait while we delete ${ids.length} ${itemName}${ids.length > 1 ? 's' : ''}`,
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                willOpen: () => { Swal.showLoading(); }
            });

            try {
                const response = await axiosInstance.post('/products/bulk-delete', { ids: ids });

                if (response.data.success) {
                    const deletedCount = response.data.data.deleted_count;

                    // Clear selection
                    productsTable.deselectRow();
                    if (selectAllProducts) {
                        selectAllProducts.checked = false;
                        selectAllProducts.indeterminate = false;
                    }
                    if (bulkActionsBar) {
                        bulkActionsBar.classList.add('hidden');
                    }

                    // Refresh data
                    await Promise.all([
                        loadProductsData(),
                        loadStatistics()
                    ]);

                    Swal.close();
                    toastr.success(`Successfully deleted ${deletedCount} product${deletedCount > 1 ? 's' : ''}`);

                    const remainingCount = productsTable.getDataCount();
                    if (remainingCount === 0) {
                        toastr.info('All products have been deleted.');
                    }
                } else {
                    Swal.close();
                    toastr.error(response.data.message || 'Failed to delete products');
                }
            } catch (error) {
                Swal.close();
                if (error.response?.status === 400) {
                    toastr.error(error.response.data.message || 'Cannot delete products with existing orders');
                } else {
                    toastr.error('Failed to delete products');
                }
            }
        }

        // Attach bulk delete to button
        if (bulkDeleteBtn) {
            bulkDeleteBtn.addEventListener('click', handleBulkDelete);
        }

        // Bulk actions modal
        if (bulkActionsBtn) {
            bulkActionsBtn.addEventListener('click', function() {
                const selectedRows = productsTable.getSelectedRows();

                if (selectedRows.length === 0) {
                    toastr.warning('Please select at least one product');
                    return;
                }

                document.getElementById('bulkActionsModal').classList.remove('hidden');
            });
        }

        // Keyboard shortcuts for bulk actions
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + A to select all
            if ((e.ctrlKey || e.metaKey) && e.key === 'a') {
                e.preventDefault();
                productsTable.selectRow();
            }

            // Escape to clear selection
            if (e.key === 'Escape') {
                productsTable.deselectRow();
                if (selectAllProducts) {
                    selectAllProducts.checked = false;
                    selectAllProducts.indeterminate = false;
                }
                updateBulkActions(0);
            }

            // Delete key to trigger bulk delete (when selection exists)
            if (e.key === 'Delete' || e.key === 'Backspace') {
                const selectedRows = productsTable.getSelectedRows();
                if (selectedRows.length > 0) {
                    e.preventDefault();
                    handleBulkDelete();
                }
            }
        });

        // Initialize
        updateBulkActions(0);
    }

    // Search functionality
    function initProductsSearch() {
        const searchInput = document.getElementById('productsSearchInput');
        let searchTimeout;

        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value;

                // Clear previous timeout
                clearTimeout(searchTimeout);

                // Set new timeout
                searchTimeout = setTimeout(() => {
                    if (searchTerm.length >= 2 || searchTerm === '') {
                        filters.search = searchTerm;
                        loadProductsData();
                    }
                }, 500);
            });
        }
    }

    // Column visibility
    function initProductsColumnVisibility() {
        const columnVisibilityBtn = document.getElementById('productsColumnVisibilityBtn');
        if (!columnVisibilityBtn || !productsTable) return;

        const columnMenu = document.createElement('div');
        columnMenu.className =
            'absolute mt-12 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 hidden right-12 md:right-24 md:left-auto left-0';

        const columns = productsTable.getColumnDefinitions();

        columns.forEach((column, index) => {
            if (index === 0) return; // skip checkbox column

            const field = column.field;
            const columnBtn = document.createElement('button');
            columnBtn.className =
                'w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-50 text-sm flex items-center';
            columnBtn.innerHTML = `
            <input type="checkbox" class="mr-2" ${productsTable.getColumn(field).isVisible() ? 'checked' : ''}>
            ${column.title}
        `;

            columnBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const col = productsTable.getColumn(field);
                const checkbox = this.querySelector('input');
                col.toggle();
                setTimeout(() => {
                    checkbox.checked = col.isVisible();
                }, 10);
            });

            columnMenu.appendChild(columnBtn);
        });

        // Toggle menu
        columnVisibilityBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            columnMenu.classList.toggle('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!columnMenu.contains(e.target) && e.target !== columnVisibilityBtn) {
                columnMenu.classList.add('hidden');
            }
        });

        columnVisibilityBtn.parentElement.appendChild(columnMenu);
    }

    // Export functionality
    function initProductsExport() {
        const exportBtns = document.querySelectorAll('.export-btn');

        exportBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const format = this.getAttribute('data-export');

                switch (format) {
                    case 'csv':
                        productsTable.download("csv", "products.csv");
                        break;
                    case 'xlsx':
                        productsTable.download("xlsx", "products.xlsx", {
                            sheetName: "Products"
                        });
                        break;
                    case 'print':
                        window.print();
                        break;
                }
            });
        });
    }

    // ==================== PRODUCT FUNCTIONS ====================

    // Quick view product
    async function quickViewProduct(id) {
        try {
            const response = await axiosInstance.get(`/products/${id}`);

            if (response.data.success) {
                const product = response.data.data;
                const content = document.getElementById('quickViewContent');

                let html = `
                    <div class="space-y-6">
                        <div class="flex items-start space-x-6">
                            <div class="w-32 h-32 bg-gray-100 rounded-xl flex items-center justify-center overflow-hidden flex-shrink-0">
                                ${product.default_variant?.images?.find(img => img.is_primary)?.url ?
                                    `<img src="${product.default_variant.images.find(img => img.is_primary).url}" alt="${product.name}" class="w-full h-full object-cover">` :
                                    `<i class="fas fa-box text-gray-400 text-3xl"></i>`
                                }
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">${product.name}</h3>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="px-2 py-1 text-xs rounded-full ${product.status === 'active' ? 'bg-emerald-100 text-emerald-800' :
                                        product.status === 'inactive' ? 'bg-rose-100 text-rose-800' :
                                        product.status === 'draft' ? 'bg-gray-100 text-gray-800' : 'bg-amber-100 text-amber-800'}">
                                        ${product.status.charAt(0).toUpperCase() + product.status.slice(1)}
                                    </span>
                                    ${product.is_featured ? '<span class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-800">Featured</span>' : ''}
                                    ${product.is_new ? '<span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">New</span>' : ''}
                                    ${product.is_bestseller ? '<span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800">Bestseller</span>' : ''}
                                    <span class="px-2 py-1 text-xs rounded-full ${product.product_type === 'configurable' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800'}">
                                        ${product.product_type === 'configurable' ? 'Configurable' : 'Simple'}
                                    </span>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">SKU</p>
                                        <p class="font-medium">${product.default_variant?.sku || 'N/A'}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Price</p>
                                        <p class="font-medium">₹${parseFloat(product.default_variant?.price || 0).toFixed(2)}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Stock</p>
                                        <p class="font-medium ${product.total_stock > 10 ? 'text-emerald-600' :
                                            product.total_stock === 0 ? 'text-rose-600' : 'text-amber-600'}">
                                            ${product.total_stock}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Brand</p>
                                        <p class="font-medium">${product.brand?.name || 'No brand'}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Category</h4>
                                <p class="text-gray-600">${product.main_category?.name || 'N/A'}</p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Tax Class</h4>
                                <p class="text-gray-600">${product.tax_class?.name || 'No tax'}</p>
                            </div>
                        </div>

                        ${product.short_description ? `
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Short Description</h4>
                                <p class="text-gray-600">${product.short_description}</p>
                            </div>
                        ` : ''}

                        ${product.tags && product.tags.length > 0 ? `
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Tags</h4>
                                <div class="flex flex-wrap gap-2">
                                    ${product.tags.map(tag => `
                                        <span class="px-2 py-1 text-xs rounded-full"
                                            style="background-color: ${tag.color}22; color: ${tag.color}">
                                            ${tag.name}
                                        </span>
                                    `).join('')}
                                </div>
                            </div>
                        ` : ''}

                        ${product.product_type === 'configurable' && product.variants && product.variants.length > 0 ? `
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Variants (${product.variants.length})</h4>
                                <div class="max-h-60 overflow-y-auto space-y-2">
                                    ${product.variants.map(variant => `
                                        <div class="flex justify-between items-center p-3 border border-gray-200 rounded-lg">
                                            <div>
                                                <p class="font-medium text-gray-800">${variant.combination_display || variant.sku}</p>
                                                <p class="text-xs text-gray-500">SKU: ${variant.sku}</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-medium text-gray-900">₹${parseFloat(variant.price).toFixed(2)}</p>
                                                <p class="text-xs ${variant.stock_quantity > 10 ? 'text-emerald-600' :
                                                    variant.stock_quantity === 0 ? 'text-rose-600' : 'text-amber-600'}">
                                                    Stock: ${variant.stock_quantity}
                                                </p>
                                            </div>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        ` : ''}

                        <div class="pt-6 border-t border-gray-200 flex justify-end space-x-3">
                            <a href="{{ route('admin.products.edit', ':id') }}".replace(':id', product.id)
                                class="btn-primary">
                                <i class="fas fa-edit mr-2"></i>Edit Product
                            </a>
                            <button onclick="closeQuickView()" class="btn-secondary">
                                Close
                            </button>
                        </div>
                    </div>
                `;

                content.innerHTML = html;
                document.getElementById('quickViewModal').classList.remove('hidden');
            }
        } catch (error) {
            console.error('Error viewing product:', error);
            toastr.error('Failed to load product details');
        }
    }

    // Close quick view
    function closeQuickView() {
        document.getElementById('quickViewModal').classList.add('hidden');
    }

    // Toggle product status
    async function toggleProductStatus(id, status) {
        try {
            const response = await axiosInstance.post(`/products/${id}/status`, {
                status: status
            });

            if (response.data.success) {
                toastr.success(`Product ${status === 'active' ? 'activated' : status === 'inactive' ? 'deactivated' : 'updated'} successfully`);
                await loadProductsData();
                await loadStatistics();
            }
        } catch (error) {
            toastr.error('Failed to update product status');
        }
    }

    // Toggle product featured
    async function toggleProductFeatured(id, featured) {
        try {
            const response = await axiosInstance.post(`/products/${id}/featured`, {
                is_featured: featured
            });

            if (response.data.success) {
                toastr.success(featured ? 'Product marked as featured' : 'Product removed from featured');
                await loadProductsData();
                await loadStatistics();
            }
        } catch (error) {
            toastr.error('Failed to update featured status');
        }
    }

    // Toggle product new
    async function toggleProductNew(id, isNew) {
        try {
            const response = await axiosInstance.put(`/products/${id}`, {
                is_new: isNew
            });

            if (response.data.success) {
                toastr.success(isNew ? 'Product marked as new' : 'Product removed from new');
                await loadProductsData();
                await loadStatistics();
            }
        } catch (error) {
            toastr.error('Failed to update new status');
        }
    }

    // Delete product
    async function deleteProduct(id) {
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the product and all associated data. This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        });

        if (result.isConfirmed) {
            try {
                const response = await axiosInstance.delete(`/products/${id}`);

                if (response.data.success) {
                    toastr.success('Product deleted successfully');
                    await Promise.all([
                        loadProductsData(),
                        loadStatistics()
                    ]);
                }
            } catch (error) {
                toastr.error(error.response?.data?.message || 'Failed to delete product');
            }
        }
    }

    // ==================== BULK ACTIONS ====================

    // Close bulk actions modal
    function closeBulkActions() {
        document.getElementById('bulkActionsModal').classList.add('hidden');
    }

    // Apply bulk action
    async function applyBulkAction(action) {
        const selectedRows = productsTable.getSelectedRows();
        const selectedIds = selectedRows.map(row => row.getData().id);

        if (selectedIds.length === 0) {
            toastr.warning('No products selected');
            return;
        }

        let field, value, message, apiEndpoint = '/products/bulk-update';

        switch (action) {
            case 'activate':
                field = 'status';
                value = 'active';
                message = 'activate';
                break;
            case 'inactivate':
                field = 'status';
                value = 'inactive';
                message = 'inactivate';
                break;
            case 'draft':
                field = 'status';
                value = 'draft';
                message = 'mark as draft';
                break;
            case 'pending':
                field = 'status';
                value = 'pending';
                message = 'mark as pending';
                break;
            case 'feature':
                field = 'is_featured';
                value = true;
                message = 'mark as featured';
                break;
            case 'unfeature':
                field = 'is_featured';
                value = false;
                message = 'remove from featured';
                break;
            case 'new':
                field = 'is_new';
                value = true;
                message = 'mark as new';
                break;
            case 'not_new':
                field = 'is_new';
                value = false;
                message = 'remove from new';
                break;
            case 'delete':
                await handleBulkDelete(selectedIds);
                return;
            default:
                return;
        }

        const result = await Swal.fire({
            title: 'Confirm Bulk Action',
            text: `Are you sure you want to ${message} ${selectedIds.length} product(s)?`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: `Yes, ${message}`,
            cancelButtonText: 'Cancel'
        });

        if (result.isConfirmed) {
            try {
                const response = await axiosInstance.post(apiEndpoint, {
                    ids: selectedIds,
                    field: field,
                    value: value
                });

                if (response.data.success) {
                    toastr.success(response.data.message);
                    closeBulkActions();

                    await Promise.all([
                        loadProductsData(),
                        loadStatistics()
                    ]);

                    // Clear selection
                    productsTable.deselectRow();
                    document.getElementById('selectAllProducts').checked = false;
                }
            } catch (error) {
                toastr.error(`Failed to ${message} products`);
            }
        }
    }

    // Handle bulk delete
    async function handleBulkDelete(selectedIds) {
        const result = await Swal.fire({
            title: 'Confirm Bulk Delete',
            text: `Are you sure you want to delete ${selectedIds.length} product(s)? This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `Yes, delete ${selectedIds.length} product(s)`,
            cancelButtonText: 'Cancel'
        });

        if (result.isConfirmed) {
            try {
                const response = await axiosInstance.post('/products/bulk-delete', {
                    ids: selectedIds
                });

                if (response.data.success) {
                    toastr.success(response.data.message);
                    closeBulkActions();

                    await Promise.all([
                        loadProductsData(),
                        loadStatistics()
                    ]);

                    // Clear selection
                    productsTable.deselectRow();
                    document.getElementById('selectAllProducts').checked = false;
                }
            } catch (error) {
                toastr.error('Failed to delete products');
            }
        }
    }

    // ==================== UTILITY FUNCTIONS ====================

    // Update element text
    function updateElementText(elementId, text) {
        const element = document.getElementById(elementId);
        if (element) element.textContent = text;
    }
</script>
@endpush
