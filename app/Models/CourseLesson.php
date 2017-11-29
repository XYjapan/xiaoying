<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{

    public $table = 'course_lesson';


    /**
     * 獲取指定課程所包含的課時列表
     * @param $id
     * @return bool
     */
    protected static function getLessons( $id )
    {
        $res = self::where('courseId', '=', $id)
            ->get();

        return !$res ? false : $res->toArray();
    }
}
