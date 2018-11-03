@extends('layout.defult')
@section('contents')
<h1>商家分类添加</h1>
    <form method="post" action="{{route('shopCategory.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group form-inline">
                <label>分类名称</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">{{$errors->first('name')}}
            </div>

            <div class="form-group-sm form-inline">
                <label>分类图片</label>
                <input type="file" name="img" class="form-group-sm">{{$errors->first('img')}}
            </div>

            <div class="form-group form-inline">
                <label><h3>状态:</h3></label>
                <input type="radio" name="status" class="form-control" value="1">显示{{$errors->first('status')}}
                <input type="radio" name="status" class="form-control" value="0">不显示
            </div>
        </div>
        {{csrf_field()}}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop