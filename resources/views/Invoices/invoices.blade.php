@extends('layouts.master')
@section('css')
    <style>
        .showimg {
            display: inline-block;
            width: 200px;

        }

        #sin td input class="form-control" {
            width: 100px;
        }

        td {
            text-align: center
        }

        .imageleft {
            width: 30%;
            display: inline-block;
            float: left;
        }

        #idleft {
            display: inline-block;
            float: left;
            width: 35%;
            /* background-color: aliceblue; */
        }

        #idhight {
            display: inline-block;
            text-align: center;
            float: right;
            width: 80%;
            padding: 10px;
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
            background-color: azure;
        }

        /* #radio {
            display: block;
            padding: 10px;
            width: 10%;
        } */
        td input {
            width: 70px;
        }

        .qr {
            display: inline-block;
            float: left;
            width: 20%;
            margin-right: 80%;
            margin-bottom: 5%;
            /* padding: 10%; */
            /* background-color: brown; */

        }

        .counttable {
            display: inline-block;
            float: right;
            margin: 20px;
            width: 500px;
            /* background-color: blue; */
        }

        .counttable h4 {
            display: inline-block;
            margin-right: 10%;
            font-size: 30px;
        }

        .styletable td {
            padding-right: 10px;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ طباعة
                    فاتورة</span>
            </div>
        </div>
        {{-- <div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div> --}}
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row" id="print">


        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="main-content-label mg-b-5">
                        فاتورة مبيعات العميل
                    </div>
                    <table>
                        <tr id="sin">
                            <td>
                                <label for="">كود العميل</label><br>
                                <input class="form-control" type="text" name="code" value="{{ $info_size_customer->customer->code }}">
                            </td>
                            <td>
                                <label for="">اسم العميل</label><br>
                                <input class="form-control" type="text" name="shoulder" value="{{ $info_size_customer->customer->name }}">
                            </td>
                            <td>
                                <label for="">رقم الجوال </label><br>
                                <input class="form-control" type="text" name="shoulder_leight"
                                    value="{{ $info_size_customer->customer->phone }}">
                            </td>
                            <td>
                                <label for="">عدد الثياب</label><br>
                                <input class="form-control" type="text" name="brest"
                                    value="{{ $info_size_customer->customer->number_dresses }}">
                            </td>
                            <td>
                                <label for="">تاريخ م</label><br>
                                <input class="form-control" type="text" name="expand_brest" value="{{ $info_size_customer->customer->date }}">
                            </td>
                            <td>
                                <label for="">الوقت</label><br>
                                <input class="form-control" type="text" name="neck" value="{{ $info_size_customer->customer->time }}">
                            </td>
                            <td>
                                <label for="">تاريخ الاستلام</label><br>
                                <input class="form-control" type="text" name="receved_data"
                                    value="{{ $info_size_customer->customer->receved_data }}">
                            </td>
                            <td>
                                <label for="">رقم الفاتورة</label><br>
                                <input class="form-control" type="text" name="down_hand"
                                    value="{{ $info_size_customer->customer->invoice_number }}">
                            </td>

                        </tr>

                    </table><br>
                    <hr>


                    @php
                        $i = 0;
                    @endphp
                    @foreach ($info_size_customers as $info_size_customer)
                        @php
                            $i++;
                        @endphp

                        <div class="row col-4">
                        </div>
                        <div class="main-content-label mg-b-5">
                            معلومات المقاسات {{ $i }}
                        </div>
                        <table>
                            <tr id="sin">
                                <td>
                                    <label for="">الطول</label><br>
                                    <input class="form-control" type="text" name="height" value="{{ $info_size_customer->height }}">
                                </td>
                                <td>
                                    <label for="">الكتف</label><br>
                                    <input class="form-control" type="text" name="shoulder" value="{{ $info_size_customer->shoulder }}">
                                </td>
                                <td>
                                    <label for="">طول الكتف</label><br>
                                    <input class="form-control" type="text" name="shoulder_leight"
                                        value="{{ $info_size_customer->shoulder_leight }}">
                                </td>
                                <td>
                                    <label for="">الصدر</label><br>
                                    <input class="form-control" type="text" name="brest" value="{{ $info_size_customer->brest }}">
                                </td>
                                <td>
                                    <label for="">وسع الصدر </label><br>
                                    <input class="form-control" type="text" name="expand_brest"
                                        value="{{ $info_size_customer->expand_brest }}">
                                </td>
                                <td>
                                    <label for="">الرقبة</label><br>
                                    <input class="form-control" type="text" name="neck" value="{{ $info_size_customer->neck }}">
                                </td>
                                <td>
                                    <label for="">وسع اليد</label><br>
                                    <input class="form-control" type="text" name="expand_hand"
                                        value="{{ $info_size_customer->expand_hand }}">
                                </td>
                                <td>
                                    <label for="">اسفل اليد</label><br>
                                    <input class="form-control" type="text" name="down_hand" value="{{ $info_size_customer->down_hand }}">
                                </td>
                                <td>
                                    <label for="">طول الكبك</label><br>
                                    <input class="form-control" type="text" name="cbk_leight" value="{{ $info_size_customer->cbk_leight }}">
                                </td>
                                <td>
                                    <label for="">عرض الكبك</label><br>
                                    <input class="form-control" type="text" name="cbk_width" value="{{ $info_size_customer->cbk_width }}">
                                </td>
                            </tr>
                            <tr id="sin">
                                <td>
                                    <label for="">طول الجيب</label>
                                    <input class="form-control" type="text" name="pocket_leight"
                                        value="{{ $info_size_customer->pocket_leight }}">
                                </td>
                                <td>
                                    <label for="">وسع الجيب</label>
                                    <input class="form-control" type="text" name="pocket_expand"
                                        value="{{ $info_size_customer->pocket_expand }}">
                                </td>
                                <td>
                                    <label for="">وسع اسفل</label>
                                    <input class="form-control" type="text" name="down_expand"
                                        value="{{ $info_size_customer->down_expand }}">
                                </td>
                                <td>
                                    <label for="">كفة اسفل</label>
                                    <input class="form-control" type="text" name="down_desist"
                                        value="{{ $info_size_customer->down_desist }}">
                                </td>
                            </tr>
                        </table><br>
                        <hr>
                        <div id="idhight">
                            <div class="radio">
                                <h4>ملخص الطلب {{ $i }}</h4>
                                <table>
                                    <tr>
                                        <td>
                                            <label for="">نوع التصميم</label>
                                            <input class="form-control" type="text" value="{{ $info_size_customer->design->name_design }}">
                                        </td>
                                        <td>
                                            <label for="">القماش</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->fabric->type_fabrice }}">
                                        </td>
                                        <td>
                                            <label for="">اللون القماش</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->fabric->color_fabrice }}">
                                        </td>
                                        <td>
                                            <label for="">اسم الخياط</label>
                                            <input class="form-control" type="text" value="{{ $info_size_customer->seamoer->name }}">
                                        </td>
                                        <td>
                                            <label for="">الخصم</label>
                                            <input class="form-control" type="text" value="{{ $info_size_customer->discount }}">
                                        </td>
                                        <td>
                                            <label for="">السعر شامل الضريبة</label>
                                            <input class="form-control" type="text" value="{{ $info_size_customer->price_include_tax }}">
                                        </td>
                                        <td>
                                            <label for="">السعر غير شامل الضريبة</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->price_doesnot_include_tax }}">
                                        </td>
                                        <td>
                                    </tr>
                                </table>
                                <div class="radio">
                                    <h4> ملخص الطلب صور {{ $i }}</h4>
                                    <figure>
                                        <img src="{{ $info_size_customer->image_neck }}" alt="" width="100px"
                                            height="100px">
                                        <img src="{{ $info_size_customer->image_cbk }}" alt=""width="100px"
                                            height="100px">
                                        <img src="{{ $info_size_customer->image_brest_pocket }}" alt=""
                                            width="100px" height="100px">
                                        <img src="{{ $info_size_customer->image_pocket }}" alt="" width="100px"
                                            height="100px">
                                        <img src="{{ $info_size_customer->image_algizour }}" alt=""
                                            width="100px" height="100px">
                                    </figure>
                                </div>





                                </figure>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="counttable">
                    <h4> ملخص الدفع </h4><br>
                    <div class="styletable">
                        <table>
                            <tr>
                                <td>
                                    <label for="">اجمالي عدد الثياب</label><br>
                                    <input class="form-control" type="text" name="brest"
                                        value="{{ $info_size_customer->customer->number_dresses }}">
                                </td>
                                <td>
                                    <label for="">المبلغ اجمالي غير شامل الضريبة</label><br>
                                    <input class="form-control" type="text" name="price_doesnot_include_tax" id="tax" readonly
                                        value="{{ $price_doesnot_include_tax }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">الاجمالي الخصم</label><br>
                                    <input class="form-control" type="text" name="discount" id="discount" value="{{ $discount }}">
                                </td>
                                <td>
                                    <label for="">الاجمالي مبلغ الضريبة</label><br>
                                    <input class="form-control" type="text" name="value_tax" id="value_tax" value="{{ $value_tax }}"
                                        readonly>
                                </td>
                                <td>
                                    <label for="">الاجمالي شامل الضريبة</label><br>
                                    <input class="form-control" type="text"name="price_include_tax" value="{{ $price_include_tax }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">نوع الدفع</label><br>
                                    <input class="form-control" type="text">
                                </td>
                                <td>
                                    <label for="">المبلغ المستلم</label><br>
                                    <input class="form-control" type="text" name="receivedamount" id="receivedamount"
                                        value="{{ $receivedamount }}">
                                </td>
                                <td>
                                    <label for="">المبلغ المتبقي</label><br>
                                    <input class="form-control" type="text" name="remainingamount" id="remainingamount" readonly
                                        value="{{ $remainingamount }}">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="qr">
                    {{ QrCode::generate('hi omar') }}
                </div>

            </div>
        </div>
        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">


            <button class="btn ripple btn-primary" type="button" style="margin-right: 95%; margin-bottom:10%"
                onclick="printDiv()">طباعة</button>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var oiginalContents = document.body.innerHTML;
            window.print();
            document.body.innerHTML = oiginalContents;
            location.reload();
        }
    </script>
@endsection
