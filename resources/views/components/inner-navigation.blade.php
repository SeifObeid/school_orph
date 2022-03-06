{{-- {{ Request::segment(2) }} --}}
<div class="site-navigation inner-nav d-flex justify-content-evenly bd-highlight" style="direction: rtl;">
    <div class="inner_item p-3 bd-highlight {{ Request::segment(2) === 'entries' ? 'active' : null }}">
        <a href="{{ route(Request::segment(1).'.entries.index') }}" class=" hover hover-3 "> الأدخالات </a>
    </div>
    <div class="inner_item p-3 bd-highlight {{ Request::segment(2) === 'products-log' ? 'active' : null }}">
        <a href="{{ route(Request::segment(1).'.products-log.index') }}" class=" hover hover-3"> سجل اللوازم </a>
    </div>
    <div class="inner_item p-3 bd-highlight {{ Request::segment(2) === 'outputs' ? 'active' : null }}">
        <a href="{{ route(Request::segment(1).'.outputs.index') }}" class=" hover hover-3"> المخرجات </a>
    </div>
    <div class="inner_item p-3 bd-highlight {{ Request::segment(2) === 'custodies' ? 'active' : null }}">
        <a href="{{ route(Request::segment(1).'.custodies.index') }}" class=" hover hover-3"> سجل العهد </a>
    </div>

</div>
