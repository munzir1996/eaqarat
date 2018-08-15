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

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', 'ControlPanel\ControlPanelController@index')->name('admin');
    Route::get('profile', 'ControlPanel\ControlPanelController@profile')->name('profile');
    Route::resource('users', 'User\UserController');
    Route::resource('types', 'Type\TypeController');
    Route::resource('areas', 'Area\AreaController');
    Route::resource('rates', 'Rate\RateController');
    Route::resource('estates', 'Estate\EstateController');
    Route::resource('markets', 'Market\MarketController');
    Route::resource('properties', 'Property\PropertyController');
    Route::resource('comments', 'Comment\CommentController');
    
});

Route::get('/home', 'HomeController@index')->name('home');
