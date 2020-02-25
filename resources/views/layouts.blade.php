<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','留言板')</title>
    <link rel="stylesheet" href="{{asset('css.css')}}">
    @section('style')
    @show
</head>
<body>
    @section('header')
    <div id="top">
        <!--logo-->
        <div id="logoarea"><a href="{{url('/')}}">留言板</a></div>
        <!--菜单-->
        <div id="menu">
        <ul>
        <li><a href="{{url('index')}}">浏览留言</a></li>
        <li><a href="{{url('add')}}">签写留言</a></li>
         @if(!Session::has('admin_pass'))
        <li><a href="{{url('login')}}">管理留言</a></li>
        @else <li><a href="{{action('UserController@logout')}}"onclick="if(confirm('您确定要退出吗?')==false) return false;">退出管理</a></li>
         @endif
        <li><a href="{{url('trans')}}">注册</a></li>
        </ul>
        </div>
        </div>
        @show
        @section('content')
        @show
        @section('footer')
        <div id="foot">
            @2020 Design by 212
            </div>
        @show
</body>
</html>
