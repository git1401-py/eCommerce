@extends('home.layouts.home')
@section('title')
    ورود
@endsection

@section('content')

    <div class="container-fluid my-2">
        <div class="row justify-content-start align-items-center p-3">
            <div class="col-4">

                <nav dir="ltr" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">فروشگاه</li>
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white py-5">
        <div class="container pb-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session('status'))
                        <div class="mb-4 font-medium small text-primary">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header text-center">ورود</div>

                        <div class="card-body p-5">
                            <form id="loginForm">

                                <div class="form-group row mb-3">
                                    <label for="cellphone" class="col-md-4 col-form-label text-md-right">شماره تلفن
                                        همراه</label>

                                    <div class="col-md-6">
                                        <input id="cellphone" type="text" dir="ltr" class="form-control" required
                                            autocomplete="cellphone" autofocus>

                                        <span id="sellphoneError" class="invalid-feedback" role="alert">
                                            <strong id="sellphoneErrorText"></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 d-flex align-items-center justify-content-between">
                                        <button type="submit" class="btn btn-outline-danger px-5">
                                            ارسال
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <form id="checkOTPForm">

                                <div class="form-group row mb-3">
                                    <label for="checkOTPInput" class="col-md-4 col-form-label text-md-right"> رمز یکبار مصرف
                                    </label>

                                    <div class="col-md-6">
                                        <input id="checkOTPInput" type="text" dir="ltr" class="form-control">

                                        <span id="checkOTPInputError" class="invalid-feedback" role="alert">
                                            <strong id="checkOTPInputErrorText"></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 d-flex align-items-center justify-content-between">
                                        <button type="submit" class="btn btn-outline-danger px-5">
                                            ورود
                                        </button>
                                        <div>
                                            <button id="resendOTPButton" class="btn btn-sm btn-info" type="button">ارسال
                                                مجدد</button>
                                            <span id="resendOTPTime"></span>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let loginToken;

        $('#checkOTPForm').hide();
        $('#resendOTPButton').hide();
        $('#loginForm').submit(function(event) {
            event.preventDefault();


            $.post("{{ url('/login') }}", {

                '_token': "{{ csrf_token() }}",
                'cellphone': $('#cellphone').val()

            }, function(response, status) {

                loginToken = response.login_token;
                swal({
                    icon: 'success',
                    text: 'رمز یکبار مصرف برای شما ار سال شد',
                    button: 'حله!',
                    timer: 4000
                });
                $('#loginForm').fadeOut();
                $('#checkOTPForm').fadeIn();
                timer();

            }).fail(function(response) {

                $('#sellphoneError').fadeIn();
                $('#sellphoneErrorText').html(response.responseJSON.errors.cellphone[0]);
            });

        });
        $('#checkOTPForm').submit(function(event) {
            event.preventDefault();


            $.post("{{ url('/check-otp') }}", {

                '_token': "{{ csrf_token() }}",
                'otp': $('#checkOTPInput').val(),
                'login_token': loginToken

            }, function(response, status) {

                if ($('#cellphone').val() == '09941135190' || $('#cellphone').val() == '9941135190') {
                    swal({
                        icon: 'success',
                        text: 'مدیر عزیز خوش آمدید',
                        button: 'حله!',
                        timer: 4000
                    });
                    $(location).attr('href', "{{ route('dashboard') }}");
                } else {
                    swal({
                        icon: 'success',
                        text: 'کاربر گرامی خوش آمدید',
                        button: 'حله!',
                        timer: 4000
                    });
                    $(location).attr('href', "{{ route('home.index') }}");
                }

            }).fail(function(response) {

                $('#checkOTPInputError').fadeIn();
                $('#checkOTPInputErrorText').html(response.responseJSON.errors.otp);
            });

        });

        $('#resendOTPButton').click(function(event) {
            event.preventDefault();


            $.post("{{ url('/resend-otp') }}", {

                '_token': "{{ csrf_token() }}",
                'login_token': loginToken

            }, function(response, status) {

                loginToken = response.login_token;
                swal({
                    icon: 'success',
                    text: 'رمز یکبار مصرف برای شما ار سال شد',
                    button: 'حله!',
                    timer: 4000
                });
                $('#resendOTPButton').fadeOut();
                timer();
                $('#resendOTPTime').fadeIn();

            }).fail(function(response) {

                swal({
                    icon: 'error',
                    text: 'مشکل در ارسال دوباره رمز یکبار مصرف! مجددا تلاش کنید ',
                    button: 'حله!',
                    timer: 4000
                });
            });

        });

        function timer() {
            let time = "1:01";
            let interval = setInterval(function() {
                let countdown = time.split(':');
                let minutes = parseInt(countdown[0], 10);
                let seconds = parseInt(countdown[1], 10);
                --seconds;
                minutes = (seconds < 0) ? --minutes : minutes;
                if (minutes < 0) {
                    clearInterval(interval);
                    $('#resendOTPTime').hide();
                    $('#resendOTPButton').fadeIn();
                };

                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;

                $('#resendOTPTime').html(minutes + ':' + seconds);
                time = minutes + ':' + seconds;
            }, 1000)
        }

    </script>

@endsection
