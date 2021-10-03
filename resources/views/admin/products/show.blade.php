@extends('admin.layouts.admin')

@section('title')
    show products
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
        <div class="container-fluid" style="min-height:100vh;">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder">محصول {{ $product->name }}: </h5>
                            <hr>
                                <div class="form-row d-flex align-items-center">
                                    <div class="form-group col-md-3">
                                        <label>نام</label>
                                        <input type="text" class="form-control" value="{{ $product->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-3 small text-muted">
                                        <label>برند</label>
                                        <input type="text" class="form-control" value="{{ $product->brand->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-3 small text-muted">
                                        <label>دسته بندی</label>
                                        <input type="text" class="form-control" value="{{ $product->category->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >وضعیت</label>
                                        <input type="text" class="form-control {{ $product->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}" value="{{ $product->is_active }}" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >تاریخ ایجاد</label>
                                        <input type="text" class="form-control" style="font-size:12px" value="{{ verta($product->created_at)->format('Y/n/j H:i') }}" disabled>
                                    </div>

                                    <div class="form-group col-md-12 small text-muted">
                                        <label>توضیحات</label>
                                        <textarea rows="2" class="form-control" disabled>{{ $product->description }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <p> هزینه ارسال : </p>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>هزینه ارسال</label>
                                        <input type="text" class="form-control" value="{{ $product->delivery_amount }}" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>هزینه ارسال به ازای محصول اضافی</label>
                                        <input type="text" class="form-control" value="{{ $product->delivery_amount_per_product }}" disabled>
                                    </div>
                                    <div class="form-group col-md-3"></div>
                                    <div class="form-group col-md-3"></div>

                                    {{-- Product Attributes & Variations --}}
                                    <div class="col-md-12">
                                        <hr>
                                        <p>ویژگی ها: </p>
                                    </div>
                                    @foreach ( $productAttributes as $productAttribute)
                                    <div class="form-group col-md-3">
                                        <label>{{ $productAttribute->attribute->name}}</label>
                                        <input type="text" class="form-control" value="{{ $productAttribute->value }}" disabled>
                                    </div>
                                    @endforeach
                                    @foreach ( $productVariations as $variation)
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="d-flex">
                                            <p class="mb-0"> قیمت و موجودی برای متغیر ( {{ $variation->value }} ) : </p>
                                            <p class="mb-0 me-3">
                                                <button class="btn btn-sm btn-primary"
                                                        data-toggle="collapse"
                                                        data-target="#collapse-{{$variation->id}}"
                                                        >
                                                        نمایش
                                                </button>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="collapse mt-2" id="collapse-{{$variation->id}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="small">قیمت</label>
                                                        <input type="text" disabled class="form-control" value="{{ $variation->price }}">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="small">تعداد</label>
                                                        <input type="text" disabled class="form-control" value="{{ $variation->quantity }}">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="small">شناسه انبار</label>
                                                        <input type="text" disabled class="form-control" value="{{ $variation->sku }}">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <p>حراج :</p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="small">قیمت حراجی</label>
                                                        <input type="text" disabled class="form-control" value="{{ $variation->sale_price }}">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="small">تاریخ شروع حراجی</label>
                                                        <input type="text" disabled class="form-control"
                                                        value="{{ $variation->date_on_sale_from == null ? null : verta($variation->date_on_sale_from) }}">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="small">تاریخ پایان حراجی</label>
                                                        <input type="text" disabled class="form-control"
                                                        value="{{ $variation->date_on_sale_to == null ? null : verta($variation->date_on_sale_to) }}">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{-- Product Image Section --}}
                                    <div class="col-md-12">
                                        <hr>
                                        <p>«تصاویر محصول» </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p>تصویر اصلی : </p>

                                        <div class="col-md-3 my-2">
                                            <div class="card">
                                                <img class="card-img-top"  src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}" alt="{{ $product->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <hr>
                                        <p>سایر تصایر : </p>
                                        <div class="position-relative d-flex  flex-grow-0 flex-wrap align-items-center" id="imagesShow">

                                            @foreach ($images as $image)
                                                <div class="col-md-3 my-2">
                                                    <div class="card">
                                                        <img class="card-img-top"  src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}" alt="{{ $product->name }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>





                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-outline-primary">ثبت</button>
                                    </div>
                                    <div class="form-group col-md-4 me-auto">

                                    </div>
                                    <div class="form-group col-md-2 me-auto">
                                        <a href="{{ route('admin.products.index') }}" class="btn btn-dark"> بازگشت </a>
                                    </div>
                                </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
