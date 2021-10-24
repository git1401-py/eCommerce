@extends('home.layouts.home')
@section('title')
    سبد خرید
@endsection

@section('content')
<div class="container-fluid bg-gray-200 my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                  <li class="breadcrumb-item"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                </ol>
              </nav>
        </div>
    </div>
</div>

    @if (\Cart::isEmpty())
        <div class="container-fluid p-5 bg-white my-3 mb-5 pb-5">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-6 text-center mb-5 pb-5">
                    <i class="sli sli-basket"></i>
                    <h2 class="fw-bolder my-4">سبد خرید خالی است</h2>
                    <p class="mb-3">شما هیج کالایی در سبد خرید خود ندارید</p>
                    <a class="btn btn-outline-dark" href="{{ route('home.index') }}">ادامه خرید</a>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid p-5 bg-white">
            <form action="{{ route('home.cart.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">تصویر محصول </th>
                            <th scope="col">نام محصول </th>
                            <th scope="col">فی </th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach (\Cart::getContent() as $item)

                                <tr>
                                    <th scope="row">
                                        <a href="{{ route('home.products.show' , ['product' => $item->associatedModel->slug]) }}">
                                            <img style="width: 50px; height:50px;"
                                                src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->associatedModel->primary_image) }}" alt="{{ $item->associatedModel->name }}"
                                                >
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('home.products.show' , ['product' => $item->associatedModel->slug]) }}">
                                            {{ $item->name }}
                                        </a>
                                        <div class="small text-gray-500" dir="rtl">
                                            {{  \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                            :
                                            {{ $item->attributes->value }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ number_format($item->price) }}تومان
                                        @if($item->attributes->is_sale)
                                            <div class="small text-danger" dir="rtl" >
                                                %{{ $item->attributes->persent_sale }} تخفیف
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-muted d-flex align-items-center justify-content-center"
                                            style="width: 50px; height: 60px;">
                                            <span class="p-2 plus" style="cursor: pointer">+</span>
                                            <input class="text-center box quantity-input" type="text" name="qtybutton[{{ $item->id }}]"
                                                style="width: 50px; height: 60px;" value="{{ $item->quantity }}"
                                                data-max="{{ $item->attributes->quantity }}"/>
                                            <span class="p-2 mines" style="cursor: pointer">-</span>
                                        </div>
                                    </td>
                                    <td>
                                        {{ number_format($item->price * $item->quantity) }}تومان
                                    </td>
                                    <td>
                                        <a href="{{ route('home.cart.remove' , ['rowId' => $item->id]) }}">
                                            <i class="sli sli-close"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="row justify-content-start">
                            <a class="btn btn-outline-danger btn-sm py-2 w-25" href="{{ route('home.index') }}">ادامه خرید</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-outline-danger btn-sm py-2 mx-3" style="width:35%">به روز رسانی سبد خرید</button>
                            <a class="btn btn-outline-danger btn-sm py-2" style="width:35%" href="{{ route('home.cart.clear') }}">پاک کردن سبد خرید</a>
                        </div>
                    </div>

                </div>
            </form>
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-5 bg-gray-200 p-3 rounded">
                    <div class="d-flex align-items-center">
                        <span class="fw-bolder ps-2">کد تخفیف</span>
                        <div class="bg-gray-500" style="width: 70%; height:2px"></div>
                    </div>
                    <div class="my-3">
                        <form action="{{ route('home.coupons.check') }}" method="POST">
                            @csrf
                            <label for="copon" class="form-label">تخفیف</label>
                            <input type="text" name="code" dir="ltr" class="form-control mb-3" id="copon" placeholder="">
                            <button type="submit" class="btn btn-outline-dark">ثبت</button>
                        </form>
                      </div>
                </div>
                <div class="col-lg-4 col-md-5 bg-gray-200 p-3 rounded">
                    <div class="d-flex align-items-center">
                        <span class="fw-bolder ps-1">مجموع سفارش</span>
                        <div class="bg-gray-500" style="width: 60%; height:2px"></div>
                    </div>
                    <div class="my-4 small d-flex align-items-center justify-content-between">

                        <span>مبلغ سفارش :</span>
                        <span>
                            {{ number_format( \Cart::getTotal() + cartTotalSaleAmount() ) }}
                            تومان

                        </span>
                    </div>
                    <hr>
                    @if (cartTotalSaleAmount() > 0)
                        <div class="my-4 small d-flex align-items-center justify-content-between">
                            <span>مبلغ تخفیف کالاها :</span>
                            <span>
                                {{ number_format(  cartTotalSaleAmount() ) }}
                                تومان

                            </span>
                        </div>
                    @endif
                    @if (session()->has('coupon'))
                        <div class="my-4 small d-flex align-items-center justify-content-between">
                            <span>مبلغ کد تخفیف :</span>
                            <span>
                                {{ number_format(  session()->get('coupon.amount') ) }}
                                تومان

                            </span>
                        </div>
                    @endif

                    <div class="my-4 small d-flex align-items-center justify-content-between">
                        <span>هزینه ارسال :</span>
                        @if (cartTotalDeliverityAmount()== 0)
                        <span class="text-danger">رایگان</span>
                        @else
                            <span>{{ number_format( cartTotalDeliverityAmount() ) }} تومان</span>
                        @endif
                    </div>
                    <hr>
                    <div class="my-4 text-danger d-flex align-items-center justify-content-between">
                        <span>جمع کل:</span>
                        <span>{{ number_format( cartTotalAmount() ) }} تومان</span>
                    </div>
                    <div class="row">
                        <a href="{{ route('home.orders.checkout') }}" class="btn btn-block btn-outline-dark">ادامه فرآیند خرید</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')

    <script>
        $('.variation-select').on('change' , function(){
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price');
            variationPriceDiv.empty();

            if(variation.is_sale){
                let spanSale = $('<span />' , {
                    class : 'fw-bolder text-danger fa-2x',
                    text : toPersianNum(number_format(variation.sale_price)) + ' تومان'
                });
                let spanPrice = $('<del />' , {
                    class : 'small',
                    text : toPersianNum(number_format(variation.price)) + ' تومان'
                });

                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
            }else{
                let spanPrice = $('<span />' , {
                    class : 'fw-bolder text-danger fa-2x',
                    text : toPersianNum(number_format(variation.price)) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }

            $('.quantity-input').attr('data-max' , variation.quantity);
            $('.quantity-input').val(1);


        });
        $('.plus').on('click' , function(){
            $input = $(this).siblings(".quantity-input");
            if(Number($input.val()) < $input.attr('data-max')){
                $input.val(Number($input.val())+1) ;
            }else
                {
                    $input.val($input.attr('data-max'));
                }
            });
            $('.mines').on('click' , function(){
                $input = $(this).siblings(".quantity-input");
                if(Number($input.val()) > 2 ){
                    $input.val(Number($input.val())-1);
                }else{
                    $input.val(1);
                }

            });

    </script>
@endsection
