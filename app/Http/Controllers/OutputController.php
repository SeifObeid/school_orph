<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Output;
use Illuminate\Http\Request;
use App\Classes\MainCategories;
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
}
