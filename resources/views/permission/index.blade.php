@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>权限名称</td>
            <td>操作</td>

        </tr>
        @foreach ($permissions as $permission)
            <tr>

                <td>{{$permission->name}}</td>
                <td>
                    <form action="{{route('permission.destroy',[$permission])}}" method="post">
                        <button class="btn-danger btn-xs" onclick="return confirm('确定要删除吗?')">删除</button>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                    </form>
                    <button class="btn-danger btn-xs"><a href="{{route('permission.edit',[$permission])}}">修改</a></button>
                </td>
            </tr>
        @endforeach
    </table>
@stop