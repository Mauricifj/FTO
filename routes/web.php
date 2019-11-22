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
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('city',         'CityController');
Route::resource('contact',      'ContactController');
Route::resource('customer',     'CustomerController');
Route::resource('district',     'DistrictController');
Route::resource('receipt',      'ReceiptController');
Route::resource('refference',   'RefferenceController');
Route::resource('report',       'ReportController');
Route::resource('sale',         'SaleController');
Route::resource('supplier',     'SupplierController');
Route::resource('product',      'ProductController');

Auth::routes(['verify' => true]);

