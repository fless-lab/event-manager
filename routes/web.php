<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'accueil'])->name('accueil');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/sign', [LoginController::class, 'sign'])->name('sign');
