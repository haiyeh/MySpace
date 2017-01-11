<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加资源链</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h1>NEW LINK</h1>
            </div>
        </div>

        <form action="" class="layui-form layui-form-pane">
            <div class="layui-form-item">
                <input type="hidden" id="url" value="{{ url('admin/storeSource') }}">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                <label class="layui-form-label">名称</label>
                <div class="layui-input-block">
                    @if(isset($source))
                        <input type="text" id="source_name" name="source_name" value="{{ $source->source_name }}" required  lay-verify="required" autocomplete="off" class="layui-input">
                    @else
                        <input type="text" id="source_name" name="source_name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    @endif
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">链接</label>
                <div class="layui-input-block">
                    @if(isset($source))
                        <input type="text" id="source_link" name="source_link" value="{{ $source->source_link }}" required  lay-verify="required" autocomplete="off" class="layui-input">
                    @else
                        <input type="text" id="source_link" name="source_link" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    @endif
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">分享</label>
                <div class="layui-input-block">
                    @if(isset($source) && $source->status == 1)
                        <input type="radio" name="status" value="1" title="公开" checked>
                        <input type="radio" name="status" value="0" title="私密">
                    @elseif(isset($source) && $source->status == 0)
                        <input type="radio" name="status" value="1" title="公开">
                        <input type="radio" name="status" value="0" title="私密" checked>
                    @else
                        <input type="radio" name="status" value="1" title="公开">
                        <input type="radio" name="status" value="0" title="私密">
                    @endif
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="storeSource">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    <button onclick="history.back(-1)" class="layui-btn layui-btn-danger">返回</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="{{ asset('layui/layui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lay.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $("li").on('click', function () {
            $("li").removeClass('layui-nav-itemed');
            $(this).addClass('layui-nav-itemed');
        });
    </script>
</body>
</html>