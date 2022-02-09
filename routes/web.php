<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', 'GuestController@home') -> name('home');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::post('/login', 'Auth\LoginController@login') -> name('login');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/posts', 'GuestController@posts') -> name('posts');

Route::middleware('auth') -> group(function() {

    Route::get('/create', 'GuestController@create') -> name('create');
    Route::post('/store', 'GuestController@store') -> name('store');
    Route::get('/edit/{id}', 'GuestController@edit') -> name('edit');
    Route::post('/update/{id}', 'GuestController@update') -> name('update');


    Route::get('/delete/{id}', 'GuestController@delete') -> name('delete');
});

