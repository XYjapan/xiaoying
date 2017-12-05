

<div class="shade">
    <!-- 登陆 -->
    <div class="login logn">
        <img class="login_bg" src="/images/login/login_bg.png" alt="">
        <img class="login-delete" src="/images/login/delete.png" alt="">
        <ul>
            <li class="name"><input id="login_name" type="text" placeholder="用户名"><span></span></li>
            <li class="password"><input id="login_pass" type="password" placeholder="密码"><span></span></li>
            <p class="password-title">您输入的密码错误，请从新输入</p>
            <li class="checkbox"><input id="login_isremember" type="checkbox" value="记住我">记住我 </li>
            <li class="button"><input type="button" value="登 陆" onclick="loginData()"></li>
        </ul>
    </div>
    <!-- 注册 -->
    <div class="register logn">
        <img class="login_bg" src="/images/login/login_bg.png" alt="">
        <img class="register-delete" src="/images/login/delete.png" alt="">
        <ul>
            <li><input id="register_username" type="text" placeholder="邮箱" onblur="checkRegisterEmail( $(this) )"></li>
            <li><input id="register_password" type="password" placeholder="密码"></li>
            <li><input id="register_mobile" type="text" placeholder="手机号"></li>
            <li>
                <input id="register_code" type="text" class="yanzheng" placeholder="验证码">
                <span onclick="fetchCode($(this),'web_register_code')" >点击获取</span>
            </li>
            <li>
                <input id="register_sms" type="text" class="verification" placeholder="短信验证码">
                <a class="send" href="javascript:;" onclick="createSMS( 'web_register_sms' )">获取验证码</a>
            </li>
            <p class="d_title">您输入的短信验证有误，请从新输入</p>
            <li><button class="btn" result="false" onclick="registerData()">注 册</button></li>
        </ul>
    </div>
</div>

