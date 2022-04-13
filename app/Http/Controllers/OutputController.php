<?php

namespace App\Http\Controllers;

use App\Models\Output;
use Illuminate\Support\Facades\Request;
use App\Classes\MainCategories;
use App\Models\Custody;
use App\Models\Employee;
use App\Models\Product;
use App\Models\ProductOutput;
use App\Models\SubCategory;
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
        $currentURL = request()->segment(1);

          $employees = Employee::all();
          $products = Product::all(); //need to specific the main type
          $subCategories = SubCategory::where('main_category_id', MainCategories::$main_categories[$currentURL])->get();
        // dd($suppliers,$products );


         return view('core.outputs.output',['employees' => $employees, 'products' => $products,'subCategories'=>$subCategories]);
    }






      public function store(Request $request)
    {


            $input = request()->all();
            error_log($input["subCategory"]);
                    $newOutput= Output::create([
                                'order_id' => $input["order_id"],
                                'date' => $input["output_date"],
                                'employee_id' => $input["employee"],
                                'sub_category_id' => $input["subCategory"],
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


        $output = Output::with("employee","productOutputs.product","subCategory")->find($id);

         $products = $output->productOutputs;
    //    dd($products);
        return view('core.outputs.output-show',['output' => $output, 'products' => $products]);

    }


     public function destroy(Request $request)
    {



                //$supplier = Supplier::where('id',$r equest->id)->delete();
        $output = Output::find(Request::all()["outputId"])->delete(); // if we want softCascadeDelete




        return Response()->json($output);
    }

     public function edit( $id)
    {

        $output = Output::with("employee","productOutputs.product","subCategory")->find($id);
        $currentURL = request()->segment(1);

        $products = Product::where('main_category_id', MainCategories::$main_categories[$currentURL])->get();
        $employees = Employee::all();
        $subCategories = SubCategory::where('main_category_id', MainCategories::$main_categories[$currentURL])->get();

        $productOutputs = $output->productOutputs;

    //    dd($productOutputs);
        return view('core.outputs.output-edit',['output' => $output, 'productOutputs' => $productOutputs, 'products' => $products,'employees' => $employees ,'subCategories'=>$subCategories]);

    }

     public function update(Request $request)
    {
        //
            // dd($request::all());

        $output = array(

        "order_id"=>$request::input("order_id"),
        "date"=>$request::input("output_date"),
        "employee_id"=>$request::input("employee"),
        "sub_category_id"=>$request::input("subCategory"),
        "note"=>$request::input("note")
    );
         Output::find($request::input("outputId"))->update($output);
        return Redirect::route(request()->segment(1).".outputs.index");;
    }
}
