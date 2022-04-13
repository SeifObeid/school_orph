<?php

namespace App\Http\Controllers;

use App\Classes\MainCategories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{

     public function index()
    {

        if(request()->ajax()) {
            $currentURL = request()->segment(1);

            return datatables()->of(Product::select('id','product_name','product_unit')->where('main_category_id', MainCategories::$main_categories[$currentURL]))
            ->addColumn('action', 'core.add-product-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('core.add-product');
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentURL = request()->segment(1);
        $productId = $request->id;

        $newData =array('product_name' => $request->input('product_name'),
                        'product_unit' => $request->input('product_unit'),
                        'main_category_id'=> MainCategories::$main_categories[$currentURL]);

        $product= Product::updateOrCreate(["id"=>$productId],$newData);


        return Response()->json($product);


    }


    public function edit(Request $request)
    {
        error_log( $request->id);
        $where = array('id' => $request->id);
        $product  = Product::where($where)->first();

        return Response()->json($product);
    }


    public function destroy(Request $request)
    {
        $product = Product::where('id',$request->id)->delete();

        return Response()->json($product);
    }


      public function productsLog(){

        // SELECT (pe.quantity - po.quantity) as quantity, pe.product_id,products.* FROM products JOIN (SELECT SUM(quantity) as quantity, product_id FROM `product_entries` GROUP BY product_id ) as pe ON pe.product_id=products.id JOIN (SELECT SUM(quantity) as quantity , product_id FROM `product_outputs` GROUP BY product_id) as po ON po.product_id=products.id
                      $currentURL = request()->segment(1);




        if(request()->ajax()) {
            $currentURL = request()->segment(1);

            return datatables()->of(DB::table("products")

            ->join(DB::raw("(SELECT SUM(quantity) AS quantity, product_id FROM entries JOIN product_entries on entries.id =  product_entries.entry_id where entries.entry_insurance =1  GROUP BY product_id) AS pe"), DB::raw("pe.product_id") ,"=", DB::raw("products.id"))
            ->leftJoin(DB::raw("(SELECT SUM(quantity) AS quantity , product_id FROM product_outputs GROUP BY product_id ) AS po"), DB::raw("po.product_id") ,"=", "products.id")
           ->select(DB::raw( "(pe.quantity -  IFNULL(po.quantity, 0 )) as quantity, products.*"))
            ->where("products.main_category_id" ,"=",MainCategories::$main_categories[$currentURL]) ->get())

            ->addIndexColumn()
            ->make(true);
        }






        return view('core.products-log.index');
      }
       public function productBalance(Request $request){
          if(request()->ajax()) {
            $productId =$request->id;

            if (Product::find( $productId ) ==null){
                return -9999;
            };

             $productBalance =  DB::table("products")

            ->join(DB::raw("(SELECT SUM(quantity) AS quantity, product_id FROM entries JOIN product_entries on entries.id =  product_entries.entry_id where entries.entry_insurance =1 and product_entries.product_id =".$productId." GROUP BY product_id) AS pe"), DB::raw("pe.product_id") ,"=", DB::raw("products.id"))
            ->leftJoin(DB::raw("(SELECT SUM(quantity) AS quantity , product_id FROM product_outputs where product_id =".$productId." GROUP BY product_id ) AS po"), DB::raw("po.product_id") ,"=", "products.id")
           ->select(DB::raw( "(pe.quantity -  IFNULL(po.quantity, 0 )) as quantity"))
            ->where("products.id" ,"=", $productId) ->get();
            if(  sizeof($productBalance) == 0 )
                return  (object)  ['quantity'=> '0' ];
            return $productBalance[0];


        }
       }

}
