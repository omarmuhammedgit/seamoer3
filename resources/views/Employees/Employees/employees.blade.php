@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض
                    الموظفين</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@if(session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('edit') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if(session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('delete') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <!-- row opened -->
    <div class="row row-sm">
        {{-- <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">اسم الموظف</p><select class="form-control select2" id="search_name"
                                name="search_name">
                                <option label="الكل" value="الكل">
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->first_name }}">
                                        {{ $employee->first_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">الصلاحية</p><select class="form-control select2" id="search_permission"
                                name="search_permission">
                                <option label="الكل">
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{ $employee->permission }}
                                    </option>
                                @endforeach
                            </select>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">المسمى الوظيفي</p><select class="form-control select2" id="search_job_title"
                                name="search_job_title">
                                <option label="الكل">
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->job_title }}">
                                        {{ $employee->job_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">تاريخ التعين</p>
                            <input type="date" name="saledate" id="saledate">
                        </div><!-- col-4 -->
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" id="ajax_searchDiv">
                        <table class="table text-md-nowrap" id="example1" data-page-length="50">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">اسم الموظف</th>
                                    {{-- <th class="wd-20p border-bottom-0">الصلاحية</th> --}}
                                    <th class="wd-15p border-bottom-0">تاريخ التعين</th>
                                    <th class="wd-10p border-bottom-0">المسمى الوظيفي</th>
                                    <th class="wd-25p border-bottom-0">الاخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->first_name }}</td>
                                        {{-- <td> {{ $employee->permission }}</td> --}}
                                        <td>{{ $employee->date_hiring }}</td>
                                        <td>{{ $employee->job_title }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                                data-toggle="dropdown" type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                  <button class="btn btn-warning btn-block"> <a class="dropdown-item" href="edit-employee/{{$employee->id}}">تعديل</a></button>
                                                   {{-- <button class="btn btn-info btn-block"> <a class="dropdown-item " href="#"> فحص</a></button> --}}
                                                   <button class="btn btn-danger btn-block">
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{$employee->id}}" data-section_name="" data-toggle="modal"
                                                       href="#modaldemo9" title="حذف"> حذف</a></a></button>
                                                </div>
                                            </div>
                                         </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>

    <!-- edit -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">

               <form action="sections/update" method="post" autocomplete="off">
                   {{method_field('patch')}}
                   {{csrf_field()}}
                   {{-- <form action="{{route('Employees.store')}}" method="POST">
                    @csrf --}}
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    المعلومات الشخصية
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label><span>اسم الاول</span></label>
                                        <input type="text" name="first_name" placeholder="اسم الاول">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>العائلة</span></label>
                                        <input type="text" name="last_name" placeholder="العائلة">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>رقم الموظف</span></label>
                                        <input type="text" name="no_employee" placeholder="رقم الموظف">
                                    </div>
                                    <div class="col-lg-3">
                                        @php
                                            $date=date('Y/m/d');
                                        @endphp
                                        <label><span>تاريخ التعين</span></label>
                                        <input type="text" name="date_hiring" placeholder="تاريخ التعين" value="{{$date}}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>المسمى الوظيفي</span></label>
                                        <input type="text" name="job_title" placeholder="المسمى الموظيفي">
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    <!--div-->
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    معلومات التواصل
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label><span>رقم الجوال</span></label>
                                        <input type="text" name="number_phone1" placeholder="رقم الجوال">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>رقم الجوال 2</span></label>
                                        <input type="text" name="number_phone2" placeholder="رقم الجوال 2">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>البريد الكتروني</span></label>
                                        <input type="email" name="email" placeholder="البريد الالكتروني">
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                    <!--div-->
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    معلومات السكن
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label><span>المدينة</span></label>
                                        <input type="text" name="city" placeholder="المدينة">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>الحي</span></label>
                                        <input type="text" name="district" placeholder="الحي">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>الشارع</span></label>
                                        <input type="text" name="street" placeholder="الشارع">
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    <!--div-->
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    معلومات البنكية
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label><span>رقم البنك</span></label>
                                        <input type="text" name="account_number" placeholder="رقم البنك">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>اسم البنك</span></label>
                                        <input type="text" name="name_bank" placeholder="اسم البنك">
                                    </div>
                                    <div class="col-lg-3">
                                        <label><span>الابيان</span></label>
                                        <input type="text" name="statement" placeholder="الابيان">
                                    </div>
                                    <br>
                                    <hr>


                                </div>
                                <br>
                                <div class="card-body pt-0">
                                    {{-- <form > --}}
                                    <div class="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم المستخدم</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="ادحل اسم المستخدم" name="name_user">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">كلمة السر</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="ادخل كلمة السر" name="password1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">تاكيد كلمة السر</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="ادخل كلمة السر" name="password2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">اسم الصلاحية</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1"
                                                placeholder="ادخل اسم الصلاحية" name="permission">
                                        </div>
                                        <div class="form-group">
                                            {{-- <div class="custom-checkbox custom-control"> --}}
                                            <input type="checkbox" id="checkbox-1">
                                            <label class="exampleInputEmail1">اسم الفرع</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1"
                                                placeholder="ادخل اسم الفرع">

                                        </div>


                                    </div>

                                    {{-- </form> --}}
                                </div>

                            </div>

                            {{-- <div class="submit">
                                <button type="submit" class="btn btn-primary mt-3 mb-0">حفظ</button>

                            </div> --}}
                        </div>
                    </div>

           </div>
           <div class="modal-footer">
               <button type="submit" class="btn btn-primary">تاكيد</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
           </div>
           </form>
       </div>
   </div>
</div>
   <!-- delete -->
   <div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف الموظف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                               type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Employees-delete')}}" method="post">
                {{-- {{method_field('delete')}} --}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                    <input type="hidden" name="id" id="id" value="">
                    {{-- <input class="form-control" name="section_name" id="section_name" type="text" readonly> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
        </div>
        </form>
    </div>
</div>
    <!-- /row -->
    </div>
    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
        })
    </script>
    <script>
        // function search_name(){
        //         alert('hi');
        //     }
        $(document).ready(function() {
            // alert('hiii');
            $(document).on('change', '#search_name', function() {
                // make_search();

            });
            $(document).on('change', '#search_permission', function() {
                // make_search();

            });
            $(document).on('change', '#search_job_title', function() {
                // make_search();

            });

            function make_search() {
                var search_name = $('#search_name').val();
                var token_search = $('#token_search').val();
                // $.ajax({
                //     url: {{ route('ajax_search') }},
                //     type: 'post',
                //     datatype: 'html',
                //     cache: false,
                //     data: {
                //         search_name
                //     },
                //     success: function(data) {
                //         alert('s');

                //     },
                //     error: function() {
                //         alert('f');

                //     }
                // });

                // alert(search_name);
            }


            //     var search_permission=$('#search_permission').val();
            //     alert(search_permission);
            //     var search_job_title=$('#search_job_title').val();
            //     alert(search_job_title);


        });
    </script>
@endsection
