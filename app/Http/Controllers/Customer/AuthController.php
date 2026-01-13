<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('customer.auth.login');
    }

    public function registerPage()
    {
        return view('customer.auth.register');
    }

    public function showForgotPassword()
    {
        return view('customer.auth.forgot-password');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'))
                ->with('form', 'login');
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('customer')->attempt($credentials, $remember)) {
            $customer = Auth::guard('customer')->user();
            $request->session()->put('just_logged_in', true);
            $request->session()->put('customer_logged_in', true);
            $request->session()->put('is_logged_in', true);



            // Check if email is verified
            // if (!$customer->email_verified_at) {
            //     Auth::guard('customer')->logout();
            //     return redirect()->route('customer.verify')
            //         ->with([
            //             'customer_id' => $customer->id,
            //             'email' => $customer->email,
            //             'mobile' => $customer->mobile,
            //             'error' => 'Please verify your email and mobile before logging in.'
            //         ]);
            // }

            // Check if account is active
            if ($customer->status != 1) {
                Auth::guard('customer')->logout();
                return redirect()->back()
                    ->withErrors(['email' => 'Your account is inactive. Please contact support.'])
                    ->withInput($request->except('password'));
            }

            // Update last login
            $customer->update([
                'last_login_at' => now(),
                'last_login_ip' => $request->ip()
            ]);

            return redirect()->route('customer.home.index')
                ->with('success', 'Welcome back, ' . $customer->name . '!');
        }

        return redirect()->back()
            ->withErrors(['email' => 'Invalid email or password. Please try again.'])
            ->withInput($request->except('password'))
            ->with('form', 'login');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|max:150|unique:customers,email',
            'mobile' => 'required|string|max:20|unique:customers,mobile|regex:/^[0-9]{10,15}$/',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'terms' => 'required|accepted'
        ], [
            'name.required' => 'Full name is required',
            'name.regex' => 'Name can only contain letters and spaces',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
            'mobile.required' => 'Mobile number is required',
            'mobile.regex' => 'Please enter a valid 10-15 digit mobile number',
            'mobile.unique' => 'This mobile number is already registered',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Passwords do not match',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number and one special character',
            'terms.required' => 'You must accept the terms and conditions',
            'terms.accepted' => 'You must accept the terms and conditions'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirmation']))
                ->with('form', 'register');
        }

        // Create customer
        $customer = Customer::create([
            'name' => ucwords(strtolower(trim($request->name))),
            'email' => strtolower(trim($request->email)),
            'mobile' => trim($request->mobile),
            'password' => Hash::make($request->password),
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Generate OTPs
        $emailOTP = rand(100000, 999999);
        $mobileOTP = rand(100000, 999999);

        // Store verification data in cache with unique key
        $verificationKey = 'verify_' . md5($customer->email . time());
        $verificationData = [
            'customer_id' => $customer->id,
            'email' => $customer->email,
            'mobile' => $customer->mobile,
            'email_otp' => $emailOTP,
            'mobile_otp' => $mobileOTP,
            'attempts' => 0,
            'created_at' => now()->timestamp
        ];

        Cache::put($verificationKey, $verificationData, 300); // 5 minutes
        Cache::put('email_otp_' . $customer->email, $emailOTP, 300);
        Cache::put('mobile_otp_' . $customer->mobile, $mobileOTP, 300);

        // Store verification key in session
        session(['verification_key' => $verificationKey]);

        return redirect()->route('customer.verify')
            ->with([
                'customer_id' => $customer->id,
                'email' => $customer->email,
                'mobile' => $customer->mobile,
                'email_otp' => $emailOTP, // Remove in production
                'mobile_otp' => $mobileOTP, // Remove in production
                'verification_key' => $verificationKey,
                'success' => 'Registration successful! Please verify your email and mobile number.'
            ]);
    }

    public function verifyPage()
    {
        // Check if we have session data
        if (!session()->has('verification_key') && !session()->has('customer_id')) {
            return redirect()->route('customer.register')
                ->with('error', 'Please register first to get verification OTPs.');
        }

        // Get data from cache if available
        if (session()->has('verification_key')) {
            $verificationData = Cache::get(session('verification_key'));
            if (!$verificationData) {
                return redirect()->route('customer.register')
                    ->with('error', 'Verification session expired. Please register again.');
            }
        }

        return view('customer.auth.verify');
    }

    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_otp' => 'required|numeric|digits:6',
            'mobile_otp' => 'required|numeric|digits:6'
        ], [
            'email_otp.required' => 'Email OTP is required',
            'email_otp.numeric' => 'Email OTP must be a number',
            'email_otp.digits' => 'Email OTP must be 6 digits',
            'mobile_otp.required' => 'Mobile OTP is required',
            'mobile_otp.numeric' => 'Mobile OTP must be a number',
            'mobile_otp.digits' => 'Mobile OTP must be 6 digits'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form', 'verify');
        }

        // Get verification data
        $verificationKey = session('verification_key');
        $customerId = session('customer_id');
        $email = session('email');
        $mobile = session('mobile');

        // Try to get from cache if session data is missing
        if ($verificationKey) {
            $verificationData = Cache::get($verificationKey);
            if ($verificationData) {
                $customerId = $verificationData['customer_id'];
                $email = $verificationData['email'];
                $mobile = $verificationData['mobile'];

                // Check attempts
                if ($verificationData['attempts'] >= 5) {
                    Cache::forget($verificationKey);
                    Cache::forget('email_otp_' . $email);
                    Cache::forget('mobile_otp_' . $mobile);

                    return redirect()->route('customer.register')
                        ->with('error', 'Too many failed attempts. Please register again.');
                }
            }
        }

        if (!$customerId || !$email || !$mobile) {
            return redirect()->route('customer.register')
                ->with('error', 'Verification session expired. Please register again.');
        }

        // Get cached OTPs
        $cachedEmailOTP = Cache::get('email_otp_' . $email);
        $cachedMobileOTP = Cache::get('mobile_otp_' . $mobile);

        // Verify OTPs
        if (
            !$cachedEmailOTP || !$cachedMobileOTP ||
            $cachedEmailOTP != $request->email_otp ||
            $cachedMobileOTP != $request->mobile_otp
        ) {

            // Increment attempts
            if ($verificationKey && $verificationData) {
                $verificationData['attempts']++;
                Cache::put($verificationKey, $verificationData, 300);
            }

            return redirect()->back()
                ->withErrors(['otp' => 'Invalid OTP. Please try again.'])
                ->withInput()
                ->with('form', 'verify');
        }

        // OTPs verified - update customer
        $customer = Customer::find($customerId);
        if ($customer) {
            $customer->update([
                'email_verified_at' => now(),
                'mobile_verified_at' => now(),
                'status' => 1,
                'updated_at' => now()
            ]);

            // Clear all cached data
            if ($verificationKey) {
                Cache::forget($verificationKey);
            }
            Cache::forget('email_otp_' . $email);
            Cache::forget('mobile_otp_' . $mobile);

            // Clear session
            session()->forget([
                'verification_key',
                'customer_id',
                'email',
                'mobile',
                'email_otp',
                'mobile_otp'
            ]);

            // Auto login
            Auth::guard('customer')->login($customer);

            return redirect()->route('customer.home.index')
                ->with('success', 'Verification successful! Welcome to ' . config('app.name'));
        }

        return redirect()->route('customer.register')->with('error', 'Customer not found.');
    }

    public function resendOTP(Request $request)
    {
        $verificationKey = session('verification_key');
        $customerId = session('customer_id');
        $email = session('email');
        $mobile = session('mobile');

        if (!$verificationKey || !$customerId || !$email || !$mobile) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please register again.'
            ], 400);
        }

        // Get customer
        $customer = Customer::find($customerId);
        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Customer not found.'
            ], 400);
        }

        // Generate new OTPs
        $newEmailOTP = rand(100000, 999999);
        $newMobileOTP = rand(100000, 999999);

        // Update cache
        Cache::put('email_otp_' . $email, $newEmailOTP, 300);
        Cache::put('mobile_otp_' . $mobile, $newMobileOTP, 300);

        // Update verification data
        $verificationData = Cache::get($verificationKey);
        if ($verificationData) {
            $verificationData['email_otp'] = $newEmailOTP;
            $verificationData['mobile_otp'] = $newMobileOTP;
            $verificationData['attempts'] = 0;
            Cache::put($verificationKey, $verificationData, 300);
        }

        // Update session
        session(['email_otp' => $newEmailOTP, 'mobile_otp' => $newMobileOTP]);

        return response()->json([
            'success' => true,
            'message' => 'OTP resent successfully!',
            'email_otp' => $newEmailOTP, // Remove in production
            'mobile_otp' => $newMobileOTP // Remove in production
        ]);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.home.index')
            ->with('success', 'Logged out successfully.');
    }
}
