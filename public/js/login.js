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

function registerData()
{
    if( !checkUsername( $('#register_username') ) )
        return ;
    if( !checkPassword( $('#register_password') ) )
        return ;
    if( !checkPhone( $('#register_mobile') ) )
        return ;
}
//倒计时
var count = 0,
    time = 58;
$('.send').on("click",function(){
    // 验证重复获取验证码
    if(count == 0){
        count = 1;
        $('.send').css({'background-color':'#99807f','border-color':'#99807f'});
        $('.send').text('59" 后重新发送');
        _interval = setInterval(function(){
            $('.send').text(time-- +'" 后重新发送');
            if(time==-1){
                count = 0;
                clearInterval(_interval);
                time = 58;
                $('.send').text('获取验证码');
                $('.send').css({'background-color':'#FFD53E','border-color':'#FFD53E'});
            }
        },1000);
    }
});
// 点击关闭
function det(obj){
    obj.on('click',function(){
        $(this).parent('.logn').hide(function(){
            $('.shade').hide();
        });
    });
}
det($('.login-delete'));det($('.register-delete'));