@extends('admin.layouts.admin')

@section('title')
    show orders
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder"> سفارش : {{ $order->id }}</h5>
                            <hr>

                                <div class="row">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="name">نام کاربر</label>
                                        <input type="text" class="form-control" name="name" value="{{ $order->user->name == null ? 'کاربر' : $order->user->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="coupon">نام کوپن</label>
                                        <input type="text" class="form-control" name="coupon" value="{{ $order->coupon_id == null ? 'استفاده نشده' : $order->coupon->name}}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >وضعیت</label>
                                        <input type="text" class="form-control {{ $order->getRawOriginal('status') ? 'text-success' : 'text-danger' }}" value="{{ $order->status }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >مبلغ</label>
                                        <input type="text" class="form-control" value="{{ number_format($order->total_amount)  }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >هزینه ارسال</label>
                                        <input type="text" class="form-control" value="{{ number_format($order->delivery_amount)  }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >مبلغ کد تخفیف</label>
                                        <input type="text" class="form-control" value="{{ number_format($order->coupon_amount) }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >مبلغ پرداختی</label>
                                        <input type="text" class="form-control" value="{{ number_format($order->paying_amount)  }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >نوع پرداختی</label>
                                        <input type="text" class="form-control" value="{{ $order->payment_type  }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >وضعیت پرداخت</label>
                                        <input type="text" class="form-control" value="{{ $order->payment_status  }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >تاریخ ایجاد</label>
                                        <input type="text" class="form-control" style="font-size:12px" value="{{ verta($order->created_at)->format('Y/n/j H:i') }}" disabled>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label >آدرس</label>
                                        <textarea rows="3" class="form-control text-end"  disabled>
                                            {{-- استان {{ $order->address->province->name  }} شهر {{ $order->address->city->name  }} --}}
                                             {{ $order->address->address  }} . کد پستی {{ $order->address->postal_code  }}
                                        </textarea>
                                    </div>

                                    <table class="table table-bordered table-hover table-responsive table-info table-striped">
                                        <thead>
                                            <tr>
                                                <th> تصویر محصول </th>
                                                <th> نام محصول </th>
                                                <th> فی </th>
                                                <th> تعداد </th>
                                                <th> قیمت کل </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)

                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="{{ route('admin.products.show' , ['product' => $item->product->id]) }}">
                                                        <img style="width: 50px; height:50px;"
                                                            src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->product->primary_image) }}" alt="{{ $item->product->name }}"
                                                            >
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="{{ route('admin.products.show' , ['product' => $item->product->id]) }}">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </td>
                                                <td class="product-price-cart">
                                                    <span class="amount">
                                                        {{ number_format($item->price) }}تومان
                                                    </span>
                                                </td>
                                                <td class="product-quantity">
                                                    {{ $item->quantity }}
                                                </td>
                                                <td class="product-subtotal">
                                                    {{ number_format($item->subtotal) }}تومان
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    <div class="form-group col-md-9 mb-3">

                                    </div>
                                    <div class="form-group col-md-3 mb-3 me-auto">
                                        <a href="{{ route('admin.orders.index') }}" class="btn btn-dark "> بازگشت </a>
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
