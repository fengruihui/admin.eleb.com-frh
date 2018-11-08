<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionController extends Controller
{
    public function create(){

        return view('session.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=> 'required',
            'password'=>'required',
            'email'=>'email'
        ],[
            'name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'email.email'=>'邮箱格式不对哦',
        ]);

        //验证数据库是否有该帐号密码
        if (Auth::attempt(['name'=>$request->name,'email'=>$request->email,'password'=>$request->password])){
            return redirect(route('admin.index'))->with('success','登录成功');
        }else{
            return redirect(route('login'))->with('danger','检查一下您的用户名!密码!以及邮箱是否正确哦')->withInput();
        }
    }

   public function destroy(){
        Auth::logout();
        return redirect(route('login'))->with('success','退出成功');
    }
}
