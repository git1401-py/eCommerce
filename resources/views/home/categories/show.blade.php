@extends('home.layouts.home')
@section('title')
    فروشگاه
@endsection

@section('content')

<div class="container-fluid my-2">
    <div class="row justify-content-start align-items-center p-3">
        <div class="col-4">

              <nav dir="ltr" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">فروشگاه</li>
                  <li class="breadcrumb-item"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                </ol>
              </nav>
        </div>
    </div>
</div>

<div class="container-fluid py-2 bg-white">


        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="mobile-search">
                    {{-- <form class="search-form" action="#" > --}}
                        <input id="search-input" type="text" placeholder=" جستجو ... "
                            value = "{{ request()->has('search') ?  request()->search : '' }}"
                        >
                        <button type="button" class="button-search" onclick="filter()">
                            <i class="sli sli-magnifier"></i>
                        </button>
                    {{-- </form> --}}
                </div>
            </div>
            <div class="col-md-8 col-lg-9 d-flex justify-content-end align-items-center">

                    <select id="sort-by" class="form-select form-select-sm" style="width:200px"
                            aria-label=".form-select-sm example"  onchange="filter()">
                        <option value="default">مرتب سازی</option>
                        <option value="max"
                            {{ ( request()->has('sortBy') && request()->sortBy == 'max'  ) ? 'selected' : '' }} >
                             بیشترین قیمت
                        </option>
                        <option value="min"
                                {{ ( request()->has('sortBy') && request()->sortBy == 'min'  ) ? 'selected' : '' }}>
                            کمترین قیمت
                        </option>
                        <option value="latest"
                                {{ ( request()->has('sortBy') && request()->sortBy == 'latest'  ) ? 'selected' : '' }}>
                            جدیدترین
                        </option>
                        <option value="oldest"
                                {{ ( request()->has('sortBy') && request()->sortBy == 'oldest'  ) ? 'selected' : '' }}>
                            قدیمی ترین
                        </option>
                    </select>
            </div>
        </div>

        <div class="row">
            <!-- sidebar -->

            <div class="col-md-4 col-lg-3">
                {{-- <form id="filter-form" >
                    <div class="mobile-search">
                        <form class="search-form" >
                            <input type="text" placeholder=" ... جستجو " />
                            <button class="button-search">
                                <i class="sli sli-magnifier"></i>
                            </button>
                        </form>
                    </div>

                    <div class="accordion" id="accordionFiltering">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="ps-4">دسته بندی</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFiltering">
                                <div class="accordion-body">
                                    <ul>
                                        @if ($category->parent == null)

                                            <li >
                                                <span style="color:#ff3535">{{ $category->name }}</span>
                                                <ul>
                                                    @foreach ($category->children as $childCategory)
                                                        <li class="py-1">
                                                            <a href="{{ route('home.categories.show' , ['category' => $childCategory->slug]) }}">
                                                                {{ $childCategory->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                        @else
                                            <li>
                                                {{ $category->parent->name }}
                                                <ul>
                                                    @foreach ($category->parent->children as $childCategory)
                                                        <li class="py-1">
                                                            <a href="{{ route('home.categories.show' , ['category' => $childCategory->slug]) }}"
                                                                style="{{ $childCategory->slug == $category->slug ? 'color:#ff3535' : '' }}">
                                                                {{ $childCategory->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif



                                    </ul>


                                </div>
                            </div>
                        </div>

                        @foreach ($attributes as $attribute)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $attribute->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $attribute->id }}" aria-expanded="false" aria-controls="collapse-{{ $attribute->id }}">
                                    <span class="ps-4">{{ $attribute->name }}</span>
                                </button>
                                </h2>
                                <div id="collapse-{{ $attribute->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $attribute->id }}" data-bs-parent="#accordionFiltering">
                                <div class="accordion-body">
                                    @foreach ($attribute->values as $value)
                                        <div class="form-check pb-2">
                                            <input class="form-check-input" type="checkbox"
                                                name="attribute[{{ $attribute->id }}]" value="{{ $value->value }}"
                                                id="flexCheck-{{ $value->value }}" onchange="filter()">
                                            <label class="form-check-label" for="flexCheck-{{ $value->value }}">
                                                {{ $value->value }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $variation->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $variation->id }}" aria-expanded="false" aria-controls="collapse-{{ $variation->id }}">
                                <span class="ps-4">{{ $variation->name }}</span>
                            </button>
                        </h2>
                        <div id="collapse-{{ $variation->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $variation->id }}" data-bs-parent="#accordionFiltering">
                            <div class="accordion-body">
                                @foreach ($variation->variationValues as $value)
                                        <div class="form-check pb-2">
                                            <input class="form-check-input variation" type="checkbox"
                                                value="{{ $value->value }}" id="flexCheck{{ $value->value }}"
                                                onchange="filter()"
                                                {{ (request()->has('variation') && in_array( $value->value , explode('-' , request('variation')) ) ) ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="flexCheck{{ $value->value }}">
                                                {{ $value->value }}
                                            </label>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                        </div>
                    </div>

                    <input id="filter-variation" type="hidden" name="variation">
                </form> --}}
                    <div class="pt-3 pb-2">
                        <div class="container">

                            <div class=" me-2">


                                <div class="">
                                    <h5 class=""> دسته بندی </h5>
                                    <div class=" mt-3">
                                        <ul>
                                            {{ $category->parent->name }}
                                            @foreach ($category->parent->children as $childCategory)
                                            <li>
                                                <a href="{{ route('home.categories.show' , ['category' => $childCategory->slug ]) }}"
                                                    style="{{ $childCategory->slug == $category->slug ? 'color: #ff3535' : '' }}"
                                                    >
                                                    {{ $childCategory->name }}
                                                </a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <hr>

                                @foreach ($attributes as $attribute)
                                    <div class="mt-3">
                                        <h5 class=""> {{ $attribute->name }} </h5>
                                        <div class="mt-2">
                                            <ul>
                                                @foreach ($attribute->values as $value)
                                                    <li>
                                                        <div class="">
                                                            <input type="checkbox" class="attribute-{{$attribute->id}}"
                                                                {{ ( request()->has('attribute.'.$attribute->id) && in_array( $value->value , explode('-' , request()->attribute[$attribute->id] ) ) ) ? 'checked' : '' }}
                                                                value="{{ $value->value }}" onchange="filter()" >
                                                            <a href="#"> {{ $value->value }} </a>
                                                            <span class="checkmark"></span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach

                                <div class="mt-3">
                                    <h5 class="">{{ $variation->name }} </h5>
                                    <div class="mt-2">
                                        <ul>
                                            @foreach ($variation->variationValues as $value)
                                                <li>
                                                    <div class="sidebar-widget-list-left">
                                                        <input type="checkbox" class="variation" value="{{ $value->value }}"
                                                        onchange="filter()"
                                                        {{ ( request()->has('variation') && in_array( $value->value , explode('-' , request('variation') ) ) ) ? 'checked' : '' }}
                                                        > <a href="#"> {{ $value->value }} </a>
                                                        <span class="checkmark"></span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

            </div>


            <div class="col-md-8 col-lg-9">
                <div class="container-fluid">
                    <div class="row">

                        <div class="product-area mt-5 pt-5">
                            <div class="container-fluid">
                                <div class="container-tab row mt-3">
                                    <div class="tab-content show">
                                        <div class="row">
                                            @foreach ($products as $product)
                                                <div class="col-md-6 col-lg-4 mb-3">
                                                    <div class="card position-relative m-0" style="width: 100%;height: 100%;">
                                                        <a href="{{ route('home.products.show' , ['product' => $product->slug] ) }}">
                                                            <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                                alt="{{ $product->name }}" class="w-100 h-100">
                                                        </a>
                                                        <div class="product-action position-absolute top-0" style="left:50px;">
                                                            <div class="ht-product-action bg-warning">
                                                                <ul class="">
                                                                    <li>
                                                                        <a href="#" class="" data-bs-toggle="modal" data-bs-target="#productModal-{{$product->id}}">
                                                                            <i class="sli sli-magnifier"></i>
                                                                            <span class="span-magnifier"> مشاهده سریع </span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="sli sli-heart"></i><span class=" span-heart"> افزودن
                                                                                به
                                                                                علاقه مندی ها </span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="sli sli-refresh"></i><span class="span-refresh">
                                                                                مقایسه
                                                                            </span></a>
                                                                    </li>
                                                                    {{-- <li>
                                                                        <a href="#"><i class="sli sli-bag"></i><span class="span-bag"> افزودن به سبد
                                                                                خرید </span></a>
                                                                    </li> --}}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="small p-2">
                                                            <h5 class="text-end mb-4"><a href="#">{{ $product->name }}</a></h5>
                                                            <div class="text-end">
                                                                @if ($product->quantity_check)

                                                                    @if ($product->sale_check)
                                                                        <span class="fw-bolder" style="color:red; font-size: 18px">
                                                                            {{ number_format($product->sale_check->sale_price) }}
                                                                            تومان
                                                                        </span>
                                                                        <del class="small">
                                                                            {{ number_format($product->sale_check->price) }}

                                                                            تومان
                                                                        </del>
                                                                    @else
                                                                        <span class="fw-bolder" style="color:red; font-size: 18px">
                                                                            {{ number_format($product->price_check->price) }}
                                                                            تومان
                                                                        </span>
                                                                    @endif

                                                                @else
                                                                <span class="badge rounded-pill bg-danger bg-opacity-75">
                                                                    ناموجود
                                                                    <span class="visually-hidden">unread messages</span>
                                                                </span>
                                                                @endif

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="my-2 small">
                                                                    <div
                                                                        data-rating-stars="5"
                                                                        data-rating-readonly="true"
                                                                        data-rating-value="{{ ceil($product->rates->avg('rate')) }}"
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <span class="small border-end">___<a href="#">{{ $product->category->name }}</a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                            <!-- Add Pagination -->
                                    </div>
                                    <div class="tab-content" id="women">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 bg-danger">bb
                                            <div class="card"><img src="{{ asset('img/product/product-5.svg') }}"
                                                    class="w-100 h-100"></div>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="children">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 bg-danger">cc
                                            <div class="card"><img src="{{ asset('img/product/product-9.svg') }}"
                                                    class="w-100 h-100"></div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>

                        <div class="gallery-thumbs2" style="visibility: hidden">
                        </div>
                        <!-- Modal -->
                        @foreach ($products as $product)
                            <div class="modal fade" id="productModal-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                    <div class="modal-content text-end small" style="direction: rtl;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-12">
                                                        <div class="">
                                                            <h4 class="text-right mb-4">{{ $product->name }}</h4>
                                                            <div class="text-end variation-price">
                                                                @if ($product->quantity_check)

                                                                    @if ($product->sale_check)
                                                                        <span class="fw-bolder text-danger fa-2x" >
                                                                            {{ number_format($product->sale_check->sale_price) }}
                                                                            تومان
                                                                        </span>
                                                                        <del class="small">
                                                                            {{ number_format($product->sale_check->price) }}

                                                                            تومان
                                                                        </del>
                                                                    @else
                                                                        <span class="fw-bolder text-danger fa-2x">
                                                                            {{ number_format($product->price_check->price) }}
                                                                            تومان
                                                                        </span>
                                                                    @endif

                                                                @else
                                                                    <span class="badge rounded-pill bg-danger bg-opacity-75">
                                                                    ناموجود
                                                                </span>
                                                                @endif

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="my-2 small">
                                                                    <div
                                                                        data-rating-stars="5"
                                                                        data-rating-readonly="true"
                                                                        data-rating-value="{{ ceil($product->rates->avg('rate')) }}"
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <span class="small border-end">___<a href="#">{{ $product->category->name }}</a></span>
                                                            </div>
                                                            <p class="">
                                                                {{ $product->description }}
                                                            </p>
                                                            <div class="pro-details-list">
                                                                <ul class="">
                                                                    @foreach ($product->attributes()->with('attribute')->get() as $attribute)
                                                                        <li> -
                                                                            {{ $attribute->attribute->name }}: {{ $attribute->value }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <hr>
                                                            @if ($product->quantity_check)
                                                                @php
                                                                    if($product->sale_check)
                                                                    {
                                                                        $variationProductSelected = $product->sale_check;
                                                                    }else{
                                                                        $variationProductSelected = $product->price_check;
                                                                    }
                                                                @endphp
                                                                <div class="">
                                                                    <div class="">

                                                                        <div class="my-2 w-50">

                                                                            <span>{{ App\Models\Attribute::find($product->variations->first()->attribute_id)->name }}</span>
                                                                            <select class="form-control variation-select">
                                                                                @foreach ($product->variations()->where('quantity' , '>' , 0)->get() as $variation)
                                                                                    <option
                                                                                    value="{{ json_encode($variation->only(['id' , 'quantity','is_sale' , 'sale_price' , 'price'])) }}"
                                                                                    {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}
                                                                                    >{{ $variation->value }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="d-flex align-items-center justify-content-end">
                                                                    <div class="text-muted d-flex align-items-center justify-content-center"
                                                                        style="width: 50px; height: 60px;">
                                                                        <span class="p-2 plus" style="cursor: pointer">+</span>
                                                                        <input class="text-center box quantity-input" type="text"
                                                                            style="width: 50px; height: 60px;" value="2"  data-max="5"/>
                                                                        <span class="p-2 mines" style="cursor: pointer">-</span>
                                                                    </div>
                                                                    <div class="me-4">
                                                                        <a href="#">افزودن به سبد خرید</a>
                                                                    </div>
                                                                    <div class="p-2">
                                                                        <a title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                                                    </div>
                                                                    <div class="p-2">
                                                                        <a title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="mt-3">
                                                                <span>دسته بندی :</span>
                                                                <ul class="list-group list-group-horizontal justify-content-en">
                                                                    <li class="list-group-item p-0 border-0">
                                                                        <a href="#">
                                                                            {{ $product->category->parent->name }} ، {{ $product->category->name }}
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="my-3">
                                                                <span>تگ ها :</span>
                                                                <ul class="list-group list-group-horizontal justify-content-en">
                                                                    @foreach ($product->tags as $tag)
                                                                        <li class="list-group-item p-0 border-0">
                                                                            <a href="#">{{ $tag->name }}{{ $loop->last ? '' : '،' }}</a>
                                                                        </li>
                                                                    @endforeach


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 col-sm-12">
                                                        <!-- Swiper -->

                                                        <div class="modal-swiper">
                                                            <div class="swiper swiper-custom" style="">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                                        alt="{{ $product->name }}">
                                                                    </div>
                                                                    @foreach ($product->images as $image)
                                                                        <div class="swiper-slide">
                                                                            <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                                                            alt="">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <!-- Add Navigation -->
                                                                <div class="swiper-button-next swiper-button-white"></div>
                                                                <div class="swiper-button-prev swiper-button-white"></div>
                                                            </div>
                                                            <div class="swiper swiper-product gallery-thumbs gallery-thumbs3">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                                        alt="{{ $product->name }}">
                                                                    </div>
                                                                    @foreach ($product->images as $image)
                                                                        <div class="swiper-slide">
                                                                            <img  src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                                                            alt="">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endforeach
                        <!-- Modal end -->

                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row py-5">
                        <nav aria-label="Page navigation example" dir="ltr">
                            <ul id="pagination" class="pagination justify-content-center">
                                {{ $products->withQueryString()->links() }}
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>

    <form id="filter-form">
        <input id="filter-sort-by" type="hidden" name="sortBy">
        <input id="filter-search" type="hidden" name="search">
        @foreach ($attributes as $attribute)
        <input id="filter-attribute-{{$attribute->id}}" type="hidden" name="attribute[{{$attribute->id}}]">
        @endforeach
        <input id="filter-variation" type="hidden" name="variation">

    </form>
    <div class="row">

    </div>
</div>
@endsection

@section('script')

    <script>
        function filter(){
            let search = $('#search-input').val();
            if(search == ""){
                $('#filter-search').prop('disabled' , true);
            }else{
                $('#filter-search').val(search);
            }

            let sortBy = $('#sort-by').val();
            if(sortBy == "default"){
                $('#filter-sort-by').prop('disabled' , true);
            }else{
                $('#filter-sort-by').val(sortBy);
            }


            let variation = $('.variation:checked').map(function(){
                return this.value;
            }).get().join('-');
            if(variation == ""){
                $('#filter-variation').prop('disabled' , true);
            }else{
                $('#filter-variation').val(variation);
            }

            let attributes = @json($attributes);
            attributes.map(attribute =>{
                let valueAttributes = $(`.attribute-${attribute.id}:checked`).map(function(){
                return this.value;
            }).get().join('-');
            if(valueAttributes == ""){
                $(`#filter-attribute-${attribute.id}`).prop('disabled' , true);
            }else{
                $(`#filter-attribute-${attribute.id}`).val(valueAttributes);
            }
            });

            $('#filter-form').submit();
        }

        $('#filter-form').on('submit' , function(event){
            event.preventDefault();
            let currentUrl = '{{ url()->current() }}';
            let url = currentUrl + '?' + decodeURIComponent($(this).serialize());
            $(location).attr('href' , url);
        })

        $('#pagination li a').map(function(){

            let decodeUrl = decodeURIComponent( $(this).attr('href') );
            if( $(this).attr('href') != undefined ){
                $(this).attr('href' , decodeUrl )

            }
        });


    // var galleryThumbs2 = new Swiper('.gallery-thumbs2', {});

    var galleryThumbs3 = new Swiper('.gallery-thumbs3', {
      spaceBetween: 10,
      slidesPerView: 4,
    //   loop: true,
    //   loopedSlides: 5, //looped slides should be the same
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiperCustom3 = new Swiper('.swiper-custom', {

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // thumbs: {
        //     swiper: galleryThumbs2,
        // },
    });
    $('.variation-select').on('change' , function(){
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price');
            variationPriceDiv.empty();

            if(variation.is_sale){
                let spanSale = $('<span />' , {
                    class : 'fw-bolder text-danger fa-2x',
                    text : toPersianNum(number_format(variation.sale_price)) + ' تومان'
                });
                let spanPrice = $('<del />' , {
                    class : 'small',
                    text : toPersianNum(number_format(variation.price)) + ' تومان'
                });

                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
            }else{
                let spanPrice = $('<span />' , {
                    class : 'fw-bolder text-danger fa-2x',
                    text : toPersianNum(number_format(variation.price)) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }

            $('.quantity-input').attr('data-max' , variation.quantity);
            $('.quantity-input').val(1);


        });
        $('.plus').on('click' , function(){
            if(Number($('.quantity-input').val()) < $('.quantity-input').attr('data-max')){
                $('.quantity-input').val(Number($('.quantity-input').val())+1) ;
            }else
                {
                    $('.quantity-input').val($('.quantity-input').attr('data-max'));
                }
            });
            $('.mines').on('click' , function(){
                if(Number($('.quantity-input').val()) > 2 ){
                    $('.quantity-input').val(Number($('.quantity-input').val())-1);
                }else{
                    $('.quantity-input').val(1);
                }

            });

    </script>
@endsection
