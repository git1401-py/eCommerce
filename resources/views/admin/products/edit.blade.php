@extends('admin.layouts.admin')

@section('title')
    edit products
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".js-brand").select2({
                placeholder: "انتخاب برند"
            });
            $(".js-tag").select2({
                placeholder: "انتخاب تگ"
            });
            var customOptions = {
			placeholder: "روز / ماه / سال"
			, twodigit: false
			, closeAfterSelect: true
			, nextButtonIcon: "fa fa-arrow-circle-right"
			, previousButtonIcon: "fa fa-arrow-circle-left"
			, buttonsColor: "blue"
			, forceFarsiDigits: true
			, markToday: true
			, markHolidays: true
			, highlightSelectedDay: true
			, sync: true
			, gotoToday: true
		}
        let variations = @json($productVariations);
        variations.forEach(variation => {
            kamaDatepicker(`date_on_sale_from-${ variation.id }`, customOptions);
		    kamaDatepicker(`date_on_sale_to-${ variation.id }`, customOptions);
        });




            // Bootstrap 5
	// const dpInstance = new mds.MdsPersianDateTimePicker(document.getElementById('dp-example'), {
	//   targetTextSelector: '[data-name="dp-example-text"]',
	//   targetDateSelector: '[data-name="dp-example-date"]',
	// });

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
                            <h5 class="font-weight-bolder">ویرایش محصول {{ $product->name }}</h5>
                            <hr>
                            @include('admin.sections.errors')
                            <form action="{{ route('admin.products.update', ['product' => $product->id]) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="row">


                                    <div class="form-group col-md-3 mb-3">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control id=" name" name="name"
                                            value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group col-md-3 mb-3 small text-muted">
                                        <label for="brand_id">برند</label>
                                        <div style="font-size:10px;">
                                            <select class="js-brand js-states form-control p-0 w-100" dir="rtl"
                                                language="fa" name="brand_id">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ $brand->id == $product->brand->id ? 'selected' : '' }}>
                                                        {{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="is_active">وضعیت</label>
                                        <select class="form-control" id="is_active" name="is_active">
                                            <option value="1"
                                                {{ $product->getRawOriginal('is_active') ? 'selected' : '' }}> فعال
                                            </option>
                                            <option value="0"
                                                {{ $product->getRawOriginal('is_active') ? '' : 'selected' }}> غیر فعال
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-3 small text-muted">
                                        <label for="tag_ids">تگ</label>
                                        <div style="font-size:10px;">
                                            <select class="js-tag js-states form-control p-0 w-100" dir="rtl" language="fa"
                                                name="tag_ids[]" multiple="multiple">
                                                @php
                                                    $productTagIds = $product
                                                        ->tags()
                                                        ->pluck('id')
                                                        ->toArray();
                                                @endphp
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                        {{ in_array($tag->id, $productTagIds) ? 'selected' : '' }}>
                                                        {{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 mb-3 small text-muted">
                                        <label for="description">توضیحات</label>
                                        <textarea rows="4" class="form-control" id="description"
                                            name="description">{{ $product->description }}</textarea>
                                    </div>
                                    {{-- Delivery Section --}}
                                    <div class="col-md-12 mb-3">
                                        <hr>
                                        <p> هزینه ارسال : </p>
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="delivery_amount">هزینه ارسال</label>
                                        <input type="number" class="form-control" id="delivery_amount"
                                            name="delivery_amount" value="{{ $product->delivery_amount }}">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                                        <input type="number" class="form-control" id="delivery_amount_per_product"
                                            name="delivery_amount_per_product"
                                            value="{{ $product->delivery_amount_per_product }}">
                                    </div>
                                    {{-- Product Attributes & Variations --}}
                                    <div class="col-md-12 mb-3">
                                        <hr>
                                        <p>ویژگی ها: </p>
                                    </div>
                                    @foreach ($productAttributes as $productAttribute)
                                        <div class="form-group col-md-3">
                                            <label>{{ $productAttribute->attribute->name }}</label>
                                            <input type="text" class="form-control"
                                                name="attribute_values[{{ $productAttribute->id }}]"
                                                value="{{ $productAttribute->value }}">
                                        </div>
                                    @endforeach
                                    @foreach ($productVariations as $variation)
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="d-flex">
                                                <p class="mb-0"> قیمت و موجودی برای متغیر ( {{ $variation->value }} ) :
                                                </p>
                                                <p class="mb-0 me-3">
                                                    <a class="btn btn-sm btn-primary" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $variation->id }}"
                                                        role="button" aria-expanded="false" aria-controls="collapse-{{ $variation->id }}">
                                                        نمایش
                                                    </a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="collapse multi-collapse mt-2"
                                            id="collapse-{{ $variation->id }}">
                                                <div class="card card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label class="small">قیمت</label>
                                                            <input type="text" class="form-control"
                                                                name="variation_values[{{ $variation->id }}][price]"
                                                                value="{{ $variation->price }}">
                                                        </div>

                                                        <div class="form-group col-md-4 mb-3">
                                                            <label class="small">تعداد</label>
                                                            <input type="text" class="form-control"
                                                                name="variation_values[{{ $variation->id }}][quantity]"
                                                                value="{{ $variation->quantity }}">
                                                        </div>

                                                        <div class="form-group col-md-4 mb-3">
                                                            <label class="small">شناسه انبار</label>
                                                            <input type="text" class="form-control"
                                                                name="variation_values[{{ $variation->id }}][sku]"
                                                                value="{{ $variation->sku }}">
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <p>حراج :</p>
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label class="small">قیمت حراجی</label>
                                                            <input type="text" class="form-control"
                                                                name="variation_values[{{ $variation->id }}][sale_price]"
                                                                value="{{ $variation->sale_price }}">
                                                        </div>

                                                        <div class="form-group col-md-4 mb-3">
                                                            <span class="small">تاریخ شروع حراجی</span>
                                                            <input type="text" id="date_on_sale_from-{{ $variation->id }}"
                                                            style="direction: ltr; "
                                                                name="variation_values[{{ $variation->id }}][date_on_sale_from]"
                                                                {{-- value="{{ $variation->date_on_sale_from == null ? null : verta($variation->date_on_sale_from) }}" --}}
                                                                >

                                                            {{-- <label class="small">تاریخ شروع حراجی</label>
                                                            <input type="text" class="form-control" placeholder="1399-11-01 22:11:23" id="date_on_sale_from"
                                                                style="direction: ltr; font-size:10px"
                                                                name="variation_values[{{ $variation->id }}][date_on_sale_from]"
                                                                value="{{ $variation->date_on_sale_from == null ? null : verta($variation->date_on_sale_from) }}"> --}}
                                                        </div>

                                                        <div class="form-group col-md-4 mb-3">
                                                            <span class="small">تاریخ پایان حراجی</span>
                                                            <input type="text" id="date_on_sale_to-{{ $variation->id }}"
                                                            style="direction: ltr; "
                                                                name="variation_values[{{ $variation->id }}][date_on_sale_to]"
                                                                {{-- value="{{ $variation->date_on_sale_to == null ? null : verta($variation->date_on_sale_to) }}" --}}
                                                                >

                                                            {{-- <label class="small">تاریخ پایان حراجی</label>
                                                            <input type="text" class="form-control" placeholder="1399-11-01 22:11:23" id="date_on_sale_to"
                                                                style="direction: ltr; font-size:10px"
                                                                name="variation_values[{{ $variation->id }}][date_on_sale_to]"
                                                                value="{{ $variation->date_on_sale_to == null ? null : verta($variation->date_on_sale_to) }}"> --}}
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    <div class="form-group col-md-6">
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
    </section>
    <!-- End of cards -->



@endsection
