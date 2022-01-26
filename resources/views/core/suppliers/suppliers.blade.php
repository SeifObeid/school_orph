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
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> أضف مورد جديد</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="supplier-datatable" dir="rtl">
                <thead>
                    <tr>
                        <th>رقم المورد</th>
                        <th>اسم المورد</th>
                        <th>رقم الهاتف</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- boostrap supplier model -->
    <div class="modal fade" id="supplier-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="col-12 modal-title text-center" id="supplierModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="supplierForm" name="supplierForm" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group mt-3">
                            <label class="float-right " for="supplier_name" class="col-sm-2 control-label">اسم
                                المورد</label>
                            <div class="col-sm-12">
                                <input dir="rtl" type="text" class="form-control" id="supplier_name"
                                    name="supplier_name" placeholder="ادخل اسم المورد" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label class="float-right " for="supplier_phone" class="col-sm-2 control-label"> رقم
                                الهاتف</label>
                            <div class="col-sm-12">
                                <input dir="rtl" type="text" class="form-control" id="supplier_phone"
                                    name="supplier_phone" placeholder="ادخل رقم الهاتف" maxlength="50" required="">
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

            $('#supplier-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url()->current() }}",
                            columns: [
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'supplier_name' },
                            { data: 'phone_number', name: 'supplier_phone' },
                            {data: 'action', name: 'action', orderable: false},
                            ],
                            order: [[0, 'desc']]
                            });
                    });
            function add(){
                    $('#supplierForm').trigger("reset");
                    $('#supplierModal').html("اضف مورد جديد");
                    $('#supplier-modal').modal('show');
                    $('#id').val('');
            }
            function editFunc(id){
                console.log("we are in edit");
                $.ajax({
                    type:"POST",
                    url: "{{ route('suppliers.edit') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(res){
                            $('#supplierModal').html("تعديل ");
                            $('#supplier-modal').modal('show');
                            $('#id').val(res.id);
                            $('#supplier_name').val(res.name);
                            $('#supplier_phone').val(res.phone_number);

                            }
                    });
            }
            function deleteFunc(id){
                        if (confirm("Delete Record?") == true) {
                        var id = id;
                        // ajax
                            $.ajax({
                            type:"POST",
                            url: "{{ route('suppliers.destroy') }}",
                            data: { id: id },
                            dataType: 'json',
                            success: function(res){
                                var oTable = $('#supplier-datatable').dataTable();
                                oTable.fnDraw(false);
                                }
                                });
                            }
                }
                $('#supplierForm').submit(function(e) {
                        e.preventDefault();


                        var formData = new FormData(this);

                        $.ajax({
                        type:'POST',
                        url: "{{ route('suppliers.store')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                        $("#supplier-modal").modal('hide');
                        var oTable = $('#supplier-datatable').dataTable();
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
