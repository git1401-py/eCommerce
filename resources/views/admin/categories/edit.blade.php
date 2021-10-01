@extends('admin.layouts.admin')

@section('title')
    edit categories
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.selectpicker').selectpicker();
        $(document).ready(function() {

            $(".js-attribue").select2({
                placeholder: "انتخاب ویژگی"
            });
            $(".js-filter").select2({
                placeholder: "انتخاب ویژگی"
            });
            $(".js-variable").select2({
                placeholder: "انتخاب متغیر"
            });

            $('.js-attribue').on('change.select2', function() {
                let attributesSelected = $(this).val();
                let attributes = @json($attributes);
                let attributeForFilter = [];

                $("#attributeIsFilterSelect").find("option").remove();
                $("#variationSelect").find("option").remove();
                attributes.map((attribute) => {
                    $.each(attributesSelected, function(index, element) {
                        if (attribute.id == element) {
                            attributeForFilter.push(attribute);
                        }
                    });
                });

                attributeForFilter.forEach((element) => {
                    let attributeFilterOption = $("<option/>", {
                        value: element.id,
                        text: element.name
                    });

                    $("#attributeIsFilterSelect").append(attributeFilterOption);

                    let variationOption = $("<option/>", {
                        value: element.id,
                        text: element.name
                    });

                    $("#variationSelect").append(variationOption);
                });

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
                            <h5 class="font-weight-bolder">ویرایش دسته بندی {{ $category->name }}</h5>
                            <hr>
                            @include('admin.sections.errors')
                            <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="form-row d-flex align-items-center">

                                    <div class="form-group col-md-3 small text-muted">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ $category->name }}">
                                    </div>
                                    <div class="form-group col-md-3 small text-muted">
                                        <label for="slug">نام انگلیسی</label>
                                        <input type="text" class="form-control" @error('name') is-invalid @enderror"
                                            id="slug" name="slug" value="{{ $category->slug }}">
                                    </div>
                                    <div class="form-group col-md-3 small text-muted">
                                        <label for="parent_id">والد</label>
                                        <select class="form-control" id="parent_id" name="parent_id">
                                            <option value="0" selected> بدون والد </option>
                                            @foreach ($parentCategories as $parentCategory)
                                                <option value="{{ $parentCategory->id }}"
                                                    {{ $category->parent_id == $parentCategory->id ? 'selected' : ''}}>
                                                    {{ $parentCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="is_active">وضعیت</label>
                                        <select class="form-control" id="is_active" name="is_active" >
                                            <option value="1" {{ $category->getRawOriginal('is_active') ? 'selected' : '' }} > فعال </option>
                                            <option value="0" {{ $category->getRawOriginal('is_active') ? '' : 'selected' }}> غیر فعال </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 small text-muted">
                                        <label for="attribute_ids">ویژگی ها</label>
                                        <div style="font-size:10px;">
                                            <select class="js-attribue js-states form-control p-0 w-100" dir="rtl"
                                                language="fa" name="attribute_ids[]" multiple="multiple">
                                                @foreach ($attributes as $attribute)
                                                    <option value="{{ $attribute->id }}"
                                                        {{ in_array( $attribute->id , $category->attributes()->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $attribute->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 small text-muted">
                                        <label for="attribute_is_filter_ids">انتخاب ویژگی های قابل فیلتر</label>
                                        <div style="font-size:10px;">
                                            <select class="js-filter js-states form-control p-0 w-100" dir="rtl"
                                                language="fa" id="attributeIsFilterSelect" name="attribute_is_filter_ids[]"
                                                multiple="multiple">
                                                @foreach ($category->attributes()->wherePivot('is_filter' , 1)->get() as $attribute)
                                                    <option value="{{ $attribute->id }}" selected>{{ $attribute->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 small text-muted">
                                        <label for="variation_ids">انتخاب ویژگی های متغیر</label>
                                        <div style="font-size:10px;">
                                            <select class="js-variable js-states form-control p-0 w-100" dir="rtl"
                                                language="fa" id="variationSelect" name="variation_id">
                                                     <option value="{{ $category->attributes()->wherePivot('is_variation' , 1)->first()->id }}" selected>
                                                        {{ $category->attributes()->wherePivot('is_variation' , 1)->first()->name }}
                                                    </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 small text-muted">
                                        <label for="icon">آیکون</label>
                                        <input type="text" class="form-control" id="icon" name="icon"
                                            value="{{ $category->icon }}">
                                    </div>
                                    <div class="form-group col-md-12 small text-muted">
                                        <label for="description">توضیحات</label>
                                        <textarea rows="2" class="form-control" id="description"
                                            name="description">{{ $category->description }}</textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                                    </div>
                                    <div class="form-group col-md-4 me-auto">

                                    </div>
                                    <div class="form-group col-md-2 me-auto">
                                        <a href="{{ route('admin.categories.index') }}" class="btn btn-dark"> بازگشت </a>
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
