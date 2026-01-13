<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function profile() {
        return view('customer.account.profile');
    }

    public function addresses() {
        return view('customer.account.addresses');
    }

    public function changePassword() {
        return view('customer.account.change-password');
    }
}
