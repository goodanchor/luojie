var post_status = "ready";
$(document).ready(function(){
	$("#post_notice").click(function(){
		if(post_status == "posting"){
			alert("发布中,请稍等");
			return;
		}
		post_status = "posting";
		var path = window.location.pathname.split("/");
		var nid = !isNaN(Number(path[5]))?path[5]:false;//获取文章id
        var content = UM.getEditor('container').getContent();
        var title = $("#title").val();
        if(!title.trim()){
        	alert("标题不能为空");
        	return;
        }
        if(nid){
        	var url = URL + "index.php/notice/update_notice";
        }else{
        	var url = URL + "index.php/notice/add_notice";
        }
       	$.ajax({
			type:"post",
			url:url,
			data:{
				noticeid : nid,
				title : title,
				content : content,
			},
			dataType:"json",
			success:function(res){
				if(res.status){
					alert("发布成功")
					window.location.href = URL + "index.php/admin/notice";
				}else{
					alert(res.msg);
				}
				post_status = "ready";
			},
			error:function(){
				post_status = "ready";
			}
		});
	});
});
