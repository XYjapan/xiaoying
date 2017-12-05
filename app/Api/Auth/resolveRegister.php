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
            throw ValidationException::withMessages(['username'=>'用户名格式错误']);

        return [
            $trueusername           =>      $clientParams['username'],
            'nickname'              =>      $clientParams['nickname'] ?? '游客_'.substr( $clientParams['phone'], 7, 4 ),
            'password'              =>      $clientParams['password'],
            'verifiedMobile'        =>      $clientParams['phone']
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

    /**
     * @ 注册后置 执行 删除session
     * @param Request $request
     */
    protected function afterRegister( Request $request )
    {
        // $request->session()->flush();
         $request->session()->forget('web_regiser_code');
         $request->session()->forget('web_regiser_sms');
    }
}
