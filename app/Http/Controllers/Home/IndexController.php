<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\FormNotification as FormMail;

class IndexController extends Controller
{
    //
    public function index( Request $request )
    {
        return view('index');
    }

    public function testmail( Request $request )
    {
        $mail = new FormMail();
        $mail->with([
            'base_info'    =>  [
                'name'  =>  '测试',
                'tel'   =>  '15565656196',
                'xl'    =>  '本科大二',
            ],
            'from'  =>  env('APP_URL'),
        ]);
        dd( \Mail::send($mail) );
        return $mail;
    }

    public function testredis( Request $request )
    {
        dd(\PHPRedis::get());
    }

    public function test( Request $request )
    {
        return view('user.test');
    }
}
