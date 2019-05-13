<?php
ob_start();
session_start();

$jsonStr = $_REQUEST["jsonStr"];
$loginInfo = json_decode($jsonStr);

try{
  require_once("connect.php");
  $sql = "select * from member where memId=:memId and memPsw=:memPsw";
  $member = $pdo->prepare($sql);
  $member->bindValue(":memId", $loginInfo->memId);
  $member->bindValue(":memPsw", $loginInfo->memPsw);
  $member->execute();

  if( $member->rowCount() ==0){ //查無此人
    echo "not found";
  }else{ //登入成功
    //自資料庫中取回資料
    $memRow = $member->fetchObject();
    
  	//寫入session
    $_SESSION["memNo"] = $memRow->memNo;
    $_SESSION["memId"] = $memRow->memId;
    $_SESSION["memName"] = $memRow->memName;
    $_SESSION["memEmail"] = $memRow->memEmail;
    $_SESSION["memImg"] = $memRow->memImg;
    $_SESSION["memState"] = $memRow->memState;


    // print_r($_SESSION);

    //送出登入者的姓名資料
    echo $memRow->memNo.'|';      //傳回會員編號 [0]
    echo $memRow->memId.'|';      //傳回會員帳號 [1]
    echo $memRow->memName.'|';    //傳回會員姓名 [2]
    echo $memRow->memEmail.'|';   //傳回會員信箱 [3]
    echo $memRow->memImg.'|';     //傳回會員照片 [4]
    echo $memRow->memState.'|';   //傳回會員狀態 [5]   0:正常 1:停權
  }
}catch(PDOException $e){
  echo "error";
}
?>