$(document).ready(function(){
	$("#post_page").click(function(){
		var path = window.location.pathname.split("/");
		var pid = !isNaN(Number(path[5]))?path[5]:false;//获取文章id
        var content = UM.getEditor('container').getContent();
        var title = $("#title").val();
        if(!title.trim()){
        	alert("标题不能为空");
        	return;
        }
        if(pid){
        	var url = URL + "index.php/passage/update_passage";
        }else{
        	var url = URL + "index.php/passage/add_passage";
        }
       	$.ajax({
			type:"post",
			url:url,
			data:{
				passageid :pid,
				title : title,
				content : content,
			},
			dataType:"json",
			success:function(res){
				if(res.status){
					alert("发布成功")
					//window.location.href = URL + "index.php/admin/passli";
				}else{
					alert(res.msg);
				}
			}
		});
	});
});
