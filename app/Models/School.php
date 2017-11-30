<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class School extends Model
{
    protected $table = 'school'; // 表名


    // 白名单
    protected $fillable = ['zhanhui', 'name_cn', 'country_name','category_school','rank_world','competition','job_offer_rate'];


    /**
     * 统计数量
     * @return mixed
     */
    protected static function CountSchools()
    {
        return self::count('id');
    }


    /**
     * 获取指定ID的一条数据
     * @param $id
     * @return bool
     */
    protected static function findSchoolById( $id )
    {
        // 查询数据
        $res = self::find($id);

        // 判断并返回数据
        return !$res ? false : $res->toArray() ;
    }


    /**
     * 获取详情
     * @param array $field
     * @return mixed
     */
    protected static function getSchoolsByField( array $field = [], $start = 0, $end = 20 )
    {
        // 默认查所有
        if ( !$field )
        {
            $res = self::offset($start)
                ->limit($end)
                ->get();

            return !$res ? false : $res->toArray();
        }

        // 查询指定字段
        $res = self::select($field)
            ->offset($start)
            ->limit($end)
            ->get();

        return !$res ? false : $res->toArray();
    }
}
