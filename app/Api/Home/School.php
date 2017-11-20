<?php
namespace App\Api\Home;

use Illuminate\Http\Request;
use App\Api\Controller;
use App\Models\School as Model;
use DB;

class School extends Controller
{
    public function index( Request $request )
    {
        //  ?? === isset() $$ !is_null()
        $model = new Model;
        dd($model->select());
    }
}