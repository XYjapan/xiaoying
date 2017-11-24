<?php

namespace App\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

trait Authenticates
{
    /**
     * @login
     * @param Request $request
     * @return array
     */
    public function login( Request $request )
    {
        // 判断用户是否已经登陆
        if( $request->user() !== null )
            return ['code'=>200,'status'=>false, 'remark'=>'logined'];

        // 数据检验
        if( $this->validateLogin( $request ) )
//            $this->getValidateError();
        dd($this->getValidateError());

        // 执行登陆动作
        $result = ( (new User)->userLogin( $request->all() ) );

        if( is_null( $result ) )
            return ['code'=>200,'status'=>false, 'remark'=>'has not exists'];

        if( $result === false )
            return ['code'=>200,'status'=>false, 'remark'=>'password is not right'];

        return ['code'=>200,'status'=>true, 'info'=> '' ];
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

    public function validateLogin( $request )
    {
        return $this->validate(
                        $request,
                        [
                            'username'  =>  'bail|required|min:6|max:20',
                            'password'  =>  'bail|required|min:6|max:20',
                        ],
                        [
                            'username'  =>  [
                                'required'  =>  'username should not empty',
                                'min'  =>  'username length should max than 6',
                                'max'  =>  'username length should min than 30',
                            ],
                            'password'  =>  [
                                'required'  =>  'password should not empty',
                                'min'  =>  'password length should max than 6',
                                'max'  =>  'password length should min than 30',
                            ],
                        ]
                    );
    }

    public function getValidateError()
    {
        return app('validator')->errors();
    }
}