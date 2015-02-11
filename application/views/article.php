<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href = "<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
<link href="./public/css/article.css" rel="stylesheet" type="text/css" />

<script src="./public/js/article.js" ></script>
<script src="./public/js/jquery-1.11.2.min.js" ></script>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<base href="<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>";</script>
<!-- 你最好检查一下这两行 -->

</head>

 
<body>

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
<?php
	if(!$status){
		echo '<div class="container">';
		echo  "<div class='mainBody'>".$msg."</div>"; 
		echo '</div>';
	}
	else{
		echo '<div class="container">';
		echo '<div class="title">'.$row['title'].'</div>';
		echo '<div class="info">';
		echo'作者: <div class="author">'.$row['name'].	'</div>&nbsp;&nbsp;&nbsp;&nbsp; 发表时间:&nbsp;&nbsp;<div class="launchTime">'.date('Y-m-d',$row['time']).'</div>&nbsp;&nbsp;</div>';
		echo  "<div class='mainBody'>".htmlspecialchars_decode($row['content'])."</div>"; 
		echo '</div>';
	}
?>
</div>
</div>
</body>
</html>