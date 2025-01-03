<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;
use Cart;

class CustomerAuthController extends Controller
{
    private $customer;

    public function index()
    {
        return view('frontEnd.customer.index');
    }

    public function loginCustomer(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if ($this->customer) {
            if (password_verify($request->password, $this->customer->password)) {

                Session::put('customerId', $this->customer->id);
                Session::put('customerName', $this->customer->name);

                return redirect()->route('customer.dashboard');
            } else {
                return back()->with('message', 'Invalid Password');
            }
        } else {
            return back()->with('message', 'Invalid Email Address');
        }
    }

    public function registerShow()
    {
        return view('frontEnd.customer.register');
    }

    public function registerCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:customers,mobile',
            'email' => 'required|unique:customers,email',
            'password' => 'required',
        ]);
        $this->customer = Customer::newCustomer($request);

        Session::put('customerId', $this->customer->id);
        Session::put('customerName', $this->customer->name);

        return redirect()->route('customer.dashboard');
    }

    public function dashboard()
    {
        return view('frontEnd.customer.dashboard');
    }

    public function profile()
    {
        return view('frontEnd.customer.profile');
    }

    public function accountCustomer()
    {
//        return view('frontEnd.customer.dashboard');
    }

    public function changePasswordCustomer()
    {
//        return view('frontEnd.customer.dashboard');
    }

    public function logout()
    {
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }
}
