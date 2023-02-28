<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $employees=Employe::all();
        return view('Employees.Employees.employees',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.Employees.create-employe');
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'no_employee'=>'required|unique:employes|max:20',
            'date_hiring'=>'required',
            'job_title'=>'required',
            'number_phone1'=>'required',
            // 'email' => 'email:rfc,dns',
            'city'=>'required',
            'district'=>'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'street'=>'required'
        ],[
           'first_name.required'=>'يرجى ادخال اسم الموظف',
           'last_name.required'=>'يرجى ادخال اسم العائلة',
           'no_employee.unique'=>'رقم الموظف موجود مسبقأ',
           'date_hiring.required'=>'يرجى ادخال تاريخ التعين',
           'no_employee.required'=>'يرجى ادخال رقم الموظف',
           'number_phone1.required'=>'يرجى ادخال رقم الهاتف',
        //    'email.email'=>'يجب ان يكون الايميل صالحا',
           'number_phone1.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
           'job_title.required'=>'يرجى ادخال المسمى الوظيفي',
           'city.required'=>'يرجى ادخال  اسم المدينة',
           'street.required'=>'يرجى ادخال  اسم الشارع',
           'district.required'=>'يرجى ادخال  اسم الحي'


        ]);


        Employe::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'no_employee'=>$request->no_employee,
            'date_hiring'=>$request->date_hiring,
            'job_title'=>$request->job_title,
            'number_phone1'=> $request->number_phone1,
            'number_phone2'=>$request->number_phone2,
            'email'=>$request->email,
            'city'=>$request->city,
            'district'=>$request->district,
            'street'=>$request->street,
            'account_number'=>$request->account_number,
            'name_bank'=>$request->name_bank,
            'statement'=>$request->statement,
            'name_user'=>$request->name_user,
            'password1'=>Hash::make($request->password),
            // 'password2'=>Hash::make($request->password2),
            'permission'=>$request->permission
        ]);
        User::create([
            'name'=>$request->name_user,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        session()->flash('Add','تمت اضافة الموظف بنجاح');
        return redirect('Employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        return $employe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return 12345;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    }
    public function deleteEmployees(Request $request){
        $id = $request->id;
        Employe::find($id)->delete();
        session()->flash('delete','تم حذف الموظف بنجاح');
        return redirect('/Employees');
    }
    public function ajax_search(Request $request){
        if($request->ajax()){
            $search_name=$request->search_name;
            $employees=Employe::where('first_name','LIKE',"%{search_name}%")->
            orderBy('id','DESC')->get();
            return view('Employees.Employees.employees',compact('employees'));
        }
    }
    public function editEmployess($id){
        $employe=Employe::where('id',$id)->first();
        return view('Employees.Employees.edit-employe',compact('employe'));
    }
    public function updateEmployees(Request $request){
        $id=$request->id;


        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'no_employee'=>'required|max:20|unique:employes,no_employee,'.$id,
            'date_hiring'=>'required',
            'job_title'=>'required',
            'number_phone1'=>'required',
            // 'email' => 'email:rfc,dns',
            'city'=>'required',
            'district'=>'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'street'=>'required'
        ],[
           'first_name.required'=>'يرجى ادخال اسم الموظف',
           'last_name.required'=>'يرجى ادخال اسم العائلة',
           'no_employee.unique'=>'رقم الموظف موجود مسبقأ',
           'date_hiring.required'=>'يرجى ادخال عدد الثياب',
           'no_employee.required'=>'يرجى ادخال رقم الموظف',
           'number_phone1.required'=>'يرجى ادخال رقم الهاتف',
        //    'email.email'=>'يجب ان يكون الايميل صالحا',
           'number_phone1.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
           'job_title.required'=>'يرجى ادخال المسمى الوظيفي',
           'city.required'=>'يرجى ادخال  اسم المدينة',
           'street.required'=>'يرجى ادخال  اسم الشارع',
           'district.required'=>'يرجى ادخال  اسم الحي'


        ]);
        Employe::find($id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'no_employee'=>$request->no_employee,
            'date_hiring'=>$request->date_hiring,
            'job_title'=>$request->job_title,
            'number_phone1'=>$request->number_phone1,
            'number_phone2'=>$request->number_phone2,
            'email'=>$request->email,
            'city'=>$request->city,
            'district'=>$request->district,
            'street'=>$request->street,
            'account_number'=>$request->account_number,
            'name_bank'=>$request->name_bank,
            'statement'=>$request->statement,
            'name_user'=>$request->name_user,
            'password1'=>bcrypt($request->password1),
            // 'password2'=>bcrypt($request->password2),
            'permission'=>$request->permission
        ]);
        session()->flash('edit','تمت تعديل الموظف بنجاح');
        $employees=Employe::all();
        return view('Employees.Employees.employees',compact('employees'));
    }
     public function editprofile(Request $request){
        $id=$request->id;
        if(!empty($request->password)){
            $validatedData = $request->validate([

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],]);
            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ]);
            return redirect('/');

        }else{

            $validatedData = $request->validate([
            'email' => [ 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            ]);
            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,]);

                return redirect('/');


        }

        return $request;

     }

}
