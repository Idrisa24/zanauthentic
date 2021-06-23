<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TourController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnqueryController;
use App\Http\Controllers\PackageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('nyumbani');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('aboutus');
Route::get('/contact-us', [ContactController::class, 'contactUs'])->name('contactus');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contactus.send');
Route::get('/our-tours', [PagesController::class, 'tours'])->name('ourtours');
Route::get('/book', [BookingController::class, 'home_booking'])->name('booking.now');
Route::post('/book', [BookingController::class, 'store'])->name('booking.home');
Route::post('/enquery', [EnqueryController::class, 'store'])->name('enquery.store');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('ourgallery');

Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('tours', [TourController::class, 'index'])->name('tours.index');
    Route::get('tour/create', [TourController::class, 'create'])->name('tours.create');
    Route::put('tour/store', [TourController::class, 'store'])->name('tours.store');
    Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('booking/{booking}/show', [BookingController::class, 'show'])->whereUuid('booking')->middleware(['password.confirm'])->name('booking.show');
    Route::get('enqueries', [EnqueryController::class, 'index'])->name('enqueries.index');
    Route::get('enqueries/show', [EnqueryController::class, 'show'])->name('enqueries.show');
    Route::get('packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('package/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('package/store', [PackageController::class, 'store'])->name('packages.store');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


