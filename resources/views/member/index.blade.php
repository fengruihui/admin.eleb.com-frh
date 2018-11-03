@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>会员名称</td>
            <td>会员联系电话</td>
            <td>注册时间</td>
        </tr>
        @foreach($members as $member)
            <tr>
                <td>{{$member->username}}</td>
                <td>{{$member->tel}}</td>
                <td>{{$member->created_at}}</td>
            </tr>
        @endforeach

    </table>

@stop