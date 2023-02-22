@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل المنتج</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    <form action="{{route('Products-update')}}" method="POST" style="margin-bottom: 10%">
        @csrf
    <div class="row">
<input type="hidden" name="id" value="{{$product->id}}">
        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        البيانات
                    </div>
                    <div class="row col-4">
                        <table>
                            <tr>
                                <td><label for="">اسم المنتج</label><br>
                                    <input type="text" name="name_product" placeholder="اسم المنتج" value="{{$product->name_product}}" required>
                                </td>
                                <td><label for="">رقم المنتج</label><br>
                                    <input type="text" name="no_product" placeholder="رقم المنتج" required value="{{$product->no_product}}">
                                </td>
                                <td><label for="">موقع الفرع</label><br>
                                    <input type="text" name="sub_site" placeholder="موقع الفرع" required value="{{$product->sub_site}}">
                                </td>
                                <td><label for="">العلامة التجارية</label><br>
                                    <select id="trademark" name="trademark_id">
                                        @php
                                            $collection=[];
                                        @endphp

                                        @foreach ($tradeMarks as $tradeMark)
                                        <option value="{{$tradeMark->id}}">{{$tradeMark->name_trade_mark}}</option>

                                        @endforeach
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td><label for="">القسم</label><br>
                                    <select id="section_id" name="section_id">
                                        @php
                                            $collection=[];
                                        @endphp
                                        @foreach ($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name_section}}</option>

                                        @endforeach
                                    </select>
                                </td>
                                <td><label for="">القسم الفرعي</label><br>
                                    <select  name="sub_section">
                                        @php
                                            $collection=[];
                                        @endphp
                                         <option value="">بدون</option>
                                        @foreach ($collection as $item)
                                        <option value=""></option>

                                        @endforeach
                                    </select>
                                </td>
                                <td><label for="">الوجدة الرئيسية</label><br>
                                    <select id="trademark" name="unit_id">
                                        @php
                                            $collection=[];
                                        @endphp
                                        @foreach ($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name_unit}}</option>

                                        @endforeach
                                    </select>
                                </td>
                                <td><label for="">الوحدة الفرعية</label><br>
                                    <select  name="sub_unit">
                                        @php
                                            $collection=[];
                                        @endphp
                                        <option value="">بدون</option>
                                        @foreach ($collection as $item)
                                        <option value=""></option>

                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">تنبيه الكمية</label><br>
                                    <input type="text" name="quantity_alert" placeholder="تنبيه الكمية" required value="{{$product->quantity_alert}}">
                                </td>
                                <td><label for="">اضافة صورة</label><br>
                                    <input type="file" name="image_product" value="{{$product->image_product}}">
                                </td>


                            </tr>
                        </table>

                    </div>
                    <hr>
                    <div class="main-content-label mg-b-5">
                        <h3>سعر الشراء</h3>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="checkbox-1" name="price_product" onchange="price_product_purchas()">
                        <label class="exampleInputEmail1">
                            <h4>تفعيل ضريبة الشراء (ملاخظة : عند تفعيل الخيار يتم احتساب السعر شامل الضربية )</h4>
                        </label>
                    </div>
                    <div id="price_product_purchas" style="display: none">

                                <div class="form-group">
                                    <label for=""> سعر شامل الضربية</label>
                                    <input type="text" name="price_purchas_include_tax" placeholder="سعر شامل الضريبة" value="{{$product->price_purchas_include_tax}}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for=""> سعر غير شامل الضربية</label>
                                    <input type="text" name="price_purches_doesnot_include_tax" placeholder="سعر غير شامل الضريبة" value="{{$product->price_purches_doesnot_include_tax}}">
                                </div>
                            </td>
                    </div>
                        </tr>
                    </table>
                    <div class="main-content-label mg-b-5">
                        <h3>سعر البيع</h3>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="checkbox-1" name="price_product" onchange="price_product_sale()">
                        <label class="exampleInputEmail1">
                            <h4>تفعيل ضريبة الشراء (ملاخظة : عند تفعيل الخيار يتم احتساب السعر شامل الضربية )</h4>
                        </label>
                    </div>
                    <div id="price_product_sale" style="display: none" >
                    <table>
                        <tr>
                            <td><label for="">سعر شامل الضربية</label><br>
                                <input type="text" name="price_sale_include_tax" placeholder="سعر شامل الضريبة" value="{{$product->price_sale_include_tax}}">
                            </td>
                            <td><label for="">سعر غير شامل الضربية</label><br>
                                <input type="text" name="price_sale_doesnot_include_tax" placeholder="سعر غير شامل الضريبة" value="{{$product->price_sale_doesnot_include_tax}}">
                            </td>
                            <td><label for="">نسبة مئوية /نسبة ثابتة</label><br>
                                <input type="text" name="rale" placeholder="نسبة المئوية" value="{{$product->rale}}">
                            </td>
                            <td><label for="">الاجمالي</label><br>
                                <input type="text" name="total" placeholder="الاجمالي" value="{{$product->total}}">
                            </td>
                        </tr>
                    </table>
                    </div>
                    <div class="main-content-label mg-b-5">
                        <br><br>
                        <h3>محزون الافتتاحي</h3>
                    </div>
                    <table>
                        <tr>
                            <td><label for="">اجمالي الرصيد الافتتاحي</label><br>
                                <input type="number" name="total_opening_balance" placeholder="الرصيد افتتاحي" required value="{{$product->total_opening_balance}}">
                            </td></tr></table>


                </div>

            </div>
            <div class="submit">
                <button type="submit" class="btn btn-primary mt-3 mb-0" style="margin-right: 95%">تعديل</button>

            </div>
        </div>
        </form>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
<script>
    function price_product_sale(){
            document.getElementById("price_product_purchas").style.display='none';
            document.getElementById("price_product_sale").style.display='block';

    }
    function price_product_purchas(){

            document.getElementById("price_product_sale").style.display='none';
            document.getElementById("price_product_purchas").style.display='block';

    }
</script>
@endsection
