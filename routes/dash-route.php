<?php

use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\CareersController as DashCareersController;
use App\Http\Controllers\admin\ContactController as DashContactController;
use App\Http\Controllers\admin\JobController as DashJobController;
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
        Route::get('/table/careers', [DashCareersController::class, 'index'])->name('admin.careers.table');
        Route::get('/table/contact', [DashContactController::class, 'index'])->name('admin.contact.table');
        Route::get('/table/job', [DashJobController::class, 'index'])->name('admin.job.table');

        // Admins ⚙️
        Route::get('/create-admin', [AdminsController::class, 'create'])->name('admin.create');
        Route::get('/edit-admin/{id}', [AdminsController::class, 'edit'])->name('admin.edit');

        // job 👨‍💻
        Route::get('/create-job', [DashJobController::class, 'create'])->name('admin.job.create');
        Route::get('/edit-job/{id}', [DashJobController::class, 'edit'])->name('admin.job.edit');

        // action 👨‍💻
        Route::group(['prefix' => '/action'], function () {
            Route::post('/create-admin', [AdminsController::class, 'store'])->name('admin.create.admin.store');
            Route::post('/edit-admin', [AdminsController::class, 'update'])->name('admin.edit.admin.update');
            Route::get('/delete-admin/{id}', [AdminsController::class, 'destroy'])->name('admin.delete.admins');

            Route::post('/create-job', [DashJobController::class, 'store'])->name('admin.create.job.store');
            Route::post('/edit-job', [DashJobController::class, 'update'])->name('admin.edit.job.update');
            Route::get('/delete-job/{id}', [DashJobController::class, 'destroy'])->name('admin.delete.job');


            Route::get('/delete-careers/{id}', [DashCareersController::class, 'destroy'])->name('admin.delete.careers');
            Route::post('/update-careers', [DashCareersController::class, 'updateStatus'])->name('admin.update.careers');

            Route::get('/delete-contact/{id}', [DashContactController::class, 'destroy'])->name('admin.delete.contact');
            Route::post('/update-contact', [DashContactController::class, 'updateStatus'])->name('admin.update.contact');
            // logout 👋
            Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        });
    });
});
