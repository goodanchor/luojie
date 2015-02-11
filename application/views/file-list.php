<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<link href="../../public/css/file-list.css" rel="stylesheet" type="text/css" />

<script src="../../public/js/file-list.js" ></script>
<script src="../../public/js/jquery-1.11.2.min.js" ></script>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<base href="<?php echo base_url();?>"/>
<script type="text/javascript"> window.URL = "<?php echo base_url();?>";</script>
<!-- 你最好检查一下这两行 -->

</head>

 
<body>
<div id="background">
<div id="top">
	<div id="head">
		<img src="../../public/images/hust.png" alt="hust" height="60px" width="84.4px" display="inline-block">
		<img src="../../public/images/ei.png" alt="ei" class="ei" height="60px" width="65.5px">
		<div class="nav">
			<div class="nav_cell"><a href = './index.php/show/index'>首页</a></div>
			<div class="nav_cell"><a href = './index.php/show/articlelist'>文章</a></div>
			<div class="nav_cell"><a href = './index.php/show/filelist'>文件下载</a></div>
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
	<div class="list">
		<div class="wj">
			file
		</div>
		<input type="button" class="button" value="下载">
		<div class="sj">
			2015/2/11
		</div>
		<div class="scz">
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