<?php

namespace App\Http\Controllers;

use App\Models\Custody;
use Illuminate\Http\Request;
use App\Classes\MainCategories;
use App\Models\Output;
use App\Models\ProductOutput;
use Illuminate\Support\Facades\DB;

class CustodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //          $currentURL = request()->segment(1);

        // dd(MainCategories::$main_categories[$currentURL]);
        $productOutputs = DB::table('product_outputs')
            ->join('products', function ($join) {
                 $currentURL = request()->segment(1);
                 $join->on('products.id', '=', 'product_outputs.product_id')->where('main_category_id', MainCategories::$main_categories[$currentURL] );
            } )

            ->join('custodies', function ($join) {
                 $join->on('custodies.product_output_id', '=', 'product_outputs.id')->whereNull("end_date");

            } )
            ->join('employees', 'employees.id', '=', 'custodies.employee_id')


            ->get()->map(function ($item, $key) {
                             $item->destroyed=$item->destroyed== false?'غير مُتلف':'مُتلف';

                            $item->employee_name=$item->name??"لا يوجد";
                            return $item;
                        });
        // dd($productOutputs);
        //custody_id
         if(request()->ajax()) {


            return datatables()
                    ->of($productOutputs)

            ->addColumn('action', 'core.custodies.custodies-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
         return view('core.custodies.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
