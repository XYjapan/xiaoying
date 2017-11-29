<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
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
        $res = self::get();

        return !$res ? false : $res->toArray();
    }

}
