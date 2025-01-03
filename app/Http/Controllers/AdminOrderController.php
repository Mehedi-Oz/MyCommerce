<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $order;

    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::orderBy('id', 'desc')->get()
        ]);
    }

    public function detail($id)
    {
        return view('admin.order.detail', [
            'order' => Order::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.order.edit', [
            'order' => Order::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
//        return $request;
        if ($request->order_status == 'Pending') {

            return back()->with('message', 'Order Status Info Updated');

        } elseif ($request->order_status == 'Processing') {

            $this->order = Order::find($id);
            $this->order->order_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();
            return back()->with('message', 'Order Status Info Updated');

        } elseif ($request->order_status == 'Complete') {

            $this->order = Order::find($id);
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->delivery_status;
            $this->order->payment_status = $request->payment_status;
            $this->order->save();
            return back()->with('message', 'Order Status Info Updated');

        } elseif ($request->order_status == 'Cancel') {


        }
    }

    public function showInvoice($id)
    {
        return view('admin.order.index', [
            'order' => Order::find($id)
        ]);
    }

    public function printInvoice($id)
    {
        return view('admin.order.index', [
            'order' => Order::find($id)
        ]);
    }

    public function delete(Request $request)
    {
        return $request;
    }
}
