
TweenMax.from('.nametextbox', 2, {
    y: -100,
    opacity: 0
})


var tis = new TimelineMax({
    repeat: -1,
    yoyo: false,
    repeatDelay: 3
});
tis.to('.textbox', 2, {
    text: "請為你的機器人命名",
    ease:  SteppedEase.config(12),
    delay: 2
});


var ch='';   //宣告功能
var mybox="mybox"; //宣告機器人身體的圖層
var hairimg="images/CustomMade/hair/White.png"; //宣告髮型圖片
var robotimg="";   //宣告機器人圖片
var clothes=['Firemenclothes.png','Programmerclothes.png','nurseclothes.png','artistclothes.png']; //宣告機器人衣服陣列
var body=['Firemenbody.png','Programmerbody.png','nursebody.png','artistbody.png'];  //宣告機器人不同功能身體陣列
var white=['FiremenWhite.png','ProgrammerWhite.png','nurseWhite.png','artistWhite.png'];  //宣告機器人不同功能身體陣列
var myboximage='images/CustomMade/robot/robotbody.png';  //宣告初始機器人  
var whiteimage='images/CustomMade/robot/robotWhite.png';
var _colorR = 255;  // 宣告顏色
var _colorG = 255;  
var _colorB = 255;

// 雷達圖
function radar(ch){
//定義變數
var chartRadarDOM;
var chartRadarData;
var chartRadarOptions;
var rbtVIT=$('#rbtVIT'+ch).text();
    var rbtNT=$('#rbtNT'+ch).text();
    var rbtAGI=$('#rbtAGI'+ch).text();
    //載入雷達圖
Chart.defaults.global.legend.display = false;
Chart.defaults.global.defaultFontColor = 'rgba(255,255,255,.9)';
chartRadarDOM = document.getElementById("chartRadar");
chartRadarData;
chartRadarOptions = 
{
    scale: 
    {
        ticks: 
        {
            fontSize:0,
            fontColor:"rgba(0,0,0,.3)",
            stepSize:5,
            min:0,
            max:20
        },
        pointLabels: 
        {
            fontFamily: 'Noto Sans TC',
            fontSize: 16,
            color: '#000000'
        },
        gridLines: 
        {
            color: '#ffffff'
        }
    }
};
console.log("---------Rader Data--------");
var graphData =new Array();
graphData.push(rbtNT);
graphData.push(rbtVIT);
graphData.push(rbtAGI);
console.log("--------Rader Create-------------");
console.log(graphData);
    
//CreateData
chartRadarData = {
        labels: ['智力', '體力', '敏捷'],
    datasets: [{
            label: "Skill Level",
        backgroundColor: "rgba(123, 229, 255,.5)",
        borderColor: "rgba(123, 229, 255,.9)",
        pointBackgroundColor: "rgba(63,63,74,.1)",
            pointBorderColor: "rgba(0,0,0,0)",
        pointHoverBackgroundColor: "#fdf",
        pointHoverBorderColor: "rgba(0,0,0,0.3)",
        pointBorderWidth:5,
        data: graphData}]
};
//Draw
var chartRadar = new Chart(chartRadarDOM, {
    type: 'radar',
    data: chartRadarData,
    options: chartRadarOptions
});
}// 雷達圖結束


// 判斷RWD
function rwd(){
    if ($(window).width() < 767) {
   //    document.getElementById('text').innerHTML='手機版';
        // 當視窗寬度小於767px時執行
        // 判斷有無輸入姓名
        $('#robotname').focus(function(){
            tis.kill();
            $('.textbox').text(
                '請為你的機器人命名'
            )
            $('.textbox').css({
                'transition':'1s',
                'top':'-15px',
                'font-size':'14px',
            })
        })
 
        $('#myCanvas1').attr("width","270");
        $('#myCanvas1').attr("height","450");
        $('#myCanvas').attr("width","500");
        $('#myCanvas').attr("height","600");

        $('#myCanvas').addLayer({
            type: 'image',
            layer: true,
                name: 'mybox',
                index: 1,
                source: myboximage,
                x: 250, y:300,scaleX:1, scaleY:1,
                // load: invert
            })
            $('#myCanvas').addLayer({
                type: 'image',
                layer: true,
                name: 'mybox1',
                index: 0,
                source: whiteimage,
                x: 250, y:300,scaleX:1, scaleY:1,
                // load: invert
            })
            $('#myCanvas').addLayer({
                type: 'image',
                layer: true,
                name: 'hair',
                index: 2,
                // source: hairimg,
                x: 250, y:125,scaleX: 1.12, scaleY: 1.12,})   
        // var hairimg=document.querySelectorAll(".hairimg");
            
        //手機板機器人

        $('#myCanvas1').addLayer({
            type: 'image',
            layer: true,
                name: 'mybox',
                index: 0,
                source: myboximage,
                x: 135, y: 225,scaleX: 0.7, scaleY:0.7, 
            });
            $('#myCanvas1').addLayer({
                type: 'image',
                layer: true,
                name: 'mybox1',
                index: 0,
                source: whiteimage,
                x: 135, y: 225,scaleX: 0.7, scaleY:0.7,
            })
            $('#myCanvas1').addLayer({
                type: 'image',
              layer: true,
                name: 'hair',
                index:2,
                x: 130, y: 105,scaleX: 0.7, scaleY:0.7,
            })
            $('#myCanvas').drawLayers();
            $('#myCanvas1').drawLayers();

        // 點擊頭髮
        $(".hairimg").on("click",function(){
            $('#myCanvas1').removeLayer('hair').drawLayers();
            $('#myCanvas').removeLayer('hair').drawLayers();
            hairimg=$(this).attr("src");  
            //  alert(hairimg);     
            $('#myCanvas1').addLayer({
                type: 'image',
              layer: true,
                //   type: 'image',
                name: 'hair',
                index:2,
                source: hairimg,
                x: 130, y: 105,scaleX: 0.7, scaleY:0.7,
            })
            $('#myCanvas').addLayer({
                type: 'image',
                layer: true,
                name: 'hair',
                index: 2,
                source: hairimg,
                x: 245, y:130,scaleX: 1, scaleY: 1,
            })
            $('#myCanvas').drawLayers();
            $('#myCanvas1').drawLayers();
        })
       

        // 命名點擊下一步
        document.getElementById('nextbtn').onclick = function(){
              // 判斷input是否有值
            if($('#robotname').val() != ''){
            TweenMax.to('.nametextbox', 1, {
                y: -100,
                opacity: 0
            });
            TweenMax.set('.Process', {
                display:'block',
                opacity:1
            });
            TweenMax.to('.robot', 1,{
                y: -70,
            });
            TweenMax.from('.Process', 2, {
                y: -100,
                opacity: 0
            });
            TweenMax.set('.Custom-box', {
                y: -130,
                opacity: 1,
            });
            TweenMax.set('.Customprocess', {
                y: 0,
                opacity: 1, 

            });
            TweenMax.from('.Custom-box', 1, {
                y: 130,
                opacity: 0
            });
            TweenMax.from('.Customprocess', 1, {
                y: 130,
                opacity: 0
            });   
            TweenMax.set('.custombtn', {
                y:50,
                display:'block',
                opacity: 1,
            });
            TweenMax.from('.custombtn', 1, {
                y: 100,
                display:'block',
                opacity: 0,
                delay: 1,  });     
        }else{
            $('#loginstate-wrap').show();
        $('#state-pic-X').show();
        $('#state-pic-V').hide();
        $('#state-con-inner').html('請幫你的機器人命名吧,最多八個字喔');
        }}//切換結束

        //點擊回上一步 動畫
        document.getElementById('first').onclick = function(){
            TweenMax.to('.Customprocess', 1, {
                y: 0,
                opacity: 0
            }); 
            TweenMax.to('.Custom-box', 1, {
                y:100,
                opacity: 0
            });
            TweenMax.to('.Process', 2, {
                y: -800,
                opacity: 0,
                display:'none'
            });
            TweenMax.to('.nametextbox', 1, {
                y: 0,
                opacity: 1
            });
            TweenMax.to('.robot', 1,{
                y: 0,
            });
        }//回上一步結束



// 髮型按鈕
document.getElementById('customhair1').onclick = function(){
    $(".customcolorbox").hide();
            $(".customFeaturesbox").hide();
    TweenMax.set('.customhairbox', {
        y:0,
        display:'block',
        opacity: 1
    });
    TweenMax.from('.customhairbox', 1, {
        y: 300,
        // scaleX:0,
        // scaleY:1,
        opacity: 0
    });
    TweenMax.from('.hairitem', .5, {
        // y: 300,
        scale:0,
        opacity: 0,
        delay:1

    });
    }

 
        // 膚 色
        document.getElementById('customcolor').onclick = function(){
            $(".customhairbox").hide();
            $(".customFeaturesbox").hide();
            TweenMax.set('.customcolorbox', {
                y: -0,
                // scaleX:1,
                // scaleY:1,
                display:'block',
                opacity: 1
            });
            TweenMax.from('.customcolorbox', 1, {
                y: 300,
                // scaleX:0,
                // scaleY:0,
                opacity: 0
            });
                    
            TweenMax.from('.complexion', .5, {
                // y: 300,
                scale:0,
                opacity: 0,
                delay:1

            });
            }

// 功能
document.getElementById('customFeatures').onclick = function(){
    $(".customhairbox").hide();
    $(".customcolorbox").hide();
    TweenMax.set('.customFeaturesbox', {
        y: -0,
        // scaleX:1,
        // scaleY:1,
        display:'block',
        opacity: 1
    });
    TweenMax.from('.customFeaturesbox', 1, {
        y: 300,
        // scaleX:0,
        // scaleY:0,
        opacity: 0
    });
    TweenMax.from('.Features', .5, {
        // y: 300,
        scale:0,
        opacity: 0,
        delay:1

    });
    }

//    關閉按鈕
            $('.customclose').on('click', function(){
                TweenMax.to('.Customitem', 1, {
                    y:300,
                    opacity: 0
                });
            })

            //功能切換
            $(".Features ul li").on("click",function(){
             ch=$(this).attr("class");
                $('#Feature1').css('display','none');
                $('#Feature2').css('display','none');
                $('#Feature3').css('display','none');
                $('#Feature4').css('display','none');
                $('#Feature'+ch).css('display','block');
                $(".Features ul li").css({
                    'background-color':'rgba(0, 12, 77, 0.527)',
                    'box-shadow':' 0 0 10px rgba(0, 255, 221,0)'
            
                })
                $(".Features ul ." + ch ).css({
                    'background-color':'rgba(0, 255, 221, 0.5)',
                    'box-shadow':' 0 0 10px rgba(0, 255, 221, 0.5)'
            
                })

                //雷達
                radar(ch);
                $('#myCanvas').removeLayer('mybox').drawLayers();
                $('#myCanvas').removeLayer('clothes').drawLayers();
                $('#myCanvas').removeLayer('mybox1').drawLayers();
                $('#myCanvas').removeLayer('hair').drawLayers();
        // myboximage='images/CustomMade/robot/'+ body[ch-1];
        
                $('#myCanvas1').removeLayer('mybox').drawLayers();
                $('#myCanvas1').removeLayer('clothes').drawLayers();
                $('#myCanvas1').removeLayer('mybox1').drawLayers();
                $('#myCanvas1').removeLayer('hair').drawLayers();
                // $('#myCanvas').removeLayer('mybox').drawLayers();
                // $('#myCanvas').removeLayer('clothes').drawLayers();
                whiteimage='images/CustomMade/robot/'+ white[ch-1];
                myboximage='images/CustomMade/robot/'+ body[ch-1];
                function invert() {
                    $(this).setPixels({
                      each: function(px) {
                        px.r = _colorR;
                        px.g =  _colorG;
                        px.b = _colorB;
                      }
                    });
                  }
                  $('#myCanvas').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'mybox1',
                    index: 0,
                    source: whiteimage,
                    x: 250, y:300,scaleX:1, scaleY:1,
                    load: invert
                }); 
                $('#myCanvas').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'mybox',
                    index: 1,
                    source: myboximage,
                    x: 250, y:300,scaleX:1, scaleY: 1,
                    // load: invert
                });
                $('#myCanvas').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'hair',
                    index: 2,
                    source: hairimg,
                    x: 245, y:130,scaleX: 1, scaleY: 1,
                })
                $('#myCanvas').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'clothes',
                    index: 3,
                    source: 'images/CustomMade/robot/' + clothes[ch-1],
                    x: 250, y:300,scaleX: 1, scaleY: 1
                });
                      

                $('#myCanvas1').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'mybox1',
                    index: 0,
                    source: whiteimage,
                    x: 135, y: 225,scaleX: 0.7, scaleY:0.7,
                    load: invert
                });
                $('#myCanvas1').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'mybox',
                    index:1,
                    source: myboximage,
                    x: 135, y: 225,scaleX: 0.7, scaleY:0.7,
                    // load: invert
                }); 
                $('#myCanvas1').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'hair',
                    index: 2,
                    source: hairimg,
                    x: 130, y: 105,scaleX: 0.7, scaleY:0.7,
                })
                $('#myCanvas1').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'clothes',
                    index: 3,
                    source: 'images/CustomMade/robot/' + clothes[ch-1],
                    x: 135, y: 225,scaleX: 0.7, scaleY:0.7,
                })
                        
                    $('#myCanvas').drawLayers();
                    $('#myCanvas1').drawLayers();
            })
           
            // 改變膚色

            // const hexToRgb = function(hex) {
            //     const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            //     return result
            //       ? {
            //           r: parseInt(result[1], 16),
            //           g: parseInt(result[2], 16),
            //           b: parseInt(result[3], 16)
            //         }
            //       : null;
            //   }
            
            // const colorName = function(hex) {
            //     const rgb = hexToRgb(hex);
            
            //     let distance = 0;
            //     let minDistance = Infinity;
            //     let c;
            //     colors.forEach(color => {
            //       distance = Math.sqrt(
            //         (color.rgb.r - rgb.r) ** 2 +
            //           (color.rgb.g - rgb.g) ** 2 +
            //           (color.rgb.b - rgb.b) ** 2
            //       );
            
            //       if (distance < minDistance) {
            //         minDistance = distance;
            //         c = color;
            //       }
            //     });
            //     return c.name;
            //   };
              
              
            // const pickr =
             Pickr.create({
                el: '.color-picker',
                showAlways: true,
                default: '#fafafa',
                comparison: false,
                components: {
                    hue: true,
                    interaction: {
                        hex: true,
                        input: true,
                    }
                },
                onChange(hsva) {
                    // const hex = hsva.toHEX();
                  const rgb = hsva.toRGBA();
                //   const color = '#' + hex[0] + hex[1] + hex[2];
                //   const y = 0.2126*rgb[0] + 0.7152*rgb[1] + 0.0722*rgb[2]
                  _colorR = rgb[0];  // 宣告顏色
                  _colorG = rgb[1];  
                  _colorB = rgb[2];
                function invert() {
                        $(this).setPixels({
                
                          each: function(px) {
                            px.r = _colorR;
                            px.g = _colorG;
                            px.b = _colorB;
                            // px.a = grd1;
                          }
                        });
                      }
                      $('#myCanvas').removeLayer('mybox1').drawLayers();
                      $('#myCanvas1').removeLayer('mybox1').drawLayers();
                      $('#myCanvas').addLayer({
                          type: 'image',
                          layer: true,
                          name: 'mybox1',
                          index: 0,
                          source: whiteimage,
                          x: 250, y:300,scaleX:1, scaleY:1,
                          load: invert
                      });  
                      $('#myCanvas1').addLayer({
                          type: 'image',
                          layer: true,
                          name: 'mybox1',
                          index: 0,
                          source: whiteimage,
                          x: 135, y: 225,scaleX: 0.7, scaleY: 0.7,
                          load: invert
                      });
                      $('#myCanvas1').drawLayers();
                      $('#myCanvas').drawLayers();
                },
            
            });
       

    } else {
        // document.getElementById('text').innerHTML='桌機版';
        // 當視窗寬度不小於767px時執行

        $('#robotname').focus(function(){
            tis.kill();
            $('.textbox').text(
                '請為你的機器人命名'
            )
            $('.textbox').css({
                'transition':'1s',
                'top':'10px',
                'font-size':'14px',
            })
        });

//設定canvas 寬高
        $('#myCanvas').attr("width","500");
        $('#myCanvas').attr("height","600");

        $('#myCanvas').addLayer({
            type: 'image',
            layer: true,
                name: 'mybox',
                index: 1,
                source: myboximage,
                x: 250, y:300,scaleX:1, scaleY:1,
                // load: invert
            })
            $('#myCanvas').addLayer({
                type: 'image',
                layer: true,
                name: 'mybox1',
                index: 0,
                source: whiteimage,
                x: 250, y:300,scaleX:1, scaleY:1,
                // load: invert
            })
            $('#myCanvas').addLayer({
                type: 'image',
                layer: true,
                name: 'hair',
                index: 2,
                // source: hairimg,
                x: 250, y:125,scaleX: 1.12, scaleY: 1.12,})   
            $('#myCanvas').drawLayers();

            // 換頭髮
            $(".hairimg").on("click",function(){
                $('#myCanvas').removeLayer('hair').drawLayers();
                hairimg=$(this).attr("src");     

                $('#myCanvas').addLayer({
                    type: 'image',
                  layer: true,
                    name: 'hair',
                    index:2,
                    source: hairimg,
                    x: 245, y:130,scaleX: 1, scaleY: 1,
                })
                $('#myCanvas').drawLayers();
            }); 
                


                // 命名下一步
document.getElementById('nextbtn').onclick = function(){
    //判斷input 是否是空值
    if($('#robotname').val() != ''){
    TweenMax.to('.nametextbox', 1, {
        y: -100,
        display:'none',
        opacity: 0
    });
    TweenMax.set('header', {
        opacity:1,
        top:0,
        display:'block',
    });
    TweenMax.to('header', 1, {
        top:-170,
        // opacity: 0
    });
    TweenMax.set('.Process', {
        opacity:1,
        y:0,
        display:'block',
    });

    TweenMax.from('.Process', 2, {
        y:-100,
        opacity: 0
    });
    TweenMax.to('.robot', 1,{
        x: -400,
        y:-50,
    });
    TweenMax.set('.Customprocess', {
        y: 0,
        x:-300,
        opacity: 1, 
    });
    TweenMax.from('.Customprocess', 1, {
        y: 100, 
        opacity: 0,
        delay: 1
    });    
    TweenMax.staggerFrom('.Customprocess li', 1, {
        y: 100,
        opacity: 0,
        delay: 1,
        ease:Back.easeOut}, 0.5);    
        TweenMax.set('.customhairbox', {
            scaleX:1,
            scaleY:1,
            display:'block',
            opacity: 1,
        });
        $('#customhair1').css({
            'background-color':'rgba(255,255,255,.3)'
        });
        $('#customFeatures').css('background-color','rgba(0, 255, 255, 0.686)'),
        $('#customcolor').css('background-color','rgba(0, 255, 255, 0.686)');
        TweenMax.from('.customhairbox', 1, {
            scaleX:0,
            scaleY:1,
            opacity: 0,
            delay: 2.5,
        });
        TweenMax.from('.hairitem', .5, {
            scale:0,
            opacity: 0,
            delay:3
        });
        
        TweenMax.set('.custombtn', {
            y:0,
            display:'block',
            opacity: 1,
        });
        TweenMax.from('.custombtn', 1, {
            y: 200,
            display:'block',
            opacity: 0,
            delay: 3,
        });
    }else{
        $('#loginstate-wrap').show();
        $('#state-pic-X').show();
        $('#state-pic-V').hide();
        $('#state-con-inner').html('請幫你的機器人命名吧,最多八個字喔');
        // alert('請幫你的機器人命名吧,最多八個字喔');
    }
}//命名下一步結束

//點擊回上一步
document.getElementById('first').onclick = function(){
    $(".customhairbox").hide();
    $(".customcolorbox").hide();
    $(".customFeaturesbox").hide();
    TweenMax.to('header', 1, {
        top:0,
        // opacity: 0
    });
    TweenMax.to('.Customprocess', 1, {
        y: 0,
        opacity: 0
    }); 
    TweenMax.to('.robot', 1,{
        y:0,
        x: 0,
        delay: 0.5,
    });
    TweenMax.to('.Process', 2, {
        y: -100,
        opacity: 0
    });
    TweenMax.to('.nametextbox', 1, {
        y: 0,
        opacity: 1,
        display:'block',
    });
    TweenMax.to('.custombtn', 1, {
        y: 300,
        display:'block',
        opacity: 0,
    });
}//回上一步結束

// 髮型按鈕
document.getElementById('customhair1').onclick = function(){
    $(".customcolorbox").hide();
            $(".customFeaturesbox").hide();
            $('#customhair1').css({
                'background-color':'rgba(255,255,255,.3)'
            });
            $('#customFeatures').css('background-color','rgba(0, 255, 255, 0.686)'),
            $('#customcolor').css('background-color','rgba(0, 255, 255, 0.686)');
    TweenMax.set('.customhairbox', {
        scaleX:1,
        scaleY:1,
        display:'block',
        opacity: 1
    });
    TweenMax.from('.customhairbox', 1, {
        scaleX:0,
        scaleY:1,
        opacity: 0
    });
    TweenMax.from('.hairitem', .5, {
        scale:0,
        opacity: 0,
        delay:1

    });
    }

//  膚色版面
        document.getElementById('customcolor').onclick = function(){
            $(".customhairbox").hide();
            $(".customFeaturesbox").hide();
            $('#customcolor').css({
                'background-color':'rgba(255,255,255,.3)'
            });
            $('#customFeatures').css('background-color','rgba(0, 255, 255, 0.686)'),
            $('#customhair1').css('background-color','rgba(0, 255, 255, 0.686)');
            TweenMax.set('.customcolorbox', {
                scaleX:1,
                display:'block',
                opacity: 1
            });
            TweenMax.from('.customcolorbox', 1, {
                scaleX:0,
                opacity: 0
            });
                    
            TweenMax.from('.complexion', .5, {
                scale:0,
                opacity: 0,
                delay:1
            });
            }

// 功能
document.getElementById('customFeatures').onclick = function(){
    $(".customhairbox").hide();
    $(".customcolorbox").hide();
    $('#customFeatures').css({
        'background-color':'rgba(255,255,255,.3)'
    });
    
    $('#customcolor').css('background-color','rgba(0, 255, 255, 0.686)'),
    $('#customhair1').css('background-color','rgba(0, 255, 255, 0.686)');
    TweenMax.set('.customFeaturesbox', {
        scaleX:1,
        display:'block',
        opacity: 1
    });
    TweenMax.from('.customFeaturesbox', 1, {
        scaleX:0,
        opacity: 0
    });
    TweenMax.from('.Features', .5, {
        scale:0,
        opacity: 0,
        delay:1
    });
    }

    // 切換功能
    $(".Features ul li").on("click",function(){
        ch=$(this).attr("class");
        $('#Feature1').css('display','none');
        $('#Feature2').css('display','none');
        $('#Feature3').css('display','none');
        $('#Feature4').css('display','none');
        $('#Feature'+ch).css('display','block');
        $(".Features ul li").css({
            'background-color':'rgba(0, 12, 77, 0.527)',
            'box-shadow':' 0 0 10px rgba(0, 255, 221,0)'
    
        })
        $(".Features ul ." + ch ).css({
            'background-color':'rgba(0, 255, 221, 0.5)',
            'box-shadow':' 0 0 10px rgba(0, 255, 221, 0.5)'
    
        })
        // white=['FiremenWhite.png','ProgrammerWhite.png','nurseWhite.png','artistWhite.png'];
        //雷達
        radar(ch);
        $('#myCanvas').removeLayer('mybox').drawLayers();
        $('#myCanvas').removeLayer('clothes').drawLayers();
        $('#myCanvas').removeLayer('mybox1').drawLayers();
        $('#myCanvas').removeLayer('hair').drawLayers();
        myboximage='images/CustomMade/robot/'+ body[ch-1];
        whiteimage='images/CustomMade/robot/'+ white[ch-1];
        function invert() {
            $(this).setPixels({

              each: function(px) {
                px.r = _colorR;
                px.g =  _colorG;
                px.b = _colorB;
              }
            });
          }
         
       
        $('#myCanvas').addLayer({
            type: 'image',
            layer: true,
            name: 'mybox1',
            index: 0,
            source: whiteimage,
            x: 250, y:300,scaleX:1, scaleY:1,
            load: invert
        }); 
        $('#myCanvas').addLayer({
            type: 'image',
            layer: true,
            name: 'mybox',
            index: 1,
            source: myboximage,
            x: 250, y:300,scaleX:1, scaleY: 1,
            // load: invert
        });
        $('#myCanvas').addLayer({
            type: 'image',
            layer: true,
            name: 'hair',
            index: 2,
            source: hairimg,
            x: 245, y:130,scaleX: 1, scaleY: 1,
        })
                $('#myCanvas').addLayer({
                    type: 'image',
                    layer: true,
                    name: 'clothes',
                    index: 3,
                    source: 'images/CustomMade/robot/' + clothes[ch-1],
                    x: 250, y:300,scaleX: 1, scaleY: 1
                });
                $('#myCanvas').drawLayers();
          
    })


// 膚色選擇
    // const hexToRgb = function(hex) {
    //     const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    //     return result
    //       ? {
    //           r: parseInt(result[1], 16),
    //           g: parseInt(result[2], 16),
    //           b: parseInt(result[3], 16)
    //         }
    //       : null;
    //   }
    
    // const colorName = function(hex) {
    //     const rgb = hexToRgb(hex);
    
    //     let distance = 0;
    //     let minDistance = Infinity;
    //     let c;
    //     colors.forEach(color => {
    //       distance = Math.sqrt(
    //         (color.rgb.r - rgb.r) ** 2 +
    //           (color.rgb.g - rgb.g) ** 2 +
    //           (color.rgb.b - rgb.b) ** 2
    //       );
    
    //       if (distance < minDistance) {
    //         minDistance = distance;
    //         c = color;
    //       }
    //     });
    //     return c.name;
    //   };
      
      
    Pickr.create({
        el: '.color-picker',
        showAlways: true,
        default: '#fafafa',
        comparison: false,
        components: {
            hue: true,
            interaction: {
                hex: true,
                input: true,
            }
        },
        onChange(hsva) {
            // const hex = hsva.toHEX();
          const rgb = hsva.toRGBA();
        //   const color = '#' + hex[0] + hex[1] + hex[2];
        //   const y = 0.2126*rgb[0] + 0.7152*rgb[1] + 0.0722*rgb[2]
          _colorR = rgb[0];  // 宣告顏色
          _colorG = rgb[1];  
          _colorB = rgb[2];
        function invert() {
                $(this).setPixels({
        
                  each: function(px) {
                    px.r = _colorR;
                    px.g =  _colorG;
                    px.b = _colorB;
                    // px.a = grd1;
                  }
                });
              }
            $('#myCanvas').removeLayer('mybox1').drawLayers();
            $('#myCanvas').addLayer({
                type: 'image',
                layer: true,
                name: 'mybox1',
                index: 0,
                source: whiteimage,
                x: 250, y:300,scaleX:1, scaleY:1,
                load: invert
            });    $('#myCanvas').drawLayers();
        },
    
    });


    
}//桌機判斷結束
}//rwd function結束


// 點下一步判斷是否有登入會員

$('.nextfillout').click(function(){
if(ch != ''){
    if(memberData.ourMemNo){
        $('.customizedfillout').css('display','block');
       document.getElementById('memNo').innerHTML=memberData.ourMemId;
    }else{
        document.getElementById('memlightBox-wrap').style.display = 'block';
    }
}
    else{
        $('#loginstate-wrap').show();
        $('#state-pic-X').show();
        $('#state-pic-V').hide();
        $('#state-con-inner').html('請選擇功能喔');
        // alert('請選擇功能喔');
    }
})//判斷登入結束

//點擊取消鈕
$('#cancelbtn').click(function(){
    $('.customizedfillout').css('display','none');
})

//當畫面有變動時會驅動


$(window).ready(function(){
    $(window).resize(function() {
        rwd();
    });
    rwd();
    // document.getElementById('robotname').focus();
    radar(1);
    // 髮型卷軸
    $(".hairitem").mCustomScrollbar();
    // $(".hairitem").mCustomScrollbar();
    // 功能卷軸
    $(".Features").mCustomScrollbar();
    // 功能切換背景顏色
    $(".Features ul .1").css({
        'background-color':'rgba(0, 255, 221, 0.5)',
        'box-shadow':' 0 0 10px rgba(0, 255, 221, 0.5)'
    })
    $('#Feature1').css('display','block');

    if($('#robotname').val() != ''){
        tis.kill();
        $('.textbox').text(
            '請為你的機器人命名'
        )
        $('.textbox').css({
            'transition':'1s',
            'top':'-10px',
            'font-size':'14px',
        })
    }


});

// canvas 存儲
$('#formbtnsubmit').click(function(){
if(document.getElementById('address').value != ''){
      //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上
      var xhr = new XMLHttpRequest(); 
    
    var url = "customizedfillout.php";
    xhr.open("post", url, true);
    
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  
    var data_info =

     "rbtName=" + document.getElementById("robotname").value
    + "&rbtAddr=" + document.getElementById("address").value
    + "&rbSkillNo=" + document.getElementById("rbSkillNo"+ch).value
    + "&rbtINT=" + document.getElementById("rbtNT"+ch).value
    + "&rbtVIT=" + document.getElementById("rbtVIT"+ch).value
    + "&rbtAGI="  + document.getElementById("rbtAGI"+ch).value;

    xhr.send(data_info);
    saveImage();
}
    else{
        $('#loginstate-wrap').show();
        $('#state-pic-X').show();
        $('#state-pic-V').hide();
        $('#state-con-inner').html('請輸入你的地址');
    }
})
function saveImage() {
    var canvas = document.getElementById("myCanvas");
    var dataURL = canvas.toDataURL("image/png");
    document.getElementById('hidden_data').value = dataURL;
    var formData = new FormData(document.forms["form1"]);
   
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'canvas_load_save.php', true);
   
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
              if( xhr.status == 200 ){
                $('.customizedfillout').css('display','none');
                $('.jump').css('display','block');
              }else{
                alert(xhr.status);
              }
        }
    };
        
    xhr.send(formData);
  }


  function download(){
    var download = document.getElementById("download");
    var image = document.getElementById("myCanvas").toDataURL("image/png")
                .replace("image/png", "image/octet-stream");
          download.setAttribute("href", image);
          //download.setAttribute("download","archive.png");
}


