<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportDataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PrizeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("upload",[ImportDataController::class,'import_data']);
Route::get("getData",[ImportDataController::class,'get_data']);


//category
Route::get("getCategory",[CategoryController::class,'get_category']);
Route::post("saveCategory",[CategoryController::class,'save_category']);
Route::post("updateCategory",[CategoryController::class,'update_category']);
Route::get("deleteCategory/{id}",[CategoryController::class,'delete_category']);

//prize
Route::get("getPrize",[PrizeController::class,'get_prize']);
Route::post("savePrize",[PrizeController::class,'save_prize']);

