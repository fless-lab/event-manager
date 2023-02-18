<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
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
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'handleRegistration'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'handleLogin'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/page3', [UserController::class, 'page3'])->name('page3');

Route::get('/page2', [UserController::class,'page2'])->name('page2');
Route::post('/page2', [UserController::class, 'handleStore'])->name('page4');
Route::get('/page4', [UserController::class, 'page4'])->name('page4');
Route::post('/page4', [UserController::class, 'handleTicket'])->name('page4');
Route::get('/page5', [UserController::class, 'page5'])->name('page5');
Route::post('/page5', [UserController::class, 'handleTTicket'])->name('page5');
Route::get('/details', [UserController::class,'details'])->name('details');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', [LoginController::class, 'index'])->name('index');
Route::get('/home', [LoginController::class, 'home'])->name('home');
Route::get('/event', [LoginController::class, 'event'])->name('event');
Route::get('/page1', [LoginController::class, 'page1'])->name('page1');


Route::get('/page6', [LoginController::class, 'page6'])->name('page6');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
