<?php
session_start();

//檢查你的session裡有沒有memId 
//有的話把你其他session都叫出來用

// if(isset($_SESSION['memId']) == true){
    
    

//     echo $_SESSION['memNo'].'|';
//     echo $_SESSION['memId'].'|';
//     echo $_SESSION['memName'].'|';
//     echo $_SESSION['memEmail'].'|';
//     echo $_SESSION['memImg'].'|';
//     echo $_SESSION['memState'];
// }else{
//     echo 'nosession';
// }

if(isset($_SESSION['memId']) == true){
    require_once("connect.php");
    $sql = "select * from member where memId=:memId";
    $member = $pdo->prepare($sql);
    $member->bindValue(":memId",$_SESSION['memId']);
    $member->execute();

    $memRow = $member->fetchObject();
    
    //寫入session
    $_SESSION["memNo"] = $memRow->memNo;
    $_SESSION["memId"] = $memRow->memId;
    $_SESSION["memName"] = $memRow->memName;
    $_SESSION["memEmail"] = $memRow->memEmail;
    $_SESSION["memImg"] = $memRow->memImg;
    $_SESSION["memState"] = $memRow->memState;

    echo $_SESSION['memNo'].'|';
    echo $_SESSION['memId'].'|';
    echo $_SESSION['memName'].'|';
    echo $_SESSION['memEmail'].'|';
    echo $_SESSION['memImg'].'|';
    echo $_SESSION['memState'];


}else{
    echo 'nosession';
}

?>