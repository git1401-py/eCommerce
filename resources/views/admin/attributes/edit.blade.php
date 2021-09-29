@extends('admin.layouts.admin')

@section('title')
    edit attributes
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid" style="height:84vh;">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder">ویرایش ویژگی {{ $attribute->name }}</h5>
                            <hr>
                            @include('admin.sections.errors')
                            <form action="{{ route('admin.attributes.update' , ['attribute' => $attribute->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-row d-flex align-items-center">
                                    <div class="form-group col-md-6">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $attribute->name }}">
                                    </div>
                                    <div class="form-group col-md-6"></div>

                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                                    </div>
                                    <div class="form-group col-md-4 me-auto">

                                    </div>
                                    <div class="form-group col-md-2 me-auto">
                                        <a href="{{ route('admin.attributes.index') }}" class="btn btn-dark"> بازگشت </a>
                                    </div>
                                </div>


                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
