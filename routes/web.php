<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');})->name('home');
    
    Route::get('/home', function () {
    return view('page.home');})->name('home');

Route::get('/about', function () {
    return view('page.about');})->name('about');

