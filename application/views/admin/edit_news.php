<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<?php
if(isset($class)){
	switch ($class) {
		case '1':
			$className = "信号与控制综合实验";
			break;
		case '2':
			$className = "数字电路与逻辑设计";
			break;
		case '3':
			$className = "微机原理与逻辑设计";
			break;
		case '4':
			$className = "嵌入式系统";
			break;
		
		default:
			$className = false;
			break;
	}
}else{
	$className = false;
}
?>
<head>
	<meta charset="utf-8" />
	<title>管理后台</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<base href = "<?php echo base_url();?>"/>
	<script type="text/javascript"> window.URL = "<?php echo base_url();?>";window.UMEDITOR_HOME_URL = "<?php echo base_url();?>public/ueditor/"; </script>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
	<link href="./public/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="./public/js/jquery-min.js"></script>
	<script src="./public/js/edit_news.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="./public/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="" />
</head>
<body style="background:url(./public/images/bg_admin.jpg)">
	<nav class="navbar navbar-inverse">
     	<div class="container">
	        <div class="navbar-header">
	          	<a class="navbar-brand" href="./index.php/admin/index"><?php echo $className?$className : "课程网站后台";?></a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          	<ul class="nav navbar-nav">
	            	<li><a href="./index.php/admin/index">概况</a></li>
	            	<li><a href="./index.php/admin/upload">文件管理</a></li>
	            	<li><a href="./index.php/admin/passli">文章管理</a></li>
	            	<li class="active"><a href="./index.php/admin/notice">公告管理</a></li>
	            	<li><a href="./index.php/show/index">前台首页</a></li>
	          	</ul>
	          	<ul class="nav navbar-nav navbar-right">
	            	<li><a href="./index.php/admin/logout">登出</a></li>
	          	</ul>
	        </div><!--/.nav-collapse -->
      	</div>
    </nav>

    <div class="container">
    	<?php if ($className):?>
	    	<h2>编辑文章</h2>
	    	<a class="btn btn-primary" style="margin:20px 0;" href="./index.php/admin/notice">返回</a>
	    	<div class="form-group">
		    	<label for="title">公告标题</label>
		    	<input type="text" class="form-control" id="title" placeholder="公告标题" value="<?php if(isset($row))echo $row['title'];?>">
		  	</div>
		  	<script id="container" name="content" type="text/plain"  style="width:100%;height:200px;"></script>
		  	<div id="post_notice" class="btn btn-success pull-right" style="margin:20px 0;">发布公告</div>
		     <!-- 配置文件 -->
		    <script type="text/javascript" src="./public/ueditor/umeditor.config.js"></script>
		    <!-- 编辑器源码文件 -->
		    <script type="text/javascript" src="./public/ueditor/umeditor.js"></script>
		    <script type="text/javascript">
				var um = UM.getEditor('container');//实例化编辑器
		    	um.ready(function() {
		    		um.execCommand('cleardoc');
			       	um.execCommand('insertHtml',HTMLDecode("<?php if(isset($row))echo $row['content'];?>"));
			    });
			    function HTMLDecode(text){
					var temp = document.createElement("div");
					temp.innerHTML = text;
					var output = temp.innerText || temp.textContent;
					temp = null;
					return output;
				}
		    </script>
		<?php else: ?>
	    	<h2>请先在首页选择课程 <a href="./index.php/admin/index">首页</a></h2>
	    <?php endif ?>
    </div><!-- /.container -->
</body>
</html>