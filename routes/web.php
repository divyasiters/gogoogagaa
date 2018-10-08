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
})->name('main.page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('login', 'Auth\LoginController@login')->name('admin.login');
    Route::post('login', 'Auth\LoginController@postLogin');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::resource('categories', 'CategoriesController');
    });
});