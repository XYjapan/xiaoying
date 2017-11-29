<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'cases';

    // 白名单
    protected $fillable = ['univ', 'comid', 'name','title'];


    /**
     * 统计数量
     * @return mixed
     */
    protected static function CountCases()
    {
        return self::count();
    }


    /**
     * 获取指定ID的一条数据
     * @param $id
     * @return bool
     */
    protected static function findCasesById( $id )
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
    protected static function getCasesByField( array $field = [], $start = 0, $end = 20 )
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
