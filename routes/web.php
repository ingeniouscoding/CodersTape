<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store');

Route::view('about', 'about');

Route::resource('customers', 'CustomersController');
