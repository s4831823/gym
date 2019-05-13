<?php
$errMsg ="";
$msg = "";
try{

        $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
        $user = "cd104g3";
        $password ="cd104g3";
        $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $pdo = new PDO($dsn,$user,$password,$options);
        $sql="select * from rbtorder ";
        $member = $pdo->query($sql);
    
    
    }catch(PDOException $e){
        $errMsg ="錯誤原因:" . $e->getMessage()."<br>"."錯誤行號:". $e->getLine()."<br>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/cusorder.css">
    <link rel="stylesheet" href="css/login_public.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">  
    <title>管理頁面</title>
</head>
<body>
    <div class="manage">
        <div class="manage-bar">        
           <ul>
               <li class="manage-bar__header"><img src="img-gym/img-header/logo.png" alt="logo image"></li>
               <li><a href="mgr_login.php">後台管理員管理</a></li>
                <li><a href="aboutmanage.php">服務據點管理</a></li>
                <li><a href="manageForum.php">討論區管理</a></li>
                <li><a href="manageProd.php">商城商品管理</a></li>
                <li><a href="rbtOrder.php">客製化訂單管理</a></li>
                <li><a href="manage-order.php">商城訂單管理</a></li>
                <li><a href="memManage.php">會員管理</a></li>
              </ul>
        </div>
        <section class="manage-page-content">
            <div class="manage-page-content__manage-dashboard">
                <div class="manage-dashboard__title">
                    <h1>客製化訂單管理</h1>
                </div>
                <div class="checkbtn">
                    <p id="checkbtn" >更改狀態</p>
                </div>
               <?php  require_once('login_public.php') ?>


                <div class="manage-dashboard__cat" id="">
                    <ul>
                    <li>訂單編號</li>
                    <li>會員帳號</li>
                    <li>寄送地址</li>
                    <li>訂單日期</li>
                    <li>訂單狀態</li>
                    <li>修改訂單狀態</li>
                       
                    </ul>
                </div>
                <div class="checkbox">
                    <div class="close" >
                        <span id="close"></span>
                    </div> 
                    <p>確認無誤後出貨狀態修改</p>
                    <div class="submit ">
                        <div id="submit" class="popupBtn" onclick="formsubmit()">送出</div>
                    </div>
                 </div>
                
            <div class="manage-dashboard__info">
                <form action="updateorder.php" method="POST"id="form">
                <?php  
if( $errMsg !=""){
  echo "<div class='manage-dashboard__info-item'><ul><li>$errMsg</li></ul></div>";
}else{
    while($prodRow = $member->fetchObject()){
        
?>
                    <div class="manage-dashboard__info-item">
                    <ul>
                        <li><span>
                        <input type="hidden" name="rbtNo[]"  value="<?php echo $prodRow->rbtNo;?>">
                            <?php echo $prodRow->rbtNo;?></span>
                        </li>
                        <li><span><?php echo $prodRow->memNo;?></span></li>
                        <li class="adderss"><span><?php echo $prodRow->rbtAddr;?></span></li>
                        <li><span><?php echo $prodRow->rbtOdTime;?></span></li>
                       
                            <li><span><?php  $prodRow->rbtOdState;
                             if ($prodRow->rbtOdState == 1) {
                                 echo "已出貨";
                             }else{
                                echo "處理中";
                             }
                            ?>   </span>              
                        </li>
                        <li><span>
                            <select name="updateorder[]">
                                <option value="0" <?php if($prodRow->rbtOdState==0){echo 'selected';}?>>處理中</option>
                                <option value="1" <?php if($prodRow->rbtOdState==1){echo 'selected';}?>>已出貨</option>
                            </select></span>  
                    </li>
                    </ul> 
                </div>
                    <?php
                    }
                }   
                ?>  
                   
              
                </div>
                <!-- end of manage-dashboard__info -->
                
                
            </div>

            
        </section>

        <script src="js/rbtorder.js"></script> 
</body>
</html>