{{-- wow {{ $entry_insurance }} --}}

<div id="entry_insurance">


    @if ($entry_insurance === 1)
    <span class="green_insurance">
        تم الضبط
    </span>
    @else
    <span class="red_insurance">
        لم يتم الضبط
    </span>
    @endif

</div>
