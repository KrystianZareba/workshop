<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\StatisticsController;
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
        return redirect()->route('repairs.index');
    })->name('home');

    /* Account */
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::put('changePassword', [UserController::class, 'updatePassword'])->name('updatePassword');

    /* Repairs */
    Route::resource('repairs', RepairController::class);

    /* Contractors */
    Route::resource('contractors', ContractorController::class);

    /* Cars */
    Route::prefix('contractors/{contractor}')->group(function(){
        Route::resource('cars', CarController::class);
    });
});

Route::group(['middleware' => ['auth', 'admin']], function(){
    /* Users */
    Route::resource('users', UserController::class);

    /* Statistics */
    Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics');
    Route::get('statistics/data/{offset?}', [StatisticsController::class, 'apiData']);
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
});
