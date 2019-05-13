<?php
session_start();

try{
  require_once("connect.php");
  $sql = "Update member set memImg=:memImg where memNo=:memNo" ;
  $memberImg = $pdo->prepare($sql);
  $memberImg->bindValue(":memNo",$_SESSION['memNo']);
  $memberImg->bindValue(":memImg",$_SESSION['memNewImg']);
  $memberImg->execute();

  echo 'OK / ';
  echo $_SESSION['memNewImg'];

  
}catch(PDOException $e){
  echo 'error / '.$e->getMessage();
}
?>