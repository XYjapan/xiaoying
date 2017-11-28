<?php

namespace App\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Api\Requests\CheckLoginParams;


trait Authenticates
{
    use Throttles;
    /**
     * @login
     * @param Request $request
     * @return array
     */
    public function login( CheckLoginParams $request )
    {
        // 判断用户是否已经登陆
        if( $request->user() !== null )
            return ['code'=>200,'status'=>false, 'remark'=>'你已经登陆'];

        // 判断是否可能为攻击
        if( $this->isMyBeAttack( $request ) )
        {
            $this->fireLockoutEvent( $request );

            return $this->sendLockoutResponse($request);
        }

        // 尝试登陆
        $result = ( (new User)->userLogin( $request->all() ) );

        if( $result )
        {
            // 密码匹配成功
            dd( $this->guard() );
        }

        // 登陆失败 尝试次数自增
        $this->incrementLoginAttempts( $request );

        if( is_null( $result ) )
            return ['code'=>200,'status'=>false, 'remark'=>'用户名不存在'];

        if( $result === false )
            return ['code'=>200,'status'=>false, 'remark'=>'密码错误'];
    }

    /**
     * @register
     * @param Request $request
     * @return array|string
     */
    public function register( Request $request )
    {
        // 判断用户是否已经登陆
        if( $request->user() !== null )
            return ['code'=>200,'status'=>false];

        return 'haha';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}