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
<div id="background">
<div id="top">
	<div id="head">
		<img src="./public/images/hust.png" alt="hust" height="60px" width="84.4px" display="inline-block">
		<img src="./public/images/ei.png" alt="ei" class="ei" height="60px" width="65.5px">
		<div class="nav">
			<div class="nav_cell"><a href = './index.php/show/index'>首页</a></div>
			<div class="nav_cell"><a href = './index.php/show/articlelist'>文章</a></div>
			<div class="nav_cell"><a href = './index.php/show/files'>文件下载</a></div>
		</div>
	</div>
</div>
<div id="main">
	<div class="info">
		<div class="bt">标题</div>
		<div class="sj">时间</div>
		<div class="zz">作者</div>
	</div>
<?php
if($status){
	foreach($rows as $row){
		$path = site_url('show/article/'.$row['passageid']);
		echo '<div class="list">';
			echo'<div class="bt"><a href='.$path.' style="text-decoration:none">'.$row['title'].'</a></div>';
			echo '<div class="sj">'.date('Y-m-d',$row['time']).'</div>'	;
			echo '<div class="zz">'.$row['name'].'</div>';
		echo '</div>';
	}
}
else{
	echo '<div class="list">';
			echo'<div class="bt">passage not found</div>';
			echo '<div class="sj"></div>'	;
			echo '<div class="zz"></div>';
		echo '</div>';
}

?>
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