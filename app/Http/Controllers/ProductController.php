<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', [
            'categories' => category::all(),
            'sub_categories' => Subcategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()
        ]);
    }

    public function create(Request $request)
    {
        Product::store($request);
        return back()->with('message', 'Product added successfully!!');
    }

    public function manage()
    {
        return view('admin.product.manage', [
            'products' => Product::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.product.edit', [
            'product' => Product::find($id)
        ]);
    }

    public function status($id)
    {
        Product::statusProduct($id);
        return back()->with('message', 'Status updated successfully!!');
    }

    public function update(Request $request)
    {
//        return $request;
        Product::updateProduct($request);
        return back()->with('message', 'Product updated successfully!!');
    }

    public function remove(Request $request)
    {
//        return $request;
        Product::deleteProduct($request);
        return back()->with('message', 'Product deleted successfully!!');
    }
}
