

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
        res.is_login == false ? notyetLogin() : alreadyLogin(res);
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
    createUserMsg( res.is_login );
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