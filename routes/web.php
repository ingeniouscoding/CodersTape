<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('contact', 'contact');
Route::view('about', 'about');

Route::get('customers', function () {
    $customers = [
        'John Doe',
        'Jane Doe',
        'Bob Martin',
    ];
    return view('internals.customers', [
        'customers' => $customers,
    ]);
});
