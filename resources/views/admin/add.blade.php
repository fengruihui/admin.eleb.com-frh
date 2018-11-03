@extends('layout.defult')
@section('contents')
    <h1>管理员添加</h1>
    <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group form-inline">
                <label>管理员名称</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">{{$errors->first('name')}}
            </div>

            <div class="form-group form-inline">
                <label>管理员邮箱</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">{{$errors->first('email')}}
            </div>

            <div class="form-group form-inline">
                <label>密码</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">{{$errors->first('password')}}
            </div>
            <div class="form-group form-inline">
                <label>确认密码</label>
                <input type="password" name="password_confirmation" class="form-control" value="{{old('password')}}">{{$errors->first('password_confirmation')}}
            </div>
        </div>
        {{csrf_field()}}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop