@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 200px;
            height: 150px;
            background-color:aliceblue;
            margin: auto;
        }

        .swiper-wrapper {
            width: 200px;
            height: 200px;
            margin: auto;
            /* number-align: center; */
        }

        img {
            width: 120px;
            height: 120px;
            margin-top: 17%;


        }
    </style>
    <style>
        .showimg {
            display: inline-block;
            width: 200px;

        }

        #sin td input class="form-control" {
            width: 100px;
        }

        td {
            /* number-align: center */
        }

        #idleft {
            display: inline-block;
            float: left;
            width: 20%;
            /* background-color: aliceblue; */
        }

        #idhight {
            display: inline-block;
            text-align: center;
            float: right;
            width: 20%;
            padding: 20px;
            /* background-color:aliceblue; */
        }

        #inp {
            width: 30px;
        }

        #tdin input class="form-control" {
            width: 50px;

        }

        #idcen {
            display: inline-block;
            direction: rtl;
            width: 60%;
            padding-top: 20px;
            /* background-color:aliceblue; */
        }

        #radio {
            /* display: block; */
            padding: 10px;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المبيعات</h4><span class="number-muted mt-1 tx-13 mr-2 mb-0">/ نقطة البيع</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <!--div-->

        <form action="{{ route('Sale-menu-update') }}" method="POST">
            @csrf
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            بيانت العميل
                        </div>
                        <div class="row row-sm">
                            <input class="form-control" type="hidden" name="customer_id"  value="{{$info_size_customer->customer->id}}">
                            <input class="form-control" type="hidden" name="size_id"  value="{{$info_size_customer->id}}">
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    اسم العميل : <input class="form-control" type="text" name="name_customer" placeholder="اسم العميل" value="{{$info_size_customer->customer->name}}">
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    رقم الجوال <input class="form-control" type="number" name="phone" placeholder="رقم الجوال" value="{{$info_size_customer->customer->phone}}">
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    كود العميل<input class="form-control" type="number" name="code" placeholder="كود العميل" value="{{$info_size_customer->customer->code}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    عدد الثياب <input class="form-control" type="number" name="number_dresses" id="number_dresses"
                                        placeholder="عدد الثياب"  value="{{$info_size_customer->customer->number_dresses}}">
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    مدة التفصيل <input class="form-control" type="number" name="detail_duration" placeholder="مدة التفصيل"  value="{{$info_size_customer->customer->detail_duration}}">
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">

                                <div class="input class="form-control"-group">

                                    التاريخ م <input class="form-control" type="date" name="date"  value="{{$info_size_customer->customer->date}}" >
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">

                                <div class="input class="form-control"-group">

                                    الوقت<input class="form-control" type="time" name="time"  value="{{$info_size_customer->customer->time}}">
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                @php
                                    // $number_invoice=!empty(\App\Models\Customer::latest()->first()->invoice_number)?0002:002;
                                    // $number_invoice=!empty($number_invoice)?$number_invoice=\App\Models\Customer::latest()->first()->invoice_number:null;
                                    // $number_invoice=!empty($number_invoice)?$number_invoice:0000;
                                    // $number_invoice=str_pad($number_invoice+1, 5, 0, STR_PAD_LEFT);
                                    // dd($number_invoice);
                                @endphp
                                <div class="input class="form-control"-group">
                                    رقم الفاتورة<input class="form-control" type="number" name="invoice_number"  value="{{$info_size_customer->customer->invoice_number}}" placeholder="رقم الفاتورة" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->

            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            معلومات المقاسات
                        </div>
                        <div class="row col-4">
                        </div>
                        <hr>
                        <table>
                            <tr id="sin">
                                <td>
                                    <label for="">الطول</label><br>
                                    <input class="form-control" type="number" name="height" placeholder="الطول"  value="{{$info_size_customer->height}}">
                                </td>
                                <td>
                                    <label for="">الكتف</label><br>
                                    <input class="form-control" type="number" name="shoulder" placeholder="الكتف" value="{{$info_size_customer->shoulder}}">
                                </td>
                                <td>
                                    <label for="">طول الكتف</label><br>
                                    <input class="form-control" type="number" name="shoulder_leight" placeholder="طول الكتف" value="{{$info_size_customer->shoulder_leight}}">
                                </td>
                                <td>
                                    <label for="">الصدر</label><br>
                                    <input class="form-control" type="number" name="brest" placeholder="الصدر" value="{{$info_size_customer->brest}}">
                                </td>
                                <td>
                                    <label for="">وسع الصدر </label><br>
                                    <input class="form-control" type="number" name="expand_brest" placeholder="وسع الصدر" value="{{$info_size_customer->expand_brest}}">
                                </td>
                                <td>
                                    <label for="">الرقبة</label><br>
                                    <input class="form-control" type="number" name="neck" placeholder="الرقبة"  value="{{$info_size_customer->neck}}">
                                </td>
                                <td>
                                    <label for="">وسع اليد</label><br>
                                    <input class="form-control" type="number" name="expand_hand" placeholder="وسع اليد" value="{{$info_size_customer->expand_hand}}">
                                </td>
                                <td>
                                    <label for="">اسفل اليد</label><br>
                                    <input class="form-control" type="number" name="down_hand" placeholder="اسفل اليد" value="{{$info_size_customer->down_hand}}">
                                </td>
                                <td>
                                    <label for="">طول الكبك</label><br>
                                    <input class="form-control" type="number" name="cbk_leight" placeholder="طول الكبك" value="{{$info_size_customer->cbk_leight}}">
                                </td>
                                <td>
                                    <label for="">عرض الكبك</label><br>
                                    <input class="form-control" type="number" name="cbk_width" placeholder="عرض الكبك" value="{{$info_size_customer->cbk_width}}">
                                </td>
                            </tr>
                            <tr id="sin">
                                <td>
                                    <label for="">طول الجيب</label>
                                    <input class="form-control" type="number" name="pocket_leight" placeholder="طول الجيب" value="{{$info_size_customer->pocket_leight}}">
                                </td>
                                <td>
                                    <label for="">وسع الجيب</label>
                                    <input class="form-control" type="number" name="pocket_expand" placeholder="وسع الجيب" value="{{$info_size_customer->pocket_expand}}">
                                </td>
                                <td>
                                    <label for="">وسع اسفل</label>
                                    <input class="form-control" type="number" name="down_expand" placeholder="وسع اسفل" value="{{$info_size_customer->down_expand}}">
                                </td>
                                <td>
                                    <label for="">كفة اسفل</label>
                                    <input class="form-control" type="number" name="down_desist" placeholder="كفة اسفل" value="{{$info_size_customer->down_desist}}">
                                </td>
                            </tr>
                        </table><br>
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">


                        <div id="idleft">
                            <div class="radio">
                                <button class="btn btn-info"><a href="{{ route('Sale-point.create') }}" style="color: white"> اضافة
                                        طلب</a></button><br>
                                {{-- <button><a href="#"> اضافة مرافق</a></button> --}}

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="idhight">
                                <center>
                                    <table>
                                        <tr>
                                            <td>
                                                <label for="">نوع التصميم</label><br>
                                                <select class="form-control" name="name_design" id="">
                                                    <option value="{{$info_size_customer->design->id}}">{{$info_size_customer->design->name_design}}</option>
                                                    @foreach ($designs as $design)
                                                        <option value="{{ $design->id }}">{{ $design->name_design }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    {{-- <input class="form-control" type="number" id="invalue"> --}}

                                    <label for="">القسم</label><br>
                                    <select class="form-control" name="name_section" id="name_section">
                                        <option value="{{$info_size_customer->design->id}}">{{$info_size_customer->design->name_design}}</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name_section }}</option>
                                        @endforeach
                                    </select>
                                    <table>
                                        <tr>
                                            <td>
                                                <label for="">القماش</label><br>
                                                <select class="form-control" name="type_fabrice" id="">
                                                    <option value="{{$info_size_customer->design->id}}">{{$info_size_customer->design->name_design}}</option>
                                                    @foreach ($fabrices as $fabrice)
                                                        <option value="{{ $fabrice->id }}">{{ $fabrice->type_fabrice }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        <tr>
                                            <td>
                                                <label for="">اللون القماش</label><br>
                                                <select class="form-control" name="color_fabrice" id="">
                                                    <option value="{{$info_size_customer->design->id}}">{{$info_size_customer->design->name_design}}</option>
                                                    @foreach ($fabrices as $fabrice)
                                                        <option value="{{ $fabrice->id }}">{{ $fabrice->color_fabrice }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        <tr>
                                            <td>
                                                <label for="">العلامة التجارية</label><br>
                                                <select class="form-control" name="name_trade_mark" id="">
                                                    <option value="{{$info_size_customer->tradeMark->id}}">{{$info_size_customer->tradeMark->name_trade_mark}}</option>
                                                    @foreach ($trademarks as $trademark)
                                                        <option value="{{ $trademark->id }}">
                                                            {{ $trademark->name_trade_mark }}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                        </tr>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">اسم القصاص</label><br>
                                                <select class="form-control" name="retribution" id="">
                                                    <option value="{{$info_size_customer->retribution->id}}">{{$info_size_customer->retribution->name}}</option>
                                                    @foreach ($retributions as $retribution)
                                                        <option value="{{ $retribution->id }}">{{ $retribution->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">اسم الخياط</label><br>
                                                <select class="form-control" name="seamoer" id="">
                                                    <option value="{{$info_size_customer->seamoer->id}}">{{$info_size_customer->seamoer->name}}</option>
                                                    @foreach ($seamoers as $seamoer)
                                                        <option value="{{ $seamoer->id }}">{{ $seamoer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <label for="">السعر شامل الضريبة</label>
                                    <input class="form-control" type="number" name="price_include_tax" id="price_tax"
                                        onchange="myfunction()" value="{{$info_size_customer->price_include_tax}}">
                                    <label for="">السعر غير شامل الضريبة</label>
                                    <input class="form-control" type="number" name="price_doesnot_include_tax" id="tax" readonly  value="{{$info_size_customer->price_doesnot_include_tax}}">
                                    <label for="">قيمة الضريبة</label>
                                    <input class="form-control" type="number" name="value_tax" id="value_tax" readonly  value="{{$info_size_customer->value_tax}}">
                                    <label for="">الخصم</label>
                                    <input class="form-control" type="number" name="discount" id="discount" onchange="myFunDiscount()" value="{{$info_size_customer->discount}}">
                                    <label for="">السعر بعد الخصم شامل الضريبة</label>
                                    <input class="form-control" type="number" name="afterdiscount" id="afterdiscount" value="{{$info_size_customer->afterdiscount}}" readonly>
                                    <label for="">المبلغ المستلم</label>
                                    <input class="form-control" type="number" name="receivedamount" id="receivedamount"
                                        onchange="myFunReceivedamount()" value="{{$info_size_customer->receivedamount}}">
                                    <label for="">المبلغ المتبقي</label>
                                    <input class="form-control" type="number" name="remainingamount" id="remainingamount" readonly value="{{$info_size_customer->remainingamount}}">
                                    <label for="">نوع الدفع</label>
                                    <select class="form-control" name="payment" id="" >
                                        <option value="{{$info_size_customer->payment}}">{{$info_size_customer->payment}}</option>
                                        <option value="نقدا">نقدا</option>
                                        <option value="">شبكة</option>
                                    </select><br>
                                    <label for="">الملاحظات</label>
                                    <textarea  class="form-control" name="notes" id="" cols="20" rows="2" placeholder="ملاحظات" > {{$info_size_customer->notes}}</textarea>
                                    </table>
                                </center>
                            </div>

                            <div id="idcen">
                                <center>
                                    <section>
                                        <h1 style="number-align: center">الثوب الاول</h1>

                                        <div class="showimg">
                                            <h4>الرقبة</h4>
                                            <select class="form-control" name="image_neck" id="imgselect2" onchange="imageSelect2()">
                                                <option value="{{$info_size_customer->image_neck}}"></option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/6.jpg') }}">6</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/7.jpg') }}">7</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/8.jpg') }}">8</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/9.jpg') }}">9</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/10.jpg') }}">10</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/11.jpg') }}">11</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/12.jpg') }}">12</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="220px" height="200px" id="image_neck">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_neck" value="{{$info_size_customer->size_neck}}">

                                        </div>
                                        <div class="showimg">
                                            @php
                                                // dd($info_size_customer->imagecbk);
                                            @endphp
                                            <h4>الكبك</h4>
                                            <select class="form-control" name="imagecbk" id="imgselect1" onchange="imageSelect1()">
                                                <option value="{{$info_size_customer->image_cbk}}"></option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/6.jpg') }}">6</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/7.jpg') }}">7</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/8.jpg') }}">8</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="120px" height="200px" id="Imgcbk">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_cbk" value="{{$info_size_customer->size_cbk}}">

                                        </div>
                                        <div class="showimg">
                                            <h4>جيب الصدر</h4>
                                            <select class="form-control" name="image_brest_pocket" id="imgselect3" onchange="imageSelect3()">
                                                <option value="{{$info_size_customer->image_brest_pocket}}"></option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/6.jpg') }}">6</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/7.jpg') }}">7</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/8.jpg') }}">8</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/4.jpg') }}">9</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/5.jpg') }}">10</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/6.jpg') }}">11</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/7.jpg') }}">12</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/8.jpg') }}">13</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="120px" height="200px" id="image_brest_pocket">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_brest_pocket" value="{{$info_size_customer->size_brest_pocket}}">

                                        </div>
                                        <div class="showimg">
                                            <h4>الجيب</h4>
                                            <select class="form-control" name="image_pocket" id="imgselect4" onchange="imageSelect4()">
                                                <option value="{{$info_size_customer->image_pocket}}"></option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/6.jpg') }}">6</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="120px" height="200px" id="image_pocket">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_pocket" value="{{$info_size_customer->size_pocket}}">

                                        </div>
                                        <div class="showimg">
                                            <h4>الجيزور</h4>
                                            <select class="form-control" name="image_algizour" id="imgselect5" onchange="imageSelect5()">
                                                <option value="{{$info_size_customer->image_algizour}}"></option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/6.jpg') }}">6</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/7.jpg') }}">7</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/8.jpg') }}">8</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/9.jpg') }}">9</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/10.jpg') }}">10</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/11.jpg') }}">11</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/12.jpg') }}">12</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/13.jpg') }}">13</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/14.jpg') }}">14</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/15.jpg') }}">15</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="120px" height="200px" id="image_algizour">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_algizour" value="{{$info_size_customer->size_algizour}}">

                                        </div>
                                    </section>
                                </center>
                            </div>
                            <div id="idleft">
                                <div class="radio">
                                    {{-- <form action=""> --}}
                                    <label for="">نوع الخياطة</label><br>
                                    <datalist id="list">
                                        <option value="{{$info_size_customer->seamtress}}">{{$info_size_customer->seamtress}}</option>
                                        <option>حباكة</option>
                                        <option>مبروم</option>
                                        <option>جينز</option>
                                        <option>مخفي</option>
                                        <option> ج باين</option>
                                        <option>ج</option>

                                    </datalist>
                                    <input class="form-control"  autocomplete="on"  name="seamtress" list="list" placeholder="نوع الخياطة" value="{{$info_size_customer->seamtress}}">
                                    {{-- </form> --}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <button class="btn ripple btn-primary" type="submit"
                    style="margin-right: 95%; margin-bottom:10%">تعديل</button>
                {{-- </div> --}}
        </form>
        {{-- //////////////////////////////////////////// --}}


    </div>
    {{-- <div class="row" style="margin: 20%">
        {{ QrCode::generate('hi omar') }}
    </div> --}}
    <!-- row closed -->
    {{-- <div style="number-align: left;"> --}}

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Owl Carousel js-->
    <script src="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <!---Internal  Multislider js-->
    <script src="{{ URL::asset('assets/plugins/multislider/multislider.js') }}"></script>
    <script src="{{ URL::asset('assets/js/carousel.js') }}"></script>
    <script>
      var imgselect1=document.getElementById('imgselect1').value;
        document.getElementById('Imgcbk').src=imgselect1;
        function imageSelect1(){
        var imgselect1=document.getElementById('imgselect1').value;
        document.getElementById('Imgcbk').src=imgselect1;

        }
      var imgselect2=document.getElementById('imgselect2').value;
        document.getElementById('image_neck').src=imgselect2;
        function imageSelect2(){
        var imgselect2=document.getElementById('imgselect2').value;
        document.getElementById('image_neck').src=imgselect2;

        }
      var imgselect3=document.getElementById('imgselect3').value;
        document.getElementById('image_brest_pocket').src=imgselect3;
        function imageSelect3(){
        var imgselect3=document.getElementById('imgselect3').value;
        document.getElementById('image_brest_pocket').src=imgselect3;

        }
      var imgselect4=document.getElementById('imgselect4').value;
        document.getElementById('image_pocket').src=imgselect4;
        function imageSelect4(){
        var imgselect4=document.getElementById('imgselect4').value;
        document.getElementById('image_pocket').src=imgselect4;

        }
      var imgselect5=document.getElementById('imgselect5').value;
        document.getElementById('image_algizour').src=imgselect5;
        function imageSelect5(){
        var imgselect5=document.getElementById('imgselect5').value;
        document.getElementById('image_algizour').src=imgselect5;

        }



    </script>
    <script>
function myAddRequiest(){
        var number_dresses=document.getElementById('number_dresses').value;
        if (number_dresses >1) {
            alert('هل تريد ضافة جديد ؟');

        } else {
            alert('يرجى مراجعة عدد الثياب');

        }
    }

    function myfunction() {
            var price_tax = parseFloat(document.getElementById("price_tax").value);
            var result = price_tax * 15 /100;
            var value_tax=price_tax-result;
            var value_tax=parseFloat(value_tax).toFixed(2);
            var result = parseFloat(result).toFixed(2);
            document.getElementById('value_tax').value=result;
            document.getElementById('tax').value = value_tax;

        }

    function myFunDiscount() {
            var price_tax = parseFloat(document.getElementById("tax").value);
            var discount = parseFloat(document.getElementById("discount").value);
            var result = price_tax - discount;
            // alert(result);
            var value_tax = result * 15 /100;
            var afterdiscount=result+value_tax;

            var value_tax=parseFloat(value_tax).toFixed(2);
            var result = parseFloat(result).toFixed(2);
            document.getElementById('value_tax').value=value_tax;
            document.getElementById('tax').value = result;
            document.getElementById('afterdiscount').value = afterdiscount;

        }

        function myFunReceivedamount() {
            var afterdiscount = parseFloat(document.getElementById("afterdiscount").value);
            var receivedamount = parseFloat(document.getElementById("receivedamount").value);
            var result = afterdiscount - receivedamount;
            var result = parseFloat(result).toFixed(2);
            document.getElementById('remainingamount').value = result;

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,

            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },


        });
    </script>
@endsection
