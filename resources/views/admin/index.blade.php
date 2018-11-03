@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>管理员名称</td>
            <td>管理员邮箱</td>
            <td>创建时间</td>
            <td>操作</td>
        </tr>
        @foreach ($admins as $admin)
            <tr>
                   <td>{{$admin->name}}</td>
                   <td>{{$admin->email}}</td>
                    <td>{{$admin->created_at}}</td>
                <td>
                    <form action="{{route('admin.destroy',[$admin])}}" method="post">
                        <button class="btn-danger btn-xs" onclick="return confirm('确定要删除吗?')">删除</button>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                    </form>
                    <a href="{{route('admin.edit',[$admin])}}">修改</a>
                </td>
            </tr>
        @endforeach
    </table>

@stop