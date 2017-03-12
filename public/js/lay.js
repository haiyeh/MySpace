/*
* 组件加载
*/

layui.use(['jquery', 'form', 'layer', 'layedit',], function(){
	var $ = layui.jquery
	,form = layui.form() //获取form组件
	,layer = layui.layer //获得layer组件
 	,layedit = layui.layedit

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

	//留言板
	var message = layedit.build('message', {
		height:150,
		tool:['face', 'strong', 'italic', 'underline', 'left', 'center', 'right']
	});

	form.on('submit(userInfo)', function () {
		var url = 'http://localhost/userInfo';
		layer.open({
			type: 2,
			title: '您的信息',
			shadeClose: true,
			shade: 0.8,
			area: ['580px', '60%'],
			content: url
		});
	});

	form.on('submit(pwdreset)', function () {
		var url = 'http://localhost/password';
		layer.open({
			type: 2,
			title: '密码修改',
			shadeClose: true,
			shade: 0.8,
			area: ['580px', '22.5%'],
			content: url
		});
	});

	form.on('submit(head)', function () {
		var url = 'http://localhost/head';
		layer.open({
			type: 2,
			title: '头像更换',
			shadeClose: true,
			shade: 0.8,
			area: ['580px', '60%'],
			content: url
		});
	});

	//监听提交按钮  ajax
	form.on('submit(pwd_reset)', function () {
		var url = 'http://localhost/pwdReset';
		var pwd_old = $("#password_old").val();
		var pwd_new = $("#password_new").val();
		var _token = $("#_token").val();

		$.ajax({
			url:url,
			type:'post',
			data:{'pwd_old':pwd_old,'pwd_new':pwd_new,'_token':_token},
			success:function (res) {
				if (res == -1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('你输入的新密码与原密码一致，请重新输入',{time:2000});
					})
				}else if (res == -2){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('用户检测失败，请重新登录',{time:2000});
					})
				}else if (res == -3){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('原密码匹配失败，请输入正确的原密码',{time:2000});
					})
				}else if (res == 0){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('修改失败，请重新尝试',{time:2000});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('密码修改成功',{time:2000});
					})
				}
			},
			error:function(){
				layui.use('layer', function(){
					var layer = layui.layer;
					layer.msg('系统错误,正在修复中....');
				})
			},
		})
		return false;
	});
	
	form.on('submit(register)', function () {
		var url = "http://localhost/registerInfo";
		var _token = $("#reg_token").val();
		var name = $("#regName").val();
		var password = $("#regPwd").val();
		var password_confirmation = $("#regPwdC").val();
		var email = $("#regEmail").val();

		$.ajax({
			url:url,
			type:'post',
			data:{'_token':_token,'name':name,'password':password,'email':email,'password_confirmation':password_confirmation},
			success:function (res) {
				if (res == -1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('密码输入不一致',{time:2000});
					})
				}else if (res == 0){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('注册失败，请重新尝试',{time:2000});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('注册成功',{time:2000});
					})
				}
			},
			error:function(){
				layui.use('layer', function(){
					var layer = layui.layer;
					layer.msg('系统错误,正在修复中....');
				})
			},
		})
		return false;
	});

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
							layer.msg('相册创建成功');
						})
					}else{
						layui.use('layer', function(){
							var layer = layui.layer;
							layer.msg('创建相册失败');
						})
					}
				},
				error:function(){
					layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg('系统错误,请联系管理员修复');
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
						layer.msg('点赞成功');
					})
					$("#show").html(json.count);
					document.getElementById('zan').disabled=true;
				}else if(json.code == -1){
					layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg('您未登陆，无法点赞');
					})
					$("#show").html(json.count);
				}else {
					layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg('系统错了，点赞失败');
					})
					$("#show").html(json.count);
				}
			},
		}, 'json');
	});

	form.on('submit(articleZan)', function () {
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
					document.getElementById('articleZan').disabled=true;
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

	form.on('submit(comment_submit)', function (data) {
		var url = $("#comment_url").val();
		var type = $("#type").val();
		var bid = $("#bid").val();
		var content = layedit.getContent(comment);
		var _token = $("#_token").val();
		$.ajax({
			url:url,
			data:{'type':type,'bid':bid,'content':content},
			success:function (res) {
				var json = jQuery.parseJSON(res);
				if (json.code == 1){
					layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg('评论已发表');
					})
					$("#comment_all").prepend('<blockquote class="layui-elem-quote layui-quote-nm">'+json.content+'</blockquote>'+'<hr>');
				}else{
					layui.use('layer', function(){
						var layer = layui.layer;
						layer.msg('评论发表失败');
					})
				}
			},
		});
	});
	
	form.on('submit(userMsg)', function () {
		var username = $("#username").val();
		var phonenumber = $("#phonenumber").val();
		var city = $("#city").val();
		var street = $("#street").val();
		var hobby = $("#hobby").val();
		var alone = $("#alone").val();
		var sex = $("#sex").val();
		var desc = $("#desc").val();
		var url = $("#url").val();
		var _token = $("#_token").val();
		$.ajax({
			url:url,
			type:'post',
			data:{'username':username,'phonenumber':phonenumber,'city':city,'street':street,'hobby':hobby,'alone':alone,'sex':sex,'desc':desc,'_token':_token},
			success:function (res) {
				if (res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('您的信息已保存');
					})
					window.location = 'http://localhost';
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('信息保存失败');
					})
				}
			},
		});
		return false;
	});

	form.on('submit(msgbox)', function () {
		var content = layedit.getContent(message);
		var _token = $("#_token").val();
		var url = $("#url").val();
		$.ajax({
			url:url,
			type:'post',
			data:{'_token':_token,'content':content},
			success:function (res) {
				if(res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('留言已发表');
					})
					window.location.reload();
				}else if(res == -1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('您没有登录,请登陆后再留言哦');
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('留言失败,请检查您的RP');
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.msg('程序出错，正在紧急抢救中...');
				})
			}
		});
		return false;
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
		,title:function (value) {
			if(/^\d+\d+\d$/.test(value)){
				return '标题不能全为数字';
			}
			if(/^[\S]{6,30}$/.test(value)){
				return '标题不得少于6个字，且不能出现空格'
			}
		}
		,diary:[
			/.{10,}$/
			,'内容过少'
		]
		,mes_verify:[
			/.{5,}$/
			,'留言字数过少'
		]
	});


	layer.photos({
		photos: '#layer-photos-demo'
		,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	});

	/* admin */

	/* diary */
	form.on('submit(diary_delete)', function () {
		var url = $("#diary_delete").val();
		var id = $(this).parent('td').parent('tr').attr('id');

		$.ajax({
			url: url,
			type: 'get',
			data: {'id':id},
			success:function (res) {
				if(res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除成功', {
							icon: 1,
							title: '成功',
							skin: 'layui-layer-molv',
							closeBtn: 1
						}, function () {
							window.location.reload();
						});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除失败，请重试', {
							icon: 5,
							title: '失败',
							skin: 'layui-layer-molv',
							closeBtn: 1
						});
					})
				}
			},
			error: function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序错误,正在紧急修复中...', {
						icon: 2,
						title: 'error',
						closeBtn: 1
					});
				})
			}
		});
	});

	/* say */
	form.on('submit(say_delete)', function () {
		var url = $("#url").val();
		var id = $(this).parent('td').parent('tr').attr('id');

		$.ajax({
			url:url,
			type:'get',
			data:{'id':id},
			success:function (res) {
				if(res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除成功', {
							icon: 1,
							title: '成功',
							skin: 'layui-layer-molv',
							closeBtn: 1
						}, function () {
							window.location.reload();
						});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除失败，请重试', {
							icon: 5,
							title: '失败',
							skin: 'layui-layer-molv',
							closeBtn: 1
						});
					})
				}
			},
			error: function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序错误,正在紧急修复中...', {
						icon: 2,
						title: 'error',
						closeBtn: 1
					});
				})
			}
		});
	});

	/* comment */
	form.on('submit(comment_delete)', function () {
		var url = $("#url").val();
		var id = $(this).parent('td').parent('tr').attr('id');

		$.ajax({
			url:url,
			type:'get',
			data:{'id':id},
			success:function (res) {
				if(res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除成功', {
							icon: 1,
							title: '成功',
							skin: 'layui-layer-molv',
							closeBtn: 1
						}, function () {
							window.location.reload();
						});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除失败，请重试', {
							icon: 5,
							title: '失败',
							skin: 'layui-layer-molv',
							closeBtn: 1
						});
					})
				}
			},
			error: function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序错误,正在紧急修复中...', {
						icon: 2,
						title: 'error',
						closeBtn: 1
					});
				})
			}
		});
	});

	/* image */
	form.on('submit(image_delete)', function () {
		var url = $("#url").val();
		var id = $(this).parent('td').parent('tr').attr('id');

		$.ajax({
			url:url,
			type:'get',
			data:{'id':id},
			success:function (res) {
				if(res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除成功', {
							icon: 1,
							title: '成功',
							skin: 'layui-layer-molv',
							closeBtn: 1
						}, function () {
							window.location.reload();
						});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除失败，请重试', {
							icon: 5,
							title: '失败',
							skin: 'layui-layer-molv',
							closeBtn: 1
						});
					})
				}
			},
			error: function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序错误,正在紧急修复中...', {
						icon: 2,
						title: 'error',
						closeBtn: 1
					});
				})
			}
		});
	});
	
	form.on('submit(image_look)', function () {
		var img = $(this).parent('td').prev().prev().prev().text();
		layer.open({
			type: 1,
			title: false,
			closeBtn: 1,
			area: '800px',
			skin: 'layui-layer-nobg', //没有背景色
			shadeClose: true,
			content: '<img src="'+img+'">'
		});
	});

	/* message */
	form.on('submit(message_delete)', function () {
		var url = $("#url").val();
		var id = $(this).parent('td').parent('tr').attr('id');

		$.ajax({
			url:url,
			type:'get',
			data:{'id':id},
			success:function (res) {
				if(res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除成功', {
							icon: 1,
							title: '成功',
							skin: 'layui-layer-molv',
							closeBtn: 1
						}, function () {
							window.location.reload();
						});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除失败，请重试', {
							icon: 5,
							title: '失败',
							skin: 'layui-layer-molv',
							closeBtn: 1
						});
					})
				}
			},
			error: function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序错误,正在紧急修复中...', {
						icon: 2,
						title: 'error',
						closeBtn: 1
					});
				})
			}
		});
	});


	/* album */
	form.on('submit(album_look)', function () {
		var url = $("#album_look").val();
		var id = $(this).parent('td').parent('tr').attr('id');
		$.ajax({
			url:url,
			type:'get',
			data:{id:id},
			success:function (res) {
				if(res == 0){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('信息为空，请确认数据是否存在', {
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,title: '错误',
							icon: 5
						});
					})
				}else {
					var msg = jQuery.parseJSON(res);
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert(msg.album_desc, {
							title: '相册描述',
							icon: 6
						});
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序出错', {
						skin: 'layui-layer-molv' //样式类名
						,closeBtn: 1
						,title: '错误',
						icon: 5
					});
				})
			}
		});
	});

	form.on('submit(album_edit)', function () {
		var url = $("#album_edit").val();
		var id = $(this).parent('td').parent('tr').attr('id');
		$.ajax({
			url:url,
			type:'get',
			data:{id:id},
			success:function (res) {
				if (res == 0){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('信息为空，请确认数据是否存在', {
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,title: '错误',
							icon: 5
						});
					})
				}else{
					var msg = jQuery.parseJSON(res);
					layer.open({
						type: 1,
						title: '相册编辑',
						closeBtn: 1,
						shadeClose: true,
						skin: 'album_edit',
						content:
						'<div class="layui-form-item">'+
						'<label class="layui-form-label">名称</label>'+
						'<div class="layui-input-block">'+
						'<input type="text" name="album_name" id="album_name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="'+msg.album_name+'">'+
						'</div>'+
						'</div>'+
						'<div class="layui-form-item">'+
						'<label class="layui-form-label">状态</label>'+
						'<div class="layui-input-block">'+
						'<input type="hidden" id="id" value="'+msg.album_id+'">'+
						'<input type="hidden" id="url" value="'+msg.album_url+'">'+
						'<input type="hidden" id="_token" value="'+msg.album_token+'">'+
						'<input type="text" name="status" id="album_status" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="'+msg.album_status+'">'+
						'</div>'+
						'</div>'+
						'<div class="layui-form-item">'+
						'<label class="layui-form-label">类型</label>'+
						'<div class="layui-input-block">'+
						'<input type="text" name="type" id="album_type" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="'+msg.album_type+'">'+
						'</div>'+
						'</div>'+
						'<div class="layui-form-item">'+
						'<label class="layui-form-label">描述</label>'+
						'<div class="layui-input-block">'+
						'<input type="text" name="desc" id="album_desc" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="'+msg.album_desc+'">'+
						'</div>'+
						'</div>'+
						'<button class="layui-btn layui-btn-primary btn-block" lay-submit lay-filter="editAlbumSave">保存</button>'
					});
				}
			}
		});
	});

	form.on('submit(album_delete)', function () {
		var url = $("#album_delete").val();
		var id = $(this).parent('td').parent('tr').attr('id');
		$.ajax({
			url:url,
			type:'get',
			data:{id:id},
			success:function (res) {
				if (res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除成功',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:1
						}, function () {
							window.location.reload();
						});
					})

				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('删除失败');
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.msg('程序出错，正在紧急抢救中...');
				})
			}
		});
	});

	form.on('submit(addSource)', function () {
		var url = $("#addSource_url").val();
		layer.open({
			type: 2,
			title: '添加资源链',
			shadeClose: true,
			shade: 0.8,
			area: ['580px', '90%'],
			content: url
		});
	});
	
	form.on('submit(storeSource)', function () {
		var url = $("#url").val();
		var name = $("#source_name").val();
		var link = $("#source_link").val();
		var status = $('input[name="status"]:checked').val();
		var _token = $("#_token").val();

		$.ajax({
			url: url,
			type: 'post',
			data: {'name':name,'link':link,'status':status,'_token':_token},
			success:function (res) {
				if(res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('保存成功',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:1
						});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('保存失败',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:5
						});
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序错误',{
						skin: 'layui-layer-molv' //样式类名
						,closeBtn: 1
						,icon:2
					});
				})
			}
		});
		return false;
	});

	form.on('submit(source_delete)', function () {
		var url = $("#url").val();
		var id = $(this).parent('td').parent('tr').attr('id');
		$.ajax({
			url:url,
			type:'get',
			data:{id:id},
			success:function (res) {
				if (res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除成功',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:1
						}, function () {
							window.location.reload();
						});
					})

				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('删除失败');
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.msg('程序出错，正在紧急抢救中...');
				})
			}
		});
	});

	form.on('submit(city_delete)', function () {
		var url = $("#delCity_url").val();
		var id = $(this).parent('td').parent('tr').attr('id');
		$.ajax({
			url:url,
			type:'get',
			data:{id:id},
			success:function (res) {
				if (res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('删除成功',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:1
						}, function () {
							window.location.reload();
						});
					})

				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.msg('删除失败');
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.msg('程序出错，正在紧急抢救中...');
				})
			}
		});
	});

	form.on('submit(addCity)', function () {
		layer.open({
			type: 1,
			skin: 'layui-layer-rim', //加上边框
			area: ['420px', '160px'], //宽高
			title:'添加城市',
			content:
			'<div class="layui-form-item">'+
			'<label class="layui-form-label">城市</label>'+
			'<div class="layui-input-block">'+
			'<input type="text" name="city" id="city" required  lay-verify="required" autocomplete="off" class="layui-input">'+
			'</div>'+
			'</div>'+
			'<button class="layui-btn btn-block" lay-submit lay-filter="citySave">保存</button>'
		});
	});
	
	form.on('submit(citySave)', function () {
		var url = 'http://localhost/admin/storeCity';
		var cityname = $("#city").val();
		$.ajax({
			url:url,
			type:'get',
			data:{'cityname':cityname},
			success:function (res) {
				if(res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('保存成功',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:1
						});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('保存失败',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:5
						});
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序错误',{
						skin: 'layui-layer-molv' //样式类名
						,closeBtn: 1
						,icon:2
					});
				})
			}
		});
	});


	form.on('submit(editAlbumSave)', function () {
		var album_name = $("#album_name").val();
		var type = $("#album_type").val();
		var status = $("#album_status").val();
		var desc = $("#album_desc").val();
		var _token = $("#_token").val();
		var url = $("#url").val();
		var id = $("#id").val();

		$.ajax({
			url:url,
			type:'post',
			data:{'album_name':album_name,'type':type,'desc':desc,'status':status,'_token':_token,'id':id},
			success:function (res) {
				if (res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('保存成功',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:1
						}, function () {
							window.location.reload();
						});
					})
				}else{
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('保存失败',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:5
						});
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序出错，正在紧急抢修中...',{
						skin: 'layui-layer-lan' //样式类名
						,closeBtn: 1
						,icon:2
					});
				})
			}
		});
	});

	form.on('submit(system)', function () {
		var url = $("#url").val();
		var diary = getstatus($("#diary_set").is(':checked'));
		var say = getstatus($("#say_set").is(':checked'));
		var message = getstatus($("#message_set").is(':checked'));
		var album = getstatus($("#album_set").is(':checked'));
		var comment = getstatus($("#comment_set").is(':checked'));
		var _token = $("#_token").val();

		$.ajax({
			url:url,
			type:'post',
			data:{'_token':_token,'diary':diary,'say':say,'message':message,'album':album,'comment':comment},
			success:function (data) {
				var json = jQuery.parseJSON(data);
				if (json.res == 1){
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('保存成功',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:1
						})
					})
					diary_set(json.diary);
					say_set(json.say);
					comment_set(json.comment);
					album_set(json.album);
					message_set(json.message);
				}else {
					layui.use('layer', function () {
						var layer = layui.layer;
						layer.alert('保存失败',{
							skin: 'layui-layer-molv' //样式类名
							,closeBtn: 1
							,icon:5
						});
					})
				}
			},
			error:function () {
				layui.use('layer', function () {
					var layer = layui.layer;
					layer.alert('程序出错，正在紧急抢修中...',{
						skin: 'layui-layer-lan' //样式类名
						,closeBtn: 1
						,icon:2
					});
				})
			}
		});
		return false;
	});
    
    form.on('submit(password)', function () {
        var admin = $("#admin").val();
        var password = $("#adminPwd").val();
        var url = $("#pwd_url").val();
        var _token = $("#_token").val();

        $.ajax({
            url:url,
            type:'post',
            data:{'_token':_token,'admin':admin,'password':password},
            success: function (res) {
                if (res == 1){
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.alert('修改成功',{
                            skin: 'layui-layer-molv' //样式类名
                            ,closeBtn: 1
                            ,icon:1
                        }, function () {
                            window.location.reload();
                        });
                    })
                }else{
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.alert('修改失败',{
                            skin: 'layui-layer-molv' //样式类名
                            ,closeBtn: 1
                            ,icon:5
                        });
                    })
                }
            },
            error:function () {
                layui.use('layer', function () {
                    var layer = layui.layer;
                    layer.alert('程序出错，正在紧急抢修中...',{
                        skin: 'layui-layer-lan' //样式类名
                        ,closeBtn: 1
                        ,icon:2
                    });
                })
            }
        });
        return false;
    });
});

function comment(){
	$("#comment_div").toggle('slow');
}
function quxiao()
{
	$("#comment_div").fadeOut('slow');
}
function getstatus(res)
{
	if (res == true){
		return 1;
	}else{
		return 0;
	}
}
function diary_set(res) {
	if (res == 1){
		$("#diary_set").attr("checked", true);
	}else{
		$("#diary_set").attr("checked", false);
	}
}
function say_set(res) {
	if (res == 1){
		$("#say_set").attr("checked", true);
	}else{
		$("#say_set").attr("checked", false);
	}
}
function message_set(res) {
	if (res == 1){
		$("#message_set").attr("checked", true);
	}else{
		$("#message_set").attr("checked", false);
	}
}
function comment_set(res) {
	if (res == 1){
		$("#comment_set").attr("checked", true);
	}else{
		$("#comment_set").attr("checked", false);
	}
}
function album_set(res) {
	if (res == 1){
		$("#album_set").attr("checked", true);
	}else{
		$("#album_set").attr("checked", false);
	}
}


