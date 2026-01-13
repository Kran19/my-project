@extends('admin.layouts.master')

@section('title', 'Edit Customer - Admin Panel')

@section('content')
<script>
    // Static user data for demonstration
    const userData = {
        id: 1,
        name: "John Doe",
        email: "john.doe@example.com",
        phone: "+1 (555) 123-4567",
        status: "active",
        address: "123 Main St, New York, NY 10001"
    };
</script>

<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Edit Customer</h2>
                <p class="text-gray-600">Update customer information</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Back to Customers
            </a>
        </div>
    </div>

    <!-- Premium Card -->
    <div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-8">
        <form id="editCustomerForm" class="space-y-8" action="{{ route('admin.users.update', '') }}/1" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="userId" value="1">

            <!-- Section: Basic Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Basic Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label">First Name *</label>
                        <input type="text" id="editFirstName" name="first_name" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Last Name *</label>
                        <input type="text" id="editLastName" name="last_name" class="form-input" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="form-label">Email *</label>
                        <input type="email" id="editEmail" name="email" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Phone</label>
                        <input type="text" id="editPhone" name="phone" class="form-input">
                    </div>
                </div>
            </div>

            <!-- Section: Address -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Address</h3>
                <textarea id="editAddress" name="address" rows="3" class="form-input"></textarea>
            </div>

            <!-- Section: Login & Status -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Security & Status</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label">New Password</label>
                        <input type="password" id="editPassword" name="password" class="form-input" placeholder="Leave blank to keep current">
                    </div>
                    <div class="flex items-center space-x-3 mt-7">
                        <input type="checkbox" id="editActiveStatus" name="active" class="w-5 h-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="editActiveStatus" class="text-sm text-gray-700">Active Account</label>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between pt-6 border-t border-gray-200">
                <a href="{{ route('admin.users.index') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save mr-2"></i>Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fill the form fields with user data
    const nameParts = userData.name.split(" ");
    document.getElementById('editFirstName').value = nameParts[0] || '';
    document.getElementById('editLastName').value = nameParts.slice(1).join(" ") || '';
    document.getElementById('editEmail').value = userData.email || '';
    document.getElementById('editPhone').value = userData.phone || '';
    document.getElementById('editAddress').value = userData.address || '';
    document.getElementById('editActiveStatus').checked = userData.status === 'active';
});

document.getElementById('editCustomerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate form
    const firstName = document.getElementById('editFirstName').value;
    const lastName = document.getElementById('editLastName').value;
    const email = document.getElementById('editEmail').value;
    
    if (!firstName || !lastName || !email) {
        toastr.error("Please fill all required fields");
        return;
    }
    
    // Show loading
    Swal.fire({
        title: 'Updating Customer...',
        text: 'Please wait while we update customer information',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    // Simulate API call
    setTimeout(() => {
        Swal.close();
        
        // Update local data (in real app, this would be backend update)
        const userIndex = window.usersData.findIndex(u => u.id === userData.id);
        if (userIndex !== -1) {
            window.usersData[userIndex] = {
                ...window.usersData[userIndex],
                name: `${firstName} ${lastName}`,
                email: email,
                phone: document.getElementById('editPhone').value,
                address: document.getElementById('editAddress').value,
                status: document.getElementById('editActiveStatus').checked ? 'active' : 'inactive'
            };
        }
        
        toastr.success("Customer updated successfully!");
        
        // Redirect back
        setTimeout(() => {
            window.location.href = "{{ route('admin.users.index') }}";
        }, 800);
    }, 1500);
});
</script>

<style>
.form-label {
    @apply block text-sm font-medium text-gray-700 mb-1;
}
.form-input {
    @apply w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500;
}
</style>
@endsection