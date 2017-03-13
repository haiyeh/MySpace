@extends('common.layout')

@section('siteleft')
    @if(!empty(session('username')))
        <button class="layui-btn" id="showmsgbox">发表留言</button>
    @else
        <a href="{{ url('auth/login') }}">登陆</a>后才能发表留言哦
    @endif
    <div class="container" id="msgbox" style="width:70%;margin: 15px auto;display: none;">
        <form class="layui-form layui-form-pane">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="url" value="{{ url('storeMessage') }}">
            <textarea name="" id="message" lay-verify="msg_verify" cols="30" rows="10"></textarea>
            <button class="layui-btn btn-block" lay-submit lay-filter="msgbox">留言</button>
            <button class="btn btn-danger btn-block" id="hidemsgbox">取消</button>
        </form>
        </form>
    </div>

    @if(empty($msg))
        <div class="container" style="width:70%;border: 2px solid #2fa0ec; box-shadow: rgba(62, 62, 62, 0.87)">
            <h1>暂无留言，舒适的沙发等着你来~~~</h1>
        </div>
    @else
        @foreach($msg as $key => $value)
            <div class="container" style="width:70%;border-top: 2px solid green;margin-top:25px; box-shadow: rgba(62, 62, 62, 0.87)">
                <img src="{{ $value->headpath }}" alt="" class="img-thumbnail img-responsive" style="width: 80px;height: 80px;float: left">
                <span style="margin-top: 5px;margin-left: 5px;float: left">{{ $value->username }}</span><p style="text-indent: 600px;">{{ $value->id }}楼</p>
                <blockquote style="margin-top: 35px;margin-left: 100px;">
                    {!! $value->content !!}
                    <span style="float: right">
                        {{ date("Y-m-d", $value->leave_at) }}
                    </span>
                </blockquote>

            </div>
        @endforeach
        <div class="container" style="width:70%;">
            {!! $msg->render() !!}
        </div>
    @endif
    <script type="text/javascript">
        $("#showmsgbox").on('click',function () {
            $("#msgbox").toggle("slow", function () {
                $("#hidemsgbox").on('click', function () {
                    $("#msgbox").fadeOut('slow');
                });
            });
        });
    </script>
@endsection