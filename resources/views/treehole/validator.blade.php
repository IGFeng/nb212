<div id='information'>
    <ul>
        @if(Session::has('accounterror'))
         <li>账户已被注册！请输入新账户</li>
        @endif
        @if(Session::has('nicknameerror'))
         <li>昵称已被注册！请输入新昵称</li>
        @endif
        @if(Session::has('confirmerror'))
         <li>第二次输入的密码与第一次不符，请仔细检查</li>
        @endif
        @if(Session::has('validatorerror'))
         <li>邀请码错误</li>
        @endif
    </ul>
</div>
