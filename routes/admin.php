<?php

use App\Http\Controllers\AdminsController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(["prefix"=>"admin"], function(){
    Route::group(["middleware" => ["auth","verified","admin_dashboard"]], function () {
        Route::get('/dashboard', [AdminsController::class,"index"])->name("admin.index");
    });
});
