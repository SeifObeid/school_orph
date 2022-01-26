<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SupplierController;
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



Route::prefix('suppliers')->middleware(['auth'])->group(function () {


        Route::get('', [SupplierController::class, 'index'])->name("suppliers.index");

        // Route::get('add-product', [ProductsController::class, 'index'])->name("carpentry.product.index");
        Route::post('store-product', [SupplierController::class, 'store'])->name("suppliers.store");
        Route::post('edit-product', [SupplierController::class, 'edit'])->name("suppliers.edit");
        Route::post('delete-product', [SupplierController::class, 'destroy'])->name("suppliers.destroy");



});


Route::prefix('carpentry')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("carpentry.entries.index");
        })->name("carpentry.index");

        Route::get('add-product', [ProductsController::class, 'index'])->name("carpentry.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("carpentry.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("carpentry.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("carpentry.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("carpentry.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("carpentry.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("carpentry.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("carpentry.damages.index");


});

Route::prefix('upholstery-and-decoration')->middleware(['auth'])->group(function () {
          Route::get('', function(){
            return Redirect::route("upholstery-and-decoration.entries.index");
        })->name("upholstery-and-decoration.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("upholstery-and-decoration.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("upholstery-and-decoration.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("upholstery-and-decoration.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("upholstery-and-decoration.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("upholstery-and-decoration.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("upholstery-and-decoration.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("upholstery-and-decoration.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("upholstery-and-decoration.damages.index");
});

Route::prefix('typography')->middleware(['auth'])->group(function () {
         Route::get('', function(){
            return Redirect::route("typography.entries.index");
        })->name("typography.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("typography.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("typography.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("typography.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("typography.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("typography.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("typography.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("typography.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("typography.damages.index");
});

Route::prefix('metal-forming')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("metal-forming.entries.index");
        })->name("metal-forming.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("metal-forming.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("metal-forming.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("metal-forming.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("metal-forming.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("metal-forming.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("metal-forming.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("metal-forming.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("metal-forming.damages.index");
});

Route::prefix('mechatronics')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("mechatronics.entries.index");
        })->name("mechatronics.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("mechatronics.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("mechatronics.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("mechatronics.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("mechatronics.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("mechatronics.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("mechatronics.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("mechatronics.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("mechatronics.damages.index");
});

Route::prefix('conditioning-and-cooling')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("conditioning-and-cooling.entries.index");
        })->name("conditioning-and-cooling.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("conditioning-and-cooling.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("conditioning-and-cooling.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("conditioning-and-cooling.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("conditioning-and-cooling.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("conditioning-and-cooling.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("conditioning-and-cooling.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("conditioning-and-cooling.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("conditioning-and-cooling.damages.index");
});

Route::prefix('electricity')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("electricity.entries.index");
        })->name("electricity.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("electricity.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("electricity.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("electricity.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("electricity.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("electricity.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("electricity.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("electricity.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("electricity.damages.index");
});




Route::prefix('public-administration')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("public-administration.entries.index");
        })->name("public-administration.index");
        // Route::get('', [EntriesController::class, 'index'])->name("public-administration.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("public-administration.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("public-administration.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("public-administration.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("public-administration.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("public-administration.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("public-administration.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("public-administration.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("public-administration.damages.index");

        Route::prefix("entry")->group(function(){
           Route::get('', [EntriesController::class, 'create'])->name("public-administration.entry.create");
        });









});
Route::prefix('elementary-school')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("elementary-school.entries.index");
        })->name("elementary-school.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("elementary-school.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("elementary-school.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("elementary-school.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("elementary-school.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("elementary-school.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("elementary-school.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("elementary-school.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("elementary-school.damages.index");

});
Route::prefix('secondary-school')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("secondary-school.entries.index");
        })->name("secondary-school.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("secondary-school.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("secondary-school.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("secondary-school.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("secondary-school.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("secondary-school.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("secondary-school.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("secondary-school.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("secondary-school.damages.index");
});
Route::prefix('kindergarten')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("kindergarten.entries.index");
        })->name("kindergarten.index");

        Route::get('add-product', [ProductsController::class, 'index'])->name("kindergarten.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("kindergarten.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("kindergarten.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("kindergarten.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("kindergarten.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("kindergarten.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("kindergarten.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("kindergarten.damages.index");
});
Route::prefix('kitchen')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("kitchen.entries.index");
        })->name("kitchen.index");

        Route::get('add-product', [ProductsController::class, 'index'])->name("kitchen.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("kitchen.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("kitchen.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("kitchen.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("kitchen.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("kitchen.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("kitchen.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("kitchen.damages.index");
});
Route::prefix('dorm')->middleware(['auth'])->group(function () {
        Route::get('', function(){
            return Redirect::route("dorm.entries.index");
        })->name("dorm.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("dorm.product.index");
        Route::post('store-product', [ProductsController::class, 'store'])->name("dorm.product.store");
        Route::post('edit-product', [ProductsController::class, 'edit'])->name("dorm.product.edit");
        Route::post('delete-product', [ProductsController::class, 'destroy'])->name("dorm.product.destroy");

        Route::get('entries', [EntriesController::class, 'index'])->name("dorm.entries.index");
        Route::get('supplies-log', [EntriesController::class, 'index'])->name("dorm.supplies-log.index");
        Route::get('outputs', [EntriesController::class, 'index'])->name("dorm.outputs.index");
        Route::get('damages', [EntriesController::class, 'index'])->name("dorm.damages.index");
});

Route::prefix('users')->middleware(['auth', 'admin'])->group(function () {
        Route::get('',  [UsersController::class, 'index'])->name("users.index");

});
