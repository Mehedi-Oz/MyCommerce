<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;

//use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;


    public function index()
    {
        if (Session::get('customerId')) {
            $this->customer = Customer::find(Session::get('customerId'));
        } else {
            $this->customer = '';
        }
        return view('frontEnd.checkout.index', ['customer' => $this->customer]);
    }

    private function orderCustomerValidate($request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:customers,mobile',
            'email' => 'required|unique:customers,email',
            'delivery_address' => 'required',
        ]);
    }

    public function newCashOrder(Request $request)
    {
//        return $request;
//        return Cart::content();

        if (Session::get('customerId')) {
            $this->customer = Customer::find(Session::get('customerId'));
        } else {
            $this->orderCustomerValidate($request);
            $this->customer = Customer::newCustomer($request);

            Session::put('customerId', $this->customer->id);
            Session::put('customerName', $this->customer->name);
        }

        $this->order = Order::newOrder($request, $this->customer->id);

        OrderDetail::newOrderDetail($this->order->id);

        return redirect('/complete-order')->with('message', 'Order placed successfully!!');
    }

    public function completeOrder()
    {
        return view('frontEnd.checkout.complete-order');
    }
}
