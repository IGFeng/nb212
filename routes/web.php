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


Route::get('/',function(){
    return view('welcome');
});
Route::get('add',['uses'=>'MessageController@add']);
Route::get('login',['uses'=>'UserController@login']);
Route::any('register',['uses'=>'UserController@register']);
Route::post('edit/{id}',['uses'=>'MessageController@edit']);
Route::post('create',['uses'=>'MessageController@create']);
Route::get('trans',['uses'=>'UserController@trans']);
Route::post('admin',['uses'=>'UserController@admin']);
Route::get('logout',['uses'=>'UserController@logout']);
Route::get('treehole',['uses'=>'TreeholeController@welcome']);

Route::group(['middleware' => ['web']], function () {
    Route::get('index',['uses'=>'MessageController@index']);
    Route::get('verify/{id}',['uses'=>'UserController@verify']);
    Route::get('delete/{id}',['uses'=>'UserController@delete']);
    Route::get('settop/{id}',['uses'=>'UserController@settop']);
    Route::get('unsettop/{id}',['uses'=>'UserController@unsettop']);
    Route::get('hide/{id}',['uses'=>'UserController@hide']);
    Route::get('reply/{id}',['uses'=>'UserController@reply']);
    Route::get('thregister',['uses'=>'TreeholeController@register']);
    Route::get('thlogin',['uses'=>'TreeholeController@login']);
    Route::get('thindex',['uses'=>'TreeholeController@index']);
    Route::post('registersolve',['uses'=>'TreeholeController@registersolve']);
    Route::post('loginsolve',['uses'=>'TreeholeController@loginsolve']);
    Route::get('thadd',['uses'=>'TreeholeController@thadd']);
    Route::post('addsolve',['uses'=>'TreeholeController@addsolve']);
    Route::get('thdelete/{id}',['uses'=>'TreeholeController@delete']);
    Route::get('threply/{id}',['uses'=>'TreeholeController@reply']);
    Route::post('thedit/{id}/{nickname}/{account}',['uses'=>'TreeholeController@edit']);
    Route::get('rethdelete/{id}',['uses'=>'TreeholeController@redelete']);
    Route::get('rethreply/{id}',['uses'=>'TreeholeController@rereply']);
    Route::post('rethedit/{mid}/{nickname}/{account}',['uses'=>'TreeholeController@reedit']);
    Route::get('adminlogin',['uses'=>'TreeholeController@adminlogin']);
    Route::post('adminloginsolve',['uses'=>'TreeholeController@adminloginsolve']);
    Route::get('adminlogout',['uses'=>'TreeholeController@adminlogout']);
});



