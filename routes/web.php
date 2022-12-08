<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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




Route::group(["middleware" => ["auth"]], function () {
    
    //  Mettre les routes qui sont protégees par le fait que la personne soit authentifiée
});
Route::group(["middleware" => ["verified"]], function () {
    Route::get('/', [PagesController::class,"index"])->name("index");
//  Mettre les routes qui sont protégees par le fait que la ai verifié son compte
});