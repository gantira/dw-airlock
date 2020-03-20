<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//ROUTING YANG INGIN DIPROTECT DENGAN AIRLOCK, MAKA HARUS MENGGUNAKAN MIDDLEWARE DARI AUTH:AIRLOCK
Route::group(['middleware' => 'auth:airlock'], function () {
    //SEHINGGA SEMUA ROUTING YANG ADA DI DALAMNYA HARUS MENGIRIMKAN TOKEN
    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@store');
    Route::get('/users/tokens', 'UserController@getAllUserToken');
    Route::get('/users/delete', 'UserController@revokeToken');
});

Route::post('/login', 'UserController@login');
