$(document).ready(function(){
	$("#login").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		if(!username || !password){
			alert("账号密码不能为空");
			return;
		}
		$.ajax({
			type:"post",
			url:URL + "index.php/admin/login",
			data:{
				username : username,
				password : password,
			},
			dataType:"json",
			success:function(res){
				if(res.status){
					alert("登录成功");
				}else{
					alert(res.msg);
					$("#password").val("");
				}
			},
			error:function(res){
				alert("登录失败,请检查网络");
			}
		});
	});
});