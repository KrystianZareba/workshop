<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', function () {
        return view('home');
    })->name('home');

    /* Account */
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::put('/changePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
});

Route::group(['middleware' => ['auth', 'admin']], function(){
    /* Users */
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});
