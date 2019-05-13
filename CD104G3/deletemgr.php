<?php
// var_dump($_REQUEST);
	$errMsg = "";
    $mgrNo=$_POST["mgrno"];

	try {
		require_once("connectcd104g3.php"); 
            
        $sql = "DELETE FROM bgmanager WHERE mgrNo=$mgrNo";
        $pdo->exec( $sql);
        header("Location:mgr_login.php"); 
            
	}catch (PDOException $e) {
        $errMsg = "錯誤原因：".$e->getMessage()."<br>"."錯誤行號：".$e->getLine()."<br>";
        echo $errMsg;
    }
?> 



