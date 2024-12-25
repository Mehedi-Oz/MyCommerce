<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }

    public function create(Request $request)
    {
        Unit::store($request);
        return back()->with('message', 'Unit added successfully!!');
    }

    public function manage()
    {
        return view('admin.unit.manage', [
            'units' => Unit::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.unit.edit', [
            'unit' => Unit::find($id)
        ]);
    }

    public function status($id)
    {
        Unit::statusUnit($id);
        return back()->with('message', 'Status updated successfully!!');
    }

    public function update(Request $request)
    {
//        return $request;
        Unit::updateUnit($request);
        return back()->with('message', 'Unit updated successfully!!');
    }

    public function remove(Request $request)
    {
//        return $request;
        Unit::deleteUnit($request);
        return redirect('/unit/manage')->with('message', 'Unit deleted successfully!!');
    }
}
