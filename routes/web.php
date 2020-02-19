<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'AlbumController@index')->middleware('auth'); //Вывод фотоальбомов

Route::post('{user}/albums', 'AlbumController@store')->middleware('auth');

Route::delete('albums/{album}', 'AlbumController@destroy')->middleware('auth');

Route::patch('albums/{album}/update', 'AlbumController@update')->middleware('auth');

Route::get('albums/{album}', 'AlbumController@show')->middleware('auth'); //Вывод фотоальбомов





Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
