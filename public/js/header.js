



/**
 * @登陆状态
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
 * @一级菜单拼接
 * @param dat
 * @returns {string}
 */
function createNav(dat)
{
    var html = "",
        data = dat[2];
    if(data != false){
        html += "<li>";
        html += "  <a href='' target='_blank' class='pull_down'>"+dat[0]+"</a>";
        html += "  <ul>";
        html +=  child_nav(dat);
        html += "  </ul>";
        html += "</li>";
    }else{
        html += "<li>";
        html += "  <a href="+dat[1]+" target='_blank'>"+dat[0]+"</a>";
        html += "</li>";
    }

    return html;
}

/**
 * @二级菜单拼接
 * @param pro
 * @returns {string}
 */
function child_nav(pro)
{
    var html ="",
        data1 = pro[2];
    if(data1 != false){
        EACH(data1,function(k,v){
            html += "<li><a href="+v[1]+">"+v[0]+"</a></li>";
        });
    }else{
        html += "<li class='hide'></li>";
    }
    return html;
}
