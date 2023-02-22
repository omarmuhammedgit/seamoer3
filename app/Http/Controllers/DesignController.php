<?php

namespace App\Http\Controllers;

use App\Models\design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $num = design::latest()->first()->number_design;

        // if (empty($num)) {
        //     $number = "0001";
        // } else {
            // $convernum=str_replace('E-','',$num);
            // $con=(integer)$num;

        //     $number= str_pad($num+1, 5, 0, STR_PAD_LEFT);
        // }
        $designs = design::all();
        return view('Products.design.design', compact('designs'));
        // return $number;
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
            'name_design' => 'required|max:255',
            'number_design'=>'required|unique:designs|max:20',

        ],[
           'name_design.required'=>'يرجى ادخال اسم التصميم',
           'number_design.unique'=>'رقم التصميم موجود مسبقأ',
           'number_design.required'=>'يرجى ادخال رقم التصميم',


        ]);
        design::create([
            'name_design' => $request->name_design,
            'number_design' => $request->number_design,
            // 'price'=>$request->price
        ]);
        $designs = design::all();
        return view('Products.design.design', compact('designs'));
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
    public function updatedesign(Request $request){
        $id=$request->id;
        $validatedData = $request->validate([
            'name_design' => 'required|max:255',
            'number_design'=>'required|max:20|unique:designs,number_design,'.$id,

        ],[
           'name_design.required'=>'يرجى ادخال اسم التصميم',
           'number_design.unique'=>'رقم التصميم موجود مسبقأ',
           'number_design.required'=>'يرجى ادخال رقم التصميم',


        ]);
        design::find($id)->update([
            'name_design' => $request->name_design,
            'number_design' => $request->number_design,
        ]);
        session()->flash('edit','تمت تعديل التصميم بنجاح');


        return redirect()->back() ;
    }
    public function deletedesign(Request $request){
        $id = $request->id;
        design::find($id)->delete();
        session()->flash('delete','تم حذف التصميم بنجاح');
        return redirect()->back() ;
    }

}
