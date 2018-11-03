@extends('layout.defult')
@section('contents')
    @include('vendor.ueditor.assets')
    <h1>活动添加</h1>
    <form method="post" action="{{route('activ.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group form-inline">
                <label>活动名称</label>
                <input type="text" name="title" class="form-control" value="{{old('name')}}">{{$errors->first('title')}}
            </div>

            <div class="form-group form-inline">
                <label>开始时间</label>
                <input type="date" name="start_time" class="form-control" value="">{{$errors->first('start_time')}}
            </div>

            <div class="form-group form-inline">
                <label>结束时间</label>
                <input type="date" name="end_time" class="form-control" value="">{{$errors->first('end_time')}}
            </div>
            <lable><h3>活动内容</h3></lable>
            <script type="text/javascript">
                var ue = UE.getEditor('container');
                ue.ready(function() {
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                });
            </script>
            <script id="container" name="content" type="text/plain"></script>
        </div>
        {{csrf_field()}}
        <button class="btn-block btn-sm">提交</button>
    </form>
@stop