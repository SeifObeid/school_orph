<?php

namespace App\Http\Controllers;

use App\Models\Custody;
use Illuminate\Http\Request;
use App\Classes\MainCategories;
use App\Models\Employee;
use App\Models\Output;
use App\Models\Product;
use App\Models\ProductOutput;
use Carbon\Carbon;
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


        // dd(MainCategories::$main_categories[$currentURL]);
        // $productOutputs = DB::table('product_outputs')
        //     ->join('products', function ($join) {
        //          $currentURL = request()->segment(1);
        //          $join->on('products.id', '=', 'product_outputs.product_id')->where('main_category_id', MainCategories::$main_categories[$currentURL] );
        //     } )

        //     ->join('custodies', function ($join) {
        //          $join->on('custodies.product_output_id', '=', 'product_outputs.id')->orderBy('created_at', 'DESC')->take(1)->get();//->whereNull("end_date")

        //     } )
        //     ->join('employees', 'employees.id', '=', 'custodies.employee_id')


        //     ->get()->map(function ($item, $key) {
        //                      $item->destroyed=$item->destroyed== false?'غير مُتلف':'مُتلف';

        //                     $item->employee_name=$item->name??"لا يوجد";
        //                     return $item;
        //                 });



        $productOutputs = ProductOutput::whereHas('product',function($query){
            $currentURL = request()->segment(1);
            $query->where('main_category_id', MainCategories::$main_categories[$currentURL]);
            })->with(['product','custodies'=>function($query){
            $query->with("employee")->latest()->first();

        },"output.subCategory"])->whereNotNull("custody_id")->get()->map(function ($item, $key) {
                            $item->destroyed=$item->destroyed== false?'غير مُتلف':'مُتلف';
                            $item->product_name=$item->product->product_name;
                            $item->sub_category_name = $item->output->subCategory->name;

                            $item->employee_name=$item->custodies[0]->employee->name??"لا يوجد";
                            return $item;
                        });

        // dd($productOutputs);
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



        $productOutput = ProductOutput::with("output","product","custodies.employee")->where("custody_id","=",$id)->first();
        $employees = Employee::all();
        $output=$productOutput->output;
        $product=$productOutput->product;
        $custodies=$productOutput->custodies;

        // dd($productOutput);

        return view('core.custodies.custody-show',[ 'productOutput' => $productOutput,'output' => $output, 'custodies' => $custodies, 'product' => $product,"employees"=>$employees]);


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

    public function updateDestroyed(Request $request)
    {

        $productOutput = ProductOutput::with(['custodies' => function ($query) {
        $query->whereNull("end_date");
        }
        ])->where("custody_id","=",$request["id"])->first();

        $custody= $productOutput->custodies[0];
        $productOutput->update(['destroyed' =>true,'destroyed_date'=>Carbon::now()]);
        $custody->update(['end_date' => Carbon::now()]);
        return Response()->json(true);


    }
    public function changeCustody(Request $request)
    {

        $custody= Custody::where("product_output_id",'=',$request->input('id'))->whereNull('end_date');
        $custody->update(['end_date' => Carbon::now()]);

        $newCustody =array('start_date' =>Carbon::now(),
                        'product_output_id' => $request->input('id'),
                        'employee_id' => $request->input('employeeId'),
                    );
        error_log(print_r($newCustody,true));

        Custody::create($newCustody);

        return Response()->json(true);


    }
}
