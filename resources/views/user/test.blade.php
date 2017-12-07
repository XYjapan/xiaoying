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
				<h1>ajax测试</h1>

				<div class="connect">
					<p>www.xiaoying.net</p>
				</div>

				<form id="loginForm" method="GET" action="/api/login">
					{{ csrf_field()  }}
					<div>
						<input type="file" name="upfile" class="username"  autocomplete="off" />
					</div>
					<button id="submit" type="button" onclick="ajaxSubmit()">Client</button>
				</form>
			</div>

			<script src="/js/jquery.min.js"></script>
			<script>

				function ajaxSubmit()
				{
					$.ajax({
						url:'/api/test',
						data:{
						    upfile:$('.username').val(),
							_token:"{{ csrf_token() }}",
						},
						dataType:'JSON',
						type:'POST',
						success:function(res)
						{
							console.log(res);
						}
					})
				}

			</script>

		</body>

</html>