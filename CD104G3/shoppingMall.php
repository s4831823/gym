<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>DAVINCI 商城</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/reset.css">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/shopStyle.css">
        <script src="js\jquery-3.3.1.min.js"></script>
        <script src="js\shoppingMall.js"></script> 

        
        <?php include 'header.php'?>

    
        <div id="plaza">
            <section class="section__forum-title">    
                <div class="section__forum-title--box">
                    <div class="block__heading--title">
                        <h1 class="heading--title margin-bottom-medium">
                            商城
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
            <div id="plaza_newProd">
                <div id="plaza_newProd_item">
                    <img src="img/img-shop/mark.png" id="plaza_newProd_item--mark">
                    <h1 id="plaza_newProd_item--title">防鏽潤滑油</h1>
                    <div id="plaza_newProd_item_content">
                        <div id="plaza_newProd_item_content_buy">
                            <img src="img/img-shop/prod-01.png">
                            <div id="plaza_newProd_item_content_buy--lable">
                                <span>$181</span>
                                <div class="shareBtn--box">
                                    <button  id="slowFast--btn">
                                        效果展示
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="plaza_newProd_item_content_show">
                            <div id="plaza_newProd_item_content_show--txt">
                                <h1>機器人手腳慢頓嗎？</h1>
                                <h2>快使用<span>防鏽潤滑油</span>讓機器人活動順暢無憂！</h2>
                            </div>
                            <div id="slowFast">
                                <img id="slowFast--leftArm" src="img/img-shop/leftArm.png">
                                <img id="slowFast--withoutArm" src="img/img-shop/withoutArm.png">
                                <img id="slowFast--rightArm" src="img/img-shop/rightArm.png">
                            </div>
                        </div>
                    </div> <!-- end of .plaza_newProd_item_content -->
                </div> <!-- end of .plaza_newProd_item -->
            </div> <!-- end of .plaza_newProd -->

            <div id="plaza_prod">
            <?php
                try {
                    require_once("js/connect.php");
                    
                    $sql = "select * from product where prodState = 1";
                    $stmt = $pdo->query( $sql);
                    $allProd = $stmt -> fetchAll(); 
                    foreach( $allProd as $row){
            ?>
            <!-- 從資料庫撈上架商品呈現 -->
                <div class="plaza_prod_box"> 
                    <img src="img/img-shop/<?php echo $row["prodImg"];?>">
                    <h1 class="prodName"><?php echo $row["prodName"];?></h1>
                    <h2 class="prodPrice">$<?php echo number_format($row["prodPrice"]);?></h2>  
                    <div class="shareBtn--box"> 
                        <button class="shareBtn btn--buy">買我
                            <div class="light"></div>
                        </button><span style="display:none"><?php echo $row["prodNo"];?></span>
                    </div>
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
        </div> <!-- end of .plaza -->

        <footer class="footer">
            <h4>© 2018 Davinci - Robot Company</h4>
        </footer>


    <script>
        function addToCart(){
            let buyBtns = document.querySelectorAll('.btn--buy');
            let lenBuy = buyBtns.length;
            for(let i=0; i<lenBuy; i++){
                // ---- 「買我」按鈕點按時 ----
                buyBtns[i].addEventListener('click', function(e){
                    
                        nullText();

                    // 記錄在session
                    let xhr = new XMLHttpRequest(); 

                    // prodNo加入session  (點按「買我」時加入)
                    let buyUrl = `php/cartList.php?`
                               + `prodNo=${e.target.nextSibling.innerText}`
                               + `&prodName=${e.target.parentNode.parentNode.getElementsByClassName("prodName")[0].innerText}`
                               + `&prodPrice=${e.target.parentNode.parentNode.getElementsByClassName("prodPrice")[0].innerText.substr(1).replace(",","")}`
                               + `&prodImg=${e.target.parentNode.parentNode.getElementsByTagName("img")[0].src}`
                               + `&prodQty=1`;
                    xhr.open('GET', buyUrl);
                    xhr.send();

                    // ---- 購物車新增品項 ----
                    (function(){
                        let itemsWrap = document.getElementById('mCSB_1_container');
                        let cartTitle = document.getElementById('cartTitle');
                        let cartSum = document.getElementById('cartSum');
                        let cartItem = document.getElementsByClassName('cart_list_item')[0];
                        //點「買我」新增item
                        let newCartItem = cartItem.cloneNode(true);
                        
                        // ~~~~ 在新增的item放入產品資料
                        // 圖檔
                        newCartItem.getElementsByTagName("img")[0].src
                            = e.target.parentNode.parentNode.getElementsByTagName("img")[0].src;
                        //隱藏的prodNo
                        newCartItem.getElementsByTagName("span")[0].innerHTML
                            = e.target.nextSibling.innerText;
                        //商品名稱
                        newCartItem.getElementsByTagName("span")[1].innerHTML
                            = e.target.parentNode.parentNode.querySelector(".prodName").innerHTML;
                        //subTotal，初值產品單價
                        newCartItem.getElementsByTagName("span")[2].innerHTML
                            = e.target.parentNode.parentNode.querySelector(".prodPrice").innerHTML;
                        //隱藏的price
                        newCartItem.getElementsByTagName("span")[3].innerHTML
                            = e.target.parentNode.parentNode.querySelector(".prodPrice").innerHTML.substr(1).replace(",","");
                        

                        // 在session查prodNo有沒有存在,來判斷是否已購買
                        xhr.onload = function(){    
                            let boughtTxt = xhr.responseText;
                        
                            if(boughtTxt != '已經購買過此項商品'){
                                itemsWrap.insertBefore(newCartItem,cartSum);
                                newCartItem.style.display="flex"; 
                                    cartChange();
                            }
                            else{
                                $('#loginstate-wrap').show();
                                $('#state-pic-V').show();
                                $('#state-pic-X').hide();
                                $('#state-con-inner').text(boughtTxt);
                            }
                        }

                        // ---- 建立新品項的事件聆聽功能與發生事件 ----
                        let lessBtn = newCartItem.querySelector(".cart_list_item_qty--less");
                        let numBtn = newCartItem.querySelector(".cart_list_item_qty--num");
                        let addBtn = newCartItem.querySelector(".cart_list_item_qty--add");

                        // ---- 減號 lessBtn.click事件 ----
                        lessBtn.addEventListener("click",function(e){
                            let xhr = new XMLHttpRequest();

                                if( parseInt(numBtn.innerText) >0 )
                                    numBtn.innerText = parseInt(numBtn.innerText) - 1;

                                        cartChange();

                                if( parseInt(numBtn.innerText) <=0 )
                                    numBtn.parentNode.parentNode.remove();

                                        nullText();
                                    
                            // session回傳
                            xhr.onload = function(){
                                // console.log('return', xhr.responseText);
                            }
                            
                            let url = `php/cartUpdate.php?`
                                    + `prodNo=${e.target.parentNode.parentNode.getElementsByTagName("span")[0].innerText}`
                                    + `&prodQty=${e.target.nextSibling.nextSibling.innerText}`;
                            xhr.open('GET', url);
                            xhr.send();
                        }); // end of lessBtn.click事件

                        // ---- 加號 addBtn.click事件 ----
                        addBtn.addEventListener("click",function(e){
                            let xhr = new XMLHttpRequest();
                            
                                numBtn.innerText = parseInt(numBtn.innerText) + 1;

                                    cartChange();

                            // session回傳
                            xhr.onload = function(){
                                // console.log('return', xhr.responseText);
                            }

                            let url = `php/cartUpdate.php`
                                    + `?prodNo=${e.target.parentNode.parentNode.getElementsByTagName("span")[0].innerText}`
                                    + `&prodQty=${e.target.previousSibling.previousSibling.innerText}`;
                            xhr.open('GET', url);
                            xhr.send();
                        }); // end of addBtn.click事件
                       
                            cartChange();
        
                    })();
                }); // end of buyBtuns的click事件
            }; // end of lenBuy for迴圈
        }
        addToCart();
    </script>
    </body>
</html>         