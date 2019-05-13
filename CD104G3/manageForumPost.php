<?php
try{
    require_once('connect_forum.php');

    $filter = $_POST['filter'];
    if($filter == 'seePost' || $filter == '') {
        //撈文章-審查
        $sql1 = "SELECT *
        FROM forumPostRep fpr JOIN forumPost fp ON fpr.postNo = fp.postNo
                              JOIN member m ON fp.memNo = m.memNo
        WHERE fpr.repPostState = 1";

        $repPosts = $pdo->query($sql1);
        $postRows =$repPosts->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($postRows);

    }else if($filter == 'banPost') {
        //撈文章-違規
        $sql1 = "SELECT *
        FROM forumPostRep fpr JOIN forumPost fp ON fpr.postNo = fp.postNo
                              JOIN member m ON fp.memNo = m.memNo
        WHERE  fpr.repPostState = 2";

        $repPosts = $pdo->query($sql1);
        $postRows =$repPosts->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($postRows);

    }else if($filter == 'seeMsg') {
        //撈留言-審查
        $sql2 = "SELECT *
        FROM forumMsgRep fmr JOIN member m ON fmr.memNo = m.memNo
                             JOIN forumMsg fm ON fmr.msgNo = fm.msgNo
                             WHERE fmr.repMsgState = 1";

        $repMsgs = $pdo->query($sql2); 
        $msgRows = $repMsgs->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($msgRows);
        
    }else if($filter == 'banMsg') {
        //撈留言-違規
        $sql2 = "SELECT *
        FROM forumMsgRep fmr JOIN member m ON fmr.memNo = m.memNo
                             JOIN forumMsg fm ON fmr.msgNo = fm.msgNo
                             WHERE fmr.repMsgState = 2";
        
        $repMsgs = $pdo->query($sql2); 
        $msgRows = $repMsgs->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($msgRows);
        
    }else {
        echo 'NOT FOUND DATA';
    }



   

    
    
    
    

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}

?>