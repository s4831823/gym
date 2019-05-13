<?php
try {
    require_once('connect_forum.php');
    $postNo = $_POST['reportno'];
    $memNo = $_POST['memNo'];

   
    $insert1 = $pdo->query("INSERT INTO forumPostSave ( postNo, memNo) 
     VALUES ( '{$postNo}', '{$memNo}')");

      //塞收藏數進去
    $sql2 = "UPDATE forumPost SET saveCount = saveCount +1
    WHERE postNo =:currentPostNo";

    //塞點擊
    $save = $pdo->prepare($sql2);
    $save->bindValue(':currentPostNo', $postNo);
    $save->execute();

  

    echo $insert1? '文章收藏成功':'文章收藏失敗';

}catch(PDOException $e) {
    echo "錯誤訊息： ".$e->getMessage()."錯誤行號： ".$e->getLine();

}







?>