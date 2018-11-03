@extends('layout.defult')

@section('contents')
    <table border="1" class=" table table-bordered table-striped">
        <tr>
            <td>店铺分类名称</td>
            <td>店铺名称</td>
            <td>店铺图片</td>
            <td>商铺是否显示</td>

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

                <td>@if($shop->status==1)正常@elseif($shop->status==0)待审核@else($shop->status==-1)禁用@endif</td>
                <td>
                    <button class="btn-danger btn-xs"><a href="{{route('audit',[$shop])}}">通过审核</a></button>
            </tr>
        @endforeach

    </table>
    {{$shops->links()}}
@stop