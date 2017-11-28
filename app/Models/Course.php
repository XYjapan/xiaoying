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
     * @param array $field 可选 需要查询的字段
     * @param string $status 可选 课程状态
     * @param $parentId 可选 班级id 默认为0 查询普通课程
     * @return array or bool 若给定字段完全不匹配，则返回false，否则返回查询到的结果集
     */
    protected static function getCoursesByField( array $field = [], $status = 'published', $parentId = 0, $start = 0, $end = 20)
    {
        // 默认查所有 前端默认只显示已发布的课程
        if ( empty($field) )
        {
            return self::where('parentId', $parentId)
                ->where('status', $status)
                ->limit($start, $end)
                ->get()->toArray();
        }

        // 过滤非法字段
        $new_field = array_filter($field, function ($val){
            return in_array($val, self::$columns) ? $val : null ;
        });

        // 给定的查询字段 过滤后为空
        if ( empty($new_field) )
        {
            return false;
        }

        // 返回所有课程基本信息 serializeMode = 连载状态
        return self::select($new_field)
            ->where('parentId', $parentId)
            ->where('status', $status)
            ->limit($start, $end)
            ->get()->toArray();
    }


    /**
     * 根据点击量获取热门课程列表
     * @return mixed
     */
    protected function hotCourses( $start = 0, $end = 20 )
    {
        return self::where('parentId',0)
            ->where('status','published')
            ->orderBy('hitNum', 'desc')
            ->limit($start, $end)
            ->get()->toArray();
    }


    /**
     * 最新课程列表 ID 倒序
     * @return mixed
     */
    protected function newCourses( $start = 0, $end = 20 )
    {
        return self::where('parentId',0)
            ->where('status','published')
            ->orderBy('id', 'desc')
            ->limit($start, $end)
            ->get()->toArray();
    }


    /**
     * 课程分类列表
     * @return mixed
     */
    protected static function cateList()
    {
        return DB::table('category')->get();
    }

    /**
     * 获取推荐课程列表
     * 推荐课程的标识是 1 < recommended < 10000
     * @return mixed
     */
    protected static function recommendCourse()
    {
        return self::where('recommended', '>', '0')->get()->toArray();
    }


    // 1.only show published ，2.default course parentId = 0，3.classroom course parentId > 0 .
    //  So: course default only return parentId = 0.
    //  recommended > 0 是否为推荐课程 默认为0，大于0则是推荐课程

    /**
     * 获取指定分类的课程
     * @param $cateid
     * @return mixed
     */
    protected static function cateCourses( $cateid, $start = 0, $end = 20 )
    {

        // 若当前分类下包含子分类，则使用in查询当前分类及子分类的所有课程
        $cateList = self::cateList();

        $len = count($cateList); // 分类总个数

        for ($i=0; $i<$len; $i++)
        {
            if ($cateList[$i]->parentId == $cateid)
            {
                $cateid .= ','.$cateList[$i]->id;
            }
        }

        // 当前分类与其子分类的结果集
        $cateids = explode(',', $cateid);

        // 如果没有子分类 使用 where X = X 查询
        if (count($cateids) <= 1)
        {
            $res = self::where('categoryId', $cateid)
                ->where('parentId',0)
                ->where('status','published')
                ->limit($start, $end)
                ->get()->toArray();
        }else{ // 如果有子分类 使用 where X in (x,x,x) 查询
            $res = self::whereIn('categoryId', $cateids)
                ->where('parentId',0)
                ->where('status','published')
                ->limit($start, $end)
                ->get()->toArray();
        }

        return $res;
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
        return empty($res) ? false : $res->toArray() ;
    }

    // TODO: 课时列表  课程表(course) <-> 课时表(course_lesson) 一对多
    // TODO: 课程评价  课程表(course) <-> 评价表(course_review) 一对多
    // TODO: 课程笔记  课程表(course) <-> 笔记表(course_note) 一对多

}
