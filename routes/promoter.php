<?php

use App\Http\Controllers\PromotersController;


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




    Route::group(["middleware" => ["auth","verified","promoter_dashboard"]], function () {
        Route::get('/dashboard', [PromotersController::class,"index"])->name("promoter.index");
    });

