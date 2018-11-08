@extends('layout.defult')
@section('contents')
    @include('layout._errors')
    <form class="form-horizontal" action="{{route('permission.store')}}" method="post" enctype="multipart/form-data">

        <h1>添加权限</h1>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">权限名称</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="权限名称">
            </div>
        </div>
        {{ csrf_field() }}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop