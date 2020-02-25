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

use App\Http\Controllers\MessageController;

Route::get('/',function(){
    return view('welcome');
});
Route::get('add',['uses'=>'MessageController@add']);
Route::get('login',['uses'=>'UserController@login']);
Route::post('register',['uses'=>'UserController@register']);
Route::post('edit/{id}',['uses'=>'MessageController@edit']);
Route::post('create',['uses'=>'MessageController@create']);
Route::get('trans',['uses'=>'UserController@trans']);
Route::post('admin',['uses'=>'UserController@admin']);
Route::get('logout',['uses'=>'UserController@logout']);
Route::group(['middleware' => ['web']], function () {
    Route::get('index',['uses'=>'MessageController@index']);
    Route::get('verify/{id}',['uses'=>'UserController@verify']);
    Route::get('delete/{id}',['uses'=>'UserController@delete']);
    Route::get('settop/{id}',['uses'=>'UserController@settop']);
    Route::get('unsettop/{id}',['uses'=>'UserController@unsettop']);
    Route::get('hide/{id}',['uses'=>'UserController@hide']);
    Route::get('reply/{id}',['uses'=>'UserController@reply']);
});



