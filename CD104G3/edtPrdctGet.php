<?php
$prodNo = $_GET["prodNo"];

try{
    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";
    $password = "cd104g3";
    $options=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn,$user,$password,$options);

    $sql = "select * from product where prodNo = :prodNo";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(":prodNo", $prodNo);
    $pdoStatement->execute();
    $prodData = $pdoStatement->fetchObject();

    echo json_encode($prodData);




}catch(PDOException $e){
    $errMsg = "錯誤原因：".$e->getMessage()."<br>"."錯誤行號：".$e->getLine()."<br>";
};



?>