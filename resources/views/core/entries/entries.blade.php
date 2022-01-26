@extends("layouts.app")


@section("content")
<div class="table-shadow shadow-lg p-3 mb-5 bg-body rounded">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="entry"> أضف مُدخل جديد</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="entries-datatable" dir="rtl">
                <thead>
                    <tr>
                        <th>##</th>
                        <th>رقم الفتورة</th>
                        <th>المورد</th>
                        <th>التاريخ</th>
                        <th>ادخل بواسطة</th>
                        <th>الضبط</th>
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


            $('#entries-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url()->current() }}",
                            columns: [
                            { data: 'id', name: 'id' },
                            { data: 'invoice_number', name: 'invoice_number' },
                            { data: 'supplier_name', name: 'supplier_name' },
                            { data: 'date', name: 'date' },
                            { data: 'user_name', name: 'user_name' },
                            { data: 'entry_insurance', name: 'entry_insurance' },
                            {data: 'action', name: 'action', orderable: false},
                            ],
                            order: [[0, 'desc']]
                            });
                    });

</script>
@endpush
