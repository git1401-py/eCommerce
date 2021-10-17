@extends('admin.layouts.admin')

@section('title')
    show coupons
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder"> کوپن : {{ $coupon->name }}</h5>
                            <hr>

                                <div class="row">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control" name="name" value="{{ $coupon->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="code">کد</label>
                                        <input type="text" class="form-control" name="code" value="{{ $coupon->code }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="type">نوع</label>
                                        <input type="text" class="form-control" name="type" value="{{ $coupon->type }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="amount">مبلغ</label>
                                        <input type="text" class="form-control" name="amount" value="{{ $coupon->amount }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="percentage">درصد</label>
                                        <input type="text" class="form-control" name="percentage" value="{{ $coupon->percentage }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="max_percentage_amount">حداکثر برای نوع درصدی</label>
                                        <input type="text" class="form-control" name="max_percentage_amount" value="{{ $coupon->max_percentage_amount }}" disabled>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label >تاریخ ایجاد</label>
                                        <input type="text" class="form-control" style="font-size:12px" value="{{ verta($coupon->created_at)->format('Y/n/j H:i') }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >تاریخ انقضا</label>
                                        <input type="text" class="form-control" style="font-size:12px" value="{{ verta($coupon->expired_at)->format('Y/n/j H:i') }}" disabled>
                                    </div>

                                    <div class="form-group col-md-9 mb-3">

                                    </div>
                                    <div class="form-group col-md-3 mb-3 me-auto">
                                        <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark "> بازگشت </a>
                                    </div>
                                </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
