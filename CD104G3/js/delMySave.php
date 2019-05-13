<?php
session_start();
$delPostNo = $_POST['postNo'];

try{
  require_once("connect.php");
  $sql = "DELETE from forumpostsave where forumpostsave.postNo = :postNo and forumpostsave.memNo = :memNo";
  $delPost = $pdo ->prepare($sql);
  $delPost -> bindValue(':postNo',$delPostNo);
  $delPost -> bindValue(':memNo',$_SESSION['memNo']);
  $delPost -> execute();

  echo 'OK';


}catch(PDOException $e){
  echo 'error /'.$e-> getmessage();
}

?>