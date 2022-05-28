<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[UserController::class,'register_fx'])->name('register');
Route::post('/login',[UserController::class,'login_fx'])->name('login');

Route::post('/addproduct',[ProductController::class,'create_fx'])->name('addproduct');
Route::get('/viewproduct',[ProductController::class,'display_fx'])->name('viewproduct');
Route::get('/getproductbyid/{id}',[ProductController::class,'getproductbyid_fx']);
Route::put('/updateproduct/{id}',[ProductController::class,'updateproduct_fx']);
Route::delete('/deleteproduct/{id}',[ProductController::class,'delete_fx'])->name('deleteproduct');

Route::get('/searchresult/{key}',[ProductController::class,'search_fx'])->name('search');
