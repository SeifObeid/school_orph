<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    //  public function create()
    // {

    //     return view('core.add-product');
    // }
     public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Products::where('main_category_id', 8))
            ->addColumn('action', 'core.company-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('core.add-product');
    }
}
