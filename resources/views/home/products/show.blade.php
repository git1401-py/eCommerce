@extends('home.layouts.home')
@section('title')
    فروشگاه
@endsection

@section('content')

<div class="container-fluid my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                  <li class="breadcrumb-item"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                </ol>
              </nav>
        </div>
    </div>
</div>


    <div class="container-fluid p-5 bg-white">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="">
                    <h4 class="text-right mb-4">{{ $product->name }}</h4>
                    <div class="text-end variation-price">
                        @if ($product->quantity_check)

                            @if ($product->sale_check)
                                <span class="fw-bolder text-danger fa-2x" >
                                    {{ number_format($product->sale_check->sale_price) }}
                                    تومان
                                </span>
                                <del class="small">
                                    {{ number_format($product->sale_check->price) }}

                                    تومان
                                </del>
                            @else
                                <span class="fw-bolder text-danger fa-2x">
                                    {{ number_format($product->price_check->price) }}
                                    تومان
                                </span>
                            @endif

                        @else
                            <span class="badge rounded-pill bg-danger bg-opacity-75">
                            ناموجود
                        </span>
                        @endif

                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="my-2 small">
                            <div
                                data-rating-stars="5"
                                data-rating-readonly="true"
                                data-rating-value="{{ ceil($product->rates->avg('rate')) }}"
                                >
                            </div>
                        </div>
                        <span class="small border-end">___<a href="#">{{ $product->category->name }}</a></span>
                    </div>
                    <p class="">
                        {{ $product->description }}
                    </p>
                    <div class="pro-details-list">
                        <ul class="">
                            @foreach ($product->attributes()->with('attribute')->get() as $attribute)
                                <li> -
                                    {{ $attribute->attribute->name }}: {{ $attribute->value }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    @if ($product->quantity_check)
                        @php
                            if($product->sale_check)
                            {
                                $variationProductSelected = $product->sale_check;
                            }else{
                                $variationProductSelected = $product->price_check;
                            }
                        @endphp
                        <div class="">
                            <div class="">

                                <div class="my-2 w-50">

                                    <span>{{ App\Models\Attribute::find($product->variations->first()->attribute_id)->name }}</span>
                                    <select class="form-control variation-select">
                                        @foreach ($product->variations()->where('quantity' , '>' , 0)->get() as $variation)
                                            <option
                                            value="{{ json_encode($variation->only(['id' , 'quantity','is_sale' , 'sale_price' , 'price'])) }}"
                                            {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}
                                            >{{ $variation->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="text-muted d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 60px;">
                                <span class="p-2 plus" style="cursor: pointer">+</span>
                                <input class="text-center box quantity-input" type="text"
                                    style="width: 50px; height: 60px;" value="2"  data-max="5"/>
                                <span class="p-2 mines" style="cursor: pointer">-</span>
                            </div>
                            <div class="me-4">
                                <a href="#">افزودن به سبد خرید</a>
                            </div>
                            <div class="p-2">
                                <a title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                            </div>
                            <div class="p-2">
                                <a title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                            </div>
                        </div>
                    @endif
                    <div class="mt-3">
                        <span>دسته بندی :</span>
                        <ul class="list-group list-group-horizontal justify-content-en">
                            <li class="list-group-item p-0 border-0">
                                <a href="#">
                                    {{ $product->category->parent->name }} ، {{ $product->category->name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="my-3">
                        <span>تگ ها :</span>
                        <ul class="list-group list-group-horizontal justify-content-en">
                            @foreach ($product->tags as $tag)
                                <li class="list-group-item p-0 border-0">
                                    <a href="#">{{ $tag->name }}{{ $loop->last ? '' : '،' }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <!-- Swiper -->

                <div class="modal-swiper">
                    <div class="swiper swiper-custom" style="">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                alt="{{ $product->name }}">
                            </div>
                            @foreach ($product->images as $image)
                                <div class="swiper-slide">
                                    <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                    alt="">
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Navigation -->
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                    <div class="swiper swiper-product gallery-thumbs gallery-thumbs3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                alt="{{ $product->name }}">
                            </div>
                            @foreach ($product->images as $image)
                                <div class="swiper-slide">
                                    <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                    alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-7 col-sm-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">توضیحات</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">اطلاعات بیشتر</button>
                      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"> دیدگاه (2) </button>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade p-3 show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <p class="">
                            {{ $product->description }}
                        </p>
                    </div>
                    <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="pro-details-list">
                            <ul class="">
                                @foreach ($product->attributes()->with('attribute')->get() as $attribute)
                                    <li class="mb-2">
                                        <span class="fw-bolder"> {{ $attribute->attribute->name }} </span>
                                        : {{ $attribute->value }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">contact</div>
                  </div>

            </div>
            <div class="col-md-5 col-sm-12"></div>
        </div>
    </div>

@endsection

@section('script')

    <script>

var galleryThumbs3 = new Swiper('.gallery-thumbs3', {
      spaceBetween: 10,
      slidesPerView: 4,
    //   loop: true,
    //   loopedSlides: 5, //looped slides should be the same
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiperCustom3 = new Swiper('.swiper-custom', {

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs3,
        },
    });
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
            if(Number($('.quantity-input').val()) < $('.quantity-input').attr('data-max')){
                $('.quantity-input').val(Number($('.quantity-input').val())+1) ;
            }else
                {
                    $('.quantity-input').val($('.quantity-input').attr('data-max'));
                }
            });
            $('.mines').on('click' , function(){
                if(Number($('.quantity-input').val()) > 2 ){
                    $('.quantity-input').val(Number($('.quantity-input').val())-1);
                }else{
                    $('.quantity-input').val(1);
                }

            });

    </script>
@endsection
