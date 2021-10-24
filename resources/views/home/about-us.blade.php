@extends('home.layouts.home')
@section('title')
    درباره ما
@endsection

@section('content')

<div class="container-fluid bg-gray-200 my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
                  <li class="breadcrumb-item"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                </ol>
              </nav>
        </div>
    </div>
</div>

<div class="about-story-area pt-2 pb-2 bg-white" style="direction: rtl;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="story-img">
                    <a href="#"><img src="{{ asset('img/banner/about_us.jpg') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="story-details pl-2">
                    <div class="story-details-top">
                        <h2> خوش آمدید به  <span> SITE.ir</span></h2>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                        </p>
                    </div>
                    <div class="story-details-bottom">
                        <h4> لورم ایپسوم متن ساختگی </h4>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                        </p>
                    </div>
                    <div class="story-details-bottom">
                        <h4> لورم ایپسوم متن ساختگی </h4>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                        </p>
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

@endsection
