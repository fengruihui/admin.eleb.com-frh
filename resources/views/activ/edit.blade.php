@extends('layout.defult')
@section('contents')
    @include('vendor.ueditor.assets')
    <h1>修改活动</h1>
    <form method="post" action="{{route('activ.update',[$activ])}}" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group form-inline">
                <label>活动名称</label>
                <input type="text" name="title" class="form-control" value="{{$activ->title}}">{{$errors->first('title')}}
            </div>

            <div class="form-group form-inline">
                <label>开始时间</label>
                <input type="datetime-local" name="start_time" class="form-control" value="{{date('Y-m-d\TH:i:s',strtotime($activ->start_time))}}">{{$errors->first('start_time')}}
            </div>

            <div class="form-group form-inline">
                <label>结束时间</label>
                <input type="datetime-local" name="end_time" class="form-control" value="{{date('Y-m-d\TH:i:s',strtotime($activ->end_time))}}">{{$errors->first('end_time')}}
            </div>
            <lable><h3>活动内容</h3></lable>
            <script type="text/javascript">
                var ue = UE.getEditor('container');
                ue.ready(function() {
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                });
            </script>
            <script id="container" name="content" type="text/plain">{!! $activ->content !!}</script>
        </div>
        {{csrf_field()}}
        {{method_field('put')}}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop