<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;

Route::get('/', [UserController::class, 'redirect'])->name('redirect');

Route::prefix('employee')->middleware('auth')->group( function () {
    Route::get('/list', [UserController::class, 'index'])->middleware('auth')->name('showEmployeeList');
    Route::get('/list/search', [UserController::class, 'search'])->middleware('auth')->name('employeeSearch');
    Route::get('/detail/{auth_id}', [UserController::class, 'showDetail'])->name('showEmployeeDetail');
    Route::get('/edit/{auth_id}', [UserController::class, 'edit'])->name('showEmployeeEdit');
    Route::post('/edit/success/{auth_id}', [UserController::class, 'update'])->name('employeeEdit');
});

Route::prefix('owner/users')->middleware('AdminMiddleware')->group( function () {
    Route::get('/list', [OwnerController::class, 'showUserList'])->name('showUserList');
    Route::get('/list/search', [OwnerController::class, 'search'])->name('userSearch');
    Route::get('/detail/{user_id}', [OwnerController::class, 'showUserDetail'])->name('showUserDetail');
    Route::get('/create', [OwnerController::class, 'showUserCreate'])->name('showUserCreate');
    Route::post('/create/success', [OwnerController::class, 'create'])->name('userCreate');
    Route::get('/edit/{user_id}', [OwnerController::class, 'showUserEdit'])->name('showUserEdit');
    Route::post('/edit/success/{user_id}', [OwnerController::class, 'edit'])->name('userEdit');
    Route::post('/delete/Success/{user_id}', [OwnerController::class, 'delete'])->name('userDelete');
    Route::post('/download', [OwnerController::class, 'download'])->name('download');
});

Auth::routes();



