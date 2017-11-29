

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
 *  @判断用户是否登陆
 */
function isLogin()
{
    AJAX( '/api/islogin', 'get', 'json', function(res){
        if( res.is_login == false )
            return ;
        createUserMsg( res.is_login );
    } );
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