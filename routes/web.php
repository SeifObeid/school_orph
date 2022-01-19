<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\ProductsController;
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
    return view('land-app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('carpentry')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("carpentry.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("carpentry.product.index");
});

Route::prefix('upholstery-and-decoration')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("upholstery-and-decoration.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("upholstery-and-decoration.product.index");
});

Route::prefix('typography')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("typography.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("typography.product.index");
});

Route::prefix('metal-forming')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("metal-forming.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("metal-forming.product.index");
});

Route::prefix('mechatronics')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("mechatronics.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("mechatronics.product.index");
});

Route::prefix('conditioning-and-cooling')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("conditioning-and-cooling.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("conditioning-and-cooling.product.index");
});

Route::prefix('electricity')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("electricity.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("electricity.product.index");
});




Route::prefix('public-administration')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("public-administration.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("public-administration.product.index");
});
Route::prefix('elementary-school')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("elementary-school.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("elementary-school.product.index");
});
Route::prefix('secondary-school')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("secondary-school.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("secondary-school.product.index");
});
Route::prefix('kindergarten')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("kindergarten.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("kindergarten.product.index");
});
Route::prefix('kitchen')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("kitchen.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("kitchen.product.index");
});
Route::prefix('dorm')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("dorm.index");
        Route::get('add-product', [ProductsController::class, 'index'])->name("dorm.product.index");
});

Route::prefix('users')->middleware(['auth', 'admin'])->group(function () {
        Route::get('',  [UsersController::class, 'index'])->name("users.index");

});
