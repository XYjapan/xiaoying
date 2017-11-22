<?php
namespace App\Api;

use Illuminate\Http\Request;
use Auth;

class Index extends Api
{
    public function index( Request $request )
    {
        dd( $request->user()->name );
        return response()->json(['name'=>'laozhou']);
    }

    public function menu( Request $request )
    {
        //
        return response()->json( findMenuList() );
    }
}