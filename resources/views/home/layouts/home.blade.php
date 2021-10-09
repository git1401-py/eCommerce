<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="{{ asset('images/title-img.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/home/main.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/home/style.css') }}"> --}}

    @yield('css')

    <title>Home - @yield('title')</title>
</head>

<body>
    <div class="wrapper">

        <header class="header-area sticky-bar">
            <div class="main-header-wrap">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-3 col-lg-3">
                            <div class="header-right-wrap" style="padding-top: 40px">


                                <div class="setting-wrap">
                                    <button class="setting-active">
                                        <i class="sli sli-settings"></i>
                                    </button>
                                    <div class="setting-content">
                                        <ul class="text-right">
                                            <li><a href="login.html">ورود</a></li>
                                            <li>
                                                <a href="register.html">ایجاد حساب</a>
                                            </li>
                                            <li><a href="my-account.html">پروفایل</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cart-wrap">
                                    <button class="icon-cart-active">
                                        <span class="icon-cart">
                                            <i class="sli sli-bag"></i>
                                            <span class="count-style">02</span>
                                        </span>


                                        <span class="cart-price">
                                            500,000
                                        </span>
                                        <span>تومان</span>
                                    </button>
                                    <div class="shopping-cart-content">
                                        <div class="shopping-cart-top">
                                            <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                            <h4>سبد خرید</h4>
                                        </div>
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"> لورم ایپسوم </a></h4>
                                                    <span>1 x 90.00</span>
                                                </div>

                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt=""
                                                            src="{{ asset('img/cart/cart-1.svg') }}" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"> لورم ایپسوم </a></h4>
                                                    <span>1 x 9,000</span>
                                                </div>
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt=""
                                                            src="{{ asset('img/cart/cart-2.svg') }}" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total d-flex justify-content-between align-items-center"
                                                style="direction: rtl;">
                                                <h4>
                                                    جمع کل :
                                                </h4>
                                                <span class="shop-total">
                                                    25,000 تومان
                                                </span>
                                            </div>
                                            <div class="shopping-cart-btn btn-hover text-center">
                                                <a class="default-btn" href="checkout.html">
                                                    ثبت سفارش
                                                </a>
                                                <a class="default-btn" href="cart-page.html">
                                                    سبد خرید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-search">
                                    <a class="search-active" href="#"><i class="sli sli-magnifier"></i></a>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li class="angle-shape">
                                            <a href="about_us.html"> ارتباط با ما </a>
                                        </li>

                                        <li><a href="contact-us.html"> تماس با ما </a></li>

                                        <li class="angle-shape">
                                            <a href="shop.html"> فروشگاه </a>

                                            <ul class="mega-menu">
                                                <li>
                                                    <a class="menu-title" href="#">مردانه</a>

                                                    <ul>
                                                        <li><a href="shop.html">پیراهن</a></li>

                                                        <li>
                                                            <a href="#">تی شرت</a>
                                                        </li>

                                                        <li>
                                                            <a href="#">پالتو</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">لباس راحتی</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">لباس زیر </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li>
                                                    <a class="menu-title" href="#">زنانه</a>
                                                    <ul>
                                                        <li>
                                                            <a href="shop.html">مانتو</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">شومیز</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">دامن</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">پالتو</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> لباس راحتی </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li>
                                                    <a class="menu-title" href="#">بچه گانه</a>
                                                    <ul>
                                                        <li>
                                                            <a href="product-details.html">ست لباس</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-tab-2.html">شلوارک</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-tab-3.html">ژاکت</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-gallery.html">ست نوزاد</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-gallery-right.html">پیراهن</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="angle-shape">
                                            <a href="index.html"> صفحه اصلی </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2">
                            <div class="logo" style="padding-top: 40px">
                                <a href="index.html">
                                    <h3 class="font-weight-bold">SITE.ir</h3>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- main-search start -->
                <div class="main-search-active">
                    <div class="sidebar-search-icon">
                        <button class="search-close">
                            <span class="sli sli-close"></span>
                        </button>
                    </div>
                    <div class="sidebar-search-input">
                        <form>
                            <div class="form-search">
                                <input id="search" class="input-text" value="" placeholder=" ...جستجو " type="search" />
                                <button>
                                    <i class="sli sli-magnifier"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="header-small-mobile">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="header-right-wrap">
                                <div class="mobile-off-canvas">
                                    <a class="mobile-aside-button" href="#"><i class="sli sli-menu"></i></a>
                                </div>
                                <div class="cart-wrap">
                                    <button class="icon-cart-active">
                                        <span class="icon-cart">
                                            <i class="sli sli-bag"></i>
                                            <span class="count-style">02</span>
                                        </span>
                                        <span>تومان</span>
                                        <span class="cart-price">
                                            500,000
                                        </span>

                                    </button>
                                    <div class="shopping-cart-content">
                                        <div class="shopping-cart-top">
                                            <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                            <h4>سبد خرید</h4>
                                        </div>
                                        <ul style="height: 400px;">
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"> لورم ایپسوم </a></h4>
                                                    <span>1 x 90.00</span>
                                                </div>

                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt=""
                                                            src="{{ asset('img/cart/cart-1.svg') }}" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"> لورم ایپسوم </a></h4>
                                                    <span>1 x 9,000</span>
                                                </div>
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt=""
                                                            src="{{ asset('img/cart/cart-2.svg') }}" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total d-flex justify-content-between align-items-center"
                                                style="direction: rtl;">
                                                <h4>
                                                    جمع کل :
                                                </h4>
                                                <span class="shop-total">
                                                    25,000 تومان
                                                </span>
                                            </div>
                                            <div class="shopping-cart-btn btn-hover text-center">
                                                <a class="default-btn" href="checkout.html">
                                                    ثبت سفارش
                                                </a>
                                                <a class="default-btn" href="cart-page.html">
                                                    سبد خرید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <h4 class="font-weight-bold">SITE.ir</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-off-canvas-active">
            <a class="mobile-aside-close">
                <i class="sli sli-close"></i>
            </a>

            <div class="header-mobile-aside-wrap">
                <div class="mobile-search">
                    <form class="search-form" action="#">
                        <input type="text" placeholder=" ... جستجو " />
                        <button class="button-search">
                            <i class="sli sli-magnifier"></i>
                        </button>
                    </form>
                </div>

                <div class="mobile-menu-wrap">
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu text-right">
                                <li class="menu-item-has-children">
                                    <a href="index.html"> صفحه ای اصلی </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="shop.html">فروشگاه</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">مردانه</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html"> پیراهن </a></li>
                                                <li>
                                                    <a href="#"> تی شرت </a>
                                                </li>
                                                <li>
                                                    <a href="#"> پالتو </a>
                                                </li>
                                                <li>
                                                    <a href="#"> لباس راحتی </a>
                                                </li>
                                                <li>
                                                    <a href="#">لباس زیر</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">زنانه</a>
                                            <ul class="dropdown">
                                                <li>
                                                    <a href="product-details.html"> مانتو </a>
                                                </li>
                                                <li>
                                                    <a href="#"> شومیز </a>
                                                </li>
                                                <li>
                                                    <a href="#"> دامن </a>
                                                </li>
                                                <li>
                                                    <a href="#">پالتو </a>
                                                </li>
                                                <li>
                                                    <a href="#">لباس راحتی</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#"> بچه گانه </a>
                                            <ul class="dropdown">
                                                <li>
                                                    <a href="#"> ست لباس </a>
                                                </li>
                                                <li>
                                                    <a href="#"> شلوارک </a>
                                                </li>
                                                <li>
                                                    <a href="#"> ژاکت </a>
                                                </li>
                                                <li>
                                                    <a href="#"> ست نوزاد </a>
                                                </li>
                                                <li>
                                                    <a href="#"> پیراهن </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="contact-us.html">تماس با ما</a></li>

                                <li><a href="about_us.html"> در باره ما</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                </div>

                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <ul class="text-right">
                            <li class="my-3"><a href="login.html"> ورود </a></li>
                            <li class="my-3">
                                <a href="register.html"> ایجاد حساب </a>
                            </li>
                            <li class="my-3"><a href="my-account.html"> پروفایل </a></li>
                        </ul>
                    </div>
                </div>

                <div class="mobile-social-wrap text-center">
                    <a class="facebook" href="#"><i class="sli sli-social-facebook"></i></a>
                    <a class="twitter" href="#"><i class="sli sli-social-twitter"></i></a>
                    <a class="pinterest" href="#"><i class="sli sli-social-pinterest"></i></a>
                    <a class="instagram" href="#"><i class="sli sli-social-instagram"></i></a>
                    <a class="google" href="#"><i class="sli sli-social-google"></i></a>
                </div>
            </div>
        </div>
        <div class="body-overlay"></div>

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


    <footer class="footer-area bg-paleturquoise" style="direction: rtl;background: #cbf8f2;">
        <div class="container">
          <div class="row py-5 justify-content-center">
            <div class="col-md-8">
                <nav>
                    <ul class="list-group list-group-horizontal justify-content-center">
                      <li class="p-1 px-2"><a href="#">صفحه ای اصلی </a></li>
                      <li class="p-1 px-2"><a href="#">فروشگاه </a></li>
                      <li class="p-1 px-2"><a href="#">تماس با ما </a></li>
                      <li class="p-1 px-2"><a href="#">ارتباط با ما </a></li>
                    </ul>
                  </nav>
            </div>
          </div>
        </div>
        <div class="border-top">
          <div class="container">
            <div class="row align-items-center small text-muted">
              <div class="col-lg-4 col-md-5 col-12">
                <div class="text-muted pb-3">
                  <a href="#">اینستاگرام</a>
                  <a href="#">تویتر</a>
                  <a href="#">فیسبوک</a>
                  <a href="#">لینکدین</a>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-12">
                <div class=" text-center pb-3">
                  <p>Copyright © SITE.ir</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-3 col-12">
                <div class="payment-mathod pb-20">
                  <a href="#"><img src="assets/img/icon-img/payment.png" alt="" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </footer>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <h4 class="text-right mb-4">لورم ایپسوم</h4>
                                        <div class="product-details-price">
                                            <span class="fw-bolder" style="color:red; font-size: 24px">
                                                50,000
                                                تومان
                                            </span>
                                            <del>
                                                75,000
                                                تومان
                                            </del>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="p-4">
                                                <i class="sli sli-star text-warning"></i>
                                                <i class="sli sli-star text-warning"></i>
                                                <i class="sli sli-star text-warning"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </div>
                                            <span class=" px-4 small border-end">3 دیدگاه</span>
                                        </div>
                                        <p class="">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                            استفاده از طراحان گرافیک است. چاپگرها
                                            و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                        </p>
                                        <div class="pro-details-list">
                                            <ul class="">
                                                <li>- لورم ایپسوم</li>
                                                <li>- لورم ایپسوم متن ساختگی</li>
                                                <li>- لورم ایپسوم متن</li>
                                            </ul>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <span>سایز</span>
                                                <div class="my-2">
                                                    <ul class="list-group list-group-horizontal justify-content-end"
                                                        style="direction:ltr">
                                                        <li class="list-group-item bg-light p-1 px-2"><a
                                                                href="#">xxl</a></li>
                                                        <li class="list-group-item bg-light p-1 px-2"><a href="#">xl</a>
                                                        </li>
                                                        <li class="list-group-item bg-light p-1 px-2"><a href="#">l</a>
                                                        </li>
                                                        <li class="list-group-item bg-light p-1 px-2"><a href="#">m</a>
                                                        </li>
                                                        <li class="list-group-item bg-light p-1 px-2"><a href="#">s</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="text-muted d-flex align-items-center justify-content-center"
                                                style="width: 50px; height: 60px;">
                                                <span class="p-2" style="cursor: pointer">+</span>
                                                <input class="text-center" type="text" name="qtybutton"
                                                    style="width: 50px; height: 60px;" value="2" />
                                                <span class="p-2" style="cursor: pointer">-</span>
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
                                        <div class="mt-3">
                                            <span>دسته بندی :</span>
                                            <ul class="list-group list-group-horizontal justify-content-en">
                                                <li class="list-group-item p-0 border-0"><a href="#">مردانه,</a>
                                                </li>
                                                <li class="list-group-item p-0 border-0"><a href="#">پالتو</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="my-3">
                                            <span>تگ ها :</span>
                                            <ul class="list-group list-group-horizontal justify-content-en">
                                                <li class="list-group-item p-0 border-0"><a href="#">لباس, </a>
                                                </li>
                                                <li class="list-group-item p-0 border-0"><a href="#">Furniture,</a></li>
                                                <li class="list-group-item p-0 border-0"><a href="#">Electronic</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('img/product/quickview-l1.svg') }}"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('img/product/quickview-l2.svg') }}"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('img/product/quickview-l3.svg') }}"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>

                                    <!-- Thumbnail Large Image End -->
                                    <!-- Thumbnail Image End -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal end -->

    </div>

    <script src="{{ asset('js/home.js') }}"></script>
    {{-- <script src="{{ asset('js/home/script.js') }}"></script> --}}

    @include('sweet::alert')
    @yield('script')
</body>

</html>
