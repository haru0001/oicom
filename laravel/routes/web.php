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
Route::group(['namespace' => 'Home'], function ()
{
    Route::group(['prefix' => '/'], function ()
    {
        Route::get('/', 'HomesController@index');
    });
});

// TwitterOAuth認証
Route::group(['namespace' => 'OAuth'], function ()
{
    Route::group(['prefix' => 'twitter'], function ()
    {
        Route::get('/', 'TwitterLoginController@oauth');
        Route::get('callback', 'TwitterLoginController@callback');
    });
});

// TwitterOAuth認証後のページ
Route::group(['namespace' => 'Dashboard'], function ()
{
    Route::group(['prefix' => 'dashboard'], function ()
    {
        // TOP
        Route::get('/', 'DashboardsController@index');
        // ツイート関連
        Route::resource('tweet', 'TweetsController', ['only' => ['index', 'create', 'store']]);
        // テスト
        Route::get('test', 'TestsController@index');
    });
});

