@extends('layouts')
@section('title')
管理员注册
@endsection
@section('style')
<style>
    html,body{
        background-image: linear-gradient(120deg, #fbc8d4 0%, #a6c1ee 100%);
    }
</style>
@section('content')
<div id="main">
    <div id="submit">
    <form name="form1" method="post" action="{{url('register')}}">
        @csrf
    <div id="submit_div">
    <div class="add-form-div"><label for="admin_user"> 注册账号</label><input name="register[admin_user]" type="text" id="admin_user"></div>
    <div class="add-form-div"><label for="admin_pass">注册密码</label><input name="register[admin_pass]" type="password" id="admin_pass"></div>
    <div class="add-form-div"><label for="admin_key">管理员密钥</label><input name="register[admin_key]" type="password" id="admin_key"></div>
    <div class="add-form-div"><input type="submit" id="sbutton"value="确 定" style="cursor: pointer"></div>
    </div>
    </form>
    </div>
    </div>
@endsection
