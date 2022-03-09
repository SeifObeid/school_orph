@extends("layouts.app")


@section("content")



<div class="wrapper">

    <div class="container " style="direction: rtl">

        <div class="row d-flex flex-wrap justify-content-around mt-4">
            <div class="col-lg-3 col-md-6 mt-4">


                <div class="input-group mb-3">
                    <span class="input-group-text" id="custody_id">هوية العهدة</span>
                    <div class="d-flex align-items-center p-2">
                        {{ $productOutput->custody_id }}

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
                    <span class="input-group-text">رقم طلب الاخراج</span>
                    <div class="d-flex align-items-center p-2">
                        {{ $output->order_id }}

                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="note">اسم الصنف</span>
                    <div class="d-flex align-items-center p-2">
                        {{ $product->product_name }}

                    </div>

                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="note">الاتلاف</span>
                    <div class="d-flex align-items-center p-2">

                        <div id="destroyed">


                            @if ($productOutput->destroyed == 0)
                            <span class="green_insurance">
                                غير متلف
                            </span>
                            @else
                            <span class="red_insurance">
                                متلف
                            </span>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">


                <div class="card card-body mb-4">

                    <!-- Data Table -->
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">###</th>
                                <th scope="col">مستلم العهدة</th>
                                <th scope="col">من</th>
                                <th scope="col">الى</th>
                            </tr>
                        </thead>
                        <hr>
                        <tbody id="tests-table" name="productTable">


                            @if($custodies->count()>0)

                            @foreach ($custodies as $custody)
                            <tr>
                                <td>{{ $custody->id }}</td>
                                <td>{{ $custody->employee->name }}</td>
                                <td>{{ $custody->start_date }}</td>
                                <td>{{isset($custody->end_date)==true ?$custody->end_date:"---" }}</td>
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
