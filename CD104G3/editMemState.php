<?php

$memNo = $_POST['memNo'];
$optionsE = $_POST['state'];



try{
    require_once("js/connect.php");
    $sql = "update member set memstate = :memstate where memNo = :memNo";
    $member = $pdo -> prepare($sql);
    $member->bindValue(':memNo',$memNo);
    $member->bindValue(':memstate',$optionsE);
    $member->execute();

    echo 'ok';
   
  }catch(PDOException $e){
    echo "error";
  }



?>