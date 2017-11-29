<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;
use App\Api\Auth\Authenticates;
use App\Api\Auth\Throttles;


class Index extends Api
{
    use Authenticates;

    public function index( Request $request )
    {
        return \Auth::user();
    }

    /**
     * @获取header部分nav列表
     * @return mixed
     */
    public function menu()
    {
        return require COMMON_PATH.'/menu.php';
    }

    /**
     * @ 检验用户是否登陆
     * @param Request $request
     * @return array
     */
    public function isLogin( Request $request )
    {
        return [
            'is_login'  =>  $request->user() ?: false
        ];
    }
}