@extends('admin.layouts.admin')

@section('title')
    show comments
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder"> کامنت : </h5>
                            <hr>

                                <div class="row d-flex align-items-center">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="name">نام کاربر</label>
                                        <input type="text" class="form-control" name="name" value="{{  $comment->user->name == null ? $comment->user->cellphone : $comment->user->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="name">نام محصول </label>
                                        <input type="text" class="form-control" name="name" value="{{ $comment->product->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >وضعیت</label>
                                        <input type="text" class="form-control {{ $comment->getRawOriginal('approved') ? 'text-success' : 'text-danger' }}" value="{{ $comment->approved }}" disabled>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label >تاریخ ایجاد</label>
                                        <input type="text" class="form-control" style="font-size:12px" value="{{ verta($comment->created_at)->format('Y/n/j H:i') }}" disabled>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label >متن</label>
                                        <textarea  type="text" class="form-control" style="font-size:12px" disabled>{{ $comment->text }}</textarea>
                                    </div>

                                    <div class="form-group col-md-9 mb-3">
                                        @if ($comment->getRawOriginal('approved'))

                                        <a href="{{ route('admin.comments.change-approve' , ['comment' => $comment->id]) }}" class="btn btn-danger "> عدم تایید </a>
                                        @else

                                        <a href="{{ route('admin.comments.change-approve' , ['comment' => $comment->id]) }}" class="btn btn-success "> تایید </a>
                                        @endif

                                    </div>
                                    <div class="form-group col-md-3 me-auto">
                                        <a href="{{ route('admin.comments.index') }}" class="btn btn-dark "> بازگشت </a>
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
