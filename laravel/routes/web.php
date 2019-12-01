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

// TOPページ
Route::group(['namespace' => 'Home', 'prefix' => '/'], function ()
{
    Route::get('/', 'HomesController@index');
});

// TwitterOAuth認証
Route::group(['namespace' => 'Auth', 'prefix' => 'twitter'], function ()
{
    Route::get('/', 'LoginController@redirectToProvider');
    Route::get('callback', 'LoginController@handleProviderCallback');
    Route::get('logout', 'LoginController@logout');
});

// TwitterOAuth認証後のページ
Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function ()
{
    // TOP
    Route::get('/', 'DashboardsController@index');
    // ツイート関連
    Route::resource('tweets', 'TweetsController', ['only' => ['index', 'create', 'store']]);
    // テスト
    Route::get('test', 'TestsController@index');
});
