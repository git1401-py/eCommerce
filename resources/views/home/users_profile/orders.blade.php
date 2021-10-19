@extends('home.layouts.home')
@section('title')
     سفارشات
@endsection

@section('content')

<div class="container-fluid my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">سفارشات</li>
                  <li class="breadcrumb-item"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                </ol>
              </nav>
        </div>
    </div>
</div>


    <div class="container-fluid p-5 bg-white">
        <div class="row">

            <!-- my account wrapper start -->
        <div class="my-account-wrapper pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row text-right" style="direction: rtl;">
                                @include('home.sections.profile_sidebar')
                                <!-- My Account Tab Menu End -->
                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">

                                        <div class="myaccount-content">
                                            <h3>سفارشات</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th> سفارش </th>
                                                            <th> تاریخ </th>
                                                            <th> وضعیت </th>
                                                            <th> جمع کل </th>
                                                            <th> عملیات </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>3</td>
                                                            <td> 22 تیر 1399 </td>
                                                            <td>On Hold</td>
                                                            <td>
                                                                20000
                                                                تومان
                                                            </td>
                                                            <td>
                                                                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#productModal">
                                                                    <span class="span-magnifier"> نمایش جزئیات </span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
        </div>

    </div>

        <!-- Modal Order -->
        <div class="modal fade" id="ordersDetiles" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="direction: rtl;">
                                <form action="#">
                                    <div class="table-content table-responsive cart-table-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th> تصویر محصول </th>
                                                    <th> نام محصول </th>
                                                    <th> فی </th>
                                                    <th> تعداد </th>
                                                    <th> قیمت کل </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img src="assets/img/cart/cart-3.svg" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#"> لورم ایپسوم </a></td>
                                                    <td class="product-price-cart"><span class="amount">
                                                            20000
                                                            تومان
                                                        </span></td>
                                                    <td class="product-quantity">
                                                        2
                                                    </td>
                                                    <td class="product-subtotal">
                                                        40000
                                                        تومان
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img src="assets/img/cart/cart-4.svg" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#"> لورم ایپسوم متن ساختگی </a>
                                                    </td>
                                                    <td class="product-price-cart"><span class="amount">
                                                            10000
                                                            تومان
                                                        </span></td>
                                                    <td class="product-quantity">
                                                        3
                                                    </td>
                                                    <td class="product-subtotal">
                                                        30000
                                                        تومان
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img src="assets/img/cart/cart-5.svg" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#"> لورم ایپسوم </a></td>
                                                    <td class="product-price-cart"><span class="amount">
                                                            40000
                                                            تومان
                                                        </span></td>
                                                    <td class="product-quantity">
                                                        2
                                                    </td>
                                                    <td class="product-subtotal">
                                                        80000
                                                        تومان
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                <div class="modal-content text-end small" style="direction: rtl;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="direction: rtl;">
                                    <form action="#">
                                            <table class="table table-bordered table-hover table-responsive table-info table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> تصویر محصول </th>
                                                        <th> نام محصول </th>
                                                        <th> فی </th>
                                                        <th> تعداد </th>
                                                        <th> قیمت کل </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <a href="#"><img src="assets/img/cart/cart-3.svg" alt=""></a>
                                                        </td>
                                                        <td class="product-name"><a href="#"> لورم ایپسوم </a></td>
                                                        <td class="product-price-cart"><span class="amount">
                                                                20000
                                                                تومان
                                                            </span></td>
                                                        <td class="product-quantity">
                                                            2
                                                        </td>
                                                        <td class="product-subtotal">
                                                            40000
                                                            تومان
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <a href="#"><img src="assets/img/cart/cart-4.svg" alt=""></a>
                                                        </td>
                                                        <td class="product-name"><a href="#"> لورم ایپسوم متن ساختگی </a>
                                                        </td>
                                                        <td class="product-price-cart"><span class="amount">
                                                                10000
                                                                تومان
                                                            </span></td>
                                                        <td class="product-quantity">
                                                            3
                                                        </td>
                                                        <td class="product-subtotal">
                                                            30000
                                                            تومان
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <a href="#"><img src="assets/img/cart/cart-5.svg" alt=""></a>
                                                        </td>
                                                        <td class="product-name"><a href="#"> لورم ایپسوم </a></td>
                                                        <td class="product-price-cart"><span class="amount">
                                                                40000
                                                                تومان
                                                            </span></td>
                                                        <td class="product-quantity">
                                                            2
                                                        </td>
                                                        <td class="product-subtotal">
                                                            80000
                                                            تومان
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection

