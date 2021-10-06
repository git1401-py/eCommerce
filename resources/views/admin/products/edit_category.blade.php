@extends('admin.layouts.admin')

@section('title')
    edit category products
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

            $(".js-category").select2({
                placeholder: "انتخاب دسته"
            });

            $('#attributesContainer').hide();

            let countCzMore = 0;
            $('.js-category').on('change.select2', function() {
                countCzMore = countCzMore + 1;
                let categoryId = $(this).val();

                $.get(`{{ url('/admin-panel/management/category-attributes/${categoryId}') }}`, function(
                    response, status) {
                    if (status == "success") {
                        $('#attributesContainer').fadeIn();

                        console.log(response);

                        // document.getElementById("attributes").innerHTML = "";
                        $('#attributes').find('div').remove();

                        response.attributes.forEach(attribute => {
                            let attributeFormGroup = $('<div/>', {
                                class: 'form-group col-md-3',
                            });
                            attributeFormGroup.append(
                                $('<label/>', {
                                    for: attribute.name,
                                    text: attribute.name
                                })
                            );
                            attributeFormGroup.append(
                                $('<input/>', {
                                    type: 'text',
                                    class: 'form-control',
                                    id: attribute.name,
                                    name: `attribute_ids[${attribute.id}]`

                                })
                            );

                            $('#attributes').append(attributeFormGroup);
                        });
                        // $('#btnPlus').find('i').remove();

                        response.variation.forEach(el => {
                            $('#variationName').text(el.name);
                        });
                        // $("#czContainer").find('div').remove();
                        if (countCzMore == 1) {
                            $("#czContainer").czMore();

                        }


                    } else {
                        alert('مشکل در دریافت لیست ')
                    }
                }).fail(function() {
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
                <div class="col-12 mb-4 p-3 ">
                    <h5 class="font-weight-bolder">ویرایش دسته بندی محصول :{{ $product->name }}</h5>
                    <hr>
                    @include('admin.sections.errors')
                    <form action="{{ route('admin.products.category.update',['product' => $product->id]) }}" method="POST">
                        @method('put')
                        @csrf
                        {{-- Category&Attribute Section --}}
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="row justify-content-center">
                                    <div class="form-group col-md-3 small text-muted">
                                        <label for="category_id">دسته بندی</label>
                                        <div style="font-size:10px;">
                                            <select class="js-category js-states form-control p-0 w-100" dir="rtl"
                                                language="fa" name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $product->category->id ? 'selected' : '' }}
                                                        >
                                                        {{ $category->name }} -
                                                        {{ $category->parent->name }}</option>
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
                                    <p>افزودن قیمت و موجودی برای متغیر <span class="font-weight-bold"
                                            id="variationName"></span> :</p>
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
                        </div>

                        <div class="row mb-3">

                            <div class="form-group col-md-6 mb-3">
                                <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                            </div>
                            <div class="form-group col-md-4 mb-3 me-auto">

                            </div>
                            <div class="form-group col-md-2 mb-3 me-auto">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-dark"> بازگشت
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
