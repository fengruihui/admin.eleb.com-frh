<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class ShopUserController extends Controller
{
    public function index(){
        $users=User::paginate(2);
        return view('user.index',['users'=>$users]);
    }
    public function edit(User $user){
        return view('user.edit',['user'=>$user]);
    }
    public function update(User $user,Request $request){
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        session()->flash('success','修改成功');
        return redirect(route('user.index'));
    }

    public function destroy(User $user){
        $user->delete();
        session()->flash('success','删除成功');
        return redirect(route('user.index'));
    }
    public function show(){

    }
}
