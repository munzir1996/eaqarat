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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::resource('/realestates', 'RealEstateController');
Route::get('/profile', 'ControlPanel\ControlPanelController@userProfile')->name('user.profile');

Auth::routes();

// Admin auth routes
Route::get('admin/login', 'ControlPanel\AdminLoginController@showLoginForm')->name('admin.login.form');
Route::post('admin/login', 'ControlPanel\AdminLoginController@login')->name('admin.login');



Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/', 'ControlPanel\ControlPanelController@adminIndex')->name('admin');
    Route::get('profile', 'ControlPanel\ControlPanelController@adminProfile')->name('profile');
    Route::resource('users', 'User\UserController');
    Route::resource('admins', 'Admin\AdminController');
    Route::resource('types', 'Type\TypeController');
    Route::resource('areas', 'Area\AreaController');
    Route::resource('rates', 'Rate\RateController');
    Route::resource('estates', 'Estate\EstateController');
    Route::resource('markets', 'Market\MarketController');
    Route::resource('properties', 'Property\PropertyController');
    Route::resource('comments', 'Comment\CommentController');
    
});


//Route::get('/home', 'HomeController@index')->name('home');
