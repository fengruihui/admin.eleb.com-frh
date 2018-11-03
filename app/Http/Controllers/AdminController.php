<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller{

        public function index(){
            $admins= Admin::all();
          return view('admin.index',['admins'=>$admins]);
        }
        public function show(){

        }

        //添加管理员
        public function create(){
            return view('admin.add');
        }

        public function store(Request $request){

            $this->validate($request, [
                'name' => 'required',
                'email'=>'email',
                'password' =>['required','confirmed'],
                'password_confirmation'=>['required',"same:password"//不为空,两次密码是否相同
                ],
            ],[
                'name.required'=>'用户名不能为空',
                'password.required'=>'密码不能为空',
                'password.confirmed'=>'两次输入的密码不一致哦',
                'password_confirmation.required'=>"确认密码不能为空",
                'email.email'=>'邮箱不能为空',
            ]);

            Admin::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)

            ]);
            session()->flash('success','添加成功');
            return redirect(route('admin.index'));
        }
        //删除用户
        public function destroy(Admin $admin){
            $admin->delete();
            session()->flash('success','删除成功');
            return redirect(route('admin.index'));
        }
        public function edit(Admin $admin){
            return view('admin.edit',['admin'=>$admin]);
        }

        public function update(Admin $admin,Request $request){
            $admin->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ]);
            session()->flash('success','修改成功');
            return redirect(route('admin.index'));
        }
        //修改管理员密码
        public function change(Admin $admin){
                return view('admin.change',['admin'=>$admin]);
        }

        public function change_save(Request $request){
            //数据验证

            $this->validate($request,[
                'old_password'=>'required',
                'password'=>'required|confirmed',
            ],[
                'old_password.required'=>'必须输入旧密码',
                'password.required'=>'请设置新密码',
                'password.confirmed'=>'两次密码输入不一致,请重新输入',
            ]);

            if(Hash::check($request->old_password,auth()->user()->password)){
                auth()->user()->update([
                    'password' => bcrypt($request->password),
                ]);
                return redirect()->route('login')->with('success','管理员密码修改成功');
            }else{
                return redirect()->route('change.change_save')->with('success','旧密码错误');
            }
    }

}
