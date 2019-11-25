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

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('city',         'CityController')->middleware('auth');
Route::resource('contact',      'ContactController')->middleware('auth');
Route::resource('customer',     'CustomerController')->middleware('auth');
Route::resource('district',     'DistrictController')->middleware('auth');
Route::resource('receipt',      'ReceiptController')->middleware('auth');
Route::resource('refference',   'RefferenceController')->middleware('auth');
Route::resource('report',       'ReportController')->middleware('auth');
Route::resource('sale',         'SaleController')->middleware('auth');
Route::resource('supplier',     'SupplierController')->middleware('auth');
Route::resource('product',      'ProductController')->middleware('auth');

Auth::routes(['verify' => true]);

// test
Route::get('/admin', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

// test
Route::get('/manager', ['middleware' => ['auth', 'manager'], function() {
    return "this page requires that you be logged in and an Manager";
}]);