<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href = "<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
<link href="./public/css/article-list.css" rel="stylesheet" type="text/css" />

<script src="./public/js/article-list.js" ></script>
<script src="./public/js/jquery-1.11.2.min.js" ></script>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<!-- 你最好检查一下这两行 -->

</head>

 
<body>
<?php
print_r($status);
print_r($rows);
?>

<div id="background">
<div id="top">
	<div id="head">
		<img src="./public/images/hust.png" alt="hust" height="60px" width="84.4px" display="inline-block">
		<img src="./public/images/ei.png" alt="ei" class="ei" height="60px" width="65.5px">
		<div class="nav">
			<div class="nav_cell">首页</div>
			<div class="nav_cell">文章</div>
			<div class="nav_cell">文件下载</div>
		</div>
	</div>
</div>
<div id="main">
	<div class="info">
		<div class="bt">标题</div>
		<div class="sj">时间</div>
		<div class="zz">作者</div>
	</div>
	<div class="list">
		<div class="bt">
			title
		</div>
		<div class="sj">
			2015/2/11
		</div>
		<div class="zz">
			hustjzy
		</div>
	</div>
	<div class="list"></div>
	<div class="list"></div>
	<div class="list"></div>
	<div class="list"></div>
	<div class="list"></div>
	<div class="list"></div>
	<div class="list"></div>
	<div class="list"></div>
	<div class="list"></div>
	<div class="page">1 2 3 </div>
</div>
</div>
</body>
</html>