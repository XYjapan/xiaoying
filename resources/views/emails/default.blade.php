@component('mail::message')
    # 欢迎加入小莺家族！

    点击下方激活按钮完成邮箱认证。

    @component('mail::button', ['url' => $url])
        点击激活验证码
    @endcomponent

    感谢您的支持与信任,<br>
    {{ config('app.name') }}
@endcomponent