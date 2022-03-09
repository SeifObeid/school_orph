<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Output;
use Illuminate\Support\Facades\Request;
use App\Classes\MainCategories;
use App\Models\Custody;
use App\Models\Employee;
use App\Models\Product;
use App\Models\ProductOutput;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class OutputController extends Controller
{

    //
     public function index()
    {


        // $currentURL = request()->segment(1);
        // dd(Output::where('main_category_id', $this->main_categories[$currentURL])->get());
        //dd(Entry::where('main_category_id', $this->main_categories[$currentURL])->get()[0]);
        //   $currentURL = request()->segment(1);
        // dd( MainCategories::$main_categories[$currentURL]  );
        if(request()->ajax()) {

            $currentURL = request()->segment(1);
            return datatables()
                    ->of(Output::where('main_category_id', MainCategories::$main_categories[$currentURL]     )->get() //$this->main_categories[$currentURL]
                        ->map(function ($item, $key) {
                            $item['user_name']=$item->user->name;

                            $item['employee_name']=$item->employee->name??"لا يوجد";
                            return $item;
                        }))

            ->addColumn('action', 'core.outputs.outputs-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
         return view('core.outputs.index');
    }

     public function create()
    {
          $employees = Employee::all();
          $products = Product::all(); //need to specific the main type
        // dd($suppliers,$products );


         return view('core.outputs.output',['employees' => $employees, 'products' => $products]);
    }






      public function store(Request $request)
    {


// products
            $input = request()->all();

                    $newOutput= Output::create([
                                'order_id' => $input["order_id"],
                                'date' => $input["output_date"],
                                'employee_id' => $input["employee"],
                                'note' => $input["note"],
                                'user_id' => auth()->id(),
                                'main_category_id'=> MainCategories::$main_categories[Request::segment(1)],
                    ]);

        //["products"][i][inputProductValue] ===>product id
        //["products"][i][quantity] ===>quantity
        //["products"][i][unitPrice] ===>unitPrice
        if($input["products"] ?? false){
            foreach($input["products"] as $product){
                if(isset($product["custody_id"])){

                    $productOutput=   ProductOutput::create([
                        'quantity' => $product["quantity"],
                        'custody_id' => $product["custody_id"],
                        'output_id' =>$newOutput["id"] ,
                        'product_id' => $product["inputProductValue"],

                         ]);

                    Custody::create([
                        'start_date' => Carbon::now(),
                        'product_output_id' =>$productOutput["id"] ,
                        'employee_id' => $input["employee"],

                    ]);


                }
                else{
                     ProductOutput::create([
                        'quantity' => $product["quantity"],
                        'output_id' =>$newOutput["id"] ,
                        'product_id' => $product["inputProductValue"],

                ]);
                }



            }
        }


         return Redirect::route(Request::segment(1).".outputs.index");

    }



      public function show( $id)
    {


        $output = Output::with("employee","productOutputs.product")->find($id);

         $products = $output->productOutputs;
    //    dd($products);
        return view('core.outputs.output-show',['output' => $output, 'products' => $products]);

    }


     public function destroy(Request $request)
    {



                //$supplier = Supplier::where('id',$r equest->id)->delete();
        $entry = Entry::find(Request::all()["entryId"])->delete(); // if we want softCascadeDelete




        return Response()->json($entry);
    }
}
