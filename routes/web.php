<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
// ? header view page
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController ::class, 'index'])->name('home.about');
Route::get('/service/{id?}', action: [ServicesController::class, 'index'])->name('home.service');
Route::get('/career', [CareerController::class, 'index'])->name('home.career');
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
Route::get('/privacy-policy', [AboutController::class, 'privacy_page'])->name('home.privacy');

// ! action page
Route::get('/service/detail/{id}', [ServicesController::class, 'single'])->name('home.service.single');
Route::get('/career/detail/{id}', [CareerController::class, 'single'])->name('home.career.single');



// Admin DashBoard
include 'dash-route.php';
