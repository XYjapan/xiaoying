<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;
use App\Models\School as Model;
class School extends Api
{
    public function index( Request $request, $p = 1 )
    {
        //
        $model = new Model;
        $data = $model->findSchool([['id', '<', 50]], ['id', 'name_cn']);

        return response()->json($data);
    }
}