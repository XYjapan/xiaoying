<?php


if( !function_exists('DP') )
{
    function DP( $params = null )
    {
        if( is_null( $params ) )
            exit;
        echo '<pre>';
        var_dump( $params );
        exit;
    }
}

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

if( !function_exists( 'is_mobile' ) )
{
    function is_mobile( $tel )
    {
        if( strlen( $tel ) !== 11 )
            return FALSE;
        //手机号码验证
        $pattern = "/^(1(([35][0-9])|(47)|[8][01236789]))\d{8}$/";
        if( preg_match( $pattern, $tel ) === 1 )
            return true;
        return FALSE;
    }
}

if( !function_exists( 'is_email' ) )
{
    function is_email( $email )
    {
        $email = is_array($email) ?: ['email'=>$email];
        return \Validator::make(
            $email,
            [
                'email' =>  'required|email',
            ]
        )->fails() ? false : true;
    }
}

if( !function_exists( 'createRandStr' ) )
{
    /**
     * @param int $length  长度
     * @param int $type     类型 1.数字、字符串  2.纯英文字符  3.纯数字
     * @return mixed
     */
    function createRandStr( $length = 6, $type = 1 )
    {
        $res = require_once COMMON_PATH.'/character.php';

        $rankAll = $res[(int)$type];
        for( $i=0;$i<$length;$i++ )
        {
            $resultArray[$i] = $rankAll[array_rand( $rankAll, 1 )];
        }
        return implode('',$resultArray);
    }
}
