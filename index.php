<html>
<head>
<style>
body{width:95%;}
#uploadForm {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
#uploadForm label {margin:2px; font-size:1em; font-weight:bold;}
.demoInputBox{padding:5px; border:#F0F0F0 1px solid; border-radius:4px; background-color:#FFF;}
#progress-bar {background-color: #12CC1A;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
.btnSubmit{background-color:#09f;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;font-size:150%;}
label{font-size: 150%;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}

</style>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
-->
<script src="jquery-1.11.0.min.js"></script>
<script src="script.js"></script>

<script type="text/javascript">
$(document).ready(function() { 
	 $('#uploadForm').submit(function(e) {	
		if($('#userImage').val()) {
			e.preventDefault();
			$('#loader-icon').show();
			$(this).ajaxSubmit({ 
				target:   '#targetLayer', 
				beforeSubmit: function() {
				  $("#progress-bar").width('0%');
				},
				uploadProgress: function (event, position, total, percentComplete){	
					$("#progress-bar").width(percentComplete + '%');
					$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
				},
				success:function (){
					$('#loader-icon').hide();
				},
				resetForm: true 
			}); 
			return false; 
		}
	});
}); 

</script>
</head>
<body>
<div class="container">
<form id="uploadForm" action="upload.php" method="post" role="form" style="font-size:100%;width:100%;" enctype="multipart/form-data" onsubmit="false">
<div class="form-group">
<h1>Upload Image File:</h1>
<input name="userImage[]" id="userImage" type="file" class="demoInputBox"  style="font-size:150%" multiple/>
</div><br>
<div><input type="submit" id="btnSubmit" value="Submit" class="btnSubmit" /></div>
<div id="progress-div"><div id="progress-bar"></div></div>
<div id="targetLayer"></div>
</form>
<div id="loader-icon" style="display:none;"><img src="LoaderIcon.gif" /></div>
</div>
</body>
</html>