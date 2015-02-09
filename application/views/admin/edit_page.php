<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>管理后台</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<base href = "<?php echo base_url();?>"/>
	<script type="text/javascript"> window.URL = "<?php echo base_url();?>";window.UMEDITOR_HOME_URL = ".<?php echo base_url();?>public/ueditor/"; </script>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="./public/js/jquery-min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="./public/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="" />
</head>
<body style="padding-top:50px;">
	<nav class="navbar navbar-inverse navbar-fixed-top">
     	<div class="container">
	        <div class="navbar-header">
	          	<a class="navbar-brand" href="./index.php/admin/index">课程网站后台</a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          	<ul class="nav navbar-nav">
	            	<li><a href="./index.php/admin/index">概况</a></li>
	            	<li><a href="./index.php/admin/upload">文件管理</a></li>
	            	<li class="active"><a href="./index.php/admin/passli">文章管理</a></li>
	            	<li><a href="./index.php/admin/">公告管理</a></li>
	            	<li><a href="./index.php">前台首页</a></li>
	          	</ul>
	          	<ul class="nav navbar-nav navbar-right">
	            	<li><a href="./index.php/admin/logout">登出</a></li>
	          	</ul>
	        </div><!--/.nav-collapse -->
      	</div>
    </nav>

    <div class="container">
    	<h2>编辑文章</h2>
    	<a class="btn btn-primary" style="margin:20px 0;" href="./index.php/admin/passli">返回</a>
    	<div class="form-group">
	    	<label for="title">标题</label>
	    	<input type="text" class="form-control" id="title" placeholder="文章标题">
	  	</div>
	  	<script id="container" name="content" type="text/plain">
	        文章内容
	    </script>
	     <!-- 配置文件 -->
	    <script type="text/javascript" src="./public/ueditor/umeditor.config.js"></script>
	    <!-- 编辑器源码文件 -->
	    <script type="text/javascript" src="./public/ueditor/umeditor.js"></script>
	    <!-- 实例化编辑器 -->
	    <script type="text/javascript">
	        var um = UM.getEditor('container');
	    </script>
    </div><!-- /.container -->
</body>
</html>