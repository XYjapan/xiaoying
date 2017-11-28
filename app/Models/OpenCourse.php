<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OpenCourse extends Model
{
    protected $table = 'open_course';

    /**
     * 获取公开课列表
     * @param string $status 发布状态 默认查询已发布课程
     * @return array
     */
    protected static function getOpenCourses($status = 'published')
    {
        $res = self::where('status', $status)
            ->get();

        if ( !$res )
        {
            return false;
        }

        $count = self::countOpenCourse(); // 公开课总条数
        $published = count($res); // 已发布条数

        $res['openClass'] = $res->toArray();
        $res['count'] = $count;
        $res['published'] = $published;

        return $res;
    }

    /**
     * 获取指定ID 的一条公开课详情
     * @param $id
     * @return aray
     */
    protected static function getOpenCourseById($id)
    {
        // 获取公开课详情
        $res = self::find($id);

        if ( !$res )
        {
            return false;
        }

        // 获取课程中的课时等详细信息
        $courseInfo = self::openCourseInfo($id);

        // 获取加入课程的学员id
        $studentIds = self::getOpenCourseStudentsIds($id);

        $data['opencourse'] = $res->toArray();
        $data['courseInfo'] = $courseInfo ? (array) $courseInfo : $courseInfo ;
        $data['studentIds'] = $studentIds;

        return $data;
    }

    /**
     * 获取课程详情 如课时、视频资源等信息...
     * @param $id
     * @return mixed
     */
    protected static function openCourseInfo($id)
    {
        $res = DB::table('open_course_lesson')
            ->where('courseId', '=', $id)
            ->first();

        // TODO: (drgon) 这里返回的是一个仅包含查询字段的对象 没有toArray方法

        // 判断并返回数据
        return empty($res) ? false : $res->toArray() ;
    }

    /**
     * 获取加入公开课的学员id
     * @param $id
     * @return mixed
     */
    protected static function getOpenCourseStudentsIds($id)
    {
        $studentIds = DB::table('open_course_member')
            ->select('userId')
            ->where('courseId', '=', $id)
            ->where('userId', '>' ,'0')
            ->get();

        $ids = null; // 准备一个空数组用来存储学员的id

        // 如果查询数据为空 返回空数组
        if ( !$studentIds )
        {
            return false;
        }

        // 转为1 维数组
        for ($i = 0; $i < count($studentIds); $i++)
        {
            $ids[] = $studentIds[$i]->userId;
        }

        return $ids;
    }

    /**
     * 获取公开课的总条数
     * @return mixed
     */
    protected static function countOpenCourse()
    {
        return self::count();
    }

}
