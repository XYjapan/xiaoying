<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class TestController extends Controller
{
    //
    public function index( Request $request )
    {
        $data = [
            'username'      =>  '18300705320',
            'password'      =>  'luke9919',
            'tel'           =>  '18300705320',
            'email'         =>  'zgs5999@163.com',
        ];
        $model = new User;
        $result = $model->userLogin($data);
        if( is_null($result) )
            return 'user do not exists';
        if( !$result )
            return 'password is not right';

        dd( $result );
    }

    public function ajax( Request $request )
    {
        return view('ajax');
    }
}

