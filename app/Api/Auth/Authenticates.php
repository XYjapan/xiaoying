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
        if( $this->attemptLogin( $request ) )
        {
            return ['code'=>200,'status'=>true, 'info'=>$request->user()];
        }

        // 登陆失败 尝试次数自增
        $this->incrementLoginAttempts( $request );

        return ['code'=>200,'status'=>false, 'info'=>'用户名或密码错误'];
    }

    /**
     * @register
     * @param Request $request
     * @return array|string
     */

    public function logout( Request $request )
    {
        dd( $request->user() );
        $this->guard()->logout();

    }

    public function register( Request $request )
    {
        // 判断用户是否已经登陆
        if( $request->user() !== null )
            return ['code'=>200,'status'=>false];

        return 'haha';
    }

    /**
     * @ 尝试登陆方法
     * @param Request $request
     * @return bool
     */
    protected function attemptLogin( Request $request )
    {
        return $this->guard()->attempt(
                                $this->getCredentials( $request ),
                                $request->filled( 'remember' )
                            );
    }

    /**
     * @ 获取客户端登陆信息
     * @param Request $request
     * @return array
     */
    protected function getCredentials( Request $request )
    {
        $fetch =  $request->only( $this->username(), 'password' );
        $truename = $this->trueusername();
        return [
            $truename   =>  $fetch['username'],
            'password'  =>  $fetch['password'],
        ];
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

    /**
     * @return string
     */
    public function trueusername()
    {
        // 获取用户别名值
        $params = app('request')->all('username');
        $username = $params['username'];

        // 判断是哪种方式登陆
        if( is_mobile($username) )
            return 'verifiedMobile';

        if( is_email($username) )
            return 'email';

        return 'nickname';
    }
}