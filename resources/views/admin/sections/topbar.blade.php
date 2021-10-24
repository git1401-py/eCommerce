<div class="col-xl-10 col-lg-9 col-md-8 me-auto bg-dark fixed-top py-2 top-navbar">

    <div class="row align-items-center">
      <div class="col-md-3 ">
        <h4 class="text-light mb-0 ">مدیریت</h4>
      </div>
      <div class="col-md-5">
        {{-- <form>
          <div class="input-group">
              <button type="button" class="btn btn-white rounded-circle search-button"><i class="fas fa-search text-danger"></i>
              </button>
            <input type="text" placeholder="جستجو..." class="form-control text-light search-input">
          </div>
        </form> --}}
      </div>
      <div class="col-md-4">
        <ul class="navbar-nav ">
            <div class="w-auto  d-flex me-auto">
                {{-- <li class="nav-item px-1 icon-parent"><a href="{{ route('admin.comments.index') }}" class="nave-link icon-bullet"><i class="fas fa-comments text-muted fa-lg"></i></a></li> --}}
          {{-- <li class="nav-item px-1 icon-parent"><a href="#" class="nave-link icon-bullet"><i class="fas fa-bell text-muted fa-lg"></i></a></li> --}}
          <li class="nav-item px-1 "><a href="{{ route('logout') }}" class="nave-link"><i class="fas fa-sign-out-alt  text-danger fa-lg" data-toggle="modal" data-target="#sign-out"></i></a></li>
          <li class="nav-item px-1 me-md-2 position-relative">
            <a href="" class="nav-link text-white collapse-sidebar-link p-0  collapsed" data-toggle="collapse" data-target="#collapseadmin" aria-expanded="true" aria-controls="collapseadmin">
                <div class="text-center">
                    <img class="card-img-top rounded-circle"
                    src="{{ url(env('USER_IMAGES_UPLOAD_PATH') . auth()->user()->avatar) }}"
                    alt="{{ auth()->user()->avatar }}" style="width: 50px; height:50px;">
                    {{-- <div class="text-white small">{{ auth()->user()->name == null ? auth()->user()->cellphone : auth()->user()->name }} </div> --}}
                  </div>
            </a>
            <div
                id="collapseadmin"
                class="collapse mr-5 position-absolute bg-secondary border border-1 rounded-3"
                style="top:55px;left:-4px; width:200px"
            >
                <div class="collapse-item-link bg-licollapse-sidebaght py-2 collapse-inner rounded">
                    <a class="nav-link text-dark p-3 sidebar-link collapse-item" href="/admin/store-employee">افزودن کارمند</a>
                    <a class="nav-link text-dark p-3 sidebar-link collapse-item" href="/admin/employee">همه کارمندان</a>
                </div>
            </div>
          </li>
            </div>


        </ul>
      </div>
    </div>

  </div>
<!--  modal -->
{{-- <div class="modal fade" id="sign-out">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">میخواهید خارج شوید؟</h4>
          <a type="button" class="close mr-auto ml-0" data-dismiss="modal">&times;</a>
        </div>
        <div class="modal-body text-muted small">برای خارج شدن کلیک کن</div>
        <div class="modal-footer d-flex justify-content-between">
          <a type="button" class="btn btn-success m-1" data-dismiss="modal">در همین صفحه باقی می مانم</a>
          <a type="button" class="btn btn-danger m-1" data-dismiss="modal" href="{{ route('logout') }}">خارج می شوم</a>
        </div>
      </div>
    </div>
  </div>--}}
  <!--  End of modal -->
