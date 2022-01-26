<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
     public function index()
    {

        if(request()->ajax()) {

            return datatables()->of(Supplier::select('id','name','phone_number'))
            ->addColumn('action', 'core.suppliers.suppliers-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('core.suppliers.suppliers');
    }


      public function store(Request $request)
    {
        $currentURL = request()->segment(1);
        $supplierId = $request->id;

        $newData =array('name' => $request->input('supplier_name'),
                        'phone_number' => $request->input('supplier_phone'));

        $supplier= Supplier::updateOrCreate(["id"=>$supplierId],$newData);


        return Response()->json($supplier);


    }


    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $supplier  = Supplier::where($where)->first();

        return Response()->json($supplier);
    }


    public function destroy(Request $request)
    {
        $supplier = Supplier::where('id',$request->id)->delete();

        return Response()->json($supplier);
    }


}
