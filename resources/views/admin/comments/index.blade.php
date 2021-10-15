@extends('admin.layouts.admin')

@section('title')
    inbox comments
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
                                <h5 class="font-weight-bolder">لیست کامنتها ({{$comments->total() }})</h5>

                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام کاربر</th>
                                        <th>نام محصول</th>
                                        <th>متن</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $comment )
                                    <tr>
                                        <td>
                                            {{ $comments->firstItem() + $key }}
                                        </td>
                                        <td>
                                            <a href="#">
                                                {{ $comment->user->name == null ? $comment->user->cellphone : $comment->user->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.show' , ['product' => $comment->product->id]) }}">
                                                {{ $comment->product->name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $comment->text }}
                                        </td>
                                        <td>
                                            <span class="{{ $comment->getRawOriginal('approved') ? 'text-success' : 'text-danger' }}">
                                                {{ $comment->approved }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.comments.show' , ['comment' => $comment->id]) }}" class="btn btn-sm btn-outline-success" >
                                                نمایش
                                            </a>
                                            <form action="{{ route('admin.comments.destroy' , ['comment' => $comment->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger m-2" >
                                                    حذف
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            <form action="{{ route('admin.comments.index') }}" method="GET">



                            </form>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        {{ $comments->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
