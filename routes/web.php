<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('show/{id}', [UserController::class, 'update'])->name('update');
});



//Route::get('/', function () {
//    return view('top');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/detail/{user_id}', [\App\Http\Controllers\HomeController::class, 'showDetail'])->middleware('auth')->name('showDetail');
Route::post('/', [\App\Http\Controllers\HomeController::class, 'search'])->middleware('auth')->name('search');

