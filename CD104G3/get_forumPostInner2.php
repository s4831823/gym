<?php 
$errMsg = "";
try {
    require_once('connect_forum.php');
    $nextPostNo = $_POST["nextPostNo"];

    $sql = "SELECT * 
    FROM forumPost fp JOIN member m ON fp.memNo = m.memNo
                      JOIN forumPostImg fpi ON fp.postNo = fpi.postNo
                      WHERE fp.postNo = :nextPostNo";
    
    $posts = $pdo->prepare($sql);
    $posts->bindValue(':nextPostNo', $nextPostNo);
    $posts->execute();

    $post = $posts->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($post);
   

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}
?>