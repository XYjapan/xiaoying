

{{-- 继承 --}}
@extends('layout')


{{-- seo、sem优化 --}}
@section('title',null)
@section('keywords',null)
@section('description',null)


{{-- 当前页面主体内容 --}}
@section('content')





@endsection





{{-- 当前页面自定义的css文件 --}}
@push('style')
    {{--<link rel="stylesheet" href="">--}}
@endpush


{{-- 当前页面自定义的js文件 --}}
@push('script')
    {{--<script src=""></script>--}}
@endpush