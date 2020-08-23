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
Auth::routes();

Route::get('/', 'ReviewController@index')->name('index');

Route::group(['middleware' => 'auth'],function() {
    
    Route::get('/{review}', 'ReviewController@show')->name('show');
    Route::get('/review/create','ReviewController@create')->name('create');
    Route::post('/review/store','ReviewController@store')->name('store');
    Route::get('/{review}/edit', 'ReviewController@edit')->name('edit');
    Route::patch('/{review}', 'ReviewController@update')->name('update');
    Route::get('/postsdelete/{review_id}', 'ReviewController@destroy')->name('destroy');

});

Route::get('/home', 'HomeController@index')->name('home');
