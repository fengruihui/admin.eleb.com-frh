@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>店铺分类名称</td>
            <td>店铺名称</td>
            <td>店铺图片</td>
            <td>商铺是否显示</td>
            <td>起送金额</td>
            <td>配送费</td>
            <td>店公告</td>
            <td>优惠信息</td>
            <td>是否是品牌</td>
            <td>是否准时送达</td>
            <td>是否蜂鸟配送</td>
            <td>是否保标记</td>
           	<td>是否票标记</td>
           	<td>是否准标记</td>
            <td>商铺目前的状态</td>
            <td>操作</td>

        </tr>
        @foreach ($shops as $shop)
            <tr>
             {{--  <td>{{$shop->shop_category_id}}</td>--}}
                <td>{{$shop->ShopCategory->name}}</td>
                <td>{{$shop->shop_name}}</td>
                <td>@if($shop->shop_img)<img src="{{\Illuminate\Support\Facades\Storage::url($shop->shop_img)}}" width="20px"/>@endif</td>
                <td>{{$shop->status?'显示':'不显示'}}</td>
                <td>{{$shop->start_send}}</td>
                <td>{{$shop->send_cost}}</td>
                <td>{{$shop->notice}}</td>
                <td>{{$shop->discount}}</td>
               {{-- brand	boolean	是否是品牌
                on_time	boolean	是否准时送达
                fengniao	boolean	是否蜂鸟配送
                bao	boolean	是否保标记
                piao	boolean	是否票标记
                zhun	boolean	是否准标记
                start_send	float	起送金额
                send_cost	float	配送费
                notice	string	店公告
                discount	string	优惠信息--}}
                <td>{{$shop->brand?'是':'否'}}</td>
                <td>{{$shop->on_time?'是':'否'}}</td>
                <td>{{$shop->fengniao?'是':'否'}}</td>
                <td>{{$shop->bao?'是':'否'}}</td>
                <td>{{$shop->piao?'是':'否'}}</td>
                <td>{{$shop->zhun?'是':'否'}}</td>
                <td>@if($shop->status==1)正常@elseif($shop->status==0)待审核@else($shop->status==-1)禁用@endif</td>
                <td>
                    <form action="{{route('shop.destroy',[$shop])}}" method="post">
                        <button class="btn-danger btn-xs" onclick="return confirm('确定要删除吗?')">删除</button>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                    </form>
                    <button class="btn-danger btn-xs"><a href="{{route('shop.edit',[$shops])}}">修改</a></button>
            </tr>
        @endforeach

    </table>
    {{$shops->links()}}
@stop