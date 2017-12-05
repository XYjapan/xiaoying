

/**************  box事件  *************/
/**
 * @ 打开登陆窗口
 */
function openLoginBox()
{
    $('.shade').show(function(){
        $('.register').css('display','none');
        $('.shade').find(".login").css('display','block');
    });
}

/**
 * @ 打开注册窗口
 */
function openRegisterBox()
{
    $('.shade').show(function(){
        $('.shade[class=login]').css('display','none');
        $('.register').css('display','block');
    });
}

/**
 * @ 关闭所有窗口
 */
function closeLRBox()
{
    $('.shade').hide();
}

/**
 * @ 原始点击时间
 * @param obj
 */
function det(obj){
    obj.on('click',function(){
        $(this).parent('.logn').hide(function(){
            $('.shade').hide();
        });
    });
}

det($('.login-delete'));det($('.register-delete'));
/*************************************/

/**************  login  **************/
/**
 * @ 登陆！！！
 */
function loginData()
{
    var username = $("#login_name").val();
    var password = $("#login_pass").val();

    if( !checkUsername( $("#login_name") ) )
        return ;

    if( !checkPassword( $("#login_pass") ) )
        return ;

    AJAX(
        '/api/login',
        'post',
        'json',
        function(res)
        {
            if( res.status == false )
            {
                notyetLogin();
                $(".password-title").html(res.info);
                $(".password-title").show();
            }
            else
            {
                alreadyLogin(res.info);
                closeLRBox();
            }
        },
        {
            username:username,
            password:password,
            _token:_TOKEN
        }
    );
}

/*************  register   ***********/

/**
 * @`用户名是否已经注册`
 * @param email
 * @returns {boolean}
 */
function isRegisterUserHasExists( email )
{
    var result = false;
    AJAX( '/api/isRegister', 'post', 'json', function(res){
        if( res.status == true )
            result = true;
    }, {
        _token:_TOKEN,
        username:email,
    } );
    return result;
}

/**
 * @注册前邮箱验证
 * @param obj
 * @returns {boolean}
 */
function checkRegisterEmail( obj )
{
    if( !checkEmail(obj) )
        return false;
    if( isRegisterUserHasExists( obj.val() ) )
        return true;
    obj.val('');
    obj.attr('placeholder','此邮箱已经注册！');
    return false;
}

/**
 * @注册验证
 */
function checkRegisterData()
{
    if( !checkRegisterEmail( $('#register_username') ) )
        return false;
    if( !checkPassword( $('#register_password') ) )
        return false;
    if( !checkPhone( $('#register_mobile') ) )
        return false;
    if( !checkCode( $('#register_code'), 'web_register_code' ) )
        return false;
    if( !checkRegisterSMS( $('#register_sms'), 'web_register_sms' ) )
        return false;

    return true;

}

/**
 * @发送短信验证码
 * @param obj
 * @param key
 * @returns {boolean}
 */
function createSMS( key )
{
    // 邮箱验证
    if( !checkRegisterEmail( $('#register_username') ) )
        return false;

    // 验证电话
    if( !checkPhone( $('#register_mobile') ) )
        return false;

    // 验证码检验
    if( !checkCode( $('#register_code'), 'web_register_code' ) )
        return false;

    // 触发
    AJAX( '/api/createsms', 'post', 'json', function(res){
        if( res.status == false )
        {
            showRegisterReturnInfo( res.info );
            return  ;
        }
        else
        {
            Time(59,$('.send'));
        }
    },
        {
            phone:$('#register_mobile').val(),
            key:key,
            _token:_TOKEN
        });
}

/**
 * @验证注册短信
 * @param obj
 * @returns {boolean}
 */
function checkRegisterSMS( obj )
{
    if( obj.val().length != 6 )
    {
        showRegisterReturnInfo( '短信验证码错误' );
        return false;
    }
    return true;
}

/**
 * @ 注册！！！
 */
function registerData()
{
    if( !checkRegisterData() )
        return ;
    AJAX( '/api/register', 'post', 'json', function(res){
        if( res.status == false )
        {
            showRegisterReturnInfo( res.info );
            return ;
        }
        else
        {
            showRegisterReturnInfo( '注册成功！' );
            closeLRBox();
            openLoginBox();
        }
    }, {
        username:$('#register_username').val(),
        password:$('#register_password').val(),
        phone:$('#register_mobile').val(),
        code:$('#register_code').val(),
        sms:$('#register_sms').val(),
        _token:_TOKEN,
    } );
}

/**
 * @显示后端返回信息
 * @param msg
 */
function showRegisterReturnInfo( msg )
{
    $('.d_title').html(msg);
    $('.d_title').show();
}

