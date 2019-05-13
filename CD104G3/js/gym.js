
// (function(window,undefined){
//     /**
//      * 初始化遊戲
//      */
//     var catchGame = function(args){
//         /*3種物品*/
//         this.catchList = [
//             // { ID:'F1', catchName:'香蕉',Icon:'img/b-catch/banana.png',Cent:50 },
//             { ID:'F2', catchName:'battery',Icon:'img-gym/battery.svg',Cent:10 },
//             { ID:'F3', catchName:'capsule',Icon:'img-gym/capsule.svg',Cent:20 },
//             { ID:'F4', catchName:'Wafer',Icon:'img-gym/Wafer.svg',Cent:50 }
            
//         ];
//         /*炸彈*/
//         this.BombList = [
//             { ID:'B1',BombName:'炸彈',Icon:'img-gym/bomb.svg',Life:9000 }
            
//         ];
//         /*關卡等级*/
//         this.LevelList = [
//             { Level:1,Cent:1000,Speed:500 }
//         ];
//         /*生成物品炸弹的全局引用*/
//         this.Buildercatch = null;
//         /*物品炸弹往下移动的全局引用*/
//         this.catchMove = null;
//         /*全局参数设置*/
//         this.Setting = $.extend({
//             //遊戲盒子
//             GameBox:$('div#game_box'),
//             //物品籃
//             robotBox:$('div#robotBox'),
//             //物品籃子移动像素
//             robotMoveWidth:30,
//             //物品籃寬度
//             robotBoxWidth:$('div#robotBox').width(),
//             //遊戲盒宽度
//             BoxWidth:$('div#game_box').width(),
//             //遊戲盒高度
//             BoxHeight:$('div#game_box').height(),
//             //物品寬度
//             catchWidth:60,
//             //當前總得分
//             CountCent:0,
//             //關卡级别
//             LevelNum:1,
//             //關卡卡级别-升级監聽变量
//             ListenerLevelNum:1,
//             //玩家总血量
//             LifeSize:1000,
//             //是否开始
//             Start:false
//         },args);
//     }

//     /**
//      * 遊戲等級對象,改寫只有一關
//      */
//     catchGame.prototype.GetLevelModel = function(level){
//         var levels = this.LevelList,
//             levelObj;
//         for(var i = 0, count = levels.length; i < count; i++){
//             levelObj = levels[i];
//             if(levelObj.Level == level)
//                 return levelObj;
//         }
//         return undefined;
//     }

//     /**
//      * 隨機獲得物品類型
//      */
//     catchGame.prototype.GetRandomcatch = function(){
//        var _this = this,
//            catchCount = 0,
//            catchIndex = 0,
//            catchList = _this.catchList.concat(_this.BombList);
//         catchCount = catchList.length;
//         catchIndex = parseInt(Math.random() * catchCount);
//         return catchList[catchIndex];
//     }

//     /**
//      * 監聽遊戲等級
//      */
//     catchGame.prototype.GameLevelListener = function(){
//         var _this = this,
//             countCent = _this.Setting.CountCent,
//             levelList = _this.LevelList,
//             levelObj;
//         for(var i = 0,count = levelList.length; i < count; i++){
//             levelObj = levelList[i];
//             if(levelObj.Cent >= countCent){
//                 if(levelObj.Level > _this.Setting.ListenerLevelNum){
//                     _this.Setting.ListenerLevelNum = levelObj.Level;
//                     _this.ShowUpgrade(levelObj.Level);
//                 }
//                 $('#gameLevel').text(levelObj.Level);
//                 _this.Setting.LevelNum = levelObj.Level;
//                 break;
//             }
//         }
//     }

//     /**
//      * @type 
//      * @position object { X:0,Y:0 }
//      */
//     catchGame.prototype.ShowTipBox = function(type,position){
//         var _this = this,
//             tipBoxID = Math.random().toString().replace('.',''),
//             tipBox = '<i id="'+ tipBoxID +'" class="tipbox '+ type +'" style=" left:' + position.X + 'px; top:' + position.Y + 'px;"></i>';
//         _this.Setting.GameBox.append(tipBox);
//         setTimeout(function(){
//             $('#' + tipBoxID).remove();
//         },300);
//     }

//     /**
//      * 升级提示框
//      * @level int 等级
//      */
//     // catchGame.prototype.ShowUpgrade = function(level){
//     //     var _this = this,
//     //         _tipBox = '<span class="upgrade_tip">第'+ level +'关,加油！</span>';
//     //     _this.Setting.GameBox.append(_tipBox);
//     //     setTimeout(function(){
//     //         $('span.upgrade_tip').remove();
//     //     },2000);
//     // }

//     /**
//      * 控制物品籃左右移動
//      */
//     catchGame.prototype.BindControlMove = function(){
//         var _this = this;
//         $(window).keydown(function(e){
//             var code = e.keyCode;
//             //左鍵
//             if(code == 37)
//                 _this.robotBoxMove('left');
//             //右鍵
//             if(code == 39)
//                 _this.robotBoxMove('right');

//         });
//     }

// // 手機模式
//     //  使用陀螺儀
//     if(window.screen.width<1024){
//         $('#gamestar p').text('請將手機或平板改成橫式，左右移動機器人接住物品,會依照物品分數轉換加成能力值!');
//         $('#gamestar .clear').css('display','none');
//         var mql = window.matchMedia('(orientation: portrait)');
//         console.log(mql);
//         //判斷手機是直式或橫式
//         function handleOrientationChange(mql) {
//             if(mql.matches) {
//             // 豎屏
//                 console.log('portrait'); 
//                 if(window.DeviceOrientationEvent) {
//                     console.log($('div#robotBox').width());
//                     $('div#robotBox').css({ left:window.screen.width+ $('div#robotBox').width()/2 });
//                     window.addEventListener('deviceorientation', function(event) {
//                         var gamma = event.gamma;

//                         $('div#robotBox').css({ left:(gamma*6+400) + 'px' });
                        
//                     }, false);
//                 }else{
//                     document.querySelector('body').innerHTML = '你的瀏覽器不支援喔';
//                 }
//             }else {
//              // 橫屏
//                 console.log('landscape');
//                 if(window.DeviceOrientationEvent) {
//                     console.log($('div#robotBox').width());
//                     $('div#robotBox').css({ left:window.screen.width+ $('div#robotBox').width()/2 });
//                     window.addEventListener('deviceorientation', function(event) {
//                         var beta = event.beta;

//                         $('div#robotBox').css({ left:(beta*10+400) + 'px' });
                        
//                     }, false);
//                 }else{
//                     document.querySelector('body').innerHTML = '你的瀏覽器不支援喔';
//                 }
//             }

//         }
// // 列印日誌
// handleOrientationChange(mql);
// // 監聽螢幕模式的變化
// mql.addListener(handleOrientationChange);


//     //手機橫式
//         function changeOrientation($print) {  
//             var width = document.documentElement.clientWidth;
//             var height =  document.documentElement.clientHeight;
//             if(width < height) {
//                 $print.width(height);
//                 $print.height(width);
//                 $print.css('top',  (height - width) / 2 );
//                 $print.css('left',  0 - (height - width) / 2 );
//                 $print.css('transform', 'rotate(90deg)');
//                 $print.css('transform-origin', '50% 50%');
//             } 
           
//             var evt = "onorientationchange" in window ? "orientationchange" : "resize";
                
//                 window.addEventListener(evt, function() {
          
//                 setTimeout(function() {
//                     var width = document.documentElement.clientWidth;
//                     var height =  document.documentElement.clientHeight;
//                     // 刷新城市的宽度
//                     initCityWidth();
//                     // 初始化每个气泡和自行车碰撞的距离
//                     cityCrashDistanceArr = initCityCrashDistance();
              
//                 //   if( width > height ){
//                 //       $print.width(width);
//                 //       $print.height(height);
//                 //       $print.css('top',  0 );
//                 //       $print.css('left',  0 );
//                 //       $print.css('transform' , 'none');
//                 //       $print.css('transform-origin' , '50% 50%');
//                 //    }
//                 //    else {
//                     $print.width(height);
//                       $print.height(width);
//                       $print.css('top',  (height-width)/2 );
//                       $print.css('left',  0-(height-width)/2 );
//                       $print.css('transform' , 'rotate(90deg)');
//                       $print.css('transform-origin' , '50% 50%');
//                 //    }
//               }, 300);  
//              }, false);
//             }
//     }






//     /**
//      * 物品籃位置
//      */
//     catchGame.prototype.robotBoxMove = function(action){
//         var _this = this,
//             setting = this.Setting,
//             left = setting.robotBox.position().left;
//         if(action == 'left'){
//             left = left - setting.robotMoveWidth;
//             if(left < -10) return;
//             $('div#robotBox').css({ left:left + 'px' });
//         }
//         if(action == 'right'){
//             if(left +10 >  setting.BoxWidth - setting.robotBoxWidth) return;
//             left = left + setting.robotMoveWidth;
//             $('div#robotBox').css({ left:left + 'px' });
//         }
//     }

//      catchGame.prototype.BuildercatchPosition = function(){
//         var setting = this.Setting,
//             left = parseInt(Math.random() * setting.BoxWidth);
//         return left > setting.BoxWidth - setting.catchWidth ? setting.BoxWidth - setting.catchWidth : left;
//     }

//     /**
//      * 控制物品下落
//      */
//     catchGame.prototype.catchDownMove = function(element){
//         var _this = this,
//              setting = this.Setting;
//         var move = setInterval(function(){
//             var $element = $(element),
//                  top = $element.position().top;
//             $element.css({ top:(top + setting.catchWidth) + 'px' });
//             _this.catchPutCount($element,move);
//         },this.GetLevelModel(setting.LevelNum).Speed /2 );
//         // 控制速度
//     }


 

//     /**
//      * 物品炸弹,血量减少
//      */
//     catchGame.prototype.catchBomb = function(life){
//         var _this = this,

//              $lifeBar = $('#lifeBar'),
//             lifeSize = $lifeBar.width();
//         lifeSize -= life;
//         if(lifeSize <= 0 ){
//     // 生命值小於零遊戲結束字樣

//             $lifeBar.animate({width:lifeSize + 'px'},100,function(){
//                 $('div.thing').remove();
//                 aa = parseInt(document.getElementById('gameCent').innerText);
//                 // 把文字轉成數值再來判斷
//                 // alert(aa);
//                 c = Math.round(aa/100) ;
//                  $("div#GameLogin").css("display" , 'block');
//                 $("div#GameLogin").append('<div class="game_over_tip">恭喜你得到積分<span class ="gamescore">'+document.getElementById('gameCent').innerText+'</span>分可加<span id="score">'+c+'</span>點能力值</div>');
//                 $("div#GameLogin").append('<div class="game_over_tip2">增加能力值</div>');
//                 $("div#GameLogin").append('<div class="game_over_tip3">我沒機器人</div>');
//                 $('#GameLogin .login').css("display" , 'block');
//                  $('#GameLogin .custom').css("display" , 'block');
//                  $("#gamescore").attr("value",aa);
//                  $("#gamestatus").attr("value",c);
//                 // $('div#robotBox').css("display" , 'none');
//                 clearInterval(myGameTime);
//                 num = "遊戲結束!";
//                 document.getElementById("divNum").innerHTML = num;
//             });
//             clearInterval(this.Buildercatch);
//             $(window).unbind('keydown');
//         }else{
//             $lifeBar.animate({width:lifeSize + 'px'},100,function(){
               
//                 $('div.thing').remove();
//                 aa = parseInt(document.getElementById('gameCent').innerText);
//                 // 把文字轉成數值再來判斷
//                 // alert(aa);
//                 c = Math.round(aa/100) ;
//                  $("div#GameLogin").css("display" , 'block');
//                  $("div#GameLogin").append('<div class="game_over_tip">恭喜你得到積分<span class ="gamescore">'+document.getElementById('gameCent').innerText+'</span>分可加<span id="score">'+c+'</span>點能力值</div>');
//                 $("div#GameLogin").append('<div class="game_over_tip2">增加能力值</div>');
//                 $("div#GameLogin").append('<div class="game_over_tip3">我沒機器人</div>');
//                 $('#GameLogin .login').css("display" , 'block');
//                  $('#GameLogin .custom ').css("display" , 'block');
//                  $("#gamescore").attr("value",aa);
//                 $("#gamestatus").attr("value",c);
//                 $(window).unbind('keydown');
//             });
//         }
//     }
//     /**
//      * 物品爆炸後,抖動畫面
//      */
//     catchGame.prototype.catchBombShock = function(){
//         var _this = this,
//             $gameBox = _this.Setting.GameBox.parent(),
//             x = $gameBox.position().left,
//             y = $gameBox.position().top,
//             shockWidth = 5,
//             shockHeight = 1,
//             shockCount = 0;
//         var shock = setInterval(function(){
//             if(shockCount >= 10){
//                 $gameBox.css({ left:x + 'px', top:y + 'px'});
//                 clearInterval(shock);
//                 return;
//             }
//             if(shockCount % 2 == 0)
//                 $gameBox.css({ left:x + shockWidth + 'px', top:y + shockHeight + 'px'});
//             else
//                 $gameBox.css({ left:x - shockWidth + 'px', top:y - shockHeight + 'px'});
//             shockCount++;
//         },20);
//     }

//     /**
//      * 計算籃子接到的物品
//      */
//     catchGame.prototype.catchPutCount = function(element,elementMove){
//         var _this = this,
//             setting = _this.Setting,
//             robotBoxLeft = setting.robotBox.position().left,
//             robotBoxTop = setting.robotBox.parent().position().top,
//             elTop = element.position().top + element.height()-150,
//             elLeft = element.position().left + element.width(),
//             catchCent = parseInt(element.attr('cent') || 0),
//             life = element.attr('life');
//         if(elLeft >= robotBoxLeft && elLeft - element.width() <= robotBoxLeft + setting.robotBoxWidth && elTop  >= robotBoxTop-150){
//             clearInterval(elementMove);
//             element.remove();

//             if(typeof life == 'undefined'){
//                 //console.log('A:' + life + ' - ' + (typeof life == 'undefined') + ' - ' + catchCent);
//                 setting.CountCent += catchCent;
//                 $('#gameCent').text(setting.CountCent);
                  
//                 // console.log($('#gameCent').text(setting.CountCent));
//                 _this.GameLevelListener();
//                 _this.ShowTipBox('catchCent',{ X:elLeft - setting.catchWidth, Y: elTop - 30 });

//                 let gameCent = document.getElementById('gameCent');

// let start = 0;
// let end =  setting.CountCent;
// let ticks = 5;
// let speed = 10;

// let randomNumbers = [end]

// for (let i = 0; i < ticks - 1; i++) {
//   randomNumbers.unshift(
//     Math.floor(Math.random() * (end - start + 1) + start)
//   );
// }

// randomNumbers.sort((a, b) => {return a - b});

// console.log(randomNumbers.length)

// let x = 0;
// let interval = setInterval(function () {
  
//    gameCent.innerHTML = randomNumbers.shift();

//    if (++x === ticks) {
//       window.clearInterval(interval);
//    }

// }, speed);
//             }
//             else{
//                 //console.log('B:' + life);
//                 _this.catchBomb(life);
//                 _this.ShowTipBox('bomb',{ X:elLeft - setting.catchWidth - 20, Y: elTop - 60 });
//                 _this.catchBombShock();
//             }
//         }else if(elTop - 60 > robotBoxTop){
//             clearInterval(elementMove);
//             element.remove();
//             _this.ShowTipBox('miss',{ X:elLeft - setting.catchWidth, Y: elTop - 60 });
//         }
//     }
        
//     /**
//      * 開始遊戲
//      */
//     catchGame.prototype.Start = function(){
//        // 倒數二十秒計時器 
//         var num = 20; 
       
//         myGameTime = setInterval( bye,1000);
//      function bye(){
//                 num--;  
//                  lifeSize =  num /20  * 100 ;
                 

//                  document.getElementById("lifeBar").style.width = lifeSize + "%";
//                 if (num <= 10) {
//                     document.getElementById("lifeBar").style.background = 'yellow';
//                 }if(num <= 3){
//                     document.getElementById("lifeBar").style.background = 'red';
//                 }
//                 if(num ==0 ){ 
               
//                 // $('div#robotBox').css("display" , 'none');
//             clearInterval( myGameTime );
//              num = "遊戲結束!";
//             // 到這邊取消計時器標號
//                 }
//         document.getElementById("divNum").innerHTML = num;
//         // 用innerHTML來更改數字
//          }
       
//         // 寫下一個數字 就會是10的-3次方,所以我們寫1000會等於一秒 
//         // 倒數三十秒計時器結束  
//         var _this = this,
//             setting = this.Setting;
//         // 遊戲部分
//         _this.BindControlMove();
//         _this.Buildercatch = setInterval(function(){
//             var domDiv = document.createElement('div'),
//                 catchObj = _this.GetRandomcatch();
//             domDiv.setAttribute('class','thing');
//             domDiv.setAttribute('idx',catchObj.ID);
//             if(catchObj.Life){
//                 domDiv.setAttribute('life',catchObj.Life);
//             }else{
//                 domDiv.setAttribute('cent',catchObj.Cent);
//             }
//             domDiv.setAttribute('style','left:' + _this.BuildercatchPosition() + 'px;');
//             domDiv.innerHTML = '<img src="'+ catchObj.Icon +'" width="30" height="30"/>';
//             setting.GameBox.append(domDiv);
//             _this.catchDownMove(domDiv);
//         },_this.GetLevelModel(setting.LevelNum).Speed);
//         // 這邊寫一個遊戲本身停止的計時器
//         // 30000毫秒過後執行吃到炸彈的function，這function是給生命life)
//         setTimeout(function() {
//         clearInterval(_this.Buildercatch);

//         console.log(catchGame.prototype.catchBomb(1000));
//         }, 20000);
        
//     };


//     /**
//      * 遊戲初始化
//      */
//     catchGame.prototype.Init = function(){
//         var _this = this;
//         //new catchGame().Start();
//     }
//     window.catchGame = function(){
//         return new catchGame();
//     }();
// })(window);
function rwd(){
    if ($(window).width() <1024) {
    //    document.getElementById('text').innerHTML='手機版';
        // 當視窗寬度小於767px時執行
        // (function(window,undefined){
            /**
             * 初始化遊戲
             */
            var catchGame = function(args){
                /*3種物品*/
                this.catchList = [
                    // { ID:'F1', catchName:'香蕉',Icon:'img/b-catch/banana.png',Cent:50 },
                    { ID:'F2', catchName:'battery',Icon:'img-gym/battery.svg',Cent:10 },
                    { ID:'F3', catchName:'capsule',Icon:'img-gym/capsule.svg',Cent:20 },
                    { ID:'F4', catchName:'Wafer',Icon:'img-gym/Wafer.svg',Cent:50 }
                    
                ];
                /*炸彈*/
                this.BombList = [
                    { ID:'B1',BombName:'炸彈',Icon:'img-gym/bomb.svg',Life:9000 }
                    
                ];
                /*關卡等级*/
                this.LevelList = [
                    { Level:1,Cent:1000,Speed:500 }
                ];
                /*生成物品炸弹的全局引用*/
                this.Buildercatch = null;
                /*物品炸弹往下移动的全局引用*/
                this.catchMove = null;
                /*全局参数设置*/
                this.Setting = $.extend({
                    //遊戲盒子
                    GameBox:$('div#game_box'),
                    //物品籃
                    robotBox:$('div#robotBox'),
                    //物品籃子移动像素
                    robotMoveWidth:30,
                    //物品籃寬度
                    robotBoxWidth:$('div#robotBox').width(),
                    //遊戲盒宽度
                    BoxWidth:$('div#game_box').width(),
                    //遊戲盒高度
                    BoxHeight:$('div#game_box').height(),
                    //物品寬度
                    catchWidth:60,
                    //當前總得分
                    CountCent:0,
                    //關卡级别
                    LevelNum:1,
                    //關卡卡级别-升级監聽变量
                    ListenerLevelNum:1,
                    //玩家总血量
                    LifeSize:1000,
                    //是否开始
                    Start:false
                },args);
            }
        
            /**
             * 遊戲等級對象,改寫只有一關
             */
            catchGame.prototype.GetLevelModel = function(level){
                var levels = this.LevelList,
                    levelObj;
                for(var i = 0, count = levels.length; i < count; i++){
                    levelObj = levels[i];
                    if(levelObj.Level == level)
                        return levelObj;
                }
                return undefined;
            }
        
            /**
             * 隨機獲得物品類型
             */
            catchGame.prototype.GetRandomcatch = function(){
               var _this = this,
                   catchCount = 0,
                   catchIndex = 0,
                   catchList = _this.catchList.concat(_this.BombList);
                catchCount = catchList.length;
                catchIndex = parseInt(Math.random() * catchCount);
                return catchList[catchIndex];
            }
        
            /**
             * 監聽遊戲等級
             */
            catchGame.prototype.GameLevelListener = function(){
                var _this = this,
                    countCent = _this.Setting.CountCent,
                    levelList = _this.LevelList,
                    levelObj;
                for(var i = 0,count = levelList.length; i < count; i++){
                    levelObj = levelList[i];
                    if(levelObj.Cent >= countCent){
                        if(levelObj.Level > _this.Setting.ListenerLevelNum){
                            _this.Setting.ListenerLevelNum = levelObj.Level;
                            _this.ShowUpgrade(levelObj.Level);
                        }
                        $('#gameLevel').text(levelObj.Level);
                        _this.Setting.LevelNum = levelObj.Level;
                        break;
                    }
                }
            }
        
            /**
             * @type 
             * @position object { X:0,Y:0 }
             */
            catchGame.prototype.ShowTipBox = function(type,position){
                var _this = this,
                    tipBoxID = Math.random().toString().replace('.',''),
                    tipBox = '<i id="'+ tipBoxID +'" class="tipbox '+ type +'" style=" left:' + position.X + 'px; top:' + position.Y + 'px;"></i>';
                _this.Setting.GameBox.append(tipBox);
                setTimeout(function(){
                    $('#' + tipBoxID).remove();
                },300);
            }
        
            /**
             * 升级提示框
             * @level int 等级
             */
            // catchGame.prototype.ShowUpgrade = function(level){
            //     var _this = this,
            //         _tipBox = '<span class="upgrade_tip">第'+ level +'关,加油！</span>';
            //     _this.Setting.GameBox.append(_tipBox);
            //     setTimeout(function(){
            //         $('span.upgrade_tip').remove();
            //     },2000);
            // }
        
            /**
             * 控制物品籃左右移動
             */
            catchGame.prototype.BindControlMove = function(){
                var _this = this;
                $(window).keydown(function(e){
                    var code = e.keyCode;
                    //左鍵
                    if(code == 37)
                        _this.robotBoxMove('left');
                    //右鍵
                    if(code == 39)
                        _this.robotBoxMove('right');
        
                });
            }
        
        // 手機模式
            //  使用陀螺儀
            if(window.screen.width<1024){
                $('#gamestar p').text('請將手機或平板改成橫式，左右移動機器人接住物品,會依照物品分數轉換加成能力值!');
                $('#gamestar .flex').css('display','none');
                var mql = window.matchMedia('(orientation: portrait)');
                console.log(mql);
                //判斷手機是直式或橫式
                function handleOrientationChange(mql) {
                    if(mql.matches) {
                    // 豎屏
                        console.log('portrait'); 
                        if(window.DeviceOrientationEvent) {
                            console.log($('div#robotBox').width());
                            $('div#robotBox').css({ left:window.screen.width+ $('div#robotBox').width()/2 });
                            window.addEventListener('deviceorientation', function(event) {
                                var gamma = event.gamma;
        
                                $('div#robotBox').css({ left:(gamma*6+400) + 'px' });
                                
                            }, false);
                        }else{
                            document.querySelector('body').innerHTML = '你的瀏覽器不支援喔';
                        }
                    }else {
                     // 橫屏
                        console.log('landscape');
                        if(window.DeviceOrientationEvent) {
                            console.log($('div#robotBox').width());
                            $('div#robotBox').css({ left:window.screen.width+ $('div#robotBox').width()/2 });
                            window.addEventListener('deviceorientation', function(event) {
                                var beta = event.beta;
        
                                $('div#robotBox').css({ left:(beta*10+400) + 'px' });
                                
                            }, false);
                        }else{
                            document.querySelector('body').innerHTML = '你的瀏覽器不支援喔';
                        }
                    }
        
                }
        // 列印日誌
        handleOrientationChange(mql);
        // 監聽螢幕模式的變化
        mql.addListener(handleOrientationChange);
        
        
            //手機橫式
                function changeOrientation($print) {  
                    var width = document.documentElement.clientWidth;
                    var height =  document.documentElement.clientHeight;
                    if(width < height) {
                        $print.width(height);
                        $print.height(width);
                        $print.css('top',  (height - width) / 2 );
                        $print.css('left',  0 - (height - width) / 2 );
                        $print.css('transform', 'rotate(90deg)');
                        $print.css('transform-origin', '50% 50%');
                    } 
                   
                    var evt = "onorientationchange" in window ? "orientationchange" : "resize";
                        
                        window.addEventListener(evt, function() {
                  
                        setTimeout(function() {
                            var width = document.documentElement.clientWidth;
                            var height =  document.documentElement.clientHeight;
                            // 刷新城市的宽度
                            initCityWidth();
                            // 初始化每个气泡和自行车碰撞的距离
                            cityCrashDistanceArr = initCityCrashDistance();
                      
                        //   if( width > height ){
                        //       $print.width(width);
                        //       $print.height(height);
                        //       $print.css('top',  0 );
                        //       $print.css('left',  0 );
                        //       $print.css('transform' , 'none');
                        //       $print.css('transform-origin' , '50% 50%');
                        //    }
                        //    else {
                            $print.width(height);
                              $print.height(width);
                              $print.css('top',  (height-width)/2 );
                              $print.css('left',  0-(height-width)/2 );
                              $print.css('transform' , 'rotate(90deg)');
                              $print.css('transform-origin' , '50% 50%');
                        //    }
                      }, 300);  
                     }, false);
                    }
            }
        
        
        
        
        
        
            /**
             * 物品籃位置
             */
            catchGame.prototype.robotBoxMove = function(action){
                var _this = this,
                    setting = this.Setting,
                    left = setting.robotBox.position().left;
                if(action == 'left'){
                    left = left - setting.robotMoveWidth;
                    if(left < -10) return;
                    $('div#robotBox').css({ left:left + 'px' });
                }
                if(action == 'right'){
                    if(left +10 >  setting.BoxWidth - setting.robotBoxWidth) return;
                    left = left + setting.robotMoveWidth;
                    $('div#robotBox').css({ left:left + 'px' });
                }
            }
        
             catchGame.prototype.BuildercatchPosition = function(){
                var setting = this.Setting,
                    left = parseInt(Math.random() * setting.BoxWidth);
                return left > setting.BoxWidth - setting.catchWidth ? setting.BoxWidth - setting.catchWidth : left;
            }
        
            /**
             * 控制物品下落
             */
            catchGame.prototype.catchDownMove = function(element){
                var _this = this,
                     setting = this.Setting;
                var move = setInterval(function(){
                    var $element = $(element),
                         top = $element.position().top;
                    $element.css({ top:(top + setting.catchWidth) + 'px' });
                    _this.catchPutCount($element,move);
                },this.GetLevelModel(setting.LevelNum).Speed /2 );
                // 控制速度
            }
        
        
         
        
            /**
             * 物品炸弹,血量减少
             */
            catchGame.prototype.catchBomb = function(life){
                var _this = this,
        
                     $lifeBar = $('#lifeBar'),
                    lifeSize = $lifeBar.width();
                lifeSize -= life;
                if(lifeSize <= 0 ){
            // 生命值小於零遊戲結束字樣
        
                    $lifeBar.animate({width:lifeSize + 'px'},100,function(){
                        $('div.thing').remove();
                        aa = parseInt(document.getElementById('gameCent').innerText);
                        // 把文字轉成數值再來判斷
                        // alert(aa);
                        c = Math.round(aa/25) ;
                         $("div#GameLogin").css("display" , 'block');
                        $("div#GameLogin").append('<div class="game_over_tip">恭喜你得到積分<span class ="gamescore">'+document.getElementById('gameCent').innerText+'</span>分可加<span id="score">'+c+'</span>點能力值</div>');
                        $("div#GameLogin").append('<div class="game_over_tip2">增加能力值</div>');
                        $("div#GameLogin").append('<div class="game_over_tip3">我沒機器人</div>');
                        $('#GameLogin .login').css("display" , 'block');
                         $('#GameLogin .custom').css("display" , 'block');
                         $("#gamescore").attr("value",aa);
                         $("#gamestatus").attr("value",c);
                        // $('div#robotBox').css("display" , 'none');
                        clearInterval(myGameTime);
                        num = "遊戲結束!";
                        document.getElementById("divNum").innerHTML = num;
                    });
                    clearInterval(this.Buildercatch);
                    $(window).unbind('keydown');
                }else{
                    $lifeBar.animate({width:lifeSize + 'px'},100,function(){
                       
                        $('div.thing').remove();
                        aa = parseInt(document.getElementById('gameCent').innerText);
                        // 把文字轉成數值再來判斷
                        // alert(aa);
                        c = Math.round(aa/25) ;
                         $("div#GameLogin").css("display" , 'block');
                         $("div#GameLogin").append('<div class="game_over_tip">恭喜你得到積分<span class ="gamescore">'+document.getElementById('gameCent').innerText+'</span>分可加<span id="score">'+c+'</span>點能力值</div>');
                        $("div#GameLogin").append('<div class="game_over_tip2">增加能力值</div>');
                        $("div#GameLogin").append('<div class="game_over_tip3">我沒機器人</div>');
                        $('#GameLogin .login').css("display" , 'block');
                         $('#GameLogin .custom ').css("display" , 'block');
                         $("#gamescore").attr("value",aa);
                        $("#gamestatus").attr("value",c);
                        $(window).unbind('keydown');
                    });
                }
            }
            /**
             * 物品爆炸後,抖動畫面
             */
            catchGame.prototype.catchBombShock = function(){
                var _this = this,
                    $gameBox = _this.Setting.GameBox.parent(),
                    x = $gameBox.position().left,
                    y = $gameBox.position().top,
                    shockWidth = 5,
                    shockHeight = 1,
                    shockCount = 0;
                var shock = setInterval(function(){
                    if(shockCount >= 10){
                        $gameBox.css({ left:x + 'px', top:y + 'px'});
                        clearInterval(shock);
                        return;
                    }
                    if(shockCount % 2 == 0)
                        $gameBox.css({ left:x + shockWidth + 'px', top:y + shockHeight + 'px'});
                    else
                        $gameBox.css({ left:x - shockWidth + 'px', top:y - shockHeight + 'px'});
                    shockCount++;
                },20);
            }
        
            /**
             * 計算籃子接到的物品
             */
            catchGame.prototype.catchPutCount = function(element,elementMove){
                var _this = this,
                    setting = _this.Setting,
                    robotBoxLeft = setting.robotBox.position().left,
                    robotBoxTop = setting.robotBox.parent().position().top,
                    elTop = element.position().top + element.height()-200,
                    elLeft = element.position().left + element.width(),
                    catchCent = parseInt(element.attr('cent') || 0),
                    life = element.attr('life');
                if(elLeft >= robotBoxLeft && elLeft - element.width() <= robotBoxLeft + setting.robotBoxWidth && elTop  >= robotBoxTop-200){
                    clearInterval(elementMove);
                    element.remove();
        
                    if(typeof life == 'undefined'){
                        //console.log('A:' + life + ' - ' + (typeof life == 'undefined') + ' - ' + catchCent);
                        setting.CountCent += catchCent;
                        $('#gameCent').text(setting.CountCent);
                          
                        // console.log($('#gameCent').text(setting.CountCent));
                        _this.GameLevelListener();
                        _this.ShowTipBox('catchCent',{ X:elLeft - setting.catchWidth, Y: elTop  });
        
                        let gameCent = document.getElementById('gameCent');
        
        let start = 0;
        let end =  setting.CountCent;
        let ticks = 5;
        let speed = 10;
        
        let randomNumbers = [end]
        
        for (let i = 0; i < ticks - 1; i++) {
          randomNumbers.unshift(
            Math.floor(Math.random() * (end - start + 1) + start)
          );
        }
        
        randomNumbers.sort((a, b) => {return a - b});
        
        console.log(randomNumbers.length)
        
        let x = 0;
        let interval = setInterval(function () {
          
           gameCent.innerHTML = randomNumbers.shift();
        
           if (++x === ticks) {
              window.clearInterval(interval);
           }
        
        }, speed);
                    }
                    else{
                        //console.log('B:' + life);
                        _this.catchBomb(life);
                        _this.ShowTipBox('bomb',{ X:elLeft - setting.catchWidth - 20, Y: elTop  });
                        _this.catchBombShock();
                    }
                }else if(elTop  > robotBoxTop){
                    clearInterval(elementMove);
                    element.remove();
                    _this.ShowTipBox('miss',{ X:elLeft - setting.catchWidth, Y: elTop  });
                }
            }
                
            /**
             * 開始遊戲
             */
            catchGame.prototype.Start = function(){
               // 倒數二十秒計時器 
                var num = 20; 
               
                myGameTime = setInterval( bye,1000);
             function bye(){
                        num--;  
                         lifeSize =  num /20  * 100 ;
                         
        
                         document.getElementById("lifeBar").style.width = lifeSize + "%";
                        if (num <= 10) {
                            document.getElementById("lifeBar").style.background = 'yellow';
                        }if(num <= 3){
                            document.getElementById("lifeBar").style.background = 'red';
                        }
                        if(num ==0 ){ 
                       
                        // $('div#robotBox').css("display" , 'none');
                    clearInterval( myGameTime );
                     num = "遊戲結束!";
                    // 到這邊取消計時器標號
                        }
                document.getElementById("divNum").innerHTML = num;
                // 用innerHTML來更改數字
                 }
               
                // 寫下一個數字 就會是10的-3次方,所以我們寫1000會等於一秒 
                // 倒數三十秒計時器結束  
                var _this = this,
                    setting = this.Setting;
                // 遊戲部分
                _this.BindControlMove();
                _this.Buildercatch = setInterval(function(){
                    var domDiv = document.createElement('div'),
                        catchObj = _this.GetRandomcatch();
                    domDiv.setAttribute('class','thing');
                    domDiv.setAttribute('idx',catchObj.ID);
                    if(catchObj.Life){
                        domDiv.setAttribute('life',catchObj.Life);
                    }else{
                        domDiv.setAttribute('cent',catchObj.Cent);
                    }
                    domDiv.setAttribute('style','left:' + _this.BuildercatchPosition() + 'px;');
                    domDiv.innerHTML = '<img src="'+ catchObj.Icon +'" width="30" height="30"/>';
                    setting.GameBox.append(domDiv);
                    _this.catchDownMove(domDiv);
                },_this.GetLevelModel(setting.LevelNum).Speed);
                // 這邊寫一個遊戲本身停止的計時器
                // 30000毫秒過後執行吃到炸彈的function，這function是給生命life)
                setTimeout(function() {
                clearInterval(_this.Buildercatch);
        
                console.log(catchGame.prototype.catchBomb(1000));
                }, 20000);
                
            };
        
        
            /**
             * 遊戲初始化
             */
            catchGame.prototype.Init = function(){
                var _this = this;
                //new catchGame().Start();
            }
            window.catchGame = function(){
                return new catchGame();
            }();
        // })(window);
    } else {
        // document.getElementById('text').innerHTML='桌機版';
        // 當視窗寬度不小於767px時執行
        // (function(window,undefined){
            /**
             * 初始化遊戲
             */
            var catchGame = function(args){
                /*3種物品*/
                this.catchList = [
                    // { ID:'F1', catchName:'香蕉',Icon:'img/b-catch/banana.png',Cent:50 },
                    { ID:'F2', catchName:'battery',Icon:'img-gym/battery.svg',Cent:10 },
                    { ID:'F3', catchName:'capsule',Icon:'img-gym/capsule.svg',Cent:20 },
                    { ID:'F4', catchName:'Wafer',Icon:'img-gym/Wafer.svg',Cent:50 }
                    
                ];
                /*炸彈*/
                this.BombList = [
                    { ID:'B1',BombName:'炸彈',Icon:'img-gym/bomb.svg',Life:9000 }
                    
                ];
                /*關卡等级*/
                this.LevelList = [
                    { Level:1,Cent:1000,Speed:500 }
                ];
                /*生成物品炸弹的全局引用*/
                this.Buildercatch = null;
                /*物品炸弹往下移动的全局引用*/
                this.catchMove = null;
                /*全局参数设置*/
                this.Setting = $.extend({
                    //遊戲盒子
                    GameBox:$('div#game_box'),
                    //物品籃
                    robotBox:$('div#robotBox'),
                    //物品籃子移动像素
                    robotMoveWidth:30,
                    //物品籃寬度
                    robotBoxWidth:$('div#robotBox').width(),
                    //遊戲盒宽度
                    BoxWidth:$('div#game_box').width(),
                    //遊戲盒高度
                    BoxHeight:$('div#game_box').height(),
                    //物品寬度
                    catchWidth:60,
                    //當前總得分
                    CountCent:0,
                    //關卡级别
                    LevelNum:1,
                    //關卡卡级别-升级監聽变量
                    ListenerLevelNum:1,
                    //玩家总血量
                    LifeSize:1000,
                    //是否开始
                    Start:false
                },args);
            }
        
            /**
             * 遊戲等級對象,改寫只有一關
             */
            catchGame.prototype.GetLevelModel = function(level){
                var levels = this.LevelList,
                    levelObj;
                for(var i = 0, count = levels.length; i < count; i++){
                    levelObj = levels[i];
                    if(levelObj.Level == level)
                        return levelObj;
                }
                return undefined;
            }
        
            /**
             * 隨機獲得物品類型
             */
            catchGame.prototype.GetRandomcatch = function(){
               var _this = this,
                   catchCount = 0,
                   catchIndex = 0,
                   catchList = _this.catchList.concat(_this.BombList);
                catchCount = catchList.length;
                catchIndex = parseInt(Math.random() * catchCount);
                return catchList[catchIndex];
            }
        
            /**
             * 監聽遊戲等級
             */
            catchGame.prototype.GameLevelListener = function(){
                var _this = this,
                    countCent = _this.Setting.CountCent,
                    levelList = _this.LevelList,
                    levelObj;
                for(var i = 0,count = levelList.length; i < count; i++){
                    levelObj = levelList[i];
                    if(levelObj.Cent >= countCent){
                        if(levelObj.Level > _this.Setting.ListenerLevelNum){
                            _this.Setting.ListenerLevelNum = levelObj.Level;
                            _this.ShowUpgrade(levelObj.Level);
                        }
                        $('#gameLevel').text(levelObj.Level);
                        _this.Setting.LevelNum = levelObj.Level;
                        break;
                    }
                }
            }
        
            /**
             * @type 
             * @position object { X:0,Y:0 }
             */
            catchGame.prototype.ShowTipBox = function(type,position){
                var _this = this,
                    tipBoxID = Math.random().toString().replace('.',''),
                    tipBox = '<i id="'+ tipBoxID +'" class="tipbox '+ type +'" style=" left:' + position.X + 'px; top:' + position.Y + 'px;"></i>';
                _this.Setting.GameBox.append(tipBox);
                setTimeout(function(){
                    $('#' + tipBoxID).remove();
                },300);
            }
        
            /**
             * 升级提示框
             * @level int 等级
             */
            // catchGame.prototype.ShowUpgrade = function(level){
            //     var _this = this,
            //         _tipBox = '<span class="upgrade_tip">第'+ level +'关,加油！</span>';
            //     _this.Setting.GameBox.append(_tipBox);
            //     setTimeout(function(){
            //         $('span.upgrade_tip').remove();
            //     },2000);
            // }
        
            /**
             * 控制物品籃左右移動
             */
            catchGame.prototype.BindControlMove = function(){
                var _this = this;
                $(window).keydown(function(e){
                    var code = e.keyCode;
                    //左鍵
                    if(code == 37)
                        _this.robotBoxMove('left');
                    //右鍵
                    if(code == 39)
                        _this.robotBoxMove('right');
        
                });
            }
        
        // 手機模式
            //  使用陀螺儀
            if(window.screen.width<1024){
                $('#gamestar p').text('請將手機或平板改成橫式，左右移動機器人接住物品,會依照物品分數轉換加成能力值!');
                $('#gamestar .list').css('display','none');
                var mql = window.matchMedia('(orientation: portrait)');
                console.log(mql);
                //判斷手機是直式或橫式
                function handleOrientationChange(mql) {
                    if(mql.matches) {
                    // 豎屏
                        console.log('portrait'); 
                        if(window.DeviceOrientationEvent) {
                            console.log($('div#robotBox').width());
                            $('div#robotBox').css({ left:window.screen.width+ $('div#robotBox').width()/2 });
                            window.addEventListener('deviceorientation', function(event) {
                                var gamma = event.gamma;
        
                                $('div#robotBox').css({ left:(gamma*6+400) + 'px' });
                                
                            }, false);
                        }else{
                            document.querySelector('body').innerHTML = '你的瀏覽器不支援喔';
                        }
                    }else {
                     // 橫屏
                        console.log('landscape');
                        if(window.DeviceOrientationEvent) {
                            console.log($('div#robotBox').width());
                            $('div#robotBox').css({ left:window.screen.width+ $('div#robotBox').width()/2 });
                            window.addEventListener('deviceorientation', function(event) {
                                var beta = event.beta;
        
                                $('div#robotBox').css({ left:(beta*10+400) + 'px' });
                                
                            }, false);
                        }else{
                            document.querySelector('body').innerHTML = '你的瀏覽器不支援喔';
                        }
                    }
        
                }
        // 列印日誌
        handleOrientationChange(mql);
        // 監聽螢幕模式的變化
        mql.addListener(handleOrientationChange);
        
        
            //手機橫式
                function changeOrientation($print) {  
                    var width = document.documentElement.clientWidth;
                    var height =  document.documentElement.clientHeight;
                    if(width < height) {
                        $print.width(height);
                        $print.height(width);
                        $print.css('top',  (height - width) / 2 );
                        $print.css('left',  0 - (height - width) / 2 );
                        $print.css('transform', 'rotate(90deg)');
                        $print.css('transform-origin', '50% 50%');
                    } 
                   
                    var evt = "onorientationchange" in window ? "orientationchange" : "resize";
                        
                        window.addEventListener(evt, function() {
                  
                        setTimeout(function() {
                            var width = document.documentElement.clientWidth;
                            var height =  document.documentElement.clientHeight;
                            // 刷新城市的宽度
                            initCityWidth();
                            // 初始化每个气泡和自行车碰撞的距离
                            cityCrashDistanceArr = initCityCrashDistance();
                      
                        //   if( width > height ){
                        //       $print.width(width);
                        //       $print.height(height);
                        //       $print.css('top',  0 );
                        //       $print.css('left',  0 );
                        //       $print.css('transform' , 'none');
                        //       $print.css('transform-origin' , '50% 50%');
                        //    }
                        //    else {
                            $print.width(height);
                              $print.height(width);
                              $print.css('top',  (height-width)/2 );
                              $print.css('left',  0-(height-width)/2 );
                              $print.css('transform' , 'rotate(90deg)');
                              $print.css('transform-origin' , '50% 50%');
                        //    }
                      }, 300);  
                     }, false);
                    }
            }
        
        
        
        
        
        
            /**
             * 物品籃位置
             */
            catchGame.prototype.robotBoxMove = function(action){
                var _this = this,
                    setting = this.Setting,
                    left = setting.robotBox.position().left;
                if(action == 'left'){
                    left = left - setting.robotMoveWidth;
                    if(left < -10) return;
                    $('div#robotBox').css({ left:left + 'px' });
                }
                if(action == 'right'){
                    if(left +10 >  setting.BoxWidth - setting.robotBoxWidth) return;
                    left = left + setting.robotMoveWidth;
                    $('div#robotBox').css({ left:left + 'px' });
                }
            }
        
             catchGame.prototype.BuildercatchPosition = function(){
                var setting = this.Setting,
                    left = parseInt(Math.random() * setting.BoxWidth);
                return left > setting.BoxWidth - setting.catchWidth ? setting.BoxWidth - setting.catchWidth : left;
            }
        
            /**
             * 控制物品下落
             */
            catchGame.prototype.catchDownMove = function(element){
                var _this = this,
                     setting = this.Setting;
                var move = setInterval(function(){
                    var $element = $(element),
                         top = $element.position().top;
                    $element.css({ top:(top + setting.catchWidth) + 'px' });
                    _this.catchPutCount($element,move);
                },this.GetLevelModel(setting.LevelNum).Speed /2 );
                // 控制速度
            }
        
        
         
        
            /**
             * 物品炸弹,血量减少
             */
            catchGame.prototype.catchBomb = function(life){
                var _this = this,
        
                     $lifeBar = $('#lifeBar'),
                    lifeSize = $lifeBar.width();
                lifeSize -= life;
                if(lifeSize <= 0 ){
            // 生命值小於零遊戲結束字樣
        
                    $lifeBar.animate({width:lifeSize + 'px'},100,function(){
                        $('div.thing').remove();
                        aa = parseInt(document.getElementById('gameCent').innerText);
                        // 把文字轉成數值再來判斷
                        // alert(aa);
                        c = Math.round(aa/25) ;
                         $("div#GameLogin").css("display" , 'block');
                        $("div#GameLogin").append('<div class="game_over_tip">恭喜你得到積分<span class ="gamescore">'+document.getElementById('gameCent').innerText+'</span>分可加<span id="score">'+c+'</span>點能力值</div>');
                        $("div#GameLogin").append('<div class="game_over_tip2">增加能力值</div>');
                        $("div#GameLogin").append('<div class="game_over_tip3">我沒機器人</div>');
                        $('#GameLogin .login').css("display" , 'block');
                         $('#GameLogin .custom').css("display" , 'block');
                         $("#gamescore").attr("value",aa);
                         $("#gamestatus").attr("value",c);
                        // $('div#robotBox').css("display" , 'none');
                        clearInterval(myGameTime);
                        num = "遊戲結束!";
                        document.getElementById("divNum").innerHTML = num;
                    });
                    clearInterval(this.Buildercatch);
                    $(window).unbind('keydown');
                }else{
                    $lifeBar.animate({width:lifeSize + 'px'},100,function(){
                       
                        $('div.thing').remove();
                        aa = parseInt(document.getElementById('gameCent').innerText);
                        // 把文字轉成數值再來判斷
                        // alert(aa);
                        c = Math.round(aa/25) ;
                         $("div#GameLogin").css("display" , 'block');
                         $("div#GameLogin").append('<div class="game_over_tip">恭喜你得到積分<span class ="gamescore">'+document.getElementById('gameCent').innerText+'</span>分可加<span id="score">'+c+'</span>點能力值</div>');
                        $("div#GameLogin").append('<div class="game_over_tip2">增加能力值</div>');
                        $("div#GameLogin").append('<div class="game_over_tip3">我沒機器人</div>');
                        $('#GameLogin .login').css("display" , 'block');
                         $('#GameLogin .custom ').css("display" , 'block');
                         $("#gamescore").attr("value",aa);
                        $("#gamestatus").attr("value",c);
                        $(window).unbind('keydown');
                    });
                }
            }
            /**
             * 物品爆炸後,抖動畫面
             */
            catchGame.prototype.catchBombShock = function(){
                var _this = this,
                    $gameBox = _this.Setting.GameBox.parent(),
                    x = $gameBox.position().left,
                    y = $gameBox.position().top,
                    shockWidth = 5,
                    shockHeight = 1,
                    shockCount = 0;
                var shock = setInterval(function(){
                    if(shockCount >= 10){
                        $gameBox.css({ left:x + 'px', top:y + 'px'});
                        clearInterval(shock);
                        return;
                    }
                    if(shockCount % 2 == 0)
                        $gameBox.css({ left:x + shockWidth + 'px', top:y + shockHeight + 'px'});
                    else
                        $gameBox.css({ left:x - shockWidth + 'px', top:y - shockHeight + 'px'});
                    shockCount++;
                },20);
            }
        
            /**
             * 計算籃子接到的物品
             */
            catchGame.prototype.catchPutCount = function(element,elementMove){
                var _this = this,
                    setting = _this.Setting,
                    robotBoxLeft = setting.robotBox.position().left,
                    robotBoxTop = setting.robotBox.parent().position().top,
                    elTop = element.position().top + element.height()-150,
                    elLeft = element.position().left + element.width(),
                    catchCent = parseInt(element.attr('cent') || 0),
                    life = element.attr('life');
                if(elLeft >= robotBoxLeft && elLeft - element.width() <= robotBoxLeft + setting.robotBoxWidth && elTop  >= robotBoxTop-150){
                    clearInterval(elementMove);
                    element.remove();
        
                    if(typeof life == 'undefined'){
                        //console.log('A:' + life + ' - ' + (typeof life == 'undefined') + ' - ' + catchCent);
                        setting.CountCent += catchCent;
                        $('#gameCent').text(setting.CountCent);
                          
                        // console.log($('#gameCent').text(setting.CountCent));
                        _this.GameLevelListener();
                        _this.ShowTipBox('catchCent',{ X:elLeft - setting.catchWidth, Y: elTop - 30 });
        
                        let gameCent = document.getElementById('gameCent');
        
        let start = 0;
        let end =  setting.CountCent;
        let ticks = 5;
        let speed = 10;
        
        let randomNumbers = [end]
        
        for (let i = 0; i < ticks - 1; i++) {
          randomNumbers.unshift(
            Math.floor(Math.random() * (end - start + 1) + start)
          );
        }
        
        randomNumbers.sort((a, b) => {return a - b});
        
        console.log(randomNumbers.length)
        
        let x = 0;
        let interval = setInterval(function () {
          
           gameCent.innerHTML = randomNumbers.shift();
        
           if (++x === ticks) {
              window.clearInterval(interval);
           }
        
        }, speed);
                    }
                    else{
                        //console.log('B:' + life);
                        _this.catchBomb(life);
                        _this.ShowTipBox('bomb',{ X:elLeft - setting.catchWidth - 20, Y: elTop - 60 });
                        _this.catchBombShock();
                    }
                }else if(elTop - 60 > robotBoxTop){
                    clearInterval(elementMove);
                    element.remove();
                    _this.ShowTipBox('miss',{ X:elLeft - setting.catchWidth, Y: elTop - 60 });
                }
            }
                
            /**
             * 開始遊戲
             */
            catchGame.prototype.Start = function(){
               // 倒數二十秒計時器 
                var num = 20; 
               
                myGameTime = setInterval( bye,1000);
             function bye(){
                        num--;  
                         lifeSize =  num /20  * 100 ;
                         
        
                         document.getElementById("lifeBar").style.width = lifeSize + "%";
                        if (num <= 10) {
                            document.getElementById("lifeBar").style.background = 'yellow';
                        }if(num <= 3){
                            document.getElementById("lifeBar").style.background = 'red';
                        }
                        if(num ==0 ){ 
                       
                        // $('div#robotBox').css("display" , 'none');
                    clearInterval( myGameTime );
                     num = "遊戲結束!";
                    // 到這邊取消計時器標號
                        }
                document.getElementById("divNum").innerHTML = num;
                // 用innerHTML來更改數字
                 }
               
                // 寫下一個數字 就會是10的-3次方,所以我們寫1000會等於一秒 
                // 倒數三十秒計時器結束  
                var _this = this,
                    setting = this.Setting;
                // 遊戲部分
                _this.BindControlMove();
                _this.Buildercatch = setInterval(function(){
                    var domDiv = document.createElement('div'),
                        catchObj = _this.GetRandomcatch();
                    domDiv.setAttribute('class','thing');
                    domDiv.setAttribute('idx',catchObj.ID);
                    if(catchObj.Life){
                        domDiv.setAttribute('life',catchObj.Life);
                    }else{
                        domDiv.setAttribute('cent',catchObj.Cent);
                    }
                    domDiv.setAttribute('style','left:' + _this.BuildercatchPosition() + 'px;');
                    domDiv.innerHTML = '<img src="'+ catchObj.Icon +'" width="30" height="30"/>';
                    setting.GameBox.append(domDiv);
                    _this.catchDownMove(domDiv);
                },_this.GetLevelModel(setting.LevelNum).Speed);
                // 這邊寫一個遊戲本身停止的計時器
                // 30000毫秒過後執行吃到炸彈的function，這function是給生命life)
                setTimeout(function() {
                clearInterval(_this.Buildercatch);
        
                console.log(catchGame.prototype.catchBomb(1000));
                }, 20000);
                
            };
        
        
            /**
             * 遊戲初始化
             */
            catchGame.prototype.Init = function(){
                var _this = this;
                //new catchGame().Start();
            }
            window.catchGame = function(){
                return new catchGame();
            }();
        // })(window);
    }
}
//當畫面有變動時會驅動
$(window).resize(function() {
    rwd();
});
$(window).ready(function() {
    rwd();
});