@extends('admin.layouts.admin')

@section('title')
    edit coupons
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            var customOptions = {
			placeholder: "روز / ماه / سال"
			, twodigit: false
			, closeAfterSelect: true
			, nextButtonIcon: "fa fa-arrow-circle-right"
			, previousButtonIcon: "fa fa-arrow-circle-left"
			, buttonsColor: "blue"
			, forceFarsiDigits: true
			, markToday: true
			, markHolidays: true
			, highlightSelectedDay: true
			, sync: true
			, gotoToday: true
		}
            kamaDatepicker('expired_at', customOptions);
        });

    </script>
@endsection
@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder">ویرایش کوپن {{ $coupon->name }}</h5>
                            <hr>
                            @include('admin.sections.errors')
                            <form action="{{ route('admin.coupons.update' , ['coupon' => $coupon->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $coupon->name }}">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="code">کد</label>
                                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $coupon->code }}">
                                    </div>
                                    <div class="form-group col-md-4 mb-3 small text-muted">
                                        <label for="type">نوع</label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="percentage" {{ $coupon->getRawOriginal('type')== 'percentage' ? 'selected' : '' }}> درصدی </option>
                                             <option value="amount" {{ $coupon->getRawOriginal('type') == 'amount' ? 'selected' : '' }}> مبلغی </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="amount">مبلغ</label>
                                        <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ $coupon->amount }}">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="percentage">درصد</label>
                                        <input type="text" class="form-control @error('percentage') is-invalid @enderror" id="percentage" name="percentage" value="{{ $coupon->percentage }}">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="max_percentage_amount">حداکثر برای نوع درصدی</label>
                                        <input type="text" class="form-control @error('max_percentage_amount') is-invalid @enderror" id="max_percentage_amount" name="max_percentage_amount" value="{{ $coupon->max_percentage_amount }}">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <span class="small">تاریخ انقضا</span>
                                        <input type="text" id="expired_at"
                                            style="direction: ltr; "
                                            name="expired_at"
                                            value="{{ verta($coupon->expired_at)->format('Y/n/j') }}">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="description">توضیحات</label>
                                        <textarea rows="3" class="form-control" id="description" name="description"> {{ $coupon->description }} </textarea>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                                    </div>
                                    <div class="form-group col-md-4 mb-3 me-auto">

                                    </div>
                                    <div class="form-group col-md-2 mb-3 me-auto">
                                        <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark"> بازگشت </a>
                                    </div>
                                </div>


                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
