@extends('common.admin')

@section('admin_right')
    <div class="admin_right_diary">
        <h1 style="color: #ffffff;margin-left: 10px;">{{ $diaryCount }}</h1>
        <p style="color: #ffffff;margin-left: 10px;"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;日志</p>
        <div class="admin_right_diary_div">
            <a href="" style="color: #ffffff">More&nbsp;<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
    </div>
    <div class="admin_right_say">
        <h1 style="color: #ffffff;margin-left: 10px;">{{ $sayCount }}</h1>
        <p style="color: #ffffff;margin-left: 10px;"><span class="glyphicon glyphicon-edit"></span>&nbsp;说说</p>
        <div class="admin_right_say_div">
            <a href="" style="color: #ffffff">More&nbsp;<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
    </div>
    <div class="admin_right_message">
        <h1 style="color: #ffffff;margin-left: 10px;">{{ $messageCount }}</h1>
        <p style="color: #ffffff;margin-left: 10px;"><span class="glyphicon glyphicon-envelope"></span>&nbsp;留言</p>
        <div class="admin_right_message_div">
            <a href="" style="color: #ffffff">More&nbsp;<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
    </div>
    <div class="admin_right_image">
        <h1 style="color: #ffffff;margin-left: 10px;">{{ $imageCount }}</h1>
        <p style="color: #ffffff;margin-left: 10px;"><span class="glyphicon glyphicon-picture"></span>&nbsp;图片</p>
        <div class="admin_right_image_div">
            <a href="" style="color: #ffffff">More&nbsp;<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
    </div>

    <div class="admin_right_first_tab">
        <div class="tab_name"><b>日志</b></div>
        <div class="layui-tab layui-tab-card">
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-even lay-skin="nob">
                        <colgroup>
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>标题</th>
                            <th>发布时间</th>
                            <th>编辑</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($diary as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->published_at }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="admin_right_second_tab">
        <div class="tab_name"><b>说说</b></div>
        <div class="layui-tab layui-tab-card">
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-even lay-skin="nob">
                        <colgroup>
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>说说</th>
                            <th>发布时间</th>
                            <th>编辑</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($say as $key => $item2)
                        <tr>
                            <td>{{ $item2->id }}</td>
                            <td>{!! $item2->content !!}</td>
                            <td>{{ $item2->published_at }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="admin_right_third_tab">
        <div class="tab_name"><b>评论</b></div>
        <div class="layui-tab layui-tab-card">
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-even lay-skin="nob">
                        <colgroup>
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>评论</th>
                            <th>评论时间</th>
                            <th>编辑</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comment as $key => $item3)
                        <tr>
                            <td>{{ $item3->id }}</td>
                            <td>{!! $item3->content !!}</td>
                            <td>{{ $item3->comment_at }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="admin_right_fourth_tab">
        <div class="tab_name"><b>留言</b></div>
        <div class="layui-tab layui-tab-card">
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-even lay-skin="nob">
                        <colgroup>
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>留言</th>
                            <th>留言时间</th>
                            <th>编辑</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($message as $key => $item4)
                        <tr>
                            <td>{{ $item4->id }}</td>
                            <td>{!! $item4->content !!}</td>
                            <td>{{ $item4->leave_at }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--<div class="page">--}}
            {{--{!! $message->render() !!}--}}
        {{--</div>--}}
    </div>
@endsection