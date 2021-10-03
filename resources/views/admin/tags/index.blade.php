@extends('admin.layouts.admin')

@section('title')
    inbox tags
@endsection

@section('content')
    <!-- cards  -->
    <section>
        <div class="container-fluid" style="min-height:100vh;">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <div class="col-xl-12 col-sm-12 p-3 bg-white">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="font-weight-bolder">لیست تگها ({{$tags->total() }})</h5>
                                <a href="{{ route('admin.tags.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus ml-1"></i>ایجاد تگ
                                </a>
                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $key => $tag )
                                    <tr>
                                        <td>
                                            {{ $tags->firstItem() + $key }}
                                        </td>
                                        <td>
                                            {{ $tag->name }}
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.tags.show' , ['tag' => $tag->id]) }}" class="btn btn-sm btn-outline-success" >
                                                نمایش
                                            </a>
                                            <a href="{{ route('admin.tags.edit' , ['tag' => $tag->id]) }}" class="btn btn-sm text-info mr-2" >
                                                <i class="fa fa-edit ml-1"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>


                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        {{ $tags->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of cards -->



@endsection
