@extends('home.layouts.home')
@section('title')
    تماس با ما
@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
@endsection

@section('content')

    <div class="slider-area2 mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
                        <div class="container">
                            <div class="breadcrumb-content text-center">
                                <ul>
                                    <li>
                                        <a href="index.html">صفحه ای اصلی</a>
                                    </li>
                                    <li class="active"> تماس با ما </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-area pt-2 pb-2 bg-white">
        <div class="container">
            <div class="row text-right" style="direction: rtl;">
                <div class="col-lg-5 col-md-6">
                    <div class="contact-info-area">
                        <h2> لورم ایپسوم متن </h2>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.
                        </p>
                        <div class="contact-info-wrap">
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="sli sli-location-pin"></i>
                                </div>
                                <div class="contact-info-content">
                                    <p> {{ $setting->address }} </p>
                                </div>
                            </div>
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="sli sli-envelope"></i>
                                </div>
                                <div class="contact-info-content">
                                    <p><a href="#">{{ $setting->telegram }}</a> / <a
                                            href="#">{{ $setting->instagram }}</a></p>
                                </div>
                            </div>
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="sli sli-screen-smartphone"></i>
                                </div>
                                <div class="contact-info-content">
                                    <p style="direction: ltr;"> {{ $setting->telephone }} / {{ $setting->telephone2 }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="contact-from contact-shadow">
                        <form id="contact-form" action="{{ route('home.contact-us.form') }}" method="POST">
                            @csrf
                            <input name="name" type="text" placeholder="نام شما" value="{{ old('name') }}">
                            @error('name')
                                <p class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            <input name="email" type="email" placeholder="ایمیل شما" value="{{ old('email') }}">
                            @error('email')
                                <p class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            <input name="subject" type="text" placeholder="موضوع پیام" value="{{ old('subject') }}">
                            @error('subject')
                                <p class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            <textarea name="message" placeholder="متن پیام">
                                    {{ old('message') }}
                                </textarea>
                            @error('message')
                                <p class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            <button class="submit" type="submit"> ارسال پیام </button>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
            <div class="contact-map pt-5">
                <div id="map" style="min-height: 180px;"></div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
    </script>
    <script>
        var mymap = L.map('map').setView([ {{ $setting->latitude }}, {{ $setting->longitude }} ], 12);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        }).addTo(mymap);

        var marker = L.marker([ {{ $setting->latitude }}, {{ $setting->longitude }} ]).addTo(mymap);

        marker.bindPopup("<div class='text-center text-info'><b>مرکز فروش</b><br>پوشاک.</div>").openPopup();

    </script>

@endsection
