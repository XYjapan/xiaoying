<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Api\Api;

class Code extends Api
{
    public function index( Request $request )
    {
        //
        
    }

    public function fetch( Request $request )
    {
        //
        $key = $request->query->get('key');
        if( !$key )
            return [
                'status'=>false,
            ];
        $code = createRandStr(4, 1);
        session([
            $key    =>  $code,
        ]);
        return [
            'status'=>true,'code'=>session($key),
        ];
    }

    public function check( Request $request )
    {
        // 获取参数
        $params = $request->all();
        $code = $params['code'] ?? null;
        $key = $params['key'] ?? null;

        if( is_null( $key ) )
            return [ 'code'=>200,'status'=>false ];

        if( session($key) === $code )
            return [ 'code'=>200, 'status'=>true ];

        return [ 'code'=>200,'status'=>false ];
    }
}