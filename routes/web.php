<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');




// Admin DashBoard
include 'dash-route.php';
