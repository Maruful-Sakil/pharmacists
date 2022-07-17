<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyerController;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/suppliers/register',[SupplierController::class,'create'])->name('suppliers.register');
Route::post('/suppliers/register',[SupplierController::class,'createSubmit'])->name('suppliers.register.submit');
Route::get('/suplliers/login',[SupplierController::class,'login'])->name('suplliers.login');
Route::post('/suplliers/login',[SupplierController::class,'loginSubmit'])->name('suppliers.login.submit');
Route::get('/suplliers/dashboard',[SupplierController::class,'dashboard'])->name('suppliers.dashboard')->middleware('logged.user');
Route::get('/logout',[SupplierController::class,'logout'])->name('logout');
Route::get('/products/insert',[ProductController::class,'insert'])->name('products.insert')->middleware('logged.user');
Route::post('/products/insert',[ProductController::class,'insertSubmit'])->name('products.insert.submit');
Route::get('/products/list',[ProductController::class,'list'])->name('products.list')->middleware('logged.user');
Route::get('/edit/{product_id}',[ProductController::class,'edit'])->name('products.edit')->middleware('logged.user');
Route::get('/delete/{product_id}',[ProductController::class,'delete'])->name('products.delete')->middleware('logged.user');
Route::put('product/update/{product_id}',[ProductController::class,'update'])->name('products.update')->middleware('logged.user');
Route::get('supplier/edit/{suplliers_id}',[SupplierController::class,'supplieredit'])->name('supplier.edit')->middleware('logged.user');
Route::put('supplier/update/{suplliers_id}',[SupplierController::class,'supplierupdate'])->name('supplier.update')->middleware('logged.user');
Route::get('/buyers/list',[BuyerController::class,'blist'])->name('buyers.list')->middleware('logged.user');
Route::get('/bdelete/{id}',[BuyerController::class,'bdelete'])->name('buyer.delete')->middleware('logged.user');
Route::get('/delivery',[ProductController::class,'delivery'])->name('product.delivery')->middleware('logged.user');
Route::get('delivery/edit/{id}',[ProductController::class,'deledit'])->name('delivery.edit')->middleware('logged.user');
Route::put('delivery/update/{id}',[ProductController::class,'delupdate'])->name('delivery.update')->middleware('logged.user');


