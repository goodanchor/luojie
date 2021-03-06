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
	<script type="text/javascript">
		 window.URL = "<?php echo base_url();?>";
		 window.formData = {
		 	timestamp : '<?php echo time();?>',
		 	token : '<?php echo md5('smelltheflower' . time());?>'
		 };
	</script>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
	<link rel="stylesheet" href="./public/css/uploadify.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="./public/js/jquery-min.js"></script>
	<script src="./public/js/upload.js"></script>
	<script src="./public/js/jquery.uploadify.min.js"></script>
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
	            	<li class="active"><a href="./index.php/admin/upload">文件管理</a></li>
	            	<li><a href="./index.php/admin/passli">文章管理</a></li>
	            	<li><a href="./index.php/admin/">公告管理</a></li>
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
	    	<h2>文件列表</h2>
	    	<div style="margin:20px 0;" id="upload">上传文件</div>
	    	<table class="table table-bordered" style="background:#fff;">
		    <thead>
		        <tr>
		          	<th>#</th>
		          	<th>文件名</th>
		          	<th>发布者</th>
		          	<th>发布日期</th>
		          	<th>删除</th>
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
		                $userid = $file["userid"];
		                $name = $file['name'];
		                echo "<tr>
		                   		<th scope='row'>$fid</th>
		          				<td>$title</td>
					          	<td>$name</td>
					          	<td>".date('Y-m-d H:i:s',$time)."</td>
					          	<td class='del' name='$fid'><a href='javascript:void(0)'>删除</a></td>
		                </tr>";
		            }
		        ?>
		    </tbody>
		    </table>
		     <?php echo $this->pagination->create_links()?>
	    <?php else: ?>
	    	<h2>请先在首页选择课程 <a href="./index.php/admin/index">首页</a></h2>
	    <?php endif ?>
    </div><!-- /.container -->
    <script type="text/javascript">
    	$(document).ready(function(){
			$(".del").click(function(){
				var _this = this;
				var fid = $(this).attr("name");
				$.ajax({
					type:"post",
					url:URL + "index.php/files/del",
					data:{
						fileid : fid
					},
					dataType:"json",
					success:function(res){
						if(res.status){
							$(_this).parent().remove();
						}else{
							alert("删除失败");
						}
					}
				})
			});
		});
    </script>
</body>
</html>
