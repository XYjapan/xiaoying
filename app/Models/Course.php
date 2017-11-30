<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Course extends Model
{
    protected $table = 'course';

    // 白名单
    protected $fillable = ['title', 'subtitle', 'serializeMode'];


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
        return !$res ? false : $res->toArray();
    }

    /**
     * 获取指定ID的多条数据
     * @param $id
     * @return bool
     */
    protected static function findCourseByIds( $id )
    {
        // 查询数据
        $res = self::whereIn('id', $id)->get();

        // 判断并返回数据
        return !$res ? false : $res->toArray();
    }

    /**
     * 获取所有课程信息
     * @param array $field 可选 需要查询的字段
     * @param string $status 可选 课程状态
     * @param $parentId 可选 班级id 默认为0 查询普通课程
     * @return array or bool 若给定字段完全不匹配，则返回false，否则返回查询到的结果集
     */
    protected static function getCoursesByField( array $field = [], $status = 'published', $parentId = 0, $start = 0, $end = 20)
    {
        // 默认查所有 前端默认只显示已发布的课程
        if ( !$field )
        {
            $res = self::where('parentId', $parentId)
                ->where('status', $status)
                ->offset($start)
                ->limit($end)
                ->get();

            return !$res ? false : $res->toArray();
        }

        // 返回所有课程基本信息 serializeMode = 连载状态
        $res = self::select($field)
            ->where('parentId', $parentId)
            ->where('status', $status)
            ->offset($start)
            ->limit($end)
            ->get();

        return !$res ? false : $res->toArray();
    }


    /**
     * 根据点击量获取热门课程列表
     * @return mixed
     */
    protected function hotCourses( $start = 0, $end = 20 )
    {
        $res = self::where('parentId',0)
            ->where('status','published')
            ->orderBy('hitNum', 'desc')
            ->offset($start)
            ->limit($end)
            ->get();

        return !$res ? false : $res->toArray();
    }


    /**
     * 最新课程列表 ID 倒序
     * @return mixed
     */
    protected function newCourses( $start = 0, $end = 20 )
    {
        $res = self::where('parentId',0)
            ->where('status','published')
            ->orderBy('id', 'desc')
            ->offset($start)
            ->limit($end)
            ->get();

        return !$res ? false : $res->toArray();
    }


    /**
     * 获取推荐课程列表
     * 推荐课程的标识是 1 < recommended < 10000
     * @return mixed
     */
    protected static function recommendCourse()
    {
        $res = self::where('recommended', '>', '0')->get();

        return !$res ? false : $res->toArray();
    }


    // 1.only show published ，2.default course parentId = 0，3.classroom course parentId > 0 .
    //  So: course default only return parentId = 0.
    //  recommended > 0 是否为推荐课程 默认为0，大于0则是推荐课程

    /**
     * 获取指定分类的课程
     * @param $cateid
     * @return mixed
     */
    protected static function cateCourses( $cateid, $cateids, $start = 0, $end = 20 )
    {

        // 如果没有子分类 使用 where X = X 查询
        if (count($cateids) <= 1)
        {
            $res = self::where('categoryId', $cateid)
                ->where('parentId',0)
                ->where('status','published')
                ->offset($start)
                ->limit($end)
                ->get();

        }else{ // 如果有子分类 使用 where X in (x,x,x) 查询

            $res = self::whereIn('categoryId', $cateids)
                ->where('parentId',0)
                ->where('status','published')
                ->offset($start)
                ->limit($end)
                ->get();
        }

        return !$res ? false : $res->toArray();
    }

    /**
     * 免费课程
     * return @array(obj)
     */
    protected static function freeCourse()
    {
        $res = self::where('price','=','0')
            ->where('parentId',0)
            ->where('status','published')
            ->get();

        // 判断并返回数据
        return !$res ? false : $res->toArray() ;
    }


    /**
     * 獲取當前課程的所有老師ID
     * @param $id
     * @return bool
     */
    protected static function courseTeacher( $id )
    {
        $res = self::select('teacherIds')
            ->find($id);

        return !$res ? false : $res->toArray();
    }

    // TODO: 学员动态 course_lesson_learn 表中可根据学员ID 课程ID 课时ID 和学习状态 获取数据

}
