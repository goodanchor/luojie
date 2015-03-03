<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href = "<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
<link href="./public/css/article-list.css" rel="stylesheet" type="text/css" />
<link href="./public/css/layout.css" rel="stylesheet" type="text/css" />


<script src="./public/js/jquery-1.11.2.min.js" ></script>
<script src="./public/js/base.js" ></script>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<?php
	$class = isset($class)?$class:1;
	switch ($class) {
		case '1':
			$classCode = "xhykzzhsy";
			break;
		case '2':
			$classCode = "szdlyljsj";
			break;
		case '3':
			$classCode = "wjylyjkjs";
			break;
		case '4':
			$classCode = "qrsxt";
			break;
		
		default:
			
			break;
	}
?>

</head>

 
<body>
<div id="background">
<div id="head">
	<div id="nav_top">
		<div class="logo"></div>
		<a class="nav_top_cell <?php if($class == 1) echo 'active';?>" data-class="1" href="./index.php/show/index/xhykzzhsy">信号与控制综合实验</a>
		<a class="nav_top_cell <?php if($class == 2) echo 'active';?>" data-class="2" href="./index.php/show/index/szdlyljsj">数字电路与逻辑设计</a>
		<a class="nav_top_cell <?php if($class == 3) echo 'active';?>" data-class="3" href="./index.php/show/index/wjylyjkjs">微机原理与接口技术</a>
		<a class="nav_top_cell <?php if($class == 4) echo 'active';?>" data-class="4" href="./index.php/show/index/qrsxt">嵌入式系统</a>
	</div>
</div>
<div id="body">
	<div id="nav_left">
		<a class="nav_left_cell sy" href="./index.php/show/index/<?php echo $classCode;?>">首页</a>
		<a class="nav_left_cell cut-off wz" href="./index.php/show/articlelist/<?php echo $classCode;?>">文章</a>
		<a class="nav_left_cell wjxz" href="./index.php/show/files/<?php echo $classCode;?>">文件下载</a>
	</div>
	<div id="main">
		<div class="box">
			<div class="title">
				<div class="info bt">标题</div>
				<div class="info zz">作者</div>
				<div class="info sj">时间</div>
			</div>
			<a class="file" href="./index.php/show/article">
				<div class="info bt black">啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</div>
				<div class="info zz black">aa</div>
				<div class="info sj blue">2015-02-03</div>
			</a>
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