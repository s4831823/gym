<?php
// btn--buy的click事件發生時，判斷是否已購買該商品
    session_start();

    $prodNo = $_REQUEST["prodNo"];

    if(in_array($prodNo,$_SESSION["prodNo"]))
        echo '已經購買過此項商品';
    else{
        $_SESSION["prodName"][$prodNo] = $_REQUEST["prodName"];
        $_SESSION["prodNo"][$prodNo] = $_REQUEST["prodNo"];
        $_SESSION["prodQty"][$prodNo] = $_REQUEST["prodQty"];
        $_SESSION["prodImg"][$prodNo] = $_REQUEST["prodImg"];
        $_SESSION["prodPrice"][$prodNo] = $_REQUEST["prodPrice"];
        echo '沒買過';
    }

?>