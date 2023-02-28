<?php

namespace App\Http\Controllers;

use App\Models\TradeMark;
use Illuminate\Http\Request;

class TradeMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tradeMarks=TradeMark::all();
        return view('Products.TradeMark.tradeMark',compact('tradeMarks'));
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
            'name_tradeMark' => 'required|max:20'

        ],[
           'name_tradeMark.required'=>'يرجى ادخال اسم العلامة التجارية',
           'name_tradeMark.max'=>'اسم العلامة التجارية اكبر 20 حرف'
        ]);
        TradeMark::create([
            'name_trade_mark'=>$request->name_tradeMark

        ]);
        $tradeMarks=TradeMark::all();
        return view('Products.TradeMark.tradeMark',compact('tradeMarks'));
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
    public function updatetradeMark(Request $request){
        $id=$request->id;

        $validatedData = $request->validate([
            'name_tradeMark' => 'required|max:20'

        ],[
           'name_tradeMark.required'=>'يرجى ادخال اسم العلامة التجارية',
           'name_tradeMark.max'=>'اسم العلامة التجارية اكبر 20 حرف'
        ]);
        TradeMark::find($id)->update([
            'name_trade_mark'=>$request->name_trade_mark
        ]);
        session()->flash('edit','تم تعديل العلامة التجارية بنجاح');


        return redirect()->back() ;
    }
    public function deletetradeMark(Request $request){
        $id = $request->id;
        TradeMark::find($id)->delete();
        session()->flash('delete','تم حذف العلامة التجارية بنجاح');
        return redirect()->back() ;
    }
    }

