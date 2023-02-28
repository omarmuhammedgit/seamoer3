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
            'commercial_record'=>'required|min:15|unique:settings',
            'phone'=>'required',
            'email'=>'required'

        ],[
           'name.required'=>'يرجى ادخال اسم التصميم',
           'commercial_record.unique'=>'رقم السجل التجاري موجود مسبقأ',
           'commercial_record.required'=>'يرجى ادخال رقم السجل التجاري',
           'commercial_record.min'=>'يجب ان يتكون رقم السجل من 15 رقم',
           'phone.required'=>'يرجي ادخال رقم الهاتف',
           'email.required'=>'يرجى ادخال البريد الالكتروتي'
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

        session()->flash('Add','تمت اضافة الاعدادات  بنجاح');
        $settings=Setting::all();

        return view('Settings.index', compact('settings'));

        return redirect()->back() ;

    }
    public function updateSetting(Request $request)
    {
        $id=$request->id;

        $validatedData = $request->validate([
            'name' => 'required|max:150',
            'commercial_record'=>'required|min:15|unique:settings,commercial_record,'.$id,
            'phone'=>'required'

        ],[
           'name.required'=>'يرجى ادخال اسم التصميم',
           'commercial_record.unique'=>'رقم السجل التجاري موجود مسبقأ',
           'commercial_record.required'=>'يرجى ادخال رقم السجل التجاري',
           'commercial_record.min'=>'يجب ان يتكون رقم السجل من 15 رقم',
           'phone.required'=>'يرجي ادخال رقم الهاتف'
        ]);

        Setting::find($id)->update([
            'name'=>$request->name,
            'commercial_record'=>$request->commercial_record,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'city'=>$request->city,
            'country'=>$request->country,
            'postal_code'=>$request->postal_code,
            'created_by'=>$request->created_by

        ]);
        session()->flash('edit','تمت تعديل الاعدادات بنجاح');


        return redirect()->back() ;
    }
    public function deleteSetting(Request $request)
    {
        $id=$request->id;
        Setting::find($id)->delete();
        session()->flash('delete','تم حذف الاعدادات بنجاح');
        return redirect()->back() ;

    }

}
