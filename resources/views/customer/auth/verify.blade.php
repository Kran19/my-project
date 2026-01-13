@extends('customer.layouts.minimal')

@section('title', 'Verify Account - ' . config('app.name'))

@section('content')
<div class="min-h-screen bg-amber-50 flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full">
        <div class="text-center mb-8">
            <a href="{{ route('customer.home.index') }}" class="inline-block">
                <h1 class="text-4xl font-bold text-amber-800">{{ config('app.name') }}</h1>
            </a>
            <p class="text-gray-600 mt-2">Verify your account</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-amber-600 text-2xl"></i>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Two-Factor Verification</h2>
                <p class="text-gray-600 mt-2">Enter the OTPs sent to your email and mobile</p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-green-600 text-sm">
                        <i class="fas fa-check-circle mr-1"></i>
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h3 class="font-semibold text-red-800 mb-2">
                        <i class="fas fa-exclamation-triangle mr-1"></i> Please fix the following:
                    </h3>
                    <ul class="text-sm text-red-600">
                        @foreach($errors->all() as $error)
                            <li class="mb-1 flex items-start">
                                <i class="fas fa-circle text-xs mt-1 mr-2"></i>
                                <span>{{ $error }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-red-600 text-sm">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ session('error') }}
                    </p>
                </div>
            @endif

            <!-- Demo OTPs for Development -->
            @if(session('email_otp') && session('mobile_otp'))
                <div class="mb-6 p-4 bg-green-50 rounded-lg border border-green-200">
                    <h3 class="font-semibold text-green-800 mb-2">
                        <i class="fas fa-code mr-1"></i> Demo OTPs (Development Mode)
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-green-700">Email OTP:</p>
                            <p class="text-lg font-mono font-bold text-green-800">{{ session('email_otp') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-green-700">Mobile OTP:</p>
                            <p class="text-lg font-mono font-bold text-green-800">{{ session('mobile_otp') }}</p>
                        </div>
                    </div>
                    <p class="text-xs text-green-600 mt-2">
                        <i class="fas fa-info-circle mr-1"></i>
                        In production, these will be sent via email and SMS
                    </p>
                </div>
            @endif

            <form method="POST" action="{{ route('customer.verify.submit') }}" id="verifyForm" class="space-y-6">
                @csrf

                <!-- Hidden fields to preserve session data -->
                <input type="hidden" name="verification_key" value="{{ session('verification_key') }}">
                <input type="hidden" name="email" value="{{ session('email') }}">
                <input type="hidden" name="mobile" value="{{ session('mobile') }}">

                <!-- Email OTP -->
                <div>
                    <label class="block text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-amber-600"></i>
                        Email OTP
                    </label>
                    <div class="flex items-center space-x-2">
                        <input type="text"
                               name="email_otp"
                               maxlength="6"
                               required
                               value="{{ old('email_otp') }}"
                               class="w-full px-4 py-3 text-center text-xl font-mono rounded-lg border {{ $errors->has('email_otp') ? 'border-red-500' : 'border-gray-300' }} focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none transition-colors"
                               placeholder="123456"
                               autocomplete="off"
                               id="emailOtpInput">
                        <span class="text-sm text-gray-500 whitespace-nowrap">
                            @if(session('email'))
                                Sent to: {{ substr(session('email'), 0, 3) }}***{{ substr(session('email'), strpos(session('email'), '@')) }}
                            @endif
                        </span>
                    </div>
                    @if($errors->has('email_otp'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('email_otp') }}</p>
                    @endif
                </div>

                <!-- Mobile OTP -->
                <div>
                    <label class="block text-gray-700 mb-2">
                        <i class="fas fa-mobile-alt mr-2 text-amber-600"></i>
                        Mobile OTP
                    </label>
                    <div class="flex items-center space-x-2">
                        <input type="text"
                               name="mobile_otp"
                               maxlength="6"
                               required
                               value="{{ old('mobile_otp') }}"
                               class="w-full px-4 py-3 text-center text-xl font-mono rounded-lg border {{ $errors->has('mobile_otp') ? 'border-red-500' : 'border-gray-300' }} focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none transition-colors"
                               placeholder="654321"
                               autocomplete="off"
                               id="mobileOtpInput">
                        <span class="text-sm text-gray-500 whitespace-nowrap">
                            @if(session('mobile'))
                                Sent to: {{ substr(session('mobile'), 0, 3) }}******{{ substr(session('mobile'), -3) }}
                            @endif
                        </span>
                    </div>
                    @if($errors->has('mobile_otp'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('mobile_otp') }}</p>
                    @endif
                </div>

                <!-- OTP Timer -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-clock mr-1"></i>
                        OTP expires in: <span id="otpTimer" class="font-semibold text-amber-700">05:00</span>
                    </p>
                </div>

                <!-- Resend OTP -->
                <div class="text-center">
                    <button type="button"
                            id="resendOtpBtn"
                            disabled
                            class="text-amber-600 hover:text-amber-800 disabled:text-gray-400 disabled:cursor-not-allowed transition-colors">
                        <i class="fas fa-redo mr-1"></i>
                        <span id="resendText">Resend OTP (60s)</span>
                    </button>
                </div>

                <button type="submit"
                        class="w-full bg-gradient-to-r from-amber-600 to-amber-800 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                    Verify Account
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    <a href="{{ route('customer.register') }}" class="text-amber-600 hover:text-amber-800 transition-colors">
                        <i class="fas fa-edit mr-1"></i>
                        Wrong details? Register again
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// OTP Input Handling
document.querySelectorAll('#emailOtpInput, #mobileOtpInput').forEach(input => {
    input.addEventListener('input', function(e) {
        // Allow only numbers
        this.value = this.value.replace(/\D/g, '');

        // Auto move to next if 6 digits entered
        if (this.value.length === 6) {
            if (this.id === 'emailOtpInput') {
                document.getElementById('mobileOtpInput').focus();
            }
        }

        // Clear error border
        this.classList.remove('border-red-500');
    });
});

// Form Submission Validation
document.getElementById('verifyForm').addEventListener('submit', function(e) {
    const emailOtp = document.getElementById('emailOtpInput');
    const mobileOtp = document.getElementById('mobileOtpInput');
    let isValid = true;
    const errors = [];

    // Validate Email OTP
    if (!emailOtp.value || !/^\d{6}$/.test(emailOtp.value)) {
        emailOtp.classList.add('border-red-500');
        errors.push('Please enter a valid 6-digit email OTP');
        isValid = false;
    }

    // Validate Mobile OTP
    if (!mobileOtp.value || !/^\d{6}$/.test(mobileOtp.value)) {
        mobileOtp.classList.add('border-red-500');
        errors.push('Please enter a valid 6-digit mobile OTP');
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault();
        showErrorToast(errors[0]);
    }
});

// OTP Timer
let otpTimeLeft = 300; // 5 minutes in seconds
const otpTimer = document.getElementById('otpTimer');

function updateOTPTimer() {
    const minutes = Math.floor(otpTimeLeft / 60);
    const seconds = otpTimeLeft % 60;

    otpTimer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

    if (otpTimeLeft <= 0) {
        clearInterval(timerInterval);
        otpTimer.textContent = "Expired";
        otpTimer.classList.remove('text-amber-700');
        otpTimer.classList.add('text-red-600');
        document.getElementById('resendOtpBtn').disabled = false;
        document.getElementById('resendText').textContent = 'Resend OTP';
    } else {
        otpTimeLeft--;
    }
}

let timerInterval = setInterval(updateOTPTimer, 1000);

// Resend OTP Timer
let resendTimeLeft = 60;
const resendBtn = document.getElementById('resendOtpBtn');
const resendText = document.getElementById('resendText');

function updateResendTimer() {
    if (resendTimeLeft > 0) {
        resendBtn.disabled = true;
        resendText.textContent = `Resend OTP (${resendTimeLeft}s)`;
        resendTimeLeft--;
    } else {
        resendBtn.disabled = false;
        resendText.textContent = 'Resend OTP';
        clearInterval(resendTimerInterval);
    }
}

let resendTimerInterval = setInterval(updateResendTimer, 1000);

// Resend OTP Functionality
resendBtn.addEventListener('click', function() {
    if (this.disabled) return;

    this.disabled = true;
    resendTimeLeft = 60;
    updateResendTimer();
    resendTimerInterval = setInterval(updateResendTimer, 1000);

    // AJAX request to resend OTP
    fetch('{{ route("customer.otp.resend") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Update demo OTP display (development only)
            const demoSection = document.querySelector('.bg-green-50');
            if (demoSection && data.email_otp && data.mobile_otp) {
                const emailOtpDiv = demoSection.querySelector('div > div:nth-child(1) > p:nth-child(2)');
                const mobileOtpDiv = demoSection.querySelector('div > div:nth-child(2) > p:nth-child(2)');

                if (emailOtpDiv) emailOtpDiv.textContent = data.email_otp;
                if (mobileOtpDiv) mobileOtpDiv.textContent = data.mobile_otp;
            }

            // Reset main timer
            otpTimeLeft = 300;
            clearInterval(timerInterval);
            otpTimer.textContent = "05:00";
            otpTimer.classList.remove('text-red-600');
            otpTimer.classList.add('text-amber-700');
            timerInterval = setInterval(updateOTPTimer, 1000);

            showSuccessToast('OTP has been resent!');
        } else {
            showErrorToast(data.message || 'Failed to resend OTP. Please try again.');
            this.disabled = false;
            resendText.textContent = 'Resend OTP';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showErrorToast('An error occurred. Please try again.');
        this.disabled = false;
        resendText.textContent = 'Resend OTP';
    });
});

function showSuccessToast(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
    toast.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span>${message}</span>
        </div>
    `;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.remove('translate-x-full');
        toast.classList.add('translate-x-0');
    }, 10);

    setTimeout(() => {
        toast.classList.remove('translate-x-0');
        toast.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 5000);
}

function showErrorToast(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 p-4 bg-red-100 text-red-800 border border-red-200 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
    toast.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span>${message}</span>
        </div>
    `;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.remove('translate-x-full');
        toast.classList.add('translate-x-0');
    }, 10);

    setTimeout(() => {
        toast.classList.remove('translate-x-0');
        toast.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 5000);
}
</script>
@endpush    
