<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">

    <a href="#" class="navbar-brand d-block mx-auto text-center py-3 mb-4 text-white bottom-border">میز مدیریت</a>

    <ul class="navbar-nav flex-column mt-4 p-0">
        <li class="nav-item  bottom-border-light"><a href="{{ route('dashboard') }}"
                class="nav-link text-white p-3 mb-2 sidebar-link "><i
                    class="fas fa-fw fa-tachometer-alt text-light  ml-3"></i>داشبورد</a></li>

        <div class=" text-muted small"> <span class="small">فروشگاه</span></div>
        <li class="nav-item"><a href="{{ route('admin.brands.index') }}"
                class="nav-link text-white p-3 mb-2 sidebar-link "><i
                    class="fas fa-store text-light  ml-3"></i>برندها</a></li>
        <li class="nav-item">
            <p>
                <a class="nav-link text-white p-3 mb-2 sidebar-link " data-bs-toggle="collapse" href="#collapseExample"
                    role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-shopping-cart text-light fa-lg ml-3"></i>
                    <span>محصولات</span>
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <a class="nav-link text-dark p-3 sidebar-link collapse-item"
                        href="{{ route('admin.products.index') }}">لیست محصولات</a>
                    {{-- <a class="nav-link text-dark p-3 sidebar-link collapse-item"
                    href="{{ route('admin.comments.index') }}">لیست کامنت ها</a> --}}
                    <a class="nav-link text-dark p-3 sidebar-link collapse-item"
                        href="{{ route('admin.categories.index') }}">دسته بندی ها</a>
                    <a class="nav-link text-dark p-3 sidebar-link collapse-item"
                        href="{{ route('admin.attributes.index') }}">ویژگی ها</a>
                    <a class="nav-link text-dark p-3 sidebar-link collapse-item"
                        href="{{ route('admin.tags.index') }}">تگ ها</a>
                </div>
            </div>
        </li>
        <div class=" text-muted small"> <span class="small">تنظیمات</span></div>
        <li class="nav-item"><a href="{{ route('admin.banners.index') }}"
                class="nav-link text-white p-3 mb-2 sidebar-link "><i
                    class="fas fa-store text-light  ml-3"></i>بنرها</a></li>


        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link "><i
                    class="fas fa-user text-light fa-lg ml-3"></i>پروفایل</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                    class="fas fa-envelope text-light fa-lg ml-3"></i>صندوق ورودی</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                    class="fas fa-shopping-cart text-light fa-lg ml-3"></i>فروش ها</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                    class="fas fa-chart-line text-light fa-lg ml-3"></i>آنالیز</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                    class="fas fa-chart-bar text-light fa-lg ml-3"></i>نمودار</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                    class="fas fa-table text-light fa-lg ml-3"></i>جداول</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                    class="fas fa-wrench text-light fa-lg ml-3"></i>تنظیمات</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                    class="fas fa-file-alt text-light fa-lg ml-3"></i>مطالب</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 cerrent "><i
                    class="fas fa-home text-light fa-lg ml-3"></i>مدیریت</a></li>

    </ul>
</div>
