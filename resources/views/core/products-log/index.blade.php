@extends("layouts.app")


@section("content")
<div class="table-shadow shadow-lg p-3 mb-5 bg-body rounded">

    <div class="container mt-2">

        <div class="card-body">
            <table class="table table-bordered" id="outputs-datatable" dir="rtl">
                <thead>
                    <tr>
                        <th>##</th>
                        <th>اسم القطعة</th>
                        <th>وحدة القطعة</th>
                        <th>الرصيد</th>

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
                            ajax: "{{ route(Request::segment(1).'.products-log.index') }}",
                            columns: [
                            { data: 'id', name: 'id' },
                            { data: 'product_name', name: 'product_name' },
                            { data: 'product_unit', name: 'product_unit' },
                            { data: 'quantity', name: 'quantity' },

                            ],
                            order: [[0, 'asc']]
                            });



                    });

</script>
@endpush
