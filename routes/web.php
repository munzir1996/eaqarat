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
Route::get('/stocks', 'StockController@index')->name('stock');

Route::get('/rents', 'RentController@index')->name('rent');
Route::get('/rents/search', 'RentController@search')->name('rent.search');

Route::get('/sales', 'SaleController@index')->name('sale');
Route::get('/sales/search', 'SaleController@search')->name('sale.search');

Route::get('/search', 'HomeController@search')->name('search');
Route::get('/details/{id}', 'HomeController@detail')->name('detail');
Route::get('/blocks', 'BlockController@create')->name('block');
Route::post('/blocks', 'BlockController@store')->name('block.store');
Route::get('/complains', 'ComplainController@create')->name('complain');
Route::post('/complains', 'ComplainController@store')->name('complain.store');
Route::get('/results', 'ResultController@index')->name('result');

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
    Route::resource('complains', 'Complain\ComplainController');
    Route::put('property\title', 'Property\PropertyController@title')->name('property.title');
    Route::post('property\result\{id}', 'Property\PropertyController@result')->name('property.result');
    
});

Route::get('/profile/{id}', 'ControlPanel\ControlPanelController@userProfile')->middleware('auth')->name('user.profile');
Route::put('/edit/profile/{id}', 'ControlPanel\ControlPanelController@updateUserProfile')->middleware('auth')->name('updateuser.profile');
Route::resource('/eaqars', 'EaqarController')->middleware('auth');
Route::get('/eaqars/rent/{id}', 'EaqarController@rent')->middleware('auth')->name('eaqars.rent');
Route::get('/eaqars/sale/{id}', 'EaqarController@sale')->middleware('auth')->name('eaqars.sale');

Route::post('/comment', 'HomeController@comment')->middleware('auth')->name('detail.comment');
//Route::get('/home', 'HomeController@index')->name('home');
