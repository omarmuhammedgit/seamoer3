<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\design;
use App\Models\Fabrics;
use App\Models\Invoice;
use App\Models\Retribution;
use App\Models\Seamoer;
use App\Models\Section;
use App\Models\SellingPoint;
use App\Models\Setting;
use App\Models\Size;
use App\Models\TradeMark;
use Illuminate\Http\Request;

use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Tags\InvoiceDate;
use Salla\ZATCA\Tags\InvoiceTaxAmount;
use Salla\ZATCA\Tags\InvoiceTotalAmount;
use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;


class SellingPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();
        $designs=design::all();
        $sections=Section::all();
        $fabrices=Fabrics::all();
        $trademarks=TradeMark::all();
        $retributions=Retribution::all();
        $seamoers=Seamoer::all();
        return view('Sales.Selling-point.selling-point',
        compact('customers','designs','sections','fabrices','trademarks','retributions','seamoers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_size=Size::latest('id')->first();
        $designs=design::all();
        $sections=Section::all();
        $fabrices=Fabrics::all();
        $trademarks=TradeMark::all();
        $retributions=Retribution::all();
        $seamoers=Seamoer::all();
        return view('Sales.Selling-point.add-requiest'
        ,compact('customer_size','designs','sections','fabrices','trademarks','retributions','seamoers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $id=$request->customer;


            $validatedData = $request->validate([
                'customer' => 'required|max:255',
                'invoice_number'=>'required|max:20',
                'number_dresses'=>'required',
                'detail_duration'=>'required',
                'code'=>'required',
                'price_include_tax'=>'required',
                'receivedamount'=>'required',
            ],[
               'customer.required'=>'???????? ?????????? ?????? ????????????',
               'invoice_number.required'=>'???????? ?????????? ?????? ????????????????',
               'phone.required'=>'???????? ?????????? ?????? ????????????',
               'phone.max'=>'?????? ???? ???????? ?????? ???????????? 10 ??????????',
               'number_dresses.required'=>'???????? ??????????  ??????  ????????????',
               'detail_duration.required'=>'???????? ??????????  ?????? ??????????????',
               'code.required'=>'???????? ??????????  ?????? ????????????',
               'price_include_tax.required'=>'???????? ??????????  ?????????????? ???????? ??????????????',
               'discount.required'=>'???????? ??????????  ???????? ??????????',
               'receivedamount.required'=>'???????? ??????????  ???????????? ??????????????',
               'name_design.required'=>'???????? ?????????? ?????? ??????????????',
               'name_section.required'=>'???????? ?????????? ?????? ??????????',
               'type_fabrice.required'=>'???????? ?????????? ?????? ????????????',
               'name_trade_mark.required'=>'???????? ?????????? ?????? ?????????????? ????????????????',
               'retribution.required'=>'???????? ?????????? ?????? ????????????',
               'seamoer.required'=>'???????? ?????????? ?????? ????????????',
               'seamtress.required'=>'???????? ???????????? ?????? ??????????????',
               'discount.required'=>'???????? ?????????? ???????? ?????????? ?????? ?? ????  ??????'



            ]);
            $detail_duration=$request->detail_duration;
            $time=time()+($detail_duration *24 *60 *60);
            $receved_data=date("Y/m/d",$time);

            Invoice::create([
                'invoice_number'=>$request->invoice_number
            ]);
            $invoice_number=Invoice::latest('id')->first()->id;
            // dd($invoice_number);



            Size::create([

                'customer_id'=>$request->customer,
                'number_dresses'=>$request->number_dresses,
                'detail_duration'=>$request->detail_duration,
                'date'=>$request->date,
                'invoice_id'=>$invoice_number,
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
                'seamoer_id'=>$request->seamoer,
                'retribution_id'=>$request->retribution,
                'design'=>$request->name_design,
                'fabric'=>$request->type_fabrice,
                'section'=>$request->name_section,
                // 'invoice_id'=>$request->invoice,
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
            session()->flash('Add','?????? ?????????? ???????????????? ??????????');


            $id=Size::latest('id')->first()->id;

            $info_size_customer=Size::where('id',$id)->first();
            $info_size_customer_id=Size::where('id',$id)->first()->invoice_id;
            $info_size_customers=Size::where('invoice_id',$info_size_customer_id)->get();
            // dd($info_size_customers);
            $discount=Size::where('invoice_id',$info_size_customer_id)->sum('discount');
            $price_include_tax=Size::where('invoice_id',$info_size_customer_id)->sum('afterdiscount');
            $price_doesnot_include_tax=Size::where('invoice_id',$info_size_customer_id)->sum('price_doesnot_include_tax');
            $value_tax=Size::where('invoice_id',$info_size_customer_id)->sum('value_tax');
            $receivedamount=Size::where('invoice_id',$info_size_customer_id)->sum('receivedamount');
            $remainingamount=Size::where('invoice_id',$info_size_customer_id)->sum('remainingamount');
            $price=Size::where('invoice_id',$info_size_customer_id)->sum('discount');

            $createBy=auth()->user()->name;
            $setting=Setting::where('created_by',$createBy)->first();

     // data:image/png;base64, .........
     $displayQRCodeAsBase64 = GenerateQrCode::fromArray([
        new Seller($setting->name), // seller name
        new TaxNumber($setting->commercial_record), // seller tax number
        new InvoiceDate(date('Y/m/d h:i:s')), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
        new InvoiceTotalAmount($price_include_tax), // invoice total amount
        new InvoiceTaxAmount($value_tax) // invoice tax amount
        // TODO :: Support others tags
    ])->render();



            return view('Invoices.invoices',compact('setting',
                'info_size_customer','info_size_customers','discount',
                'price_include_tax','price_doesnot_include_tax',
                'value_tax','receivedamount','remainingamount','displayQRCodeAsBase64'
            ));
            } catch (\Exception $th) {
            // throw $th;
            return redirect()->back()->with('???????? ?????? ???????? ????');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellingPoint  $sellingPoint
     * @return \Illuminate\Http\Response
     */
    public function show(SellingPoint $sellingPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellingPoint  $sellingPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(SellingPoint $sellingPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellingPoint  $sellingPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellingPoint $sellingPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellingPoint  $sellingPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellingPoint $sellingPoint)
    {
        //
    }
}
