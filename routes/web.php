<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/get-images', 'HomeController@getImages');
Route::get('/upload', 'UploadController@index')->name('upload');
Route::post('/upload', 'UploadController@upload');
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/approve', 'AdminController@getImages');
    Route::post('/{image}/approve', 'AdminController@approveImage');
});
Route::middleware('auth')->group(function () {
    Route::get('/favorites', 'FavoriteController@index')->name('favorites');
    Route::post('/{image}/add-to-favorite', 'FavoriteController@addToFavorite');
});
