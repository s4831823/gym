<?php 
$errMsg = "";
try {
    require_once('connect_forum.php');

    $currentPostNo = $_POST["currentPostNo"];
  

  

    $sql = "SELECT * 
    FROM forumPost fp JOIN member m ON fp.memNo = m.memNo
                      JOIN forumPostImg fpi ON fp.postNo = fpi.postNo
                      WHERE fp.postNo = :currentPostNo";

    //塞點擊數進去
    $sql2 = "UPDATE forumPost SET readCount = readCount +1
                              WHERE postNo =:currentPostNo";
    
    //抓內文
    $posts = $pdo->prepare($sql);
    $posts->bindValue(':currentPostNo', $currentPostNo);
    $posts->execute();

    //塞點擊
    $read = $pdo->prepare($sql2);
    $read->bindValue(':currentPostNo', $currentPostNo);
    $read->execute();

    $post = $posts->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($post);
   

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}
?>