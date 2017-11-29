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

// 首页
Route::get('/', function (){
    return 'api.default';
});

// Course
Route::get('/course', 'Courses@getCourses'); // 课程列表
Route::get('/course/hot', 'Courses@byHot'); // 最热课程
Route::get('/course/new', 'Courses@byNew'); // 最新课程
Route::get('/course/recommend', 'Courses@getRecommend'); // 推荐课程列表
Route::get('/course/free', 'Courses@getFreeCourse'); // 免费课程列表
Route::get('/course/{id}', 'Courses@findCourse'); // 课程详情
Route::get('/course/cate/{cateid}', 'Courses@getCategoryCourses'); // 指定分类的课程列表

// ClassRoom
Route::get('/classroom', 'ClassRooms@getClassRooms'); // 班级列表
Route::get('/classroom/{id}', 'ClassRooms@findClassRoom'); // 班级详情

// OpenCourse
Route::get('/opencourse', 'openCourses@getOpenCourses'); // 公开课列表
Route::get('/opencourse/{id}', 'OpenCourses@getOpenCourseById'); // 公开课详情

// Teacher
Route::get('/teacher', 'Teachers@getTeachers'); // 教师列表
Route::get('/teacher/{id}', 'Teachers@findTeacher'); // 教师个人信息

// Case
Route::get('/case', 'Cased@getCases'); // 案例列表
Route::get('/case/{id}', 'Cased@findCases'); // 案例详情

// Article
Route::get('/article', 'Articles@getArticles'); // 案例列表
Route::get('/article/{id}', 'Articles@findArticle'); // 案例详情

// School
Route::get('/school', 'Schools@getSchools'); // 院校列表
Route::get('/school/{id}', 'Schools@findSchool'); // 院校详情