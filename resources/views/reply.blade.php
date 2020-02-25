@extends('layouts')
@section('title')
回复留言
@endsection
@section('content')
<div id="main">
    <div id="submit">
    <form name="form1" method="post" action="{{url('edit',['id'=>"$content->id"])}}">
        @csrf
    <div style="font-weight: 600;color:#4f98ca;" id="reply_nol">
    {{$content->username}}<span style="color:#999;font-weight:normal">于{{$content->systime}}发表留言：</span>
    </div>　　
           <textarea name="content" cols="70" rows="9" id="reply_content">{{$content->content}}</textarea>
                  <div id="reply_adv"><span style="color:#6a8caf;font-weight:600">管理员</span>回复的内容:</div>
                  <textarea name="reply" cols="50" rows="6" id="reply_textarea">{{$content->reply}}</textarea><br>
                  <input type="submit"  value="回复" style="cursor:pointer" id="reply_submit">
    </form>
    </div>
</div>


@endsection
