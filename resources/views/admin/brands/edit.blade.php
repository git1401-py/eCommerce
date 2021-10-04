@extends('admin.layouts.admin')

@section('title')
    edit brands
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder">ویرایش برند {{ $brand->name }}</h5>
                            <hr>
                            @include('admin.sections.errors')
                            <form action="{{ route('admin.brands.update' , ['brand' => $brand->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $brand->name }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="is_active">وضعیت</label>
                                        <select class="form-control" id="is_active" name="is_active" >
                                            <option value="1" {{ $brand->getRawOriginal('is_active') ? 'selected' : '' }} > فعال </option>
                                            <option value="0" {{ $brand->getRawOriginal('is_active') ? '' : 'selected' }}> غیر فعال </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                                    </div>
                                    <div class="form-group col-md-4 me-auto">

                                    </div>
                                    <div class="form-group col-md-2 me-auto">
                                        <a href="{{ route('admin.brands.index') }}" class="btn btn-dark"> بازگشت </a>
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
