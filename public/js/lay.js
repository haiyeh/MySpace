/*
* 组件加载
*/

layui.use(['jquery', 'form', 'upload', 'layer', 'laypage', 'laydate', 'layedit', 'element'], function(){
	var $ = layui.jquery
	,form = layui.form() //获取form组件
	,upload = layui.upload //获取upload组件
	,layer = layui.layer //获得layer组件
  	,laypage = layui.laypage //获得laypage组件
 	,laydate = layui.laydate //获得laydate组件
 	,layedit = layui.layedit
 	,element = layui.element();

 	//实例化layui编辑器
 	//日志
	var diary = layedit.build('diary', {
		height: 350,
		uploadImage: {
			url: '',
			type: 'post'
		}
	});
	//说说
	var say = layedit.build('say', {
		height: 150,
		tool: ['face', 'strong', 'italic', 'underline', 'left', 'center', 'right']
	});

	//评论框
	var comment = layedit.build('comment', {
		height: 150,
		tool: ['face', 'strong', 'italic', 'underline', 'left', 'center', 'right']
	});

	//监听提交按钮  ajax
	form.on('submit(addSay)', function(data){
		var content = layedit.getContent(say);
		var token = data.field._token;
		var url = data.field.hidden;
			$.ajax({
				url:url,
				type:'post',
				data:{'_token':token,'content':content},
				success: function(res){
					if (res == 1) {
						layui.use('layer', function(){
							var layer = layui.layer;
							layer.confirm('说说发表成功', {
							    btn: ['继续发表','返回说说'] //按钮
							}, function(){
								location.reload();
							}, function(){
								history.back(-1);
							});
						})
					}else if(res == 2){
						layui.use('layer', function(){
							var layer = layui.layer;
							layer.msg('内容不能为空',{time:2000});
						})
					}else{
						layui.use('layer', function(){
							var layer = layui.layer;
							layer.msg('发表失败',{time:2000});
						})
					}
				},
			}, JSON);
			return false;
		});

	form.on('submit(addDiary)', function(data){
		var content = layedit.getContent(diary);
		var title = data.field.title;
		var publi = data.field.published_at;
		var token = data.field._token;
		var url = data.field.hidden;
			$.ajax({
				url:url,
				type:'post',
				data:{'_token':token,'title':title,'content':content,'published_at':publi},
				success: function(res){
					if (res == 1) {
						layui.use('layer', function(){
							var layer = layui.layer;
							layer.confirm('日志发表成功', {
							    btn: ['继续发表','返回日志'] //按钮
							}, function(){
								location.reload();
							}, function(){
								history.back(-1);
							});
						})
					}else{
						layui.use('layer', function(){
							var layer = layui.layer;
							layer.msg('发表失败');
						})
					}
				},
			}, JSON);
			return false;
		});
		

		form.on('submit(addAlbum)', function(data){
			var desc = data.field.desc;
			var name = data.field.name;
			var type = data.field.type;
			var status = data.field.status;
			var url = data.field.hidden;
			var token = data.field._token;
			$.ajax({
				url:url,
				type:'post',
				data:{'_token':token,'name':name,'type':type,'status':status,'desc':desc},
				success: function(res){
					if (res == 1) {
						layui.use('layer', function(){
							var layer = layui.layer;
							layer.msg('新建成功');
						})
					}else{
						layui.use('layer', function(){
							var layer = layui.layer;
							layer.msg('新建失败');
						})
					}
				},
				error:function(){
					layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg('系统错误,正在修复中....');
					})
				},
			});
			return false;
		});

	form.on('submit(newAlbum)', function () {
		layer.open({
			type: 2,
			title: 'NEW ALBUM',
			shadeClose: true,
			shade: 0.8,
			area: ['580px', '90%'],
			content: 'http://localhost/newAlbum'
		});
	});

	form.on('submit(uploadPic)', function () {
		layer.open({
			type: 2,
			title: 'NEW PICTURE',
			shadeClose: true,
			shade: 0.8,
			area: ['580px', '90%'],
			content: 'http://localhost/uploadPic'
		});
	});

	form.on('submit(zan)', function () {
		var url = $("#url").val();
		var type = $("#type").val();
		var bid = $("#bid").val();
		$.ajax({
			url:url,
			data:{'type':type,'bid':bid},
			success:function (res) {
				// document.write(res);
				var json = jQuery.parseJSON(res);
				if(json.code == 1){
					layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg('作者又收到一个赞');
					})
					$("#show").html(json.count);
				}else{
					layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg('点赞失败');
					})
					$("#show").html(json.count);
				}
			},
		}, 'json');
	});

	form.on('submit(comment)', function () {
		layer.open({
			type: 1,
			title:'评论',
			skin: 'layui-layer-rim', //加上边框
			area: ['35%', '30%'], //宽高
			content: "<textarea name='comment' id='comment' cols='15' rows='8' class='layui-textarea'></textarea>"
					+"<button lay-submit lay-filter='comment_submit' class='btn btn-info btn-sm btn-block'>提交</button>"
		});
	});

	
	//表单验证信息定义
	form.verify({
  		username: function(value){
    	if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
      		return '用户名不能有特殊字符';
    	}
    	if(/(^\_)|(\__)|(\_+$)/.test(value)){
      		return '用户名首尾不能出现下划线\'_\'';
    	}
    	if(/^\d+\d+\d$/.test(value)){
      		return '用户名不能全为数字';
    	}
  	}
	  	//我们既支持上述函数式的方式，也支持下述数组的形式
	  	//数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
	  	,password: [
	    	/^[\S]{6,12}$/
	    	,'密码必须6到12位，且不能出现空格'
	  	] 
	});

});

// function comment(){
// 	$("#comment_div").css('display', 'block');
// }

