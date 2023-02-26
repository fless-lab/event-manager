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

        // Manage Users
        Route::get('/users', [AdminsController::class,"usersIndex"])->name("admin.users.index");
        Route::post('/users', [AdminsController::class,"usersStore"])->name("admin.users.store");
        Route::put('/users/{user}', [AdminsController::class,"usersUpdate"])->name("admin.users.update");
        Route::delete('/users/{user}', [AdminsController::class,"usersDelete"])->name("admin.users.delete");

        // Manage events
        Route::get('/events', [AdminsController::class,"eventsIndex"])->name("admin.events.index");
        Route::get('/events/{event}', [AdminsController::class,"eventsShow"])->name("admin.events.show");
        Route::post('/events', [AdminsController::class,"eventsStore"])->name("admin.events.store");
        Route::put('/events/{event}/evaluate', [AdminsController::class,"eventsEvaluate"])->name("admin.events.evaluate");
        Route::put('/events/{event}', [AdminsController::class,"eventsUpdate"])->name("admin.events.update");
        Route::delete('/events/{event}', [AdminsController::class,"eventsDelete"])->name("admin.events.delete");


        // Manage events categories
        Route::get("/events-categories",[AdminsController::class,"eventCategoriesIndex"])->name("admin.events.categories.index");
        Route::post("/events-categories",[AdminsController::class,"eventCategoriesStore"])->name("admin.events.categories.store");
        Route::put("/events-categories/{category}",[AdminsController::class,"eventCategoriesUpdate"])->name("admin.events.categories.update");
        Route::delete("/events-categories/{category}",[AdminsController::class,"eventCategoriesDelete"])->name("admin.events.categories.delete");
    });
});
