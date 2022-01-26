<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;

class ProductsController extends Controller
{
    //
    //  public function create()
    // {

    //     return view('core.add-product');
    // }
    private $main_categories=array(
        "carpentry"=>1,
        "upholstery-and-decoration"=>2,
        "typography"=>3,
        "metal-forming"=>4,
        "mechatronics"=>5,
        "conditioning-and-cooling"=>6,
        "electricity"=>7,
        "public-administration"=>8,
        "elementary-school"=>9,
        "secondary-school"=>10,
        "kindergarten"=>11,
        "kitchen"=>12,
        "dorm"=>13,


    );
     public function index()
    {

        if(request()->ajax()) {
            $currentURL = request()->segment(1);

            return datatables()->of(Products::select('id','product_name','product_unit')->where('main_category_id', $this->main_categories[$currentURL]))
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
                        'main_category_id'=> $this->main_categories[$currentURL]);

        $product= Products::updateOrCreate(["id"=>$productId],$newData);


        return Response()->json($product);


    }


    public function edit(Request $request)
    {
        error_log( $request->id);
        $where = array('id' => $request->id);
        $product  = Products::where($where)->first();

        return Response()->json($product);
    }


    public function destroy(Request $request)
    {
        $company = Products::where('id',$request->id)->delete();

        return Response()->json($company);
    }


}
