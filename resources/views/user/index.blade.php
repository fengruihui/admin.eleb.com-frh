@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>商家用户名</td>
            <td>商家邮箱</td>
            <td>创建时间</td>
            <td>操作</td>

        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <form action="{{route('user.destroy',[$user])}}" method="post">
                        <button class="btn-danger btn-xs" onclick="return confirm('确定要删除吗?')">删除</button>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                    </form>
                    <a href="{{route('user.edit',[$user])}}">修改</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$users->links()}}
@stop