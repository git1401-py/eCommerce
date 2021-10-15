@extends('home.layouts.home')
@section('title')
     لیست علاقه مندی ها
@endsection

@section('content')

<div class="container-fluid my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">لیست علاقه مندی ها</li>
                  <li class="breadcrwishlistumb-item"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
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
                                        <!-- Single Tab Content Start -->
                                        <div class="myaccount-content">
                                            <h3> لیست علاقه مندی ها </h3>
                                                <div class="review-wrapper">
                                                    @if ($wishlist->isEmpty())
                                                        <div class="alert alert-danger">
                                                            لیست علاقه مندی های شما خالی می باشد.
                                                        </div>
                                                    @else
                                                        <table class="table table-striped table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th> تصویر محصول </th>
                                                                <th> نام محصول </th>
                                                                <th> حذف </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($wishlist as $item)
                                                                    <tr>
                                                                        <td class="product-thumbnail">
                                                                            <a href="{{ route('home.products.show' , ['product' => $item->product->slug]) }}">
                                                                                <img style="width: 50px; height:50px;"
                                                                                    src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->product->primary_image) }}" alt="{{ $item->product->name }}"
                                                                                    >
                                                                            </a>
                                                                        </td>
                                                                        <td class="product-name">
                                                                            <a href="{{ route('home.products.show' , ['product' => $item->product->slug]) }}">
                                                                                {{ $item->product->name }}
                                                                            </a>
                                                                        </td>
                                                                        <td class="product-name">
                                                                            <a href="{{ route('home.wishlist.remove' , ['product' => $item->product->id]) }}"> <i class="sli sli-trash" style="font-size: 20px"></i> </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @endif

                                                </div>
                                        </div>
                                        <!-- Single Tab Content End -->


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

