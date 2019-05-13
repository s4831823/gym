<?php
session_start();



if($_FILES["upFile"]["error"] == 'UPLOAD_ERR_OK'){ ///表上傳成功
	if( file_exists("imagesForMemImg") === false){
		mkdir("imagesForMemImg"); //做路徑
	}

	$from = $_FILES["upFile"]["tmp_name"];
	$temp = "{$_SESSION["memNo"]}_{$_FILES["upFile"]["name"]}";
	$to = "imagesForMemImg/$temp";
	$path_parts = pathinfo( $to );
	copy($from, $to);		
	$_SESSION['memNewImg'] = 'js/imagesForMemImg/'.$temp;
	echo $_SESSION['memNewImg'];

}else{
	echo'error';
}

?>      
