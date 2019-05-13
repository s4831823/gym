<?php
$errMsg ="";
$msg = "";
try{
    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";
    $password ="cd104g3";
    
    $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn,$user,$password,$options);
    $sql ="insert into companybase(siteName,siteAddr,siteTel,lat,lng)" .
        "values('{$_POST['siteName']}', '{$_POST['siteAddr']}', '{$_POST['siteTel']}', {$_POST['lat']}, {$_POST['lng']})";
    $pdo->query($sql);
 
    header('location:aboutmanage.php');
    }catch(PDOException $e){
    $errMsg ="錯誤原因:" . $e->getMessage()."<br>"."錯誤行號:". $e->getLine()."<br>";
 }
?>
