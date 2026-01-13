@extends('customer.layouts.master')

@section('title', 'My Addresses - ' . config('app.name'))

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <ol class="flex items-center space-x-2">
            <li><a href="{{ route('customer.home.index') }}" class="text-amber-600 hover:text-amber-800">Home</a></li>
            <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
            <li><a href="{{ route('customer.account.profile') }}" class="text-amber-600 hover:text-amber-800">My Account</a></li>
            <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
            <li class="text-gray-600">My Addresses</li>
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
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50">
                        <i class="fas fa-shopping-bag"></i>
                        <span>My Orders</span>
                        <span class="ml-auto bg-amber-600 text-white text-xs px-2 py-1 rounded-full">
                            5
                        </span>
                    </a>

                    <a href="{{ route('customer.account.addresses') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg bg-amber-50 text-amber-700">
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
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">My Addresses</h2>
                    <button onclick="openAddAddressModal()"
                            class="px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                        <i class="fas fa-plus mr-2"></i>Add New Address
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Default Address -->
                    <div class="relative border-2 border-amber-500 rounded-2xl p-6 bg-amber-50">
                        <div class="absolute top-4 right-4">
                            <span class="bg-amber-600 text-white text-xs px-3 py-1 rounded-full">Default</span>
                        </div>

                        <div class="mb-4">
                            <h3 class="font-bold text-gray-800 text-lg">John Doe</h3>
                            <p class="text-gray-600">Home</p>
                        </div>

                        <div class="space-y-2 text-gray-600">
                            <p>123 Main Street, Apartment 4B</p>
                            <p>Mumbai, Maharashtra 400001</p>
                            <p>India</p>
                            <div class="pt-2">
                                <p><i class="fas fa-phone mr-2"></i> +91 9876543210</p>
                                <p class="mt-1"><i class="fas fa-envelope mr-2"></i> user@example.com</p>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-6 pt-6 border-t border-amber-200">
                            <button onclick="editAddress(1)"
                                    class="px-4 py-2 border border-amber-600 text-amber-600 rounded-lg hover:bg-amber-50">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </button>
                            <button onclick="setAsDefault(1)"
                                    class="px-4 py-2 border border-gray-600 text-gray-600 rounded-lg hover:bg-gray-50" disabled>
                                <i class="fas fa-star mr-2"></i>Default
                            </button>
                            <button onclick="deleteAddress(1)"
                                    class="px-4 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 ml-auto">
                                <i class="fas fa-trash mr-2"></i>Delete
                            </button>
                        </div>
                    </div>

                    <!-- Office Address -->
                    <div class="border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-shadow">
                        <div class="mb-4">
                            <h3 class="font-bold text-gray-800 text-lg">John Doe</h3>
                            <p class="text-gray-600">Office</p>
                        </div>

                        <div class="space-y-2 text-gray-600">
                            <p>456 Business Avenue, Suite 1201</p>
                            <p>Bandra West, Mumbai 400050</p>
                            <p>India</p>
                            <div class="pt-2">
                                <p><i class="fas fa-phone mr-2"></i> +91 9876543211</p>
                                <p class="mt-1"><i class="fas fa-envelope mr-2"></i> john.office@example.com</p>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                            <button onclick="editAddress(2)"
                                    class="px-4 py-2 border border-amber-600 text-amber-600 rounded-lg hover:bg-amber-50">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </button>
                            <button onclick="setAsDefault(2)"
                                    class="px-4 py-2 border border-gray-600 text-gray-600 rounded-lg hover:bg-gray-50">
                                <i class="fas fa-star mr-2"></i>Set as Default
                            </button>
                            <button onclick="deleteAddress(2)"
                                    class="px-4 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 ml-auto">
                                <i class="fas fa-trash mr-2"></i>Delete
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div class="text-center py-12 hidden" id="emptyAddresses">
                    <i class="fas fa-map-marker-alt text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">No Addresses Saved</h3>
                    <p class="text-gray-600 mb-6">You haven't saved any addresses yet. Add your first address to get started.</p>
                    <button onclick="openAddAddressModal()"
                            class="inline-flex items-center gap-3 bg-gradient-to-r from-amber-600 to-amber-800 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl">
                        <i class="fas fa-plus mr-2"></i>
                        Add New Address
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Address Modal -->
<div id="addressModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-8">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800" id="modalTitle">Add New Address</h3>
                <button onclick="closeAddressModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <form id="addressForm" class="space-y-6">
                <input type="hidden" id="addressId">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-2">Full Name *</label>
                        <input type="text" id="fullName" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Address Type</label>
                        <select id="addressType"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                            <option value="Home">Home</option>
                            <option value="Office">Office</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Address Line 1 *</label>
                    <input type="text" id="addressLine1" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Address Line 2</label>
                    <input type="text" id="addressLine2"
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-2">City *</label>
                        <input type="text" id="city" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">State *</label>
                        <input type="text" id="state" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">ZIP Code *</label>
                        <input type="text" id="zipCode" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-2">Country *</label>
                        <select id="country" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                            <option value="India" selected>India</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Canada">Canada</option>
                            <option value="Australia">Australia</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" id="phone" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                    </div>
                </div>

                <div class="flex items-start mt-6">
                    <input type="checkbox" id="setAsDefault" class="mt-1 mr-3 text-amber-600">
                    <label for="setAsDefault" class="text-sm text-gray-600">
                        Set this as my default address
                    </label>
                </div>

                <div class="flex gap-4 pt-6 border-t border-gray-200">
                    <button type="button" onclick="closeAddressModal()"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-8 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 flex-1">
                        Save Address
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let editingAddressId = null;

function openAddAddressModal() {
    editingAddressId = null;
    document.getElementById('modalTitle').textContent = 'Add New Address';
    document.getElementById('addressForm').reset();
    document.getElementById('addressModal').classList.remove('hidden');
    document.getElementById('addressModal').classList.add('flex');
}

function editAddress(addressId) {
    editingAddressId = addressId;
    document.getElementById('modalTitle').textContent = 'Edit Address';

    // In a real app, you would fetch the address data
    // For demo, we'll set some sample data
    if (addressId === 1) {
        document.getElementById('fullName').value = 'John Doe';
        document.getElementById('addressType').value = 'Home';
        document.getElementById('addressLine1').value = '123 Main Street, Apartment 4B';
        document.getElementById('city').value = 'Mumbai';
        document.getElementById('state').value = 'Maharashtra';
        document.getElementById('zipCode').value = '400001';
        document.getElementById('country').value = 'India';
        document.getElementById('phone').value = '+91 9876543210';
        document.getElementById('setAsDefault').checked = true;
    } else if (addressId === 2) {
        document.getElementById('fullName').value = 'John Doe';
        document.getElementById('addressType').value = 'Office';
        document.getElementById('addressLine1').value = '456 Business Avenue, Suite 1201';
        document.getElementById('city').value = 'Mumbai';
        document.getElementById('state').value = 'Maharashtra';
        document.getElementById('zipCode').value = '400050';
        document.getElementById('country').value = 'India';
        document.getElementById('phone').value = '+91 9876543211';
        document.getElementById('setAsDefault').checked = false;
    }

    document.getElementById('addressModal').classList.remove('hidden');
    document.getElementById('addressModal').classList.add('flex');
}

function closeAddressModal() {
    document.getElementById('addressModal').classList.add('hidden');
    document.getElementById('addressModal').classList.remove('flex');
}

function setAsDefault(addressId) {
    if (confirm('Set this address as default?')) {
        alert('Address set as default successfully!');
    }
}

function deleteAddress(addressId) {
    if (confirm('Are you sure you want to delete this address?')) {
        alert('Address deleted successfully!');
    }
}

// Handle form submission
document.getElementById('addressForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // In a real app, you would submit the form via AJAX
    alert(editingAddressId ? 'Address updated successfully!' : 'Address added successfully!');
    closeAddressModal();

    // Show success message
    const message = document.createElement('div');
    message.className = 'fixed top-4 right-4 bg-green-100 text-green-800 px-6 py-3 rounded-full shadow-lg z-50';
    message.innerHTML = `
        <i class="fas fa-check-circle mr-2"></i>
        ${editingAddressId ? 'Address updated successfully!' : 'Address added successfully!'}
    `;
    document.body.appendChild(message);

    setTimeout(() => {
        message.remove();
    }, 3000);
});
</script>
@endsection
