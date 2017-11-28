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

Route::get('/', function () {
    return view('welcome');
});


Route::any( '/login', function(){
    return app('request')->user() ? view('error','has alerady login')
                                          : view('login');
} );

Route::any( '/test', function(){
    return view('test');
} );