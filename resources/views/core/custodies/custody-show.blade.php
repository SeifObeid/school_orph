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
                    @if($productOutput->destroyed == 0)
                    <div class="d-flex justify-content-between">
                        <div>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#destroy">
                                أتلاف</button>

                        </div>
                        <div><button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#changeCustody">نقل العهدة</button></div>

                    </div>
                    @endif
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



<!-- Modal destroy -->
<div class="modal fade" id="destroy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">أتلاف عهدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ؟ ({{ $productOutput->custody_id }})

                هل تريد اتلاف


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لا، أغلق</button>
                <button type="button" class="btn btn-danger" id="destoryButton">نعم أتلف</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal change Custody -->
<div class="modal fade" id="changeCustody" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    dir="rtl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">نقل العهدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span> الى من تريد نقل العهدة؟</span>
                <div class="input-group mb-3">
                    <span class="input-group-text">اختر الموظف</span>

                    <input class=" form-control" list="select_employee" id="employee" placeholder="اختر موظف">
                    @if($employees->count()>0)
                    <datalist id="select_employee">
                        @foreach ($employees as $employee)
                        <option data-customvalue={{ $employee->id }} value="{{ $employee->name }}">
                            @endforeach
                    </datalist>
                    @endif
                    <input type='hidden' name="employee" value="" id="employeeInput">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لا، أغلق</button>
                <button type="button" class="btn btn-success" id="changeCustodyButton">
                    نعم، أنقل العهدة
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready( function () {
                $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
        $( "#destoryButton" ).click(function() {
            $.ajax({
                type:'PUT',
                url: "{{ route(Request::segment(1).'.custodies.updateDestroyed')}}",
                data: {id:'{{ $productOutput->custody_id }}' },

                success: (data) => {
                    console.log(data);
                    location.reload();
                },
                error: function(data){

                }
            });
        });

        $( "#changeCustodyButton" ).click(function() {

            var employee = $('#employee').val();
            var employeeValue= $('#select_employee [value="' + employee + '"]').data('customvalue');
            if(employeeValue == undefined){
                alert(" ادخل موظف")
            }
            else{
                $.ajax({
                type:'POST',
                url: "{{ route(Request::segment(1).'.custodies.changeCustody')}}",
                data: {employeeId:employeeValue, id:'{{ $productOutput->id }}' },

                success: (data) => {
                console.log(data);
                location.reload();
                },
                error: function(data){

                }
                });
                console.log(employeeValue);
            }

            });


   });

</script>
@endpush
