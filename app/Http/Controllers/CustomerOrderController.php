<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Order;

class CustomerOrderController extends Controller
{

    private $orders;

    public function allOrder()
    {
        $this->orders = Order::where('customer_id', Session::get('customerId'))->get();

//        return $this->orders;
        return view('frontEnd.customer.allOrder', [
            'orders' => $this->orders
        ]);
    }
}
