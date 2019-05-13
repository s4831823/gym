<?php
$errMsg ="";
$msg = "";
try{
    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";
    $password ="cd104g3";
    $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn,$user,$password,$options);
    $sql="select * from companybase ";
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
    <link rel="stylesheet" href="css/aboutmanage.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/login_public.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>管理頁面</title>

</head>
<body>
    <div class="manage">
    
       <!-- 左邊欄位 -->
        <div class="manage-bar">
            <ul>
                <li class="manage-bar__header"><img src="img/img-header/logo.png" alt="logo image"></li>
                <li><a href="mgr_login.php">後台管理員管理</a></li>
                <li><a href="aboutmanage.php">服務據點管理</a></li>
                <li><a href="manageForum.php">討論區管理</a></li>
                <li><a href="manageProd.php">商城商品管理</a></li>
                <li><a href="rbtOrder.php">客製化訂單管理</a></li>
                <li><a href="manage-order.php">商城訂單管理</a></li>
                <li><a href="memManage.php">會員管理</a></li>
            </ul>
        </div>
            
            
         <!-- 右邊欄位 -->
            <div class="manage-page-content__manage-dashboard">
                <div class="manage-dashboard__title">
                    <h1>服務據點</h1>
                </div>

                <?php  require_once('login_public.php') ?>

                <div class="service_update" id="service_update">
                    新增
                </div>

                <div  id="box"  class="aboutUs_update">
                    <div class="purple">
                        <div class="close" id="close">
                            ＋
                        </div>
                    </div>
                    <div class="deepbule">
                        <form class="site_add" method="POST" action="add.php" id="form">
                                <label>據點名稱</label>
                                <input name="siteName" type="text">
                                <br>

                                <label>地址</label>
                                <input class="addrname" name="siteAddr" type="text">
                                <br>

                                <label>電話</label>
                                <input name="siteTel" type="text">
                                <br>

                                <label>經度</label>
                                <input name="lat" type="number" step="any">
                                <br>

                                <label>緯度</label>
                                <input name="lng" type="number" step="any">
                                <br>
                        </form>
                    </div>
                    <button class="popupBtn" onclick="formsubmit()">確認</button>

                   
                <!-- <div class="manage-dashboard__filter"> -->       
              </div>
            


                <div class="manage-dashboard__cat">
                    <ul>
                        <li>編號</li>
                        <li>據點名稱</li>
                        <li>地址</li>
                        <li>電話</li>
                        <li>經度</li>  
                        <li>緯度</li>
                        <li>修改</li>
                    </ul>
                </div>

                <?php 
                    if( $errMsg !=""){
                        echo "錯誤";
                    }else{
                        while($prodRow = $member->fetchObject()){       
                ?>

                <div class="manage-dashboard__info"> 
                    <form action="<?php echo "update.php?siteNo={$prodRow->siteNo}"; ?>"  method="post">
                        <div class="manage-dashboard__info-item">
                                <ul>
                                    <li><?php echo $prodRow->siteNo;?></li>
                                    <input type="text" name="siteNo" hidden value="<?php echo $prodRow->siteNo;?>">
                                    <li><input type="text" name="siteName" value="<?php echo $prodRow->siteName;?>"></li>
                                    <li><input type="text" name="siteAddr" value="<?php echo $prodRow->siteAddr;?>"></li>
                                    <li><input type="text" name="siteTel" value="<?php echo $prodRow->siteTel;?>"></li>
                                    <li><input type="number" step="any" name="lat" value="<?php echo $prodRow->lat;?>"></li>
                                    <li><input type="number" step="any" name="lng"  value="<?php echo $prodRow->lng;?>"></li>
                                    
                                    <input  class="send odBtn" type="submit" value="修改"  onclick="alert('修改成功囉')">
                                    <a class="aboutUs_delete odBtn" href="<?php echo "delete.php?siteNo={$prodRow->siteNo}"; ?>">刪除</a>     
                                </ul>   
                        </div> 
                    </form>
                </div>

                    


            <?php
                  }
                  } 
            ?>  
       </div>

            </div>


   </div>

   <script>
       function open(){
        service_update = document.getElementById('service_update');

           openbox = document.getElementById("box");
           service_update.addEventListener('click',function(){
               openbox.style.display = "block";
           });

       }

       function close(){
           var x = document.getElementById('close');
           x.addEventListener('click',function(){
             openbox.style.display = "none";
           });
       }

       function formsubmit(){
           document.getElementById('form').submit();
           alert("更新成功");
       }
       function doFirst(){
           close();
           open();
       }
       window.onload = doFirst;
   </script>

</body>
</html>