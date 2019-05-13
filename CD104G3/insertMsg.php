<?php
try {
require_once('connect_forum.php');

$memNo =$_POST["memNo"];
$memId =$_POST["memId"];
$msgInner =$_POST["msgInner"];
$postno = $_POST["postno"];
// $sql = "INSERT INTO forumMsg ( msgInner, msgTime, postNo) 
//                     VALUES ('{$msgInner}', '{$msgTime}', '{$postno}')";
$sql = "INSERT INTO forumMsg ( memNo, memId, msgInner, msgTime, postNo) 
                    VALUES ('{$memNo}','{$memId}', '{$msgInner}', now(), '{$postno}')";

  //塞留言數進去
  $sql2 = "UPDATE forumPost SET msgCount = msgCount +1
  WHERE postNo =:currentPostNo";

//塞留言數
$reply = $pdo->prepare($sql2);
$reply->bindValue(':currentPostNo', $postno);
$reply->execute();

if($forum = $pdo->query($sql)) {
    echo "data save";
}
}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}
                 

?>