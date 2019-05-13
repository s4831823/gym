<?php 
$errMsg = "";
try {
    require_once('connect_forum.php');

    // if(isset($_GET['order'])) {
    //     $order = $_GET['order'];
    // }else {
    //       $order = 'fp.postTime';
    // }

    // if(isset($_GET['sort'])) {
    //     $sort = $_GET['sort'];
    // }else {
    //       $sort = 'DESC';
    // }

    $sql = "SELECT * 
    FROM forumPost fp JOIN member m ON fp.memNo = m.memNo
                      JOIN forumPostImg fpi ON fp.postNo = fpi.postNo
                      WHERE fp.postCat = 2";
    // if(isset($_GET['search'])) {
    //     $search = $_GET['search'];
    //     echo $search;
    // }

    // $sql = "SELECT * 
    //         FROM forumPost fp JOIN member m1 ON fp.memNo = m1.memNo
    //                           JOIN forumPostImg fpi ON fp.postNo = fpi.postNo                              
    //                           ORDER BY $order $sort";
    // $sql_innerpost = 'SELECT * 
    //                   FROM forumPost JOIN member ON forumPost.memNo = member.memNo
    //                                  JOIN forumMsg ON forumPost.postNo = forumMsg.postNo
    //                                  JOIN member ON forumMsg.memId = member.memId
    //                                  JOIN forumPostImg ON forumPost.postNo = forumPostImg.postNo';
    // $sql_next = "SELECT * 
    //             FROM forumPost 
    //             JOIN member ON forumPost.memNo = member.memNo
    //             JOIN forumPostImg ON forumPost.postNo = forumPostImg.postNo
    //             WHERE forumPost.postNo = (SELECT min(forumPost.postNo)
    //                 FROM forumPost 
    //                 JOIN member ON forumPost.memNo = member.memNo
    //                 JOIN forumPostImg ON forumPost.postNo = forumPostImg.postNo
    //                 WHERE forumPost.postNo > 2)";
    // $sql_previous = "SELECT * 
    //                 FROM forumPost 
    //                 JOIN member ON forumPost.memNo = member.memNo
    //                 JOIN forumPostImg ON forumPost.postNo = forumPostImg.postNo
    //                 WHERE forumPost.postNo = (SELECT max(forumPost.postNo)
    //                     FROM forumPost 
    //                     JOIN member ON forumPost.memNo = member.memNo
    //                     JOIN forumPostImg ON forumPost.postNo = forumPostImg.postNo
    //                     WHERE forumPost.postNo < 2)";
    // $sql_previous = "SELECT * 
    //             FROM forumPost 
    //             JOIN member ON forumPost.memNo = member.memNo
    //             JOIN forumPostImg ON forumPost.postNo = forumPostImg.postNo
    //             WHERE ";
    $posts = $pdo->prepare($sql);
    //  $posts_next = $pdo->query($sql_next);
    //  $posts_previous = $pdo->query($sql_previous);
    //  $posts->bindValue(':order', $order);
    $posts->execute();

    $post = $posts->fetchAll(PDO::FETCH_ASSOC);
    $str = "";
    $rowCount = 0;
   
    foreach($post as $row) {
        $rowCount+=1;
        if($rowCount < count($post)) {
            $str = $str.json_encode($row)."split";
        }else {
            $str = $str.json_encode($row);
        }
        
    }
    echo $str;

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}
?>