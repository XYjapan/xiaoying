<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class School extends Model
{
    protected $table = 'school'; // 表名

    protected static $columns = []; // 获取表中所有字段

    // 白名单
    protected $fillable = ['zhanhui', 'name_cn', 'country_name','category_school','rank_world','competition','job_offer_rate'];


    public function __construct()
    {
        // 获取表中所有字段
        self::$columns = Schema::getColumnListing($this->table);
    }


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
        return empty($res) ? false : $res->toArray() ;
    }


    /**
     * 获取详情
     * @param array $field
     * @return mixed
     */
    protected static function getSchoolsByField( array $field = [] )
    {
        // TODO: (drgon) Slowar response... Waiting for adding query conditions. case: category OR limit ...

        // 默认查所有
        if ( empty($field) )
        {
            return self::limit(10)->get()->toArray();
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

        return self::select($new_field)->limit(10)->get()->toArray();
    }
}
