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

Route::get('/test', function () {
    return view('welcome');
});


//when authentication failed, user redirect to login route automatically
//hadi i cant speak persian , please speak english namoosan
Route::get('/login' , 'frontend\UserController@login')->name('login');
Route::post('/authenticate' , 'frontend\UserController@authenticate')->name('authenticate');



Route::group(['prefix' => 'admin', 'namespace' => 'Admin' , 'middleware' => 'auth' ],function (){

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



    //comments routes
    Route::get('/comments','CommentController@index')->name('admin.comments.list');
    Route::get('/comments/verify/{id}/{flag}', 'CommentController@verify')->name('admin.comments.verify');
    Route::get('/comments/singleshow/{id}','CommentController@singleshow')->name('admin.comments.singleshow');
    Route::post('/comments/answer/{id}','CommentController@answer')->name('admin.comments.answer');
    Route::get('/comments/edit/{id}','CommentController@edit')->name('admin.comments.edit');
    Route::post('/comments/update/{id}','CommentController@update')->name('admin.comments.update');
    Route::get('/comments/remove/{id}','CommentController@remove')->name('admin.comments.remove');




});


Route::group(['namespace' => 'Frontend'],function (){

    Route::get('/' , 'HomeController@index')->name('home');
    //uri in bayad ye giri dashte bashe
    Route::post('/movie/{id}/{flag}' , 'CommentController@store')->name('frontend.comment.store');
    Route::post('/serial/{id}/{flag}' , 'CommentController@store')->name('frontend.comment.store');


});
