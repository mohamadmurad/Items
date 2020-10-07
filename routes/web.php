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

Route::get('/', function () {

    return redirect('items');
});

Route::get('/items',[\App\Http\Controllers\ItemsController::class,'index'])->name('item');

Route::post('/items',[\App\Http\Controllers\ItemsController::class,'search'])->name('itemsSearch');

Route::post('/itemsTable',[\App\Http\Controllers\ItemsController::class,'getTable'])->name('table');
Route::get('/itemsTable',function (){

    return redirect('items');

});


Route::get('/items/{ComputerNo}',[\App\Http\Controllers\ItemsController::class,'show'])->name('show');
