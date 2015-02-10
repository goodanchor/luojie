$(document).ready(function(){
	setTimeout(function(){
		$("#upload").uploadify({
	        height        : 30,
	        width         : 120,
	        swf           : URL + 'public/uploadify.swf',
	        uploader      : URL + 'index.php/files/upload',
	    });
	  },100);
});