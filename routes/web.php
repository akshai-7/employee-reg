<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::view('/', 'login')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::view('/register', 'register')->name('register');
Route::post('/', [RegisterController::class, 'register']);
Route::view('/user', 'user')->name('user');
Route::get('/user', [UserController::class, 'userlist']);
Route::get('/edituser/{id}', [UserController::class, 'edituser']);
Route::post('/update/{id}', [UserController::class, 'update']);
Route::get('/remove/{id}', [UserController::class, 'remove']);
