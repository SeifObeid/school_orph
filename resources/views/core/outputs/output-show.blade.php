@extends("layouts.app")


@section("content")



<div class="wrapper">

    <div class="container " style="direction: rtl">

        <div class="row d-flex flex-wrap justify-content-around mt-4">
            <div class="col-lg-3 col-md-6 mt-4">


                <div class="input-group mb-3">
                    <span class="input-group-text" id="order_id">رقم الطلب</span>
                    <div class="d-flex align-items-center p-2">
                        {{ $output->order_id }}

                    </div>

                </div>

            </div>
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="input-group mb-3">
                    <span class="input-group-text">التاريخ</span>
                    <div class="d-flex align-items-center p-2">
                        {{ $output->date }}

                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="input-group mb-3">
                    <span class="input-group-text">الموظف</span>
                    <div class="d-flex align-items-center p-2">
                        {{ $output->employee->name }}

                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="input-group mb-3">
                    <span class="input-group-text">الفرع</span>
                    <div class="d-flex align-items-center p-2">
                        {{ $output->subCategory->name }}

                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="note">ملاحظات</span>
                    <div class="d-flex align-items-center p-2">
                        {{ $output->note }}

                    </div>

                </div>
            </div>


        </div>
        {{-- <div class="row">
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="note">الضبط</span>
                    <div class="d-flex align-items-center p-2">

                        <div id="entry_insurance">


                            @if ($entry->entry_insurance === 1)
                            <span class="green_insurance">
                                تم الضبط
                            </span>
                            @else
                            <span class="red_insurance">
                                لم يتم الضبط
                            </span>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col">


                <div class="card card-body mb-4">

                    <!-- Data Table -->
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">###</th>
                                <th scope="col">المنتج</th>
                                <th scope="col">العدد</th>
                                <th scope="col">عهدة/مستهلك</th>
                                <th scope="col">هوية القطعة</th>
                            </tr>
                        </thead>
                        <hr>
                        <tbody id="tests-table" name="productTable">


                            @if($products->count()>0)

                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product->id }}</td>
                                <td>{{ $product->product->product_name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ isset($product->custody_id)==true ?"عهدة":"مستهلك" }}</td>
                                <td>{{ isset($product->custody_id)==true ?$product->custody_id: "---" }}</td>
                            </tr>


                            @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight">
                <button id="saveEntryButton" class="save-entry-button">طباعة محضر الضبط</button>
            </div>
        </div> --}}

    </div>
</div>




@endsection
