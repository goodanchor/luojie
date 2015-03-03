<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href = "<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
<link href="./public/css/article-list.css" rel="stylesheet" type="text/css" />
<link href="./public/css/layout.css" rel="stylesheet" type="text/css" />

<script src="./public/js/article-list.js" ></script>
<script src="./public/js/jquery-1.11.2.min.js" ></script>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<!-- 你最好检查一下这两行 -->

</head>

 
<body>

<div id="background">
<div id="head">
	<div id="nav_top">
		<div class="logo"></div>
		<div class="nav_top_cell xhykzzhsy">信号与控制综合实验</div>
		<div class="nav_top_cell szdlyljsj">数字电路与逻辑设计</div>
		<div class="nav_top_cell wjylyjkjs">微机原理与接口技术</div>
		<div class="nav_top_cell qrsxt">嵌入式系统</div>
	</div>
</div>
<div id="body">
	<div id="nav_left">
		<div class="nav_left_cell sy">首页</div>
		<div class="nav_left_cell cut-off wz">文章</div>
		<div class="nav_left_cell wjxz">文件下载</div>
	</div>
	<div id="main">
		<div class="box">
			<div class="title">
				<div class="info bt">标题</div>
				<div class="info zz">作者</div>
				<div class="info sj">时间</div>
			</div>
			<div class="file">
				<div class="info bt black">啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</div>
				<div class="info zz black">aa</div>
				<div class="info sj blue">2015-02-03</div>
			</div>
			<div class="file">
				<div class="info bt black">啊啊啊啊啊啊啊啊啊啊啊啊啊啊</div>
				<div class="info zz black">aa</div>
				<div class="info sj blue">2015-02-03</div>
			</div>
			<div class="file">
				<div class="info bt black">啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</div>
				<div class="info zz black">aa</div>
				<div class="info sj blue">2015-02-03</div>
			</div>
		</div>
	</div>

<?php
if($status){
	foreach($rows as  $row){
	echo'<div class="list">';
	echo	'<div class="bt"><a href="./index.php/show/article/'.$row['passageid'].'">'.$row['title'].'</a></div>';
	echo 	'<div class="sj">'.date('Y-m-d',$row['time']).'</div>';
	echo'<div class="zz">'.$row['name'].'</div></div>';
	}
}
?>
	<div class="page"><?php echo $this->pagination->create_links()?></div>

</div>
</body>
</html>