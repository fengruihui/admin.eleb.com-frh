@extends('layout.defult')
@section('contents')
    @include('layout._errors')
    <form class="form-horizontal" action="{{route('role.update',[$role])}}" method="post" enctype="multipart/form-data">

        <h1>修改角色权限</h1>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">权限名称</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="权限名称" value="{{$role->name}}">
            </div>
        </div>
        <div>
            @foreach($permissions as $permission)
                <label class="checkbox-inline">
                    <input type="checkbox" name="permissions[]" value="{{$permission->name}}" @if($role->hasPermissionTo($permission))checked @endif>
                    {{$permission->name}}
                </label>
            @endforeach
        </div>
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop