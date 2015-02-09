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
	            	<li><a href="./index.php/admin/passli">文章管理</a></li>
	            	<li class="active"><a href="./index.php/admin/">公告管理</a></li>
	            	<li><a href="./index.php">前台首页</a></li>
	          	</ul>
	          	<ul class="nav navbar-nav navbar-right">
	            	<li><a href="./index.php/admin/logout">登出</a></li>
	          	</ul>
	        </div><!--/.nav-collapse -->
      	</div>
    </nav>

    <div class="container">
		<div class="starter-template">
        	<h2>公告列表</h2>
        	<a class="btn btn-success" style="margin:20px 0;" href="">发布新公告</a>
        	<table class="table table-bordered">
		    <thead>
		        <tr>
		          	<th>#</th>
		          	<th>标题</th>
		          	<th>发布者</th>
		          	<th>发布日期</th>
		          	<th>编辑</th>
		          	<th>删除</th>
		        </tr>
		    </thead>
		    <tbody>
		        <tr>
		          	<th scope="row">1</th>
		          	<td>关于期末考试的安排</td>
		          	<td>罗杰</td>
		          	<td>2015-01-01 12:45:22</td>
		          	<td><a href="">编辑</a></td>
		          	<td><a href="">删除</a></td>
		        </tr>
		    </tbody>
		    </table>
      	</div>
    </div><!-- /.container -->
</body>
</html>