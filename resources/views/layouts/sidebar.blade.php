<div class=" d-flex flex-column flex-shrink-0 p-3 text-white bg-dark  justify-content-end sticky-top side-nav "
    style=" width: 240px; ">
    <div class="header-sidebar">

        <a href="/" class=" text-white text-decoration-none">

            <span class="  fs-4">مدرسة الايتام</span>
        </a>
    </div>

    <hr>
    <ul class="nav  nav-pills flex-column mb-auto ">
        <li class="nav-item  ">
            <a href="#" class="nav-link  text-right" aria-current="page">

                الصفحة الرئيسية
            </a>



        </li>

        <li class="  sub-menu">
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle" aria-expanded="true">
                <i class="fs-4 bi-grid"></i> Products
            </a>

            <div class=" container-fluid collapse " id="submenu3" style="padding: 0;  width:80%; margin;0">
                <div>
                    <ul class="nav  flex-column ms-1  ">
                        <li>
                            <a href="#" class="nav-link px-0"> Product 1</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> Product 2</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> Product 3</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> Product 4</a>
                        </li>
                    </ul>
                </div>


            </div>

        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link  text-right" aria-current="page">

                المدرسة الصناعية
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link  text-right" aria-current="page">

                الإدارة العامة
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link  text-right" aria-current="page">

                المطبخ
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link  text-right" aria-current="page">

                المدرسة الابتدائية
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link  text-right" aria-current="page">

                المدرسة الاعدادية
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link  text-right" aria-current="page">

                المدرسة الثانوية
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link  text-right" aria-current="page">

                المستودع المركزي
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link active text-right" aria-current="page">

                رياض الأطفال
            </a>
        </li>


    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>



            <li>
                <a class="dropdown-item" :href="route('logout')">
                    {{-- <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form> --}}
                    {{ __('Log Out') }}
                </a>


            </li>



        </ul>
    </div>


</div>
