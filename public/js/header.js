
/*@登陆状态 用户栏点击事件*/
$('.user_header').on('click',function(){
    $('.user_title').slideToggle();
});
/* @导航栏下拉 */
$('.nav_li li').hover(function(){
    $(this).find('ul').slideDown();
},function(){
    $(this).find('ul').slideUp();
});


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
    html += "   </ul>";
    html += "</li>";
    html += "<li class='study'>";
    html += "   <a href='javascript:;'>我的学习</a>";
    html += "</li>";

    $('.no_login').attr('display','none');
    $('.yes_login').attr('display','block');

    $('.login_user').html(html);
}