<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Teacher extends Model
{
    protected $table = 'user';


    // 白名单
    protected $fillable = ['nickname','email'];


    /**
     * 统计教师数量
     * @return mixed
     */
    protected static function CountTeacher()
    {
        return self::where('roles','like','%ROLE_TEACHER%')->count();
    }


    /**
     * 获取指定ID的一条数据
     * @param $id
     * @return bool
     */
    protected static function findTeacherById( $id )
    {
        // 查询数据
        $res = self::where('roles','like','%ROLE_TEACHER%')->find($id);

        // 判断并返回数据
        return !$res ? false : $res->toArray() ;
    }


    /**
     * 获取所有教师信息
     * @param array $field
     * @return mixed
     */
    protected static function getTeachersByField( array $field = [] )
    {
        // 默认查所有
        if ( !$field )
        {
            $res = self::where('roles','like','%ROLE_TEACHER%')->get();

            return !$res ? false : $res->toArray();
        }

        // 返回所有课程基本信息 serializeMode = 连载状态
        $res = self::select($field)->get();

        return !$res ? false : $res->toArray();
    }
}
