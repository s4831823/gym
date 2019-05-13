<?php
ob_start();
session_start();

$jsonStr = $_REQUEST["jsonStr"];
$registerInfo = json_decode($jsonStr);



try{
    require_once("connect.php");
    $sql = "insert into member (memNo,memName,memId,memPsw,memEmail,memImg,memRegDate,memState,memRepTimes) values (null,:memName,:memId,:memPsw,:memEmail,'js/imagesForMemImg/D4img.png',CURRENT_TIMESTAMP,0,0)";
    $memberReg = $pdo->prepare($sql);
    $memberReg->bindValue(":memName", $registerInfo->memName);
    $memberReg->bindValue(":memId", $registerInfo->memId);
    $memberReg->bindValue(":memPsw", $registerInfo->memPsw);
    $memberReg->bindValue(":memEmail", $registerInfo->memEmail);
    $memberReg->execute();

    $sql2 = "select * from member where memId = :memIdN";
    $member = $pdo->prepare($sql2);
    $member->bindValue(":memIdN", $registerInfo->memId);
    $member->execute();
    $memberRow = $member->fetchObject();
    $_SESSION["memNo"] = $memberRow ->memNo;
    $_SESSION["memId"] = $memberRow ->memId;
    $_SESSION["memName"] = $memberRow ->memName;
    $_SESSION["memEmail"] = $memberRow ->memEmail;
    $_SESSION["memImg"] = $memberRow ->memImg;
    $_SESSION["memState"] = $memberRow ->memState;
    
    echo $memberRow->memNo.'|';      //傳回會員編號 [0]
    echo $memberRow->memId.'|';      //傳回會員帳號 [1]
    echo $memberRow->memName.'|';    //傳回會員姓名 [2]
    echo $memberRow->memEmail.'|';   //傳回會員信箱 [3]
    echo $memberRow->memImg.'|';     //傳回會員照片 [4]
    echo $memberRow->memState.'|';   //傳回會員狀態 [5]   0:正常 1:停權

    // $memRegRow = $memberReg->fetch();
    // $_SESSION["memNo"] = 
    // $_SESSION["memId"] = $registerInfo->memId;
    // $_SESSION["memName"] = $registerInfo->memId;
    // $_SESSION["memEmail"] =$registerInfo->memId;
    // $_SESSION["memImg"] = 'js/imagesForMemImg/D4img.png';
    // $_SESSION["memState"] = '0';

    // echo  $memRow->memNo;
    // echo $memRegRow;

}catch(PDOException $e){
    echo 'error / '.$e->getMessage();
}
?>

