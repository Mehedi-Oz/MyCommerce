<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        Category::store($request);
        return back()->with('message', 'Category added successfully!!');
    }

    public function manage()
    {
        return view('admin.category.manage', [
            'categories' => Category::orderBy('name', 'asc')->get()
        ]);
    }

    public function edit($id)
    {
        return view('admin.category.edit', [
            'category' => Category::find($id)
        ]);
    }

    public function status($id)
    {
        Category::statusCategory($id);
        return back()->with('message', 'Status updated successfully!!');
    }

    public function update(Request $request)
    {
//        return $request;
        Category::updateCategory($request);
        return back()->with('message', 'Category updated successfully!!');
    }

    public function remove(Request $request)
    {
//        return $request;
        Category::deleteCategory($request);
        return back()->with('message', 'Category deleted successfully!!');
    }
}
