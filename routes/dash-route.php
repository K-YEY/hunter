<?php

use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\CommonType;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    // login 🔥
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.post.login');

    // Auth 🚨
    Route::middleware(['auth'])->group(function () {
        // view 🤗
        Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');
        Route::get('/table/admins', [AdminsController::class, 'showTable'])->name('admin.admins.table');
        Route::get('/table/type', [CommonType::class, 'index'])->name('admin.commontype.table');

        // Admins ⚙️
        Route::get('/create-admin', [AdminsController::class, 'create'])->name('admin.create');
        Route::get('/edit-admin/{id}', [AdminsController::class, 'edit'])->name('admin.edit');


        // action 👨‍💻
        Route::group(['prefix' => '/action'], function () {
            Route::post('/create-admin', [AdminsController::class, 'store'])->name('admin.create.admin.store');
            Route::post('/edit-admin', [AdminsController::class, 'update'])->name('admin.edit.admin.update');
            Route::get('/delete-admin/{id}', [AdminsController::class, 'destroy'])->name('admin.delete.admins');

            // logout 👋
            Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        });
    });
});
