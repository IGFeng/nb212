@extends('treehole/layout')
@section('title')
签写留言
@endsection
@section('style')
<style>
    html,body{
        background-image: linear-gradient(to right, #ffecd2 0%, #ffafbd 100%);
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
        <div id="main">
        <div id="submit">
        <form name="form1" method="post" action="{{url('addsolve')}}">
            @csrf
        <div class="add-form-div"><label for="username">昵称:</label><input type="text" name="message[nickname]"  value="{{Session::get('nickname')}}" disabled="disabled"></div>
        <div id="add-form-textarea"><label for="content">内容:</label><textarea id="content" name="message[content]" cols="70" rows="9" placeholder='"我喝过很烈的酒，也放过不该放的手，从前不会回头，往后不会将就。"'>{{old('message')['content']}}</textarea></div>
        <div class='error'>{{$errors->first('message.content')}}</div>
        </div>
        <div class="add-form-div">
            <input type="submit" id="sbutton" value="确 定" style="cursor: pointer">
        </div>
        </form>
        </div>
        </div>
        @endsection
</html>
