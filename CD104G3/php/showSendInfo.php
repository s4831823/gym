<?php
    try {
        require_once("../js/connect.php");

        $jsonStr = $_POST["jsonStr"];
        $orderNo = json_decode($jsonStr);

        $sql = "SELECT orderReceiver,orderAddr,orderEmail,orderTel FROM prodorder WHERE orderNo=:orderNo";
        $stmt = $pdo->prepare( $sql);
        $stmt->bindValue(":orderNo", $orderNo->orderNo);
        $stmt->execute();
        
        $sendInfo = $stmt -> fetchAll();
        echo json_encode($sendInfo);

    } catch (PDOException $e) {
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
        echo "錯誤行號 : ", $e->getLine(), "<br>";
    }  
?>