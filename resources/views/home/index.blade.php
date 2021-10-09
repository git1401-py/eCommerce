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
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="right-carousel col-sm-6">

                                    <img src="{{ asset('img/slider/1.jfif') }}" class="animated d-block w-100"
                                        style="height:400px;" alt="...">
                                </div>
                                <div
                                    class="left-carousel col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="carousel-title">
                                        <h1 class="animated display-3">لورم ایپسوم</h1>
                                        <p class="animated m-3">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                            و با استفاده از طراحان گرافیک است
                                        </p>
                                        <div class="btn btn-outline-dark">
                                            <a class="animated" href="shop.html">
                                                <i class="sli sli-basket-loaded"></i>
                                                فروشگاه
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-6">

                                    <img src="{{ asset('img/slider/2.jfif') }}"
                                        class="right-carousel d-block w-100" style="height:400px;"
                                        alt="...">
                                </div>
                                <div
                                    class="left-carousel col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="carousel-title">
                                        <h1 class=" display-3">لورم ایپسوم</h1>
                                        <p class=" m-3">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                            و با استفاده از طراحان گرافیک است
                                        </p>
                                        <div class="btn btn-outline-dark">
                                            <a class="animated" href="shop.html">
                                                <i class="sli sli-basket-loaded"></i>
                                                فروشگاه
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item ">
                            <div class="row">
                                <div class="right-carousel col-sm-6">

                                    <img src="{{ asset('img/slider/slider-hm3-2.png') }}"
                                        class="animated d-block w-100" style="height:400px;" alt="...">
                                </div>
                                <div
                                    class="left-carousel col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="carousel-title">
                                        <h1 class="animated display-3">لورم ایپسوم</h1>
                                        <p class="animated m-3">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                            و با استفاده از طراحان گرافیک است
                                        </p>
                                        <div class="btn btn-outline-dark">
                                            <a class="animated" href="shop.html">
                                                <i class="sli sli-basket-loaded"></i>
                                                فروشگاه
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

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
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="card banner">
                    <a href=""><img class="w-100 h-100" src="{{ asset('img/banner/banner-6.png') }}"
                            alt="" /></a>
                    <div class="banner-top">
                        <h5>زنانه</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="card banner">
                    <a href=""><img class="w-100 h-100" src="{{ asset('img/banner/banner-7.png') }}"
                            alt="" /></a>
                    <div class="banner-top">
                        <h5>جین</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="card banner">
                    <a href=""><img class="w-100 h-100" src="{{ asset('img/banner/banner-8.png') }}"
                            alt="" /></a>
                    <div class="banner-top">
                        <h5>مردانه</h5>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card banner">
                    <a href=""><img class="w-100 h-100" src="{{ asset('img/banner/banner-9.png') }}"
                            alt="" /></a>
                    <div class="banner-bottom-right">
                        <h5>لورم ایپسوم</h5>
                        <h4>لورم ایپسوم <br />متن</h4>
                        <a class="small" href="">فروشگاه</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card banner d-flex align-items-center justify-content-center">
                    <a href=""><img class="w-100 h-100" src="{{ asset('img/banner/banner-10.png') }}"
                            alt="" /></a>
                    <div class="banner-bottom-left">
                        <h4>لورم ایپسوم متن ساختگی</h4>
                        <a class="small" href="">فروشگاه</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        <div class="container-tab row">
            <div class="tab-content row show" id="men">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-3">
                    <div class="card position-relative">
                        <a href="#">
                            <img src="{{ asset('img/product/product-1.svg') }}" class="w-100 h-100">
                        </a>
                        <div class="ht-product-action position-absolute">
                            <ul>
                                <li>
                                    <a href="#" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                <li>
                                    <a href="#"><i class="sli sli-bag"></i><span class="span-bag"> افزودن به سبد
                                            خرید </span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="small p-2">
                            <h5 class="text-right mb-4">لورم ایپسوم</h5>
                            <div class="product-details-price">
                                <span class="fw-bolder" style="color:red; font-size: 18px">
                                    50,000
                                    تومان
                                </span>
                                <del>
                                    75,000
                                    تومان
                                </del>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="my-2 small">
                                    <i class="sli sli-star text-warning"></i>
                                    <i class="sli sli-star text-warning"></i>
                                    <i class="sli sli-star text-warning"></i>
                                    <i class="sli sli-star"></i>
                                    <i class="sli sli-star"></i>
                                </div>
                                <span class="small border-end">___لورم</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-3">
                    <div class="card"><img src="{{ asset('img/product/product-2.svg') }}"
                            class="w-100 h-100"></div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-3">
                    <div class="card"><img src="{{ asset('img/product/product-3.svg') }}"
                            class="w-100 h-100"></div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-3">
                    <div class="card"><img src="{{ asset('img/product/product-4.svg') }}"
                            class="w-100 h-100"></div>
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
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card banner">
                    <a href=""><img class="w-100 h-100" src="{{ asset('img/banner/banner-4.png') }}"
                            alt="" /></a>
                    <div class="bannerB-right">
                        <h5>لورم ایپسوم</h5>
                        <h4>لورم ایپسوم <br />متن</h4>
                        <a class="small" href="">فروشگاه</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card banner d-flex align-items-center justify-content-center">
                    <a href=""><img class="w-100 h-100" src="{{ asset('img/banner/banner-5.png') }}"
                            alt="" /></a>
                    <div class="bannerB-left">
                        <h5>لورم ایپسوم</h5>
                        <h4>لورم ایپسوم </h4>
                        <a class="small" href="">فروشگاه</a>
                    </div>
                </div>
            </div>
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
