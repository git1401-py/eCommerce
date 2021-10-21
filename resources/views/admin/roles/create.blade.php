@extends('admin.layouts.admin')

@section('title')
    create roles
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder">ایجاد نقش</h5>
                            <hr>
                            @include('admin.sections.errors')
                            <form action="{{ route('admin.roles.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="display_name">نام نمایشی</label>
                                        <input type="text" class="form-control @error('display_name') is-invalid @enderror"
                                            id="display_name" name="display_name" value="{{ old('display_name') }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name">نام انگلیسی</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <div class="card">
                                            <p class="card-header p-0">
                                                <a class="nav-link text-dark p-3 sidebar-link "
                                                    data-bs-toggle="collapse" href="#collapsePermission" role="button"
                                                    aria-expanded="false" aria-controls="collapsePermission">
                                                    <span>مجوزهای دسترسی</span>
                                                </a>
                                            </p>
                                            <div class="collapse card-body" id="collapsePermission">
                                                <div class="row px-0">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-group form-check form-check-inline col-md-3 mb-3 border-start">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="{{$permission->name}}" id="permission-{{$permission->id}}"
                                                                value="{{$permission->name}}">
                                                            <label class="form-check-label"
                                                                for="permission-{{$permission->id}}">{{ $permission->display_name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <button type="submit" class="btn btn-outline-primary">ثبت</button>
                                    </div>
                                    <div class="form-group col-md-4 mb-3 me-auto">

                                    </div>
                                    <div class="form-group col-md-2 mb-3 me-auto">
                                        <a href="{{ route('admin.roles.index') }}" class="btn btn-dark"> بازگشت </a>
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
