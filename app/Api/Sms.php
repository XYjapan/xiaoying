<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;

class Sms extends Api
{
    public function index( Request $request )
    {
        //
        $params = $request->all();
        $key = $params['key'];

        if( !$key )
            return ['code'=>200,'status'=>false];

        if( session($key) )
            return [
                'code'  =>  200,
                'status'=>  true,
                'info'  =>  session($key),
            ];

        // 存入session
        session([
            trim($key)  =>  createRandStr(),
        ]);

        return [
            'code'  =>  200,
            'status'=>  true,
            'info'  =>  session($key),
        ];
    }
}