<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function create(Request $request)
    {
        Brand::store($request);
        return back()->with('message', 'Brand added successfully!!');
    }

    public function manage()
    {
        return view('admin.brand.manage', [
            'brands' => Brand::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.brand.edit', [
            'brand' => Brand::find($id)
        ]);
    }

    public function status($id)
    {
        Brand::statusBrand($id);
        return back()->with('message', 'Status updated successfully!!');
    }

    public function update(Request $request)
    {
//        return $request;
        Brand::updateBrand($request);
        return back()->with('message', 'Brand updated successfully!!');
    }

    public function remove(Request $request)
    {
//        return $request;
        Brand::deleteBrand($request);
        return redirect('/brand/manage')->with('message', 'Brand deleted successfully!!');
    }
}
