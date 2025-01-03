@extends('frontEnd.master')

@section('title')
    Shopping Cart
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>

                        <div class="text-success">
                            {{session('message')}}
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>

                @php($subTotal=0)

                @foreach($cartItems as $cartItem)
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href=""><img
                                            src="{{asset($cartItem->options->image)}}" alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="">
                                        {{$cartItem->name}}</a></h5>
                                <p class="product-des">
                                    <span><em>Category: </em>{{$cartItem->options->category }}</span>
                                    <span><em>Brand: </em>{{$cartItem->options->brand}}</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <div class="count-input">
                                    {{$cartItem->price}} Tk
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <form action="{{route('cart.update', ['id'=>$cartItem->rowId])}}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input class="form-control" value="{{$cartItem->qty}}" name="qty" min="1"
                                               required>
                                        <input type="submit" class="btn btn-success btn-sm" value="Update">
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{$cartItem->price * $cartItem->qty}}</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item" onclick="return confirm('Remove this item?')"
                                   href="{{route('cart.remove', ['id'=>$cartItem->rowId])}}"><i
                                            class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>

                    @php($subTotal += $cartItem->price * $cartItem->qty)
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>{{$subTotal}} Tk</span></li>
                                        <li>Tax<span>{{$tax = round(($subTotal*15)/100)}} Tk</span></li>
                                        <li>Shipping Cost<span>{{$shipping = 100}} Tk</span></li>
                                        <li class="last">Tatal Payable<span>{{$totalPayable = $subTotal+$tax+$shipping}} Tk</span>
                                        </li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
