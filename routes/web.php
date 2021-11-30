<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntriesController;
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
});
Route::prefix('upholstery-and-decoration')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("upholstery-and-decoration.index");
});
Route::prefix('typography')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("typography.index");
});
Route::prefix('metal-forming')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("metal-forming.index");
});
Route::prefix('mechatronics')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("mechatronics.index");
});
Route::prefix('conditioning-and-cooling')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("conditioning-and-cooling.index");
});

Route::prefix('electricity')->middleware(['auth'])->group(function () {
Route::get('', [EntriesController::class, 'index'])->name("electricity.index");
});




Route::prefix('public-administration')->middleware(['auth'])->group(function () {
        Route::get('', [EntriesController::class, 'index'])->name("public-administration.index");
});
Route::prefix('elementary-school')->middleware(['auth'])->group(function () {
Route::get('', [EntriesController::class, 'index'])->name("elementary-school.index");
});
Route::prefix('secondary-school')->middleware(['auth'])->group(function () {
Route::get('', [EntriesController::class, 'index'])->name("secondary-school.index");
});
Route::prefix('kindergarten')->middleware(['auth'])->group(function () {
Route::get('', [EntriesController::class, 'index'])->name("kindergarten.index");
});
Route::prefix('kitchen')->middleware(['auth'])->group(function () {
Route::get('', [EntriesController::class, 'index'])->name("kitchen.index");
});
Route::prefix('dorm')->middleware(['auth'])->group(function () {
Route::get('', [EntriesController::class, 'index'])->name("dorm.index");
});

Route::prefix('users')->middleware(['auth', 'admin'])->group(function () {
        Route::get('',  [UsersController::class, 'index'])->name("users.index");

});
