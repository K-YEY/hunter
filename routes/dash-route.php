<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CareersController as DashCareersController;
use App\Http\Controllers\Admin\ContactController as DashContactController;
use App\Http\Controllers\admin\FAQController;
use App\Http\Controllers\Admin\JobController as DashJobController;
use App\Http\Controllers\Admin\ServicesController as DashServicesController;
use App\Http\Controllers\Admin\WidgetsController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    // login 🔥
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.post.login');

    // Auth 🚨
    Route::middleware(['auth'])->group(function () {
        // settings ⚙️
        Route::get('/settings', [AdminSettingsController::class, 'index'])->name('admin.settings');
        // view 🤗
        Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');

        Route::get('/table/admins', [AdminsController::class, 'showTable'])->name('admin.admins.table');

        Route::get('/table/careers', [DashCareersController::class, 'index'])->name('admin.careers.table');

        Route::get('/table/contact', [DashContactController::class, 'index'])->name('admin.contact.table');

        Route::get('/table/job', [DashJobController::class, 'index'])->name('admin.job.table');

        Route::get('/table/services', [DashServicesController::class, 'index'])->name('admin.service.table');

        Route::get('/table/social', [SocialController::class, 'socialView'])->name('admin.social.table');

        // Admins ⚙️
        Route::get('/create-admin', [AdminsController::class, 'create'])->name('admin.create');

        Route::get('/edit-admin/{id}', [AdminsController::class, 'edit'])->name('admin.edit');

        // job 👨‍💻
        Route::get('/create-job', [DashJobController::class, 'create'])->name('admin.job.create');
        Route::get('/edit-job/{id}', [DashJobController::class, 'edit'])->name('admin.job.edit');

        // service 🛎️
        Route::get('/create-service', [DashServicesController::class, 'create'])->name('admin.service.create');

        Route::get('/edit-service/{id}', [DashServicesController::class, 'edit'])->name('admin.service.edit');
        // FAQ
        Route::get('/faq', [FAQController::class, 'index'])->name('admin.faq');
        // action 👨‍💻
        Route::group(['prefix' => '/action'], function () {
            // Admins ⚙️
            Route::post('/create-admin', [AdminsController::class, 'store'])->name('admin.create.admin.store');
            Route::post('/edit-admin', [AdminsController::class, 'update'])->name('admin.edit.admin.update');
            Route::get('/delete-admin/{id}', [AdminsController::class, 'destroy'])->name('admin.delete.admins');
            // job 👨‍💻
            Route::post('/create-job', [DashJobController::class, 'store'])->name('admin.create.job.store');
            Route::post('/edit-job', [DashJobController::class, 'update'])->name('admin.edit.job.update');
            Route::get('/delete-job/{id}', [DashJobController::class, 'destroy'])->name('admin.delete.job');

            // service 🛎️
            Route::post('/create-service', [DashServicesController::class, 'store'])->name('admin.create.service.store');
            Route::post('/edit-service', [DashServicesController::class, 'update'])->name('admin.edit.service.update');
            Route::get('/delete-service/{id}', [DashServicesController::class, 'destroy'])->name('admin.delete.service');

            //careers ⚒️
            Route::get('/delete-careers/{id}', [DashCareersController::class, 'destroy'])->name('admin.delete.careers');
            Route::post('/update-careers', [DashCareersController::class, 'updateStatus'])->name('admin.update.careers');

            // contact 📞
            Route::get('/delete-contact/{id}', [DashContactController::class, 'destroy'])->name('admin.delete.contact');
            Route::post('/update-contact', [DashContactController::class, 'updateStatus'])->name('admin.update.contact');

            //social 📱
            Route::post('/update-social', [SocialController::class, 'updateSocial'])->name('admin.update.social');
            // FAQ
            Route::post('/update-faq', [FAQController::class, 'update'])->name('admin.update.faq');
            //settings 🔧
            Route::post('/update-settings', [AdminSettingsController::class, 'update_settings'])->name('admin.update.settings');
            // logout 👋
            Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        });
    });
});
