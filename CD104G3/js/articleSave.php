<?php
session_start();

try{
  require_once("connect.php");
  $sql = "select forumpost.postNo,forumpost.postTitle,forumpost.postTime,forumpost.memNo,member.memName from forumpostsave left join forumpost on forumpost.postNo = forumpostsave.postNo left join member on member.memNo = forumpostsave.memNo where member.memNo = :memNo";
  $postsave = $pdo ->prepare($sql);
  $postsave->bindValue(":memNo",$_SESSION['memNo']);
  $postsave->execute();


  $postsaveRow = $postsave->fetchAll();
  echo json_encode($postsaveRow);

}catch(PDOException $e){
  echo 'error';
}
?>