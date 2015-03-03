<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href="<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>";</script>
<link href="./public/css/file-list.css" rel="stylesheet" type="text/css" />
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
						<div class="info wj">文件</div>
						<div class="info scz">上传者</div>
						<div class="info sj">时间</div>
						<div class="info xz">下载</div>
					</div>
		<?php 
			if($status){
				foreach($rows as $row){
					echo '<div class="file">';
					echo	'<div class="info wj">'.$row['filename'].'</div>';
					echo	'<div class="info scz">'.$row['name'].'</div>';
					echo	'<div class="info sj">'.date('Y-m-d',$row['uploadtime']).'</div>';
					echo	'<div class="info download" name="'.$row['fileid'].'">下载</div>';
					echo '</div>';
				}
			}
			else{
				echo '<div class="file">no files</div>';
			}
		?>
				</div>
			</div>	
		</div>
	</div>
	<form id="download_page" action='index.php/files/download' method='post'>
		<img src="./index.php/show/captcha">
		<label for="captcha">验证码</label>
		<input type="button" id="refresh" value="刷新" >
		<input type='hidden' id='fileid' name='fileid'>
		<input type="text" id="captcha" name='captcha'>
		<input type="submit" id="submit" value="下载" >
		<input type="button" id="cancel" value="取消" >
	</form>
</body>
<script type="text/javascript">
	var cur_fileId = 0;
	$(".download_btn").click(function(){
		cur_fileId = $(this).attr("name");
		$("#download_page img").attr("src","./index.php/show/captcha?rand=" + Math.random());
		$('#fileid').val(cur_fileId);
		$("#download_page").show();
	});
	$("#refresh").click(function(){
		$("#download_page img").attr("src","./index.php/show/captcha?rand=" + Math.random());
	});
	$("#cancel").click(function(){
		cur_fileId = 0;
		 $("#captcha").val("");
		$("#download_page").hide();
	});
	/*$("#submit").click(function(){
		$.ajax({
			type:"post",
			url:URL + "index.php/files/download",
			data:{
				captcha : $("#captcha").val().trim(),
				fileid : cur_fileId,
			},
			dataType:"json",
			success:function(res){
				if(res.status){
					
				}else{
					alert(res.msg);
		 			$("#captcha").val("");
				}
			}
		});
	});*/
</script>
</html>