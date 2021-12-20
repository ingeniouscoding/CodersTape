<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index');
Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store');

Route::view('about', 'about')->middleware('fake');

Route::resource('customers', 'CustomersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
