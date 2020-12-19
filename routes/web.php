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

Auth::routes();
Route::get('/', 'EventController@index');
Route::get('/home', 'EventController@index')->name('home');
Route::get('/events', 'EventController@index')->name('events.index');
Route::get('/event/{id}', 'EventController@show')->name('events.show');
Route::post('/events-post', 'EventController@store')->name('events.store');
Route::get('/events-create', 'EventController@create')->name('events.create')->middleware('admin');
Route::get('/events-edit/{id}', 'EventController@edit')->name('event.edit')->middleware('admin');
Route::patch('/events-update/{event}', 'EventController@update')->name('event.update')->middleware('admin');
Route::delete('/events-delete/{id}', 'EventController@destroy')->name('event.destroy')->middleware('admin');
