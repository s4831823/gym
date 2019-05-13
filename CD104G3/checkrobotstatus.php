
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/gym.css">
    <script src="js/checkrobotstatus.js"></script>
    <style>
        body{
            background:url(../img-gym/456.jpg) no-repeat;
            background-size:cover;
        }
         
    </style>
</head>
<body>
<?php
 require_once('header.php');
 ?>
 <?php
   $errMsg ="";
   $msg = "";
    $rbtno = $_REQUEST["rbtNo"];

   try{
           $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
           $user = "cd104g3";
    $password ="cd104g3";
           $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
           $pdo = new PDO($dsn,$user,$password,$options);
            $sql="update rbtorder set rbtVIT=:rbtVIT, rbtINT=:rbtINT,rbtAGI=:rbtAGI,rbtAbility=:rbtAbility
            where rbtNo = :rbtNo";
            $member = $pdo->prepare($sql);
            $member->bindValue(":rbtNo", $rbtno);
            $member->bindValue(":rbtVIT", $_REQUEST["addvitstatus"]);
            $member->bindValue(":rbtINT", $_REQUEST["addintstatus"]);
            $member->bindValue(":rbtAGI", $_REQUEST["addagistatus"]);
            $member->bindValue(":rbtAbility", $_REQUEST["addrbtAbility"]);
            $member->execute();
            $msg = "異動成功";

            $sql="select * from rbtorder where rbtNo = $rbtno";
            $member = $pdo->query($sql);
        
       }catch(PDOException $e){
           $errMsg ="錯誤原因:" . $e->getMessage()."<br>"."錯誤行號:". $e->getLine()."<br>";
   }
   
?>
<?php	
if( $errMsg !=""){
  echo "<div class='rbtorderlist'><ul><li>$errMsg</li></ul></div>";
}else{
	while($prodRow = $member->fetchObject()){
        
?>
<div class="checkrobotstatus">       
    <div id="customrobot">
            <h2><?php echo $prodRow->rbtName;?></h2>
        <div class="move">
            <img src="<?php echo $prodRow->rbtImg;?>" alt="#"class="rbt">
            <img src="img-gym/stage3.png" alt="" class="stage">
        </div>
    </div>
    <div id="robotstatus">
 
        <h2>機器人能力值</h2>
        <div id="vit">
            <p>
                <span >體力</span>
                <span id="updatevit" class="bar"></span>
                <span class="status"></span>
                 <input type="hidden" value="<?php echo $prodRow->rbtVIT;?>">
            </p>
        </div>
        <div id="int">
         <p>
             <span>智力</span>
             <span id="updateint" class="bar"></span>
              <span class="status"></span> 
              <input type="hidden" value="<?php echo $prodRow->rbtINT;?>">
              
         </p>     
        </div>
        <div id="agi">
            <p>
                <span>敏捷</span>
                <span id="updateagi" class="bar"></span>
                <span class="status"></span>
                <input type="hidden" value="<?php echo $prodRow->rbtAGI;?>">
                
            </p>
        </div>
        <div class="link share-btn-box">
            <p class="share-btn"><a href="gym.php">繼續訓練<span class="light"></span></a></p> 
            <p class="share-btn"><a href="forum.php">道館攻略<span class="light"></span> </a></p> 
        </div>
    </div>
    <?php
                    }
                }	
                ?>  

</div>
  <footer class="footer">
      <h4>© 2018 Davinci - Robot Company</h4>
    </footer>
</body>
</html>