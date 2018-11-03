<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //
    public function index(){
        $shops=Shop::paginate(2);
        return view('shop.index',['shops'=>$shops]);
    }

    public function show(){

    }
    //添加表单
    public function create(){
        $shops=ShopCategory::all();//商家分类表的信息
        return view('shop.add',['shops'=>$shops]);
    }
    //添加保存数据

    public function store(Request $request){
       /* $this->validate($request, [
            'shop_name' => 'required|min:2|max:30',
            'start_send' => 'required',
            'send_cost' => 'required',
            'notice' => 'required|between:3,50',
            'discount' => 'between:3,50',
            'name' => 'required|between:2,10|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|between:3,10|confirmed',
        ],[
            'shop_name.required'=>'商家名不能为空',
            'shop_name.min'=>'商家不能少于2个字',
            'name.unique' => '用户名已存在',
            'start_send.required' => '起送金额不能为空',
            'send_cost.required' => '配送费不能为空',
            'notice.between' => '店铺公告3-50个字符之间',
            'notice.required' => '店铺公告不能为空',
            'discount.between' => '优惠信息3-50个字符之间',
            'password.required'=>'密码不能为空'
        ]);*/
        $path=$request->file('shop_img')->store('public/shop');
        //开启事务
        DB::beginTransaction();

        try {
            $shops=Shop::create([
                'shop_category_id'=>$request->shop_category_id,
                'shop_name'=>$request->shop_name,
                'shop_img'=>$path,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,

                'brand'=>$request->brand??0,
                'on_time'=>$request->on_time??0,
                'fengniao'=>$request->fengniao??0,
                'bao'=>$request->bao??0,
                'piao'=>$request->piao??0,
                'zhun'=>$request->zhun??0,
                'status'=>0,
            ]);

            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'status'=>1,//是否可用
                'shop_id'=>$shops->id,
            ]);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('shop.index')->with('success', '添加商铺与账号成功');

    }
    //删除数据
    public function destroy(Shop $shop){
        $shop->delete();
        session()->flash('success','删除成功');
        return redirect(route('shop.index'));
    }

    //修改前获取一条数据
    public function edit(Shop $shop){//商店信息表的
        $ShopCategorys=ShopCategory::all();//查的分类
        return view('shop.edit',['shop'=>$shop],['ShopCategorys'=>$ShopCategorys]);
    }

    public function update(Shop $shop ,Request $request){
        if($request->shop_img=$request->file('shop_img')) { //判断是否有图片没有就修改
            $path=$request->file('shop_img')->store('public/shop');
            $shop->update([
                'shop_category_id'=>$request->shop_category_id,
                'shop_name'=>$request->shop_name,
                'shop_img'=>$path,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,
                'brand'=>$request->brand??0,
                'on_time'=>$request->on_time??0,
                'fengniao'=>$request->fengniao??0,
                'bao'=>$request->bao??0,
                'piao'=>$request->piao??0,
                'zhun'=>$request->zhun??0,
                'status'=>0,
            ]);
        }else{
            $shop->update([
                'shop_category_id'=>$request->shop_category_id,
                'shop_name'=>$request->shop_name,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,

                'brand'=>$request->brand??0,
                'on_time'=>$request->on_time??0,
                'fengniao'=>$request->fengniao??0,
                'bao'=>$request->bao??0,
                'piao'=>$request->piao??0,
                'zhun'=>$request->zhun??0,
                'status'=>0
                ]);
        }
        session()->flash('success','店铺修改修改成功');
        return redirect(route('shop.index'));
    }

    public function ban(){
       $shops=Shop::where('status',0)->paginate(2);
        return view('shop.ban',['shops'=>$shops]);
    }
    public function audit(Shop $shop){
       $shop->update([
           'status'=>1
        ]);
        session()->flash('success','已通过审核');
        return redirect(route('ban',['shops'=>$shop]));
    }
}
