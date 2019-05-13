<?php

try{
  require_once("connect.php");
  $sql = "SELECT r.rbtNo FROM rbtorder r ORDER BY r.rbtAbility desc";
  $robotInfo = $pdo ->query($sql);
  $robotInfoRow = $robotInfo->fetchAll();
  echo json_encode($robotInfoRow);




}catch(PDOException $e){
  echo 'error /'.$e-> getmessage();
}
?>