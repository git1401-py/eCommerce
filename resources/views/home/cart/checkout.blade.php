@extends('home.layouts.home')
@section('title')
    سفارش خرید
@endsection
<div class="container-fluid bg-gray-200 my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">سفارش خرید</li>
                  <li class="breadcrumb-item"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                </ol>
              </nav>
        </div>
    </div>
</div>

@section('content')
    <div class="checkout-main-area py-3 text-right " style="direction: rtl;">

        <div class="container-fluid p-5 bg-white">

            @if (!session()->has('coupon'))
                <div class="customer-zone mb-2 p-5">
                    <p class="cart-page-title">
                        کد تخفیف دارید؟
                        <a class="checkout-click3" href="#"> میتوانید با کلیک در این قسمت کد خود را اعمال کنید </a>
                    </p>
                    <div class="checkout-login-info3">
                        <form action="{{ route('home.coupons.check') }}" method="POST">
                            @csrf
                            <input type="text" name="code" placeholder="کد تخفیف">
                            <input type="submit" value="اعمال کد تخفیف">
                        </form>
                    </div>
                </div>

            @endif

            <div class="checkout-wrap pt-3 p-5 ">
                <div class="row">

                    <div class="col-lg-7">
                        <div class="billing-info-wrap ms-4">
                            <h3> آدرس تحویل سفارش </h3>

                            <div class="row">
                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                </p>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info tax-select mb-20">
                                        <label> انتخاب آدرس تحویل سفارش <abbr class="required"
                                                title="required">*</abbr></label>

                                        <select class="email s-email s-wid" id="address-select">
                                            @foreach ($addresses as $address)
                                                <option value="{{ $address->id }}">{{ $address->title }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pt-3">
                                    <button class="collapse-address-create" type="submit"> ایجاد آدرس جدید </button>
                                </div>

                                <div class="col-lg-12">
                                    <div class="collapse-address-create-content"
                                        style="{{ count($errors->addressStore) > 0 ? 'display:block' : '' }}">
                                        <form action="{{ route('home.addresses.store') }}" method="POST">
                                            @csrf
                                            <div class="row">

                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        عنوان
                                                    </label>
                                                    <input type="text" name="title" value="{{ old('title') }}">
                                                    @error('title', 'addressStore')
                                                        <p class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </p>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        شماره تماس
                                                    </label>
                                                    <input type="text" name="cellphone" value="{{ old('cellphone') }}">
                                                    @error('cellphone', 'addressStore')
                                                        <p class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </p>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        استان
                                                    </label>
                                                    <select class="email s-email s-wid province-select" name="province_id">
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">{{ $province->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('province_id', 'addressStore')
                                                        <p class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </p>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        شهر
                                                    </label>
                                                    <select class="email s-email s-wid city-select" name="city_id">
                                                    </select>
                                                    @error('city_id', 'addressStore')
                                                        <p class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </p>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        آدرس
                                                    </label>
                                                    <input type="text" name="address" value="{{ old('address') }}">
                                                    @error('address', 'addressStore')
                                                        <p class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </p>
                                                    @enderror
                                                </div>
                                                <div class="tax-select col-lg-6 col-md-6">
                                                    <label>
                                                        کد پستی
                                                    </label>
                                                    <input type="text" name="postal_code"
                                                        value="{{ old('postal_code') }}">
                                                    @error('postal_code', 'addressStore')
                                                        <p class="input-error-validation">
                                                            <strong>{{ $message }}</strong>
                                                        </p>
                                                    @enderror
                                                </div>

                                                <div class=" col-lg-12 col-md-12">

                                                    <button class="cart-btn-2" type="submit"> ثبت آدرس
                                                    </button>
                                                </div>



                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5">
                        <form action="{{ route('home.payment') }}" method="POST">
                            @csrf
                            <div class="your-order-area">
                                <h3> سفارش شما </h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-info-wrap">
                                        <div class="your-order-info">
                                            <ul>
                                                <li> محصول <span> جمع </span></li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                @foreach (\Cart::getContent() as $item)
                                                    <li class="d-flex align-items-center justify-content-between">
                                                        <div class="">
                                                            <a
                                                                href="{{ route('home.products.show', ['product' => $item->associatedModel->slug]) }}">
                                                                {{ $item->name }}
                                                            </a>

                                                            <div class="small text-gray-500" dir="rtl">
                                                                {{ $item->quantity }} عدد ،
                                                                {{ \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                                                :
                                                                {{ $item->attributes->value }}
                                                            </div>
                                                        </div>

                                                        <span>
                                                            {{ number_format($item->price) }}تومان
                                                            @if ($item->attributes->is_sale)
                                                                <div class="small text-danger" dir="rtl">
                                                                    <span
                                                                        style="font-size: 10px">%{{ $item->attributes->persent_sale }}
                                                                        تخفیف</span>
                                                                </div>
                                                            @endif
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-subtotal">
                                            <ul>
                                                <li> مبلغ سفارش :
                                                    <span>
                                                        {{ number_format(\Cart::getTotal() + cartTotalSaleAmount()) }}
                                                        تومان
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>

                                        @if (cartTotalSaleAmount() > 0)
                                            <div class="your-order-info order-subtotal">
                                                <ul>
                                                    <li> مبلغ تخفیف کالاها :
                                                        <span>
                                                            {{ number_format(cartTotalSaleAmount()) }}
                                                            تومان
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>

                                        @endif
                                        @if (session()->has('coupon'))
                                            <div class="your-order-info order-subtotal">
                                                <ul>
                                                    <li> مبلغ کد تخفیف :
                                                        <span>
                                                            {{ number_format(session()->get('coupon.amount')) }}
                                                            تومان
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="your-order-info order-shipping">
                                            <ul>
                                                <li> هزینه ارسال :
                                                    @if (cartTotalDeliverityAmount() == 0)
                                                        <span>رایگان</span>
                                                    @else
                                                        <span>{{ number_format(cartTotalDeliverityAmount()) }} تومان</span>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-total">
                                            <ul>
                                                <li>جمع کل :
                                                    <span>{{ number_format(cartTotalAmount()) }} تومان</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="pay-top sin-payment">
                                            <input id="zarinpal" class="input-radio" type="radio" value="zarinpal"
                                                checked="checked" name="payment_method">
                                            <label for="zarinpal"> درگاه پرداخت زرین پال </label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                    طراحان گرافیک است.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="pay-top sin-payment">
                                            <input id="pay" class="input-radio" type="radio" value="pay" name="payment_method">
                                            <label for="pay">درگاه پرداخت پی</label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                    طراحان گرافیک است.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Place-order mt-40">
                                    <button type="submit">ثبت سفارش</button>
                                </div>
                            </div>
                            <input type="hidden" id="address-input" name="address_id">
                            </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script>
            $('#address-input').val($('#address-select').val());

        $('#address-select').change(function() {
            $('#address-input').val($(this).val());
        });
        $('.province-select').change(function() {

            var provinceID = $(this).val();

            if (provinceID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
                    success: function(res) {
                        if (res) {
                            $(".city-select").empty();

                            $.each(res, function(key, city) {
                                $(".city-select").append('<option value="' + city.id + '">' +
                                    city.name + '</option>');
                            });

                        } else {
                            $(".city-select").empty();
                        }
                    }
                });
            } else {
                $(".city-select").empty();
            }
        });

    </script>

@endsection
