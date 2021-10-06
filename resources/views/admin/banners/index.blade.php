@extends('admin.layouts.admin')

@section('title')
    inbox banners
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 p-3 bg-white">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="font-weight-bolder">لیست بنر ها ({{$banners->total() }})</h5>
                                <a href="{{ route('admin.banners.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus ml-1"></i>ایجاد بنر
                                </a>
                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>تصویر</th>
                                        <th>عنوان</th>
                                        <th>متن</th>
                                        <th>الویت</th>
                                        <th>وضعیت</th>
                                        <th>نوع</th>
                                        <th>متن دکمه</th>
                                        <th>لینک دکمه</th>
                                        <th>آیکون دکمه</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $key => $banner )
                                    <tr >
                                        <td style="font-size:10px;">
                                            {{ $banners->firstItem() + $key }}
                                        </td>
                                        <td style="font-size:8px;">
                                            <a target="_blank" href="{{ url(env('BANNER_IMAGES_UPLOAD_PATH').$banner->image) }}" class="" style="text-decoration: none" >
                                                {{ $banner->image }}
                                            </a>
                                        </td>
                                        <td style="font-size:10px;">
                                            {{ $banner->title }}
                                        </td>
                                        <td style="font-size:10px;">
                                            {{ $banner->text }}
                                        </td>
                                        <td style="font-size:10px;">
                                            {{ $banner->priority }}
                                        </td>

                                        <td style="font-size:10px;">
                                            <span class="{{ $banner->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                                {{ $banner->is_active }}
                                            </span>
                                        </td>
                                        <td style="font-size:10px;">
                                            {{ $banner->type }}
                                        </td>
                                        <td style="font-size:10px;">
                                            {{ $banner->button_text }}
                                        </td>
                                        <td style="font-size:10px;">
                                            {{ $banner->button_link }}
                                        </td>
                                        <td style="font-size:10px;">
                                            {{ $banner->button_icon }}
                                        </td>
                                        <td>

                                            <a href="{{ route('admin.banners.edit' , ['banner' => $banner->id]) }}" class="btn btn-sm text-info mr-2" >
                                                <i class="fa fa-edit ml-1"></i>
                                            </a>
                                            <form action="{{ route('admin.banners.destroy' , ['banner' => $banner->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm text-danger mr-2" >
                                                    <i class="fa fa-close ml-1"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            <form action="{{ route('admin.banners.index') }}" method="GET">



                            </form>
                        </div>


                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        {{ $banners->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
