<?php

namespace App\Http\Controllers;

use App\Models\Entries;
use Illuminate\Http\Request;

class EntriesController extends Controller
{

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

    //

    public function index()
    {


        // dd(Entries::with('user:id,name','supplier:id,name')->get());
        // dd(Entries::where('main_category_id', $this->main_categories[$currentURL])->get());
        if(request()->ajax()) {

            $currentURL = request()->segment(1);
            return datatables()
                    ->of(Entries::where('main_category_id', $this->main_categories[$currentURL])->get()
                        ->map(function ($item, $key) {
                            $item['user_name']=$item->user->name;
                            $item['supplier_name']=$item->supplier->name;
                            return $item;
                        }))
            ->addColumn('entry_insurance', function(Entries $e) {
               return view('core.entries.entry-insurance',["entry_insurance"=>$e->entry_insurance]);
            })
            ->addColumn('action', 'core.entries.entries-action')
            ->rawColumns(['action','entry_insurance'])
            ->addIndexColumn()
            ->make(true);
        }
         return view('core.entries.entries');
    }

     public function create()
    {


         return view('core.entries.entry');
    }

}
