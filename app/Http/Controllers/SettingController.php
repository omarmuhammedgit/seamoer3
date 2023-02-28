<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings=Setting::all();
        return view('Settings.index',compact('settings'));
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:150',
            'commercial_record'=>'required|max:20|unique:settings',
            'phone'=>'required'

        ],[
           'name.required'=>'يرجى ادخال اسم التصميم',
           'commercial_record.unique'=>'رقم السجل التجاري موجود مسبقأ',
           'commercial_record.required'=>'يرجى ادخال رقم السجل التجاري',
           'phone.required'=>'يرجي ادخال رقم الهاتف'
        ]);

        Setting::create([
            'name'=>$request->name,
            'commercial_record'=>$request->commercial_record,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'city'=>$request->city,
            'country'=>$request->country,
            'postal_code'=>$request->postal_code,
            'created_by'=>auth()->user()->name
        ]);

        session()->flash('add','تمت اضافة الاعدادات  بنجاح');
        $settings=Setting::all();

        return view('Settings.index', compact('settings'));

        return redirect()->back() ;

    }

}
