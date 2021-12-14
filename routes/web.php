<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('contact', 'contact');
Route::view('about', 'about');

Route::get('customers', 'CustomersController@list');
Route::post('customers', 'CustomersController@store');
