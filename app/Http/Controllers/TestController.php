<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index( Request $request )
    {
//        dd( parent::getMiddleware() );
        dd( session() );
    }

    public function ajax( Request $request )
    {
        return view('ajax');
    }
}
