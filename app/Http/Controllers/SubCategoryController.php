<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {

        return view('admin.sub-category.index', [
            'categories' => Category::all()
        ]);
    }

    public function create(Request $request)
    {
//        return $request;
        SubCategory::store($request);
        return back()->with('message', 'Sub-Category added successfully!!');
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
            'subcategory' => SubCategory::find($id)
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
        return back()->with('message', 'Sub-Category updated successfully!!');
    }

    public function remove(Request $request)
    {
//        return $request;
        SubCategory::deleteSubCategory($request);
        return back()->with('message', 'Sub-Category deleted successfully!!');
    }
}
