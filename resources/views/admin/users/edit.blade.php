@extends('admin.layouts.admin')

@section('title')
    edit users
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid bg-white" style="min-height:100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 mb-4 p-3 bg-white">
                            <h5 class="font-weight-bolder">ویرایش کاربر {{ $user->name }}</h5>
                            <hr>
                            @include('admin.sections.errors')
                            <form action="{{ route('admin.users.update' , ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="cellphone">شماره تلفن همراه</label>
                                        <input type="text" class="form-control @error('cellphone') is-invalid @enderror" id="cellphone" name="cellphone" value="{{ $user->cellphone }}">
                                    </div>
                                    <div class="form-group col-md-4 mb-3 small text-muted">
                                        <label for="user_role">نقش کاربر</label>
                                        <select class="form-control" id="user_role" name="role">
                                            <option></option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}" {{ in_array($role->id , $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}> {{ $role->display_name  }} </option>
                                            @endforeach
                                        </select>
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
                                                                value="{{$permission->name}}"
                                                                {{in_array($permission->id , $user->permissions->pluck('id')->toArray() ) ? 'checked' : ''}}
                                                                >
                                                            <label class="form-check-label"
                                                                for="permission-{{$permission->id}}">{{ $permission->display_name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                                    </div>
                                    <div class="form-group col-md-4 mb-3 me-auto">

                                    </div>
                                    <div class="form-group col-md-2 mb-3 me-auto">
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-dark"> بازگشت </a>
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
