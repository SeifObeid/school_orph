<nav class='animated bounceInDown bg-dark  side-nav   ' style="overflow: hidden">
    <div class="header-sidebar">

        <a href="/" class=" text-white text-decoration-none">

            <span class="  fs-4">مدرسة الايتام</span>
        </a>
    </div>
    <ul>
        <li class='sub-menu'><a href='javascript:;'> المدارس الصناعية<div class='fa fa-caret-down right'></div></a>
            <ul>
                <li><a class="{{ Request::segment(1) === 'carpentry' ? 'active' : null }}"
                        href='{{route( "carpentry.index") }}'>نجارة</a></li>
                <li><a class="{{ Request::segment(1) === 'upholstery-and-decoration' ? 'active' : null }}"
                        href='{{route( "upholstery-and-decoration.index") }}'>تنجيد وديكور</a></li>
                <li><a class="{{ Request::segment(1) === 'typography' ? 'active' : null }}"
                        href='{{route( "typography.index") }}'>طباعة</a></li>
                <li><a class="{{ Request::segment(1) === 'metal-forming' ? 'active' : null }}"
                        href='{{route( "metal-forming.index") }}'>تشكيل معادن</a></li>
                <li><a class="{{ Request::segment(1) === 'mechatronics' ? 'active' : null }}"
                        href='{{route( "mechatronics.index") }}'>ميكاترونكس</a></li>
                <li><a class="{{ Request::segment(1) === 'conditioning-and-cooling' ? 'active' : null }}"
                        href='{{route( "conditioning-and-cooling.index") }}'>تكييف وتبريد</a></li>
                <li><a class="{{ Request::segment(1) === 'electricity' ? 'active' : null }}"
                        href='{{route( "electricity.index") }}'>كهرباء</a></li>

            </ul>
        </li>
        <li><a class="{{ Request::segment(1) === 'public-administration' ? 'active' : null }}"
                href='{{route( "public-administration.index") }}'>الإدارة العامة</a></li>
        <li><a class="{{ Request::segment(1) === 'elementary-school' ? 'active' : null }}"
                href='{{route( "elementary-school.index") }}'>المدرسة الاساسية</a></li>
        <li><a class="{{ Request::segment(1) === 'secondary-school' ? 'active' : null }}"
                href='{{route( "secondary-school.index") }}'>المدرسة الثانوية</a></li>
        <li><a class="{{ Request::segment(1) === 'kindergarten' ? 'active' : null }}"
                href='{{route( "kindergarten.index") }}'>رياض الاطفال </a></li>
        <li><a class="{{ Request::segment(1) === 'kitchen' ? 'active' : null }}"
                href='{{route( "kitchen.index") }}'>المطبخ</a></li>
        <li><a class="{{ Request::segment(1) === 'dorm' ? 'active' : null }}" href='{{route( "dorm.index") }}'>السكن
                الداخلي</a></li>

        <hr style="color: rgb(199, 199, 199); margin-top:50px">

        <li><a href='#message'>تسجيل خروج</a></li>
    </ul>
</nav>
<script>
    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
	$(this).parent(".sub-menu").children("ul").slideToggle("100");
	$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});
</script>
