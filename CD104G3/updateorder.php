<?php
$rbtNo = $_REQUEST['rbtNo'];
$updateorder = $_REQUEST['updateorder'];
$errMsg ="";
$msg = "";
for ($i=0; $i< count($rbtNo)  ; $i++) { 
try{
        $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
        $user = "cd104g3";
        $password ="cd104g3";
        $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $pdo = new PDO($dsn,$user,$password,$options);
        $sql="update rbtorder set rbtOdState=:rbtOdState  where rbtNo = :rbtNo";
        $member = $pdo->prepare($sql);
        $member->bindValue(":rbtNo",$rbtNo[$i]);
        $member->bindValue(":rbtOdState",$_REQUEST['updateorder'][$i]);
        $member->execute();
    }catch(PDOException $e){
        $errMsg ="錯誤原因:" . $e->getMessage()."<br>"."錯誤行號:". $e->getLine()."<br>";
    }
}
header("location:rbtOrder.php");
?>