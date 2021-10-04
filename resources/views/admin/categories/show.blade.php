@extends('admin.layouts.admin')

@section('title')
    show categories
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder"> دسته : {{ $category->name }}</h5>
                            <hr>
                            <div class="row">

                                <div class="form-group col-md-3 mb-3">
                                    <label for="name">نام</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" disabled>
                                </div>
                                <div class="form-group col-md-3 mb-3 small text-muted">
                                    <label for="slug">نام انگلیسی</label>
                                    <input type="text" class="form-control" name="slug"  value="{{ $category->slug }}" disabled>
                                </div>
                                <div class="form-group col-md-3 mb-3 small text-muted">
                                    <label for="parent_id">والد</label>
                                    <div class="form-control" style="background: #eaecf4;">
                                        @if ($category->parent_id == 0)
                                                {{ $category->name }}
                                            @else
                                                {{ $category->parent->name }}
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group col-md-3 mb-3 small text-muted">
                                    <label for="is_active">وضعیت</label>
                                    <input type="text" class="form-control" name="is_active"  value="{{ $category->is_active }}" disabled>
                                </div>

                                <div class="form-group col-md-3 mb-3 small text-muted">
                                    <label for="icon">آیکون</label>
                                    <input type="text" class="form-control" name="icon" value="{{ $category->icon }}" disabled>
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label >تاریخ ایجاد</label>
                                    <input type="text" class="form-control" style="font-size:12px" value="{{ verta($category->created_at)->format('Y/n/j H:i') }}" disabled>
                                </div>
                                <div class="form-group col-md-12 mb-3 small text-muted">
                                    <label for="description">توضیحات</label>
                                    <textarea rows="2" class="form-control" name="description" disabled>{{ $category->description }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-3 mb-3 small text-muted">
                                            <label for="parent_id">ویژگی ها</label>
                                            <div class="form-control" style="background: #eaecf4;">
                                               @foreach ($category->attributes as $attribute)
                                                   {{ $attribute->name }}{{ $loop->last ? '' : ',' }}
                                               @endforeach
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3 small text-muted">
                                            <label for="parent_id">ویژگی های قابل فیلتر</label>
                                            <div class="form-control" style="background: #eaecf4;">
                                               @foreach ($category->attributes()->wherePivot('is_filter' , 1)->get() as $attribute)
                                                   {{ $attribute->name }}{{ $loop->last ? '' : ',' }}
                                               @endforeach
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3 small text-muted">
                                            <label for="parent_id">ویژگی متغیر</label>
                                            <div class="form-control" style="background: #eaecf4;">
                                               @foreach ($category->attributes()->wherePivot('is_variation' , 1)->get() as $attribute)
                                                   {{ $attribute->name }}{{ $loop->last ? '' : ',' }}
                                               @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group col-md-9 mb-3"></div>
                                <div class="form-group col-md-3 mb-3 me-auto">
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-dark "> بازگشت </a>
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
