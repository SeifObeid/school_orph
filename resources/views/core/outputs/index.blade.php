@extends("layouts.app")


@section("content")
<div class="table-shadow shadow-lg p-3 mb-5 bg-body rounded">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="entry"> أضف مُخرج جديد</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="outputs-datatable" dir="rtl">
                <thead>
                    <tr>
                        <th>##</th>
                        <th>رقم الطلب</th>
                        <th>التاريخ</th>
                        <th>الى من</th>
                        <th>ادخل بواسطة</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
            </table>
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


            $('#outputs-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route(Request::segment(1).'.outputs.index') }}",
                            columns: [
                            { data: 'id', name: 'id' },
                            { data: 'order_id', name: 'order_id' },
                            { data: 'date', name: 'date' },
                            { data: 'employee_name', name: 'employee_name' },
                            { data: 'user_name', name: 'user_name' },
                            {data: 'action', name: 'action', orderable: false},
                            ],
                            order: [[0, 'asc']]
                            });



                    });
                    function deleteFunc(id){
                        if (confirm("Delete Record?") == true) {
                        // ajax
                        var url = "{{ url()->current() }}";
                        console.log(url);

                        $.ajax({
                                type:"DELETE",
                                url: "{{ route(Request::segment(1).'.entry.destroy') }}", //must change
                                data: { entryId: id },
                                dataType: 'json',
                                success: function(res){
                                var oTable = $('#outputs-datatable').dataTable();
                                oTable.fnDraw(false);
                        }
                        });
                        }
                    }

</script>
@endpush
