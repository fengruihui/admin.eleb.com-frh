@extends('layout.defult')
@section('contents')
    @include('layout._errors')
    <form class="form-horizontal" action="{{route('shop.update',[$shop])}}" method="post" enctype="multipart/form-data">
        {{method_field('PUT')}}}
        {{ csrf_field() }}
        <h1>修改店铺信息</h1>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺分类</label>
            <div class="col-sm-10">
                <select class="form-control" name="shop_category_id">
                    @foreach($ShopCategorys as $ShopCategory)

                        <option value="{{$ShopCategory->id}}"
                                @if($ShopCategory->id==$shop->shop_category_id)selected="selected"@endif>
                            {{$ShopCategory->name}}
                                </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺名称</label>
            <div class="col-sm-10">
                <input type="text" name="shop_name" class="form-control" id="inputEmail3" placeholder="名称"
                       value="{{$shop->shop_name}}">
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-sm">
                <label>店铺图片</label>
                @if($shop->shop_img)<img src="{{\Illuminate\Support\Facades\Storage::url($shop->shop_img)}}" width="50px"/>@endif<input type="file" name="shop_img" class="form-group-sm">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">服务</label>
            <div class="col-sm-10">

                <label class="checkbox-inline">
                    <input type="checkbox" name="brand" id="inlineCheckbox1" value="1" @if($shop->brand==1)checked="checked"@endif>是否是品牌
                </label>

                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="1" @if($shop->brand==1)checked="checked" @endif name="on_time"> 是否准时送达
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="1" @if($shop->brand==1)checked="checked" @endif name="fengniao"> 是否蜂鸟配送
                </label>

                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="1" @if($shop->bao==1)checked="checked" @endif name="bao"> 是否保标记
                </label>

                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="1" @if($shop->piao==1)checked="checked" @endif name="piao"> 是否票标记
                </label>

                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="1" @if($shop->zhun==1)checked="checked" @endif name="zhun"> 是否准标记
                </label>

            </div>
        </div>


        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">起送金额</label>
            <div class="col-sm-10">
                <input type="number" name="start_send" class="form-control" id="inputEmail3" placeholder="起送金额" value="{{$shop->start_send}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">配送费</label>
            <div class="col-sm-10">
                <input type="number" name="send_cost" class="form-control" id="inputEmail3" placeholder="配送费" value="{{$shop->send_cost}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店公告</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="notice" rows="3">{{ $shop->notice }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">优惠信息</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="discount" rows="3">{{ $shop->discount}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop