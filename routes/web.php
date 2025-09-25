<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GuestAuthController; 

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('/rooms', function () {
    return view('rooms');
})->name('rooms');

Route::get('/check-availability' , [BookingController::class , 'checkAvailability'])->name('check.availability');

// Add the guest authentication routes here
Route::middleware('guest:guest')->group(function () {
    Route::get('/register', [GuestAuthController::class, 'showRegistrationForm'])->name('guest.register.form');
    Route::post('/register', [GuestAuthController::class, 'register'])->name('guest.register');

    Route::get('/login', [GuestAuthController::class, 'showLoginForm'])->name('guest.login.form');
    Route::post('/login', [GuestAuthController::class, 'login'])->name('guest.login');
});

Route::middleware('auth:guest')->group(function () {
    Route::get('/dashboard', [GuestAuthController::class, 'dashboard'])->name('guest.dashboard');
    Route::post('/logout', [GuestAuthController::class, 'logout'])->name('guest.logout');
});