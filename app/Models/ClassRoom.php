<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{

    protected $table = 'classroom';
    protected static $status = 'published';

    /**
     * 获取教室列表
     * @return bool
     */
    protected static function getClassRooms($start = 0, $end = 20)
    {
        $res = self::where('status', '=' , self::$status)
            ->offset($start)
            ->limit($end)
            ->get();

        // 判断并返回数据
        return !$res ? false : $res->toArray() ;
    }


    /**
     * 获取指定id的教室信息
     * @param $id
     * @return bool
     */
    protected static function findClassRoom($id)
    {
        $res = self::where('status', '=', self::$status)
            ->find($id);

        // 判断并返回数据
        return !$res ? false : $res->toArray() ;

    }

    // TODO: (drgon) 教室表 <-> 教室课程表 <-> 课程表 定义关联模型，一对多。
    // TODO: 班级评价 教室表 <-> 评价表(classroom_review) 一对多。
    protected static function getClassRoomCourses($id)
    {
        $res = null;
    }

}
