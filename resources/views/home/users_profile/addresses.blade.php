@extends('home.layouts.home')
@section('title')
     آدرس ها
@endsection

@section('content')

<div class="container-fluid bg-gray-200 my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">آدرس ها</li>
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


                                        <!-- Single Tab Content Start -->
                                        <div class="myaccount-content address-content">
                                            <h3> آدرس ها </h3>

                                            @foreach ($addresses as $address)
                                                <address class="p-3">
                                                    <p>
                                                        <strong> {{ auth()->user()->name == null ? 'کاربر گرامی' : auth()->user()->name }} </strong>
                                                        <br>
                                                        <strong class="me-2"> عنوان آدرس : </strong> {{ $address->title }} </span> </span>
                                                    </p>
                                                    <p>
                                                        {{ $address->address }}
                                                        <br>
                                                        <strong class="me-2"> استان : </strong><span> {{ province_name($address->province_id) }} </span>
                                                            <strong class="me-2"> شهر : </strong><span> {{ city_name($address->city_id) }} </span>
                                                    </p>
                                                    <p>
                                                        <strong class="me-2"> کدپستی : </strong>
                                                        {{ $address->postal_code }}
                                                    </p>
                                                    <p>
                                                        <strong class="me-2"> شماره موبایل : </strong>
                                                        {{ $address->cellphone }}
                                                    </p>

                                                </address>

                                                <a href="#" class="check-btn sqr-btn collapse-address-update">
                                                    <i class="sli sli-pencil"></i>
                                                    ویرایش آدرس
                                                </a>
                                                {{-- {{dd($errors)}} --}}
                                                <div class="collapse-desplay-none border p-3"
                                                    style="{{ (count($errors->addressUpdate) > 0 && $errors->addressUpdate->first('address_id') == $address->id) ? 'display:block' : '' }}">
                                                    <form action="{{ route('home.addresses.update' , ['address' => $address->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">

                                                            <div class="form-group col-lg-6 col-md-6 mb-3">
                                                                <label for="title">
                                                                    عنوان
                                                                </label>
                                                                <input type="text" name="title" id="title" class="form-control" value="{{ $address->title }}">
                                                                @error('title' , 'addressUpdate')
                                                                    <p class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 mb-3">
                                                                <label for="cellphone">
                                                                    شماره تماس
                                                                </label>
                                                                <input type="text" name="cellphone" id="cellphone" class="form-control" value="{{ $address->cellphone }}">
                                                                @error('cellphone' , 'addressUpdate')
                                                                    <p class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 mb-3">
                                                                <label for="province_id">
                                                                    استان
                                                                </label>
                                                                <select name="province_id" id="province_id" class="form-select province-select">
                                                                    @foreach ($provinces as $province)
                                                                        <option value="{{ $province->id }}" {{ $province->id == $address->province_id ? 'selected' : ''}}>
                                                                            {{ $province->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('province_id', 'addressUpdate')
                                                                    <p class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 mb-3">
                                                                <label for="city_id">
                                                                    شهر
                                                                </label>
                                                                <select name="city_id" id="city_id" class="form-select  city-select">
                                                                    <option value="{{ $address->city_id }}" selected>
                                                                        {{ city_name($address->city_id) }}
                                                                    </option>
                                                                </select>
                                                                @error('city_id', 'addressUpdate')
                                                                    <p class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 mb-3">
                                                                <label for="address">
                                                                    آدرس
                                                                </label>
                                                                <input type="text" name="address" value="{{ $address->address }}" id="address" class="form-control">
                                                                @error('address' , 'addressUpdate')
                                                                    <p class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 mb-3">
                                                                <label for="postal_code">
                                                                    کد پستی
                                                                </label>
                                                                <input type="text" name="postal_code" value="{{ $address->postal_code }}" id="postal_code" class="form-control">
                                                                @error('postal_code' , 'addressUpdate')
                                                                    <p class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                            <div class=" col-lg-12 col-md-12 mb-3">
                                                                <button class="cart-btn-2" type="submit"> ویرایش
                                                                    آدرس
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            <hr>

                                            @endforeach



                                            <button class="collapse-address-create mt-3" type="submit"> ایجاد آدرس
                                                جدید </button>
                                            <div class="collapse-address-create-content"
                                                    style="{{ count($errors->addressStore) > 0 ? 'display:block' : '' }}">

                                                <form action="{{ route('home.addresses.store') }}" method="POST">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                عنوان
                                                            </label>
                                                            <input type="text" name="title" value="{{ old('title') }}">
                                                            @error('title' , 'addressStore')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                شماره تماس
                                                            </label>
                                                            <input type="text" name="cellphone" value="{{ old('cellphone') }}">
                                                            @error('cellphone' , 'addressStore')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                استان
                                                            </label>
                                                            <select class="email s-email s-wid province-select" name="province_id">
                                                                @foreach ($provinces as $province)
                                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('province_id', 'addressStore')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                شهر
                                                            </label>
                                                            <select class="email s-email s-wid city-select" name="city_id">
                                                            </select>
                                                            @error('city_id', 'addressStore')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                آدرس
                                                            </label>
                                                            <input type="text" name="address" value="{{ old('address') }}">
                                                            @error('address' , 'addressStore')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                کد پستی
                                                            </label>
                                                            <input type="text" name="postal_code" value="{{ old('postal_code') }}">
                                                            @error('postal_code' , 'addressStore')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>

                                                        <div class=" col-lg-12 col-md-12">

                                                            <button class="cart-btn-2" type="submit"> ثبت آدرس
                                                            </button>
                                                        </div>



                                                    </div>

                                                </form>

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

@section('script')
    <script>

    $('.sqr-btn').click(function(){
        $(this).next().toggleClass('collapse-address-update-content');
    });


       $('.province-select').change(function() {

var provinceID = $(this).val();

if (provinceID) {
    $.ajax({
        type: "GET",
        url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
        success: function(res) {
            if (res) {
                $(".city-select").empty();

                $.each(res, function(key , city) {
                    $(".city-select").append('<option value="' + city.id + '">' +
                        city.name + '</option>');
                });

            } else {
                $(".city-select").empty();
            }
        }
    });
} else {
    $(".city-select").empty();
}
});
    </script>

@endsection
