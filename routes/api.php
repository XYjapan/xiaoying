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
Route::get('courses/hot', 'Courses@byHot'); // 最热课程
Route::get('courses/new', 'Courses@byNew'); // 最新课程
Route::get('course/{id}', 'Courses@findCourse'); // 课程详情
Route::get('course/cate/{cateid}', 'Courses@getCategoryCourses'); // 指定分类的课程列表

// Teacher
Route::get('teachers', 'Teachers@getTeachers'); // 教师列表
Route::get('teacher/{id}', 'Teachers@findTeacher'); // 教师个人信息

// Case
Route::get('cases', 'Cased@getCases'); // 案例列表
Route::get('case/{id}', 'Cased@findCases'); // 案例详情

// Article
Route::get('articles', 'Articles@getArticles'); // 案例列表
Route::get('article/{id}', 'Articles@findArticle'); // 案例详情

// School
Route::get('schools', 'Schools@getSchools'); // 院校列表
Route::get('school/{id}', 'Schools@findSchool'); // 院校详情