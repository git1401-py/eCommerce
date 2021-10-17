@extends('admin.layouts.admin')

@section('title')
    inbox coupons
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 p-3 bg-white">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="font-weight-bolder">لیست کوپن ها ({{$coupons->total() }})</h5>
                                <a href="{{ route('admin.coupons.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus ml-1"></i>ایجاد کوپن
                                </a>
                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>کد</th>
                                        <th>نوع</th>
                                        <th>تاریخ انقضا</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $key => $coupon )
                                    <tr>
                                        <td>
                                            {{ $coupons->firstItem() + $key }}
                                        </td>
                                        <td>
                                            {{ $coupon->name }}
                                        </td>
                                        <td>
                                            {{ $coupon->code }}
                                        </td>
                                        <td>
                                            {{ $coupon->type }}
                                        </td>
                                        <td>
                                            {{ verta($coupon->expired_at)->format('Y/n/j H:i') }}
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.coupons.show' , ['coupon' => $coupon->id]) }}" class="btn btn-sm btn-outline-success" >
                                                نمایش
                                            </a>
                                            <a href="{{ route('admin.coupons.edit' , ['coupon' => $coupon->id]) }}" class="btn btn-sm text-info mr-2" >
                                                <i class="fa fa-edit ml-1"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            <form action="{{ route('admin.coupons.index') }}" method="GET">



                            </form>
                        </div>


                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        {{ $coupons->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
