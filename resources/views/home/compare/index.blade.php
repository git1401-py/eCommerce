@extends('home.layouts.home')
@section('title')
     لیست مقایسه
@endsection

@section('content')

<div class="container-fluid my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">لیست مقایسه</li>
                    <li class="breadcrwishlistumb-item active">
                      <a href="{{ route('home.index') }}">صفحه اصلی</a>
                    </li>
                </ol>
              </nav>
        </div>
    </div>
</div>


    <div class="container-fluid p-5 bg-white">
        <div class="row">

            <!-- my account wrapper start -->
        <div class="my-account-wrapper pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm table-bordered ">
                                <thead>
                                <tr>
                                    <th class="py-auto"> </th>
                                    @foreach ($products as $product)
                                        <th>
                                            <div class="m-0">
                                                <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                                alt="{{ $product->name }}" width="100" class="">
                                                <div class="card-body">
                                                    <a href="{{ route('home.categories.show' , ['category' => $product->category->slug ]) }}">
                                                        {{ $product->category->name }}
                                                    </a>
                                                    <br>
                                                    {{ $product->name }}
                                                </div>
                                            </div>
                                        </th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td> توضیحات </td>
                                            @foreach ($products as $product)
                                                <td> {{ $product->description }} </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td> ویژگی متغییر </td>
                                            @foreach ($products as $product)
                                                <td>
                                                    {{ App\Models\Attribute::find($product->variations->first()->attribute_id)->name }}
                                                    :
                                                    @foreach ($product->variations()->where('quantity' , '>' , 0)->get() as $variation)
                                                        <span>{{ $variation->value }} {{$loop->last ? '' : '،'}}</span>
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td> ویژگی </td>
                                            @foreach ($products as $product)
                                                <td>
                                                    <ul class="text-end p-0">
                                                        @foreach ($product->attributes()->with('attribute')->get() as $attribute)
                                                        <li class="py-1"> -
                                                            {{ $attribute->attribute->name }}: {{ $attribute->value }}
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td> امتیاز </td>
                                            @foreach ($products as $product)
                                                <td>
                                                    <div
                                                        data-rating-stars="5"
                                                        data-rating-readonly="true"
                                                        data-rating-value="{{ ceil($product->rates->avg('rate')) }}"
                                                        >
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td> حذف </td>
                                            @foreach ($products as $product)
                                                <td class="text-center">
                                                    <a href="{{ route('home.compare.remove' , ['product' => $product->id]) }}"> <i class="sli sli-trash" style="font-size: 20px"></i> </a>
                                                </td>
                                            @endforeach
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
        </div>

    </div>

@endsection

