<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units= Unit::all();
        return view('admin.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit=new Unit();
        $unit->name= $request->name;
        $unit->description= $request->description;
        $unit->save();
        return redirect()->back()->with('message','Unit Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Unit $unit)
    {
        if($unit->status==1){
            $unit->update(['status'=>0]);
        }else{
            $unit->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $update=$unit->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        if($update)
            return redirect('/units')->with('message','Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $delete=$unit->delete();
        if($delete)
            return redirect()->back()->with('message', 'Unit deleted Successfully');
    }
}
