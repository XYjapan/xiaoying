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
        $data = $model->findSchool([], ['id', 'name_cn'])->paginate(20);

        return response()->json($data);
    }
}