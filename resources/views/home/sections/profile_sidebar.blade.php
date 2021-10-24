<div class="col-lg-3 col-md-4">
    <div class="myaccount-tab-menu nav" role="tablist">

        <a href="{{ route('home.users_profile.index') }}" class="{{ request()->is('profile') ? 'active' : '' }}">
            {{-- <i class="sli sli-user ml-1"></i> --}}
                <img class="card-img-top rounded-circle"
                    src="{{ url(env('USER_IMAGES_UPLOAD_PATH') . auth()->user()->avatar) }}"
                    alt="{{ auth()->user()->avatar }}" style="width: 50px; height:50px;">
            پروفایل
        </a>

        <a href="{{ route('home.orders.users_profile.index') }}" class="{{ request()->is('profile/orders') ? 'active' : '' }}">
            <i class="sli sli-basket ml-1"></i>
            سفارشات
        </a>

        <a href="{{ route('home.addresses.index') }}" class="{{ request()->is('profile/addresses') ? 'active' : '' }}">
            <i class="sli sli-map ml-1"></i>
            آدرس ها
        </a>

        <a href="{{ route('home.wishlist.users_profile.index') }}" class="{{ request()->is('profile/wishlist') ? 'active' : '' }}">
            <i class="sli sli-heart ml-1"></i>
            لیست علاقه مندی ها
        </a>

        <a href="{{ route('home.comments.users_profile.index') }}"  class="{{ request()->is('profile/comments') ? 'active' : '' }}">
            <i class="sli sli-bubble ml-1"></i>
            نظرات
        </a>

        <a href="{{ route('logout') }}">
            <i class="sli sli-logout ml-1"></i>
            خروج
        </a>

    </div>
</div>
