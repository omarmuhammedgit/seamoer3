<?php

namespace App\Http\Controllers;

use App\Models\Fabrics;
use Illuminate\Http\Request;

class FabricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabrices=Fabrics::all();
        return view('Products.Fabrics.create-fabrice',compact('fabrices'));
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
            'type_fabrice' => 'required|max:255',
            'number_fabrice'=>'required|unique:fabrics|max:20',
            'color_fabrice'=>'required'

        ],[
           'type_fabrice.required'=>'يرجى ادخال اسم القماش',
           'number_fabrice.unique'=>'رقم القماش موجود مسبقأ',
           'number_fabrice.required'=>'يرجى ادخال رقم القماش',
           'color_fabrice.required'=>'يرجى ادخال اللون القماش'


        ]);
        Fabrics::create([
            'type_fabrice'=>$request->type_fabrice,
            'number_fabrice'=>$request->number_fabrice,
            'color_fabrice'=>$request->color_fabrice
        ]);
        $fabrices=Fabrics::all();
         return view('Products.Fabrics.create-fabrice',compact('fabrices'));

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
    public function updatefabrice(Request $request)
    {

        $id=$request->id;

        $validatedData = $request->validate([
            'type_fabrice' => 'required|max:255',
            'number_fabrice'=>'required|max:20|unique:fabrics,number_fabrice,'.$id,
            'color_fabrice'=>'required'

        ],[
           'type_fabrice.required'=>'يرجى ادخال اسم القماش',
           'number_fabrice.unique'=>'رقم القماش موجود مسبقأ',
           'number_fabrice.required'=>'يرجى ادخال رقم القماش',
           'color_fabrice.required'=>'يرجى ادخال اللون القماش'


        ]);

        Fabrics::find($id)->update([
            'type_fabrice'=>$request->type_fabrice,
            'number_fabrice'=>$request->number_fabrice,
            'color_fabrice'=>$request->color_fabrice
        ]);
        session()->flash('edit','تم تعديل القماش بنجاح');


        return redirect()->back() ;
    }
    public function deletefabrice(Request $request){
        $id = $request->id;
        Fabrics::find($id)->delete();
        session()->flash('delete','تم حذف القماش بنجاح');
        return redirect()->back() ;
    }
}
