<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,shrink-to-fit=no">
    <title>DAVINCI 訓練道館</title>
    <link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/gym.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/addstatus.js"></script>
</head>
<body> 

<?php
 require_once('header.php');
 ?>
 <?php
    // $memId = $_POST["login-memId"];
    // $memPsw = $_POST["login-memPsw"];
    $gamestatus = $_REQUEST["gamestatus"];
    // $gamestatus = $_SESSION["gamestatus"];
    $rbtNo = $_REQUEST["rbtNo"];
    // var_dump($_SESSION["gamestatus"]);
     
$errMsg ="";
$msg = "";
try{        
    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";
    $password ="cd104g3";
    $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn,$user,$password,$options);
        if(isset($_REQUEST["rbtNo"]) === true){
            $sql="select * from rbtorder where rbtNo = :rbtNo";
            $member = $pdo->prepare($sql);
            $member->bindValue(":rbtNo", $rbtNo);
            $member->execute();



        }else{
            $sql="update rbtorder set rbtVIT=:rbtVIT, rbtINT=:rbtINT,rbtAGI=:rbtAGI,rbtrbtAbility=:rbtrbtAbility where rbtNo = :rbtNo";
             $member = $pdo->prepare($sql);
             $member->bindValue(":rbtVIT", $_REQUEST["rbtVIT"]);
             $member->bindValue(":rbtINT", $_REQUEST["rbtINT"]);
             $member->bindValue(":rbtAGI", $_REQUEST["rbtAGI"]);
             $member->bindValue(":rbtrbtAbility", $_REQUEST["rbtAbility"]);
             $member->execute();
             $msg = "異動成功";
        }
    }catch(PDOException $e){
        $errMsg ="錯誤原因:" . $e->getMessage()."<br>"."錯誤行號:". $e->getLine()."<br>";
}

?>
<div class="robot_container">
<div class="free"></div>
<h2>提升機器人的能力</h2>
     <div class="robotimg">

         <div class="customrobot">
<?php           
if( $msg != ""){
     echo "123";
    }else{
        if(isset($_REQUEST["rbtNo"]) === true){
                if($member->rowCount() == 0){
                    echo "查無此資料";
                }
                else{
                        $prodRow = $member->fetchObject();
               
       $rbttotal = $prodRow->rbtVIT+ $prodRow->rbtINT+ $prodRow->rbtAGI;
   
  ?> 
             <h3>
             <?php echo $prodRow->rbtName;?>
            </h3>
            <img src="<?php echo $prodRow->rbtImg;?>" class="customslides" >
         </div>
     </div>
      
 
        <div class="robotstatus"> 
                    <input type="hidden" value="<?php echo $gamestatus?>"id="gamescore">
                <p class="gameaddstatus">可加點數:<span class="score" id="addgamescore"></span></p>
           
            
                <div class="vit">

            <p>
                <span class="status">體力</span>
                <input type="hidden" name="dbScore" value=" <?php echo $prodRow->rbtVIT;?>"class="vitstatus">
                <span class="max">MAX</span>
                <span class="before" id="vit"></span>
                <span class="after" id="addvit"></span> 
                <span class="statusbar"></span>
                <span class="addstatus">+</span>
                <span class="lowerstatus">-</span>
            </p>
        </div>
        <div class="int">
            <p>
                <span class="status">智力</span>
                <input type="hidden" name="dbScore" value="<?php echo $prodRow->rbtINT;?>"class="intstatus">
                <span class="max">MAX</span>
                <span class="before" id="int"></span>
                <span class="after"id="addint"></span>
                <span class="statusbar"></span>
                <span class="addstatus">+</span>
                <span class="lowerstatus">-</span>
            </p>
        </div>
        <div class="agi">
            <p>
                <span class="status">敏捷</span>
                <input type="hidden" name="dbScore" value="<?php echo $prodRow->rbtAGI;?>"class="agistatus">
                <span class="max">MAX</span>
                <span class="before" id="agi"></span>
                <span class="after" id="addagi"></span>
                <span class="statusbar"></span>
                <span class="addstatus">+</span>
                <span class="lowerstatus">-</span>
            </p>
        </div>
                <form method="post" action="checkrobotstatus.php" id="sendstatus">
                    <input type="hidden" value="<?php echo $rbtNo?> " name="rbtNo">
                     <input type="hidden" id="addvitstatus" value="<?php echo $prodRow->rbtVIT;?>"name="addvitstatus">
                    <input type="hidden" id="addintstatus" value="<?php echo $prodRow->rbtINT;?>"name="addintstatus">
                    <input type="hidden" id="addagistatus" value="<?php echo $prodRow->rbtAGI;?>" name="addagistatus">
                    <input type="hidden" value="<?php echo $rbttotal ?>" name="addrbtAbility" id="addrbtAbility">
            </form>
                
        <?php
     } 
    }else {
        echo $msg;}
}
    ?>
   
        <div class="checkbtn share-btn-box">
            <button class="check share-btn" id="checkbtn">送出<span class="light"></span></button>
            <button class="check share-btn"><a href="gym.php">重玩<span class="light"></span></a> </button>
        </div>
     </div>
    <div class="checkstatus share-btn-box" id="checkstatus">
        <p>能力已提升確認無誤後將提升能力</p>
        <button id="submitstatus"class="btn share-btn">確認<span class="light"></span><span class="light"></span></button>
        <button class="btn share-btn" id="cancelstatus">取消<span class="light"></span></button>
    </div>
 </div> 
 
  <footer class="footer">
        <h4>© 2018 Davinci - Robot Company</h4>
    </footer>
</body>
</html>