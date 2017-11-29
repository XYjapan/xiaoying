<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassroomCourse extends Model
{
    public $table = 'classroom_courses';

    protected static function classroomCourseIds($id)
    {
        $res = self::select('courseId')
            ->where('classroomId', '=', $id)
            ->orderBy('seq')
            ->get();
        return !$res ? false : $res->toArray();
    }
}
