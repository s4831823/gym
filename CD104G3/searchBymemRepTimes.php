<?php

$repTimes = $_POST['repTimes'];

try{
    require_once("js/connect.php");
    $sql = "select memNo from member where memRepTimes >= :memRepTimes";
    $memberR = $pdo -> prepare($sql);
    $memberR -> bindValue(':memRepTimes',$repTimes);
    $memberR -> execute();

   
    if($memberR->rowCount() == 0){
        echo'not';
    }else{
        $memberRRow = $memberR ->fetchAll();
        echo json_encode($memberRRow);
    }
    
  }catch(PDOException $e){
    echo "error";
  }



?>