<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'], function(){
    Route::get('/', 'UserController@index')->name('user');
    Route::post('/', 'UserController@store')->name('user.store');
    Route::put('/{id}', 'UserController@update')->name('user.update');
    Route::delete('/{id}', 'UserController@delete')->name('user.delete');
});

Route::group(['prefix' => 'projects'], function(){
    Route::get('/', 'ProjectController@index');
    Route::post('/', 'ProjectController@store');
    Route::get('/{id}', 'ProjectController@show');
    Route::put('/{project}', 'ProjectController@markAsCompleted');
});

Route::post('tasks', 'TaskController@store');
Route::put('tasks/{task}', 'TaskController@markAsCompleted');

