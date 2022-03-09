<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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
Route::view('/unauthorize','nopermission');
Route::redirect('dashboard','categories');
Route::redirect('/','categories');
Route::middleware(['auth:sanctum','ensureIsAdmin','verified'])->group(function(){
    Route::resources([
        'categories' => CategoryController::class,
        'books'=>BookController::class
    ]);
});
    
