<?php
 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use Illuminate\Support\Facades\Session;
use App\message;

class UserController extends Controller{
     public function login(){
         return view('login');
     }
     public function admin(Request $request){
         $data=$request->input('admin');
         $count=admin::where('account',"$data[admin_user]")->count();
         if($count){
         $admin=admin::where('account',"$data[admin_user]")->first();
         if($admin->password==$data['admin_pass']){
             Session::put('admin_pass','1');
             return redirect('index');
         }
         else{
             return redirect()->back();
         }
         }
         else return redirect()->back();
     }
     public function logout(){
         Session::flush('admin_pass');
         return redirect('index');
     }
     public function trans(){
        return view('register');
    }
    public function register(Request $request){
        $data=$request->input('register');
        $user=new admin();
        if($data['admin_key']=="212nb"){
            $user->account=$data['admin_user'];
            $user->password=$data['admin_pass'];
            $user->save();
            return redirect('index');
        }
        else return redirect()->back();
    }

    public function verify($id)
        {
            $Message=message::find($id);
            $Message->ifshow=1;
            $Message->save();
            return redirect('index');
        }
    public function delete($id)
        {
            $Message=message::find($id);
            $Message->delete();
            return redirect('index');
        }
    public function hide($id)
        {
            $Message=message::find($id);
            $Message->ifshow=0;
            $Message->save();
            return redirect('index');
        }
    public function reply($id){
            $content=message::find($id);
            return view('reply',[
                'content'=>$content
            ]);
        }
    public function settop($id)
        {
            $Message=message::find($id);
            $Message->settop=1;
            $Message->save();
            return redirect('index');
        }
    public function unsettop($id)
        {
            $Message=message::find($id);
            $Message->settop=0;
            $Message->save();
            return redirect('index');
        }
 }
