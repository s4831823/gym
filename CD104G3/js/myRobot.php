<?php
session_start();

try{
  require_once("connect.php");
  $sql = "select * from rbtorder left join member on rbtorder.memNo = member.memNo where member.memNo =:memNo";
  $robotInfo = $pdo ->prepare($sql);
  $robotInfo->bindValue(":memNo",$_SESSION['memNo']);
  $robotInfo->execute();


  $robotInfoRow = $robotInfo->fetchAll();
  echo json_encode($robotInfoRow);

}catch(PDOException $e){
  echo 'error';
}
?>