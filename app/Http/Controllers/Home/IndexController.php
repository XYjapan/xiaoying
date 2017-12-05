<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\FormNotification;

class IndexController extends Controller
{
    //
    public function index( Request $request )
    {
        return view('index');
    }

    public function test( Request $request )
    {
        dd(\Mail::to('709115808@qq.com')->send(new FormNotification()));
    }
}
