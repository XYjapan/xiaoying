<?php
namespace App\Api\Home;

use Illuminate\Http\Request;
use App\Api\Controller;

class Index extends Controller
{
    public function index( Request $request )
    {
        //
        dd( now() );
    }
}