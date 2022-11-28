<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\HomeController;

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

Route::prefix('owner/users')->middleware('AdminMiddleware')->group( function () {
    Route::get('/list', [OwnerController::class, 'showUserList'])->name('showUserList');
    Route::get('/detail/{user_id}', [OwnerController::class, 'showUserDetail'])->name('showUserDetail');
    Route::get('/create', [OwnerController::class, 'showUserCreate'])->name('showUserCreate');
    Route::post('/create/success', [OwnerController::class, 'create'])->name('userCreate');
    Route::get('/edit/{user_id}', [OwnerController::class, 'showUserEdit'])->name('showUserEdit');
    Route::post('/edit/success/{user_id}', [OwnerController::class, 'edit'])->name('userEdit');
    Route::post('/delete/Success/{user_id}', [OwnerController::class, 'delete'])->name('userDelete');
});



//Route::get('/', function () {
//    return view('top');
//});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/detail/{user_id}', [HomeController::class, 'showDetail'])->middleware('auth')->name('showDetail');
Route::post('/', [HomeController::class, 'search'])->middleware('auth')->name('search');

