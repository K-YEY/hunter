<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CareersController as DashCareersController;
use App\Http\Controllers\Admin\ContactController as DashContactController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\JobController as DashJobController;
use App\Http\Controllers\Admin\ServicesController as DashServicesController;
use App\Http\Controllers\Admin\WidgetsController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    // Login Routes
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.post.login');

    // Authenticated Routes
    Route::middleware(['auth'])->group(function () {
        // Dashboard and Settings
        Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');
        Route::get('/settings', [AdminSettingsController::class, 'index'])->name('admin.settings');

        // Table Routes
        Route::prefix('table')->group(function () {
            Route::get('/admins', [AdminsController::class, 'showTable'])->name('admin.admins.table');
            Route::get('/careers', [DashCareersController::class, 'index'])->name('admin.careers.table');
            Route::get('/contact', [DashContactController::class, 'index'])->name('admin.contact.table');
            Route::get('/job', [DashJobController::class, 'index'])->name('admin.job.table');
            Route::get('/services', [DashServicesController::class, 'index'])->name('admin.service.table');
            Route::get('/social', [SocialController::class, 'socialView'])->name('admin.social.table');
        });

        // Admin Management
        Route::prefix('admin')->group(function () {
            Route::get('/create', [AdminsController::class, 'create'])->name('admin.create');
            Route::get('/edit/{id}', [AdminsController::class, 'edit'])->name('admin.edit');
        });

        // Job Management
        Route::prefix('job')->group(function () {
            Route::get('/create', [DashJobController::class, 'create'])->name('admin.job.create');
            Route::get('/edit/{id}', [DashJobController::class, 'edit'])->name('admin.job.edit');
        });

        // Service Management
        Route::prefix('service')->group(function () {
            Route::get('/create', [DashServicesController::class, 'create'])->name('admin.service.create');
            Route::get('/edit/{id}', [DashServicesController::class, 'edit'])->name('admin.service.edit');
        });

        // FAQ
        Route::get('/faq', [FAQController::class, 'index'])->name('admin.faq');

        // Action Routes
        Route::prefix('action')->group(function () {
            // Admin Actions
            Route::post('/create-admin', [AdminsController::class, 'store'])->name('admin.create.admin.store');
            Route::post('/edit-admin', [AdminsController::class, 'update'])->name('admin.edit.admin.update');
            Route::get('/delete-admin/{id}', [AdminsController::class, 'destroy'])->name('admin.delete.admins');

            // Job Actions
            Route::post('/create-job', [DashJobController::class, 'store'])->name('admin.create.job.store');
            Route::post('/edit-job', [DashJobController::class, 'update'])->name('admin.edit.job.update');
            Route::get('/delete-job/{id}', [DashJobController::class, 'destroy'])->name('admin.delete.job');

            // Service Actions
            Route::post('/create-service', [DashServicesController::class, 'store'])->name('admin.create.service.store');
            Route::post('/edit-service', [DashServicesController::class, 'update'])->name('admin.edit.service.update');
            Route::get('/delete-service/{id}', [DashServicesController::class, 'destroy'])->name('admin.delete.service');

            // Careers Actions
            Route::get('/delete-careers/{id}', [DashCareersController::class, 'destroy'])->name('admin.delete.careers');
            Route::post('/update-careers', [DashCareersController::class, 'updateStatus'])->name('admin.update.careers');

            // Contact Actions
            Route::get('/delete-contact/{id}', [DashContactController::class, 'destroy'])->name('admin.delete.contact');
            Route::post('/update-contact', [DashContactController::class, 'updateStatus'])->name('admin.update.contact');

            // Social Actions
            Route::post('/update-social', [SocialController::class, 'updateSocial'])->name('admin.update.social');

            // FAQ Actions
            Route::post('/update-faq', [FAQController::class, 'update'])->name('admin.update.faq');

            // Settings Actions
            Route::post('/update-settings', [AdminSettingsController::class, 'update_settings'])->name('admin.update.settings');

            // Logout
            Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        });
    });
});
