@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>活动名称</td>
            <td>活动详情</td>
            <td>活动开始时间</td>
            <td>活动结束时间</td>
        </tr>

            <tr>
                <td>{{$activ->title}}</td>
                <td>{!! $activ->content !!}</td>
                <td>{{$activ->start_time}}</td>
                <td>{{$activ->end_time}}</td>
            </tr>
    </table>
@stop