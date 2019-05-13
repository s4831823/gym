<?php
                if(isset($_SESSION["memNo"])){
                  $memInfo = array();
                  $memInfo["memNo"] = $_SESSION["memNo"];
                  $memInfo["memId"] = $_SESSION["memId"];
                  $memInfo["memName"] = $_SESSION["memName"];
                  $memInfo["memEmail"] = $_SESSION["memEmail"];
                  $memInfo["memImg"] = $_SESSION["memImg"];
                  $memInfo["memState"] = $_SESSION["memState"];
                  $jsonStr = json_encode($memInfo);
                 
                }
                
?>
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
    <link rel="stylesheet" href="css/gym.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
     body{
      background: url(img-gym/111.jpg) no-repeat ;
    background-size:100% 100%;
    }
    </style>
</head>
<body>
<?php
  require_once('header.php');
 ?>

        <div class="game_container">
        
                <!-- 遊戲主螢幕 start -->
                <div id="game_box">
                  <!-- 遊戲分數 -->
                        <div id="game_info">
                                   <span id="lifeBar"></span>
                                  <div class="gamesocre">得分:  <span id="gameCent">0</span> </div>         
                        </div>
                
                    <!-- 結束登入 -->
                    <div id="GameLogin" class="share-btn-box">
                       <span class="login share-btn" id="gameLogin">
                         <span class="light"></span>
                       提升能力</span>
          
                        <a class="custom share-btn" href="customized.php">立即客製<span class="light"></span></a>
                    </div>
                    
          <!--倒數時間 --> 
                  <div class="time_container">
                    <span>剩餘時間: </span><span id="divNum">20</span>
                  </div>
                  <!-- 機器人 -->
                  <div class="robot_box">
                    <div id="robotBox" class="robot">
                  </div>        
                </div>
                
                <!-- 遊戲控制 start -->
                <div id="gamestar">
                  <div id="gamestar_txt">
                      <h3>歡迎來到訓練道館</h3>
                    <p class="title">使用←跟→來接住物品,會依照物品分數轉換加成能力值!</p>
                   <div class="flex">
                        <p class="score"><img src="img-gym/battery.svg" ></p>
                        <p class="score"><img src="img-gym/capsule.svg" ></p>
                       <p class="score"><img src="img-gym/Wafer.svg" ></p>
                      <p class="score"><img src="img-gym/bomb.svg" ></p>          
                    </div>
                    <div class="flex">
                        <p class="score">+10</p>
                        <p class="score">+20</p>
                       <p class="score">+50</p>
                      <p class="score">Game Over</p>          
                    </div>
                        <div class="share-btn-box"><button onclick="document.getElementById('gamestar').style.display='none'" id="gameStart" class="btn share-btn">
                        開始
                        <div class="light"></div>
                      </button></div>

                  </div>
                 
                </div>
              </div>  
              <!-- 遊戲螢幕 end -->  
          </div>
          <form method="post" action="selectrbt.php" id="addstatus">
                  <input id="gamestatus" type="hidden" name="gamestatus">
                </form>
              <script type="text/javascript" src="js/gym.js"></script>  
                <script src="js/gamelogin.js"></script>
                <footer class="footer">
     <h4>© 2018 Davinci - Robot Company</h4>
    </footer>
</body>
</html>