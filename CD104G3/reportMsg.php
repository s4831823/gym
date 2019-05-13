<?php
try {
    require_once('connect_forum.php');
    $msgNo = $_POST['reportPostNo'];
    $repMsgCause = $_POST['repPostCause'];
    $repMsgTime = $_POST['repPostTime'];
    $memNo = $_POST['memNo'];
    $repMsgState = $_POST['repPostState'];

   
    $insert1 = $pdo->query("INSERT INTO forumMsgRep ( msgNo, memNo, repMsgTime, repMsgCause, repMsgState) 
     VALUES ( '{$msgNo}', '{$memNo}', now(), '{$repMsgCause}', '{$repMsgState}')");


    // $insert2 = $pdo->query("UPDATE forumMsg SET repState = '{$repMsgState} '
    //  WHERE postNo = '{$reportPostNo}'"); 

    echo $insert1? '留言回報成功':'留言回報失敗';

}catch(PDOException $e) {
    echo "錯誤訊息： ".$e->getMessage()."錯誤行號： ".$e->getLine();

}







?>