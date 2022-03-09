@extends("layouts.app")


@section("content")
<div class="table-shadow shadow-lg p-3 mb-5 bg-body rounded">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                {{-- <div class="pull-left">
                    <h2>Laravel 8 Ajax CRUD DataTables Tutorial</h2>
                </div> --}}
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> أضف موظف جديد</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="employee-datatable" dir="rtl">
                <thead>
                    <tr>
                        <th>رقم الموظف</th>
                        <th>اسم الموظف</th>
                        <th>رقم الهاتف</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- boostrap employee model -->
    <div class="modal fade" id="employee-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="col-12 modal-title text-center" id="employeeModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="employeeForm" name="employeeForm" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group mt-3">
                            <label class="float-right " for="employee_name" class="col-sm-2 control-label">اسم
                                الموظف</label>
                            <div class="col-sm-12">
                                <input dir="rtl" type="text" class="form-control" id="employee_name"
                                    name="employee_name" placeholder="ادخل اسم الموظف" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label class="float-right " for="employee_phone" class="col-sm-2 control-label"> رقم
                                الهاتف</label>
                            <div class="col-sm-12">
                                <input dir="rtl" type="text" class="form-control" id="employee_phone"
                                    name="employee_phone" placeholder="ادخل رقم الهاتف" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10 mt-4 ">
                            <button type="submit" class="btn btn-primary" id="btn-save"> حفظ المورد جديد
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
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

            $('#employee-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url()->current() }}",
                            columns: [
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'employee_name' },
                            { data: 'phone_number', name: 'employee_phone' },
                            {data: 'action', name: 'action', orderable: false},
                            ],
                            order: [[0, 'desc']]
                            });
                    });
            function add(){
                    $('#employeeForm').trigger("reset");
                    $('#employeeModal').html("اضف موظف جديد");
                    $('#employee-modal').modal('show');
                    $('#id').val('');
            }
            function editFunc(id){
                console.log("we are in edit");
                $.ajax({
                    type:"POST",
                    url: "{{ route('employees.edit') }}",
                    data: { 'id': id },
                    dataType: 'json',
                    success: function(res){
                            $('#employeeModal').html("تعديل");
                            $('#employee-modal').modal('show');
                            $('#id').val(res.id);
                            $('#employee_name').val(res.name);
                            $('#employee_phone').val(res.phone_number);

                            }
                    });
            }
            function deleteFunc(id){
                        if (confirm("Delete Record?") == true) {
                        var id = id;
                        // ajax
                            $.ajax({
                            type:"POST",
                            url: "{{ route('employees.destroy') }}",
                            data: { id: id },
                            dataType: 'json',
                            success: function(res){
                                var oTable = $('#employee-datatable').dataTable();
                                oTable.fnDraw(false);
                                }
                                });
                            }
                }
                $('#employeeForm').submit(function(e) {
                        e.preventDefault();


                        var formData = new FormData(this);

                        $.ajax({
                        type:'POST',
                        url: "{{ route('employees.store')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                        $("#employee-modal").modal('hide');
                        var oTable = $('#employee-datatable').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save"). attr("disabled", false);
                        },
                        error: function(data){
                        console.log(data);

                        }
                });
            });
</script>
@endpush
