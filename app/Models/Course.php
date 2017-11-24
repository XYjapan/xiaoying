<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Course extends Model
{
    protected $table = 'course';

    protected static $columns = [];

    // 白名单
    protected $fillable = ['title', 'subtitle', 'serializeMode'];


    public function __construct()
    {
        // 获取表中所有字段
        self::$columns = Schema::getColumnListing($this->table);

    }

    /**
     * 统计课程数量
     * @return mixed
     */
    protected static function CountCourse()
    {
        return self::count();
    }


    /**
     * 获取指定ID的一条数据
     * @param $id
     * @return bool
     */
    protected static function findCourseById( $id )
    {
        // 查询数据
        $res = self::find($id);

        // 判断并返回数据
        return empty($res) ? false : $res->toArray() ;
    }


    /**
     * 获取所有课程信息
     * @param array $field
     * @return mixed
     */
    protected static function getCoursesByField( array $field = [] )
    {
        // 默认查所有
        if ( empty($field) )
        {
            return self::get()->toArray();
        }

        // 过滤非法字段
        $new_field = array_filter($field, function ($val){
            return in_array($val, self::$columns) ? $val : null ;
        });

        // 查询字段为空
        if ( empty($new_field) )
        {
            return false;
        }

        // 返回所有课程基本信息 serializeMode = 连载状态
        return self::select($new_field)->get()->toArray();
    }


    /**
     * 根据点击量获取热门课程列表
     * @return mixed
     */
    protected function hotCourses()
    {
        return self::orderBy('hitNum', 'desc')->get()->toArray();
    }


    /**
     * 最新课程列表 ID 倒序
     * @return mixed
     */
    protected function newCourses()
    {
        return self::orderBy('id', 'desc')->get()->toArray();
    }


    /**
     * 课程分类列表
     * @return mixed
     */
    protected function cateList()
    {
        return DB::table('category')->get();
    }


    // TODO: 1.only show published ，2.default course parentId = 0，3.classroom course parentId > 0 .
    // TODO: So: course default only return parentId = 0.

    protected static function cateCourses( $cateid )
    {
        $res = self::where('categoryId', $cateid)->where('parentId',0)->where('status','published')->get()->toArray();

        dd($res);
    }

}
