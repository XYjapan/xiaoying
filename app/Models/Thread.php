<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public $table = 'thread';

    protected static function getTopic( $id )
    {
        $res = self::where('targetId', '=', $id)->get();

        return !$res ? false : $res->toArray();
    }

}
