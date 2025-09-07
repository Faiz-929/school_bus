<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BusRouteController;
use App\Http\Controllers\DriverController;

Route::get('/', function () {
    return view('welcome');
});

// ✨ صفحة الـ Dashboard (محمية بالـ login + verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✨ جميع الروتات داخل مجموعة auth
Route::middleware('auth')->group(function () {

    // ✅ صفحة البروفايل
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * ✅ CRUD مع صلاحيات
     * نستخدم middleware can:<permission>
     * عشان كل مستخدم يدخل بس اللي مسموح له
     */

    // الطلاب
    Route::resource('students', StudentController::class)->middleware('can:manage students');

    // أولياء الأمور
    Route::resource('guardians', GuardianController::class)->middleware('can:manage guardians');

    // المدارس
    Route::resource('schools', SchoolController::class)->middleware('can:manage schools');

    // الباصات
    Route::resource('buses', BusController::class)->middleware('can:manage buses');

    // خطوط السير
    Route::resource('bus_routes', BusRouteController::class)->middleware('auth');
    
    // ✅ السائقين
    Route::resource('drivers', DriverController::class)->middleware('can:manage drivers');
});

require __DIR__.'/auth.php';
