<a data-toggle="tooltip" href="{{ route(Request::segment(1).'.entry.show',['id'=>$id]) }}" data-original-title="Edit"
    class="edit btn btn-success edit">
    تفاصيل
</a>
<a data-toggle="tooltip" href="{{ route(Request::segment(1).'.entry.edit',['id'=>$id]) }}" data-original-title="Edit"
    class="edit btn btn-warning edit">
    تعديل
</a>
<a href="javascript:void(0);" id="delete-compnay" onClick="deleteFunc({{ $id }})" data-toggle="tooltip"
    data-original-title="Delete" class="delete btn btn-danger">
    حذف
</a>
