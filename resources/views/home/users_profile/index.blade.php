@extends('home.layouts.home')
@section('title')
     پروفایل
@endsection

@section('content')

<div class="container-fluid my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">پروفایل</li>
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
                                            <h3> پروفایل </h3>
                                            <div class="account-details-form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="first-name" class="required">
                                                                    نام
                                                                </label>
                                                                <input type="text" id="first-name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">
                                                                    نام خانوادگی
                                                                </label>
                                                                <input type="text" id="last-name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="email" class="required"> ایمیل </label>
                                                        <input type="email" id="email" disabled />
                                                    </div>

                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn "> تبت تغییرات </button>
                                                    </div>

                                                </form>
                                                <form action="#">
                                                    <fieldset>
                                                        <legend> تغییر پسورد </legend>
                                                        <div class="single-input-item">
                                                            <label for="current-pwd" class="required">
                                                                رمز عبور
                                                            </label>
                                                            <input type="password" id="current-pwd" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">
                                                                        رمز عبور جدید
                                                                    </label>
                                                                    <input type="password" id="new-pwd" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required"> تکرار
                                                                        رمز عبور </label>
                                                                    <input type="password" id="confirm-pwd" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn "> تغییر رمز عبور </button>
                                                    </div>
                                                </form>
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

@endsection

