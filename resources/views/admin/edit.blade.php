@extends('layout.defult')
@section('contents')
    <h1>管理员信息修改</h1>
    <form method="post" action="{{route('admin.update',[$admin])}}" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group form-inline">
                <label>管理员名称</label>
                <input type="text" name="name" class="form-control" value="{{$admin->name}}">{{$errors->first('name')}}
            </div>

            <div class="form-group form-inline">
                <label>管理员邮箱</label>
                <input type="text" name="email" class="form-control" value="{{$admin->email}}">{{$errors->first('email')}}
            </div>
            <div class="form-group form-inline">
                <label><h3>相关角色</h3></label>
                @foreach($roles as $role)
                    <input type="checkbox" name="role[]" class="form-control" value="{{$role->id}}" @if($admin->hasRole($role)) checked @endif>
                    {{$role->name}}
                @endforeach
            </div>
        </div>
        {{csrf_field()}}
        {{method_field('put')}}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop