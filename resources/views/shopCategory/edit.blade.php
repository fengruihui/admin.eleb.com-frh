@extends('layout.defult')
@section('contents')

    <form method="post" action="{{route('shopCategory.update',[$shopCategory])}}" enctype="multipart/form-data">
        <div class="form-group">
            <label>分类名称</label>
            <input type="text" name="name" class="form-control" value="{{$shopCategory->name}}">
            <div class="form-group-sm">
                <label>头像</label>
                @if($shopCategory->img)<img src="{{\Illuminate\Support\Facades\Storage::url($shopCategory->img)}}" width="50px"/>@endif<input type="file" name="img" class="form-group-sm">
            </div>
            <label><h3>状态:</h3></label>
            <input type="radio" name="status" value="1" @if($shopCategory->status==1) checked="checked" @endif>显示
            <input type="radio" name="status"  value="0" @if($shopCategory->status==0) checked="checked" @endif>不显示
        </div>
        {{csrf_field()}}
        {{method_field('PUT')}}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop