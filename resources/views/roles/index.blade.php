@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>角色名称</td>
            <td>操作</td>

        </tr>

        @foreach ($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>
                    <form action="{{route('role.destroy',[$role])}}" method="post">
                        <button class="btn-danger btn-xs" onclick="return confirm('确定要删除吗?')">删除</button>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                    </form>
                    <button class="btn-danger btn-xs"><a href="{{route('role.edit',[$role])}}">修改</a></button>
                </td>
            </tr>
        @endforeach
    </table>
@stop