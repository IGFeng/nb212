<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','留言板')</title>
    <link rel="stylesheet" href="{{asset('css.css')}}" media="screen and (min-width:960px)">
    <link rel="stylesheet" href="{{asset('css-phone.css')}}" media="screen and (max-width:960px)">
    @section('style')
    @show
</head>
<body>
    @section('header')
    <div id="top">
        <!--logo-->
    <div id="logoarea"><a href="{{url('treehole')}}">首页</a>--{{Session::get('admin_pass')?"管理员先生":Session::get('nickname')}}</div>
        <!--菜单-->
        <div id="menu">
        <ul>
            @if(!Session::get('admin_pass'))
            @if(Session::has('account'))
            <li><a href="{{url('thindex')}}">浏览留言</a></li>
            <li><a href="{{url('thadd')}}">签写留言</a></li>
            @endif
            @else
            <li><a href="{{url('adminlogout')}}" onclick="if(confirm('您确定要退出吗?')==false) return false;">退出管理</a></li>
            @endif
        </ul>
        </div>
        </div>
        @show
        @section('content')
        @show
        @section('footer')
        <div id="foot">
            @2020 Designed by Feng
            </div>
        @show
</body>
</html>
