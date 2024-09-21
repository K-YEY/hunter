<?php
/**
 * Web Routes
 *
 * This file contains the route definitions for the web application.
 * Each route is associated with a specific controller and method.
 */

use App\Http\Controllers\CareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// About Page
Route::get('/about', [AboutController::class, 'index'])->name('home.about');

// Service Page
Route::get('/service/{id?}', [ServicesController::class, 'index'])->name('home.service');

// Career Page
Route::get('/career', [JobController::class, 'index'])->name('home.career');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
Route::get('/contact/meet', [ContactController::class, 'index_meet'])->name('home.contact.meet');

// Privacy Policy Page
Route::get('/privacy-policy', [AboutController::class, 'privacy_page'])->name('home.privacy');

// Application Page
Route::get('/application', [CareerController::class, 'application'])->name('home.applyCareer');

// Done Page
Route::get('/done', [HomeController::class, 'done'])->name('home.done');

// Service Detail Page
Route::get('/service/detail/{id}', [ServicesController::class, 'single'])->name('home.service.single');

// Career Detail Page
Route::get('/career/detail/{id}', [JobController::class, 'single'])->name('home.career.single');

// Career Application Form
Route::post('/job/token/store', [JobController::class, 'jobId'])->name('home.jobId');
Route::post('/career/store', [CareerController::class, 'store'])->name('home.careerStore');

// Contact Form
Route::post('/contact/store', [ContactController::class, 'store'])->name('home.contactStore');
Route::post('/schedule-meeting', [ContactController::class, 'pickDate'])->name('home.scheduleMeeting');

// Admin Dashboard
include 'dash-route.php';
