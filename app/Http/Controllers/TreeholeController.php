<?php
namespace App\Http\Controllers;

use App\thmessage;
use Illuminate\Http\Request;
use App\threply;
use App\thuser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TreeholeController extends Controller{
    public function welcome(){
        return view('treehole/treehole');
    }
    public function register(){
        return view('treehole/thregister');
    }
    public function registersolve(Request $request){
        $validator=Validator::make($request->input(),
        [
            'register.account'=>'required|max:20',
            'register.password'=>'required|max:20',
            'register.nickname'=>'required|max:20',
            'register.validator'=>'required',
            'register.confirm'=>'required'
        ],[
            'required'=>':attribute为必填项',
            'min'=>':attribute不少于:min个字符',
            'max'=>':attribute长度不超过:max个字符',
        ],[
            'register.nickname'=>'昵称',
            'register.account'=>'账户',
            'register.password'=>'密码',
            'register.validator'=>'邀请码',
            'register.confirm'=>'确认密码'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data=$request->input('register');
        if(thuser::where('account',$data['account'])->count()!=0){
            return redirect()->back()->with('accounterror',1);
        }
        if(thuser::where('nickname',$data['nickname'])->count()!=0){
            return redirect()->back()->with('nicknameerror',1);
        }
        if($data['password']!=$data['confirm']){
            return redirect()->back()->with('confirmerror',1);
        }
        if($data['validator']!="xljy"){
            return redirect()->back()->with('validatorerror',1);
        }
        $user=new thuser();
        if($data['validator']=="xljy"){
            $user->account=$data['account'];
            $user->password=$data['password'];
            $user->nickname=$data['nickname'];
            $user->save();
            Session::put('account',$data['account']);
            Session::put('nickname',$data['nickname']);
            return redirect('thindex');
        }
        else return redirect()->back();
    }
    public function login(){
        return view('treehole/thlogin');
    }
    public function index(){
        if(Session::has('admin_pass')){
            $message=thmessage::orderBy('id','asc')->get();
            $reply=threply::orderBy('id','asc')->get();
            return view('treehole/thindex',['messages'=>$message,'replys'=>$reply]);
        }
        else{
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        $account=Session::get('account');
        $masteruser=thuser::where('account','=',$account)->first();
        if($masteruser->id%2!=0){
            $pairuser=thuser::where('id','=',$masteruser->id+1)->first();
            if($pairuser==null){
                $message=thmessage::where('nickname','=',$masteruser->nickname)->orderBy('id','asc')->get();
                $reply=threply::where('account',$masteruser->account)->get();
            }
            else{
            $message=thmessage::where('nickname','=',$masteruser->nickname)->orWhere('nickname','=',$pairuser->nickname)->orderBy('id','asc')->get();
            $reply=threply::where('account',$masteruser->account)->orWhere('account',$pairuser->account)->get();
            }
        }
        else{
            $pairuser=thuser::where('id','=',$masteruser->id-1)->first();
            $message=thmessage::where('nickname',$masteruser->nickname)->orWhere('nickname',$pairuser->nickname)->orderBy('id','asc')->get();
        }
        if($pairuser==null){
        $reply=threply::where('account',$masteruser->account)->orderBy('id','asc')->get();
        }
        else{
            $reply=threply::where('account',$masteruser->account)->orWhere('account',$pairuser->account)->orderBy('id','asc')->get();
        }
        return view('treehole/thindex',['messages'=>$message,'replys'=>$reply]);
    }
    }
    }
    public function loginsolve(Request $request){
        $data=$request->input('login');
        $count=thuser::where('account',"$data[account]")->count();
        if($count){
        $user=thuser::where('account',"$data[account]")->first();
        if($user->password==$data['password']){
            Session::put('account',$user->account);
            Session::put('nickname',$user->nickname);
            return redirect('thindex');
        }
        else{
            return redirect()->back();
        }
        }
        else return redirect()->back();
    }
    public function thadd(){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        return view('treehole/add');
        }
    }
    public function addsolve(Request $request){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        $validator=Validator::make($request->input(),
        [
            'message.content'=>'required|max:300',
        ],[
            'required'=>':attribute为必填项',
            'max'=>':attribute长度不超过:max个字符',
        ],[
            'message.content'=>'内容',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data=$request->input('message');
        $Message=new thmessage();
        $Message->nickname=session('nickname');
        $Message->content=$data['content'];
        $Message->systime=date("Y-m-d H:i",time());
        $Message->account=session('account');
        $Message->save();
        if($Message->save())
            return redirect('thindex');
            else return redirect()->back();
    }
    }
    public function delete($id){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        $Message=thmessage::find($id);
            $Message->delete();
            return redirect('thindex');
        }
    }
    public function reply($id){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        $content=thmessage::find($id);
        return view('treehole/reply',[
            'content'=>$content
        ]);
        }
    }
    public function edit(Request $request,$id,$nickname,$account){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        $validator=Validator::make($request->input(),
        [
            'reply'=>'required|max:300',
        ],[
            'required'=>':attribute为必填项',
            'max'=>':attribute长度不超过:max个字符',
        ],[
            'reply'=>'内容',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $reply=new threply();
        $data=$request->input('reply');
        $reply->content=$data;
        $reply->replytime=date("Y-m-d H:i",time());
        $reply->mid=$id;
        $reply->nickname=$nickname;
        $reply->account=$account;
        $reply->mastername=session('nickname');
        $reply->save();
        return redirect('thindex');
    }
    }
    public function redelete($id){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        $reply=threply::find($id);
            $reply->delete();
            return redirect('thindex');
        }
    }
    public function rereply($id){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        $content=threply::find($id);
        return view('treehole/rereply',[
            'content'=>$content
        ]);
        }
    }
    public function reedit(Request $request,$mid,$nickname,$account){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        $validator=Validator::make($request->input(),
        [
            'reply'=>'required|max:300',
        ],[
            'required'=>':attribute为必填项',
            'max'=>':attribute长度不超过:max个字符',
        ],[
            'reply'=>'内容',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $reply=new threply();
        $data=$request->input('reply');
        $reply->content=$data;
        $reply->replytime=date("Y-m-d H:i",time());
        $reply->nickname=$nickname;
        $reply->account=$account;
        $reply->mid=$mid;
        $reply->mastername=session('nickname');
        $reply->save();
        return redirect('thindex');
    }
    }
    public function adminlogin(){
        return view('treehole/adminlogin');
    }
    public function adminloginsolve(Request $request){
        $data=$request->input('admin');
        if($data['account']=="sherman"&&$data['password']==123456){
            Session::put('admin_pass',1);
            return redirect('thindex');
        }
        else{
            return redirect()->back();
        }
    }
    public function adminlogout(){
        if(!Session::has('account')){
            return view('treehole/treehole');
        }
        else{
        Session::flush('admin_pass');
         return view('treehole/treehole');
    }
    }
}
