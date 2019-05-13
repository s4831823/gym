<?php   
// 數量增減時更新 $_SESSION["prodQty"]
    session_start();
 
    $prodNo = $_REQUEST["prodNo"];
    $_SESSION["prodNo"][$prodNo] = $_REQUEST["prodNo"];
    $_SESSION["prodQty"][$prodNo] = $_REQUEST["prodQty"];

    if($_SESSION["prodQty"][$prodNo] <= 0){
        unset($_SESSION["prodNo"][$prodNo]);
        unset($_SESSION["prodImg"][$prodNo]);
        unset($_SESSION['prodQty'][$prodNo]);
        unset($_SESSION["prodName"][$prodNo]);
        unset($_SESSION["prodPrice"][$prodNo]);
    }
    // print_r( $_SESSION);

?>