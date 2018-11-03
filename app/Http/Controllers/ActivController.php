<?php

namespace App\Http\Controllers;

use App\Models\Activ;
use Illuminate\Http\Request;

class ActivController extends Controller
{
    //未开始的活动
    public function unactiv(){

        $activs=Activ::where('start_time','>',date('Y-m-d H:i:s',time()))->get();
        return view('activ.index',['activs'=>$activs]);
    }
    //正在进行的活动
    public function conduct(){
        $activs=Activ::where('start_time','<',date('Y-m-d H:i:s',time()))->get();
        return view('activ.index',['activs'=>$activs]);
    }

    //结束的活动
    public function end(){

        $activs=Activ::where('end_time','<',date('Y-m-d H:i:s',time()))->get();
        return view('activ.index',['activs'=>$activs]);
    }
    public function index(){

        $activs=Activ::all();
        return view('activ.index',['activs'=>$activs]);
    }
    //活动详情
    public function show(Activ $activ){
        return view('activ.show',['activ'=>$activ]);
    }

    public function create(){
        return view('activ.add');
    }
    public function store(Request $request){
        Activ::create([
        'title'=>$request->title,
        'content'=>$request->content,
        'start_time'=>$request->start_time,
        'end_time'=>$request->end_time
        ]);
        session()->flash('success','添加成功');
        return redirect(route('activ.index'));
    }

    public function destroy(Activ $activ){
        $activ->delete();
        session()->flash('success','删除成功');
        return redirect(route('activ.index'));
    }

    public function edit(Activ $activ){
        return view('activ.edit',['activ'=>$activ]);
    }
    public function update(Request $request,Activ $activ){
        $activ->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time
        ]);
        session()->flash('success','修改成功');
        return redirect(route('activ.index'));
    }
}
