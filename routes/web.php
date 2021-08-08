<?php

use Inertia\Inertia;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnqueryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PackageController;
use App\Models\Enquery;
use App\Models\Package;
use App\Models\Tour;

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
Route::get('/invoice/{invoice}/show', [InvoiceController::class, 'show'])->name('invoice');
Route::get('/invoice/{invoice}/download', [InvoiceController::class, 'download'])->name('download.invoice');
Route::get('package/{package}/details', [PackageController::class, 'details'])->whereUuid('package')->name('packages.details');
Route::get('/tours/{tour}/details', [TourController::class, 'details'])->name('tours.details');

Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('tours', [TourController::class, 'index'])->middleware(['password.confirm'])->name('tours.index');
    Route::get('tour/create', [TourController::class, 'create'])->middleware(['password.confirm'])->name('tours.create');
    Route::get('tour/{tour}/show', [TourController::class, 'show'])->whereUuid('tour')->middleware(['password.confirm'])->name('tour.show');
    Route::delete('tour/{tour}/delete', [TourController::class, 'destroy'])->whereUuid('tour')->middleware(['password.confirm'])->name('tour.destroy');
    Route::put('tour/store', [TourController::class, 'store'])->middleware(['password.confirm'])->name('tours.store');
    Route::put('tour/{tour}/update', [TourController::class, 'update'])->middleware(['password.confirm'])->name('tours.update');
    Route::delete('tour/{tour}/cover', [TourController::class, 'deleteTourPhote'])->whereUuid('tour')->middleware(['password.confirm'])->name('tours.cover.delete');

    Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('booking/{booking}/show', [BookingController::class, 'show'])->whereUuid('booking')->middleware(['password.confirm'])->name('booking.show');
    Route::get('booking/{booking}/edit', [BookingController::class, 'edit'])->whereUuid('booking')->middleware(['password.confirm'])->name('booking.edit');
    Route::put('booking/{booking}/update', [BookingController::class, 'update'])->whereUuid('booking')->middleware(['password.confirm'])->name('booking.update');
    Route::delete('booking/{booking}/destroy', [BookingController::class, 'destroy'])->whereUuid('booking')->middleware(['password.confirm'])->name('booking.destroy');

    Route::get('enqueries', [EnqueryController::class, 'index'])->middleware(['password.confirm'])->name('enqueries.index');
    Route::get('enquery/{enquery}/show', [EnqueryController::class, 'show'])->middleware(['password.confirm'])->name('enquery.show');

    Route::get('packages', [PackageController::class, 'index'])->middleware(['password.confirm'])->name('packages.index');
    Route::get('package/create', [PackageController::class, 'create'])->middleware(['password.confirm'])->name('packages.create');
    Route::get('package/{package}/show', [PackageController::class, 'show'])->whereUuid('package')->middleware(['password.confirm'])->name('packages.show');
    Route::put('package/{package}/update', [PackageController::class, 'update'])->whereUuid('package')->middleware(['password.confirm'])->name('packages.update');
    Route::delete('package/{package}/cover', [PackageController::class, 'deletePackahePhoto'])->whereUuid('package')->middleware(['password.confirm'])->name('package.cover.delete');
    Route::delete('package/{package}/delete', [PackageController::class, 'destroy'])->whereUuid('package')->middleware(['password.confirm'])->name('package.destroy');
    Route::put('package/store', [PackageController::class, 'store'])->middleware(['password.confirm'])->name('packages.store');

    Route::get('galleries', [GalleryController::class, 'index'])->middleware(['password.confirm'])->name('galleries.index');
    Route::get('gallery/{gallery}/show', [GalleryController::class, 'show'])->whereUuid('package')->middleware(['password.confirm'])->name('galleries.show');
    Route::get('gallery/create', [GalleryController::class, 'create'])->middleware(['password.confirm'])->name('galleries.create');
    Route::post('gallery/store', [GalleryController::class, 'store'])->middleware(['password.confirm'])->name('galleries.store');
    Route::put('gallery/{gallery}/update', [GalleryController::class, 'update'])->middleware(['password.confirm'])->name('galleries.update');
    Route::delete('gallery/{gallery}/destroy', [GalleryController::class, 'store'])->middleware(['password.confirm'])->name('galleries.destroy');

    Route::get('slides', [SlideController::class, 'index'])->middleware(['password.confirm'])->name('slides.index');
    Route::get('slide/{slide}/show', [SlideController::class, 'show'])->whereUuid('package')->middleware(['password.confirm'])->name('slides.show');
    Route::get('slide/create', [SlideController::class, 'create'])->middleware(['password.confirm'])->name('slides.create');
    Route::post('slide/store', [SlideController::class, 'store'])->middleware(['password.confirm'])->name('slides.store');
    Route::put('slide/{slide}/update', [SlideController::class, 'update'])->middleware(['password.confirm'])->name('slides.update');
    Route::delete('slide/{slide}/destroy', [SlideController::class, 'destroy'])->middleware(['password.confirm'])->name('packages.destroy');


});

Route::get('/mail', function(){
    return view('mail.tourbooked');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $details = [
        'bookings'  => Booking::count(),
        'tours'  => Tour::count(),
        'packages'  => Package::count(),
        'enqueries'  => Enquery::count(),
    ];
    
    return Inertia::render('Dashboard', ['details' => $details]);

})->name('dashboard');


