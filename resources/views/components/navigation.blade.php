@if (Route::has('login'))
<div class=" navbar navbar-custom  top-0 left-0 px-6 py-2 sm:block ">
    @auth
    <div class="nav-item dropdown pe-2 d-flex align-items-center">
        <a href="javascript:;" class="nav-link text-body p-0 " id="dropdownMenuButton" data-bs-toggle="dropdown"
            aria-expanded="true">
            <span id="user-fa-custom" style="font-size: 2em; ;">
                <i class="fas fa-user"></i>
            </span>
        </a>
        <ul class="dropdown-menu  px-1 py-2 me-sm-n4  " aria-labelledby="dropdownMenuButton" data-bs-popper="none">
            <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">

                    <p class="text-xs text-secondary mb-0 py-1">
                        <span style=" color: rgb(0, 172, 43);">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span style="padding-left: 10px">أضافة فرع جديد
                        </span>
                    </p>

                </a>
            </li>

            <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">

                    <p class="text-xs text-secondary mb-0 py-1">
                        <span style=" color: rgb(172, 46, 0);">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span style="padding-left: 10px">تسجيل خروج
                        </span>
                    </p>

                </a>
            </li>

        </ul>
    </div>


    @else
    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('login.login')
        }}</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{
        __('login.register') }}</a>
    @endif
    @endauth
</div>
@endif


{{-- <script>
    $("#user-fa-custom").click(function () {

	$(this).toggleClass("active");
});
</script> --}}
