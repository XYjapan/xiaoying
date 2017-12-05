
/**
 * @ 定义token 常量
 * @type {*|jQuery}
 * @private
 */
const _TOKEN = $("meta[name=crsf_token]").attr('content');


/**
 *  基于jquery封装ajax
 */
function AJAX( url, type, dataType, closure, data )
{
    url = url+'?'+randomStr(32);
    $.ajax({
        async:false,
        type:type,
        url:url,
        dataType:dataType,
        data:data,
        success:closure
    })
}

/**
 * @遍历函数
 * @param obj
 * @param closure
 * @constructor
 */
function EACH( obj, closure )
{
    $.each( obj, closure );
}

/**
 *  @判断用户是否登陆
 */
function isLogin()
{
    AJAX( '/api/islogin', 'get', 'json', function(res){
        res.is_login == false ? notyetLogin() : alreadyLogin(res.is_login);
    } );
}

/**
 * @ 退出登录
 */
function outLogin()
{
    AJAX('/api/logout','get','json',function(){});

    notyetLogin();
}

/**
 * @登陆状态
 */
function alreadyLogin(res)
{
    createUserMsg( res );
    $('.no_login').css({'display':'none'});
    $('.yes_login').css({'display':'block'});
    /*@登陆状态 用户栏点击事件*/
    $('.user_header').on('click',function(){
        $('.user_title').slideToggle();
    });
}

/**
 * @未登录状态
 */
function notyetLogin()
{
    $('.yes_login').css({'display':'none'});
    $('.no_login').css({'display':'block'});
}

/**
 * @登陆状态、生成用户信息
 * @param res
 */
function createUserMsg( res )
{
    var html =  "";
    html += "<li class='user'>";
    html += "   <a href='javascript:;' class='user_header'>";
    html += "       <img src='/images/header/user.jpeg' alt=''>";
    html += "   </a>";
    html += "   <ul class='user_title'>";
    html += "       <li><a href='javascript:;' class='user_name'>"+res.nickname+"</a></li>";
    html += "       <li><a href='javascript:;'>个人主页</a></li>";
    html += "       <li><a href='javascript:;'>个人设置</a></li>";
    html += "       <li><a href='javascript:;'>账户中心</a></li>";
    html += "       <li><a href='javascript:;'>通知</a></li>";
    html += "       <li><a href='javascript:;'>私信</a></li>";
    html += "       <li><a href='javascript:;' onclick='outLogin()'>退出登录</a></li>";
    html += "   </ul>";
    html += "</li>";
    html += "<li class='study'>";
    html += "   <a href='javascript:;'>我的学习</a>";
    html += "</li>";

    // 显示
    $('.login_user').html(html);
}

/**
 * @初始化导航菜单
 */
function initNavMenu()
{
    AJAX('/api/menu','get','json',function(res){
        var html = '';
        EACH( res, function(k,v){
            html += createNav(v);
        } );
        $(".nav_li").html(html);

        /* @导航栏下拉 */
        $('.nav_li li').hover(function(){
            $(this).find('ul').slideDown();
        },function(){
            $(this).find('ul').slideUp();
        });
    });
}

/**
 * @产生随机字符串
 * @param num
 * @returns {string}
 */
function randomStr(num)
{
    var data=["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];

    var result="";
    for(var i=0;i<num;i++)
    {
        var r=Math.floor(Math.random()*62);     //取得0-62间的随机数，目的是以此当下标取数组data里的值！
        result+=data[r];        //输出20次随机数的同时，让rrr加20次，就是20位的随机字符串了。
    }
    return result;
}


function Time(time,obj){
    var count = 0,
        times = time;
        // 验证重复获取验证码
        if(count == 0)
        {
            count = 1;
            obj.css({'background-color':'#99807f','border-color':'#99807f'});
            obj.text('( '+time+'s )');
            _interval = setInterval(function(){
                obj.text('( '+ (time--) +'s )');
                if(time==-1){
                    count = 0;
                    clearInterval(_interval);
                    time = times;
                    obj.text('重新获取验证码');
                    obj.css({'background-color':'#FFD53E','border-color':'#FFD53E'});
                }
            },1000);
        }
}

/******************  js表单验证  start ********************/

function checkUsername( obj )
{
    var len = obj.val().length;
    if( (obj.val() == '') || (20<len) || (len<6) )
    {
        obj.val('');
        obj.attr('placeholder','用户名不合法！请重新填写');
        return false;
    }
    return true;
}

function checkEmail( obj )
{
    var mail = obj.val();
    if( mail == '' )
    {
        obj.val('');
        obj.attr('placeholder','邮箱不能为空');
        return false;
    }
    else if( !mail.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/) )
    {
        obj.val('');
        obj.attr('placeholder','邮箱格式错误');
        return false;
    }
    return true;
}

function checkPassword( obj )
{
    var len = obj.val().length;
    if( (obj.val() == '') || (20<len) || (len<6) )
    {
        obj.val('');
        obj.attr('placeholder','密码格式错误！请重新填写');
        return false;
    }
    return true;
}

function checkPhone( obj )
{
    if ( obj.val() == '' || !(/^1[3|4|5|8]\d{9}$/.test(obj.val())) )
    {
        obj.val('');
        obj.attr('placeholder','请输入有效手机号');
        return false;
    }
    else
    {
        return true;
    }
}

function fetchCode( obj, key )
{
    AJAX( '/api/fetchcode','get','json',function(res){
        if( res.status == true )
        {
            obj.html( res.code );
        }
    },
        {
            key:key,
        })
}

function checkCode( obj, key )
{
    var result = false;
    var code = obj.val();
    if( code == '' || code.length != 4 )
    {
        obj.val('');
        obj.attr('placeholder','验证码错误');
        return false;
    }
    AJAX( '/api/checkcode', 'get', 'json', function(res){
            if( res.status == true )
            {
                result = true;
                return true;
            }
            else
            {
                obj.val('');
                obj.attr('placeholder','验证码错误');
                return false;
            }
        },
        {
            key:key,
            code:code,
        });
    return result;
}


/******************  js表单验证  start ********************/


function test()
{
    AJAX( '/api/sms','post','json',function(res){
        console.log(res);
    },{
        _token:_TOKEN,
        key:'register_web',
    } );
}