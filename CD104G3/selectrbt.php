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
    <script src="js/selectrbt.js"></script>    
</head>
<body> 
<?php
 require_once('header.php');
 ?>
 <?php
$errMsg ="";
    // $memId = $_POST["login-memId"];
    // $memPsw = $_POST["login-memPsw"];
    $gamestatus = $_REQUEST["gamestatus"];
    // $_SESSION["gamestatus"] = $_REQUEST["gamestatus"];
    // var_dump($_SESSION["gamestatus"]);
    try{
        // if( isset($_REQUEST["gamestatus"]) === false){
            $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
            $user = "cd104g3";
            $password ="cd104g3";
            $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $pdo = new PDO($dsn,$user,$password,$options);
            $sql="select * from rbtorder where memNo = :memNo";
            $member = $pdo->prepare($sql);
            $member -> bindValue(':memNo',$_SESSION['memNo']);
            $member->execute();
    }catch(PDOException $e){
        $errMsg ="錯誤原因:" . $e->getMessage()."<br>"."錯誤行號:". $e->getLine()."<br>";
}
if( $member->rowCount() == 0){
    echo"<div class='buyrbt'><div class='share-btn-box'><p>你還沒有機器人</p><button class='share-btn'><a href='customized.php'>製作機器人<span class='light'></span></a></button><img src='img-gym/norobot-d4-01-01.png' alt='' class='rbt'></div>
  
    </div>";
}elseif( $errMsg !=""){
  echo $errMsg;
}else{
?>
<div class="robot_container">
    <div class="free"></div>
    <h2>選擇你的機器人</h2>
     <div class="robotimg">
     <form action="addstatus.php"  id="sendstatus"method="post">
         <input type="hidden" name="rbtNo" id="robotNo">
         <input type="hidden" name="gamestatus"value="<?php echo $gamestatus ;?>">
    </form>    
         <div class="customrobot">
         <?php	
	$kk=0;
    $robots = $member->fetchAll();
	foreach($robots as $kk => $prodRow){    
?>              
             <div class="button">
               <div class="leftbtn" id="leftbtn" onclick="addbtn1(-1)"></div>
                <div class="rightbtn" id="rightbtn" onclick="addbtn1(1)"></div>
            </div>   
             <h3 class="name">
             <?php echo $prodRow["rbtName"];?>
            </h3><span style="display:none"><?php echo $prodRow["rbtNo"];?></span>          
            <img src="<?php echo $prodRow["rbtImg"];?>" class="customslides" >         
            <?php
        $smallPic[$kk]=$prodRow["rbtImg"];
    }
    ?>           
         </div> 
        
         <div class="robotslides">
             
                 
             
             <?php 
             foreach($robots as $kk => $prodRow){
                // echo '<div class="customimg" onclick="showbtn1('.$kk.')"><img src=".$smallPic[$kk]." alt=""></div>'; 
                echo "<div class='rbtbox'><div class='customimg' onclick='showbtn1($kk)'><img src='$smallPic[$kk]' alt=''></div></div>"; 
             }
             //<div class="customimg" onclick="showbtn1(2)"><img src="img/custom-2.png" alt=""></div>
            // <div class="customimg" onclick="showbtn1(3)"><img src="img/custom-3.png" alt=""></div>
            ?>
         </div>       
     </div>
        <div class="robotstatus"> 
        <?php
            foreach($robots as $kk => $prodRow){
            ?>    
                <div class="vit">
            <p>
                <span class="status">體力</span>           
                     <input type="hidden" name="dbScore" value="<?php echo $prodRow["rbtVIT"];?>"class="vitstatus">
                    <span class="before"></span>
               <span class="statusbar"></span>
            </p>
        </div>
        <div class="int ">
            <p>
                <span class="status">智力</span>
                <input type="hidden" name="dbScore" value="<?php echo $prodRow["rbtINT"];?>"class="intstatus">
                <span class="before"></span>
                <span class="statusbar"></span>
            </p>
        </div>
        <div class="agi ">
            <p>
                <span class="status">敏捷</span>
                <input type="hidden" name="dbScore" value="<?php echo $prodRow["rbtAGI"]?>"class="agistatus">
                <span class="before"></span>
                <span class="statusbar"></span>            
            </p>
        </div>
        <?php
            }	
        ?>      
        <div class="checkbtn share-btn-box">
            <button class="check share-btn" id="checkbtn" type="button">送出<span class="light"></span></button>
            <button class="check share-btn"><a href="gym.php">重玩</a><span class="light"></span> </button>
        </div>
     </div>
 </div> 
 <?php
 }          
                ?>  
<script src="js/silder.js"></script>
  <footer class="footer">
        <h4>© 2018 Davinci - Robot Company</h4>
    </footer>
</body>
</html>