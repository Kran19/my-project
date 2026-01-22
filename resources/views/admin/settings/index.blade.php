@extends('admin.layouts.master')

@section('title', 'Settings')

@section('content')
<div class="mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Store Settings</h2>
            <p class="text-gray-600">Configure your store preferences and global settings</p>
        </div>
        <div class="flex space-x-3">
            <button type="button" onclick="resetSettings()" class="btn-secondary">
                <i class="fas fa-undo mr-2"></i>Reset
            </button>
            <button type="button" onclick="saveAllSettings()" class="btn-primary">
                <i class="fas fa-save mr-2"></i>Save All
            </button>
        </div>
    </div>
</div>

<!-- Loading -->
<div id="loadingState" class="hidden">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600 mx-auto"></div>
        <p class="mt-4 text-gray-600">Loading settings...</p>
    </div>
</div>

<form id="settingsForm" class="space-y-8 hidden">
    @csrf

    {{-- STORE INFO --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Store Information</h3>
            <p class="text-sm text-gray-500 mt-1">Basic store details and contact information</p>
        </div>

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Name</label>
                    <input type="text" data-key="store_name"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Email</label>
                    <input type="email" data-key="store_email"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                    <input type="text" data-key="store_phone"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                    <select
    name="currency"
    data-key="currency"
    class="setting-input w-full bg-white text-gray-700 border border-gray-300
           rounded-lg px-4 py-3 pr-10
           focus:outline-none focus:ring-2 focus:ring-indigo-500">
</select>

                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Store Address</label>
                <textarea data-key="store_address"
                    class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 min-h-[100px] focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
            </div>
        </div>
    </div>

    {{-- SEO --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">SEO Settings</h3>
            <p class="text-sm text-gray-500 mt-1">Search engine optimization preferences</p>
        </div>
        <div class="p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                <input type="text" data-key="meta_title"
                    class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                <textarea data-key="meta_description"
                    class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 min-h-[100px] focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                <input type="text" data-key="meta_keywords"
                    class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
        </div>
    </div>

    {{-- PAYMENT --}}
    
    {{-- SOCIAL MEDIA --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Social Media Links</h3>
            <p class="text-sm text-gray-500 mt-1">Manage your social media presence</p>
        </div>
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Facebook URL</label>
                    <input type="url" data-key="social_facebook" placeholder="https://facebook.com/yourpage"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Instagram URL</label>
                    <input type="url" data-key="social_instagram" placeholder="https://instagram.com/yourprofile"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Twitter/X URL</label>
                    <input type="url" data-key="social_twitter" placeholder="https://twitter.com/yourhandle"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn URL</label>
                    <input type="url" data-key="social_linkedin" placeholder="https://linkedin.com/company/yourpage"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
            </div>
        </div>
    </div>

    {{-- SHIPPING & TAX --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Shipping & Taxes</h3>
            <p class="text-sm text-gray-500 mt-1">Set default rates and tax configurations</p>
        </div>
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Standard Shipping Rate (₹)</label>
                    <input type="number" data-key="default_shipping_rate" step="0.01"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Free Shipping Minimum (₹)</label>
                    <input type="number" data-key="free_shipping_min" step="0.01"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tax Rate GST (%)</label>
                    <input type="number" data-key="tax_rate" step="0.1"
                        class="setting-input w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
            </div>
        </div>
    </div>

    {{-- ADMIN PROFILE --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Admin Profile</h3>
            <p class="text-sm text-gray-500 mt-1">Update your password, email, and username</p>
        </div>
        <div class="p-6 space-y-6">
            <!-- Separate form for Profile to avoid bulk processing -->
            <div class="space-y-6" id="profileUpdateSection">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" id="profileName" name="name"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="profileEmail" name="email"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">New Password (Optional)</label>
                        <input type="password" id="profilePassword" name="password" placeholder="Leave blank to keep current"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                        <input type="password" id="profilePasswordConfirm" name="password_confirmation"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="button" onclick="updateProfile()" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                        Update Profile
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- ACTIONS --}}
    <div class="flex justify-end space-x-4 pt-6 border-t">
        <button type="button" onclick="resetSettings()" class="btn-secondary">
            Reset to Defaults
        </button>
        <button type="submit" class="btn-primary">
            <i class="fas fa-save mr-2"></i>Save All Settings
        </button>
    </div>
</form>
@endsection


@push('scripts')
<script>
// Axios instance
const axiosInstance = axios.create({
    baseURL: '{{ url('') }}/api/admin',
    headers: {
        'Authorization': `Bearer ${window.ADMIN_API_TOKEN || "{{ session('admin_api_token') }}"}`,
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
});

// Global variables
let settingsData = {};
let isSaving = false;

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadSettings();

    // Form submission
    document.getElementById('settingsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        saveAllSettings();
    });

    // Toggle payment fields
    document.addEventListener('change', function(e) {
        if (e.target.name === 'razorpay_enabled') {
            document.getElementById('razorpayFields').classList.toggle('hidden', !e.target.checked);
        }
        if (e.target.name === 'theme_color') {
            const textInput = document.querySelector('input[name="theme_color_text"]');
            if (textInput) {
                textInput.value = e.target.value;
            }
        }
        if (e.target.name === 'theme_color_text') {
            const colorInput = document.querySelector('input[name="theme_color"]');
            if (colorInput && /^#[0-9A-F]{6}$/i.test(e.target.value)) {
                colorInput.value = e.target.value;
            }
        }
        if (e.target.name === 'currency') {
            updateCurrencySymbol(e.target.value);
        }
    });
});

// Load settings from API
async function loadSettings() {
    try {
        // Show loading
        document.getElementById('loadingState').classList.remove('hidden');
        document.getElementById('settingsForm').classList.add('hidden');

        // Load all settings groups
        const response = await axiosInstance.get('/settings/groups');

        if (response.data.success) {
            settingsData = response.data.data;
            populateForm(settingsData);

            // Show form, hide loading
            document.getElementById('loadingState').classList.add('hidden');
            document.getElementById('settingsForm').classList.remove('hidden');

            // Set up currency symbol
            const currency = document.querySelector('select[name="currency"]')?.value || 'USD';
            updateCurrencySymbol(currency);

            toastr.success('Settings loaded successfully');
        } else {
            throw new Error('Failed to load settings');
        }
    } catch (error) {
        console.error('Error loading settings:', error);
        document.getElementById('loadingState').classList.add('hidden');
        document.getElementById('settingsForm').classList.remove('hidden');
        toastr.error('Failed to load settings');
    }
}

// Populate form with settings data
function populateForm(data) {
    // Helper function to set value
    function setValue(key, value) {
        const inputs = document.querySelectorAll(`[data-key="${key}"]`);

        inputs.forEach(input => {
            const inputType = input.type || input.tagName.toLowerCase();

            switch (inputType) {
                case 'checkbox':
                    input.checked = Boolean(value);
                    break;
                case 'select-one':
                    // For select inputs, we need to check if options are loaded
                    if (input.options.length === 0) {
                        // If no options, this is likely the currency select
                        if (key === 'currency') {
                            loadCurrencyOptions(value);
                        }
                    } else {
                        input.value = value;
                    }
                    break;
                case 'color':
                    input.value = value || '#4f46e5';
                    // Also update the text input if it exists
                    const textInput = document.querySelector(`input[name="${key}_text"]`);
                    if (textInput) {
                        textInput.value = value || '#4f46e5';
                    }
                    break;
                default:
                    input.value = value || '';
            }
        });
    }

    // Populate each setting
    for (const [group, settings] of Object.entries(data)) {
        settings.forEach(setting => {
            setValue(setting.key, setting.value);
        });
    }

    // Show/hide razorpay fields based on checkbox state
    const razorpayEnabled = document.querySelector('input[name="razorpay_enabled"]')?.checked;

    if (razorpayEnabled !== undefined) {
        document.getElementById('razorpayFields').classList.toggle('hidden', !razorpayEnabled);
    }
}

// Load currency options
function loadCurrencyOptions(selectedValue) {
    const select = document.querySelector('select[name="currency"]');
    if (!select) return;

    const options = [
        { value: 'USD', label: 'US Dollar ($)' },
        { value: 'EUR', label: 'Euro (€)' },
        { value: 'GBP', label: 'British Pound (£)' },
        { value: 'CAD', label: 'Canadian Dollar (C$)' },
        { value: 'INR', label: 'Indian Rupee (₹)' }
    ];

    select.innerHTML = '';
    options.forEach(option => {
        const opt = document.createElement('option');
        opt.value = option.value;
        opt.textContent = option.label;
        opt.selected = option.value === selectedValue;
        select.appendChild(opt);
    });
}

// Update currency symbol in the UI
function updateCurrencySymbol(currency) {
    const symbols = {
        'USD': '$',
        'EUR': '€',
        'GBP': '£',
        'CAD': 'C$',
        'INR': '₹'
    };

    const symbol = symbols[currency] || '$';

    // Update all currency symbol elements
    document.querySelectorAll('#currencySymbol, #currencySymbol2').forEach(el => {
        el.textContent = symbol;
    });
}

// Save all settings
async function saveAllSettings() {
    if (isSaving) return;

    isSaving = true;

    try {
        // Collect all settings from form
        const settingsToUpdate = [];
        const inputs = document.querySelectorAll('.setting-input');

        inputs.forEach(input => {
            const key = input.dataset.key;
            let value = null;

            // Get value based on input type
            if (input.type === 'checkbox') {
                value = input.checked ? '1' : '0';
            } else if (input.type === 'color') {
                value = input.value;
            } else if (input.type === 'number') {
                value = input.value !== '' ? parseFloat(input.value) : null;
            } else {
                value = input.value || null;
            }

            // Only add if it has a key
            if (key) {
                settingsToUpdate.push({
                    key: key,
                    value: value
                });
            }
        });

        // Show saving indicator
        const submitBtn = document.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
        submitBtn.disabled = true;

        // Send to API
        const response = await axiosInstance.post('/settings/bulk-update', {
            settings: settingsToUpdate
        });

        if (response.data.success) {
            toastr.success('Settings saved successfully!');

            // Update local settings data
            settingsToUpdate.forEach(setting => {
                // Find and update in settingsData
                for (const [group, settings] of Object.entries(settingsData)) {
                    const settingIndex = settings.findIndex(s => s.key === setting.key);
                    if (settingIndex !== -1) {
                        settingsData[group][settingIndex].value = setting.value;
                    }
                }
            });
        } else {
            toastr.error(response.data.message || 'Failed to save settings');
        }

    } catch (error) {
        console.error('Error saving settings:', error);

        if (error.response && error.response.status === 422) {
            const errors = error.response.data.errors;
            Object.keys(errors).forEach(field => {
                toastr.error(`${field}: ${errors[field][0]}`);
            });
        } else {
            toastr.error(error.response?.data?.message || 'Failed to save settings. Please try again.');
        }
    } finally {
        // Reset button state
        const submitBtn = document.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save All Settings';
            submitBtn.disabled = false;
        }
        isSaving = false;
    }
}

// Reset settings to defaults
async function resetSettings() {
    const result = await Swal.fire({
        title: 'Reset Settings?',
        text: 'This will reset all settings to their default values. This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Reset',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280'
    });

    if (result.isConfirmed) {
        try {
            const response = await axiosInstance.post('/settings/reset');

            if (response.data.success) {
                toastr.success('Settings reset to defaults!');
                // Reload settings
                loadSettings();
            } else {
                toastr.error(response.data.message || 'Failed to reset settings');
            }
        } catch (error) {
            console.error('Error resetting settings:', error);
            toastr.error(error.response?.data?.message || 'Failed to reset settings');
        }
    }
}

// Save settings (legacy function for button)
function saveSettings() {
    saveAllSettings();
}

// Update Admin Profile
async function updateProfile() {
    const name = document.getElementById('profileName').value;
    const email = document.getElementById('profileEmail').value;
    const password = document.getElementById('profilePassword').value;
    const password_confirmation = document.getElementById('profilePasswordConfirm').value;

    if (!name || !email) {
        toastr.error('Name and Email are required');
        return;
    }

    if (password && password !== password_confirmation) {
        toastr.error('Passwords do not match');
        return;
    }

    try {
        const response = await axiosInstance.post('/profile/update', {
            name,
            email,
            password,
            password_confirmation
        });

        if (response.data.admin) {
            toastr.success(response.data.message);
            // Clear password fields
            document.getElementById('profilePassword').value = '';
            document.getElementById('profilePasswordConfirm').value = '';
        }
    } catch (error) {
        console.error('Profile update error:', error);
        if (error.response && error.response.data.errors) {
            // Show validation errors
            Object.values(error.response.data.errors).forEach(err => toastr.error(err[0]));
        } else {
            toastr.error('Failed to update profile');
        }
    }
}

// Load current admin profile data (optional if not provided by view directly)
// We can fetch this from the dashboard or login response if stored in localStorage, 
// or make a call to 'api/admin/me' if it exists. 
// For now, let's try to infer from the session/page if available, 
// or better: The user should see their current name/email. 
// Since we don't have a 'me' endpoint readily available in the viewed files, 
// we will assume the user needs to enter it or we can add a 'me' endpoint call here if needed.
// IMPORTANT: The prompt didn't ask to pre-fill, just "update password & username & email". 
// But it's good UX. I will add a simple text: "Enter new details to update".
// actually `auth()->user()` is available in blade.
// Let's pre-fill using Blade!
// Modifying script to pre-fill inputs from Blade variable.

document.addEventListener('DOMContentLoaded', () => {
    const adminName = "{{ Auth::guard('admin')->user()->name ?? '' }}";
    const adminEmail = "{{ Auth::guard('admin')->user()->email ?? '' }}";
    
    const nameInput = document.getElementById('profileName');
    const emailInput = document.getElementById('profileEmail');

    if (nameInput) nameInput.value = adminName;
    if (emailInput) emailInput.value = adminEmail;
});

@endpush
