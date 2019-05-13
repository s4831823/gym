<?php
session_start();

$jsonStr = $_REQUEST["jsonStr"];
$editInfo = json_decode($jsonStr);

try{
    require_once("connect.php");
    $sql = "update member set memName = :memName , memEmail = :memEmail where memNo = :memNo";
    $memberEdit = $pdo->prepare($sql);
    $memberEdit ->bindValue(':memName',$editInfo->memNewName);
    $memberEdit ->bindValue(':memEmail',$editInfo->memNewEmail);
    $memberEdit ->bindValue(':memNo',$_SESSION['memNo']);
    $memberEdit->execute();

    echo 'OK';

}catch(PDOException $e){
    echo 'error / '.$e->getMessage();
}
?>

