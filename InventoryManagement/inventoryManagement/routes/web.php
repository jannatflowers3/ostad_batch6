<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::get('/',[HomeController::class,'homePage']);
Route::get('/dashboard',[DashboardController::class,'dashboardPage']);
Route::get('/categoryPage',[CategoryController::class,'categoryPage']);
Route::get('/userRegistration',[UserController::class,'userRegistration']);

