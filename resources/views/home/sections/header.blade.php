<header class="header-area sticky-bar m-0">
    <div class="main-header-wrap bg-lightblue m-0">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-3">
                    <div class="header-right-wrap" style="padding-top: 40px; justify-content: flex-start;">


                        <div class="setting-wrap">
                            <button class="setting-active">
                                <i class="sli sli-settings"></i>
                            </button>
                            <div class="setting-content px-0 m-0">
                                <ul class="text-end px-0 pe-3">
                                    @auth
                                        <li class="my-3"><a href="{{ route('home.users_profile.index') }}"> پروفایل </a></li>
                                    @else
                                        <li class="my-3"><a href="{{ route('login') }}"> ورود </a></li>
                                        <li class="my-3">
                                            <a href="{{ route('login') }}"> ایجاد حساب </a>
                                        </li>
                                    @endauth
                                    <li class="my-3"><a href="{{ route('home.compare.index') }}"> مقایسه محصولات انتخابی </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cart-wrap">
                            <button class="icon-cart-active">

                                @if (!\Cart::isEmpty())
                                    <span>تومان</span>
                                    <span class="cart-price">
                                        {{ number_format(\Cart::getTotal()) }}
                                    </span>
                                @endif
                                <span class="icon-cart">
                                    <i class="sli sli-bag"></i>
                                    @if (!\Cart::isEmpty())
                                        <span class="count-style">
                                            {{ \Cart::getContent()->count() }}
                                        </span>
                                    @endif
                                </span>

                            </button>
                            @if (\Cart::isEmpty())
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                        <h4>سبد خرید</h4>
                                    </div>
                                    <p>سبد خرید شما خالی هست</p>
                                    <div class="shopping-cart-bottom">

                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="{{ route('home.index') }}">
                                                فروشگاه
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                        <h4>سبد خرید</h4>
                                    </div>
                                    <div class=""  style="height: 300px">
                                        <ul class="p-0 pt-2 m-0" dir="ltr">
                                            @foreach (\Cart::getContent() as $item)
                                                <li class="single-shopping-cart p-0">
                                                    <div class="shopping-cart-title p-1 m-0">
                                                        <h4>
                                                            <a href="#">
                                                                {{ $item->name }}
                                                            </a>
                                                        </h4>
                                                        <span>{{ $item->quantity }} x {{ number_format($item->price) }}</span>
                                                        <div class="small text-gray-500" dir="rtl">
                                                            {{  \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                                            :
                                                            {{ $item->attributes->value }}
                                                        </div>
                                                        @if($item->attributes->is_sale)
                                                            <div class="small text-danger" dir="rtl" >
                                                                %{{ $item->attributes->persent_sale }} تخفیف
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="shopping-cart-img">
                                                        <a href="{{ route('home.products.show' , ['product' => $item->associatedModel->slug]) }}">
                                                            <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->associatedModel->primary_image) }}" alt="{{ $item->name }}" />
                                                        </a>
                                                        <div class="item-close">
                                                            <a href="{{ route('home.cart.remove' , ['rowId' => $item->id]) }}">
                                                                <i class="sli sli-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                    <div class="shopping-cart-bottom position-relative ms-5">
                                        <div class="shopping-cart-total d-flex justify-content-between align-items-center"
                                            style="direction: rtl;">
                                            <h4>
                                                جمع کل :
                                            </h4>
                                            <span class="shop-total">
                                                {{ number_format(\Cart::getTotal()) }}
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="{{ route('home.orders.checkout') }}">
                                                ثبت سفارش
                                            </a>
                                            <a class="default-btn" href="{{ route('home.cart.index') }}">
                                                سبد خرید
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
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

                                <li class="">
                                    <a href="{{ route( 'home.index' ) }}"> صفحه اصلی </a>
                                </li>
                                <li class="angle-shape">
                                    <a style="cursor:pointer"> فروشگاه </a>

                                    @php
                                        $parentCategories = App\Models\Category::where('parent_id' , 0)->get();
                                    @endphp
                                    <ul class="mega-menu">

                                        @foreach ($parentCategories as $parentCategory)
                                        <li>
                                            <a class="menu-title">{{ $parentCategory->name }}</a>
                                            {{-- <a class="menu-title" href="{{ route('home.categories.show' , ['category' => $parentCategory->slug]) }}">{{ $parentCategory->name }}</a> --}}

                                            <ul>
                                                @foreach ($parentCategory->children as $childCategory)
                                                    <li><a href="{{ route('home.categories.show' , ['category' => $childCategory->slug]) }}">{{ $childCategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>

                                <li class="">
                                    <a href="{{ route('home.about-us') }}"> درباره ما </a>
                                </li>

                                <li><a href="{{ route('home.contact-us') }}"> تماس با ما </a></li>

                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2">
                    <div class="logo" style="padding-top: 40px">
                        <a href="{{ route( 'home.index' ) }}">
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
            <div class="row align-items-center justify-content-start">
                <div class="col-6">
                    <div class="header-right-wrap d-flex justify-content-start">
                        <div class="mobile-off-canvas">
                            <a class="mobile-aside-button" href="#"><i class="sli sli-menu"></i></a>
                        </div>
                        <div class="cart-wrap">
                            <button class="icon-cart-active">

                                @if (!\Cart::isEmpty())
                                    <span>تومان</span>
                                    <span class="cart-price">
                                        {{ number_format(\Cart::getTotal()) }}
                                    </span>
                                @endif
                                <span class="icon-cart">
                                    <i class="sli sli-bag"></i>
                                    @if (!\Cart::isEmpty())
                                        <span class="count-style">
                                            {{ \Cart::getContent()->count() }}
                                        </span>
                                    @endif
                                </span>

                            </button>
                            @if (\Cart::isEmpty())
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                        <h4>سبد خرید</h4>
                                    </div>
                                    <p>سبد خرید شما خالی هست</p>
                                    <div class="shopping-cart-bottom">

                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="{{ route('home.index') }}">
                                                فروشگاه
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                        <h4>سبد خرید</h4>
                                    </div>
                                    <div class=""  style="height: 300px">
                                        <ul class="p-0 pt-2 m-0" dir="ltr">
                                            @foreach (\Cart::getContent() as $item)
                                                <li class="single-shopping-cart p-0">
                                                    <div class="shopping-cart-title p-1 m-0">
                                                        <h4>
                                                            <a href="#">
                                                                {{ $item->name }}
                                                            </a>
                                                        </h4>
                                                        <span>{{ $item->quantity }} x {{ number_format($item->price) }}</span>
                                                        <div class="small text-gray-500" dir="rtl">
                                                            {{  \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                                            :
                                                            {{ $item->attributes->value }}
                                                        </div>
                                                        @if($item->attributes->is_sale)
                                                            <div class="small text-danger" dir="rtl" >
                                                                %{{ $item->attributes->persent_sale }} تخفیف
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="shopping-cart-img">
                                                        <a href="{{ route('home.products.show' , ['product' => $item->associatedModel->slug]) }}">
                                                            <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->associatedModel->primary_image) }}" alt="{{ $item->name }}" />
                                                        </a>
                                                        <div class="item-close">
                                                            <a href="{{ route('home.cart.remove' , ['rowId' => $item->id]) }}">
                                                                <i class="sli sli-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                    <div class="shopping-cart-bottom position-relative ms-5">
                                        <div class="shopping-cart-total d-flex justify-content-between align-items-center"
                                            style="direction: rtl;">
                                            <h4>
                                                جمع کل :
                                            </h4>
                                            <span class="shop-total">
                                                {{ number_format(\Cart::getTotal()) }}
                                                <span>تومان</span>
                                            </span>
                                        </div>
                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="{{ route('home.orders.checkout') }}">
                                                ثبت سفارش
                                            </a>
                                            <a class="default-btn" href="{{ route('home.cart.index') }}">
                                                سبد خرید
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-6">
                    <div class="mobile-logo d-flex justify-content-end">
                        <a href="{{ route( 'home.index' ) }}">
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

    <div class="header-mobile-aside-wrap  bg-lightblue">
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
                    <ul class="mobile-menu text-end">
                        <li class="menu-item-has-children">
                            <a href="{{ route( 'home.index' ) }}"> صفحه ای اصلی </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">فروشگاه</a>

                            @php
                                $parentCategories = App\Models\Category::where('parent_id' , 0)->get();
                            @endphp
                        <ul class="dropdown">

                            @foreach ($parentCategories as $parentCategory)
                            <li class="menu-item-has-children">
                                {{-- <a class="" href="{{ route('home.categories.show' , ['category' => $parentCategory->slug]) }}">{{ $parentCategory->name }}</a> --}}
                                <a class="" >{{ $parentCategory->name }}</a>

                                <ul class="dropdown">
                                    @foreach ($parentCategory->children as $childCategory)
                                        <li><a href="{{ route('home.categories.show' , ['category' => $childCategory->slug]) }}">{{ $childCategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach

                        </ul>
                        </li>

                        <li><a href="{{ route('home.contact-us') }}">تماس با ما</a></li>

                        <li><a href="{{ route('home.about-us') }}"> در باره ما</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
        </div>

        <div class="mobile-curr-lang-wrap">
            <div class="single-mobile-curr-lang">
                <ul class="text-end">
                    @auth
                        <li class="my-3"><a href="{{ route('home.users_profile.index') }}"> پروفایل </a></li>
                    @else
                        <li class="my-3"><a href="{{ route('login') }}"> ورود </a></li>
                        <li class="my-3">
                            <a href="{{ route('login') }}"> ایجاد حساب </a>
                        </li>
                    @endauth
                    <li class="my-3"><a href="{{ route('home.compare.index') }}"> مقایسه محصولات انتخابی </a></li>

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
