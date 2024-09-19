<?php
/**
 * Web Routes
 *
 * This file contains the route definitions for the web application.
 * Each route is associated with a specific controller and method.
 *
 * Routes:
 *
 * - Home Page
 *   GET / -> HomeController@index -> home.index
 *
 * - About Page
 *   GET /about -> AboutController@index -> home.about
 *
 * - Service Page
 *   GET /service/{id?} -> ServicesController@index -> home.service
 *
 * - Career Page
 *   GET /career -> JobController@index -> home.career
 *
 * - Contact Page
 *   GET /contact -> ContactController@index -> home.contact
 *   GET /contact/meet -> ContactController@index_meet -> home.contact.meet
 *
 * - Privacy Policy Page
 *   GET /privacy-policy -> AboutController@privacy_page -> home.privacy
 *
 * - Application Page
 *   GET /appalication -> CareerController@appalication -> home.appalyCareer
 *
 * - Done Page
 *   GET /done -> HomeController@done -> home.done
 *
 * - Service Detail Page
 *   GET /service/detail/{id} -> ServicesController@single -> home.service.single
 *
 * - Career Detail Page
 *   GET /career/detail/{id} -> JobController@single -> home.career.single
 *
 * - Career Application Form
 *   POST /job/token/store -> JobController@jobId -> home.jobId
 *   POST /career/store -> CareerController@store -> home.careerStore
 *
 * - Contact Form
 *   POST /contact/store -> ContactController@store -> home.contactStore
 *   POST /schedule-meeting -> ContactController@pickDate -> home.scheduleMeeting
 *
 * - Admin Dashboard
 *   Includes routes from 'dash-route.php'
 */
use App\Http\Controllers\CareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
// ? view pages
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// ! About page
Route::get('/about', [AboutController ::class, 'index'])->name('home.about');

// * service page
Route::get('/service/{id?}', action: [ServicesController::class, 'index'])->name('home.service');

// ! Career page
Route::get('/career', [JobController::class, 'index'])->name('home.career');

// ? contact page
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
Route::get('/contact/meet', [ContactController::class, 'index_meet'])->name('home.contact.meet');

// ? privacy page
Route::get('/privacy-policy', [AboutController::class, 'privacy_page'])->name('home.privacy');

// ? appalication
Route::get('/appalication', [CareerController::class, 'appalication'])->name('home.appalyCareer');

// ? done page
Route::get('/done', [HomeController::class, 'done'])->name('home.done');

// ! Service action page
Route::get('/service/detail/{id}', [ServicesController::class, 'single'])->name('home.service.single');

Route::get('/career/detail/{id}', [JobController::class, 'single'])->name('home.career.single');

// ! career application form
Route::post('/job/token/store', [JobController::class, 'jobId'])->name('home.jobId');
Route::post('/career/store', [CareerController::class, 'store'])->name('home.careerStore');

// ! Contact form

Route::post('/contact/store', [ContactController::class, 'store'])->name('home.contactStore');
Route::post('/schedule-meeting', [ContactController::class, 'pickDate'])->name('home.scheduleMeeting');

// Admin DashBoard
include 'dash-route.php';
