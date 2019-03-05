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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/update','HomeController@postupdate');
Route::get('/home/delete/{id}','HomeController@hapus')->name('/home/delete/{id}');
Route::post('/ubah','HomeController@ubah');

Route::post('/adduser','tambahusercontroller@tambahu')->name('adduser');
Route::get('/get-data','tambahusercontroller@kk')->name('get-data');


