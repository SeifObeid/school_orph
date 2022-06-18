<?php

use App\Http\Controllers\CustodyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('land-app');
        return Redirect::route("carpentry.index");
});


Route::get('/dashboard', function () {
    // return view('dashboard');
    return Redirect::route("carpentry.index");
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/productBalance',  [ProductController::class, 'productBalance'])->middleware(['auth'])->name("productBalance");

Route::prefix('suppliers')->middleware(['auth'])->group(function () {


        Route::get('', [SupplierController::class, 'index'])->name("suppliers.index");

        // Route::get('add-product', [ProductController::class, 'index'])->name("carpentry.product.index");
        Route::post('store-supplier', [SupplierController::class, 'store'])->name("suppliers.store");
        Route::post('edit-supplier', [SupplierController::class, 'edit'])->name("suppliers.edit");
        Route::post('delete-supplier', [SupplierController::class, 'destroy'])->name("suppliers.destroy");



});
Route::prefix('employees')->middleware(['auth'])->group(function () {


        Route::get('', [EmployeeController::class, 'index'])->name("employees.index");
        Route::post('store-employee', [EmployeeController::class, 'store'])->name("employees.store");
        Route::post('edit-employee', [EmployeeController::class, 'edit'])->name("employees.edit");
        Route::post('delete-employee', [EmployeeController::class, 'destroy'])->name("employees.destroy");



});


Route::prefix('carpentry')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("carpentry.entries.index");
        })->name("carpentry.index");

        Route::get('add-product', [ProductController::class, 'index'])->name("carpentry.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("carpentry.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("carpentry.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("carpentry.product.destroy");

       Route::get('entries', [EntryController::class, 'index'])->name("carpentry.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("carpentry.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("carpentry.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("carpentry.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("carpentry.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("carpentry.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("carpentry.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("carpentry.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("carpentry.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("carpentry.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("carpentry.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("carpentry.sub-category.destroy");



        });


});

Route::prefix('upholstery-and-decoration')->middleware(['auth'])->group(function () {
          Route::get('', function(){
            return Redirect::route("upholstery-and-decoration.entries.index");
        })->name("upholstery-and-decoration.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("upholstery-and-decoration.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("upholstery-and-decoration.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("upholstery-and-decoration.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("upholstery-and-decoration.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("upholstery-and-decoration.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("upholstery-and-decoration.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("upholstery-and-decoration.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("upholstery-and-decoration.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("upholstery-and-decoration.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("upholstery-and-decoration.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("upholstery-and-decoration.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("upholstery-and-decoration.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("upholstery-and-decoration.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("upholstery-and-decoration.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("upholstery-and-decoration.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("upholstery-and-decoration.sub-category.destroy");



        });
});

Route::prefix('typography')->middleware(['auth'])->group(function () {
         Route::get('', function(){
            return Redirect::route("typography.entries.index");
        })->name("typography.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("typography.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("typography.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("typography.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("typography.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("typography.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("typography.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("typography.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("typography.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("typography.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("typography.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("typography.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("typography.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("typography.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("typography.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("typography.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("typography.sub-category.destroy");



        });
});

Route::prefix('metal-forming')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("metal-forming.entries.index");
        })->name("metal-forming.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("metal-forming.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("metal-forming.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("metal-forming.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("metal-forming.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("metal-forming.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("metal-forming.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("metal-forming.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("metal-forming.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("metal-forming.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("metal-forming.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("metal-forming.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("metal-forming.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("metal-forming.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("metal-forming.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("metal-forming.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("metal-forming.sub-category.destroy");



        });
});

Route::prefix('mechatronics')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("mechatronics.entries.index");
        })->name("mechatronics.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("mechatronics.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("mechatronics.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("mechatronics.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("mechatronics.product.destroy");

       Route::get('entries', [EntryController::class, 'index'])->name("mechatronics.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("mechatronics.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("mechatronics.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("mechatronics.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("mechatronics.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("mechatronics.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("mechatronics.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("mechatronics.entry.destroy");

        });




        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("mechatronics.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("mechatronics.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("mechatronics.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("mechatronics.sub-category.destroy");



        });
});

Route::prefix('conditioning-and-cooling')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("conditioning-and-cooling.entries.index");
        })->name("conditioning-and-cooling.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("conditioning-and-cooling.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("conditioning-and-cooling.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("conditioning-and-cooling.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("conditioning-and-cooling.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("conditioning-and-cooling.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("conditioning-and-cooling.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("conditioning-and-cooling.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("conditioning-and-cooling.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("conditioning-and-cooling.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("conditioning-and-cooling.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("conditioning-and-cooling.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("conditioning-and-cooling.entry.destroy");

        });

        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("conditioning-and-cooling.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("conditioning-and-cooling.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("conditioning-and-cooling.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("conditioning-and-cooling.sub-category.destroy");



        });
});

Route::prefix('electricity')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("electricity.entries.index");
        })->name("electricity.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("electricity.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("electricity.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("electricity.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("electricity.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("electricity.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("electricity.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("electricity.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("electricity.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("electricity.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("electricity.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("electricity.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("electricity.entry.destroy");

        });





        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("electricity.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("electricity.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("electricity.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("electricity.sub-category.destroy");



        });

});




Route::prefix('public-administration')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("public-administration.entries.index");
        })->name("public-administration.index");
        // Route::get('', [EntryController::class, 'index'])->name("public-administration.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("public-administration.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("public-administration.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("public-administration.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("public-administration.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("public-administration.entries.index");

        Route::prefix("products-log")->group(function(){
           Route::get('', [ProductController::class, 'productsLog'])->name("public-administration.products-log.index");

        });

         Route::prefix("custodies")->group(function(){
           Route::get('', [CustodyController::class, 'index'])->name("public-administration.custodies.index");
           Route::get('{id}', [CustodyController::class, 'show'])->name("public-administration.custodies.show");
           Route::put('', [CustodyController::class, 'updateDestroyed'])->name("public-administration.custodies.updateDestroyed");
           Route::post('changeCustody', [CustodyController::class, 'changeCustody'])->name("public-administration.custodies.changeCustody");

        });

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("public-administration.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("public-administration.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("public-administration.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("public-administration.entry.destroy");

           Route::get('{id}/edit', [EntryController::class, 'edit'])->name("public-administration.entry.edit");
           Route::put('', [EntryController::class, 'update'])->name("public-administration.entry.update");

        });

        Route::get('outputs', [OutputController::class, 'index'])->name("public-administration.outputs.index");
        Route::prefix("output")->group(function(){
           Route::get('', [OutputController::class, 'create'])->name("public-administration.output.create");
           Route::post('', [OutputController::class, 'store'])->name("public-administration.output.store");
           Route::get('{id}', [OutputController::class, 'show'])->name("public-administration.output.show");
           Route::delete('', [OutputController::class, 'destroy'])->name("public-administration.output.destroy");

           Route::get('{id}/edit', [OutputController::class, 'edit'])->name("public-administration.output.edit");
           Route::put('', [OutputController::class, 'update'])->name("public-administration.output.update");

        });




        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("public-administration.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("public-administration.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("public-administration.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("public-administration.sub-category.destroy");



        });





});
Route::prefix('elementary-school')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("elementary-school.entries.index");
        })->name("elementary-school.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("elementary-school.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("elementary-school.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("elementary-school.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("elementary-school.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("elementary-school.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("elementary-school.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("elementary-school.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("elementary-school.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("elementary-school.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("elementary-school.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("elementary-school.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("elementary-school.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("elementary-school.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("elementary-school.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("elementary-school.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("elementary-school.sub-category.destroy");



        });

});
Route::prefix('secondary-school')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("secondary-school.entries.index");
        })->name("secondary-school.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("secondary-school.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("secondary-school.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("secondary-school.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("secondary-school.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("secondary-school.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("secondary-school.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("secondary-school.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("secondary-school.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("secondary-school.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("secondary-school.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("secondary-school.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("secondary-school.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("secondary-school.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("secondary-school.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("secondary-school.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("secondary-school.sub-category.destroy");



        });
});
Route::prefix('kindergarten')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("kindergarten.entries.index");
        })->name("kindergarten.index");

        Route::get('add-product', [ProductController::class, 'index'])->name("kindergarten.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("kindergarten.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("kindergarten.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("kindergarten.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("kindergarten.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("kindergarten.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("kindergarten.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("kindergarten.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("kindergarten.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("kindergarten.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("kindergarten.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("kindergarten.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("kindergarten.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("kindergarten.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("kindergarten.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("kindergarten.sub-category.destroy");



        });

        Route::get('getPDF/{id}', [SubCategoryController::class, 'getPDF'])->name("kindergarten.sub-category.getPDF");
});
Route::prefix('kitchen')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("kitchen.entries.index");
        })->name("kitchen.index");

        Route::get('add-product', [ProductController::class, 'index'])->name("kitchen.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("kitchen.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("kitchen.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("kitchen.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("kitchen.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("kitchen.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("kitchen.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("kitchen.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("kitchen.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("kitchen.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("kitchen.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("kitchen.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("kitchen.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("kitchen.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("kitchen.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("kitchen.sub-category.destroy");



        });
});
Route::prefix('dorm')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("dorm.entries.index");
        })->name("dorm.index");
        Route::get('add-product', [ProductController::class, 'index'])->name("dorm.product.index");
        Route::post('store-product', [ProductController::class, 'store'])->name("dorm.product.store");
        Route::post('edit-product', [ProductController::class, 'edit'])->name("dorm.product.edit");
        Route::post('delete-product', [ProductController::class, 'destroy'])->name("dorm.product.destroy");

        Route::get('entries', [EntryController::class, 'index'])->name("dorm.entries.index");
        Route::get('products-log', [ProductController::class, 'productsLog'])->name("dorm.products-log.index");
        Route::get('outputs', [OutputController::class, 'index'])->name("dorm.outputs.index");
        Route::get('custodies', [CustodyController::class, 'index'])->name("dorm.custodies.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntryController::class, 'create'])->name("dorm.entry.create");
           Route::post('', [EntryController::class, 'store'])->name("dorm.entry.store");
           Route::get('{id}', [EntryController::class, 'show'])->name("dorm.entry.show");
           Route::delete('', [EntryController::class, 'destroy'])->name("dorm.entry.destroy");

        });


        Route::prefix('sub-category')->group(function () {


            Route::get('', [SubCategoryController::class, 'index'])->name("dorm.sub-category.index");
            Route::post('store-sub-category', [SubCategoryController::class, 'store'])->name("dorm.sub-category.store");
            Route::post('edit-sub-category', [SubCategoryController::class, 'edit'])->name("dorm.sub-category.edit");
            Route::post('delete-sub-category', [SubCategoryController::class, 'destroy'])->name("dorm.sub-category.destroy");



        });
});

Route::prefix('users')->middleware(['auth', 'admin'])->group(function () {
        Route::get('',  [UserController::class, 'index'])->name("users.index");

});
