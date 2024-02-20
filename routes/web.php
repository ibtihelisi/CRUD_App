<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/categorie/liste',[CategoryController::class,'liste']);

Route::post('/categorie/add',[CategoryController::class,'store']);

Route::get('/categorie/delete/{id}',[CategoryController::class,'destroy']);

Route::post('/categorie/update/{id}',[CategoryController::class,'update']);


