<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    protected $table = 'user';

    /**
     * @ 最终验证
     * @param $user
     * @param $credentials
     */
    public function validateCredentials( $user, $credentials )
    {
        // 原始信息
        $original = $user->attributes;
        // 客户端密码
        $clientpassword = $credentials['password'];

        return ( self::generatePassword( $clientpassword, $original['salt'] ) === $original['password'] );
    }

    /**
     * @ 用户注册
     * @param array $data
     * @return bool
     */
    public function userRegister( Array $data )
    {
        // 生成盐
        $salt = self::createSalt();
        // 最终密码生成
        $pass = self::generatePassword( $data['password'], $salt );

        $insert['nickname'] = $data['username'];
        $insert['password'] = $pass;
        $insert['salt'] = $salt;
        $insert['email'] = $data['email'];
        $insert['verifiedMobile'] = $data['tel'];

        return ( DB::table( $this->table )->insert( $insert ) );
    }

    /**
     * @生成盐字符串
     * @return string
     */
    private static function createSalt()
    {
        return self::$salt ?    self::$salt
            :    self::$salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    /**
     * @生成最终密码
     * @param $password
     * @param $salt
     */
    private static function generatePassword( $password, $salt )
    {
        // 初始密码加盐
        $saltedpassword = self::addSalt( $password, $salt );
        // hash 处理
        return self::byHashed( $saltedpassword );
    }

    /**
     * @ 初始密码加盐
     * @param $password
     * @param $salt
     * @return string
     */
    private static function addSalt( $password, $salt )
    {
        return $password.'{'.$salt.'}';
    }

    /**
     * @ hash处理
     * @param $salted
     * @param string $method
     * @return string
     */
    private static function byHashed( $salted, $method = 'sha256' )
    {
        $digest = hash($method, $salted, true);
        for ($i = 1; $i < 5000; ++$i)
        {
            $digest = hash($method, $digest.$salted, true);
        }
        return base64_encode($digest);
    }

    public static function isAliasUnique( Array $where )
    {
        return self::where(...$where)
                     ->first() ?: false;
    }
}
