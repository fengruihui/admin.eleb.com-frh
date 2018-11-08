@extends('layout.defult')
@section('contents')
    @include('layout._errors')
    <form class="form-horizontal" action="{{route('role.store')}}" method="post" enctype="multipart/form-data">

        <h1>添加角色</h1>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="角色名称">
            </div>
            <div class="form-group form-inline">
                <label><h3>相关权限</h3></label>
                @foreach($permissions as $permission)
                <input type="checkbox" name="permission[]" class="form-control" value="{{$permission->id}}">
                    {{$permission->name}}
                @endforeach
            </div>
        </div>
        {{ csrf_field() }}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop