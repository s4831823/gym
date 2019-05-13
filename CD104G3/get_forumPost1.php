<?php 
$errMsg = "";
try {
    require_once('connect_forum.php');

    if(isset($_POST['order'])) {
        $order = $_POST['order'];
    }else {
          $order = 'fp.postTime';
    }

    if(isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
    }else {
          $keyword = '';
    }


    if(isset($_POST['currentPostOrder'])) {
        $postorder = $_POST['currentPostOrder'];
    }else {
        $postorder = 'fp.postTime';
    }

    if(isset($_POST['postcat'])) {
        //點全部文章 postcat值 = 4
        if ($_POST['postcat'] == 4) {
            $sql1 = "SELECT * 
            FROM forumPost fp JOIN member m ON fp.memNo = m.memNo
                            LEFT JOIN forumPostImg fpi ON fp.postNo = fpi.postNo
                            WHERE (fp.postCat = 1 OR fp.postCat =2 OR fp.postCat =3)  AND fp.postTitle LIKE '%".$keyword."%' AND  fp.repState NOT IN (2)
                            ORDER BY :postorder ";
            
            $posts2 = $pdo->prepare($sql1);
            $posts2->bindValue(':postorder', $postorder);
            $posts2->execute();
            $post2 = $posts2->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($post2);
        }else {
            //
            $postcat = $_POST['postcat'];
            $sql1 = "SELECT * 
            FROM forumPost fp JOIN member m ON fp.memNo = m.memNo
                            LEFT JOIN forumPostImg fpi ON fp.postNo = fpi.postNo
                            WHERE fp.postCat = :postCat  AND fp.postTitle LIKE '%".$keyword."%' AND  fp.repState NOT IN (2)
                            ORDER BY :postorder ";
    
            $posts2 = $pdo->prepare($sql1);
            $posts2->bindValue(':postCat', $postcat);  
            $posts2->bindValue(':postorder', $postorder);
            $posts2->execute();
            $post2 = $posts2->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($post2);
        }
        
    }else  {
        //文章分類沒點時，預設為全部文章
        $sql1 = "SELECT * 
        FROM forumPost fp JOIN member m ON fp.memNo = m.memNo
                        LEFT  JOIN forumPostImg fpi ON fp.postNo = fpi.postNo
                        WHERE (fp.postCat = 1 OR fp.postCat =2 OR fp.postCat =3) AND fp.postTitle LIKE '%".$keyword."%' AND  fp.repState NOT IN (2)                      
                        ORDER BY fp.postNo DESC";

        
        $posts2 = $pdo->prepare($sql1);
        $posts2->bindValue(':postorder', $postorder);
        $posts2->execute();
        $post2 = $posts2->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($post2);
    }


    

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}
?>