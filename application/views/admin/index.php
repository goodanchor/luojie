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
	<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="./public/js/jquery-min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="./public/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="" />
</head>
<body style="background:url(./public/images/bg.jpg)">
     	<nav class="navbar navbar-inverse">
     	<div class="container">
	        <div class="navbar-header">
	          	<a class="navbar-brand" href="./index.php/admin/index">课程网站后台</a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          	<ul class="nav navbar-nav">
	            	<li class="active"><a href="./index.php/admin/index">概况</a></li>
	            	<li><a href="./index.php/admin/upload">文件管理</a></li>
	            	<li><a href="./index.php/admin/passli">文章管理</a></li>
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
    	<h2>网站概况</h2>
    	<p class="lead">总访问数: 37219</p>
    	<p class="lead">今日访问数(PV): 23</p>
    	<p class="lead">文件下载排行:</p>
    	<table class="table table-bordered" style="background:#fff;">
	    <thead>
	        <tr>
	          	<th>#</th>
	          	<th>文件名</th>
	          	<th>总下载量</th>
	          	<th>上传日期</th>
	          	<th>日均下载量</th>
	        </tr>
	    </thead>
	    <tbody>
	        <tr>
	          	<th scope="row">1</th>
	          	<td>课件.doc</td>
	          	<td>1220</td>
	          	<td>2015-01-01 12:45:22</td>
	          	<td>23</td>
	        </tr>
	    </tbody>
	    </table>
    </div><!-- /.container -->
</body>
</html>