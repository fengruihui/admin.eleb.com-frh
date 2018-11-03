<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersessionController extends Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=> 'required',
            'password'=>'required',

        ],[
            'name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',

        ]);

        //验证数据库是否有该帐号密码
        if (Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            dd($request->name);
            return redirect()->intended(route('user.index'))->with('sucess','登录成功');
        }else{
            return redirect(route('land'))->with('danger','检查一下您的用户名!密码!以及邮箱是否正确哦')->withInput();
        }
    }
    //退出登录
    public function destroy(){
        Auth::logout();
        return redirect(route('land'))->with('success','退出成功');
    }

    //修改商户的个人密码

}
