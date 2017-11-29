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


Route::any( '/test', 'Test@index' );

Route::get( '/', 'Index@index' );

Route::post( '/login', 'Index@login' );
Route::post( '/register', 'Index@register' );
Route::any('/logout', 'Index@logout');


Route::any('/menu', 'Index@menu');
Route::any('/islogin', 'Index@isLogin');