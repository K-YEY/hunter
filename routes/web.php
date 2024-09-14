<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
// ? header view page
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController ::class, 'index'])->name('home.about');
Route::get('/service/{id?}', action: [ServicesController::class, 'index'])->name('home.service');
Route::get('/career', [JobController::class, 'index'])->name('home.career');
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
Route::get('/privacy-policy', [AboutController::class, 'privacy_page'])->name('home.privacy');

Route::get('/appalication', [CareerController::class, 'appalication'])->name('home.appalyCareer');
Route::get('/done', [HomeController::class, 'done'])->name('home.done');

// ! action page
Route::get('/service/detail/{id}', [ServicesController::class, 'single'])->name('home.service.single');
Route::get('/career/detail/{id}', [JobController::class, 'single'])->name('home.career.single');

// ! career application form
Route::post('/job/token/store', [JobController::class, 'jobId'])->name('home.jobId');
Route::post('/career/store', [CareerController::class, 'store'])->name('home.careerStore');


// Admin DashBoard
include 'dash-route.php';
