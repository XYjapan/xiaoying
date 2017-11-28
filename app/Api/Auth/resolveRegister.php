<?php
namespace App\Api\Auth;


use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Validation\ValidationException;
use App\Models\User;

trait resolveRegister
{
    /**
     * @ 获取客户端数据 转换`username`
     * @param Request $request
     * @return array
     */
    protected function registerCredentials( Request $request )
    {
        $clientParams = $request->all();
        $trueusername = $this->trueusername();
        if( $trueusername == 'nickname' )
            throw ValidationException::withMessages(['username'=>'用户名格式用户名错误']);

        return [
            $trueusername           =>      $clientParams['username'],
            'nickname'              =>      $clientParams['nickname'],
            'password'              =>      $clientParams['password'],
        ];
    }
    protected function isRegisterCredentialUnique( Request $request )
    {
        if( User::isAliasUnique( [$this->trueusername(),'=',$request->request->get('username')] ) )
            return false;
        return true;
    }

    protected function registerWrite( $credentials )
    {
        return User::create(
            $credentials
        );
    }
}
