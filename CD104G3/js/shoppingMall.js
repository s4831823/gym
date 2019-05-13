
function keyIn() {
    var title = document.querySelector(".heading--subtitle");
    var titleText = '歡迎光臨達文西商城';
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
}

$(document).ready(function(){ 

    window.onload =  () => {
        
        setTimeout(keyIn, 1100);
        $(".top-left").hide().delay(1800).fadeIn('slow');
        $(".bottom-right").hide().delay(1800).fadeIn('slow');
    }

    
// =================================================================
//                        防鏽潤滑油動畫效果
// =================================================================
// ---- 摸到按鈕速度 ----
    $('#slowFast--btn').mouseover(function(e){
        e.stopPropagation();
        $('#slowFast--leftArm').css('animation-duration','10ms');
        $('#slowFast--rightArm').css('animation-duration', '10ms');
        // console.log('btn: 速度10ms!');
    });
// ---- 離開按鈕,速度回歸 ----
    $('#slowFast--btn').mouseleave(function(){
        $('#slowFast--leftArm').css('animation-duration', '3s');
        $('#slowFast--rightArm').css('animation-duration', '3s');
        // console.log('原始速度');
    });
// ---- 摸到商品區塊速度 ----
    $('#plaza_newProd_item_content_buy').mouseover(function(){
        $('#slowFast--leftArm').css('animation-duration', '.15s');
        $('#slowFast--rightArm').css('animation-duration', '.15s');
        // console.log('商品圖: 速度.15s!');
    });
// ---- 離開商品區塊,速度回歸 ----
    $('#plaza_newProd_item_content_buy').mouseleave(function(){
        $('#slowFast--leftArm').css('animation-duration', '3s');
        $('#slowFast--rightArm').css('animation-duration', '3s');
        // console.log('原始速度');
    });

 


})  //end of (document).ready
