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
use App\Http\Middleware\CheckAge;

Route::get('/', function () {
    return view('welcome');
})->middleware(CheckAge::class);
Route::get('/tracy',function() {
    throw new \ Exception('Tracy works!');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'login/social'],function(){
    Route::get('{provider}/redirect', 'Auth\loginController@redirectToProvider')->name('social.redirect');
    Route::get('{provider}/callback', 'Auth\loginController@handleProviderCallback')->name('social.callback');
});