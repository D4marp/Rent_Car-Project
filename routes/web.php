<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'] )->name('homepage');
Route::get('contact', [\App\Http\Controllers\HomeController::class, 'contact'] )->name('contact');
Route::post('contact', [\App\Http\Controllers\HomeController::class, 'contactStore'] )->name('contact.store');
Route::get('detail/{car:slug}', [\App\Http\Controllers\HomeController::class, 'detail'] )->name('detail');


Route::group(['middleware' => 'is_admin', 'prefix' => 'admin', 'as' => 'admin.'],function(){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']) ->name ('dashboard.index')->middleware('is_admin');
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::put('cars/update-image/{id}',[\App\Http\Controllers\Admin\CarController::class,'updateImage'])->name('cars.updateImage'); 
    
    Route::get('massages',[\App\Http\Controllers\Admin\MassageController::class, 'index'])->name('massages.index');
    Route::get('massages/{massage}',[\App\Http\Controllers\Admin\MassageController::class, 'destroy'])->name('massages.destroy');
});

Auth::routes(['register' => false]);


