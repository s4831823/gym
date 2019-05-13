<?php
try{
    require_once('connect_forum.php');

    

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}

?>