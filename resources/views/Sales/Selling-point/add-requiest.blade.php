@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 200px;
            height: 150px;
            background-color: azure;
            margin: auto;
        }

        .swiper-wrapper {
            width: 200px;
            height: 200px;
            margin: auto;
            number-align: center;
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

        #sin td input {
            width: 100px;
        }

        td {
            number-align: center
        }

        #idleft {
            display: inline-block;
            float: left;
            width: 20%;
            /* background-color: aliceblue; */
        }

        #idhight {
            display: inline-block;
            number-align: center;
            float: right;
            width: 20%;
            padding: 20px;
            /* background-color: bisque; */
        }

        #inp {
            width: 30px;
        }

        #tdin input {
            width: 50px;

        }

        #idcen {
            display: inline-block;
            direction: rtl;
            width: 60%;
            padding-top: 20px;
            /* background-color: azure; */
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

        <form action="{{ route('Sale-menu.store') }}" method="POST">
            @csrf
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            بيانت العميل
                        </div>
                        <div class="row row-sm">

                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input-group">
                                    اسم العميل : <input type="text" value="{{$customer->name}}" name="name_customer" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input-group">
                                    رقم الجوال <input type="number" name="phone" value="{{$customer->phone}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input-group">
                                    كود العميل<input type="number" name="code" value="{{$customer->code}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input-group">
                                    عدد الثياب <input type="number" name="number_dresses" value="{{$customer->number_dresses}}">
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input-group">
                                    مدة التفصيل <input type="number" name="detail_duration" value="{{$customer->detail_duration}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <br>
                                <div class="input-group">

                                    التاريخ م <input type="date" name="date" value="{{$customer->date}}" required>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <br>
                                <div class="input-group">

                                    الوقت<input type="time" name="time" value="{{$customer->time}}" required>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input-group">
                                    رقم الفاتورة<input type="number" name="number_invoice" value="2" readonly>
                                </div>
                                {{-- <div class="input-group">
                                    عدد الطلبات<input type="number" name="number_requiest" value="{{$customer->number_requiest}}">
                                </div> --}}
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
                                    <input type="number" name="height" placeholder="الطول">
                                </td>
                                <td>
                                    <label for="">الكتف</label><br>
                                    <input type="number" name="shoulder" placeholder="الكتف">
                                </td>
                                <td>
                                    <label for="">طول الكتف</label><br>
                                    <input type="number" name="shoulder_leight" placeholder="طول الكتف">
                                </td>
                                <td>
                                    <label for="">الصدر</label><br>
                                    <input type="number" name="brest" placeholder="الصدر">
                                </td>
                                <td>
                                    <label for="">وسع الصدر </label><br>
                                    <input type="number" name="expand_brest" placeholder="وسع الصدر">
                                </td>
                                <td>
                                    <label for="">الرقبة</label><br>
                                    <input type="number" name="neck" placeholder="الرقبة">
                                </td>
                                <td>
                                    <label for="">وسع اليد</label><br>
                                    <input type="number" name="expand_hand" placeholder="وسع اليد">
                                </td>
                                <td>
                                    <label for="">اسفل اليد</label><br>
                                    <input type="number" name="down_hand" placeholder="اسفل اليد">
                                </td>
                                <td>
                                    <label for="">طول الكبك</label><br>
                                    <input type="number" name="cbk_leight" placeholder="طول الكبك">
                                </td>
                                <td>
                                    <label for="">عرض الكبك</label><br>
                                    <input type="number" name="cbk_width" placeholder="عرض الكبك">
                                </td>
                            </tr>
                            <tr id="sin">
                                <td>
                                    <label for="">طول الجيب</label>
                                    <input type="number" name="pocket_leight" placeholder="طول الجيب">
                                </td>
                                <td>
                                    <label for="">وسع الجيب</label>
                                    <input type="number" name="pocket_expand" placeholder="وسع الجيب">
                                </td>
                                <td>
                                    <label for="">وسع اسفل</label>
                                    <input type="number" name="down_expand" placeholder="وسع اسفل">
                                </td>
                                <td>
                                    <label for="">كفة اسفل</label>
                                    <input type="number" name="down_desist" placeholder="كفة اسفل">
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
                                <button ><a href="{{ route('Sale-point.create') }}"> اضافة
                                        طلب</a></button><br>
                                {{-- <button onclick="myalert()"><a href="#"> اضافة مرافق</a></button> --}}

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
                                                <select name="name_design" id="">
                                                    @foreach ($designs as $design)
                                                        <option value="{{ $design->id }}">{{ $design->name_design }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    {{-- <input type="number" id="invalue"> --}}

                                    <label for="">القسم</label><br>
                                    <select name="name_section" id="name_section">
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name_section }}</option>
                                        @endforeach
                                    </select>
                                    <table>
                                        <tr>
                                            <td>
                                                <label for="">القماش</label><br>
                                                <select name="type_fabrice" id="">
                                                    @foreach ($fabrices as $fabrice)
                                                        <option value="{{ $fabrice->id }}">{{ $fabrice->type_fabrice }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        <tr>
                                            <td>
                                                <label for="">اللون القماش</label><br>
                                                <select name="color_fabrice" id="">
                                                    @foreach ($fabrices as $fabrice)
                                                        <option value="{{ $fabrice->id }}">{{ $fabrice->color_fabrice }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        <tr>
                                            <td>
                                                <label for="">العلامة التجارية</label><br>
                                                <select name="name_trade_mark" id="">
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
                                                <select name="retribution" id="">
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
                                                <select name="seamoer" id="">
                                                    @foreach ($seamoers as $seamoer)
                                                        <option value="{{ $seamoer->id }}">{{ $seamoer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <label for="">السعر شامل الضريبة</label>
                                    <input type="number" name="price_include_tax" id="price_tax"
                                        onchange="myfunction()">
                                    <label for="">السعر غير شامل الضريبة</label>
                                    <input type="number" name="price_doesnot_include_tax" id="tax" readonly>
                                    <label for="">قيمة الضريبة</label>
                                    <input type="number" name="value_tax" id="value_tax" readonly>
                                    <label for="">الخصم</label>
                                    <input type="number" name="discount" id="discount" onchange="myFunDiscount()">
                                    <label for="">السعر بعد الخصم شامل الضريبة</label>
                                    <input type="number" name="afterdiscount" id="afterdiscount" readonly>
                                    <label for="">المبلغ المستلم</label>
                                    <input type="number" name="receivedamount" id="receivedamount"
                                        onchange="myFunReceivedamount()">
                                    <label for="">المبلغ المتبقي</label>
                                    <input type="number" name="remainingamount" id="remainingamount" readonly>
                                    <label for="">نوع الدفع</label>
                                    <select name="payment" id="">
                                        <option value="" label="نقدا"></option>
                                        <option value="">شبكة</option>
                                    </select><br>
                                    <label for="">الملاحظات</label>
                                    <textarea name="notes" id="" cols="20" rows="2" placeholder="ملاحظات" ></textarea>

                                    </table>
                                </center>
                            </div>
                            <div id="idcen">
                                <center>
                                    <section>
                                        <h1 style="number-align: center">الثوب الثاني</h1>

                                        <div class="showimg">
                                            <h4>الرقبة</h4>
                                            <select name="image_neck" id="imgselect2" onchange="imageSelect2()">
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
                                            <input type="number" placeholder="مقاس" name="size_neck">

                                        </div>
                                        <div class="showimg">
                                            <h4>الكبك</h4>
                                            <select name="imagecbk" id="imgselect1" onchange="imageSelect1()">
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
                                            <input type="number" placeholder="مقاس" name="size_cbk">

                                        </div>
                                        <div class="showimg">
                                            <h4>جيب الصدر</h4>
                                            <select name="image_brest_pocket" id="imgselect3" onchange="imageSelect3()">
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
                                            <input type="number" placeholder="مقاس" name="size_brest_pocket">

                                        </div>
                                        <div class="showimg">
                                            <h4>الجيب</h4>
                                            <select name="image_pocket" id="imgselect4" onchange="imageSelect4()">
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
                                            <input type="number" placeholder="مقاس" name="size_pocket">

                                        </div>
                                        <div class="showimg">
                                            <h4>الجيزور</h4>
                                            <select name="image_algizour" id="imgselect5" onchange="imageSelect5()">
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
                                            <input type="number" placeholder="مقاس" name="size_algizour">

                                        </div>
                                    </section>
                                </center>
                            </div>
                            <div id="idleft">
                                <div class="radio">
                                    {{-- <form action=""> --}}
                                    <label for="">نوع الخياطة</label><br>
                                    <datalist id="list">
                                        <option>حباكة</option>
                                        <option>مبروم</option>
                                        <option>جينز</option>
                                        <option>مخفي</option>
                                        <option> ج باين</option>
                                        <option>ج</option>

                                    </datalist>
                                    <input autocomplete="on" list="list" name="seamtress" placeholder="نوع الخياطة">
                                    {{-- </form> --}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <button class="btn ripple btn-primary" type="submit"
                    style="margin-right: 95%; margin-bottom:10%">حفظ</button>
                {{-- </div> --}}
        </form>
                {{-- //////////////////////////////////////////// --}}


            </div>
            <!-- row closed -->
            {{-- <div style="number-align: left;"> --}}

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
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

    function myfunction(){
            var price_tax = parseFloat(document.getElementById("price_tax").value);
            var result = price_tax / 1.15;
            var value_tax=price_tax-result;
            var value_tax=parseFloat(value_tax).toFixed(2);
            var result = parseFloat(result).toFixed(2);
            document.getElementById('value_tax').value=value_tax;
            document.getElementById('tax').value = result;

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
    function myalert() {
        alert('عفوا هذا الفصل تحت التطوير');

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
