<?php
    try {
        require_once("../js/connect.php");

        $jsonStr = $_POST["jsonStr"];
        $orderNo = json_decode($jsonStr);

        $sql = "SELECT p.prodName, i.orderNo, i.prodPrice, i.prodQty,
                       i.prodPrice* i.prodQty AS subtotal 
                FROM product p 
                    JOIN proditem i ON p.prodNo = i.prodNo 
                WHERE i.orderNo = :orderNo";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":orderNo", $orderNo->orderNo);
        $stmt->execute();
        
        $itemInfo = $stmt -> fetchAll();
        echo json_encode($itemInfo);

    } catch (PDOException $e) {
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
        echo "錯誤行號 : ", $e->getLine(), "<br>";
    }  
?>
