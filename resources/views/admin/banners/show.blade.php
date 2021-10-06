@extends('admin.layouts.admin')

@section('title')
    show banners
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <h5 class="font-weight-bolder"> بنر : {{ $banner->name }}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <p>تصویر اصلی : </p>

                            <div class="col-md-3 mb-3 my-2">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="{{ url(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                        alt="{{ $banner->name }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-md-3 mb-3">
                            <label>عنوان</label>
                            <input type="text" class="form-control" name="title" disabled
                                value="{{ $banner->title }}">
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label>متن</label>
                            <input type="text" class="form-control"  name="text" disabled
                                value="{{ $banner->text }}">
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label>الویت</label>
                            <input type="text" class="form-control" name="priority" disabled
                                value="{{ $banner->priority }}">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label >وضعیت</label>
                            <input type="text" class="form-control {{ $banner->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}" value="{{ $banner->is_active }}" disabled>
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label>نوع بنر</label>
                            <input type="text" class="form-control" name="type" disabled
                                value="{{ $banner->type }}">
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label>متن دکمه</label>
                            <input type="text" class="form-control" name="button_text" disabled
                                value="{{ $banner->button_text }}">
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label>لینک دکمه</label>
                            <input type="text" class="form-control" name="button_link" disabled
                                value="{{ $banner->button_link }}">
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label>آیکون دکمه</label>
                            <input type="text" class="form-control" name="button_icon" disabled
                                value="{{ $banner->button_icon }}">
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label>تاریخ ایجاد</label>
                            <input type="text" class="form-control" style="font-size:12px"
                                value="{{ verta($banner->created_at)->format('Y/n/j H:i') }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-9 mb-3">
                        </div>
                        <div class="form-group col-md-3 mb-3 me-auto">
                            <a href="{{ route('admin.banners.index') }}" class="btn btn-dark "> بازگشت </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
