<?php

namespace App\Http\Controllers;

use App\Models\Seamoer;
use App\Models\Size;
use Illuminate\Http\Request;

class SeamoerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seamoers=Seamoer::all();
        return view('Employees.Seamoer.index-seamoer',compact('seamoers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.Seamoer.create-seamoer');
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
            'name' => 'required|max:255',
            'shopname' => 'required|max:255',
            'recordnumber'=>'required|unique:seamoers|max:20',
            'facilitynumber'=>'required',
            'phone'=>'required|max:20',
            // 'email' => 'email:rfc,dns',
            'city'=>'required',
            'district'=>'required',
            'street'=>'required'
        ],[
           'name.required'=>'يرجى ادخال اسم القصاص',
           'shopname.required'=>'يرجى ادخال اسم المحل',
           'recordnumber.unique'=>'رقم السجل موجود مسبقأ',
           'facilitynumber.required'=>'يرجى ادخال رقم المنشاة',
           'recordnumber.required'=>'يرجى ادخال رقم السجل',
           'phone.required'=>'يرجى ادخال رقم الهاتف',
        //    'email.email'=>'يجب ان يكون الايميل صالحا',
           'phone.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
           'city.required'=>'يرجى ادخال  اسم المدينة',
           'street.required'=>'يرجى ادخال  اسم الشارع',
           'district'=>'يرجى ادخال  اسم الحي'


        ]);

        Seamoer::create([
            'name'=>$request->name,
            'shopname'=>$request->shopname,
            'recordnumber'=>$request->recordnumber,
            'phone'=>$request->phone,
            'facilitynumber'=>$request->facilitynumber,
            'email'=>$request->email,
            'city'=>$request->city,
            'district'=>$request->district,
            'street'=>$request->street,
            'accountnumber'=>$request->accountnumber,
            'bankname'=>$request->bankname,
            'statement'=>$request->statement
        ]);
        session()->flash('Add','تمت اضافة الخياط بنجاح');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seamoer  $seamoer
     * @return \Illuminate\Http\Response
     */
    public function show(Seamoer $seamoer)

    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seamoer  $seamoer
     * @return \Illuminate\Http\Response
     */
    public function edit(Seamoer $seamoer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seamoer  $seamoer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seamoer $seamoer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seamoer  $seamoer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seamoer $seamoer)
    {
        //
    }
    public function editSeamoer($id){
        $seamoer=Seamoer::where('id',$id)->first();
        return view('Employees.Seamoer.edit-seamoer',compact('seamoer'));
    }


    public function updateSeamoer(Request $request){

        $id=$request->id;

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'shopname' => 'required|max:255',
            'facilitynumber'=>'required',
            'phone'=>'required|max:20',
            // 'email' => 'email:rfc,dns',
            'city'=>'required',
            'district'=>'required',
            'street'=>'required'
        ],[
           'name.required'=>'يرجى ادخال اسم القصاص',
           'shopname.required'=>'يرجى ادخال اسم المحل',
           'recordnumber.unique'=>'رقم السجل موجود مسبقأ',
           'facilitynumber.required'=>'يرجى ادخال رقم المنشاة',
           'recordnumber.required'=>'يرجى ادخال رقم السجل',
           'phone.required'=>'يرجى ادخال رقم الهاتف',
        //    'email.email'=>'يجب ان يكون الايميل صالحا',
           'phone.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
           'city.required'=>'يرجى ادخال  اسم المدينة',
           'street.required'=>'يرجى ادخال  اسم الشارع',
           'district'=>'يرجى ادخال  اسم الحي'


        ]);
        Seamoer::find($id)->update([
            'name'=>$request->name,
            'shopname'=>$request->shopname,
            'recordnumber'=>$request->recordnumber,
            'phone'=>$request->phone,
            'facilitynumber'=>$request->facilitynumber,
            'email'=>$request->email,
            'city'=>$request->city,
            'district'=>$request->district,
            'street'=>$request->street,
            'accountnumber'=>$request->accountnumber,
            'bankname'=>$request->bankname,
            'statement'=>$request->statement
        ]);
        session()->flash('edit','تم تعديل الخياط بنجاح');

        $seamoers=Seamoer::all();
        return view('Employees.Seamoer.index-seamoer',compact('seamoers'));
     }
     public function deleteSeamoer(Request $request){
        $id = $request->id;
        Seamoer::find($id)->delete();
        session()->flash('delete','تم حذف الخياط بنجاح');
        return redirect('/Seamoer-create');
    }
    public function deletecheckup($id)
    {
        $seamoer=Seamoer::where('id',$id)->first();
        $info_seamoers=Size::where('retribution_id',$id)->get();
        return view('Employees.Seamoer.checkup',compact('seamoer','info_seamoers'));
    }
}
