@extends('admin.layouts.admin')

@section('title')
    create products
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        let imgFiles = [];
        let exits = false;
        let imgFile = [];
        let exit = false;
        $(document).ready(function() {

            $(".js-brand").select2({
                placeholder: "انتخاب برند"
            });
            $(".js-tag").select2({
                placeholder: "انتخاب تگ"
            });
            $(".js-category").select2({
                placeholder: "انتخاب دسته"
            });

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

            $('#attributesContainer').hide();

            let countCzMore = 0;
            $('.js-category').on('change.select2', function () {
                countCzMore=countCzMore+1;
                let categoryId = $(this).val();

                $.get(`{{ url('/admin-panel/management/category-attributes/${categoryId}') }}` , function(response , status){
                    if(status == "success"){
                        $('#attributesContainer').fadeIn();

                        console.log(response);

                        // document.getElementById("attributes").innerHTML = "";
                        $('#attributes').find('div').remove();

                        response.attributes.forEach(attribute =>{
                            let attributeFormGroup = $('<div/>' , {
                                class : 'form-group col-md-3',
                            });
                            attributeFormGroup.append(
                                    $('<label/>' , {
                                    for : attribute.name,
                                    text : attribute.name
                                })
                            );
                            attributeFormGroup.append(
                                    $('<input/>' , {
                                        type : 'text',
                                        class : 'form-control',
                                        id : attribute.name,
                                        name : `attribute_ids[${attribute.id}]`

                                })
                            );

                            $('#attributes').append(attributeFormGroup);
                        });
                        // $('#btnPlus').find('i').remove();

                        response.variation.forEach(el =>{
                            $('#variationName').text(el.name);
                        });
                        // $("#czContainer").find('div').remove();
                        if ( countCzMore == 1 ){
                        $("#czContainer").czMore();

                        }


                    }else{
                        alert('مشکل در دریافت لیست ')
                        }
                }).fail(function(){
                    alert('مشکل در دریافت لیست ویژگی ها')
                })
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

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder">ایجاد محصول</h5>
                            <hr>
                            @include('admin.sections.errors')
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control"
                                            id="name" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-md-3 mb-3 small text-muted">
                                        <label for="brand_id">برند</label>
                                        <div style="font-size:10px;">
                                            <select class="js-brand js-states form-control p-0 w-100" dir="rtl"
                                                language="fa" name="brand_id">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="is_active">وضعیت</label>
                                        <select class="form-control" id="is_active" name="is_active">
                                            <option value="1" selected> فعال </option>
                                            <option value="0"> غیر فعال </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-3 small text-muted">
                                        <label for="tag_ids">تگ</label>
                                        <div style="font-size:10px;">
                                            <select class="js-tag js-states form-control p-0 w-100" dir="rtl" language="fa"
                                                name="tag_ids[]" multiple="multiple">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 mb-3 small text-muted">
                                        <label for="description">توضیحات</label>
                                        <textarea rows="2" class="form-control" id="description"
                                            name="description">{{ old('description') }}</textarea>
                                    </div>

                                    {{-- Product Image Section --}}
                                    <div class="col-md-12 mb-3">
                                        <hr>
                                        <p>تصاویر محصول : </p>
                                    </div>

                                    <div class="form-group col-md-3 mb-3">
                                        <label for="primary_image">انتخاب تصویر اصلی</label>
                                        <div class="custom-file">
                                            <input type="file" name="primary_image" id="primary_image"
                                                class="custom-file-input">
                                            <label for="primary_image" class="custom-file-label">انتخاب فایل</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-9 mb-3">
                                        <div class="position-relative" id="imageShow"></div>
                                    </div>

                                    <div class="form-group col-md-3 mb-3">
                                        <label for="images">انتخاب تصاویر</label>
                                        <div class="custom-file">
                                            <input type="file" name="images[]" multiple id="images"
                                                class="custom-file-input">
                                            <label for="images" class="custom-file-label">انتخاب فایل ها</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-9 mb-3">
                                        <div class="position-relative d-flex  flex-grow-0 flex-wrap align-items-center" id="imagesShow"></div>
                                    </div>

                                     {{-- Category&Attribute Section --}}
                                     <div class="col-md-12">
                                        <hr>
                                        <p>دسته بندی و ویژگی ها : </p>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="row justify-content-center">
                                            <div class="form-group col-md-3 small text-muted">
                                                <label for="category_id">دسته بندی</label>
                                                <div style="font-size:10px;">
                                                    <select class="js-category js-states form-control p-0 w-100" dir="rtl"
                                                        language="fa" name="category_id">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }} - {{ $category->parent->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3" id="attributesContainer">
                                        <div class="row" id="attributes"></div>
                                         {{-- Variation Section --}}
                                        <div class="col-md-12">
                                            <hr>
                                            <p>افزودن قیمت و موجودی برای متغیر <span class="font-weight-bold" id="variationName"></span> :</p>
                                        </div>
                                        <div id="cz_variation">
                                            <div id="czContainer">
                                                <div id="first">
                                                    <div class="recordset">
                                                        <div class="row">
                                                            <div class="form-group col-md-3 mb-3">
                                                                <label>نام</label>
                                                                <input type="text" class="form-control"
                                                                     name="variation_values[value][]">
                                                            </div>
                                                            <div class="form-group col-md-3 mb-3">
                                                                <label>قیمت</label>
                                                                <input type="number" class="form-control"
                                                                     name="variation_values[price][]">
                                                            </div>
                                                            <div class="form-group col-md-3 mb-3">
                                                                <label>تعداد</label>
                                                                <input type="number" class="form-control"
                                                                     name="variation_values[quantity][]">
                                                            </div>
                                                            <div class="form-group col-md-3 mb-3">
                                                                <label>شناسه انبار</label>
                                                                <input type="text" class="form-control"
                                                                     name="variation_values[sku][]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Delivery Section --}}
                                    <div class="col-md-12 mb-3">
                                        <hr>
                                        <p> هزینه ارسال : </p>
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="delivery_amount">هزینه ارسال</label>
                                        <input type="number" class="form-control"
                                            id="delivery_amount" name="delivery_amount" value="{{ old('delivery_amount') }}">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                                        <input type="number" class="form-control"
                                            id="delivery_amount_per_product" name="delivery_amount_per_product" value="{{ old('delivery_amount_per_product') }}">
                                    </div>
                                    <div class="form-group col-md-3 mb-3"></div>
                                    <div class="form-group col-md-3 mb-3"></div>




                                    <div class="form-group col-md-6 mb-3">
                                        <button type="submit" class="btn btn-outline-primary">ثبت</button>
                                    </div>
                                    <div class="form-group col-md-4 mb-3 me-auto">

                                    </div>
                                    <div class="form-group col-md-2 mb-3 me-auto">
                                        <a href="{{ route('admin.products.index') }}" class="btn btn-dark"> بازگشت </a>
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
