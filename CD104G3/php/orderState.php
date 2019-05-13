<?php
    try {
        require_once("../js/connect.php");

        $orderState = $_GET["orderState"];
        $orderNo = $_GET['orderNo'];

        // 取消結單:1 -> 待出貨:0
        if($orderState == '1'){
            $orderState = 0;
        }
        // 待出貨:0 -> 已結單:1
        else if($orderState == '0'){
            $orderState = 1;
        }


        $sql = "UPDATE prodorder 
                SET orderState= $orderState
                WHERE orderNo = $orderNo;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        echo $orderState;

    } catch (PDOException $e) {
        echo '失敗';
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
        echo "錯誤行號 : ", $e->getLine(), "<br>";
    }  
?>