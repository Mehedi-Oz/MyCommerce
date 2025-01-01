<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;


    public function index()
    {
        return view('frontEnd.checkout.index');
    }

    public function newCashOrder(Request $request)
    {
//        return $request;
//        return Cart::content();

        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->mobile = $request->mobile;
        $this->customer->password = $request->mobile;
        $this->customer->save();

        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->order_date = date("Y-m-d");
        $this->order->order_timestamp = strtotime(date("Y-m-d"));
        $this->order->order_total = Session::get('order_total');
        $this->order->tax_total = Session::get('tax_total');
        $this->order->shipping_total = Session::get('shipping_total');
        $this->order->delivery_address = $request->delivery_address;
        $this->order->payment_type = $request->payment_type;
        $this->order->save();

        foreach (Cart::content() as $item) {
            $this->orderDetail = new OrderDetail();
            $this->orderDetail->order_id = $this->order->id;
            $this->orderDetail->product_id = $item->id;
            $this->orderDetail->product_name = $item->name;
            $this->orderDetail->product_price = $item->price;
            $this->orderDetail->product_quantity = $item->qty;
            $this->orderDetail->save();
        }

        return redirect('/complete-order')->with('message', 'Order placed successfully!!');
    }

    public function completeOrder()
    {
        return view('frontEnd.checkout.complete-order');
    }
}
