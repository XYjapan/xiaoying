<?php


if( !function_exists( 'server' ) )
{
    function server( $param = null )
    {
        // 返回全部
        if( is_null($param) )
            return app('request')->server->all();
        // 返回多值
        if( is_array($param) )
            return array_map(function($v){ return app('request')->server->get($v); }, $param);
        // 返回一个值
        return app('request')->server->get($param);
    }
}

if( !function_exists( 'findMenuList' ) )
{
    function findMenuList()
    {
        return require_once COMMON_PATH.'/menu.php';
    }
}