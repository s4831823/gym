<?php
$errMsg ="";
$msg = "";
try{
    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";
    $password ="cd104g3";
    
    $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn,$user,$password,$options);
    $sql = "DELETE FROM companybase WHERE siteNo = {$_GET['siteNo']}";
    var_dump($sql);
    $pdo->query($sql);
 
    header('location:aboutmanage.php');
    }catch(PDOException $e){
        $errMsg ="錯誤原因:" . $e->getMessage()."<br>"."錯誤行號:". $e->getLine()."<br>";
}