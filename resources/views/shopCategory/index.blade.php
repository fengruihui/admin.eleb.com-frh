@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>商家分类名称</td>
            <td>商家分类图片</td>
            <td>创建时间</td>
            <td>状态</td>
            <td>操作</td>

        </tr>
        @foreach ($rows as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>@if($row->img)<img src="{{\Illuminate\Support\Facades\Storage::url($row->img)}}" width="20px"/>@endif</td>
                <td>{{$row->created_at}}</td>
                <td>{{$row->status?'显示':'不显示'}}</td>
                <td>
                    <form action="{{route('shopCategory.destroy',[$row])}}" method="post">
                        <button class="btn-danger btn-xs" onclick="return confirm('确定要删除吗?')">删除</button>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                    </form>
                    <a href="{{route('shopCategory.edit',[$row])}}">修改</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$rows->links()}}
@stop