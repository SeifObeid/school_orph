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
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> أضف فرع جديد</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="sub-category-datatable" dir="rtl">
                <thead>
                    <tr>
                        <th>###</th>
                        <th>اسم الفرع</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- boostrap sub-category model -->
    <div class="modal fade" id="subCategoryModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="col-12 modal-title text-center" id="subCategoryModalHeader"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="subCategoryForm" name="subCategoryForm"
                        class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group mt-3">
                            <label class="float-right " for="subCategoryName" class="col-sm-2 control-label">اسم
                                الفرع</label>
                            <div class="col-sm-12">
                                <input dir="rtl" type="text" class="form-control" id="subCategoryName"
                                    name="subCategoryName" placeholder="ادخل اسم الفرع" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10 mt-4 ">
                            <button type="submit" class="btn btn-primary" id="btn-save"> حفظ الفرع جديد
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

            $('#sub-category-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url()->current() }}",
                            columns: [
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'subCategoryName' },

                            {data: 'action', name: 'action', orderable: false},
                            ],
                            order: [[0, 'desc']]
                            });
                    });
            function add(){
                    $('#subCategoryForm').trigger("reset");
                    $('#subCategoryModalHeader').html("اضف فرع جديد");
                    $('#subCategoryModal').modal('show');
                    $('#id').val('');
            }
            function editFunc(id){
                $.ajax({
                    type:"POST",
                    url: "{{ route(Request::segment(1).'.sub-category.edit') }}",
                    data: { 'id': id },
                    dataType: 'json',
                    success: function(res){
                            $('#subCategoryModalHeader').html("تعديل");
                            $('#subCategoryModal').modal('show');
                            $('#id').val(res.id);
                            $('#subCategoryName').val(res.name);
                            }
                    });
            }
            function deleteFunc(id){
                        if (confirm("Delete Record?") == true) {
                        var id = id;
                        // ajax
                            $.ajax({
                            type:"POST",
                            url: "{{ route(Request::segment(1).'.sub-category.destroy') }}",
                            data: { id: id },
                            dataType: 'json',
                            success: function(res){
                                var oTable = $('#sub-category-datatable').dataTable();
                                oTable.fnDraw(false);
                                }
                                });
                            }
                }
                $('#subCategoryForm').submit(function(e) {
                        e.preventDefault();


                        var formData = new FormData(this);

                        $.ajax({
                        type:'POST',
                        url: "{{ route(Request::segment(1).'.sub-category.store')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                        $("#subCategoryModal").modal('hide');
                        var oTable = $('#sub-category-datatable').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save"). attr("disabled", false);
                        },
                        error: function(data){

                        }
                });
            });
</script>
@endpush
