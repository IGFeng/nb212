<?php
namespace App\Http\Controllers;

use App\message;
use Illuminate\Http\Request;

class MessageController extends Controller{
    public function index(){
        $messages=message::orderBy('settop','desc')->orderBy('id','desc')->paginate(5);
        return view('index',[
            'messages'=>$messages
        ]);
    }

    public function add(){
        return view('add');
    }
    public function create(Request $request){
       $this->validate($request,[
            'message.username'=>'required|min:2|max:20',
            'message.content'=>'required|max:100',
        ],[
            'required'=>':attribute为必填项',
            'min'=>':attribute不少于2个字符',
            'max'=>':attribute长度不超过20个字符',
        ],[
            'message.username'=>'昵称',
            'message.content'=>'内容',
        ]);
        $data=$request->input('message');
        $Message=new message();
        $Message->username=$data['username'];
        $Message->content=$data['content'];
        if(empty($data['ifqqh']))
        $data['ifqqh']=0;
        $Message->ifqqh=$data['ifqqh'];
        $Message->systime=date("Y-m-d H:i",time());
        $Message->save();
        if($Message->save())
            return redirect('index');
            else return redirect()->back();
    }

    public function reply($id,$ac){
        $content=message::find($id);
        return view('reply',[
            'content'=>$content
        ]);
    }
    public function edit(Request $request,$id){
        $data=$request->input('reply');
        $Message=message::find($id);
        $Message->reply=$data;
        $Message->replytime=date("Y-m-d H:i",time());
        $Message->save();
        return redirect('index');
    }

}
