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

Route::get('/', function () {
    return view('welcome');
});

//Route chức năng crawler dữ liệu html sử dụng html_dom
Route::get('getfile','DataController@getfile')->name('getfile');
Route::post('getfile','DataController@postfile')->name('postfile');

//Route test chức năng kết nối mysql và sqlsrv
Route::get('showthsx','DataController@showthsx');
Route::get('showdata','DataController@show')->name('show');
Route::post('showdata','DataController@postshow');
