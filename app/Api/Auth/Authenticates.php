<?php

namespace App\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Api\Requests\CheckLoginParams;
use App\Api\Requests\CheckRegisterParams;


trait Authenticates
{
    use Throttles,resolveRegister;

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
     * @ 退出登陆
     * @param Request $request
     */
    public function logout( Request $request )
    {
        if( !$request->user() )
            return ['code'=>200,'status'=>false,'info'=>'未登录无法退出'];
        $this->guard()->logout();
    }

    /**
     * @register
     * @param Request $request
     * @return array|string
     */
    public function register( CheckRegisterParams $request )
    {
        $params = $request->all();

        // 验证验证码
        if( $params['code'] != session('web_register_code') )
            return ['code'=>200,'status'=>false, 'info'=>'验证码错误！'];

        // 验证两次手机号是否一致  获取短信信息=本次提交
        $sms_info = session('web_register_sms');
        if( $params['phone'] != $sms_info[1] )
            return ['code'=>200,'status'=>false, 'info'=>'手机号码不一致'];

        // 手机短信验证
        if( $params['sms'] != $sms_info[0] )
            return ['code'=>200,'status'=>false, 'info'=>'短信验证码错误'];

        // 获取registerCredentials
        $credentials = $this->registerCredentials( $request );

        // 证书符合唯一性
        if( ! $this->isRegisterCredentialUnique( $request ) )
            return ['code'=>200,'status'=>false, 'info'=>'用户名已存在'];

        // write
        if( !$this->registerWrite( $credentials ) )
            return ['code'=>200,'status'=>false, 'info'=>'系统维护'];
        // 注册后置处理
        $this->afterRegister( $request );

        return ['code'=>200,'status'=>true];
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
     * @ 转化真正用户名 key
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