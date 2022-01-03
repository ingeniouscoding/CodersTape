<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index');
Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');

Route::view('about', 'about')
    ->name('about')
    ->middleware('fake');

Route::get('customers/', "CustomersController@index")->name('customers.index');
Route::get('customers/create', "CustomersController@create")->name('customers.create');
Route::post('customers/', "CustomersController@store")->name('customers.store');
Route::get('customers/{customer}', "CustomersController@show")->middleware('can:view,customer')->name('customers.show');
Route::get('customers/{customer}/edit', "CustomersController@edit")->name('customers.edit');
Route::patch('customers/{customer}', "CustomersController@update")->name('customers.update');
Route::delete('customers/{customer}', "CustomersController@destroy")->name('customers.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
