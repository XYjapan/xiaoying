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
     * 根据点击量获取热门班级列表
     * @return mixed
     */
    protected function hotClassroom( $start = 0, $end = 20 )
    {
        $res = self::where('status','published')
            ->orderBy('hitNum', 'desc')
            ->offset($start)
            ->limit($end)
            ->get();

        return !$res ? false : $res->toArray();
    }


    /**
     * 最新班级列表 ID 倒序
     * @return mixed
     */
    protected function newClassroom( $start = 0, $end = 20 )
    {
        $res = self::where('status','published')
            ->orderBy('id', 'desc')
            ->offset($start)
            ->limit($end)
            ->get();

        return !$res ? false : $res->toArray();
    }


    /**
     * 获取推荐班级列表
     * 推荐班级的标识是 1 < recommended < 10000
     * @return mixed
     */
    protected static function recommendClassroom()
    {
        $res = self::where('recommended', '>', '0')->get();

        return !$res ? false : $res->toArray();
    }


    /**
     * 免费班级
     * return @array(obj)
     */
    protected static function freeClassroom()
    {
        $res = self::where('price','=','0.00')
            ->where('status','published')
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



}
