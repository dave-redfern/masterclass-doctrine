<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/',           ['as' => 'index',      'uses' => 'IndexController@index']);
    Route::get('/story/{id}', ['as' => 'story.show', 'uses' => 'StoryController@show']);

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
        Route::post('store', ['as' => 'store',  'uses' => 'UserController@store']);

        Route::get('login',  ['as' => 'login',      'uses' => 'UserController@login']);
        Route::post('auth',  ['as' => 'login.auth', 'uses' => 'UserController@postLogin']);
        Route::get('logout', ['as' => 'logout',     'uses' => 'UserController@logout']);
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/story/create',        ['as' => 'story.create',  'uses' => 'StoryController@create']);
        Route::post('/story/store',        ['as' => 'story.store',   'uses' => 'StoryController@store']);
        Route::post('/comment/{id}/store', ['as' => 'comment.store', 'uses' => 'CommentController@store']);

        Route::get('/user/account', ['as' => 'user.account.show',   'uses' => 'UserController@account']);
        Route::post('/user/update', ['as' => 'user.account.update', 'uses' => 'UserController@update']);
    });

});
