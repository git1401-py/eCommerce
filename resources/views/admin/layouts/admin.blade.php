<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="{{ asset('images/title-img.png') }}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/offcanvas.css') }}">

    @yield('css')

    <title>Admin - @yield('title')</title>
</head>

<body>
    <div class="position-relative top-0">
        <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark"
            aria-label="Main navigation">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Dashboard</a>
              <button class="navbar-toggler p-0 border-0"
                    type="button"
                    data-bs-toggle="offcanvas"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <div class="container-fluid">
                    <div class="row">
                        <!--  sidebar  -->
                        @include('admin.sections.sidebar')
                        <!--  End of sidebar  -->

                        <!--  top-nav  -->
                        @include('admin.sections.topbar')
                        <!--  End of top-nav  -->

                    </div>
                </div>
              </div>
            </div>
          </nav>
        {{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
            <div class="container-fluid bg-success">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample04" aria-controls="navbarsExample04"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse p-0 m-0 bg-danger" id="navbarsExample04">
                    <div class="container-fluid bg-warning">
                        <div class="row">
                            <!--  sidebar  -->
                            @include('admin.sections.sidebar')
                            <!--  End of sidebar  -->

                            <!--  top-nav  -->
                            @include('admin.sections.topbar')
                            <!--  End of top-nav  -->

                        </div>
                    </div>
                </div>
            </div>
        </nav> --}}

        <!-- navbar -->
        <nav class="navbar navbar-expand-md navbar-light">

            <div class="collapse navbar-collapse" id="myNavbar">
                <div class="container-fluid">
                    <div class="row">
                        <!--  sidebar  -->
                        @include('admin.sections.sidebar')
                        <!--  End of sidebar  -->

                        <!--  top-nav  -->
                        @include('admin.sections.topbar')
                        <!--  End of top-nav  -->

                    </div>
                </div>
            </div>
        </nav>
        <!-- End of navbar -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 me-auto ">

                    @yield('content')
                </div>
            </div>
        </div>

        <!-- footer -->
        @include('admin.sections.footer')
        <!-- end of footer -->
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin/script.js') }}"></script>
    <script src="{{ asset('js/admin/offcanvas.js') }}"></script>

    @include('sweet::alert')
    @yield('script')
</body>

</html>
