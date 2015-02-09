<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>管理后台登陆</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<base href = "<?php echo base_url();?>"/> 
	<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="./public/js/jquery-min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="./public/js/bootstrap.min.js"></script>
	<script src="./public/js/login.js"></script>
	<link rel="shortcut icon" href="" />
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	  <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand">管理后台--登陆</a>
        </div>
      </div>
	</div>
	<div class="container">
		<form style="width:300px; margin:100px auto;">
		  	<div class="form-group">
		    	<label for="username">用户名</label>
		    	<input type="email" class="form-control" id="username" placeholder="用户名">
		  	</div>
		  	<div class="form-group">
		    	<label for="password">密码</label>
		    	<input type="password" class="form-control" id="password" placeholder="密码">
		 	</div>
		  	<button type="button" class="btn btn-default" id="login">登录</button>
		</form>
	</div>
</body>
</html>