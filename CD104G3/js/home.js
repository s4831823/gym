//=============文字輸入效果=============
function keyIn1() {
    var title = document.querySelector(".heading--subtitle1");
    var titleText = '自己的機器人';
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
function keyIn2() {
    var title = document.querySelector(".heading--subtitle2");
    var titleText = '自己打造！';
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
function keyIn3() {
    var title = document.querySelector(".heading--subtitle3");
    var titleText = '達文西創辦人 王彼得';
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

setTimeout(keyIn1 ,6000);
setTimeout(keyIn2 ,7000);
setTimeout(keyIn3 ,8000);

//===========機器人長皮膚後內臟消失=============
    $(document).ready(function(){   

        setTimeout(function(){
        if ($('#RbtHolder').length > 0) {
            $('#RbtHolder').remove();
        }
        }, 4200);  

//===============機器人長皮膚================
        setTimeout(function(){
            $('#RbtSkinHolder').css('visibility','visible');
        }, 3500);  

//===============第一屏文字框出現================
setTimeout(function(){
        $('#Hi').css('visibility','visible');
    }, 5800);  

setTimeout(function(){
    $('#ph-Hi').css('visibility','visible');
}, 5800);  

setTimeout(function(){
        $('.spinDisc').css('visibility','visible');
    }, 7000); 
});  



//=================功能機器人點按換圖==================
var jobNumber = 1;
showJubNumber(jobNumber);
function showRbt(n){
    showJubNumber(jobNumber = n);
};
function showJubNumber(n){
    var i;
    var img = document.getElementsByClassName("jobRbt-show");
    var smallImg = document.getElementsByClassName("roundImg");
    var intro = document.getElementsByClassName("theHelper-box");

    if(n > img.length){ jobNumber = 1 };
    if(n < 1){ jobNumber = img.length };

    for( i=0; i<img.length; i++){
        img[i].style.display = "none";
        intro[i].style.display = "none";
    }

    for( i=0; i<smallImg.length; i++ ){
        smallImg[i].className = smallImg[i].className.replace("brightnessOn", "");
    }

    img[jobNumber-1].style.display = "block";
    smallImg[jobNumber-1].className += " brightnessOn";
    intro[jobNumber-1].style.display = "block";
};



//====================機器人能力值顯示=======================

$(document).ready(function(){
    var RbtValue = $('#rankingStage__2ndRbtValueBar').siblings('input').val();
    console.log('value:'+RbtValue);
    $('#rankingStage__2ndRbtValueBar').css("width", (RbtValue/3) + "%" );


    var RbtValue = $('#rankingStage__1stRbtValueBar').siblings('input').val();
    console.log('value:'+RbtValue);
    $('#rankingStage__1stRbtValueBar').css("width", (RbtValue/3) + "%" );


    var RbtValue = $('#rankingStage__3rdRbtValueBar').siblings('input').val();
    console.log('value:'+RbtValue);
    $('#rankingStage__3rdRbtValueBar').css("width", (RbtValue/3) + "%" );


    $(".customizeSteps__stepBox__step").removeClass("playOnload");
    $("#stepRbt").children("img").removeClass("playOnload");
    $("#stepRbt-arm").removeClass("playOnload");
    $("#stepRbtph").children("img").removeClass("playOnload");

});


//================文字框展開================-
var controller = new ScrollMagic.Controller();
var animation =TweenMax.fromTo('.theHelper-box',.2,{
        scaleX:0
    },{
        scaleX:1
    });

var indexG2 = new ScrollMagic.Scene({
    triggerElement: ".indexG2", 
    reverse:false //動畫只執行一次
}).setTween(animation).addTo(controller)



var animation =TweenMax.fromTo('.nameRbtBox',.4,{
    scaleX:0
},{
    scaleX:1
});

var indexG3 = new ScrollMagic.Scene({
triggerElement: ".indexG3", 
reverse:false //動畫只執行一次
}).setTween(animation).addTo(controller)
//刪掉.addIndicators()，畫面上的記號會消失



var animation =TweenMax.fromTo('.trainIntro',.4,{
    scaleX:0
},{
    scaleX:1
});

var indexG4 = new ScrollMagic.Scene({
triggerElement: ".indexG4", 
reverse:false //動畫只執行一次
}).setTween(animation).addTo(controller)
//刪掉.addIndicators()，畫面上的記號會消失


//==============您的好幫手能力值生長===============

var controller = new ScrollMagic.Controller();
var animation =TweenMax.fromTo('#slill-value__active__fire',1.5,{
        delay:2,
        scaleX:0,
        transformOrigin:"left"
    },{
        scaleX:1
    });

var indexG2 = new ScrollMagic.Scene({
    triggerElement: ".indexG2", 
    reverse:false //動畫只執行一次
}).setTween(animation).addTo(controller)


var controller = new ScrollMagic.Controller();
var animation =TweenMax.fromTo('#slill-value__smart__fire',1.5,{
        delay:2,
        scaleX:0,
        transformOrigin:"left"
    },{
        scaleX:1
    });

var indexG2 = new ScrollMagic.Scene({
    triggerElement: ".indexG2", 
    reverse:false //動畫只執行一次
}).setTween(animation).addTo(controller)


var controller = new ScrollMagic.Controller();
var animation =TweenMax.fromTo('#slill-value__agile__fire',2,{
        delay:2,
        scaleX:0,
        transformOrigin:"left"
    },{
        scaleX:1
    });

var indexG2 = new ScrollMagic.Scene({
    triggerElement: ".indexG2", 
    reverse:false //動畫只執行一次
}).setTween(animation).addTo(controller)