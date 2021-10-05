@extends('admin.layouts.admin')

@section('title')
    edit product Images
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
        $('#images').change(function() {

            let imgMind = event.target.files[0];

            // get the file name
            var fileName = $(this).val();
            // replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
            var src = document.getElementById("imagesShow");
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



@section('content')
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">
                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder">ویرایش تصاویر محصول : {{ $product->name }}</h5>
                            <hr>
                            @include('admin.sections.errors')

                            {{-- Show primary image --}}
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <p>تصویر اصلی : </p>

                                    <div class="col-md-3 mb-3 my-2">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12  mb-3">

                                    <p>سایر تصایر : </p>
                                    <div class="row  flex-grow-0 flex-wrap align-items-center">

                                        @foreach ($product->images as $image)
                                            <div class="col-md-3">
                                                <div class="card" >
                                                    <img class="card-img-top"
                                                        src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                                        alt="{{ $product->name }}">
                                                    <div class="card-footer text-center">
                                                        <form action="{{ route('admin.products.images.destroy', ['product' => $product->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="image_id"
                                                                value="{{ $image->id }}">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger mb-3">حذف</button>
                                                        </form>
                                                        <form
                                                            action="{{ route('admin.products.images.set_primary', ['product' => $product->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="image_id"
                                                                value="{{ $image->id }}">
                                                            <button type="submit" class="btn btn-sm btn-primary">
                                                                 انتخاب به عنوان تصویر اصلی </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <form action=" {{ route('admin.products.images.add', ['product' => $product->id]) }} "
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-3 mb-3">
                                            <label for="primary_image">انتخاب تصویر اصلی</label>
                                            <input type="file" class="custom-file-input bg-danger" name="primary_image"
                                                id="primary_image" />
                                            <div class="uploading-image">
                                                <label class="custom-file-label d-flex justify-content-center p-3 w-50 h-50"
                                                    for="primary_image">
                                                    <img src="{{ asset('../images/admin/imgUpload.png') }}"
                                                        alt=""></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-9 mb-3">
                                            <div class="position-relative" id="imageShow"></div>
                                        </div>

                                    </div>
                                    <div class="row flex-grow-0 flex-wrap align-items-center">
                                        <div class="form-group col-md-3 mb-3">
                                            <label for="images">انتخاب تصاویر</label>
                                            <input type="file" class="custom-file-input bg-danger" name="images[]" multiple
                                                id="images" />
                                            <div class="uploading-image">
                                                <label class="custom-file-label d-flex justify-content-center p-3 w-50 h-50"
                                                    for="images">
                                                    <img src="{{ asset('../images/admin/imgUpload.png') }}"
                                                        alt=""></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-9 mb-3">
                                            <div class="position-relative d-flex  flex-grow-0 flex-wrap align-items-center"
                                                id="imagesShow"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="form-group col-md-6 mb-3">
                                            <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                                        </div>
                                        <div class="form-group col-md-4 me-auto">

                                        </div>
                                        <div class="form-group col-md-2 me-auto">
                                            <a href="{{ route('admin.products.index') }}" class="btn btn-dark"> بازگشت </a>
                                        </div>
                                    </div>
                                </form>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
