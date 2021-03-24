<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\PlatController;
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
    Route::post('admin/dashboard/platStore', [PlatController::class, 'store'])->name('plat.store');

    Route::delete('admin/dashboard/forceDestroyCategory/{id}', [CategoryController::class, 'forceDestroy'])->name('category.force.destroy');
    Route::delete('admin/dashboard/destroyCategory/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');

    Route::delete('admin/dashboard/forceDestroyType/{id}', [TypeController::class, 'forceDestroy'])->name('type.force.destroy');
    Route::delete('admin/dashboard/destroyType/{type}', [TypeController::class, 'destroy'])->name('type.destroy');
    Route::put('type/restore/{id}', [TypeController::class, 'restore'])->name('type.restore');

    Route::delete('admin/dashboard/forceDestroyIngredient/{id}', [IngredientController::class, 'forceDestroy'])->name('ingredient.force.destroy');
    Route::delete('admin/dashboard/destroyIngredient/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredient.destroy');
    Route::put('ingredient/restore/{id}', [IngredientController::class, 'restore'])->name('ingredient.restore');

    Route::delete('admin/dashboard/forceDestroyOrigin/{id}', [OriginController::class, 'forceDestroy'])->name('origin.force.destroy');
    Route::delete('admin/dashboard/destroyOrigin/{origin}', [OriginController::class, 'destroy'])->name('origin.destroy');
    Route::put('origin/restore/{id}', [OriginController::class, 'restore'])->name('origin.restore');



});

require __DIR__.'/auth.php';
