@extends('customer.layouts.master')

@section('title', 'My Orders - ' . config('app.name'))

@section('styles')
<style>
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
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <ol class="flex items-center space-x-2">
            <li><a href="{{ route('customer.home.index') }}" class="text-amber-600 hover:text-amber-800">Home</a></li>
            <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
            <li><a href="{{ route('customer.account.profile') }}" class="text-amber-600 hover:text-amber-800">My Account</a></li>
            <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
            <li class="text-gray-600">My Orders</li>
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
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50">
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
                       class="flex items-center gap-3 px-4 py-3 rounded-lg bg-amber-50 text-amber-700">
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
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">My Orders (5)</h2>

                <!-- Order Status Summary -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-amber-50 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-amber-700 mb-1">1</div>
                        <div class="text-sm text-gray-600">Processing</div>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-blue-700 mb-1">1</div>
                        <div class="text-sm text-gray-600">Shipped</div>
                    </div>
                    <div class="bg-green-50 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-green-700 mb-1">2</div>
                        <div class="text-sm text-gray-600">Delivered</div>
                    </div>
                    <div class="bg-red-50 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-red-700 mb-1">1</div>
                        <div class="text-sm text-gray-600">Cancelled</div>
                    </div>
                </div>

                <!-- Order Filter -->
                <div class="mb-6">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('customer.account.orders') }}"
                           class="px-4 py-2 rounded-full bg-amber-600 text-white">
                            All Orders
                        </a>
                        <a href="#"
                           class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200">
                            Processing
                        </a>
                        <a href="#"
                           class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200">
                            Shipped
                        </a>
                        <a href="#"
                           class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200">
                            Delivered
                        </a>
                        <a href="#"
                           class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200">
                            Cancelled
                        </a>
                    </div>
                </div>

                <!-- Orders List -->
                <div class="space-y-6">
                    <!-- Order 1 -->
                    <div class="border border-gray-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
                        <!-- Order Header -->
                        <div class="bg-amber-50 p-6 border-b border-gray-200">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="font-bold text-gray-800 text-lg">Order #ORD20231215001</h3>
                                        <span class="text-sm status-processing px-3 py-1 rounded-full">
                                            Processing
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-4 text-sm text-gray-600">
                                        <span><i class="far fa-calendar mr-1"></i> Dec 15, 2023</span>
                                        <span><i class="fas fa-box mr-1"></i> 2 items</span>
                                        <span><i class="fas fa-truck mr-1"></i> TRK7890123456</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-amber-700">₹47,197.64</p>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Est. Delivery: Dec 22, 2023
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=400&h=400&fit=crop"
                                         alt="Rose Gold Diamond Ring"
                                         class="w-16 h-16 object-cover rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-800 text-sm">Rose Gold Diamond Ring</p>
                                        <p class="text-amber-700 font-bold text-sm">₹24,999.00</p>
                                        <p class="text-gray-600 text-xs">Qty: 1</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1596703923538-b6d4bb0a44ea?w=400&h=400&fit=crop"
                                         alt="Pearl & Diamond Earrings"
                                         class="w-16 h-16 object-cover rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-800 text-sm">Pearl & Diamond Earrings</p>
                                        <p class="text-amber-700 font-bold text-sm">₹14,999.00</p>
                                        <p class="text-gray-600 text-xs">Qty: 1</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Actions -->
                            <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">
                                <a href="{{ route('customer.account.orders.details', 1) }}"
                                   class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                                    <i class="fas fa-eye mr-2"></i>View Details
                                </a>

                                <button onclick="cancelOrder('ORD20231215001')"
                                        class="px-4 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50">
                                    <i class="fas fa-times mr-2"></i>Cancel Order
                                </button>

                                <a href="{{ route('customer.home.index') }}"
                                   class="px-4 py-2 border border-amber-600 text-amber-600 rounded-lg hover:bg-amber-50 ml-auto">
                                    <i class="fas fa-redo mr-2"></i>Buy Again
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Order 2 -->
                    <div class="border border-gray-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
                        <!-- Order Header -->
                        <div class="bg-green-50 p-6 border-b border-gray-200">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="font-bold text-gray-800 text-lg">Order #ORD20231212005</h3>
                                        <span class="text-sm status-delivered px-3 py-1 rounded-full">
                                            Delivered
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-4 text-sm text-gray-600">
                                        <span><i class="far fa-calendar mr-1"></i> Dec 12, 2023</span>
                                        <span><i class="fas fa-box mr-1"></i> 1 item</span>
                                        <span><i class="fas fa-truck mr-1"></i> TRK4567890123</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-amber-700">₹14,748.82</p>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Delivered: Dec 18, 2023
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 gap-4 mb-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1541417904950-b855846fe074?w=400&h=400&fit=crop"
                                         alt="Silver Pendant Set"
                                         class="w-16 h-16 object-cover rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-800 text-sm">Silver Pendant Set with Chain</p>
                                        <p class="text-amber-700 font-bold text-sm">₹12,499.00</p>
                                        <p class="text-gray-600 text-xs">Qty: 1</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Actions -->
                            <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">
                                <a href="{{ route('customer.account.orders.details', 2) }}"
                                   class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                                    <i class="fas fa-eye mr-2"></i>View Details
                                </a>

                                <button onclick="downloadInvoice('ORD20231212005')"
                                        class="px-4 py-2 border border-gray-600 text-gray-600 rounded-lg hover:bg-gray-50">
                                    <i class="fas fa-file-invoice mr-2"></i>Download Invoice
                                </button>

                                <button onclick="requestReturn('ORD20231212005')"
                                        class="px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50">
                                    <i class="fas fa-undo-alt mr-2"></i>Request Return
                                </button>

                                <a href="{{ route('customer.home.index') }}"
                                   class="px-4 py-2 border border-amber-600 text-amber-600 rounded-lg hover:bg-amber-50 ml-auto">
                                    <i class="fas fa-redo mr-2"></i>Buy Again
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Order 3 -->
                    <div class="border border-gray-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
                        <!-- Order Header -->
                        <div class="bg-blue-50 p-6 border-b border-gray-200">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="font-bold text-gray-800 text-lg">Order #ORD20231208003</h3>
                                        <span class="text-sm status-shipped px-3 py-1 rounded-full">
                                            Shipped
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-4 text-sm text-gray-600">
                                        <span><i class="far fa-calendar mr-1"></i> Dec 8, 2023</span>
                                        <span><i class="fas fa-box mr-1"></i> 3 items</span>
                                        <span><i class="fas fa-truck mr-1"></i> TRK1234567890</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-amber-700">₹9,792.82</p>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Est. Delivery: Dec 15, 2023
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=400&fit=crop"
                                         alt="Gold Bangle"
                                         class="w-16 h-16 object-cover rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-800 text-sm">Gold Bangle Collection</p>
                                        <p class="text-amber-700 font-bold text-sm">₹4,599.00</p>
                                        <p class="text-gray-600 text-xs">Qty: 1</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=400&h=400&fit=crop"
                                         alt="Pearl Ring"
                                         class="w-16 h-16 object-cover rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-800 text-sm">Pearl & Diamond Ring</p>
                                        <p class="text-amber-700 font-bold text-sm">₹3,699.00</p>
                                        <p class="text-gray-600 text-xs">Qty: 1</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-500">+1 more item</span>
                                </div>
                            </div>

                            <!-- Order Actions -->
                            <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">
                                <a href="{{ route('customer.account.orders.details', 3) }}"
                                   class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                                    <i class="fas fa-eye mr-2"></i>View Details
                                </a>

                                <a href="{{ route('customer.home.index') }}"
                                   class="px-4 py-2 border border-amber-600 text-amber-600 rounded-lg hover:bg-amber-50 ml-auto">
                                    <i class="fas fa-redo mr-2"></i>Buy Again
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-amber-50 p-6 rounded-xl">
                        <h4 class="font-bold text-gray-800 mb-4">Order Summary</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Orders</span>
                                <span class="font-bold">5</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Spent</span>
                                <span class="font-bold text-amber-700">₹89,487.28</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Average Order</span>
                                <span class="font-bold">₹17,897.46</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-50 p-6 rounded-xl">
                        <h4 class="font-bold text-gray-800 mb-4">Shipping Address</h4>
                        <p class="text-sm text-gray-600">
                            John Doe<br>
                            123 Main Street, Apartment 4B<br>
                            Mumbai, Maharashtra 400001<br>
                            India
                        </p>
                    </div>

                    <div class="bg-green-50 p-6 rounded-xl">
                        <h4 class="font-bold text-gray-800 mb-4">Need Help?</h4>
                        <p class="text-sm text-gray-600 mb-4">
                            Questions about your order? We're here to help!
                        </p>
                        <div class="space-y-2">
                            <a href="{{ route('customer.page.contact') }}" class="flex items-center gap-2 text-amber-600 hover:text-amber-800">
                                <i class="fas fa-headset"></i>
                                <span>Contact Support</span>
                            </a>
                            <a href="{{ route('customer.page.faq') }}" class="flex items-center gap-2 text-amber-600 hover:text-amber-800">
                                <i class="fas fa-question-circle"></i>
                                <span>FAQ</span>
                            </a>
                            <a href="#" class="flex items-center gap-2 text-amber-600 hover:text-amber-800">
                                <i class="fas fa-file-invoice"></i>
                                <span>Download Invoices</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function cancelOrder(orderId) {
    if (confirm('Are you sure you want to cancel this order?')) {
        alert(`Order ${orderId} cancellation requested. You will be notified once it's processed.`);
    }
}

function downloadInvoice(orderId) {
    alert(`Invoice for order ${orderId} is being generated. It will download shortly.`);
    setTimeout(() => {
        const link = document.createElement('a');
        link.href = '#';
        link.download = `Invoice_${orderId}.pdf`;
        link.click();
    }, 1000);
}

function requestReturn(orderId) {
    alert(`Return request for order ${orderId} has been submitted. Our team will contact you shortly.`);
}
</script>
@endsection
