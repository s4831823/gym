<?php
// 將購買資料、寄件資訊從SESSION寫入資料庫
    session_start();

    try{
        require_once("../js/connect.php");

        $sql = "INSERT INTO prodorder (orderNo, memNo , orderDate , orderReceiver,
                                       orderAddr, orderEmail, orderTel, orderState) 
        VALUES (null, :memNo, now(), :orderReceiver, :orderAddr, :orderEmail, :orderTel, '0')";

        $receiverInfo = $pdo->prepare($sql);
        $receiverInfo->bindValue(':memNo', $_SESSION["memNo"]);
        $receiverInfo->bindValue(':orderReceiver', $_SESSION["receiver"]);
        $receiverInfo->bindValue(':orderAddr', $_SESSION["addr"]);
        $receiverInfo->bindValue(':orderEmail', $_SESSION["email"]);
        $receiverInfo->bindValue(':orderTel', $_SESSION["tel"]);
        $receiverInfo->execute();


        //取最後一筆訂單編號
        $orderNo = $pdo->lastInsertId();

        //寫入訂單名細
        $sql = "INSERT INTO proditem (orderNo, prodNo, prodQty, prodPrice)
                VALUES (?, ?, ?, ?)"; 
        $proditems = $pdo->prepare($sql);

        foreach($_SESSION["prodNo"] as $key => $prodNo){
            $proditems->bindValue(1, $orderNo);
            $proditems->bindValue(2, $_SESSION["prodNo"][$prodNo]);
            $proditems->bindValue(3, $_SESSION["prodQty"][$prodNo]);
            $proditems->bindValue(4, $_SESSION["prodPrice"][$prodNo]);
            $proditems->execute();
        } 
        echo "訂單編號",$orderNo,"明細成功";


        // 寫入資料庫後將相關SESSION清空  
        unset($_SESSION["prodNo"]);
        unset($_SESSION["prodImg"]);
        unset($_SESSION['prodQty']);
        unset($_SESSION["prodName"]);
        unset($_SESSION["prodPrice"]);  

        unset($_SESSION["receiver"]);
        unset($_SESSION["email"]);
        unset($_SESSION["addr"]);
        unset($_SESSION["tel"]);

    }catch (PDOException $e){
		echo "錯誤原因： ", $e->getMessage(),"<br>";
		echo "錯誤行號： ", $e->getLine(),"<br>";   
	}

?>