<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/service', [HomeController::class, 'service'])->name('home.service');
Route::get('/career', [HomeController::class, 'career'])->name('home.career');
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');




// Admin DashBoard
include 'dash-route.php';
