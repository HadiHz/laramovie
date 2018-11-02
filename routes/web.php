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



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],function (){

    //movies routes
    Route::get('/movies' , 'MovieController@index')->name('admin.movies.list');
    Route::get('/movies/create', 'MovieController@create')->name('admin.movies.create');
    Route::post('/movies/create', 'MovieController@store')->name('admin.movies.store');
    Route::get('/movies/edit/{id}', 'MovieController@edit')->name('admin.movies.edit');
    Route::post('/movies/edit/{id}', 'MovieController@update')->name('admin.movies.update');
    Route::get('/movies/delete/{id}', 'MovieController@delete')->name('admin.movies.delete');



    //serials routes
    Route::get('/serials' , 'SerialController@index')->name('admin.serials.list');
    Route::get('/serials/create', 'SerialController@create')->name('admin.serials.create');
    Route::post('/serials/create', 'SerialController@store')->name('admin.serials.store');
    Route::get('/serials/edit/{id}', 'SerialController@edit')->name('admin.serials.edit');
    Route::post('/serials/edit/{id}', 'SerialController@update')->name('admin.serials.update');
    Route::get('/serials/delete/{id}', 'SerialController@delete')->name('admin.serials.delete');




});


Route::group(['namespace' => 'Frontend'],function (){

    Route::get('/' , 'HomeController@index')->name('home');



});
