<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;

class Ajax extends Api
{
    public function index( Request $request )
    {
        //
        return response()->json(
            [
                'code'      =>  200,
                'status'    =>  'success',
                'user'      =>  \Auth::user()->name,
            ]
        );
    }
}