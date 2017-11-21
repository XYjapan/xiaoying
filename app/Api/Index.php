<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;

class Index extends Api
{
    public function index( Request $request )
    {
        //
        dd(server());
        return view('home');
    }

    public function menu( Request $request )
    {
        //
        return response()->json( findMenuList() );
    }


}