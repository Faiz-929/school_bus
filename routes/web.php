<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BusRouteController;
use App\Http\Controllers\BusController;

Route::get('/', function () {
    return view('welcome');
});
// الطلاب
Route::resource('students', StudentController::class)
     ->middleware('can:manage students');

// أولياء الأمور
Route::resource('guardians', GuardianController::class)
     ->middleware('can:manage guardians');

// المدارس
Route::resource('schools', SchoolController::class)
     ->middleware('can:manage schools');

// السائقين
Route::resource('drivers', DriverController::class)
     ->middleware('can:manage drivers');

// خطوط السير
Route::resource('bus_routes', BusRouteController::class)
     ->middleware('can:manage routes');

// الباصات
Route::resource('buses', BusController::class)
     ->middleware('can:manage buses');
//
