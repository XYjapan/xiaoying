<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class School extends Model
{
    //
    protected $table = 'school';
    protected $fields = '';

    public function findSchool( Array $where, $fields )
    {
        return $this->_createQueryBulider( $where, $fields );
    }


    protected function _createQueryBulider( Array $where, Array $fields )
    {
        return DB::table( $this->table )
                        ->where( $where )
                        ->select( ...$fields );
    }
}
