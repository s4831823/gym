<?php

$memId = $_POST['memIdS'];

try{
    require_once("js/connect.php");
    $sql = "select memNo from member where memId = :memId ";
    $member = $pdo -> prepare($sql);
    $member -> bindValue(':memId',$memId);
    $member -> execute();

    $memberRow = $member ->fetchObject();
    if($memberRow == ''){
        echo'not';

    }else{
        echo $memberRow ->memNo;
    }
    

  }catch(PDOException $e){
    echo "error";
  }



?>