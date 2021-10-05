@extends('admin.layouts.admin')

@section('title')
    inbox products
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
                                <h5 class="font-weight-bolder">لیست محصول ها ({{ $products->total() }})</h5>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus ml-1"></i>ایجاد محصول
                                </a>
                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>نام دسته بندی</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>
                                                {{ $products->firstItem() + $key }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.show', ['product' => $product->id]) }}"
                                                    class="text-decoration-none">
                                                    {{ $product->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.brands.show', ['brand' => $product->brand->id]) }}"
                                                    class="text-decoration-none">
                                                    {{ $product->brand->name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{-- @php
                                                $category = \App\Models\Category::find($product->category_id);
                                            @endphp
                                            {{ $category->name }} --}}

                                                {{ $product->category->name }}
                                            </td>
                                            <td>
                                                <span
                                                    class="{{ $product->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                                    {{ $product->is_active }}
                                                </span>
                                            </td>


                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                        id="{{ $product->id }}" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        عملیات
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="{{ $product->id }}">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.products.edit', ['product' => $product->id]) }}">
                                                                ویرایش محصول
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin.products.images.edit', ['product' => $product->id]) }}"">
                                                                ویرایش تصاویر
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                ویرایش دسته بندی و ویژگی

                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        {{ $products->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->
@endsection
