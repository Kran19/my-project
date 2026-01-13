<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function orders() {
        return view('customer.account.orders');
    }

    public function orderDetails($id) {
        return view('customer.account.order-details', compact('id'));
    }
}
