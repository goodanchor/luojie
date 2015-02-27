<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<base href="<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>";</script>
<link href="./public/css/file-list.css" rel="stylesheet" type="text/css" />

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
					<a class="nav_cell" href="./index.php/show/index">首页</a>
					<a class="nav_cell" href="./index.php/show/articlelist">文章</a>
					<a class="nav_cell" href="./index.php/show/files">文件下载</a>
				</div>
			</div>
		</div>
		<div id="main">
			<div class="info">
				<div class="wj">文件</div>
				<div class="download">下载</div>
				<div class="sj">时间</div>
				<div class="scz">上传者</div>

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
	</div>
	<div id="download_page">
		<img src="./index.php/show/captcha">
		<label for="captcha">验证码</label>
		<input type="button" id="refresh" value="刷新" >
		<input type='hidden' id='fileid' name='fileid'>
		<input type="text" id="captcha" name='captcha'>
		<input type="button" id="submit" value="下载" >
		<input type="button" id="cancel" value="取消" >
	</div>
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
	$("#submit").click(function(){
		$.ajax({
			type:"post",
			url:URL + "index.php/files/download",
			data:{
				captcha : $("#captcha").val().trim(),
				fileid : cur_fileId,
			},
			success:function(res){
				if(res == "captcha errored"){
					alert("验证码错误");
					$("#download_page img").attr("src","./index.php/show/captcha?rand=" + Math.random());
				}else{
					var link=$("<a>");
					link.attr("id","tempLink");
					link.attr("href",res);
					link.attr("target","_blank");
					link.hide();
					$("body").append(link);
					$("#tempLink")[0].click();
					$("#tempLink").remove();
					$("#cancel")[0].click();
				}
			}
		});
	});
</script>
</html>