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
    return Redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'pro'], function () {
    Route::get('/pro', 'ProController@index')->name('pro');
    Route::post('/postDispo', 'ProController@postDispo')->name('postDispo');
});

Route::group(['middleware'=>'admin'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
});

Route::group(['middleware'=>'user'], function () {
    Route::get('/user', 'ListDispoController@getDispos')->name('user');
}
);
