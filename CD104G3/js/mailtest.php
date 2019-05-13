<?php


// 先關掉防毒軟體!!!!!! QAQ 快!!!!!!!!
require_once("PHPMailer-5.2.9/PHPMailerAutoload.php"); //匯入PHPMailer類別


// $mail= new PHPMailer();                             //建立新物件
// $mail->SMTPDebug = 2;                        
// $mail->IsSMTP();                                    //設定使用SMTP方式寄信
// $mail->SMTPAuth = true;                        //設定SMTP需要驗證
// $mail->SMTPSecure = "ssl";                    // Gmail的SMTP主機需要使用SSL連線
// $mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
// $mail->Port = 465;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
// $mail->CharSet ='UTF-8';
// $mail->Username = "davinciroot@gmail.com";       //Gamil帳號
// $mail->Password = "root1000";                 //Gmail密碼
// $mail->From = "davinciroot@gmail.com";        //寄件者信箱
// $mail->FromName = "1000";                  //寄件者姓名
// $mail->Subject ="新密碼"; //郵件標題
// $mail->Body = "test 1000test"; //郵件內容
// $mail->IsHTML(true);                             //郵件內容為html
// $mail->AddAddress("tracy85711@gmail.com");            //收件者郵件及名稱
// if(!$mail->Send()){
//     echo "Error: " . $mail->ErrorInfo;
// }else{
//     echo "<b>感謝您的留言，您的建議是我們前進的動力!</b>";
// }
$memName = '1000';
$memPsw = '123';
$memEmail = 'tracy85711@gmail.com';


$mail= new PHPMailer();                             //建立新物件
    $mail->SMTPDebug = 2;                        
    $mail->IsSMTP();                                    //設定使用SMTP方式寄信
    $mail->SMTPAuth = true;                        //設定SMTP需要驗證
    $mail->SMTPSecure = "ssl";                    // Gmail的SMTP主機需要使用SSL連線
    $mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
    $mail->Port = 465;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
    $mail->CharSet ='UTF-8';
    $mail->Username = "davinciroot@gmail.com";       //Gamil帳號
    $mail->Password = "root1000";                 //Gmail密碼
    $mail->From = "davinciroot@gmail.com";        //寄件者信箱
    $mail->FromName = "1000";                  //寄件者姓名
    $mail->Subject ="達文西機器人公司寄送您的密碼來囉"; //郵件標題
    $mail->Body = $memName.",您好唷<br>您的密碼是 : ".$memPsw."<br>快回來跟我們玩吧"; //郵件內容
    $mail->IsHTML(true);                             //郵件內容為html
    $mail->AddAddress($memEmail);            //收件者郵件及名稱
    if(!$mail->Send()){
        echo "Error: " . $mail->ErrorInfo;
    }else{
        echo "<b>感謝您的留言，您的建議是我們前進的動力!</b>";
    }
?>