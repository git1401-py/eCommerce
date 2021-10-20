@extends('admin.layouts.admin')

@section('title')
    inbox transactins
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
                                <h5 class="font-weight-bolder">لیست تراکنش ها ({{$transactins->total() }})</h5>

                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام کاربر</th>
                                        <th>شماره سفارش</th>
                                        <th>مبلغ</th>
                                        <th>شناسه تراکنش</th>
                                        <th>نام درگاه پرداخت</th>
                                        <th>وضعیت پرداخت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactins as $key => $transactin )
                                    <tr>
                                        <td>
                                            {{ $transactins->firstItem() + $key }}
                                        </td>
                                        <td>
                                            {{ $transactin->user->name == null ? 'کاربر' :  $transactin->user->name}}
                                        </td>
                                        <td>
                                            {{ $transactin->order_id }}
                                        </td>
                                        <td>
                                            {{ number_format($transactin->amount) }}
                                            تومان
                                        </td>
                                        <td>
                                            {{ $transactin->ref_id }}
                                        </td>
                                        <td>
                                            {{ $transactin->gateway_name }}
                                        </td>
                                        <td>
                                            <span class="badge {{ $transactin->getRawOriginal('status') ? 'bg-success' : 'bg-danger' }}">{{ $transactin->status }}</span>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        {{ $transactins->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
