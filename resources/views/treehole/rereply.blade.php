@extends('treehole/layout')
@section('title')
回复留言
@endsection
@section('style')
<style>
.error{
            font-size: 15px;
            margin:0;
            color:red;
        }
</style>
@endsection
@section('content')
<div id="main">
    <div id="submit">
    <form name="form1" method="post" action="{{url('rethedit',['mid'=>$content->mid,'nickname'=>$content->mastername,'account'=>$content->account])}}">
        @csrf
    <div style="font-weight: 600;color:#4f98ca;" id="reply_nol">
    {{$content->username}}<span style="color:#999;font-weight:normal">{{$content->nickname}}于{{$content->systime}}回复：</span>
    </div>
        <textarea name="content" cols="70" rows="9" id="reply_content" disabled="disabled">{{$content->content}}</textarea>
                  <div id="reply_adv"><span style="color:#6a8caf;font-weight:600"></span>回复的内容:</div>
        <textarea name="reply" cols="50" rows="6" id="reply_textarea" >{{old('reply')}}</textarea><br>
        <div class='error'>{{$errors->first('reply')}}</div>
                  <input type="submit"  value="回复" style="cursor:pointer" id="reply_submit" style="cursor:pointer">
    </form>
    </div>
</div>


@endsection
