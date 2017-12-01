$(function(){
    // searchSchoolByLxid(11);
})


// 院校库鼠标进出
$(".show dl").hover(function(){
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
});

$('.submint').on('click',function(){
    var keyword = $('.value').val();
    if( keyword == '' )
        return ;
    window.open('/school?keyword='+keyword);
});


function searchSchoolByLxid( lxid )
{
    if( !lxid )
        return ;
    $.ajax({
        url:'/indexsearchschool',
        data:
            {
                lxid:lxid,
            },
        dataType:'JSON',
        type:'GET',
        success:function(res)
        {
            if( res.status == true  && res.data != null )
            {
                var html = '';
                $.each( res.data, function(k,v){
                    html += "<li>";
                    html += "   <a href='/school/"+v.id+"' target='_blank'>";
                    html += "       <img src='"+v.logo_long+"' alt=''>";
                    html += "       <p class='school_name'>"+v.name_cn+"</p>";
                    html += "       <p class='school_probability'>录取率："+Math.floor(v.competition*100)+"%</p>";
                    // html += "       <p class='school_ranking'>国际排名："+v.rank_world+" <span>国内排名："+v.rank_local+"</span></p>";
                    html += "   </a>";
                    html += "</li>";
                } );
                $('.schoolresultlist').html(html);
            }
        }
    })
}



/**/// 视频播放

var mySwiper = new Swiper('.swiper-container', {
    loop:true,
    slidesPerView:4,
    slidesPerGroup:1,
    prevButton:'.swiper-button-prev',
    nextButton:'.swiper-button-next',
})



// hover效果
$(".swiper-slide>ul").mouseover(function(){
    $(this).find("div").show();
    $(this).find("div").addClass("m_show");
}).mouseleave(function(){
    $(this).find("div").removeClass("m_show");
    $(this).find("div").hide();
})

//点击播放
$(".con_video_but").click(function(){
    var my_video = document.getElementById("my_video")
    my_video.play();
    $(this).hide();
})

$(".video_list_but").click(function() {
    var my_video = document.getElementById("my_video")
    if($(this).attr("src")=="/files/newindex/images/videostop.png"){
        my_video.pause();
        $(this).attr("src", "/files/newindex/images/play_sm.png");
        $(".con_video_but").show();
    }else{
        my_video.play();
        $(this).attr("src", "/files/newindex/images/videostop.png");
        $(".con_video_but").hide();
    }
})
$("#my_video").click(function() {
    if($(".con_video_but").css("display") == "none") {
        var my_video = document.getElementById("my_video")
        my_video.pause();
        $(".con_video_but").show();
    }
})