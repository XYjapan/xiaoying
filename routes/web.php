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

Route::get('/', 'Home\IndexController@index');


Route::any( '/login', function(){
    return app('request')->user() ? view('error','has alerady login')
                                          : view('login');
} );

Route::any( '/register', function(){
    return app('request')->user() ? view('home.index')
                                            : view('register');
} );

Route::any( '/testmail', 'Home\IndexController@testmail');

Route::any( '/menu', function(){
    return response()->json(require COMMON_PATH.'/menu.php');
} );
