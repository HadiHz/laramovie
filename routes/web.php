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

    Route::get('/movies/download-links/{id}' , 'MovieController@syncDownloadLinks')->name('admin.movies.sync_download_links');
    Route::post('/movies/download-links/{id}' , 'MovieController@updateSyncDownloadLinks')->name('admin.movies.sync_download_links');


    //serials routes
    Route::get('/serials' , 'SerialController@index')->name('admin.serials.list');
    Route::get('/serials/create', 'SerialController@create')->name('admin.serials.create');
    Route::post('/serials/create', 'SerialController@store')->name('admin.serials.store');
    Route::get('/serials/edit/{id}', 'SerialController@edit')->name('admin.serials.edit');
    Route::post('/serials/edit/{id}', 'SerialController@update')->name('admin.serials.update');
    Route::get('/serials/delete/{id}', 'SerialController@delete')->name('admin.serials.delete');

    Route::get('/serials/{serial_id}/sync-seasons' , 'SerialController@syncSeasons')->name('admin.serials.sync_seasons');


    //genre routes
    Route::get('/genres' , 'GenreController@index')->name('admin.genres.list');
    Route::get('/genres/create', 'GenreController@create')->name('admin.genres.create');
    Route::post('/genres/create', 'GenreController@store')->name('admin.genres.store');
    Route::get('/genres/edit/{id}', 'GenreController@edit')->name('admin.genres.edit');
    Route::post('/genres/edit/{id}', 'GenreController@update')->name('admin.genres.update');
    Route::get('/genres/delete/{id}', 'GenreController@delete')->name('admin.genres.delete');




    //comments routes
    Route::get('/comments','CommentController@index')->name('admin.comments.list');
    Route::get('/comments/verify/{id}/{flag}', 'CommentController@verify')->name('admin.comments.verify');
    Route::get('/comments/singleshow/{id}','CommentController@singleshow')->name('admin.comments.singleshow');
    Route::post('/comments/answer/{id}/{flag}','CommentController@answer')->name('admin.comments.answer');
    Route::get('/comments/edit/{id}','CommentController@edit')->name('admin.comments.edit');
    Route::post('/comments/update/{id}','CommentController@update')->name('admin.comments.update');
    Route::get('/comments/remove/{id}','CommentController@remove')->name('admin.comments.remove');


    //film requests route
    Route::get('/film_requests/sendMail/{id}/{flag}' , 'FilmRequestController@sendMail')->name('admin.film_request.sendMail');
    Route::get('/film_requests' , 'FilmRequestController@index')->name('admin.film_request.index');
    Route::get('/film_requests/remove/{id}','FilmRequestController@remove')->name('admin.film_request.remove');

    //contact us
    Route::get('/contact_us' , 'Contact_usController@index')->name('admin.contact_us.index');
    Route::get('/contact_us/seen/{id}' , 'Contact_usController@seen')->name('admin.contact_us.seen');
    Route::get('/contact_us/remove/{id}','Contact_usController@remove')->name('admin.contact_us.remove');

});


//Request route for test
Route::get('/send/email' , 'admin\FilmRequestController@sendMail')->name('admin.film_request.sendmail');



Route::group(['namespace' => 'Frontend'],function (){

    Route::get('/' , 'HomeController@index')->name('home');

    Route::get('/search' , 'HomeController@search')->name('search');

    Route::get('/movies' , 'MovieController@index')->name('frontend.movies.index');
    Route::get('/movies/{slug}' , 'MovieController@single')->name('frontend.movies.single');



    Route::get('/serials' , 'SerialController@index')->name('frontend.serials.index');
    Route::get('/serials/{slug}' , 'SerialController@single')->name('frontend.serials.single');




    //uri in bayad ye giri dashte bashe
    Route::post('/movie/{id}/{flag}' , 'CommentController@store')->name('frontend.comment.store');
    Route::post('/serial/{id}/{flag}' , 'CommentController@store')->name('frontend.comment.store');



    //Request Routes
    Route::get('/film_request', 'FilmRequestController@index')->name('index');
    Route::post('/film_request/store' , 'FilmRequestController@store')->name('frontend.film_request.store');


    //contact us
    Route::get('/contact_us', 'Contact_usController@index')->name('index');
    Route::post('/contact_us/store' , 'Contact_usController@store')->name('frontend.contact_us.store');

});
