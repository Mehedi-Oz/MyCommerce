<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public $product;

    public function index(Request $request, $id)
    {
//        return $id;
//        return $request;
        $this->product = Product::find($id);
        Cart::add($this->product->id, $this->product->name, $request->qty, $this->product->selling_price, [
            'image' => $this->product->image,
            'category' => $this->product->category->name,
            'brand' => $this->product->brand->name
        ]);
        return redirect('/cart/show');
    }

    public function show()
    {
//        return Cart::content();
        return view('frontEnd.cart.index', [
            'cartItems' => Cart::content()
        ]);
    }

    public function remove($id)
    {
        $rowId = $id;

        Cart::remove($rowId);
        return redirect('/cart/show')->with('message', 'Item has been removed!');
    }

    public function update(Request $request, $id)
    {
        $rowId = $id;

        Cart::update($rowId, $request->qty);
        return redirect('/cart/show')->with('message', 'Item has been updated!');
    }
}
