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
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> أضف نوع جديد</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="product-datatable" dir="rtl">
                <thead>
                    <tr>
                        <th>رقم النوع</th>
                        <th>اسم النوع</th>
                        <th>وحدة النوع</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- boostrap Product model -->
    <div class="modal fade" id="product-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="col-12 modal-title text-center" id="ProductModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="ProductForm" name="ProductForm" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group mt-3">
                            <label class="float-right " for="product_name" class="col-sm-2 control-label">اسم
                                النوع</label>
                            <div class="col-sm-12">
                                <input dir="rtl" type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="ادخل اسم النوع" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label class="float-right " for="product_unit" class="col-sm-2 control-label">وحدة
                                النوع</label>
                            <div class="col-sm-12">
                                <input dir="rtl" type="text" class="form-control" id="product_unit" name="product_unit"
                                    placeholder="ادخل وحدة النوع" maxlength="50" required="">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">Company Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter Company Address" required="">
                            </div>
                        </div> --}}
                        <div class="col-sm-offset-2 col-sm-10 mt-4 ">
                            <button type="submit" class="btn btn-primary" id="btn-save"> حفظ نوع جديد
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
            console.log("{{route('public-administration.product.edit') }}");
            $('#product-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url()->current() }}",
                            columns: [
                            { data: 'id', name: 'id' },
                            { data: 'product_name', name: 'product_name' },
                            { data: 'product_unit', name: 'product_unit' },
                            {data: 'action', name: 'action', orderable: false},
                            ],
                            order: [[0, 'desc']]
                            });
                    });
            function add(){
                    $('#ProductForm').trigger("reset");
                    $('#ProductModal').html("اضف نوع جديد");
                    $('#product-modal').modal('show');
                    $('#id').val('');
            }
            function editFunc(id){
                console.log("we are in edit");
                $.ajax({
                    type:"POST",
                    url: "{{ route(Request::segment(1).'.product.edit') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(res){
                            $('#ProductModal').html("تعديل نوع");
                            $('#product-modal').modal('show');
                            $('#id').val(res.id);
                            $('#product_name').val(res.product_name);
                            $('#product_unit').val(res.product_unit);

                            }
                    });
            }
            function deleteFunc(id){
                        if (confirm("Delete Record?") == true) {
                        var id = id;
                        // ajax
                            $.ajax({
                            type:"POST",
                            url: "{{ route(Request::segment(1).'.product.destroy') }}",
                            data: { id: id },
                            dataType: 'json',
                            success: function(res){
                                var oTable = $('#product-datatable').dataTable();
                                oTable.fnDraw(false);
                                }
                                });
                            }
                }
                $('#ProductForm').submit(function(e) {
                        e.preventDefault();


                        var formData = new FormData(this);

                        $.ajax({
                        type:'POST',
                        url: "{{ route(Request::segment(1).'.product.store')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                        $("#product-modal").modal('hide');
                        var oTable = $('#product-datatable').dataTable();
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
