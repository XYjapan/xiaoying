<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseNote extends Model
{
    public $table = 'course_note';


    /**
     * 获取当前课程下的笔记列表
     * @param $id
     * @return bool
     */
    protected static function getNotes( $id )
    {
        $res = self::where('courseId', '=', $id)
            ->get();

        return !$res ? false : $res->toArray();
    }

}
