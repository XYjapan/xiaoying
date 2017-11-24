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

// Course
Route::get('courses', 'Courses@getCourses'); // 课程列表
Route::get('course/{id}', 'Courses@findCourse'); // 课程详情

// Teacher
Route::get('teachers', 'Teachers@getTeachers'); // 教师列表
Route::get('teacher/{id}', 'Teachers@findTeacher'); // 教师个人信息

// Case
Route::get('cases', 'Cased@getCases'); // 案例列表
Route::get('case/{id}', 'Cased@findCases'); // 案例详情