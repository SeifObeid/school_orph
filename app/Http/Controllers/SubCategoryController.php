<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Classes\MainCategories;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         if(request()->ajax()) {
            $currentURL = request()->segment(1);

            return datatables()->of(SubCategory::select('id','name')->where('main_category_id', MainCategories::$main_categories[$currentURL]))
            ->addColumn('action', 'core.sub-category.sub-category-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('core.sub-category.index');
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
        $currentURL = request()->segment(1);
        $subCategoryId = $request->id;
        $newData =array('name' => $request->input('subCategoryName'),

                        'main_category_id'=> MainCategories::$main_categories[$currentURL]);
        $subCategory= SubCategory::updateOrCreate(["id"=>$subCategoryId],$newData);


        return Response()->json($subCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //

        $subCategory  = SubCategory::find($request->id);
        // error_log($subCategory);
        return Response()->json($subCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
         $subCategory = SubCategory::where('id',$request->id)->delete();

        return Response()->json($subCategory);
    }
}
