<?php
try{
    require_once('connect_forum.php');

    //撈文章違規
    $sql1 = "SELECT *
            FROM forumPostRep fpr JOIN member m ON fpr.memNo = m.memNo
                                  JOIN forumPost fp ON fpr.postNo = fp.postNo
            WHERE repPostState NOT IN (3)";

    //撈留言違規
    $sql2 = "SELECT *
    FROM forumMsgRep fmr JOIN member m ON fmr.memNo = m.memNo
                         JOIN forumMsg fm ON fmr.msgNo = fm.msgNo
                         WHERE repMsgState NOT IN (3)";

    $repPosts = $pdo->query($sql1);
    $postRows =$repPosts->fetchAll();

    $repMsgs = $pdo->query($sql2); 
    $msgRows = $repMsgs->fetchAll();
    
    
    
    

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}

?>