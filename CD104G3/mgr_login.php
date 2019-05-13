<?php
ob_start();
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/mgr.css">
    <link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>管理頁面</title>
</head>
<body>
    <div class="manage">

        <div class="manage-bar">
            
            <ul>
                <li class="manage-bar__header"><img src="img/logo.png" alt="logo image"></li>
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
                    <h1>後台管理員管理</h1>
                </div>
                <!-- require_once('login_public.php') -->
				<div class="mgrname">
					<i class="fas fa-robot"></i>
                    <?php
                    // phpinfo();
                    $errMsg = "";
                    $msg = "";
                    echo "<script>console.log('3');</script>";
                    // var_dump($_REQUEST);
                    if(isset($_POST["mgrId"])){
                        $mgrId = $_POST["mgrId"];
                        $mgrPsw = $_POST["mgrPsw"];
                            try {
                                require_once("connectcd104g3.php");	
                                $sql = "select * from bgmanager where mgrId=:mgrId and mgrPsw=:mgrPsw"; 
                                $manager = $pdo->prepare( $sql);
                                $manager->bindValue(":mgrId", $mgrId);
                                $manager->bindValue(":mgrPsw", $mgrPsw);
                                $manager->execute();


                                // echo "1111";
                                // var_dump(isset($_SESSION["mgrId"]));
                                // echo "2222";
                                // var_dump(!isset($_SESSION["mgrId"]));


                                if(!isset($_SESSION["mgrId"])){
                                    if( $manager->rowCount() == 0){
                                        // echo "<script>alert('帳密錯誤');</script>";
                                        //$msg = "帳密錯誤";
                                        header("Location:mgr_login.html#error"); 
                                    }else{
                                        $mgrRow = $manager->fetch();
                                        $_SESSION["mgrId"] = $mgrRow["mgrId"];
                                        $_SESSION["mgrName"] = $mgrRow["mgrName"];
                                        echo $mgrRow["mgrName"],"&nbsp|"; 
                                        //header("Location:rbtOrder.php");

                                    }
                                }else{
                                    echo $_SESSION["mgrName"],"&nbsp|";
                                }
                            } catch (PDOException $e) {
                                $errMsg ="錯誤原因 : " . $e->getMessage(). "<br>".	"錯誤行號 : ". $e->getLine(). "<br>";
                                echo $msg;
                            } 
                    }else{
                        echo $_SESSION["mgrName"],"&nbsp|";
                    }           
					
                    
                    ?>
                    <span id="logout"><a href="logout.php">登出</a></span>
				</div>
                <div class="manage-dashboard__filter">

                    <div class="filter__switch">
                        <div class="filter__switch-post odBtn1">
                            <span id="mgrbtnAdd">新增</span>
                        </div>
                    </div>                                    
                </div>
                <div class="manage-dashboard__cat" id="">
                    <ul>
                        <li>管理員編號</li>
                        <li>管理員姓名</li>
                        <li>管理員帳號</li>
                        <li>管理員密碼</li>
                    </ul>
                </div>
                <div class="manage-dashboard__info">
				<?php
				try {
					require_once("connectcd104g3.php");
					
					$sql = "select * from bgmanager";
					$pdoStatement = $pdo->query( $sql);	
					while($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)){
				?>  
                    <div class="manage-dashboard__info-item">
                        <ul >
                            <form clss="deleteorupdateForm" method="post">
                                <li><span><input type="hidden" class="mgrno" name="mgrno" value="<?php echo $row["mgrNo"];?>"><?php echo $row["mgrNo"];?></span> </li>
                                <li><span><input type="hidden" class="mgrname" name="mgrname"><?php echo $row["mgrName"];?></span></li>
                                <li><span><input type="hidden" class="mgrid" name="mgrid"><?php echo $row["mgrId"];?></span></li>
                                <li><span><input type="hidden" class="mgrpsw" name="mgrpsw"><span><?php echo $row["mgrPsw"];?></span></span></li>
                              
                                <li>
                                    <div class="update">
                                        <input class="mgrupdate" type="button" name="update" value="修改">
                                    </div>
                                    <div class="delete">
                                        <input class="mgrdelete" type="button"  name="delete" value="刪除">
                                    </div>
                                </li>
                            </form>
                        </ul>
                    </div>
                <?php		
                    }
                } catch (PDOException $e) {
                    $errMsg = "錯誤原因：".$e->getMessage()."<br>"."錯誤行號：".$e->getLine()."<br>";
                    echo "系統有異常狀況,請通知維護人員<br>";
                }  
                ?>
                </div>
                <!-- end of manage-dashboard__info -->
                
                
            </div>

            
        </section>
                
        
        <!-- 燈箱 -->
        <section class="manage-page-content__poster-inner" id="newPrdctWin">
            <div class="poster-inner__madal">
                <div class="poster-inner__madal-close">
                    <div class="poster-inner__madal-close-icon" id="poster-inner__madal-close-icon">+</div>
                </div>

                <div class="poster-inner__madal-content">
                        <div class="madal-content-box">
                            <h3 class="margin-bottom-small">新增後台管理員</h3>
                        </div>

						<form id="mgr-lightboxform" action="addmgr.php" method="post">
							<p>姓名
								<input type="text" name="mgrname" size="15">
							</p> 
							<p>帳號
								<input type="text" name="mgrid" size="12">
							</p> 
							<p>密碼
								<input type="password" name="mgrpsw" size="12">
							</p>
						</form>
                </div>

                <div class="poster-inner__madal-btn">
                    <div class="poster-inner__madal-btn-group">
						<input id="ok" type="submit" name="ok" value="確定">
						<input id="cancel" type="reset" value="清除">
                        <!-- <button id="ok">確定</button>
                        <button id="cancel">取消</button> -->
                    </div>
                </div>
            </div>
        </section> <!--燈箱 end -->

  







        </div> <!-- manage End -->


        <script>

//===================================所有燈箱的關閉======================================
    var close = document.querySelectorAll('.poster-inner__madal-close-icon');
            var modal = document.querySelectorAll('.manage-page-content__poster-inner');

            function closeModal() {
                for(var i=0; i<close.length; i++){
                    
                    close[i].addEventListener('click', function(){
                        if(newPrdctWin.style.display == 'block'){
                            newPrdctWin.style.display = 'none';
                         }
                    });
                }
            }    
//=====================================================================================
                

            

            
//========================燈箱==============================     

		var mgrbtnAdd = document.getElementById('mgrbtnAdd');
        var newPrdctWin = document.getElementById('newPrdctWin');
        mgrbtnAdd.addEventListener('click',function(){
            newPrdctWin.style.display = 'block';
        }); 

//================================================================







// ======新增 後台管理員資料=================================================
okBtn=document.getElementById("ok");
	okBtn.addEventListener('click',subInp);
    function subInp(){
        document.getElementById("mgr-lightboxform").submit();
        }

//======================================================================


//======清除 燈箱表單內容==============================================
    canCel=document.getElementById("cancel");
	canCel.addEventListener('click',formReset); 
    function formReset(){
        document.getElementById("mgr-lightboxform").reset();
    }

//======================================================================


//======刪除 後台管理員資料內容==============================================
deleteBtn=document.querySelectorAll(".mgrdelete");
for(let i=0; i<deleteBtn.length; i++){
    deleteBtn[i].addEventListener('click',formDelete); 

    function formDelete(e){
        e.target.parentNode.parentNode.parentNode.action = "deletemgr.php";
        e.target.parentNode.parentNode.parentNode.submit();
    }
}

//======================================================================

    
 //===修改 後台管理員資料=========================================================
    updateBtn=document.querySelectorAll(".mgrupdate");
    for(let i=0; i<updateBtn.length; i++){
        updateBtn[i].addEventListener('click',function(e){
            console.log(e);
            
            if(e.target.value=='修改'){
                upDate(e);
            }else if(e.target.value=='確認'){
                //upDateSubmit(e);
                
                updateBtn=document.querySelectorAll(".mgrupdate");
                for(let i=0; i<updateBtn.length; i++){
                    updateBtn[i].addEventListener('click',formDelete); 

                    function formDelete(e){
                        e.target.parentNode.parentNode.parentNode.action = "updatemgr.php";
                        e.target.parentNode.parentNode.parentNode.submit();
                    }
                }
            }
        });
    }



    function upDate(e){
            // updateBtn.setAttribute('value','確認');
            
            e.target.value='確認';
            e.target.parentNode.parentNode.parentNode.querySelector('.mgrpsw').setAttribute('type', 'text');
            e.target.parentNode.parentNode.parentNode.querySelector('.mgrpsw').setAttribute('placeholder', e.target.parentNode.parentNode.parentNode.querySelector('.mgrpsw').nextElementSibling.innerText);
            e.target.parentNode.parentNode.parentNode.querySelector('.mgrpsw').nextElementSibling.innerText = '';
     }

     function upDateSubmit(e){
            e.target.value='修改';
            e.target.parentNode.parentNode.parentNode.querySelector('.mgrpsw').setAttribute('type', 'hidden');
            e.target.parentNode.parentNode.parentNode.querySelector('.mgrpsw').setAttribute('placeholder', '');
            e.target.parentNode.parentNode.parentNode.querySelector('.mgrpsw').nextElementSibling.innerText = e.target.parentNode.parentNode.parentNode.querySelector('.mgrpsw').value;
     }

//======================================================================


        function doFirst() {
            closeModal();
        }
            
        window.onload = doFirst;
        
        </script>


</body>
</html>







