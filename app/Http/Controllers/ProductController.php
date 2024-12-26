<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\OtherImage;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    private $product;

    public function index()
    {
        return view('admin.product.index', [
            'categories' => category::all(),
            'sub_categories' => Subcategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()
        ]);
    }

    public function getSubcategoryByCategory()
    {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    public function create(Request $request)
    {
//        return $request;
        $this->product = Product::store($request);
        OtherImage::newOtherImage($request->other_image, $this->product->id);
        return back()->with('message', 'Product added successfully!!');
    }

    public function update(Request $request, $id)
    {
//        return $request;
        Product::updateProduct($request, $id);
        if ($request->other_image) {
            OtherImage::updateOtherImages($request->other_image, $id);
        }
        return back()->with('message', 'Product updated successfully!!');
    }

    public function manage()
    {
        return view('admin.product.manage', [
            'products' => Product::all(),
            'otherImages' => OtherImage::all(),
        ]);
    }

    public function detail($id)
    {
        return view('admin.product.detail', [
            'product' => Product::find($id),
            'categories' => category::all(),
            'sub_categories' => Subcategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.product.edit', [
            'product' => Product::find($id),
            'categories' => category::all(),
            'sub_categories' => Subcategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function status($id)
    {
        Product::statusProduct($id);
        return back()->with('message', 'Status updated successfully!!');
    }

    public function remove(Request $request)
    {
//        return $request;
        Product::deleteProduct($request);
        return back()->with('message', 'Product deleted successfully!!');
    }
}
