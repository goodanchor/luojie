<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href = "<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
<link href="./public/css/homepage.css" rel="stylesheet" type="text/css" />
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
		<div class="announcement">
			<div class="title">公告</div>
			<div class="box position_a">
				<?php
				if($status){
					for($i = 0; $i < 5 && $i < count($rows); $i++){
						echo '<a class="cell" href="./index.php/show/news/'.$rows[$i]['id'].'">'.$rows[$i]['title'].'<div class="time">'.date('Y-m-d',$row['time']).'</div></a>';
					}
				}
				?>
			</div>
			<div class="box">
				<?php
				if($status){
					for($i = 5; $i < 10 && $i < count($rows); $i++){
						echo '<div class="cell">'.$rows[$i]['title'].'<div class="time">'.date('Y-m-d',$row['time']).'</div></div>';
					}
				}
				?>
				<div class="cell">睡懒觉睡懒觉睡懒觉睡懒觉<div class="time">2015-02-28</div></div><div class="cell">睡懒觉睡懒觉睡懒觉睡懒觉<div class="time">2015-02-28</div></div><div class="cell">睡懒觉睡懒觉睡懒觉睡懒觉<div class="time">2015-02-28</div></div>
				<div class="cell">睡懒觉睡懒觉睡懒觉睡懒觉<div class="time">2015-02-28</div></div><div class="cell">睡懒觉睡懒觉睡懒觉睡懒觉<div class="time">2015-02-28</div></div>
				<div class="cell" ><a class="more" href="./index.php/show/newslist">更多公告</a></div>
			</div>
		</div>
		<div class="introduction">
			<div class="title">简介</div>
			<div class="box">电路是电流所经的路径，或称电子回路，是由电气设备和元器件（用电器），按照一定方式连接起来。如电容、电阻、电感、二极管、三极管和开关等，构成的网络。<br></br>
			电路规模的大小，可以相差很大，小到硅片上的集成电路，大到高低压输电网。<br></br>
			
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>