@extends('common.layout')

@section('siteleft')
    <form class="layui-form layui-form-pane" action="">
        <div class="layui-form-item">
            <input type="hidden" id="url" value="{{ url('saveUser') }}">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-block">
                @if(!empty($userMsg))
                    <input type="text" id="username" name="username" value="{{ $userMsg->username }}" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                @else
                    <input type="text" id="username" name="username" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                @endif
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-block">
                @if(!empty($userMsg))
                    <input type="text" id="phonenumber" name="phonenumber" value="{{ $userMsg->phonenumber }}" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                @else
                    <input type="text" id="phonenumber" name="phonenumber" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                @endif
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">现居地</label>
            <div class="layui-input-block">
                <select name="city" id="city" lay-verify="required">
                    <option value=""></option>
                    <option value="0">北京</option>
                    <option value="1">上海</option>
                    <option value="2">广州</option>
                    <option value="3">深圳</option>
                    <option value="4">杭州</option>
                </select>
            </div>
            <input type="text" id="street" name="street" class="layui-input" placeholder="请输入街道">
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">爱好</label>
            <div class="layui-input-block">
                @if(!empty($userMsg))
                    <input type="text" id="hobby" name="hobby" class="layui-input" value="{{ $userMsg->hobby }}">
                @else
                    <input type="text" id="hobby" name="hobby" class="layui-input">
                @endif
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">单身？</label>
            <div class="layui-input-block">
                <input type="checkbox" id="alone" name="alone" lay-skin="switch" value="1">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <select name="sex" id="sex" lay-verify="required">
                    <option value="">请选择性别</option>
                    <option value="0">女</option>
                    <option value="1">男</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">自我评价</label>
            <div class="layui-input-block">
                @if(!empty($userMsg))
                    <textarea name="desc" id="desc" placeholder="请输入内容" class="layui-textarea">{{ $userMsg->desc }}</textarea>
                @else
                    <textarea name="desc" id="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
                @endif
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="userMsg">保存</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
@endsection