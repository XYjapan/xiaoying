<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;
use App\Models\User;

class Sms extends Api
{
    public function create( Request $request )
    {
        //
        $params = $request->all();
        $key = $params['key'] ?? null;
        $phone = $params['phone'] ?? null;

        if( is_null($phone) || !is_mobile( $phone ) )
            return [ 'code'=>200, 'status'=>false, 'info'=>'无效手机号' ];

        if( User::isAliasUnique( ['verifiedMobile','=',$phone] ) !== false )
            return ['code'=>200,'status'=>false, 'info'=>'此手机号已注册'];

        if( is_null($key) )
            return ['code'=>200,'status'=>false];

        if( session($key) )
            return [
                'code'  =>  200,
                'status'=>  false,
                'info'  =>  '短信已发送！请查收',
                'remark'=>  session($key),
            ];

        // 存入session
        session([
            trim($key)  =>  [createRandStr(),$phone],
        ]);

        return [
            'code'  =>  200,
            'status'=>  true,
            'info'  =>  session($key),
        ];
    }

    public function check( Request $request )
    {

    }
}