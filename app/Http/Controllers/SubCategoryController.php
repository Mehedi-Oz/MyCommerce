<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index',[
            'categories' => Category::all()
        ]);
    }

    public function create(Request $request)
    {
        SubCategory::store($request);
        return back()->with('message', 'Category added successfully!!');
    }

    public function manage()
    {
        return view('admin.sub-category.manage', [
            'subcategories' => SubCategory::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.sub-category.edit', [
            'subcategory' => SubCategory::find($id),
            'categories' => Category::all()
        ]);
    }

    public function status($id)
    {
        SubCategory::statusSubCategory($id);
        return back()->with('message', 'Status updated successfully!!');
    }

    public function update(Request $request)
    {
//        return $request;
        SubCategory::updateSubCategory($request);
        return back()->with('message', 'SubCategory updated successfully!!');
    }

    public function remove(Request $request)
    {
//        return $request;
        SubCategory::deleteSubCategory($request);
        return back()->with('message', 'SubCategory deleted successfully!!');
    }
}
