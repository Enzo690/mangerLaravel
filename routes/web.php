<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'App\Http\Middleware\IsAdmin'], function () {

    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('admin/dashboard/categoryStore', [CategoryController::class, 'store'])->name('category.store');
    Route::post('admin/dashboard/ingredientStore', [IngredientController::class, 'store'])->name('ingredient.store');
    Route::post('admin/dashboard/originStore', [OriginController::class, 'store'])->name('origin.store');
    Route::post('admin/dashboard/typeStore', [TypeController::class, 'store'])->name('type.store');

    Route::get('admin/dashboard/deleteCategory', [AdminController::class, 'destroyCat'])->name('category.destroy');
    Route::get('admin/dashboard/destroyCategory', [AdminController::class, 'forceDestroyCat'])->name('category.forceDestroy');


});

require __DIR__.'/auth.php';
