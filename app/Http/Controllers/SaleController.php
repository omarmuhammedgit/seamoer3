<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\design;
use App\Models\Fabrics;
use App\Models\Retribution;
use App\Models\Sale;
use App\Models\Seamoer;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Size;
use App\Models\TradeMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prgayman\Zatca\Facades\Zatca;
use Prgayman\Zatca\Utilis\QrCodeOptions;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();
        $sizes=Size::all();
        return view('Sales.SaleMenu.salmenu',compact('customers','sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sales.SaleReference.salereference');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $customer_id=Customer::latest()->first()->id;
        $id=$request->customer;
        // dd($id);

        $validatedData = $request->validate([
            'customer' => 'required|max:255',
            'invoice_number'=>'required|max:20',
            'number_dresses'=>'required',
            'detail_duration'=>'required',
            'code'=>'required',
            'price_include_tax'=>'required',
            'receivedamount'=>'required',
            'seamtress'=>'required',
            'retribution'=>'required',
            'seamoer'=>'required',
        ],[
           'customer.required'=>'يرجى ادخال اسم العميل',
           'invoice_number.required'=>'يرجى ادخال رقم الفاتورة',
           'phone.required'=>'يرجى ادخال رقم الهاتف',
           'phone.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
           'number_dresses.required'=>'يرجى ادخال  عدد  الثياب',
           'detail_duration.required'=>'يرجى ادخال  مدة التفصيل',
           'code.required'=>'يرجى ادخال  كود العميل',
        'retribution.required'=>'يرجى ادخال اسم القصاص',
           'seamoer.required'=>'يرجى ادخال اسم الخياط',
           'price_include_tax.required'=>'يرجى ادخال  المبيلغ شامل الضريبة',
           'discount.required'=>'يرجى ادخال  قمية الخصم',
           'receivedamount.required'=>'يرجى ادخال  المبلغ المستلم',
           'seamtress.required'=>'يرجى اختيار نوع الخياطة',




        ]);

        $detail_duration=$request->detail_duration;
        $time=time()+($detail_duration *24 *60 *60);
        $receved_data=date("Y/m/d",$time);

        Size::create([
            'invoice_number'=>$request->invoice_number,
            'number_dresses'=>$request->number_dresses,
            'detail_duration'=>$request->detail_duration,
            'date'=>$request->date,
            'height'=>$request->height,
            'shoulder'=>$request->shoulder,
            'shoulder_leight'=>$request->shoulder_leight,
            'brest'=>$request->brest,
            'expand_brest'=>$request->expand_brest,
            'neck'=>$request->neck,
            'expand_hand'=>$request->expand_hand,
            'down_hand'=>$request->down_hand,
            'cbk_leight'=>$request->cbk_leight,
            'cbk_width'=>$request->cbk_width,
            'pocket_leight'=>$request->pocket_leight,
            'pocket_expand'=>$request->pocket_expand,
            'down_expand'=>$request->down_expand,
            'down_desist'=>$request->down_desist,
            'image_neck'=>$request->image_neck,
            'image_cbk'=>$request->imagecbk,
            'image_brest_pocket'=>$request->image_brest_pocket,
            'image_pocket'=>$request->image_pocket,
            'image_algizour'=>$request->image_algizour,
            'seamtress'=>$request->seamtress,
            'customer_id'=>$request->customer,
            'seamoer_id'=>$request->seamoer,
            'retribution_id'=>$request->retribution,
            'design'=>$request->name_design,
            'fabric'=>$request->type_fabrice,
            'section'=>$request->name_section,
            'trade_mark'=>$request->name_trade_mark,
            'size_neck'=>$request->size_neck,
            'size_cbk'=>$request->size_cbk,
            'size_brest_pocket'=>$request->size_brest_pocket,
            'size_pocket'=>$request->size_pocket,
            'size_algizour'=>$request->size_algizour,
            'price_include_tax'=>$request->price_include_tax,
            'price_doesnot_include_tax'=>$request->price_doesnot_include_tax,
            'value_tax'=>$request->value_tax,
            'notes'=>$request->notes,
            'discount'=>$request->discount,
            'afterdiscount'=>$request->afterdiscount,
            'receivedamount'=>$request->receivedamount,
            'remainingamount'=>$request->remainingamount,
            'payment'=>$request->payment,
            'receved_data'=>$receved_data,

        ]);
        session()->flash('Add','تمت اضافة البيانات بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
    public function printInvoice($id){
        class_alias(\Prgayman\Zatca\Facades\Zatca::class, 'Zatca');

        $info_size_customer=Size::where('id',$id)->first();
        $info_size_customer_id=Size::where('id',$id)->first()->customer_id;
        $info_size_customers=Size::where('customer_id',$info_size_customer_id)->get();
        $discount=Size::where('customer_id',$info_size_customer_id)->sum('discount');
        $price_include_tax=Size::where('customer_id',$info_size_customer_id)->sum('afterdiscount');
        $price_doesnot_include_tax=Size::where('customer_id',$info_size_customer_id)->sum('price_doesnot_include_tax');
        $value_tax=Size::where('customer_id',$info_size_customer_id)->sum('value_tax');
        $receivedamount=Size::where('customer_id',$info_size_customer_id)->sum('receivedamount');
        $remainingamount=Size::where('customer_id',$info_size_customer_id)->sum('remainingamount');
        $price=Size::where('customer_id',$info_size_customer_id)->sum('discount');

        $createBy=auth()->user()->name;
        $setting=Setting::where('created_by',$createBy)->first();

        // $info_size_customers= DB::table("sizes")->where('customer_id',$info_size_customer_id)->get();



        return view('Invoices.invoices',compact('setting',
            'info_size_customer','info_size_customers','discount',
            'price_include_tax','price_doesnot_include_tax',
            'value_tax','receivedamount','remainingamount'
        ));
        // // return $price;

    }
    public function editSale($id)
    {
        $info_size_customer=Size::where('id',$id)->first();
        $customers=Customer::all();
        $designs=design::all();
        $sections=Section::all();
        $fabrices=Fabrics::all();
        $trademarks=TradeMark::all();
        $retributions=Retribution::all();
        $seamoers=Seamoer::all();
        return view('Sales.Selling-point.edit-selling-point',
        compact('customers','info_size_customer','designs','sections','fabrices','trademarks','retributions','seamoers'));
    }
    public function updateSale(Request $request)
    {
        $size=$request->size;
        //

        $validatedData = $request->validate([
            'customer' => 'required|max:255',
            'invoice_number'=>'required|max:20',
            'number_dresses'=>'required',
            'detail_duration'=>'required',
            'code'=>'required',
            'price_include_tax'=>'required',
            'discount'=>'required',
            'receivedamount'=>'required',
            'retribution'=>'required',
            'seamoer'=>'required',
            'seamtress'=>'required',
        ],[
           'customer.required'=>'يرجى ادخال اسم العميل',
           'invoice_number.required'=>'يرجى ادخال رقم الفاتورة',
           'phone.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
           'number_dresses.required'=>'يرجى ادخال  عدد  الثياب',
           'detail_duration.required'=>'يرجى ادخال  مدة التفصيل',
           'code.required'=>'يرجى ادخال  كود العميل',
           'price_include_tax.required'=>'يرجى ادخال  المبيلغ شامل الضريبة',
           'discount.required'=>'يرجى ادخال  قمية الخصم',
           'receivedamount.required'=>'يرجى ادخال  المبلغ المستلم',
           'name_design.required'=>'يرجى ادخال اسم التصميم',
           'name_section.required'=>'يرجى ادخال اسم القسم',
           'type_fabrice.required'=>'يرجى ادخال نوع القماش',
           'name_trade_mark.required'=>'يرجى ادخال اسم العلامة التجارية',
           'retribution.required'=>'يرجى ادخال اسم القصاص',
           'seamoer.required'=>'يرجى ادخال اسم الخياط',
           'seamtress.required'=>'يرجى اختيار نوع الخياطة',
           'discount.required'=>'يرجى ادخال قيمة الخصم حتى و لو  صفر'



        ]);


        $detail_duration=$request->detail_duration;
        $time=time()+($detail_duration *24 *60 *60);
        $receved_data=date("Y/m/d",$time);


        $size_id=$request->size_id;
        Size::find($size_id)->update([
            'invoice_number'=>$request->invoice_number,
            'number_dresses'=>$request->number_dresses,
            'detail_duration'=>$request->detail_duration,
            'date'=>$request->date,
            'height'=>$request->height,
            'shoulder'=>$request->shoulder,
            'shoulder_leight'=>$request->shoulder_leight,
            'brest'=>$request->brest,
            'expand_brest'=>$request->expand_brest,
            'neck'=>$request->neck,
            'expand_hand'=>$request->expand_hand,
            'down_hand'=>$request->down_hand,
            'cbk_leight'=>$request->cbk_leight,
            'cbk_width'=>$request->cbk_width,
            'pocket_leight'=>$request->pocket_leight,
            'pocket_expand'=>$request->pocket_expand,
            'down_expand'=>$request->down_expand,
            'down_desist'=>$request->down_desist,
            'image_neck'=>$request->image_neck,
            'image_cbk'=>$request->imagecbk,
            'image_brest_pocket'=>$request->image_brest_pocket,
            'image_pocket'=>$request->image_pocket,
            'image_algizour'=>$request->image_algizour,
            'seamtress'=>$request->seamtress,
            'customer_id'=>$request->customer,
            'seamoer_id'=>$request->seamoer,
            'retribution_id'=>$request->retribution,
            'design'=>$request->name_design,
            'fabric'=>$request->type_fabrice,
            'section'=>$request->name_section,
            'trade_mark'=>$request->name_trade_mark,
            'size_neck'=>$request->size_neck,
            'size_cbk'=>$request->size_cbk,
            'size_brest_pocket'=>$request->size_brest_pocket,
            'size_pocket'=>$request->size_pocket,
            'size_algizour'=>$request->size_algizour,
            'price_include_tax'=>$request->price_include_tax,
            'price_doesnot_include_tax'=>$request->price_doesnot_include_tax,
            'value_tax'=>$request->value_tax,
            'notes'=>$request->notes,
            'discount'=>$request->discount,
            'afterdiscount'=>$request->afterdiscount,
            'receivedamount'=>$request->receivedamount,
            'remainingamount'=>$request->remainingamount,
            'payment'=>$request->payment,
            'receved_data'=>$receved_data

        ]);
        session()->flash('edit','تم تعديل البيانات بنجاح');
        $sizes=Size::all();
        return view('Sales.SaleMenu.salmenu',compact('sizes'));
    }
    public function deleteSale(Request $request)
    {
        $customer_id=$request->customer_id;
        Customer::find($customer_id)->delete();
        session()->flash('delete','تم حذف البيانات بنجاح');
        return redirect('/Sale-menu');
    }
     public function updateCal(Request $request){
        $id =$request->id;
        Size::where('id',$id)->update([
            'receivedamount'=>$request->remainingamount,
            'remainingamount'=>$request->receivedamount
        ]);
        session()->flash('edit','تم تحديث البيانات بنجاح');
        return redirect('/Sale-menu');
     }
}
