<nav class='animated bounceInDown bg-dark  side-nav   '>
    <div class="header-sidebar">

        <a href="/" class=" text-white text-decoration-none">

            <span class="  fs-4">مدرسة الايتام</span>
        </a>
    </div>
    <ul>
        <li class='sub-menu'><a href='javascript:;'> المدارس الصناعية<div class='fa fa-caret-down right'></div></a>
            <ul>
                <li><a href='{{route( "carpentry.index") }}'>نجارة</a></li>
                <li><a href='{{route( "upholstery-and-decoration.index") }}'>تنجيد وديكور</a></li>
                <li><a href='{{route( "typography.index") }}'>طباعة</a></li>
                <li><a href='{{route( "metal-forming.index") }}'>تشكيل معادن</a></li>
                <li><a href='{{route( "mechatronics.index") }}'>ميكاترونكس</a></li>
                <li><a href='{{route( "conditioning-and-cooling.index") }}'>تكييف وتبريد</a></li>
                <li><a href='{{route( "electricity.index") }}'>كهرباء</a></li>

            </ul>
        </li>
        <li><a href='{{route( "public-administration.index") }}'>الإدارة العامة</a></li>
        <li><a href='{{route( "elementary-school.index") }}'>المدرسة الاساسية</a></li>
        <li><a href='{{route( "secondary-school.index") }}'>المدرسة الثانوية</a></li>
        <li><a href='{{route( "kindergarten.index") }}'>رياض الاطفال </a></li>
        <li><a href='{{route( "kitchen.index") }}'>المطبخ</a></li>
        <li><a href='{{route( "dorm.index") }}'>السكن الداخلي</a></li>

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
