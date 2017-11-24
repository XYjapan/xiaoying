<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;
use App\Api\Auth\Authenticates;
use App\Api\Auth\Throttles;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class Index extends Api
{
    use Authenticates,Throttles;

    public function index( Request $request )
    {
        return \Auth::user();
    }

}