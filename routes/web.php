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
    //return view('welcome');
    $sba = file_get_html("C:/Users/VanThu/Downloads/SBA_t5.html");
	echo $sba;
});
Route::get('showthsx','DataController@showthsx');
Route::get('showdata','DataController@show')->name('show');
Route::post('showdata','DataController@postshow');
