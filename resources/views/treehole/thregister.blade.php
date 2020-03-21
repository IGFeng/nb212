@extends('treehole/layout')
@section('title')
注册
@endsection
@section('style')
<style>
    html,body{
        background-image: linear-gradient(120deg, #fbc8d4 0%, #a6c1ee 100%);
        background-size:100% 100%;
        background-attachment: fixed;
    }
    .error{
            font-size: 15px;
            margin:0;
            color:red;
        }
</style>
@section('content')
@include('treehole/validator')
<div id="main">
    <div id="submit">
    <form name="form1" method="post" action="{{url('registersolve')}}">
        @csrf
    <div id="submit_div">
    <div class="add-form-div"><label for="admin_user"> 账户</label><input name="register[account]" type="text" value="{{old('register')['account']}}"><div class='error'>{{$errors->first('register.account')}}</div></div>
    <div class="add-form-div"><label for="admin_user"> 昵称</label><input name="register[nickname]" type="text" value="{{old('register')['nickname']}}"><div class='error'>{{$errors->first('register.nickname')}}</div></div>
    <div class="add-form-div"><label for="admin_pass">密码</label><input name="register[password]" type="password"value="{{old('register')['password']}}"><div class='error'>{{$errors->first('register.password')}}</div></div>
    <div class="add-form-div"><label for="admin_pass">确认密码</label><input name="register[confirm]" type="password"value="{{old('register')['confirm']}}"><div class='error'>{{$errors->first('register.confirm')}}</div></div>
    <div class="add-form-div"><label for="admin_pass">邀请码</label><input name="register[validator]" type="password"value="{{old('register')['validator']}}"><div class='error'>{{$errors->first('register.validator')}}</div></div>
    <div class="add-form-div"><input type="submit" id="sbutton"value="确 定" style="cursor: pointer"></div>
    <div style="text-align:center">(注册成功后会自动跳转到留言页面)</div>
    </div>
    </form>
    </div>
    </div>
@endsection
