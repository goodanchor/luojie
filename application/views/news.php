<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href = "<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>"; </script>
<link href="./public/css/article.css" rel="stylesheet" type="text/css" />
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
		<div class="title">这是一个标题</div>
		<div class="zz">作者：admin</div>
		<div class="sj">时间：2015-02-26</div>
		<div class="box">依据电磁场理论、半导体理论建立电器件的电路模型，
		其目的是在一定工作条件下获得足以表达器件电磁性能的数学方程，
		方程涉及的电磁量常只限于电流、电压、磁通、电荷；或者是得出足以反映
		器件电磁性能的电路图，该图由一些典型的电路元件（例如电阻器、电容器、
		电感器等）组成。数学方程和电路图都是电路模型。如果器件或设备的电磁
		性能复杂，造型的任务便越出了电路理论的范围而由其他学科承担，例如电机
		的电路造型任务由电机学完成。有时也采用“黑匣子”方法造型，即在器件的
		外部端钮上施加多种激励，根据测量到的响应建立电路模型。例如在确知
		电路模型是线性模型的前提下,常由测量得到器件的冲激响应,用它来构造器件的
		型。 　电路分析 　根据已知的电路结构和电路元件，计算电路的响应，
		即计算电压、电流等，以研究电路的特性。因此必须列出电路方程并求出方程的解
		。电路的方程可由两类方程列出：一类是由电路的支路、节点情况列出的KCL方程、
		KVL方程（见基尔霍夫定律），常称为拓扑约束；另一类是表征各电路元件特性的方程，
		常称为元件约束。分析电路时，可以利用电路理论所特有的技巧建立电路方程或者简化
		解方程的过程。例如建立电路图的节点法方程极为简便，易于编制计算机程序，因而得到
		广泛的应用；戴维南定理则是直接加工电路图，使求解过程简化；解电路的过渡过程时，
		可以结合微分方程的数值解法加工电路图，得出支网络模型。既然各门学科的分析任务多
		是解方程，因此电路分析理论的发展和其他学科的发展是互相促进。例如19世纪末
		C.P.施泰因梅茨提出的分析正弦电流电路的相量法，广泛应用于其他学科中简正运动的
		研究。20世纪20年代荷兰学者B.范德坡尔提出了电子管振荡器的数学模型（范德坡尔方程）
		及其近似解法，该方程内容丰富，至今仍是人们研究的对象；他提出的解法经过长期发展
		之后，成为研究非线性力学的一种手段。1927年，H.S.布莱克首先用反馈概念说明电子
		放大器输出信号经变换后送回输入端的电路理论。反馈遂成为控制理论的一个基本概念。
		其他学科的发展也促进了电路分析的发展，计算机广泛用于电路分析是一个显著的例子。
		</div>
	</div>

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
</body>
</html>