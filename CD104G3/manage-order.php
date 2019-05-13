<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:300,400" rel="stylesheet">
    <link rel="stylesheet" href="css/login_public.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/manage-order.css">
    <script src="js\jquery-3.3.1.min.js"></script>
    <script src="js/order.js"></script>
    <title>管理頁面</title>
</head>
<body>
    <div class="manage" id="order">
        <div class="manage-bar">
            <ul>
                <li class="manage-bar__header"><img src="img/logo.png" alt="logo image"></li>
                <li><a href="mgr_login.php">後台管理員管理</a></li>
                <li><a href="aboutmanage.php">服務據點管理</a></li>
                <li><a href="manageForum.php">討論區管理</a></li>
                <li><a href="manageProd.php">商城商品管理</a></li>
                <li><a href="rbtOrder.php">客製化訂單管理</a></li>
                <li><a href="manage-order.php">商城訂單管理</a></li>
                <li><a href="memManage.php">會員管理</a></li
            </ul>
        </div>
            
        <section class="manage-page-content">
            <div class="manage-page-content__manage-dashboard">
                <div class="manage-dashboard__title">
                    <h1>商城訂單管理</h1>
                </div>   

               <?php  
                    require_once('login_public.php') 
               ?>

                <div class="manage-dashboard__cat" id="order_cat">
                    <ul>
                        <li id="order_catLi--1">訂單編號</li>
                        <li id="order_catLi--2">會員編號</li>
                        <li id="order_catLi--3">訂購日</li>
                        <li id="order_catLi--4">收件人</li>
                        <li id="order_catLi--5">電話</li> 
                        <li id="order_catLi--6">總額</li>
                        <li id="order_catLi--7">訂單狀態</li>
                    </ul>
                </div>
                <div class="manage-dashboard__info" id="order_info">
                <?php
                    try {
                        require_once("js/connect.php");

                        $sql = "SELECT o.orderNo, o.memNo, o.orderDate, o.orderReceiver, 
                                       o.orderTel, o.orderState, SUM(i.prodPrice* i.prodQty) AS total 
                                FROM prodorder o join proditem i ON o.orderNo = i.orderNo 
                                GROUP BY o.orderNo";
                        $stmt = $pdo->query( $sql);
                        $allProd = $stmt -> fetchAll();

                        foreach( $allProd as $row){
                ?>
                    <div class="manage-dashboard__info-item" id="order_item">
                        <ul>
                            <li class="order_itemLi--1"><span><?php echo $row["orderNo"];?></span> </li>
                            <li class="order_itemLi--2"><span><?php echo $row["memNo"];?></span></li>
                            <li class="order_itemLi--3"><span><?php echo $row["orderDate"];?></span></li>
                            <li class="order_itemLi--4"><div><?php echo $row["orderReceiver"];?></div> </li>
                            <li class="order_itemLi--5"><div><?php echo $row["orderTel"];?></div></li>
                            <li class="order_itemLi--6"><div><?php echo number_format($row["total"]);?></div></li>
                            <li class="order_itemLi--7"><div class="orderState"><?php echo $row["orderState"];?></div></li>
                            <li class="order_itemLi--8">
                                <div id="order_btn">
                                    <button class="showDetail odBtn">查看</button>
                                    <button class="changeState odBtn"></button>
                                    <span style="display:none;"><?php echo $row["orderState"];?></span>
                                </div>
                            </li>
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
        </section>
        <section class="manage-page-content__poster-inner" id="order_popup">
            <div class="poster-inner__madal">
                <div class="poster-inner__madal-close">
                    <div class="poster-inner__madal-close-icon" id="popup--exit">+</div>
                </div>

                <!-- 查看popup -->
                <div class="poster-inner__madal-content">
                    <div class="madal-content-box" id="order_detail">
                        <h3 class="margin-bottom-small" id="order_detail--title">訂單資訊</h3>
                        <table id="sendInfo">
                            <caption>寄件資訊</caption>
                            <tr>
                                <th>收件人</th><th>收件地址</th><th>e-mail</th><th>電話</th>
                            </tr>
                            <tr>
                                <td id="orderReceiver"></td>
                                <td id="orderAddr"></td>
                                <td id="orderEmail"></td>
                                <td id="orderTel"></td>
                            </tr>
                        </table>
                        <table id="orderitem">
                            <caption>訂單明細</caption>
                            <tr>
                                <th>品名</th><th>單價</th><th>數量</th><th>小計</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="poster-inner__madal-btn">
                    <button class="pass popupBtn" id="odPassBtn">確認</button>
                </div>
            </div>
        </section>
    </div><!-- end of .manage -->
</body>
</html>
