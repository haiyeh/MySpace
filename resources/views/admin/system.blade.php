@extends('common.admin')

@section('admin_right')
    <form class="layui-form" action="">
        <div class="container" style="margin-top: 50px;">
            <div class="system_left" style="float: left;width: 48%;margin-left: 1%;">
                <input type="hidden" id="url" value="{{ url('admin/systemSave') }}">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                <form class="layui-form" action="">
                    <h3>日志功能开关：</h3>
                    <div class="layui-input-block">
                        <input type="checkbox" id="diary_set" lay-skin="switch" >
                    </div>
                    <h3>说说功能开关：</h3>
                    <div class="layui-input-block">
                        <input type="checkbox" id="say_set" lay-skin="switch">
                    </div>
                    <h3>留言功能开关：</h3>
                    <div class="layui-input-block">
                        <input type="checkbox" id="message_set" lay-skin="switch">
                    </div>
                    <h3>相册浏览开关：</h3>
                    <div class="layui-input-block">
                        <input type="checkbox" id="album_set" lay-skin="switch">
                    </div>
                    <h3>评论功能开关：</h3>
                    <div class="layui-input-block">
                        <input type="checkbox" id="comment_set" lay-skin="switch">
                    </div>
                    <button class="layui-btn layui-btn-big" lay-submit lay-filter="system">保存</button>
                </form>
            </div>
            <div class="system_right" style="float: left;width: 28%;margin-left: 1%;border: 1px solid black;box-shadow: 2px 2px 2px 2px #eee;">
                <h2 style="color:red">注意事项：</h2>
                <p style="font-size:17px ;">
                    &nbsp;1).&nbsp;功能开关关闭后，对应的功能按钮或者入口将会消失；
                </p>
                <p style="font-size:17px ;">
                    &nbsp;2).&nbsp;如无系统故障或程序修改需要请保持开关开启状态
                </p>
            </div>
        </div>
    </form>
@endsection