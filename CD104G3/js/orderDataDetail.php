<?php
session_start();

try{
    require_once("connect.php");
    $sql = "select prodorder.orderNo,prodorder.orderDate,prodorder.orderReceiver,prodorder.orderAddr,prodorder.orderState,proditem.prodQty,product.prodName,proditem.prodPrice,product.prodImg from proditem
    left join prodorder on prodorder.orderNo = proditem.orderNo
    left join member on member.memNo = prodorder.memNo 
    left join product on product.prodNo = proditem.prodNo
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