

{{--继承--}}
@extends('layout')


{{--seo、sem优化--}}
@section('title',null)
@section('keywords',null)
@section('description',null)

{{--当前页面主体内容--}}
@section('content')




    <!-- 最新的喜报 -->
    <div class="bulletin clearfix">
        <div class="bulletin_link">
            <p>最新录取喜报<span></span></p>
            <ul>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/school.jpg" alt="">
                        <p class="name">张明芝 成功录取东京大学 经济学</p>
                        <p class="tuofu">托福：103 托福：60 <span>2017-06-08</span></p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/school.jpg" alt="">
                        <p class="name">张明芝 成功录取东京大学 经济学</p>
                        <p class="tuofu">托福：103 托福：60 <span>2017-06-08</span></p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/school.jpg" alt="">
                        <p class="name">张明芝 成功录取东京大学 经济学</p>
                        <p class="tuofu">托福：103 托福：60 <span>2017-06-08</span></p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/school.jpg" alt="">
                        <p class="name">张明芝 成功录取东京大学 经济学</p>
                        <p class="tuofu">托福：103 托福：60 <span>2017-06-08</span></p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bulletin_bar">
            <ul class="clearfix">
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/t1.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/t2.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/t3.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/t4.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/t5.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /*方案选择*/ -->
    <div class="scheme_selection">
        <div class="s_selection">
            <p class="s_selection_title">20大留学方案供你选择</p>
            <ul class="clearfix">
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/s_selection.png" alt="">
                        <p>语言学校免费申请</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/s_selection.png" alt="">
                        <p>日本读研申请</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/s_selection.png" alt="">
                        <p>SGU英语项目</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/s_selection.png" alt="">
                        <p>修士直申请/直考</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/s_selection.png" alt="">
                        <p>日本大学别科申请</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/s_selection.png" alt="">
                        <p>专升本/专升硕</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/s_selection.png" alt="">
                        <p>艺术生赴日留学</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/images/index/s_selection.png" alt="">
                        <p>留考校内考辅导</p>
                    </a>
                </li>
            </ul>
            <p class="s_selection_link"><a href="javascript:;">更多留学方案</a></p>
        </div>
    </div>
    <!-- /*院校库*/ -->
    <div class="sousuo">
        <div class="sousuo_header">
            <ul class="clearfix">
                <li>院校库</li>
                <li><input class="value" type="text"placeholder="搜索你感兴趣的学校"><a class="submint" href="javascript:;">搜索</a></li>
            </ul>
        </div>
        <div class="sousuo_show clearfix">
            <div class="show">
                <dl class="show_one active">
                    <dt><a href="javascript:;">语言学校</a> <span></span></dt>
                    <dd><a href="javascript:;">关系语言学校</a>
                    </dd>
                    <dd><a href="javascript:;">关系语言学校</a>
                    </dd>
                    <dd><a href="javascript:;">关系语言学校</a>
                    </dd>
                </dl>
                <dl class="show_two">
                    <dt><a href="javascript:;">高中与专门学校</a><span></span></dt>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                </dl>
                <dl class="show_three">
                    <dt><a href="javascript:;">大学</a><span></span></dt>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                </dl>
                <dl class="show_four">
                    <dt><a href="javascript:;">美术院校</a><span></span></dt>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                    <dd><a href="javascript:;">关系语言学校</a></dd>
                </dl>
            </div>
            <div class="show_data">
                <ul class="clearfix">
                    <li>
                        <a href="javascript:;">
                            <img src="/images/index/school.jpg" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：12%</p>
                            <p class="school_ranking">国际排名：46 <span>国内排名：20</span></p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="/images/index/school.jpg" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：12%</p>
                            <p class="school_ranking">国际排名：46 <span>国内排名：20</span></p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="/images/index/school.jpg" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：12%</p>
                            <p class="school_ranking">国际排名：46 <span>国内排名：20</span></p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="/images/index/school.jpg" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：12%</p>
                            <p class="school_ranking">国际排名：46 <span>国内排名：20</span></p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="/images/index/school.jpg" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：12%</p>
                            <p class="school_ranking">国际排名：46 <span>国内排名：20</span></p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="/images/index/school.jpg" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：12%</p>
                            <p class="school_ranking">国际排名：46 <span>国内排名：20</span></p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="/images/index/school.jpg" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：12%</p>
                            <p class="school_ranking">国际排名：46 <span>国内排名：20</span></p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="/images/index/school.jpg" alt="">
                            <p class="school_name">东京大学</p>
                            <p class="school_probability">录取率：12%</p>
                            <p class="school_ranking">国际排名：46 <span>国内排名：20</span></p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- /*视屏*/ -->
    <div class="content_video">
        <h3>汇集TOP5日本大学顶尖名师</h3>
        <div class="con_v">
            <video id="my_video" class="con_video" width="1000" height="" src="assets/videos/video.mp4" controls="controls"></video>
            <img src="/images/index/play_la.png" class="con_video_but" />
        </div>
        <div class="swi_but">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <ul>
                            <li>
                                <img src="/images/index/th_1.png" />
                                <p>
                                    <span>李岳</span>
                                    <span>日本顾问 <br />从业年10年</span>
                                </p>
                            </li>
                            <li>
                                简介。。。。
                            </li>
                            <li>近期服务案例<i>161个</i></li>
                            <div class="video_m">
                                <div data_src="assets/videos/video.mp4">
                                    <img src="/images/index/play_sm.png" alt="" class="video_list_but" />
                                </div>

                            </div>
                        </ul>
                        <a href="">预约咨询</a>
                    </div>
                    <div class="swiper-slide">
                        <ul>
                            <li>
                                <img src="/images/index/th_2.png" />
                                <p>
                                    <span>李岳</span>
                                    <span>日本顾问 <br />从业年10年</span>
                                </p>
                            </li>
                            <li>
                                简介。。。。
                            </li>
                            <li>近期服务案例<i>161个</i></li>
                            <div class="video_m">
                                <div data_src="assets/videos/video2.mp4">
                                    <img src="/images/index/play_sm.png" alt="" class="video_list_but" />
                                </div>

                            </div>
                        </ul>
                        <a href="">预约咨询</a>
                    </div>
                    <div class="swiper-slide">
                        <ul>
                            <li>
                                <img src="/images/index/th_3.png" />
                                <p>
                                    <span>李岳</span>
                                    <span>日本顾问 <br />从业年10年</span>
                                </p>
                            </li>
                            <li>
                                简介。。。。
                            </li>
                            <li>近期服务案例<i>161个</i></li>
                            <div class="video_m">
                                <div data_src="assets/videos/video3.mp4">
                                    <img src="/images/index/play_sm.png" alt="" class="video_list_but" />
                                </div>

                            </div>
                        </ul>
                        <a href="">预约咨询</a>
                    </div>
                    <div class="swiper-slide">
                        <ul>
                            <li>
                                <img src="/images/index/th_4.png" />
                                <p>
                                    <span>李岳</span>
                                    <span>日本顾问 <br />从业年10年</span>
                                </p>
                            </li>
                            <li>
                                简介。。。。
                            </li>
                            <li>近期服务案例<i>161个</i></li>
                            <div class="video_m">
                                <div data_src="assets/videos/video4.mp4">
                                    <img src="/images/index/play_sm.png" alt="" class="video_list_but" />
                                </div>

                            </div>
                        </ul>
                        <a href="">预约咨询</a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"><img src="/images/index/sw_left.png" /></div>
            <div class="swiper-button-next"><img src="/images/index/swi_right.png" /></div>
        </div>

    </div>





@endsection



{{--当前页面自定义的css文件 --}}
@push('style')
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/swiper.min.css">
@endpush


{{--当前页面自定义的js文件 --}}
@push('script')
    <script src="/js/swiper.min.js"></script>
    <script src="/js/index.js"></script>
@endpush