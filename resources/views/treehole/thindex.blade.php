@extends('treehole/layout')
@section('title')
浏览匿名留言
@endsection
@section('style')
<style>
    #main{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: flex-start;
    }
</style>
@endsection
@section('content')
<!--最外层主要区域开始-->
<div id="main">
  <div id="list">
      <div id="listmain">
        @foreach($messages as $message)
<h2>
<span class="leftarea">
<div style="color:#4f98ca;font-weight:500;">{{$message->nickname}}于{{$message->systime}}发表留言：</div>
</span>
@if(!Session::get('admin_pass'))
<span class="midarea">
    @if(session('nickname')==$message->nickname)
        <a href='{{url('thdelete',['id'=>$message->id])}}' onclick="if(confirm('确定删除此留言吗?')==false) return false;">删除</a>
    @endif

<a href='{{url('threply',['id'=>$message->id])}}'>回复</a>
</span>
@endif
</h2>
<div class="content">
{{$message->content}}
</div>
@foreach($replys as $reply)
@if($reply->mid==$message->id)
    <h2>
    <span class="leftarea">
    <div style="color:#4f98ca;font-weight:500;font-size:80%;color:green">{{$reply->mastername}}于{{$reply->replytime}}回复{{$reply->nickname}}:</div>
    </span>
    @if(!Session::get('admin_pass'))
    <span class="midarea">
        @if(session('nickname')==$reply->mastername)
            <a href='{{url('rethdelete',['id'=>$reply->id])}}' onclick="if(confirm('确定删除此留言吗?')==false) return false;">删除</a>
        @endif
    <a href='{{url('rethreply',['id'=>$reply->id])}}'>回复</a>
    </span>
    @endif
    </h2>
    <div class="content" style="font-size: 80%">
        {{$reply->content}}
    </div>
    @endif
@endforeach
@endforeach
</div><!--listmain结束-->
</div><!--list结束-->
</div>
<!--最外层主要区域结束-->
@endsection
