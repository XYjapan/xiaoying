

{{--继承--}}
@extends('layout')


{{--seo、sem优化--}}
@section('title',null)
@section('keywords',null)
@section('description',null)

{{--当前页面主体内容--}}
@section('content')

<div style="height:500px;"></div>

{{--

    <!-- 喜报模块 -->
    <div class="bulletin clearfix">
        <div class="bulletin_link">
            <p>最新名校录取喜报<span></span></p>
            <ul>

                <li>

                </li>

                <li>
                    <a href="/case" style="color:red;font-size:16px;">
                        >>查看全部录取喜报
                    </a>
                </li>
            </ul>
        </div>
        <div class="bulletin_bar">
            <ul class="clearfix">
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/train.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/relieved.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/abroad.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/enroll.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/cases.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- 喜报模块 -->


    <!-- 方案选择模块 -->
    <div class="scheme_selection" style="background:#fff">
        <div class="s_selection">
            <p class="s_selection_title">20大留学方案供你选择</p>
            <ul class="clearfix">
                <li>
                    <a href="/plan/lingzhongjie"  target="_blank" onclick="_MEIQIA('showPanel')">
                        <img src="/images/index/page-1-artboard.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="/plan/yanjiusheng"  target="_blank" onclick="_MEIQIA('showPanel')">
                        <img src="/images/index/page-1-artboard-copy.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="/sgu" target="_blank" onclick="_MEIQIA('showPanel')">
                        <img src="/images/index/page-1-artboard-copy-2.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="/plan/xiushi"  target="_blank" onclick="_MEIQIA('showPanel')">
                        <img src="/images/index/page-1-artboard-copy-3.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="/plan/bieke"  target="_blank" onclick="_MEIQIA('showPanel')">
                        <img src="/images/index/page-1-artboard-copy-4.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="/plan/zhuanshengben"  target="_blank" onclick="_MEIQIA('showPanel')">
                        <img src="/images/index/page-1-artboard-copy-5.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="/plan/art"  target="_blank" onclick="_MEIQIA('showPanel')">
                        <img src="/images/index/page-1-artboard-copy-6.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="/eju"  target="_blank" onclick="_MEIQIA('showPanel')">
                        <img src="/images/index/page-1-artboard-copy-7.png" alt="">
                    </a>
                </li>
            </ul>
            <p class="s_selection_link"><a href="/plan">更多留学方案</a></p>
        </div>
    </div>
    <!-- 方案选择模块 -->


    <!-- 学校模块 -->
    <div class="sousuo">

        <div class="sousuo_header">
            <ul class="clearfix">
                <li>院校库</li>
                <li><input class="value" type="text" placeholder="搜索你感兴趣的学校"><a class="submint" href="javascript:;">搜索</a></li>
            </ul>
        </div>
        <div class="sousuo_show clearfix">
            <div class="show">
                <dl class="show_one active"  onmouseenter="searchSchoolByLxid(11)">
                    <dt><a href="javascript:;">语言学校</a> </dt>
                    <dd><a href="/ranklist/24" target="_blank">日本语言学校综合排名</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">可缴纳半年学费的语言学校</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">首都圈热门语言学校</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">有升学指导的语言学校</a></dd>

                </dl>
                <dl class="show_three"  onmouseenter="searchSchoolByLxid(12)">
                    <dt><a href="javascript:;">大学</a></dt>
                    <dd><a href="/ranklist/24" target="_blank">日本大学综合排名</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">首都圈名校排名</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">就职最好的日本大学排名</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">最受留学生欢迎的日本大学排名</a></dd>
                </dl>
                <dl class="show_four" onmouseenter="searchSchoolByLxid(13)">
                    <dt><a href="javascript:;">大学别科/研究生预科</a></dt>
                    <dd><a href="/ranklist/24" target="_blank">首都圈热门大学别科</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">热门研究生/旁听生项目</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">接受专科生的别科</a></dd>
                </dl>
                <dl class="show_two" onmouseenter="searchSchoolByLxid(10)">
                    <dt><a href="javascript:;">高中/专门学校</a></dt>
                    <dd><a href="/ranklist/24" target="_blank">日本高中综合排名</a></dd>
                    <dd><a href="/ranklist/24" target="_blank">动漫类专门学校排名</a></dd>
                </dl>


            </div>
            <div class="show_data">
                <ul class="clearfix  schoolresultlist">

                    <li>
                        <a href="/school/1">
                            <img src="http://xiaoying.net/Public/images/logo_long/1.png" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：10%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/2">
                            <img src="http://xiaoying.net/Public/images/logo_long/2.png" alt="">
                            <p class="school_name">京都大学</p>
                            <p class="school_probability">录取率：12%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/3">
                            <img src="http://xiaoying.net/Public/images/logo_long/3.png" alt="">
                            <p class="school_name">大阪大学</p>
                            <p class="school_probability">录取率：14%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/4">
                            <img src="http://xiaoying.net/Public/images/logo_long/4.png" alt="">
                            <p class="school_name">一桥大学</p>
                            <p class="school_probability">录取率：16%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/5">
                            <img src="http://xiaoying.net/Public/images/logo_long/5.png" alt="">
                            <p class="school_name">东京工业大学</p>
                            <p class="school_probability">录取率：17%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/6">
                            <img src="http://xiaoying.net/Public/images/logo_long/6.png" alt="">
                            <p class="school_name">东北大学</p>
                            <p class="school_probability">录取率：20%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/7">
                            <img src="http://xiaoying.net/Public/images/logo_long/7.png" alt="">
                            <p class="school_name">名古屋大学</p>
                            <p class="school_probability">录取率：17%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/8">
                            <img src="http://xiaoying.net/Public/images/logo_long/8.png" alt="">
                            <p class="school_name">九州大学</p>
                            <p class="school_probability">录取率：25%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/9">
                            <img src="http://xiaoying.net/Public/images/logo_long/9.png" alt="">
                            <p class="school_name">筑波大学</p>
                            <p class="school_probability">录取率：25%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/10">
                            <img src="http://xiaoying.net/Public/images/logo_long/10.png" alt="">
                            <p class="school_name">神户大学</p>
                            <p class="school_probability">录取率：23%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/11">
                            <img src="http://xiaoying.net/Public/images/logo_long/11.png" alt="">
                            <p class="school_name">庆应义塾</p>
                            <p class="school_probability">录取率：24%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/12">
                            <img src="http://xiaoying.net/Public/images/logo_long/12.png" alt="">
                            <p class="school_name">早稻田大学</p>
                            <p class="school_probability">录取率：40%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/13">
                            <img src="http://xiaoying.net/Public/images/logo_long/13.png" alt="">
                            <p class="school_name">北海道大学</p>
                            <p class="school_probability">录取率：24%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/14">
                            <img src="http://xiaoying.net/Public/images/logo_long/14.png" alt="">
                            <p class="school_name">广岛大学</p>
                            <p class="school_probability">录取率：33%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/15">
                            <img src="http://xiaoying.net/Public/images/logo_long/15.png" alt="">
                            <p class="school_name">横滨国立大学</p>
                            <p class="school_probability">录取率：43%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/16">
                            <img src="http://xiaoying.net/Public/images/logo_long/16.png" alt="">
                            <p class="school_name">千叶大学</p>
                            <p class="school_probability">录取率：28%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/17">
                            <img src="http://xiaoying.net/Public/images/logo_long/17.png" alt="">
                            <p class="school_name">东京理科大学</p>
                            <p class="school_probability">录取率：32%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/18">
                            <img src="http://xiaoying.net/Public/images/logo_long/18.png" alt="">
                            <p class="school_name">东京外国语大学</p>
                            <p class="school_probability">录取率：40%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/19">
                            <img src="http://xiaoying.net/Public/images/logo_long/19.png" alt="">
                            <p class="school_name">金泽大学</p>
                            <p class="school_probability">录取率：31%</p>
                        </a>
                    </li>
                    <li>
                        <a href="/school/20">
                            <img src="http://xiaoying.net/Public/images/logo_long/20.png" alt="">
                            <p class="school_name">东京医科齿科大学</p>
                            <p class="school_probability">录取率：22%</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- 学校模块 -->


    <!-- 视频模块 -->
    <div class="content_video">
        <h3>汇集TOP5日本大学顶尖名师</h3>
        <div class="con_v">
            <video id="my_video" class="con_video" width="1000" height="" src="#" controls="controls"></video>

            <img src="/images/playvideo.png" class="con_video_but"/>

        </div>
        <div class="swi_but">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <ul>
                            <li>
                                <img src="/files/" />
                                <p>
                                    <span>nickname</span>
                                    <span>金牌讲师/顾问 <br />从业year年</span>
                                </p>
                            </li>
                            <li>
                                item.title
                            </li>
                            <li>近期服务案例<i>falseNum个</i></li>
                            <div class="video_m">
                                <div data_src = "/files/videos/video.mp4">
                                    <img src="/images/index/play_sm.png" alt=""  class="video_list_but" />
                                </div>
                            </div>
                        </ul>
                        <a href="javascript:;" onclick="_MEIQIA('showPanel')">预约咨询</a><br><br><br><p></p>
                    </div>

                </div>
            </div>
            <div class="swiper-button-prev"><img src="/images/index/swi_left.png" alt=""></div>
            <div class="swiper-button-next"><img src="/images/index/swi_right.png" alt=""></div>
        </div>


    </div>
    <!-- 视频模块 -->

--}}





@endsection



{{--当前页面自定义的css文件 --}}
@push('style')
    <link rel="stylesheet" href="/css/index.css">
@endpush


{{--当前页面自定义的js文件 --}}
@push('script')
    <script src="/js/swiper.min.js"></script>
    <script src="/js/index.js"></script>
@endpush