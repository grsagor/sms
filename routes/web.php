<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(FrontendController::class)->group(function() {
    Route::get('/', 'home')->name('frontend.home');
    Route::get('/about-us/{type}', 'aboutUs')->name('frontend.about.us');
    Route::get('/administrations/{type}', 'administrations')->name('frontend.administrations');
    Route::get('/academics/{type}', 'academics')->name('frontend.academics');
    Route::get('/admission/{type}', 'admission')->name('frontend.admission');
    Route::get('/facilities/{type}', 'facilities')->name('frontend.facilities');
    Route::get('/gallery/{type}', 'gallery')->name('frontend.gallery');
    Route::get('/notice', 'notice')->name('frontend.notice');
    Route::get('/contact', 'contact')->name('frontend.contact');
    Route::get('/acheivements', 'acheivements')->name('frontend.acheivements');
});