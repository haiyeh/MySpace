<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>

</head>
<body>

    @section('admin_top')
        <div class="admin_top">
            <div class="admin_top_left">
                <h3 style="color: #ffffff;">内容管理系统</h3>
            </div>
            <div class="admin_top_right">
                <img src="http://localhost/Upload/2016-12-29/default.jpg" class="img-circle" style="width: 35px;height: 35px;">
                <b style="padding-top: 25px;color: #ffffff;">administor</b>
            </div>
        </div>
    @show

    @section('admin_left')
        <div class="admin_left">
            <ul class="layui-nav layui-nav-tree" lay-filter="test" style="width: 100%">
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="{{ url('admin') }}">首页</a>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;">日志管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ url('admin/diary') }}">日志列表</a></dd>
                        <dd><a href="{{ url('admin/comment') }}">评论管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">说说管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ url('admin/say') }}">说说列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">相册管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ url('admin/album') }}">相册列表</a></dd>
                        <dd><a href="{{ url('admin/image') }}">图片管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ url('admin/user') }}">用户列表</a></dd>
                        <dd><a href="{{ url('admin/city') }}">城市列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">留言管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ url('admin/message') }}">留言列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">其他设置</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ url('admin/system') }}">系统管理</a></dd>
                        <dd><a href="{{ url('admin/menu') }}">菜单管理</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    @show

    <div class="admin_right">
        @yield('admin_right')
    </div>

    @section('admin_bottom')
        <div class="admin_bottom">
            赣@并没有备案
        </div>
    @show

    <script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>