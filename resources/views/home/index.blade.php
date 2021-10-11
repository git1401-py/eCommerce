@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection

@section('content')

<div class="slider-area2 mb-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="{{ $sliders[0]->name }}"></button>
                        @foreach ($sliders as $key => $slider)
                            @if($key != 0)
                            {{-- <img src="{{ asset('img/product/product-1.svg') }}" style="width:40px;height:40px;" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}"
                            aria-label="{{ $slider->name }}"> --}}
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}"
                                        aria-label="{{ $slider->name }}">


                                    </button>
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="right-carousel col-sm-6">

                                    <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $sliders[0]->image) }}" class="animated d-block w-100"
                                        style="height:400px;" alt="{{ $sliders[0]->name }}">
                                </div>
                                <div
                                    class="left-carousel col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="carousel-title">
                                        <h1 class="animated display-3">{{ $sliders[0]->title }}</h1>
                                        <p class="animated m-3">
                                            {{ $sliders[0]->text }}
                                        </p>
                                        <div class="btn btn-outline-dark">
                                            <a class="animated" href="{{ $sliders[0]->button_link }}">
                                                <i class="{{ $sliders[0]->button_icon }}"></i>
                                                {{ $sliders[0]->button_text }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($sliders as $key => $slider)
                            @if ($key != 0){
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="right-carousel col-sm-6">

                                            <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $slider->image) }}" class="animated d-block w-100"
                                                style="height:400px;" alt="{{ $slider->name }}">
                                        </div>
                                        <div
                                            class="left-carousel col-sm-6 d-flex align-items-center justify-content-center">
                                            <div class="carousel-title">
                                                <h1 class="animated display-3">{{ $slider->title }}</h1>
                                                <p class="animated m-3">
                                                    {{ $slider->text }}
                                                </p>
                                                <div class="btn btn-outline-dark">
                                                    <a class="animated" href="{{ $slider->button_link }}">
                                                        <i class="{{ $slider->button_icon }}"></i>
                                                        {{ $slider->button_text }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            }

                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <div class=" bg-light rounded-circle border border-1">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">قبلی</span>
                        </div>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <div class=" bg-light rounded-circle border border-1">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">بعدی</span>
                        </div>

                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner-area mt-5 pt-5">
    <div class="container">
        <div class="row ">
            @foreach ($indexTopBanners->chunk(3)->first() as $banner)
                <div class="col-lg-4 col-md-4 mb-4">
                    <div class="card banner">
                        <a href=""><img class="w-100 h-100" src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                alt="{{ $banner->name }}" /></a>
                        <div class="banner-top">
                            <h5>{{ $banner->title }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            @foreach ($indexTopBanners->chunk(3)->last() as $banner)
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="{{ $loop->last ? 'card banner d-flex align-items-center justify-content-center' : 'card banner'}}">
                    <a href=""><img class="w-100 h-100" src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                            alt="{{ $banner->name }}" /></a>
                    <div class="{{ $loop->last ? 'banner-bottom-left' : 'banner-bottom-right'}}">
                        <h5>{{ $banner->title }}</h5>
                        <h4>{{ $banner->text }} <br />متن</h4>
                        <a class="small" href="{{ $banner->button_link }}">{{ $banner->button_text }}</a>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
    </div>
</div>

 <!-- Swiper -->

<div class="product-area mt-5 pt-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 text-center">
                <h2> لورم ایپسوم </h2>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                    چاپگرها و متون
                    بلکه روزنامه و مجله
                </p>
            </div>
        </div>
        <div class="row">
            <ul class="nav justify-content-center nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#men">مردانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#women">زنانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#children">بچه گانه</a>
                </li>
            </ul>
        </div>
        <div class="container-tab row mt-3">
            <div class="tab-content show" id="men">
                <div class="swiper swiper-men">
                    <div class="swiper-wrapper  pb-3">
                        @foreach ($products as $product)
                        <div class="swiper-slide p-0" style="height:93%">
                            <div class="card position-relative m-0" style="width: 100%;height: 100%;">
                                <a href="#">
                                    <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                        alt="{{ $product->name }}" class="w-100 h-100">
                                </a>
                                <div class="product-action position-absolute top-0" style="left:50px;">
                                    <div class="ht-product-action bg-warning">
                                        <ul class="">
                                            <li>
                                                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#productModal-{{$product->id}}">
                                                    <i class="sli sli-magnifier"></i>
                                                    <span class="span-magnifier"> مشاهده سریع </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="sli sli-heart"></i><span class=" span-heart"> افزودن
                                                        به
                                                        علاقه مندی ها </span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="sli sli-refresh"></i><span class="span-refresh">
                                                        مقایسه
                                                    </span></a>
                                            </li>
                                            {{-- <li>
                                                <a href="#"><i class="sli sli-bag"></i><span class="span-bag"> افزودن به سبد
                                                        خرید </span></a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="small p-2">
                                    <h5 class="text-end mb-4"><a href="#">{{ $product->name }}</a></h5>
                                    <div class="text-end">
                                        @if ($product->quantity_check)

                                            @if ($product->sale_check)
                                                <span class="fw-bolder" style="color:red; font-size: 18px">
                                                    {{ number_format($product->sale_check->sale_price) }}
                                                    تومان
                                                </span>
                                                <del class="small">
                                                    {{ number_format($product->sale_check->price) }}

                                                    تومان
                                                </del>
                                            @else
                                                <span class="fw-bolder" style="color:red; font-size: 18px">
                                                    {{ number_format($product->price_check->price) }}
                                                    تومان
                                                </span>
                                            @endif

                                        @else
                                        <span class="badge rounded-pill bg-danger bg-opacity-75">
                                            ناموجود
                                            <span class="visually-hidden">unread messages</span>
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
                                </div>
                            </div>
                          </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination bg-light" style="margin-bottom: 0px"></div>
                  </div>

            </div>
            <div class="tab-content" id="women">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 bg-danger">bb
                    <div class="card"><img src="{{ asset('img/product/product-5.svg') }}"
                            class="w-100 h-100"></div>
                </div>
            </div>
            <div class="tab-content" id="children">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 bg-danger">cc
                    <div class="card"><img src="{{ asset('img/product/product-9.svg') }}"
                            class="w-100 h-100"></div>
                </div>
            </div>


        </div>
    </div>
</div>

    <div class="gallery-thumbs2" style="visibility: hidden">
    </div>
<!-- Modal -->
@foreach ($products as $product)
    <div class="modal fade" id="productModal-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable  modal-xl">
            <div class="modal-content text-end small" style="direction: rtl;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <div class="">
                                    <h4 class="text-right mb-4">{{ $product->name }}</h4>
                                    <div class="text-end variation-price">
                                        @if ($product->quantity_check)

                                            @if ($product->sale_check)
                                                <span class="fw-bolder text-danger fa-4x" >
                                                    {{ number_format($product->sale_check->sale_price) }}
                                                    تومان
                                                </span>
                                                <del class="small">
                                                    {{ number_format($product->sale_check->price) }}

                                                    تومان
                                                </del>
                                            @else
                                                <span class="fw-bolder text-danger fa-4x">
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

                                                <span> {{ App\Models\Attribute::find($product->variations()->first()->attribute_id)->name }}</span>
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
                                                <input class="text-center box quantity-input" type="text" name="qtybutton"
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
                    </div>
                </div>

            </div>
        </div>
    </div>

@endforeach
<!-- Modal end -->

<div class="employments m-3" style="background: #cbf8f2;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="single-testimonial text-center">
                            <img src="{{ asset('img/testimonial/testi-1.png') }}" alt="" />
                            <p>
                              لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                              متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                              کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و
                              آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت
                            </p>
                            <div class="client-info">
                              <img src="{{ asset('img/icon-img/testi.png') }}" alt="" />
                              <h5>لورم ایپسوم</h5>
                            </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <div class="text-center">
                            <img src="{{ asset('img/testimonial/testi-2.png') }}" alt="" />
                            <p class="my-3">
                              لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                              متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                              کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و
                              آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت
                            </p>
                            <div class="">
                              <img src="{{ asset('img/icon-img/testi.png') }}" alt="" />
                              <h5>لورم ایپسوم</h5>
                            </div>
                          </div>
                      </div>

                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="banner-area mt-5 pt-5">
    <div class="container">

        <div class="row mt-4">
            @foreach ($indexBottomBanners as $banner)
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="card banner">
                        <a href=""><img class="w-100 h-100" src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                alt="" /></a>
                        <div class="{{ $loop->last ? 'bannerB-left' : 'bannerB-right'}}">
                            <h5>{{ $banner->title }}</h5>
                            <h4>{{ $banner->text }}</h4>
                            <a class="small" href="{{ $banner->button_link }}">{{ $banner->button_text }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

<div class="feature-area2" style="direction: rtl;">
    <div class="container">
      <div class="row  my-5 ">
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <div class="single-feature">
            <div class="feature-icon">
              <img src="{{ asset('img/icon-img/free-shipping.png') }}" alt="" />
            </div>
            <div class="feature-content">
              <h4>لورم ایپسوم</h4>
              <p>لورم ایپسوم متن ساختگی</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <div class="single-feature text-right mb-40 pl-50">
            <div class="feature-icon">
              <img src="{{ asset('img/icon-img/support.png') }}" alt="" />
            </div>
            <div class="feature-content">
              <h4>لورم ایپسوم</h4>
              <p>24x7 لورم ایپسوم</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <div class="single-feature text-right mb-40">
            <div class="feature-icon">
              <img src="{{ asset('img/icon-img/security.png') }}" alt="" />
            </div>
            <div class="feature-content">
              <h4>لورم ایپسوم</h4>
              <p>لورم ایپسوم متن ساختگی</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('script')

    <script>
        var swiper = new Swiper('.swiper-men', {
            slidesPerView: 1,
            spaceBetween: 10,
            // init: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                530: {
                slidesPerView: 2,
                spaceBetween: 20,
                },
                640: {
                slidesPerView: 2,
                spaceBetween: 20,
                },
                768: {
                slidesPerView: 3,
                spaceBetween: 40,
                },
                1024: {
                slidesPerView: 4,
                spaceBetween: 50,
                },
            }
        });
    // var galleryThumbs2 = new Swiper('.gallery-thumbs2', {});

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
        // thumbs: {
        //     swiper: galleryThumbs2,
        // },
    });
    $('.variation-select').on('change' , function(){
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price');
            variationPriceDiv.empty();

            if(variation.is_sale){
                let spanSale = $('<span />' , {
                    class : 'fw-bolder text-danger fa-4x',
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
                    class : 'fw-bolder text-danger fa-4x',
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
