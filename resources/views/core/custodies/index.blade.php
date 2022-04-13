@extends("layouts.app")


@section("content")
<div class="table-shadow shadow-lg p-3 mb-5 bg-body rounded">

    <div class="container mt-2">
        {{-- <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="entry"> أضف مُخرج جديد</a>
                </div>
            </div>
        </div> --}}
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
                        <th> الرقم الخاص بالقطعة </th>
                        <th> اسم القطعة </th>
                        <th>المتعهد</th>
                        <th>الفرع</th>
                        <th> الحالة</th>
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
                            ajax: "{{ route(Request::segment(1).'.custodies.index') }}",
                            columns: [
                            { data: 'id', name: 'id' },
                            { data: 'custody_id', name: 'custody_id' },
                            { data: 'product_name', name: 'product_name' },
                            { data: 'employee_name', name: 'employee_name' },
                            { data: 'sub_category_name', name: 'sub_category_name' },
                            { data: 'destroyed', name: 'destroyed' },
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
