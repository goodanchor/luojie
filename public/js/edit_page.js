$(document).ready(function(){
	var um = UM.getEditor('container');//实例化编辑器
	$("#post_page").click(function(){
		var pid = $GET["pid"] || false;
		console.log(pid)
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
//获取get值
var $GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();