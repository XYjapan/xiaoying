<?php
namespace App\Api;

use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use App\Api\Api;
Use App\Models\User;

class Index extends Api
{
    public function index( Request $request )
    {
        //
        return 'Api...Index...index';
    }

    public function login( Request $request )
    {
        // 判断用户是否已经登陆
        if( $request->user() !== null )
            return ['code'=>200,'status'=>false];

        // 数据检验
        $data = $request->all();

        if( \Validator::make( $data, [
            'username'  =>  'required|min:6|max:20',
            'password'  =>  'required|min:6|max:20',
        ] )->fails() === true )
            return ['code'=>200,'status'=>false];

        // 执行登陆动作
        if( $result = (new User)->userLogin( $data ) )
        {
            return 'Yes';
        }
        return 'No';
    }

    public function register( Request $request )
    {
        // 判断用户是否已经登陆
        if( $request->user() !== null )
            return ['code'=>200,'status'=>false];

        return 'haha';
    }
}