<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">

    <a href="#" class="navbar-brand d-block mx-auto text-center py-3 mb-4 text-white bottom-border">میز مدیریت</a>

    <ul class="navbar-nav flex-column mt-4 p-0">
      <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-white p-3 mb-2 sidebar-link "><i class="fas fa-fw fa-tachometer-alt text-light  ml-3"></i>داشبورد</a></li>

        <div class=" text-muted small"> <span class="small">فروشگاه</span></div>
        <li class="nav-item"><a href="{{ route('admin.brands.index') }}" class="nav-link text-white p-3 mb-2 sidebar-link "><i class="fas fa-store text-light  ml-3"></i>برندها</a></li>

        <li class="nav-item">
            <a class="nav-link text-white p-3 collapse-sidebar-link collapsed" href="" data-toggle="collapse" data-target="#collapseEmployee" aria-expanded="true" aria-controls="collapseEmployee">
                <i class="fas fa-store text-light fa-lg ml-3"></i>
                <span>برندها</span>
            </a>
            <div id="collapseEmployee" class="collapse mr-5" data-parent="#accordionSidebar">
                <div class="collapse-item-link bg-licollapse-sidebaght py-2 collapse-inner rounded">
                    <a class="nav-link text-dark p-3 sidebar-link collapse-item" href="/admin/store-employee">افزودن کارمند</a>
                    <a class="nav-link text-dark p-3 sidebar-link collapse-item" href="/admin/employee">همه کارمندان</a>
                </div>
            </div>
        </li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link "><i class="fas fa-user text-light fa-lg ml-3"></i>پروفایل</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-envelope text-light fa-lg ml-3"></i>صندوق ورودی</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg ml-3"></i>فروش ها</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-chart-line text-light fa-lg ml-3"></i>آنالیز</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-chart-bar text-light fa-lg ml-3"></i>نمودار</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-table text-light fa-lg ml-3"></i>جداول</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-wrench text-light fa-lg ml-3"></i>تنظیمات</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-file-alt text-light fa-lg ml-3"></i>مطالب</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 cerrent "><i class="fas fa-home text-light fa-lg ml-3"></i>مدیریت</a></li>

    </ul>
  </div>
