<?php
set_time_limit(3000);
if(!empty($_FILES)) {
	foreach($_FILES["userImage"]["tmp_name"] as $key=>$tmp_name){
		$file_name=$_FILES["userImage"]["name"][$key];
        $file_tmp=$_FILES["userImage"]["tmp_name"][$key];
        $upload_path="uploads/";
        if(is_uploaded_file($file_tmp)){
        	if(move_uploaded_file($file_tmp,$upload_path.$file_name)){
        		$targetPath=$upload_path.$file_name;
		?>
		<img src="<?php echo $targetPath; ?>" width="100px" height="100px" />
		<?php
		}
		}
		}
	}
/*
       _         _           _     
__   _| |__  ___| |__   __ _| |__  
\ \ / | '_ \/ __| '_ \ / _` | '_ \ 
 \ V /| |_) \__ | | | | (_| | | | |
  \_/ |_.__/|___|_| |_|\__,_|_| |_|                            
*/
?>
