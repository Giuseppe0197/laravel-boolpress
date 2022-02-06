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

Route::get('/create', 'GuestController@create') -> name('create');
Route::post('/', 'GuestController@store') -> name('store');
