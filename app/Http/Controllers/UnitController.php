<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('Products.Units.units');
        $units=Unit::all();
        return view('Products.Units.units',compact('units'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name_unit' => 'required|max:255'

        ],[
           'name_unit.required'=>'يرجى ادخال اسم الوحدة',


        ]);
        Unit::create([
            'name_unit'=>$request->name_unit,
            'sub_unit'=>$request->sub_unit
        ]);
        $units=Unit::all();
        return view('Products.Units.units',compact('units'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updateunit(Request $request)
    {
        $id=$request->id;
        $validatedData = $request->validate([
            'name_unit' => 'required|max:255'

        ],[
           'name_unit.required'=>'يرجى ادخال اسم الوحدة',
        ]);
        Unit::find($id)->update([
            'name_unit'=>$request->name_unit,
            'sub_unit'=>$request->sub_unit]);
            session()->flash('edit','تم تعديل الوحدة بنجاح');


            return redirect()->back() ;
        }
        public function deleteunit(Request $request){
            $id = $request->id;
            Unit::find($id)->delete();
            session()->flash('delete','تم حذف الوحدة بنجاح');
            return redirect()->back() ;
        }
}
