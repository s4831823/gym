<?php

try{
    require_once("js/connect.php");
    $sql = "select * from member";
    $member = $pdo -> query($sql);
    while($memberRow = $member->fetchAll()){
      echo json_encode($memberRow);
        // echo $memberRow->memNo.'|';      //[0] 會員編號
        // echo $memberRow->memName.'|';    //[1] 會員姓名
        // echo $memberRow->memId.'|';      //[2] 會員帳號
        // echo $memberRow->memPsw.'|';     //[3] 會員密碼
        // echo $memberRow->memEmail.'|';   //[4] 會員信箱
        // echo $memberRow->memImg.'|';     //[5] 會員大頭貼
        // echo $memberRow->memRegDate.'|'; //[6] 會員註冊日期
        // echo $memberRow->memState.'|';   //[7] 會員狀態
        // echo $memberRow->memRepTimes;    //[8] 會員被檢舉次數
    }
  }catch(PDOException $e){
    echo "error";
  }



?>