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

        @include('home.sections.header')

        @yield('content')




        @include('home.sections.footer')

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
