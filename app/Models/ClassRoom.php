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
    protected static function getClassRooms()
    {
        $res = self::where('status', '=' , self::$status)
            ->get();

        // 判断并返回数据
        return empty($res) ? false : $res->toArray() ;
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
        return empty($res) ? false : $res->toArray() ;

    }

    // TODO: (drgon) 教室表 <-> 教室课程表 <-> 课程表 定义关联模型，一对多。
    protected static function getClassRoomCourses($id)
    {
        $res = null;
    }

}
