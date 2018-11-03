<?php

namespace App\Http\Controllers;

use App\Models\ShopCategory;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    //
    public function index(){

        $rows=ShopCategory::paginate(2);
        return view('shopCategory.index',['rows'=>$rows]);
    }
    public function create(){
        return view('shopCategory.add');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:2|max:30',
            'img'=>'required|file',
            'status'=>'required'
        ],[
            'name.required'=>'用户名不能为空',
            'name.min'=>'用户名不能少于2个字',
            'name.max'=>'用户名不能大于10个字',
            'img.required'=>'图片不能为空哦',
            'status.required'=>'状态不能为空'
        ]);
        $path=$request->file('img')->store('public/shop');
        ShopCategory::create([
            'name'=>$request->name,
            'img'=>$path,
            'status'=>$request->status
        ]);
        session()->flash('success','添加成功');
        return redirect(route('shopCategory.index'));
    }
    public function show(){

    }
    //删除用户
    public function destroy(ShopCategory $shopCategory){

        $shopCategory->delete();
        session()->flash('success','删除成功');
        return redirect(route('shopCategory.index'));
    }
    //修改前获取一条数据
    public function edit(ShopCategory $shopCategory){
        return view('shopCategory.edit',['shopCategory'=>$shopCategory]);
    }

   public function update(ShopCategory $shopCategory, Request $request){
        if($request->cover=$request->file('img')) { //判断是否有图片没有就修改

            $path=$request->file('img')->store('public/shop');

            $shopCategory->update([
                'name'=>$request->name,
                'img'=>$path
            ]);
        }else{
            $shopCategory->update([
                'name'=>$request->name ]);
        }
        session()->flash('success','修改成功');
       return redirect(route('shopCategory.index'));
    }

}
