<?php
// phpinfo();exit();
// session_start(); 
// session_id();
// $robotname = $_POST['sendNam'];
$errMsg = "";

try {
    // if(isset($_SESSION["memId"]) === ''){
        
    // }
	$dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";//cd104g3
	$password = "cd104g3";//cd104g3
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn, $user, $password, $options);
    $sql = "select * from robothair";
    $sql1 = "select * from robotskill";
    $pdohair = $pdo->query( $sql);
    $pdoskill = $pdo->query( $sql1);
    $hairs = $pdohair->fetchAll();
    $skills = $pdoskill->fetchAll();
} catch (PDOException $e) {
	// echo "錯誤原因 : ", $e->getMessage(), "<br>";
	// echo "錯誤行號 : ", $e->getLine(), "<br>";
	// echo "系統有異常狀況,請通知維護人員<br>";
	$errMsg ="錯誤原因 : " . $e->getMesage(). "<br>".	"錯誤行號 : ". $e->getLine(). "<br>";
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DAVINCI 客製化</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:300,400,500,100" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pickr-widget/dist/pickr.min.css"/> -->
<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">

<link rel="stylesheet" href="node_modules/pickr-widget/dist/pickr.min.css"/>
<link rel="stylesheet" type="text/css" href="css/customized.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="js/jcanvas.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="node_modules/pickr-widget/dist/pickr.min.js"></script>
    <script src="node_modules/gsap/src/minified/TweenMax.min.js"></script>
    <script src="node_modules/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
    <script src="node_modules/gsap/src/minified/plugins/TextPlugin.min.js"></script>
    <script src="js/SplitText.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/regl.min.js"></script>
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="node_modules/scrollmagic/scrollmagic/minified/ScrollMagic.min.js"></script>
    <script src="node_modules/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js"></script>
    <script src="node_modules/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/pickr-widget/dist/pickr.min.js"></script> -->
    <!-- <script src="js/jscolor.js"></script> -->

<?php 
    include 'header.php';
    ?>

<div class="CustomMade" >
<!-- 客製化第一步 命名 -->
        <div class="center " id="center">	
            <!-- <img class="curtain-left" src="images/CustomMade/curtain-left.png" alt="">
            <img class="curtain-right" src="images/CustomMade/curtain-right1.png" alt=""> -->
            <div class="robot">
                <img class="light" src="images/CustomMade/75.png" alt="">

                <canvas id="myCanvas" width="500" height="600"></canvas>
                <canvas id="myCanvas1" width="500" height="600"></canvas>
                <!-- <img src="images/CustomMade/robot.png" class="artist" >	  -->
            </div>
            <!-- value="<?php
            //  $robotname 
             ?>" -->
            <div class="nametextbox">
                <input  type="text"  id="robotname" name="robname" maxlength="8" value="<?php if(isset($_POST['sendName'])){echo $_POST['sendName'];}
                     ?>">
                <label class="textbox"></label>

                <div class="share-btn-box1 nextbtn" id="nextbtn">
                <button class="share-btn1">
                    下一步
                <div class="light1"></div>
                </button>
                </div>
            </div>
        </div><!-- 命名結束 -->
    
<!-- 流程列 -->
        <div class="Process">
			<ul>
                <!-- id="first"id='first' -->
				<li  class="first se" >1</li>   
				<li id="second" class="second se">2</li>
				<li id="third" class="third" >3</li>
				<li id="fourth" class="fourth">4</li>
			</ul>
		</div><!-- 流程列結束 -->




    <div class="Custom-box" id="customhair">
            <ul class="Customprocess">
                <li id="customhair1">髮型</li>
                <li id="customcolor">膚色</li>
                <li id="customFeatures">功能</li>
            </ul>
<!-- 客製化第二步 髮型 -->        
        <div class="Customitem customhairbox">
            <div class="customclose" id="customclose">
                <img src="images/CustomMade/cancel-music.png" alt="">
            </div>
                    <h2 class="title">髮型</h2>
                    <!-- <span class="price">價格：$ 10000</span> -->
                    <div class="hairitem" data-mcs-theme="dark">
                        <div class="hair-item" id="hair-item">
                         <?php 
                          foreach( $hairs as $hair){
                        //    for($i=1; $i<9; $i++ ){
                                echo "<img class='hairimg' src='". $hair["hairImg"] ."'>";	
                            } 
                        ?>
                        </div>
                    </div>
                </div><!-- 髮型結束 -->

<!-- 客製化顏色 -->

    <div class="Customitem customcolorbox">
            <div class="customclose" id="customclose">
                <img src="images/CustomMade/cancel-music.png" alt="">
            </div>
                    <h2 class="title">膚色</h2>
                    <!-- <span class="price">價格：$ 10000</span> -->
                    <div class="complexion">


<div class='color-picker'></div>
                   
                    </div>
    </div><!-- 顏色結束 -->
        
    <!-- 功能開始 -->
    <div class="Customitem customFeaturesbox">
             <div class="customclose" id="customclose">
                <img src="images/CustomMade/cancel-music.png" alt="">
            </div>
                    <h2 class="title">功能</h2>
                    <!-- <span class="price">價格：</span> -->
                        <div class="Features" data-mcs-theme="dark">
                            <ul>
                            <?php 
                              foreach( $skills as  $skill){
                        //     $featuresitem=array("消防","碼農","看護","藝能");
                        //    $featuresitemcl=array("Fire","Code","nurse","artist"rbSkillNo);
                         
                        echo "<li class='".$skill['rbSkillNo']."' id='rbSkillNo".$skill['rbSkillNo']."' value='".$skill['rbSkillNo']."'>" ;
                        echo $skill['rbSkillName'];
                        echo "</li>";
                            }
                            ?>
                            </ul>
                            
                            <?php 
                              foreach( $skills as  $skill){
                                  echo '<ul id="Ability">';
                        //     $featuresitem=array("消防","碼農","看護","藝能");
                        //    $featuresitemcl=array("Fire","Code","nurse","artist");
                                echo "<li id='rbtVIT" . $skill['rbSkillNo'] . "' value='".$skill['rbtVIT']."'>". $skill['rbtVIT'] . " </li>" ;
                                echo "<li id='rbtNT" . $skill['rbSkillNo'] . "' value='".$skill['rbtNT']."'>". $skill['rbtNT'] . " </li>" ;
                                echo "<li id='rbtAGI" . $skill['rbSkillNo'] . "' value='".$skill['rbtAGI']."'>". $skill['rbtAGI'] . " </li>" ;

                                echo "</ul>";
                            }
                            ?>
                            
                            <div class="Featurescontent">
                                <div class="Abilityvalue">
                                    <div class="chartRadarDiv">
                                        <canvas id="chartRadar"></canvas>
                                    </div>
                                    </div>  
                                    <?php 
                              foreach( $skills as  $skill){
                      
                            ?>  
                                <div class="content" id="Feature<?php echo $skill['rbSkillNo']; ?>">
                                    <h3>功能介紹</h2>
                                    <?php 
                                      //     $featuresitem=array("消防","碼農","看護","藝能");
                        //    $featuresitemcl=array("Fire","Code","nurse","artist");

                                echo "<p>" . $skill['rbtSkillInfo'] . "</p>";
                            
                                    ?>
										<!-- <p>消防型機器人擁有特殊材質的防火衣，且備良好的力量、速度、耐力和柔韌性等特性，能適應在複雜、多變和危險的環境中進行滅火戰鬥的需要，以最短的時間、最快的速度去完成任務需要。</p> -->
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div><!-- 功能結束 -->


    </div><!-- Custom-box結束 -->
    <div class="custombtn">
    <div class="share-btn-box2 lastname" >
                <button class="share-btn2" id="first">
                    上一步
                <div class="light2" id="first"></div>
                </button>
                </div>
    <div class="share-btn-box2 nextfillout" id="nextfillout">

  <!-- 心情:<input type="text" id="myWord" /> -->

    <button class="share-btn2"  >
                    下一步
                <div class="light2"></div>
                </button>
           
                </div></div>
</div><!-- CustomMade結束 -->

<div class="customizedfillout">
    <div class="customform">
           
        <div class="formtitle"><span>請填寫訂單資料</span></div>
        <div><span>金額 :</span> NT$ 200,000 </div>
        <div><span>會員帳號 :</span><span id="memNo"></span></div>
        <div><span>寄送地址 :</span><input type="text" id='address' name='address'></div>
        <div class="formbtn">
            <div class="share-btn-box2">
                        <button class="share-btn2" id='cancelbtn'>
                        取消
                        <div class="light2"></div>
                        </button>
                        </div>
                        <div class="share-btn-box2" >
                        <button class="share-btn2" id='formbtnsubmit'>
                        確定
                        <div class="light2" ></div>
                        </button>
                        </div>
                    </div>
                
                    </div> 
            </div>
        </div>


<div class="jump">
    <div class="content">
        <span>訂購完成</span>
             <div class="share-btn-box2">
                <button class="share-btn2" onclick="location.href='gym.php';">
                訓練道館
                <div class="light2"></div>
                </button>
                </div>
                <div class="share-btn-box2" >
                <button class="share-btn2" onclick="location.href='memCenter.php';">
                會員中心
                <div class="light2"></div>
                </button>
                </div>
                <div class="share-btn-box2" >
                <button class="share-btn2" onclick="saveImage1()">
                下載圖片
                <div class="light2"></div>
                </button>
                </div>
    </div>
</div>


<footer class="footer">
     <h4>© 2018 Davinci - Robot Company</h4>
    </footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="js/customized.js"></script>
<form method="post" accept-charset="utf-8" name="form1">
             <input name="hidden_data" id='hidden_data' type="hidden"/>
            </form>
</body>
</html>