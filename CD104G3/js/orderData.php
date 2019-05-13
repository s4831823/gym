<?php
session_start();

try{
    require_once("connect.php");
    $sql = "select prodorder.orderNo,prodorder.orderDate,prodorder.orderState from prodorder
    left join member on member.memNo = prodorder.memNo 
    where member.memNo = :memNo";
    $prodList = $pdo -> prepare($sql);
    $prodList->bindValue(":memNo", $_SESSION['memNo']);
    $prodList->execute();

    $prodListRow = $prodList->fetchAll();
    echo json_encode($prodListRow);
    // echo $prodListRow;

    
  }catch(PDOException $e){
    echo "error";
  }



?>