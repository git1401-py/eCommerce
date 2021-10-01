@extends('admin.layouts.admin')

@section('title')
    inbox attributes
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid" style="min-height:100vh;">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 p-3 bg-white">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="font-weight-bolder">لیست ویژگی ها ({{$attributes->total() }})</h5>
                                <a href="{{ route('admin.attributes.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus ml-1"></i>ایجاد ویژگی
                                </a>
                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attributes as $key => $attribute )
                                    <tr>
                                        <th>
                                            {{ $attributes->firstItem() + $key }}
                                        </th>
                                        <th>
                                            {{ $attribute->name }}
                                        </th>

                                        <th>
                                            <a href="{{ route('admin.attributes.show' , ['attribute' => $attribute->id]) }}" class="btn btn-sm btn-outline-success" >
                                                نمایش
                                            </a>
                                            <a href="{{ route('admin.attributes.edit' , ['attribute' => $attribute->id]) }}" class="btn btn-sm text-info mr-2" >
                                                <i class="fa fa-edit ml-1"></i>
                                            </a>
                                        </th>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            <form action="{{ route('admin.attributes.index') }}" method="GET">



                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
