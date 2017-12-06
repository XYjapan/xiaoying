@component('mail::message')

##欢迎加入小莺家族！
###     点击下方按钮验证邮箱

@component('mail::button', ['url' => $url,'color'=>'red'])
    &nbsp;&nbsp;验证 &nbsp;&nbsp;
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
