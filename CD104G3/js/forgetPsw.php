<?php

//一定要關掉防毒不然找死你 = =
//一定要關掉防毒不然找死你 = =
//一定要關掉防毒不然找死你 = =

require_once("PHPMailer-5.2.9/PHPMailerAutoload.php"); //匯入PHPMailer類別

$jsonStr = $_REQUEST["jsonStr"];
$forgetPswInfo = json_decode($jsonStr);

try{
  require_once("connect.php");
  $sql = "select * from member where memId=:memId and memEmail=:memEmail";
  $forgetPswMem = $pdo->prepare($sql);
  $forgetPswMem->bindValue(":memId", $forgetPswInfo->memId);
  $forgetPswMem->bindValue(":memEmail", $forgetPswInfo->memEmail);
  $forgetPswMem->execute();

  if($forgetPswMem -> rowCount() == 0){  //找不到符合的資料喔
      echo "notfound";
  }else{  //找到了 = 你打對了 我寄信給你
    $forgetPswMemRow = $forgetPswMem->fetchObject();

    $memName = $forgetPswMemRow->memName;
    $memPsw = $forgetPswMemRow->memPsw;
    $memEmail = $forgetPswMemRow->memEmail;
    $_SESSION["memName"] = $forgetPswMemRow->memName;
    $_SESSION["memEmail"] = $forgetPswMemRow->memEmail;

    echo  $_SESSION["memName"] = $forgetPswMemRow->memName.'|';
    echo  $_SESSION["memEmail"] = $forgetPswMemRow->memEmail.'|';


    $mail= new PHPMailer();                             //建立新物件
    $mail->SMTPDebug = 2;                        
    $mail->IsSMTP();                                    //設定使用SMTP方式寄信
    $mail->SMTPAuth = true;                             //設定SMTP需要驗證
    $mail->SMTPSecure = "ssl";                          // Gmail的SMTP主機需要使用SSL連線
    $mail->Host = "smtp.gmail.com";                     //Gamil的SMTP主機
    $mail->Port = 465;                                  //Gamil的SMTP主機的埠號(Gmail為465)。
    $mail->CharSet ='UTF-8';
    $mail->Username = "davinciroot@gmail.com";          //Gamil帳號
    $mail->Password = "root1000";                       //Gmail密碼
    $mail->From = "davinciroot@gmail.com";              //寄件者信箱
    $mail->FromName = "達文西機器人公司";                           //寄件者姓名
    $mail->Subject ="達文西機器人公司寄送您的密碼來囉";    //郵件標題
    $mail->Body = $memName." , 您好唷<br>您的密碼是 : ".$memPsw."<br>快回來跟我們玩吧~~~~"; //郵件內容
    $mail->IsHTML(true);                                //郵件內容為html
    $mail->AddAddress($memEmail);                       //收件者郵件及名稱

    

    if(!$mail->Send()){  //如果沒寄出去
        echo "Error: " . $mail->ErrorInfo;
    }else{       //成功寄出去
        echo "寄出去了好開心啊";
    }
  }//else(找到了)的尾巴
  
}catch(PDOException $e){
  echo "error";
}
?>