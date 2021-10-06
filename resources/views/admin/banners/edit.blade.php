@extends('admin.layouts.admin')

@section('title')
    edit banners
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            //  Show File Name
            $('#image').change(function(event) {

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

        });

    </script>
@endsection
@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <h5 class="font-weight-bolder">ویرایش بنر : {{ $banner->title }}</h5>
                        <hr>
                        @include('admin.sections.errors')
                        <form action="{{ route('admin.banners.update', ['banner' => $banner->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row align-items-center justify-content-center">
                                <div class="form-group col-md-7 mb-3">
                                    <div class="card">
                                        <img class="card-img-top"
                                            src="{{ url(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                            alt="{{ $banner->title }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3 mb-3">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $banner->title }}">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="text">متن</label>
                                    <input type="text" class="form-control" id="text" name="text"
                                        value="{{ $banner->text }}">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="priority">الویت</label>
                                    <input type="text" class="form-control" id="priority" name="priority"
                                        value="{{ $banner->priority }}">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="is_active">وضعیت</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="1" {{ $banner->getRawOriginal('is_active') ? 'selected' : '' }}>
                                            فعال </option>
                                        <option value="0" {{ $banner->getRawOriginal('is_active') ? '' : 'selected' }}>
                                            غیر فعال </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="type">نوع بنر</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                        value="{{ $banner->type }}">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="button_text">متن دکمه</label>
                                    <input type="text" class="form-control" id="button_text" name="button_text"
                                        value="{{ $banner->button_text }}">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="button_link">لینک دکمه</label>
                                    <input type="text" class="form-control" id="button_link" name="button_link"
                                        value="{{ $banner->button_link }}">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="button_icon">آیکون دکمه</label>
                                    <input type="text" class="form-control" id="button_icon" name="button_icon"
                                        value="{{ $banner->button_icon }}">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-3 mb-3">
                                    <label for="image">انتخاب تصویر اصلی</label>
                                    <input type="file" class="custom-file-input bg-danger" name="image" id="image" />
                                    <div class="uploading-image">
                                        <label class="custom-file-label d-flex justify-content-center p-3 w-50 h-50"
                                            for="image">
                                            <img src="{{ asset('../images/admin/imgUpload.png') }}" alt=""></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-9 mb-3">
                                    <div class="position-relative" id="imageShow"></div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                                </div>
                                <div class="form-group col-md-4 mb-3 me-auto">

                                </div>
                                <div class="form-group col-md-2 mb-3 me-auto">
                                    <a href="{{ route('admin.banners.index') }}" class="btn btn-dark"> بازگشت </a>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
