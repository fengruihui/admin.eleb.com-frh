@extends('layout.defult')
@section('contents')
    @include('layout._errors')
    <h3>导航列表</h3>
    <table class="table table-bordered table-striped">
        <tr>
            <th>名称</th>
            <th>url地址</th>
            <th>操作</th>
        </tr>
        @foreach ($navs as $nav)
            <tr>
                <td>{{ $nav->name }}</td>
                <td>{{ $nav->url }}</td>
                <td>
                    <a href="{{route('nav.edit',[$nav])}}" class="btn btn-warning btn-xs">修改</a>
                    <form method="post" action="{{route('nav.destroy',[$nav])}}" style="display: inline">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-xs" onclick="return confirm('确定要删除吗?')">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@stop