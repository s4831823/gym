<?php
session_start();

try{
  require_once("connect.php");
  $sql = "select forumpost.postNo,member.memName,member.memNo
  from forumpostsave
  LEFT join forumpost on forumpost.postNo = forumpostsave.postNo
  left join member on forumpost.memNo = member.memNo
  where forumpostsave.memNo = :memNo";

    $artwriter = $pdo ->prepare($sql);
    $artwriter -> bindValue(':memNo',$_SESSION['memNo']);
    $artwriter -> execute();
    $artwriterRow = $artwriter -> fetchAll();
    echo json_encode($artwriterRow);
    
}catch(PDOException $e){
  echo 'error /'.$e-> getmessage();
}
?>