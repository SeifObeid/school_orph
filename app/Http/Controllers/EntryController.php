<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Product;
use App\Models\ProductEntry;
use App\Models\Supplier;
use Request;
use Illuminate\Support\Facades\Redirect;
use App\Classes\MainCategories;

class EntryController extends Controller
{


    //

    public function index()
    {


        // dd(Entries::with('user:id,name','supplier:id,name')->get());
        // dd(Entries::where('main_category_id', $this->main_categories[$currentURL])->get());
        if(request()->ajax()) {

            $currentURL = request()->segment(1);
            return datatables()
                    ->of(Entry::where('main_category_id', MainCategories::$main_categories[$currentURL]  )->get()
                        ->map(function ($item, $key) {
                            $item['user_name']=$item->user->name;

                            $item['supplier_name']=$item->supplier->name??"لا يوجد";
                            return $item;
                        }))
            ->addColumn('entry_insurance', function(Entry $e) {
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
          $suppliers = Supplier::all();
          $products = Product::all(); //need to specific the main type
        // dd($suppliers,$products );


         return view('core.entries.entry',['suppliers' => $suppliers, 'products' => $products]);
    }

     public function store(Request $request)
    {


// products
        $newEntry= Entry::firstOrCreate([
    'invoice_number' => Request::all()["invoiceNumber"],
    'date' => Request::all()["entryDate"],
    'supplier_id' => Request::all()["supplier"],
    'note' => Request::all()["note"],
    'user_id' => auth()->id(),
    'main_category_id'=> MainCategories::$main_categories[Request::segment(1)],
        ]);

        //["products"][i][inputProductValue] ===>product id
        //["products"][i][quantity] ===>quantity
        //["products"][i][unitPrice] ===>unitPrice
        if(Request::all()["products"] ?? false){
            foreach(Request::all()["products"] as $product){
            ProductEntry::updateOrCreate([
               'quantity' => $product["quantity"],
               'price' =>$product["unitPrice"] ,
               'entry_id' =>$newEntry["id"] ,
               'product_id' => $product["inputProductValue"],

            ]);

        }
        }


         return Redirect::route(Request::segment(1).".entries.index");

    }


    public function show( $id)
    {


        $entry = Entry::with("supplier","productsEntries.product")->find($id);

         $products = $entry->productsEntries;
       // dd($products);
        return view('core.entries.entry-show',['entry' => $entry, 'products' => $products]);

    }
    public function destroy(Request $request)
    {



                //$supplier = Supplier::where('id',$r equest->id)->delete();
        $entry = Entry::find(Request::all()["entryId"])->delete(); // if we want softCascadeDelete




        return Response()->json($entry);
    }

}
