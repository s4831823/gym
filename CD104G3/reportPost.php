<?php
try {
    require_once('connect_forum.php');
    $reportPostNo = $_POST['reportPostNo'];
    $repPostCause = $_POST['repPostCause'];
    $repPostTime = $_POST['repPostTime'];
    $memNo = $_POST['memNo'];
    $repPostState = $_POST['repPostState'];

   
    $insert1 = $pdo->query("INSERT INTO forumPostRep ( postNo, memNo, repPostTime, repPostCause, repPostState) 
     VALUES ( '{$reportPostNo}', '{$memNo}', now(), '{$repPostCause}', '{$repPostState}')");

    $insert2 = $pdo->query("UPDATE forumPost SET repState = '{$repPostState} '
     WHERE postNo = '{$reportPostNo}'"); 

    echo $insert1? '文章回報成功':'文章回報失敗';
    echo $insert2? '文章狀態修改成功':'文章狀態修改失敗';

}catch(PDOException $e) {
    echo "錯誤訊息： ".$e->getMessage()."錯誤行號： ".$e->getLine();

}







?>