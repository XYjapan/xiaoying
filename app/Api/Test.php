<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;

class Test extends Api
{
    public function index( Request $request )
    {
        //
        dd( server() );
    }
}