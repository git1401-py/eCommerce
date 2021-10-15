@extends('home.layouts.home')
@section('title')
     نظرات
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

                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">

                                        <div class="myaccount-content">
                                            <h3> نظرات </h3>
                                            <div class="review-wrapper">

                                                @foreach ($comments as $comment)

                                                    <div class="single-review">
                                                        <div class="review-img">
                                                            <img src="{{ $comment->user->avatar == null ? asset('/images/home/user.png') : $comment->user->avatar}}" alt="">
                                                        </div>
                                                        <div class="review-content w-100 text-right">
                                                            <p class="text-right">
                                                                {{ $comment->text }}
                                                            </p>
                                                            <div class="review-top-wrap">
                                                                <div class="review-name d-flex align-items-center">
                                                                    <h4>
                                                                        برای محصول :
                                                                    </h4>
                                                                    <a href="{{ route('home.products.show' , ['product' => $comment->product->slug]) }}" style="color:#ff3535;">
                                                                        {{ $comment->product->name }}
                                                                    </a>
                                                                </div>
                                                                <div>
                                                                    در تاریخ :
                                                                    <span class="small">{{ verta($comment->created_at)->format('%d %B, %Y') }}</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach


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

