@extends('frontEnd.master')

@section('title')
    Checkout
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('cart.show')}}">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <section class="checkout-steps-form-content collapse show"
                                 style="padding-top: 25px; border-radius: 4px; border: 1px solid #e6e6e6;">

                            <ul class="nav nav-pills">
                                <li>
                                    <a href="" class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill">Cash
                                        on delivery</a>
                                </li>
                                <li>
                                    <a href="" class="nav-link" data-bs-target="#online"
                                       data-bs-toggle="pill">Online</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="cash">
                                    <form action="{{route('new-cash-order')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name </label><span class="text-danger"> *</span>
                                                    <div class="form-input form">
                                                        @if(isset($customer->id))
                                                            <input type="text" required name="name"
                                                                   placeholder="full name" value="{{$customer->name}}"
                                                                   readonly>
                                                        @else
                                                            <input type="text" required name="name"
                                                                   placeholder="full name">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email</label><span class="text-danger"> *</span>
                                                    <div class="form-input form">
                                                        @if(isset($customer->id))
                                                            <input type="email" required name="email"
                                                                   placeholder="email address"
                                                                   value="{{$customer->email}}" readonly>
                                                        @else
                                                            <input type="email" required name="email"
                                                                   placeholder="email address">
                                                            <span class="text-danger">{{$errors->has('email')? $errors->first('email'): ''}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label><span class="text-danger"> *</span>
                                                    <div class="form-input form">
                                                        @if(isset($customer->id))
                                                            <input type="text" required name="mobile"
                                                                   placeholder="Phone Number"
                                                                   value="{{$customer->mobile}}" readonly>
                                                        @else
                                                            <input type="text" required name="mobile"
                                                                   placeholder="Phone Number">
                                                            <span class="text-danger">{{$errors->has('mobile')? $errors->first('mobile'): ''}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label><span class="text-danger"> *</span>
                                                    <div class="form-input form">
                                                    <textarea required name="delivery_address"
                                                              placeholder="Delivery Address"
                                                              style="padding-top: 10px; height: 70px"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Payment Type</label>
                                                    <div class="">
                                                        <label> <input type="radio" name="payment_type" value="1"
                                                                       class="mx-2" checked>Cash On Delivery</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="checkbox" id="checkbox-3" checked>
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>I accept all terms and conditions.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" type="submit">Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade show" id="online">
                                    ONLINE
                                    {{--<div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>User Name</label>
                                                <div class="row">
                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" placeholder="First Name">
                                                    </div>
                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Mailing Address</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Mailing Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>City</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Post Code</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Post Code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Country</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Region/State</label>
                                                <div class="select-items">
                                                    <select class="form-control">
                                                        <option value="0">select</option>
                                                        <option value="1">select option 01</option>
                                                        <option value="2">select option 02</option>
                                                        <option value="3">select option 03</option>
                                                        <option value="4">select option 04</option>
                                                        <option value="5">select option 05</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3">
                                                <label for="checkbox-3"><span></span></label>
                                                <p>My delivery and mailing addresses are the same.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button class="btn" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">next
                                                    step
                                                </button>
                                            </div>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">All Orders</h5>
                            <div class="sub-total-price">

                                @php($total=0)
                                @foreach(Cart::content() as $cartItem)
                                    <div class="total-price">
                                        <p class="value">
                                            {{$cartItem->name}}
                                            ({{$cartItem->qty}}x)
                                        </p>
                                        <p class="price">{{$cartItem->price * $cartItem->qty}} Tk</p>
                                    </div>
                                    @php($total += ($cartItem->price * $cartItem->qty))
                                @endforeach

                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subtotal:</p>
                                    <p class="price">{{$total}} Tk</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Amount (15%):</p>
                                    <p class="price">{{$tax = round(($total*15)/100)}} Tk</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Cost:</p>
                                    <p class="price">{{$shipping = 500}} Tk</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total:</p>
                                    <p class="price">{{$order_total = $total+$tax+$shipping}} Tk</p>
                                </div>
                                <?php
                                Session::put('order_total', $order_total);
                                Session::put('tax_total', $tax);
                                Session::put('shipping_total', $shipping);
                                ?>
                            </div>
                            <div class="price-table-btn button">
                                <a href="{{route('cart.show')}}" class="btn btn-alt">Shopping Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
