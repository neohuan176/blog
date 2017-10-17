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
Route::group(['prefix' => '/', 'namespace' => 'Frontend','middleware'=>'cors'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/test', 'HomeController@test');
    Route::get('/admin', 'HomeController@admin');

    Route::get('/authCheck', 'AuthController@check');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/login', 'AuthController@login');
    Route::get('/getAuthInfo', 'AuthController@getAuthInfo');
});
Route::get('/test1', function(){
    return response([1,2,3,4], 200);
});