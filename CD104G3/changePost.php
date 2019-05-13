<?php
try{
    require_once('connect_forum.php');

    $postNo = $_POST['postno'];
    $postState  = $_POST['poststate'];

    

    if($postState = 2) {
        //改違規:forumPost, forumPostRep
        $sql1 = "UPDATE forumPost SET repState=:repState WHERE postNo =:postNo";
        $sql2 = "UPDATE forumPostRep SET repPostState=:repPostState WHERE postNo =:postNo";

        $changePost1 = $pdo->prepare($sql1);
        $changePost2 = $pdo->prepare($sql2);

        $changePost1->bindValue(':postNo',  $postNo);        
        $changePost2->bindValue(':postNo',  $postNo);
        $changePost1->bindValue(':repState',  $postState);
        $changePost2->bindValue(':repPostState',  $postState);

        echo $changePost1->execute()? 'forumPost改變成功':'forumPost改變失敗 ';
        echo $changePost2->execute()? 'forumPostRep改變成功':'forumPostRep改變失敗 ';

        

    }else if($postState = 3) {
        //改正常:forumPost, forumPostRep
        $sql1 = "UPDATE forumPost SET repState=:repState WHERE postNo =:postNo";
        $sql2 = "UPDATE forumPostRep SET repPostState=:repPostState WHERE postNo =:postNo";

        $changePost1 = $pdo->prepare($sql1);
        $changePost2 = $pdo->prepare($sql2);

        $changePost1->bindValue(':postNo',  $postNo);        
        $changePost2->bindValue(':postNo',  $postNo);
        $changePost1->bindValue(':repState',  $postState);
        $changePost2->bindValue(':repPostState',  $postState);

        echo $changePost1->execute()? 'forumPost改變成功':'forumPost改變失敗 ';
        echo $changePost2->execute()? 'forumPostRep改變成功':'forumPostRep改變失敗 ';

        // $changedP1 = $changePost1->fetchAll(PDO::FETCH_ASSOC);
        // $changedP2 = $changePost2->fetchAll(PDO::FETCH_ASSOC);

        // echo json_encode($changedP1);
        // echo json_encode($changedP2);

    }else {
        echo "未知錯誤";
    }

    echo '文章編號： '.$postNo. ' 文章狀態(2:違規, 3:正常)： '.$postState;

    

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}    
?>