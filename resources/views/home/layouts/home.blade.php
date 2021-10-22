<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="{{ asset('images/title-img.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    {{-- <link rel="stylesheet" href="{{ asset('css/home/main.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/home/style.css') }}"> --}}

    @yield('css')

    <title>Home - @yield('title')</title>

    {!! SEO::generate() !!}
</head>

<body>
    <div class="wrapper">
        <div id="overlayer"></div>
        <span class="loader">
            {{-- <span class="loader-inner"></span> --}}
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
        </span>

        @include('home.sections.header')

        @yield('content')




        @include('home.sections.footer')



    </div>

    <script src="{{ asset('js/home.js') }}"></script>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    {{-- <script src="{{ asset('js/home/script.js') }}"></script> --}}

    @include('sweet::alert')
    @yield('script')
    <script>
        // $(window).load(function(){
            $(".loader").delay(2000).fadeOut("slow");
            $("#overlayer").delay(2000).fadeOut("slow");
        // })
    </script>

    {!!  GoogleReCaptchaV3::init() !!}
</body>


</html>
