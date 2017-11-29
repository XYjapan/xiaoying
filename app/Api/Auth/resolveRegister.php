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

    /**
     * @ `用户名`是否存在
     * @param Request $request
     * @return bool
     */
    protected function isRegisterCredentialUnique( Request $request )
    {
        return !( User::isAliasUnique( [$this->trueusername(),'=',$request->request->get('username')] ) );
    }

    /**
     * @ 用户数据写入
     * @param $credentials
     * @return mixed
     */
    protected function registerWrite( $credentials )
    {
        $user = new User;
        // 生成盐字符串
        $credentials['salt'] = $user::createSalt();

        // 加密密码生成
        $credentials['password'] = $user::generatePassword( $credentials['password'], $credentials['salt'] );

        // dd($credentials);
        return User::create(
            $credentials
        );
    }
}
