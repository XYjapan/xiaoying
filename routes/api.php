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

/**
 * @登陆、注册、退出
 */
Route::post( '/login', 'Index@login' );
Route::post( '/register', 'Index@register' );
Route::any('/logout', 'Index@logout');

/**
 * @导航菜单、是否登陆、是否注册
 */
Route::any('/menu', 'Index@menu');
Route::any('/islogin', 'Index@isLogin');
Route::any('/isRegister', 'Index@isRegister');

/**
 * @短信接口, 验证码
 */
Route::post('/createsms','Sms@create');
Route::post('/checksms','Sms@check');
Route::any('/fetchcode','Code@fetch');
Route::any('/checkcode','Code@check');