<?php
	$errMsg = "";
	$mgrName = $_POST["mgrname"];
	$mgrId = $_POST["mgrid"];
	$mgrPsw = $_POST["mgrpsw"];
	if($mgrName == "" || $mgrId == "" || $mgrPsw == ""){
		echo'欄位不可為空白';
	}else{
		try {
			require_once("connectcd104g3.php"); 	
			$sql = "INSERT INTO bgmanager(mgrNo,mgrName,mgrId,mgrPsw)VALUES(null,'{$mgrName}','{$mgrId}','{$mgrPsw}')";
			$pdoStatment = $pdo->exec($sql);
			header("Location:mgr_login.php"); 
		} catch (PDOException $e) {
			$errMsg = "錯誤原因：".$e->getMessage()."<br>"."錯誤行號：".$e->getLine()."<br>";
			echo $errMsg;
		}
	}
?>