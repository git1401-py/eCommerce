@extends('admin.layouts.admin')

@section('title')
    show Image Banner
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

                                <div class="card">
                                    <img class="card-img-top"
                                        src="{{ url(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                        alt="{{ $banner->name }}">
                                </div>
                        </div>

                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
