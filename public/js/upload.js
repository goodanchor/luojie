$(document).ready(function(){
	setTimeout(function(){
		$("#upload").uploadify({
	        height        : 30,
	        width         : 120,
	        swf           : URL + 'public/uploadify.swf',
	        uploader      : URL + 'index.php/files/upload',
	        formData      : formData,
	        'onUploadComplete' : function(file) {
        	},
        	'onUploadError' : function(file, errorCode, errorMsg, errorString) {
	            alert('文件 ' + file.name + ' 上传失败: ' + errorString);
	        },
	        'onQueueComplete' : function(queueData) {
	            window.location.reload();
	        }
	    });
	  },100);
});
