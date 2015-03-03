<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href="<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>";</script>
<link href="./public/css/file-list.css" rel="stylesheet" type="text/css" />
<link href="./public/css/layout.css" rel="stylesheet" type="text/css" />

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
				<div class="info wj">文件</div>
				<div class="info scz">上传者</div>
				<div class="info sj">时间</div>
				<div class="info xz">下载</div>
			</div>
			<div class="file">
				<div class="info wj">chapter 1.ppt</div>
				<div class="info scz">admin</div>
				<div class="info sj">2015-02-26</div>
				<div class="info download">下载</div>
			</div>
			<div class="file">
				<div class="info wj">chapter 2.ppt</div>
				<div class="info scz">admin</div>
				<div class="info sj">2015-02-26</div>
				<div class="info download">下载</div>
			</div>
			<div class="file">
				<div class="info wj">chapter 3.ppt</div>
				<div class="info scz">admin</div>
				<div class="info sj">2015-02-26</div>
				<div class="info download">下载</div>
			</div>
		</div>
	</div>
	
<?php 
	if($status){
		foreach($rows as $row){
			echo'<div class="list">';
			echo	'<div class="wj">'.$row['filename'].'</div>';
			echo 		'<input type="button" class="download_btn" value="下载" name="'.$row['fileid'].'">';
			echo 	'<div class="sj">'.date('Y-m-d',$row['uploadtime']).'</div>';
			echo	'<div class="scz">'.$row['name'].'</div>';
			echo'</div>';
		}
	}
	else{
		echo '<div class="list">no files</div>';
	}
?>
			
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