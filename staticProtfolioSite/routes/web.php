<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'homePage'])->name('home');
Route::get('/about', [SiteController::class, 'aboutPage'])->name('about');
Route::get('/protfolio', [SiteController::class, 'protfolioPage'])->name('protfolio');
Route::get('/services', [SiteController::class, 'servicesPage'])->name('services');
Route::get('/contact', [SiteController::class, 'contactPage'])->name('contact');