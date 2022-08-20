<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/supplier/create',[APIController::class,'create']);
Route::get('/supplier/get',[APIController::class,'get']);
Route::get('/product/list',[APIController::class,'list']);
Route::get('/buyer/list',[APIController::class,'blist']);
Route::delete('/delete/{product_id}',[APIController::class,'delete']);
Route::put('/bupdate/{id}',[APIController::class,'bupdate']);
Route::put('/supdate/{suplliers_id}',[APIController::class,'supdate']);
Route::post('/login',[APIController::class,'login']);
Route::post('/logout',[APIController::class,'logout']);