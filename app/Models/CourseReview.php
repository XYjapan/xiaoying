<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    public $table = 'course_review';

    /**
     * 獲取當前課程的評價信息列表
     * @param $id
     * @return bool
     */
    protected static function getReview( $id )
    {
        $res = self::where('courseId', '=', $id)
            ->get();

        return !$res ? false : $res->toArray();

    }
}
