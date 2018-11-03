<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>

            </button>
            <a class="navbar-brand" href="#">饿了后台</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家类 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('shopCategory.create')}}">商家分类添加</a></li>
                        <li><a href="{{route('shop.create')}}">商家信息添加</a></li>
                        <li><a href="{{route('user.index')}}">商家帐号信息</a></li>
                        <li><a href="{{route('shopCategory.index')}}">商家分类</a></li>
                        <li><a href="{{route('shop.index')}}">商家信息</a></li>
                        <li><a href="{{route('ban')}}">商家商家审核</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家活动类<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('activ.create')}}">商家活动添加</a></li>
                        <li><a href="{{route('activ.index')}}">商家活动信息</a></li>
                        <li><a href="{{route('unactiv')}}">未开始的活动</a></li>
                        <li><a href="{{route('conduct')}}">进行中的的活动</a></li>
                        <li><a href="{{route('end')}}">已经结束的活动</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">会员列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('member.index')}}">会员列表</a></li>

                    </ul>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('login')}}">普通用户</a></li>
                @endguest
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.create')}}">管理员添加</a></li>
                        <li><a href="{{route('login')}}">管理员登录</a></li>
                        <li><a href="{{route('admin.index')}}">管理员信息</a></li>
                        <li><a href="{{route('change')}}">修改管理员密码</a></li>
                        <li><a href="{{route('logout')}}">管理员退出</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>