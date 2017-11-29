<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Login</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="css/login.css" />

		<body>

			<div class="login-container">
				<h1>登陆</h1>

				<div class="connect">
					<p>www.xiaoying.net</p>
				</div>

				<form id="loginForm" method="GET" action="/api/login">
					{{ csrf_field()  }}
					<div>
						<input type="text" name="username" class="username" placeholder="{{ $errors->first('username') ?: '用户名'  }}" autocomplete="off" />
					</div>
					<div>
						<input type="password" name="password" class="password" placeholder="{{ $errors->first('password') ?: '密码'  }}" oncontextmenu="return false" onpaste="return false" />
					</div>
					<button id="submit" type="button" onclick="ajaxSubmit()">登 录</button>
				</form>

				<a href="#">
					<button type="button" class="register-tis">还有没有账号？</button>
				</a>
			</div>

			<script src="js/jquery.min.js"></script>
			<script>

				function ajaxSubmit()
				{
					$.ajax({
						url:'/api/login',
						data:$('#loginForm').serialize(),
						dataType:'JSON',
						type:'POST',
						success:function(res)
						{
							if( res.status == true )
							    location.href = '/';
						}
					})
				}

				//打开字滑入效果
				window.onload = function() {
					$(".connect p").eq(0).animate({
						"left": "0%"
					}, 600);
					$(".connect p").eq(1).animate({
						"left": "0%"
					}, 400);
				};
				//jquery.validate表单验证
//				$(document).ready(function() {
//					//登陆表单验证
//					$("#loginForm").validate({
//						rules: {
//							username: {
//								required: true, //必填
//								minlength: 3, //最少6个字符
//								maxlength: 32, //最多20个字符
//							},
//							password: {
//								required: true,
//								minlength: 3,
//								maxlength: 32,
//							},
//						},
//						//错误信息提示
//						messages: {
//							username: {
//								required: "必须填写用户名",
//								minlength: "用户名至少为3个字符",
//								maxlength: "用户名至多为32个字符",
//								remote: "用户名已存在",
//							},
//							password: {
//								required: "必须填写密码",
//								minlength: "密码至少为3个字符",
//								maxlength: "密码至多为32个字符",
//							},
//						},
//
//					});
//					//注册表单验证
//					$("#registerForm").validate({
//						rules: {
//							username: {
//								required: true, //必填
//								minlength: 3, //最少6个字符
//								maxlength: 32, //最多20个字符
//								remote: {
//									url: "http://kouss.com/demo/Sharelink/remote.json", //用户名重复检查，别跨域调用
//									type: "post",
//								},
//							},
//							password: {
//								required: true,
//								minlength: 3,
//								maxlength: 32,
//							},
//							email: {
//								required: true,
//								email: true,
//							},
//							confirm_password: {
//								required: true,
//								minlength: 3,
//								equalTo: '.password'
//							},
//							phone_number: {
//								required: true,
//								phone_number: true, //自定义的规则
//								digits: true, //整数
//							}
//						},
//						//错误信息提示
//						messages: {
//							username: {
//								required: "必须填写用户名",
//								minlength: "用户名至少为3个字符",
//								maxlength: "用户名至多为32个字符",
//								remote: "用户名已存在",
//							},
//							password: {
//								required: "必须填写密码",
//								minlength: "密码至少为3个字符",
//								maxlength: "密码至多为32个字符",
//							},
//							email: {
//								required: "请输入邮箱地址",
//								email: "请输入正确的email地址"
//							},
//							confirm_password: {
//								required: "请再次输入密码",
//								minlength: "确认密码不能少于3个字符",
//								equalTo: "两次输入密码不一致", //与另一个元素相同
//							},
//							phone_number: {
//								required: "请输入手机号码",
//								digits: "请输入正确的手机号码",
//							},
//
//						},
//					});
//					//添加自定义验证规则
//					jQuery.validator.addMethod("phone_number", function(value, element) {
//						var length = value.length;
//						var phone_number = /^(((13[0-9]{1})|(15[0-9]{1}))+\d{8})$/
//						return this.optional(element) || (length == 11 && phone_number.test(value));
//					}, "手机号码格式错误");
//				});
			</script>
			
			<!--背景图片自动更换-->
			<script src="js/supersized.3.2.7.min.js"></script>
			<script>
				jQuery(function($) {

					$.supersized({

						slide_interval: 4000,
						transition: 1,
						transition_speed: 1000,
						performance: 1,

						min_width: 0,
						min_height: 0,
						vertical_center: 1,
						horizontal_center: 1,
						fit_always: 0,
						fit_portrait: 1,
						fit_landscape: 0,

						slide_links: 'blank',
						slides: [{
								image: '/images/login/1.jpg'
							},
							{
								image: '/images/login/2.jpg'
							},
							{
								image: '/images/login/3.jpg'
							}
						]

					});

				});
			</script>
			<!--表单验证-->
			<script src="js/jquery.validate.min.js"></script>
		</body>

</html>