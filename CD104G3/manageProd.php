<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="css/manageProd.css">
    <link rel="stylesheet" href="css/login_public.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">  
    <script src="js/jquery-3.3.1.min.js"></script>
   
    <title>管理頁面</title>
</head>
<body>
    <div class="manage">

        <div class="manage-bar">
            
            <ul>
                <li class="manage-bar__header"><img src="img/logo.png" alt="logo image"></li>
                <!-- <li><a href="#">客製化管理</a></li> -->
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
                    <h1>商城商品管理</h1>
                </div>

               <?php  require_once('login_public.php') ?>

                <div class="manage-dashboard__filter">

                    <div class="filter__switch">
                        <div class="filter__switch-post">
                            <span id="newPrdct">新增商品</span>
                    </div>   
                    </div>

                </div>
                <div class="manage-dashboard__cat" id="">
                    <ul>
                        <li>商品編號</li>
                        <li>商品名稱</li>
                        <li>商品類別</li>
                        <li>商品價格</li>
                        <li>圖片</li>
                        <li>建立時間</li>
                        <li>修改內容</li>
                       
                    </ul>
                </div>
                <div class="manage-dashboard__info">
                <?php
                try {
                    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
                    $user = "cd104g3";
                    $password = "cd104g3";

                    $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL);
                    $pdo = new PDO($dsn, $user, $password, $options); 

                    $sql = "select * from product";
                    $stmt = $pdo->query( $sql);
                    $allProd = $stmt -> fetchAll();
                    foreach( $allProd as $row){
                ?>
                    <div class="manage-dashboard__info-item">
                        <ul >
                            <li><span><?php echo $row["prodNo"];?></span> </li>
                            <li><span><?php echo $row["prodName"];?></span></li>
                            <li><span><?php echo $row["prodCat"];?></span></li>
                            <li><div><?php echo number_format($row["prodPrice"]);?></div> </li>
                            <li><div><?php echo $row["prodImg"];?></div></li>
                            <li><div><?php echo $row["prodBirth"];?></div></li>
                            <li><div class="edtPrdct" id="<?php echo $row["prodNo"];?>">修改</div></li>
                        </ul>
                    </div>
                <?php		
                    }
                } catch (PDOException $e) {
                    echo "錯誤原因 : ", $e->getMessage(), "<br>";
                    echo "錯誤行號 : ", $e->getLine(), "<br>";
                    echo "系統有異常狀況,請通知維護人員<br>";
                }  
                ?>
                </div>
                <!-- end of manage-dashboard__info -->
                
                
            </div>

            
        </section>

        
        <!-- ==========================新增商品燈箱=========================== -->
        <section class="manage-page-content__poster-inner" id="newPrdctWin">
            <div class="poster-inner__madal">
                <div class="poster-inner__madal-close">
                    <div class="poster-inner__madal-close-icon" id="poster-inner__madal-close-icon">+</div>
                </div>

                <div class="poster-inner__madal-content">
                        <div class="madal-content-box">
                            <h3 class="margin-bottom-small">新增商品</h3>
                                <form>
                                    商品名稱：<input type="text" name="prodName" id="prodName"><br>
                                    商品類別：<select name="prodCat" id="prodCat">
                                                <option value="機油">機油</option>
                                                <option value="美容">美容</option>
                                                <option value="其他">其他</option>
                                            </select><br>
                                    商品價格：<input type="text" name="prodPrice" id="prodPrice"><br>
                                    商品資訊：<input type="text" name="prodInfo" id="prodInfo"><br>
                                    圖片：<input type="file" name="prodImg" id="prodImg"><br>
                                    上下架狀態：<select name="prodState" id="prodState">
                                                <option value="1">上架</option>
                                                <option value="0">下架</option>
                                              </select>
                        </div>
                </div>

                <div class="poster-inner__madal-btn">
                    <div class="poster-inner__madal-btn-group">
                        <button class="ok" type="button"  id="newPrdctOk">確定</button> 
                    </form>
                        <button class="cancel" id="newPrdctCancel">取消</button>
                    </div>
                </div>
              
            </div>
        </section> <!-- 新增商品燈箱 end -->




               
        <!-- ============================修改商品燈箱============================== -->
        <section class="manage-page-content__poster-inner" id="edtPrdctWin">
            <div class="poster-inner__madal">
                <div class="poster-inner__madal-close">
                    <div class="poster-inner__madal-close-icon">+</div>
                </div>

                <div class="poster-inner__madal-content">
                        <div class="madal-content-box">
                            <h3 class="margin-bottom-small">修改商品</h3>
                            <form>
                                <input type="hidden" value="" id="prodNoEdt" name="prodNoEdt"> <!-- 用來抓商品的prodNo -->
                                <input type="hidden" value="" id="prodImgSrc" name="prodImgSrc">
                                商品名稱：<input type="text" value="" name ="prdctNameEdt" id="prdctNameEdt"><br>
                                商品類別：<select name="prodCatEdt" id="prodCatEdt">
                                            <option value="機油">機油</option>
                                            <option value="美容">美容</option>
                                            <option value="其他">其他</option>
                                        </select><br>
                                商品價格：<input type="text" id="prodPriceEdt" name="prodPriceEdt"><br>
                                商品資訊：<input type="text" id="prodInfoEdt" name="prodInfoEdt"><br>
                                圖片：<input type="file" type = "file" id="prodImgEdt" name="prodImgEdt"><br> 
                                <!-- <span id="prodImgDb"></span> -->
                                上下架狀態：<select name = "prodStateEdt" id="prodStateEdt">
                                            <option value="1">上架</option>
                                            <option value="0">下架</option>
                                         </select>
                           
                        </div>
                </div>
                <div class="poster-inner__madal-btn">
                    <div class="poster-inner__madal-btn-group">
                        <button class="ok" id="editProdOk">確定</button>
                    </form>
                        <button class="cancel" id="editProdCancel">取消</button>
                    </div>
                </div>
              
            </div>
        </section> <!-- 修改商品燈箱 end -->

  

        </div> <!-- manage End -->




        <script src="js/manageProd.js"></script>
</body>
</html>