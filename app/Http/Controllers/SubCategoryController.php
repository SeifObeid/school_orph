<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Classes\MainCategories;
use App\Models\Employee;
use Dompdf\Dompdf;
// use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\View;
use ArPHP\I18N\Arabic;


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
    public function getPDF($id){
                    // instantiate and use the dompdf class

            $employees = Employee::all()->toArray();
            // dd($employees);
            $viewhtml = View::make('core.pdf.insurance', ["employees"=>$employees])->render();
             $arabic = new Arabic();
            $p = $arabic->arIdentify($viewhtml);

            for ($i = count($p)-1; $i >= 0; $i-=2) {
                $utf8ar = $arabic->utf8Glyphs(substr($viewhtml, $p[$i-1], $p[$i] - $p[$i-1]));
                $viewhtml = substr_replace($viewhtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);
            }

            $dompdf = new Dompdf();

         ;
            $options = $dompdf->getOptions();
            $options->setDefaultFont('Courier');
            $dompdf->setOptions($options);
            $dompdf->setPaper('A4');
            // error_log($options->getFontDir());
            // error_log("wiw");
            $dompdf->loadHtml($viewhtml);
            $dompdf->add_info('Title', 'Your meta title');









        //     // Render the HTML as PDF
            $dompdf->render();

        //     // Output the generated PDF to Browser
            $dompdf->stream('invoice.pdf',array('Attachment'=>0));

















    }
}
