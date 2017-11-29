<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassroomReview extends Model
{
    public $table = 'classroom_review';

    protected static function getReview( $id )
    {
        $res = self::where('classroomId', '=', $id)->get();

        return !$res ? false : $res->toArray();
    }

}
