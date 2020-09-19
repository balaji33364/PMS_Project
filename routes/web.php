<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingsController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','PagesController@index');
//Route::get('/','BookingsController@index');

Route::get('/about', 'PagesController@about');

Route::get('services',  'PagesController@services');

Route::resource('posts','PostController');
Route::resource('Bookings','BookingsController');

//Route::get('index/{id}','BookingsController@show');
//Route::get('index/{id}','BookingsController@store')

Route::get('/CheckRequest','BookingsController@index');
Route::get('tk/{id}/{flag}','BookingsController@edit');
//Route::get('/CheckRequest',function(){
//	return view('/posts.CheckRequest');
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');