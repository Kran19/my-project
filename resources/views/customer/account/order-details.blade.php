@extends('customer.layouts.master')

@section('title', 'Order Details - ' . config('app.name'))

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
            <li><a href="{{ route('customer.account.orders') }}" class="text-amber-600 hover:text-amber-800">My Orders</a></li>
            <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
            <li class="text-gray-600">Order #ORD20231215001</li>
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
                    
                    <form method="POST" action="{{ route('logout') }}" class="mt-6">
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
                <!-- Order Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 pb-8 border-b">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Order #ORD20231215001</h2>
                        <div class="flex items-center gap-4 mt-2">
                            <span class="text-sm text-gray-600">
                                <i class="far fa-calendar mr-1"></i> 
                                December 15, 2023 at 2:30 PM
                            </span>
                            <span class="text-sm status-processing px-3 py-1 rounded-full">
                                Processing
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-3xl font-bold text-amber-700">₹47,197.64</p>
                        <p class="text-sm text-gray-600 mt-1">Total Amount</p>
                    </div>
                </div>
                
                <div class="space-y-8">
                    <!-- Order Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Order Information</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Payment Method:</span>
                                    <span class="font-medium">Credit Card</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Transaction ID:</span>
                                    <span class="font-medium">TXN7890123456</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Payment Status:</span>
                                    <span class="font-medium text-green-600">Paid</span>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Delivery Information</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tracking Number:</span>
                                    <span class="font-medium">TRK7890123456</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Shipping Method:</span>
                                    <span class="font-medium">Standard Shipping</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Estimated Delivery:</span>
                                    <span class="font-medium">December 22, 2023</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Order Items (2)</h3>
                        <div class="space-y-4">
                            <!-- Item 1 -->
                            <div class="flex flex-col md:flex-row items-start md:items-center justify-between p-6 bg-amber-50 rounded-2xl">
                                <div class="flex items-start gap-4 mb-4 md:mb-0">
                                    <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=400&h=400&fit=crop" 
                                         alt="Rose Gold Diamond Ring" 
                                         class="w-24 h-24 object-cover rounded-lg">
                                    <div>
                                        <h4 class="font-bold text-gray-800">Rose Gold Diamond Ring</h4>
                                        <p class="text-sm text-gray-600 mt-1">SKU: JWL-001</p>
                                        <p class="text-amber-700 font-bold text-lg mt-2">₹24,999.00</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-600">Quantity: 1</p>
                                    <p class="text-xl font-bold text-gray-800 mt-2">₹24,999.00</p>
                                </div>
                            </div>
                            
                            <!-- Item 2 -->
                            <div class="flex flex-col md:flex-row items-start md:items-center justify-between p-6 bg-amber-50 rounded-2xl">
                                <div class="flex items-start gap-4 mb-4 md:mb-0">
                                    <img src="https://images.unsplash.com/photo-1596703923538-b6d4bb0a44ea?w=400&h=400&fit=crop" 
                                         alt="Pearl & Diamond Earrings" 
                                         class="w-24 h-24 object-cover rounded-lg">
                                    <div>
                                        <h4 class="font-bold text-gray-800">Pearl & Diamond Earrings</h4>
                                        <p class="text-sm text-gray-600 mt-1">SKU: JWL-002</p>
                                        <p class="text-amber-700 font-bold text-lg mt-2">₹14,999.00</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-600">Quantity: 1</p>
                                    <p class="text-xl font-bold text-gray-800 mt-2">₹14,999.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Shipping Address -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Shipping Address</h3>
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <p class="text-gray-800 font-medium">John Doe</p>
                                <p class="text-gray-600 mt-2">
                                    123 Main Street, Apartment 4B<br>
                                    Mumbai, Maharashtra 400001<br>
                                    India
                                </p>
                                <div class="mt-4 space-y-1">
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-phone mr-2"></i> +91 9876543210
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-envelope mr-2"></i> user@example.com
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Order Calculation -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Order Summary</h3>
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Subtotal (2 items):</span>
                                        <span>₹39,998.00</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Shipping:</span>
                                        <span class="text-green-600">FREE</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Tax (GST 18%):</span>
                                        <span>₹7,199.64</span>
                                    </div>
                                    <div class="border-t border-gray-300 pt-3 mt-3">
                                        <div class="flex justify-between font-bold text-lg">
                                            <span>Total:</span>
                                            <span class="text-amber-700">₹47,197.64</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Timeline -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Order Timeline</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">Order Placed</p>
                                    <p class="text-sm text-gray-600">December 15, 2023 at 2:30 PM</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">Order Processing</p>
                                    <p class="text-sm text-gray-600">Currently processing your order</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">Shipped</p>
                                    <p class="text-sm text-gray-600">Estimated: December 18, 2023</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">Delivered</p>
                                    <p class="text-sm text-gray-600">Estimated: December 22, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Actions -->
                    <div class="flex flex-wrap gap-4 pt-8 border-t border-gray-200">
                        <button onclick="printOrder()" 
                                class="px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                            <i class="fas fa-print mr-2"></i>Print Order
                        </button>
                        
                        <button onclick="downloadInvoice()" 
                                class="px-6 py-3 border border-gray-600 text-gray-600 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-file-invoice mr-2"></i>Download Invoice
                        </button>
                        
                        <button onclick="cancelOrder()" 
                                class="px-6 py-3 border border-red-600 text-red-600 rounded-lg hover:bg-red-50">
                            <i class="fas fa-times mr-2"></i>Cancel Order
                        </button>
                        
                        <a href="{{ route('customer.home.index') }}" 
                           class="px-6 py-3 border border-amber-600 text-amber-600 rounded-lg hover:bg-amber-50 ml-auto">
                            <i class="fas fa-redo mr-2"></i>Buy Again
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function printOrder() {
    window.print();
}

function downloadInvoice() {
    alert('Invoice is being generated. It will download shortly.');
    setTimeout(() => {
        const link = document.createElement('a');
        link.href = '#';
        link.download = 'Invoice_ORD20231215001.pdf';
        link.click();
    }, 1000);
}

function cancelOrder() {
    if (confirm('Are you sure you want to cancel this order?')) {
        alert('Order cancellation requested. You will be notified once it\'s processed.');
    }
}
</script>
@endsection