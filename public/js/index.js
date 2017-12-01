// 院校库鼠标进出
$(".show dl").hover(function(){
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
});

//	轮播
var mySwiper = new Swiper('.swiper-container', {
    loop: true,
    slidesPerView: 4,
    slidesPerGroup: 1,
    prevButton: '.swiper-button-prev',
    nextButton: '.swiper-button-next',
})

// hover效果
$(".swiper-slide>ul").mouseover(function() {
    $(this).find("div").show();
    $(this).find("div").addClass("m_show");
}).mouseleave(function() {
    $(this).find("div").removeClass("m_show");

})

//视屏点击播放
$(".con_video_but").click(function() {
    var my_video = document.getElementById("my_video")
    my_video.play();
    $(this).hide();
})
//选择播放
$(".video_list_but").click(function() {
    var my_video = document.getElementById("my_video")
    if($(this).attr("src") == "assets/imgs/videostop.png") {
        my_video.pause();
        $(this).attr("src", "assets/imgs/play_sm.png")
        $(".con_video_but").show();
    } else {
        $("#my_video").attr("src",$(this).parent().attr("data_src"))
        my_video.play();
        $(this).attr("src", "assets/imgs/videostop.png")
        $(".con_video_but").hide();
    }
})

//屏中心播放按钮显示隐藏
$("#my_video").click(function() {
    if($(".con_video_but").css("display") == "none") {
        var my_video = document.getElementById("my_video")
        my_video.pause();
        $(".con_video_but").show();
    }
})