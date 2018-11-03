@extends('layout.defult')

@section('contents')
    <form class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    </form>
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>活动名称</td>
            <td>活动开始时间</td>
            <td>活动结束时间</td>
            <td>操作</td>

        </tr>
        @foreach ($activs as $activ)
            <tr>
                <td><a href="{{route('activ.show',[$activ])}}">{{$activ->title}}</a></td>
                <td>{{$activ->start_time}}</td>
                <td>{{$activ->end_time}}</td>
                <td>
                    <form action="{{route('activ.destroy',[$activ])}}" method="post">
                        <button class="btn-danger btn-xs" onclick="return confirm('确定要删除吗?')">删除</button>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                    </form>
                   <button class="btn-danger btn-xs"><a href="{{route('activ.edit',[$activ])}}">修改</a></button>
                </td>
            </tr>
        @endforeach
    </table>
@stop