<?php

use Illuminate\Support\Facades\Route;

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