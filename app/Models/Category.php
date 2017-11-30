<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $table = 'category';


    public static function courses()
    {
        return self::hasMany('App\Models\Course', 'categoryId');
    }
    

    /**
     * 分类列表
     * @return mixed
     */
    public static function cateList()
    {
        // 一级分类
        $parent = self::where('parentId', '=', 0)->where('groupId', '=', 1)->get();

        // 二级分类
        $son = self::where('parentId', '>', 0)->where('groupId', '=', 1)->get();

        // 拼接数据
        $res['parent'] = !$parent ? null : $parent->toArray();
        $res['son'] = !$son ? null : $son->toArray();

        return !$res ? false : $res;
    }


}
