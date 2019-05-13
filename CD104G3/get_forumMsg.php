<?php 
$errMsg = "";
try {
    require_once('connect_forum.php');
    $currentPostNo = $_POST["currentPostNo"];
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
    FROM forumMsg fm JOIN member m ON fm.memNo = m.memNo
                     JOIN forumPost fp ON fp.postNo = fm.postNo 
                     WHERE fp.postNo = :currentPostNo
                     ORDER BY fm.msgTime DESC";
    
    $posts = $pdo->prepare($sql);
    $posts->bindValue(':currentPostNo', $currentPostNo);
    $posts->execute();

    $post = $posts->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($post);
   

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}
?>