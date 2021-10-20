@extends('admin.layouts.admin')

@section('title')
    inbox orders
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
                                <h5 class="font-weight-bolder">لیست سفارشات ({{$orders->total() }})</h5>
                                <a href="{{ route('admin.orders.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus ml-1"></i>ایجاد سفارش
                                </a>
                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام کاربر</th>
                                        <th>وضعیت</th>
                                        <th>مبلغ</th>
                                        <th>نوع پرداخت</th>
                                        <th>وضعیت پرداخت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $order )
                                    <tr>
                                        <td>
                                            {{ $orders->firstItem() + $key }}
                                        </td>
                                        <td>
                                            {{ $order->user->name == null ? 'کاربر' :  $order->user->name}}
                                        </td>
                                        <td>
                                            <span class="badge {{ $order->getRawOriginal('status') ? 'bg-success' : 'bg-danger' }}">{{ $order->status }}</span>
                                        </td>
                                        <td>
                                            {{ number_format($order->total_amount) }}
                                            تومان
                                        </td>

                                        <td>
                                            {{ $order->payment_type }}
                                        </td>
                                        <td>
                                            <span class="badge {{ $order->getRawOriginal('payment_status') ? 'bg-success' : 'bg-danger' }}">{{ $order->payment_status }}
                                            </span>
                                        </td>


                                        <td>
                                            <a href="{{ route('admin.orders.show' , ['order' => $order->id]) }}" class="btn btn-sm btn-outline-success" >
                                                نمایش
                                            </a>
                                            <a href="{{ route('admin.orders.edit' , ['order' => $order->id]) }}" class="btn btn-sm text-info mr-2" >
                                                <i class="fa fa-edit ml-1"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            <form action="{{ route('admin.orders.index') }}" method="GET">



                            </form>
                        </div>


                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        {{ $orders->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
