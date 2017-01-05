@extends('common.layout')

@section('siteleft')
    <button class="btn btn-primary" id="showmsgbox">发表留言</button>
    <div class="container" id="msgbox" style="width:70%;margin: 15px auto;display: none;">
        <form class="layui-form layui-form-pane">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="url" value="{{ url('storeMessage') }}">
            <textarea name="" id="message" cols="30" rows="10"></textarea>
            <button class="btn btn-primary btn-block" lay-submit lay-filter="msgbox">留言</button>
            <button class="btn btn-danger btn-block" id="hidemsgbox">取消</button>
        </form>
        </form>
    </div>

    @if(empty($msg))
        <div class="container" style="width:70%;border: 2px solid #2fa0ec; box-shadow: rgba(62, 62, 62, 0.87)">
            <blockquote class="layui-elem-quote layui-quote-nm">
                暂无留言
            </blockquote>
        </div>
    @else
        @foreach($msg as $key => $value)
            <div class="container" style="width:70%;border: 2px solid #2fa0ec; box-shadow: rgba(62, 62, 62, 0.87)">

                <blockquote class="">
                    {!! $value->content !!}
                    <span style="float: right">
                        {{ date("Y-m-d", $value->leave_at) }}
                    </span>
                </blockquote>

            </div>
        @endforeach
        <div class="container" style="width:70%;border: 2px solid #2fa0ec; box-shadow: rgba(62, 62, 62, 0.87)">
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