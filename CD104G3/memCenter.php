<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="js/memCenter.js"></script>
    
	<link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/memCenter.css">
    <link rel="stylesheet" href="css/memCenterRWD.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">



    <title>DAVINCI 會員中心</title>
</head>

<body>
    <!-- Header -->
    <?php
        require_once("header.php");
    ?>
    <!-- Header -->


    <!-- 會員中心內容開始 -->
    <section id="memCenter-all">

    <!-- peter大標 -->
    <div id="titlePe">
                <section class="section__forum-title">    
                    <div class="section__forum-title--box">
                        <div class="block__heading--title">
                            <h1 class="heading--title margin-bottom-medium">
                                會員中心
                            </h1>
                            <p class="heading--subtitle">
                                
                            </p>
                            <span class="top-left">
                            <div class="icon"></div>
                            <div class="icon"></div>
                            <div class="icon"></div>
                            <div class="icon"></div>
                            </span>
                            <span class="top-right"></span>
                            <span class="bottom-left"></span>
                            <span class="bottom-right">
                            <div class="icon"></div>
                            <div class="icon"></div>
                            <div class="icon"></div>
                            <div class="icon"></div>
                            </span>
                        </div>
                    </div>    
            </section>
        </div>
            <!-- peter大標 -->

        <div class="section-wrap">
            <!-- 大標開始 -->
            <!-- <div class="mem-main-title">
                <div class="title-icon">
                    <img src="img/img-memCenter/main-title-icon-01-01-01-01.png">
                </div>
                <div class="title-word">
                    會員中心
                </div>
            </div> -->
            <!-- 大標結束 -->
            

            
            







            <!-- 左半部開始 -->
            <div class="section-item section-item-left">

                

                <!-- 機器人區開始 -->
                <div class="mem-myrobot">
                    <!-- 左上半 -->
                    <div class="myrobot-item myrobot-item-top">
                        <div id="myrobot-name">
                            <div class="dec dec-right" id="rightHand">
                                <img src="img/img-memCenter/point-right.png">
                            </div>
                            <div class="dec dec-left" id="leftHand">
                                <img src="img/img-memCenter/point-left.png">
                            </div>
                        
                            <span id="myrobotname-now"></span>
                            
                        </div>
                        <div id="myrobot-pic-area">
                            <div id="myrobot-img">
                                <img src="">
                            </div>
                            <div id="myrobot-stage">
                                <img src="img/img-memCenter/stage3.png">
                                <div id="stage-shadow"></div>
                                <div id="stage-hole"></div>
                                <!-- <div class="stage-circle">
                                    <img src="img/img-memCenter/circle-01-01-01.png">
                                </div> -->
                            </div>
                        </div>
                    </div>



                    <!-- 左下半 -->
                    <div class="myrobot-item myrobot-item-bottom" id="myrobot-item-section">

                        <!-- 左右切換紐 -->
                        <!-- <div class="switch-btn pre-btn">
                            <span class="tri"></span>
                        </div>
                        <div class="switch-btn next-btn">
                            <span class="tri"></span>
                        </div> -->

                        <!-- 其他機器人 -->
                        <!-- <div class="otherrobot-item">
                            <div class="otherrobot-pic">
                                <img src="img/img-memCenter/myrobot-ex-01.png">
                            </div>
                            <div class="otherrobot-name">
                                日本原裝進口好吃
                            </div>
                        </div> -->

                    </div>
                </div>
                <!-- 機器人區結束 -->

            </div>
            <!-- 左半部結束 -->


            <!-- 右半部開始 -->
            <div class="section-item section-item-right">

                <!-- 上半頁籤 -->
                <div class="tag-area">
                    <div class="tag-item" id="myrobot-tag">我的機器人
                        <span id="my-robot-span" class="span-in">Robot</span>
                        <div id="myrobot-tag-littleicon" class="tag-littleicon">
                            <img src="img/img-memCenter/icon+myrobot.png">
                        </div>
                    </div>
                    <div class="tag-item" id="myorder-tag">訂單查詢
                        <span id="my-order-span" class="span-in">Order</span>
                        <div id="myorder-tag-littleicon" class="tag-littleicon">
                            <img src="img/img-memCenter/icon+myorder.png">
                        </div>
                    </div>
                    <div class="tag-item" id="mylike-tag">收藏文章
                        <span id="my-like-span" class="span-in">Save</span>
                        <div id="mylike-tag-littleicon" class="tag-littleicon">
                            <img src="img/img-memCenter/icon+mylike.png">
                        </div>
                    </div>
                    <div class="tag-item" id="mydata-tag">修改資料
                        <span id="my-data-span" class="span-in">Edit</span>
                        <div id="mydata-tag-littleicon" class="tag-littleicon">
                            <img src="img/img-memCenter/icon+mydata.png">
                        </div>
                    </div>
                </div>

                <!-- 下半資料 -->
                <div class="content-area">

                    <!-- 小標 -->
                    <div id="sub-title">
                        <div id="sub-title-icon">
                            <img src="img/img-memCenter/icon+myrobot.png">
                        </div>
                        <div id="sub-title-word">
                            我的機器人
                        </div>
                    </div>

                    <!-- 我的機器人區開始 -->
                    <div id="content-myrobot" class="content-item">

                        <!-- 如果沒有機器人的話 -->
                        <div id="nocustRobot">
                            <!-- <div id="norobot-img">
                                <img src="img/img-memCenter/cd104.png" alt="">
                            </div> -->
                            您還沒有機器人喔<br>快去<a href="customized.php">客製化</a><br>製作一個專屬於您的機器人吧!
                        </div>


                        <!-- 如果有機器人的話 -->
                        <div class="myrobot-data">
                            <table id="myrobot-table">

                                <tr id="tr-robotname">
                                    <th>機器人姓名 : </th>
                                    <td id="myrobotName"></td>
                                </tr>

                                <tr id="tr-robotbirth">
                                    <th>機器人生日 : </th>
                                    <td id="myrobotBirth"></td>
                                </tr>

                                <tr id="tr-robotrank">
                                    <th>目前的排名 : </th>
                                    <td>第<span id="nowRank"></span>名</td>
                                </tr>

                                <tr id="tr-robottotalabilty">
                                    <th id="totalAbility-title">綜合能力值 : </th>
                                    <td id="totalAbility">
                                        <div id="abilityNum">140</div>
                                        <div class="g-number-container vision preserve">
                                            <div class="g-number-rotate preserve">
                                                <div class="g-number preserve" data-digit="0">
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                </div>
                                                <div class="g-number preserve" data-digit="0">
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                </div>
                                                <div class="g-number preserve" data-digit="0">
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                    <div class="g-line preserve translate"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="myrobot-chart">
                            <div class="myrobot-chart-wrap">

                                <div class="bar-item">
                                    <div class="bar-num" id="num-INT"></div>
                                    <div class="bar-body">
                                        <div class="bar-in" id="bar-INT"></div>
                                    </div>
                                    <div class="bar-title">智力</div>
                                </div>

                                <div class="bar-item">
                                    <div class="bar-num" id="num-VIT"></div>
                                    <div class="bar-body">
                                        <div class="bar-in" id="bar-VIT"></div>
                                    </div>
                                    <div class="bar-title">體力</div>
                                </div>

                                <div class="bar-item">
                                    <div class="bar-num" id="num-AGI"></div>
                                    <div class="bar-body">
                                        <div class="bar-in" id="bar-AGI"></div>
                                    </div>
                                    <div class="bar-title">敏捷</div>
                                </div>


                            </div>
                        </div>
                        <div class="myrobot-btn" id="gotoGym-btn">
                            <div class="share-btn-box">
                                <button class="share-btn">
                                    來去訓練
                                    <div class="light"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- 我的機器人區結束 -->

                    <!-- 訂單查詢區開始 -->
                    <div id="content-myorder" class="content-item">

                        <!-- 訂單查詢頁籤 -->
                        <div class="myorder-query-tag">
                            <div class="order-tag-in" id="custorder-tag">客製化訂單</div>
                            <div class="order-tag-in" id="shoporder-tag">商城訂單</div>
                        </div>


                        <!-- 客製化訂單查詢 -->
                        <table id="mycustorder-table">
                            <tr>
                                <th>訂單編號</th>
                                <th>日期</th>
                                <th>機器人姓名</th>
                                <th>訂單狀態</th>
                            </tr>

                            <!-- <tr>
                                <td class="td-ordernum">1</td>
                                <td class="td-orderdate">2018-12-28</td>
                                <td class="td-ordertotal">$205,220</td>
                                <td class="td-orderstate">已出貨</td>
                            </tr> -->

                            <tr>
                                <td colspan="5" id="noCustOrderData-td">
                                    <span id="noCustOrderData">
                                        還沒有任何客製化訂單資料唷 ! <br>來去<a href="customized.php">客製化</a><br>製作屬於自己的機器人吧 ~
                                    </span>
                                </td>
                            </tr>

                        </table>
                        <!-- 客製化訂單查詢 -->

                        <!-- 商城訂單查詢 -->
                        <table id="myorder-table">
                            <tr>
                                <th id="ordernum">訂單編號</th>
                                <th id="orderdate">日期</th>
                                <!-- <th id="ordertotal">總價</th> -->
                                <th id="orderstate">訂單狀態</th>
                                <th id="orderdetail">明細</th>
                            </tr>

                            <!-- <tr>
                                <td class="td-ordernum">
                                    00368112
                                </td>
                                <td class="td-orderdate">
                                    2018-09-28
                                </td>
                                <td class="td-ordertotal">
                                    $148555
                                </td>
                                <td class="td-orderstate">
                                    已出貨
                                </td>
                                <td class="td-orderdetail">
                                    <img src="img/img-memCenter/file (1).png">
                                </td>
                            </tr> -->


                            <tr>
                                <td colspan="5" id="noOrderData-td">
                                    <span id="noOrderData">
                                        還沒有任何商城訂單資料唷 ! <br>來去<a href="shoppingMall.php#">商城</a>逛逛吧 ~
                                    </span>
                                </td>
                            </tr>
                            <!-- 商城訂單查詢 -->

                        </table>
                    </div>
                    <!-- 訂單本文 -->


                    

                    <!-- 訂單查詢區結束 -->


                    <!-- 收藏文章區開始 -->
                    <div id="content-mylike" class="content-item">
                        <table id="mylike-table">
                            <tr>
                                <th id="arttitle">文章名稱</th>
                                <th id="artwriter">作者</th>
                                <th id="artdate">日期</th>
                                <th id="artdel">移除</th>
                            </tr>

                            <!-- <tr>
                                <td class="td-arttitle">
                                    <a href="">我的小機機器人</a>
                                </td>
                                <td class="td-artwriter">
                                    王彼得王王
                                </td>
                                <td class="td-artdate">
                                    2018-11-11
                                </td>
                                <td class="td-artdel">
                                    <img src="img/img-memCenter/XX.png">
                                </td>
                            </tr> -->

                            <tr>
                                <td colspan="5" id="noLikeData-td">
                                    <span id="noLikeData">
                                        還沒有任何收藏的文章唷 ! <br>來去<a href="forum.php">討論區</a>逛逛吧 ~
                                    </span>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <!-- 收藏文章區結束 -->

                    <!-- 修改資料區開始 -->
                    <div id="content-mydata" class="content-item">

                        <div class="edit-area">

                            <!-- 修改會員頭像 -->
                            <div class="edit-area-item item-myimg">
                                <div class="img-frame">
                                    <div id="img-area-body">
                                        <div id="img-in">
                                            <img src="" id="showimg-in">
                                        </div>
                                        <div id="img-icon">
                                            <img src="img/img-memCenter/camera1-01-01-01.png" id="avatar">
                                        </div>
                                        <form id="myImgForm">
                                            <div id="img-input">
                                                <input type="file" id="upFile" name="upFile" accept="image/*" style="opacity:0;width:100%;height:100%;">
                                            </div>
                                            <!-- <input type="button" id="btnSend" value="OK"> -->
                                        </form>

                                    </div>

                                    <div id="edit-img-btn">
                                        <div class="share-btn-box">
                                            <button class="share-btn">
                                                修改頭像
                                                <div class="light"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 修改會員頭像 -->



                            <!-- 修改一般資料 -->
                            <div class="edit-area-item item-mydata">
                                <div class="data-input">
                                    <label>主人姓名 : </label>
                                    <input type="text" name="" id="memName" value="一千兒">
                                </div>
                                <div class="data-input">
                                    <label>主人信箱 : </label>
                                    <input type="text" name="" id="memEmail" value="123@gmail.com">
                                </div>
                                <div class="edit-btn" id="editNormalData">
                                    <div class="share-btn-box">
                                        <button class="share-btn">
                                            修改資料
                                            <div class="light"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- 修改一般資料 -->

                            <!-- 修改密碼資料 -->
                            <div class="edit-area-item item-mypsw">
                                <div class="data-input">
                                    <label>您的舊密碼 : </label>
                                    <input type="text" name="" id="memPsw0">
                                </div>
                                <div class="data-input">
                                    <label>輸入新密碼 : </label>
                                    <input type="text" name="" id="memPsw1">
                                </div>
                                <div class="data-input">
                                    <label>確認密碼 : </label>
                                    <input type="password" name="" id="memPsw2">
                                </div>
                                <div class="edit-btn">
                                    <div class="share-btn-box">
                                        <button class="share-btn">
                                            修改密碼
                                            <div class="light"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- 修改密碼資料 -->

                        </div>
                    </div>
                    <!-- 修改資料區結束 -->
                </div>

            </div>
            <!-- 右半部結束 -->


            
            <!-- 訂單明細燈箱!!!! -->
            <div id="orderlightbox-wrap">
                        <div class="orderlightbox">
                            <div class="orderlightbox-inner">

                                <div id="orderdetails-cancel-btn">
                                    <div class="exitBtn">
                                        <div class="exitBtn--hoverZone"></div>
                                        <div class="exitBtn--line-R"></div>
                                        <div class="exitBtn--line-L"></div>
                                        <span class="exitBtn--border exitBtn--row1"></span>
                                        <span class="exitBtn--border exitBtn--row2"></span>
                                        <span class="exitBtn--border exitBtn--col1"></span>
                                        <span class="exitBtn--border exitBtn--col2"></span>
                                    </div>
                                </div>

                                <div class="table-wrap table-wrap-top">
                                    <table id="orderdetails-table-top">
                                        <tr>
                                            <th>訂單編號 : </th>
                                            <td id="orderDetailOrderNo"></td>
                                        </tr>
                                        <tr>
                                            <th>訂單日期 : </th>
                                            <td id="orderDetailOrderDate"></td>
                                        </tr>
                                        <tr>
                                            <th>收件人兒 : </th>
                                            <td id="orderDetailOrderReceiver"></td>
                                        </tr>
                                        <tr>
                                            <th>收件地址 : </th>
                                            <td id="orderDetailOrderAddr"></td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="table-wrap table-wrap-bottom">
                                    <table id="orderdetails-table-bottom">
                                        <tr>
                                            <th>品名</th>
                                            <th>圖片</th>
                                            <th>數量</th>
                                            <th>單價</th>
                                            <th>小計</th>
                                        </tr>
                                        <div id="ordertable-box">
                                            <!-- <tr>
                                                <td>防鏽潤滑油</td>
                                                <td class="proItem-pic">
                                                    <div class="proItem">
                                                        <img src="img/img-memCenter/proTest.jpg">
                                                    </div>
                                                </td>
                                                <td>1</td>
                                                <td>$1987</td>
                                                <td>$1987</td>
                                            </tr> -->
                                        </div>
                                    </table>
                                </div>

                                <div class="total-money">
                                    <span class="money-item">
                                        總金額 :
                                    </span>
                                    <span class="money-item" id="orderTotal">
                                        $元
                                    </span>
                                </div>

                            </div><!-- orderlightbox-inner -->
                        </div><!-- orderlightbox -->
                    </div><!-- orderlightbox-wrap -->
                    <!-- 訂單明細燈箱 -->

        </div><!-- 外大包 -->


    </section>
    <!-- 會員中心內容結束 -->



    <!-- Footer -->
    <footer class="footer">
     <h4>© 2018 Davinci - Robot Company</h4>
    </footer>
    <!-- Footer -->

    <script>
        



function keyIn() {
    var title = document.querySelector(".heading--subtitle");
    var titleText = '主人來看我 主人來看我';
    var CHAR_TIME = 150;

    var text = void 0,index = void 0;

    function requestCharAnimation(char, value) {
    setTimeout(function () {
        char.textContent = value;
        char.classList.add("fade-in");
    }, CHAR_TIME);
    }

    function addChar() {
        var char = document.createElement("span");
        char.classList.add("char");
        char.textContent = "▌";
        title.appendChild(char);
        requestCharAnimation(char, text.substr(index++, 1));
        if (index < text.length) {
            requestChar();
        }
    }

    function requestChar() {
        var delay = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
        setTimeout(addChar, CHAR_TIME + delay);
    }

    function start() {
    index = 0;
    text = titleText.trim();
    title.textContent = "";
    requestChar(1000);
    }
    start();
}//PETER機器人

$(document).ready(function() {
        window.onload =  () => {
            setTimeout(keyIn, 1100);
            $(".top-left").hide().delay(1800).fadeIn('slow');
            $(".bottom-right").hide().delay(1800).fadeIn('slow');
        }
})


    </script>

</body>

</html>