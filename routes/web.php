<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'],function(){
    Route::resource('/tailors', App\Http\Controllers\TailorController::class);
    Route::resource('/fabrics', App\Http\Controllers\FabricController::class);
    Route::resource('/orders', App\Http\Controllers\OrderController::class);
});
Route::get('/test',function (){
   $orders =  \App\Models\Tailor::all();
   dd($orders);
});
