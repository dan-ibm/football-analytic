<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events', 'EventController@index')->name('events.index');
Route::get('/event/{id}', 'EventController@show')->name('events.show');
Route::post('/events-post', 'EventController@store')->name('events.store');
Route::get('/events-create', 'EventController@create')->name('events.create')->middleware('auth');
