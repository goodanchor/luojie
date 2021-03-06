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
	<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="./public/js/jquery-min.js"></script>

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
	            	<li class="active"><a href="./index.php/admin/index">概况</a></li>
	            	<li><a href="./index.php/admin/upload">文件管理</a></li>
	            	<li><a href="./index.php/admin/passli">文章管理</a></li>
	            	<li><a href="./index.php/admin/notice">公告管理</a></li>
	            	<li><a href="./index.php/show/index">前台首页</a></li>
	          	</ul>
	          	<ul class="nav navbar-nav navbar-right">
	            	<li><a href="./index.php/admin/logout">登出</a></li>
	          	</ul>
	        </div><!--/.nav-collapse -->
      	</div>
    </nav>

    <div class="container">
    	<?php
    	if($className){
    		echo "<h2>当前课程 ：".$className."<br><div class='btn btn-warning classLink' data-class=''>返回课程选择</div>";
    	}else{
    		echo "<h2>选择课程</h2>
		    	<div class='btn btn-primary classLink' data-class='1'>信号与控制综合实验</div>
		    	<div class='btn btn-primary classLink' data-class='2'>数字电路与逻辑设计</div>
		    	<div class='btn btn-primary classLink' data-class='3'>微机原理与接口技术</div>
		    	<div class='btn btn-primary classLink' data-class='4'>嵌入式系统</div>";
		}
		?>
    	<h2>网站概况</h2>
    	<p class="lead">总访问数: <?php echo $count["countall"];?></p>
    	<p class="lead">今日访问数(PV): <?php echo $count["counts"];?></p>
    	<p class="lead">文件下载排行:</p>
    	<table class="table table-bordered" style="background:#fff;">
	    <thead>
	        <tr>
	          	<th>#</th>
	          	<th>文件名</th>
	          	<th>总下载量</th>
	          	<th>上传日期</th>
	        </tr>
	    </thead>
	    <tbody>
	       	<?php
	       	if(!empty($rows))
	            foreach ($rows as $file) {
	                $fid = $file["fileid"];
	                $title = $file["filename"];
	                $time = $file["uploadtime"];
	                $show = $file["avilible"];
	                $downloadtimes = $file["dowloadtimes"];
	                echo "<tr>
	                   		<th scope='row'>$fid</th>
	          				<td>$title</td>
				          	<td>$downloadtimes</td>
				          	<td>".date('Y-m-d',$time)."</td>
	                	</tr>";
	            }
	        ?>
	    </tbody>
	    </table>
	    <script type="text/javascript">
	    	$(".classLink").click(function(){
	    		var classId = $(this).data().class;
	    		$.ajax({
	    			type : 'get',
	    			url :URL + "index.php/admin/setclass",
	    			data : {class:classId},
	    			dataType : 'json',
	    			success : function(res){
		    			if(res.status)
		    				window.location.href = URL + "index.php/admin/index";
		    			else
		    				alert(res.msg);
		    		},
		    		error : function(res){
		    			console.log(res);
		    		}
	    		});
	    	});
	    </script>
    </div><!-- /.container -->
</body>
</html>