@extends('home.layouts.home')
@section('title')
     پروفایل
@endsection

@section('content')

<div class="container-fluid bg-gray-200 my-2">
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
                                                <form action="{{ route('home.users_profile.edit') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="name">
                                                                    نام
                                                                </label>
                                                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="cellphone" class="required">
                                                                    شماره موبایل
                                                                </label>
                                                                <input type="text" name="cellphone" class="form-control @error('cellphone') is-invalid @enderror" id="cellphone" value="{{ auth()->user()->cellphone }}"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="email"> ایمیل </label>
                                                        <input type="email" id="email" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" />
                                                    </div>

                                                    {{-- <fieldset> --}}
                                                        {{-- <legend> تغییر تصویر </legend> --}}
                                                                <div class="row">
                                                                    <div class="form-group col-md-3 mb-3">
                                                                        <input type="file" class="custom-file-input bg-danger" name="avatar"
                                                                            id="primary_image" style="width: 1px; height:0.1px"/>
                                                                        <div class="uploading-image">
                                                                            <label class="custom-file-label d-flex justify-content-center p-3 w-50 h-50"
                                                                                for="primary_image">
                                                                                <img src="{{ asset('../images/admin/imgUpload.png') }}"
                                                                                    alt=""></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-3">
                                                                        <div class="position-relative" id="imageShow"></div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-3">
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-3">
                                                                        <div class="card">
                                                                            <img class="card-img-top"
                                                                                src="{{ url(env('USER_IMAGES_UPLOAD_PATH') . auth()->user()->avatar) }}"
                                                                                alt="{{ auth()->user()->avatar }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    {{-- </fieldset> --}}
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn "> ثبت تغییرات</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
        </div>

    </div>

@endsection

@section('script')
    <script>
        //  Show File Name
        $('#primary_image').change(function(event) {

            let imgMind = event.target.files[0];
            // get the file name
            var fileName = imgMind.name;
            // replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);

            var src = document.getElementById("imageShow");
            src.innerHTML = "";
            Array.from(event.target.files).forEach(file => {
                const image = file;
                const reader2 = new FileReader();
                reader2.readAsDataURL(image);
                reader2.onload = (e) => {
                    console.log('e.target.result', e.target.result);
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.margin = '5px';

                    src.appendChild(img);
                };
            });



        });
        </script>
        @endsection
