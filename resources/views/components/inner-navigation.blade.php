<div class="site-navigation inner-nav d-flex justify-content-evenly bd-highlight" style="direction: rtl;">
    <div class="inner_item p-3 bd-highlight {{ Request::segment(2) === 'entries' ? 'active' : null }}">
        <a href="entries" class=" hover hover-3 "> الأدخالات </a>
    </div>
    <div class="inner_item p-3 bd-highlight {{ Request::segment(2) === 'supplies-log' ? 'active' : null }}">
        <a href="supplies-log" class=" hover hover-3"> سجل اللوازم </a>
    </div>
    <div class="inner_item p-3 bd-highlight {{ Request::segment(2) === 'outputs' ? 'active' : null }}">
        <a href="outputs" class=" hover hover-3"> المخرجات </a>
    </div>
    <div class="inner_item p-3 bd-highlight {{ Request::segment(2) === 'damages' ? 'active' : null }}">
        <a href="damages" class=" hover hover-3"> الأتلافات </a>
    </div>

</div>
