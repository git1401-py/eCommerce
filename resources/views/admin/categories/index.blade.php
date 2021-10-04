@extends('admin.layouts.admin')

@section('title')
    inbox categories
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
                                <h5 class="font-weight-bolder">لیست دسته بندی ها ({{$categories->total() }})</h5>
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus ml-1"></i>ایجاد دسته بندی
                                </a>
                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>نام انگلیسی</th>
                                        <th>والد</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category )
                                    <tr>
                                        <td>
                                            {{ $categories->firstItem() + $key }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->slug }}
                                        </td>
                                        <td>
                                            @if ($category->parent_id == 0)
                                                بدون والد
                                            @else
                                                {{ $category->parent->name }}
                                            @endif

                                        </td>
                                        <td>
                                            <span class="{{ $category->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                                {{ $category->is_active }}
                                            </span>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.categories.show' , ['category' => $category->id]) }}" class="btn btn-sm btn-outline-success" >
                                                نمایش
                                            </a>
                                            <a href="{{ route('admin.categories.edit' , ['category' => $category->id]) }}" class="btn btn-sm text-info mr-2" >
                                                <i class="fa fa-edit ml-1"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            <form action="{{ route('admin.categories.index') }}" method="GET">



                            </form>
                        </div>


                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        {{ $categories->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
