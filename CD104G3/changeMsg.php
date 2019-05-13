<?php
try{
    require_once('connect_forum.php');

    $postNo = $_POST['msgno'];
    $postState  = $_POST['poststate'];


    var_dump($postNo);
    var_dump($postState);
    

    if($postState == 2) {
        //改違規:forumPost, forumPostRep
        $sql1 = "UPDATE forummsgrep SET repMsgState=:repState WHERE msgNo =:postNo";

        $changePost1 = $pdo->prepare($sql1);
        $changePost1->bindValue(':postNo',  $postNo);  
        $changePost1->bindValue(':repState',  $postState);
        $changePost1->execute();
        echo $changePost1->execute()? 'forumMsg改變成功':'forumMsg改變失敗 '; 



    }else if($postState == 3) {
        //改正常:forumPost, forumPostRep
        $sql1 = "UPDATE forummsgrep SET repMsgState=:repState WHERE msgNo =:postNo";

        $changePost1 = $pdo->prepare($sql1);
        $changePost1->bindValue(':postNo',  $postNo);  
        $changePost1->bindValue(':repState',  $postState);
        $changePost1->execute();
        echo $changePost1->execute()? 'forumMsg改變成功':'forumMsg改變失敗 '; 

    }else {
        echo "未知錯誤";
    }

    echo '文章編號： '.$postNo. ' 文章狀態(2:違規, 3:正常)： '.$postState;

    

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}    
?>