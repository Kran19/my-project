@extends('customer.layouts.master')

@section('title', 'My Account - ' . config('app.name'))

@section('styles')
<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-slide-in {
        animation: slideIn 0.3s ease-out;
    }

    /* Order status colors */
    .status-processing {
        background-color: #fef3c7;
        color: #92400e;
    }

    .status-shipped {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .status-delivered {
        background-color: #dcfce7;
        color: #166534;
    }

    .status-cancelled {
        background-color: #fee2e2;
        color: #991b1b;
    }
</style>
@endsection

@section('content')
<!-- Success Message -->
@if(session('success_message'))
<div class="fixed top-4 right-4 bg-green-100 text-green-800 px-6 py-3 rounded-full shadow-lg animate-slide-in z-50">
    <i class="fas fa-check-circle mr-2"></i>
    {{ session('success_message') }}
</div>
@endif

<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <ol class="flex items-center space-x-2">
            <li><a href="{{ route('customer.home.index') }}" class="text-amber-600 hover:text-amber-800">Home</a></li>
            <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
            <li class="text-gray-600">My Account</li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <!-- User Info -->
                <div class="flex items-center gap-4 mb-6 pb-6 border-b">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-100 to-amber-200 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-2xl text-amber-700"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">John Doe</h3>
                        <p class="text-sm text-gray-600">user@example.com</p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="{{ route('customer.account.profile') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg bg-amber-50 text-amber-700">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('customer.wishlist') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50">
                        <i class="fas fa-heart"></i>
                        <span>My Wishlist</span>
                        <span class="ml-auto bg-amber-600 text-white text-xs px-2 py-1 rounded-full">
                            3
                        </span>
                    </a>

                    <a href="{{ route('customer.account.orders') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50">
                        <i class="fas fa-shopping-bag"></i>
                        <span>My Orders</span>
                        <span class="ml-auto bg-amber-600 text-white text-xs px-2 py-1 rounded-full">
                            5
                        </span>
                    </a>

                    <a href="{{ route('customer.account.addresses') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Addresses</span>
                    </a>

                    <a href="{{ route('customer.account.change-password') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50">
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                    </a>

                    <form method="POST" action="{{ route('customer.logout') }}" class="mt-6">
                        @csrf
                        <button type="submit"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 w-full">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- Dashboard -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-amber-50 to-amber-100 p-6 rounded-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Wishlist Items</p>
                                <p class="text-3xl font-bold text-gray-800">3</p>
                            </div>
                            <i class="fas fa-heart text-2xl text-amber-600"></i>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Cart Items</p>
                                <p class="text-3xl font-bold text-gray-800">2</p>
                            </div>
                            <i class="fas fa-shopping-cart text-2xl text-blue-600"></i>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Orders</p>
                                <p class="text-3xl font-bold text-gray-800">5</p>
                            </div>
                            <i class="fas fa-shopping-bag text-2xl text-green-600"></i>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Orders</h3>
                    <div class="space-y-4">
                        <!-- Order 1 -->
                        <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-amber-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Order #ORD20231215001</h4>
                                    <div class="flex items-center gap-4 mt-1">
                                        <span class="text-sm text-gray-600">Dec 15, 2023</span>
                                        <span class="text-sm status-processing px-2 py-1 rounded-full">
                                            Processing
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-amber-700">₹18,999.00</p>
                                <a href="{{ route('customer.account.orders.details', 1) }}"
                                   class="text-sm text-amber-600 hover:text-amber-800">
                                    View Details
                                </a>
                            </div>
                        </div>

                        <!-- Order 2 -->
                        <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-amber-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Order #ORD20231212005</h4>
                                    <div class="flex items-center gap-4 mt-1">
                                        <span class="text-sm text-gray-600">Dec 12, 2023</span>
                                        <span class="text-sm status-delivered px-2 py-1 rounded-full">
                                            Delivered
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-amber-700">₹12,499.00</p>
                                <a href="{{ route('customer.account.orders.details', 2) }}"
                                   class="text-sm text-amber-600 hover:text-amber-800">
                                    View Details
                                </a>
                            </div>
                        </div>

                        <!-- Order 3 -->
                        <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-amber-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Order #ORD20231208003</h4>
                                    <div class="flex items-center gap-4 mt-1">
                                        <span class="text-sm text-gray-600">Dec 8, 2023</span>
                                        <span class="text-sm status-shipped px-2 py-1 rounded-full">
                                            Shipped
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-amber-700">₹8,299.00</p>
                                <a href="{{ route('customer.account.orders.details', 3) }}"
                                   class="text-sm text-amber-600 hover:text-amber-800">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('customer.account.orders') }}"
                           class="text-amber-600 hover:text-amber-800 text-sm font-medium">
                            View all 5 orders →
                        </a>
                    </div>
                </div>

                <!-- Recent Wishlist Items -->
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Wishlist Items</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Wishlist Item 1 -->
                        <div class="flex items-center gap-4 p-4 bg-amber-50 rounded-lg">
                            <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=400&h=400&fit=crop"
                                 alt="Diamond Ring"
                                 class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800">Rose Gold Diamond Ring</h4>
                                <p class="text-amber-700 font-bold">₹24,999.00</p>
                            </div>
                            {{-- <form method="POST" action="{{ route('wishlist.remove') }}" class="wishlist-remove-form"> --}}
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="product_id" value="101">
                                <button type="submit"
                                        class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center hover:bg-red-200">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Wishlist Item 2 -->
                        <div class="flex items-center gap-4 p-4 bg-amber-50 rounded-lg">
                            <img src="https://images.unsplash.com/photo-1594576722512-582d5577dc56?w=400&h=400&fit=crop"
                                 alt="Pearl Necklace"
                                 class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800">Pearl & Diamond Necklace</h4>
                                <p class="text-amber-700 font-bold">₹18,499.00</p>
                            </div>
                            {{-- <form method="POST" action="{{ route('wishlist.remove') }}" class="wishlist-remove-form"> --}}
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="product_id" value="102">
                                <button type="submit"
                                        class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center hover:bg-red-200">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('customer.wishlist') }}"
                           class="text-amber-600 hover:text-amber-800 text-sm font-medium">
                            View all 3 wishlist items →
                        </a>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Activity</h3>
                    <p class="text-gray-600">Welcome to your account dashboard. Here you can manage your wishlist, view orders, and update your profile.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Details Modal -->
<div id="orderDetailsModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-8">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Order Details</h3>
                <button onclick="closeOrderDetails()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <div id="orderDetailsContent">
                <!-- Order details will be loaded here -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Format price function
function formatPrice(price) {
    return '₹' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Order Functions
function viewOrderDetails(orderId) {
    // Static order data for demonstration
    const order = {
        order_id: 'ORD20231215001',
        order_date: '2023-12-15 14:30:00',
        status: 'Processing',
        payment_method: 'Credit Card',
        tracking_number: 'TRK7890123456',
        estimated_delivery: '2023-12-22',
        shipping_method: 'Standard Shipping',
        items: [
            {
                name: 'Rose Gold Diamond Ring',
                price: 24999,
                quantity: 1,
                image: 'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=400&h=400&fit=crop'
            },
            {
                name: 'Pearl & Diamond Earrings',
                price: 14999,
                quantity: 1,
                image: 'https://images.unsplash.com/photo-1596703923538-b6d4bb0a44ea?w=400&h=400&fit=crop'
            }
        ],
        shipping_address: {
            name: 'John Doe',
            address: '123 Main Street, Apartment 4B',
            city: 'Mumbai',
            state: 'Maharashtra',
            zip: '400001',
            country: 'India',
            phone: '+91 9876543210',
            email: 'user@example.com'
        },
        subtotal: 39998,
        shipping: 0,
        tax: 7199.64,
        total: 47197.64
    };

    // Build order details HTML
    let html = `
        <div class="space-y-6">
            <!-- Order Header -->
            <div class="bg-amber-50 p-6 rounded-2xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2">Order Information</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Order ID:</span>
                                <span class="font-medium">${order.order_id}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Order Date:</span>
                                <span class="font-medium">${new Date(order.order_date).toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                })}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-medium status-${order.status.toLowerCase()} px-3 py-1 rounded-full">
                                    ${order.status}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Payment Method:</span>
                                <span class="font-medium">${order.payment_method}</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2">Delivery Information</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tracking Number:</span>
                                <span class="font-medium">${order.tracking_number}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Estimated Delivery:</span>
                                <span class="font-medium">${new Date(order.estimated_delivery).toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'short',
                                    day: 'numeric'
                                })}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping Method:</span>
                                <span class="font-medium">${order.shipping_method}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div>
                <h4 class="font-bold text-gray-800 mb-4">Order Items (${order.items.length})</h4>
                <div class="space-y-4">
    `;

    order.items.forEach(item => {
        html += `
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center gap-4">
                            <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg">
                            <div>
                                <h5 class="font-medium text-gray-800">${item.name}</h5>
                                <p class="text-sm text-gray-600">Quantity: ${item.quantity}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-amber-700">${formatPrice(item.price * item.quantity)}</p>
                            <p class="text-sm text-gray-600">${formatPrice(item.price)} each</p>
                        </div>
                    </div>
        `;
    });

    html += `
                </div>
            </div>

            <!-- Order Summary -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-6 bg-gray-50 rounded-xl">
                    <h4 class="font-bold text-gray-800 mb-4">Shipping Address</h4>
                    <p class="text-sm text-gray-600">
                        ${order.shipping_address.name}<br>
                        ${order.shipping_address.address}<br>
                        ${order.shipping_address.city}, ${order.shipping_address.state} ${order.shipping_address.zip}<br>
                        ${order.shipping_address.country}<br>
                        📞 ${order.shipping_address.phone}<br>
                        ✉️ ${order.shipping_address.email}
                    </p>
                </div>

                <div class="p-6 bg-gray-50 rounded-xl">
                    <h4 class="font-bold text-gray-800 mb-4">Order Summary</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span>${formatPrice(order.subtotal)}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping:</span>
                            <span class="${order.shipping === 0 ? 'text-green-600' : ''}">
                                ${order.shipping === 0 ? 'FREE' : formatPrice(order.shipping)}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax (18%):</span>
                            <span>${formatPrice(order.tax)}</span>
                        </div>
                        <div class="border-t border-gray-300 pt-3 mt-3">
                            <div class="flex justify-between font-bold">
                                <span>Total:</span>
                                <span class="text-amber-700">${formatPrice(order.total)}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Actions -->
            <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">
                <button onclick="printOrder('${order.order_id}')"
                        class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                    <i class="fas fa-print mr-2"></i>Print Order
                </button>

                <button onclick="downloadInvoice('${order.order_id}')"
                        class="px-4 py-2 border border-gray-600 text-gray-600 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-file-invoice mr-2"></i>Download Invoice
                </button>

                <button onclick="cancelOrder('${order.order_id}')"
                        class="px-4 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50">
                    <i class="fas fa-times mr-2"></i>Cancel Order
                </button>
            </div>
        </div>
    `;

    // Display the modal
    document.getElementById('orderDetailsContent').innerHTML = html;
    document.getElementById('orderDetailsModal').classList.remove('hidden');
    document.getElementById('orderDetailsModal').classList.add('flex');
}

function closeOrderDetails() {
    document.getElementById('orderDetailsModal').classList.add('hidden');
    document.getElementById('orderDetailsModal').classList.remove('flex');
}

function cancelOrder(orderId) {
    if (confirm('Are you sure you want to cancel this order?')) {
        alert(`Order ${orderId} cancellation requested. You will be notified once it's processed.`);
        closeOrderDetails();
    }
}

function downloadInvoice(orderId) {
    alert(`Invoice for order ${orderId} is being generated. It will download shortly.`);
    // Simulate download
    setTimeout(() => {
        const link = document.createElement('a');
        link.href = '#';
        link.download = `Invoice_${orderId}.pdf`;
        link.click();
    }, 1000);
}

function printOrder(orderId) {
    window.print();
}

// Handle wishlist remove forms
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.wishlist-remove-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Remove this item from wishlist?')) {
                e.preventDefault();
            }
        });
    });
});
</script>
@endsection
