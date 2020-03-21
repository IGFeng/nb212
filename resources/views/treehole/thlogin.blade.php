@extends('treehole/layout')
@section('title')
登陆
@endsection
<style>
    html,body{
        background-image: linear-gradient(120deg, #f6d365 0%, #fd7167 100%);
        background-size:100% 100%;
        background-attachment: fixed;
    }
</style>
@section('content')
<div id="main">
<div id="submit">
<form name="form1" method="post" action="{{url('loginsolve')}}">
    @csrf
<div id="submit_div">
<div class="add-form-div"><label for="admin_user"> 账户</label><input name="login[account]" type="text"></div>
<div class="add-form-div"><label for="admin_pass">密码</label><input name="login[password]" type="password"></div>
<div class="add-form-div"><input type="submit" id="sbutton"value="确 定" style="cursor:pointer"></div>
<div style="text-align: center">(登陆成功后会自动跳转到留言页面)</div>
</div>
</form>
</div>
</div>
@endsection
