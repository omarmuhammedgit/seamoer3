<?php

namespace App\Http\Controllers;

use App\Models\Retribution;
use App\Models\Size;
use Illuminate\Http\Request;

class RetributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retributions=Retribution::all();
        return view('Employees.Retribution.index',compact('retributions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.Retribution.create-retribution');
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
            'recordnumber'=>'required|unique:retributions|max:20',
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
        Retribution::create([
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
        session()->flash('Add','تمت اضافة القصاص بنجاح');
        return redirect('Retribution');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retribution  $retribution
     * @return \Illuminate\Http\Response
     */
    public function show(Retribution $retribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retribution  $retribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Retribution $retribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retribution  $retribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retribution $retribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retribution  $retribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retribution $retribution)
    {
        //
    }
    public function editRetribution($id){
        $retribution=Retribution::where('id',$id)->first();
        return view('Employees.Retribution.edit-retribution',compact('retribution'));

    }
     public function updateRetribution(Request $request){

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

        Retribution::find($id)->update([
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
        session()->flash('edit','تمت تعديل الموظف بنجاح');

        $retributions=Retribution::all();
        return view('Employees.Retribution.index',compact('retributions'));
     }
     public function deleteRetribution(Request $request){
        $id = $request->id;
        Retribution::find($id)->delete();
        session()->flash('delete','تم حذف الموظف بنجاح');
        return redirect('/Retribution');
    }
    public function deletecheckup($id)
    {
        $retribution=Retribution::where('id',$id)->first();
        $info_retributions=Size::where('retribution_id',$id)->get();
        return view('Employees.Retribution.checkup',compact('retribution','info_retributions'));
    }

}
