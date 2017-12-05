<!DOCTYPE html>
<html>

    <head>
        <title> @yield(
                    'title',
                    '小莺出国日本留学-专注日本留学|日本读研|研究生top10名校申请'
                    ) </title>
        <meta charset="utf-8" />
        <meta name="keywords" content="@yield(
                                            'keywords',
                                            '日本留学,日本读研,日本读研费用,日本留学申请,日本大学排名,日本读研申请'
                                            )" />
        <meta name="description" content="@yield(
                                            'description',
                                            '小莺出国日本留学专注日本留学考研申请，提供 2017年日本留学申请、日本读研申请等留学指南及互动服务，帮助初中生、高中生、本科生、硕士和研究生（读研|读硕）等同学DIY自主留学，是日本留学的首选培训机构品牌'
                                            )" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="crsf_token" content="{{ csrf_token() }}" />

        {{-- 样式文件 --}}
        <link rel="stylesheet" href="/css/global.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/login.css">
        {{-- 自定义样式堆 --}}
        @stack('style')

    </head>

    <body>
        {{-- 头部引入 --}}
        @include('header')


        {{-- 主体引入 --}}
        @yield('content')


        {{-- 底部引入 --}}
        @include('footer')


        {{-- 登陆注册 --}}
        @include('login')

        {{-- js文件 --}}
        <script src="/js/jquery.min.js"></script>
        <script src="/js/header.js"></script>
        <script src="/js/onload.js"></script>
        <script src="/js/global.js"></script>
        <script src="/js/login.js"></script>
        {{-- 自定义js堆 --}}
        @stack('script')

        {{--底部公用表单--}}
        {{--@include('footForm')--}}
    </body>

</html>






