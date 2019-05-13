console.log("start");

TweenMax.to('.box_01', 3, {
    x: 200,
    y: 100
});


TweenMax.from('.box_02', 3, {
    x: 200,
    y: 100
})

TweenMax.fromTo('.box_03', 2, {
    x: -100,
    opacity: 0,
    scale: 1


}, {
    x: 100,
    opacity: 1,
    scale: 2,
    ease: Elastic.easeOut

});


TweenMax.fromTo('.box_04', 2, {
    x: -100
}, {

    x: 200,
    ease: Bounce.easeOut
})

TweenMax.set('.box_05', {
    x: 400,
    y: 300,
    background: '#f20'
})

TweenMax.fromTo('.text', 1, {
    y: -150,
    opacity: 0
}, {
    y: 0,
    opacity: 1,
    ease: Bounce.easeOut
})


TweenMax.fromTo('.line', 1, {
    width: 0,
}, {
    width: 400,
    delay: .6
})


TweenMax.fromTo('.circle', 1, {
    scale: 1,
    opacity: 1
}, {
    scale: 1.5,
    opacity: 0,
    repeat: -1,
    ease: Expo.easeOut

});



TweenMax.to('.inner', 1, {
    scale: 1,
    rotation: 360,
    repeat: -1
})

TweenMax.to('.box_07', 1, {
    x: 100,
    repeat: -1,
    repeatDelay: 2,
    yoyo: true,
    boxShadow: "0px 5px 20px black" //陰影



})


var btn_play = document.getElementById('play_btn');


btn_play.onclick = function () {
    var tl = new TimelineMax({
        repeat: 1,
        yoyo: true,
        repeatDelay: 1,
        // onComplete: alerts
    });
    
    
    tl.add(TweenMax.to('.section_02 .box1', 2, {
        x: 100
    }));
    
    
    tl.add(TweenMax.to('.section_02 .box2', 1, {
        x: 100,
        y: 100,
        opacity: 0,
        // delay: -1
    }));
    
    // tl.seek(1.5);
    
    
    var tls = new TimelineMax({
        repeat: 2
    });
    
    tls.fromTo('.section_02 .box3', 1, {
        x: 100
    }, {
        x: 400,
        rotation: 180
    }).fromTo('.section_02 .box4', 1, {
        x: 50
    }, {
        x: 200,
        rotation: 360
    });
    


    TweenMax.to('.box_08', 6, {
        bezier: {
            curviness: 1.25,
            values: [{
                x: 0,
                y: 10
            }, {
                x: 250,
                y: 400
            }, {
                x: 450,
                y: 50
            }, {
                x: 0,
                y: 0
            }],
            autoRotate: true
        },
        ease: Power1.easeOut
    });
}

// function alerts() {
//     alert('ok');
//     // console.log("alertsok");
// };

// TweenMax.staggerTo('.section_02 .box', 1, {
//     // scale: 1,
//     // rotation: 360,
//     repeat: 1,
//     // repeatDelay: 5,
//     // transformOrigin: 'left top'
//     x: 100,
//     // onComplete : alerts
// },.6);




document.getElementById('btn_scroll').onclick = function () {
    TweenLite.to(myDiv, 2, {scrollTo:'#textbox2'});
}

var tis = new TimelineMax({
    repeat: -1,
    yoyo: false,
    repeatDelay: 3
});

tis.to('.textbox', 3, {
    text: "我的天呀  要記得存檔",
    ease: Expo.easeOut,
    delay: 4
}).to('.textbox', 1, {
    text: "要記得吃午餐",
    ease: Linear.easeNone,
    delay: 2
});





var textsplit = new SplitText('#textbox2', {
    type: "words , chars"
});

TweenLite.set("#textbox2", {
    perspective: 400
});
TweenMax.staggerFrom(textsplit.chars, 1, {
    opacity: 0,
    scale: 0,
    y: 80,
    rotationX: 180,
    transformOrigin: "0% 50% -50",
    ease: Back.easeOut
}, 0.1);


function parallax() {
    var scene = document.getElementById('parallax_box');
    var parallax = new Parallax(scene);
}


parallax();

//scrollmagic
//初始化場景
var controller = new ScrollMagic.Controller();



var animation = TweenMax.to('.scroll_box', 1, {
    y: 300
});


var animation01 = TweenMax.to('.scroll_boxs', 1, {
    y: 500,
    x: 100
});


//觸發事件
var section_06 = new ScrollMagic.Scene({
    triggerElement: "#trigger_01",
    duration: '80%',
    offset: 40,
    // reverse: true,
}).setTween(animation).addIndicators({
    name: 'section01'
}).addTo(controller)


var section_07 = new ScrollMagic.Scene({
    triggerElement: "#trigger_02",
    // duration: '80%',
    // offset: 40,
    // reverse: true,
}).setClassToggle('.toggleclass' ,'on')
.addIndicators().addTo(controller)



var trll = TweenMax.to('.trllbox' ,1 ,{
    x: 200,
    delay: 0
})

var section_08 = new ScrollMagic.Scene({
    triggerElement: "#trigger_03",
    // duration: '80%',
    // offset: 40,
    // reverse: true,
}).setClassToggle('.bgall' ,'on').setTween(trll)
.addIndicators().addTo(controller)


var tlts = new TimelineMax();

    tlts.add(TweenMax.to('.scrollbox_01', 1, {
        x: 200,
    }));
    tlts.add(TweenMax.to('.scrollbox_02', 1, {
        x: 300,
    }));
    tlts.add(TweenMax.to('.scrollbox_03', 1, {
        x: 800,
    }));


    var scene_s = new ScrollMagic.Scene({
        triggerElement: "#trigger_04",
        duration: '300%',
        //畫面最上緣
        triggerHook: 0,
        //只出現一次
        // reverse: false,
    })
    .setPin('.section_09')
    .setTween(tlts)
    .addIndicators({
        name: 'stickview'
    })
    .addTo(controller);



  var tlimax = new TimelineMax();

  tlimax.fromTo('.bgall01' , 1, {
      x:"-100%"
  },{
      x: '0%'
  }).fromTo('.bgall02' , 1, {
    x:"100%"
},{
    x: '0%'
}).fromTo('.bgall03' , 1, {
    y:"-100%"
},{
    y: '0%'
})





var scene_sce = new ScrollMagic.Scene({
    triggerElement: "#trigger_05",
    duration: '300%',
    //畫面最上緣
    triggerHook: 0,
    //只出現一次
    // reverse: false,
})
.setPin('.section_10')
.setTween(tlimax)
.addIndicators()
.addTo(controller);


var para01 = TweenMax.to('.box_parallax-01', 1, {
    y: '60%' ,
    ease: Power1.easeOut 
})

var para02 = TweenMax.to('.box_parallax-02', 1 ,{
    y: '90%',
    ease: Power1.easeOut 
})
var para03 =  TweenMax.to('.box_parallax-03', 1,{
    y:'-20%',
    ease: Power1.easeOut
})

var scrollbg = TweenMax.to('.section_11 .wrapper', 1,{
    y:'-15%',
    ease: Power1.easeOut
})

// function enterlog() {
// console.log('enter');
// };

// function leavelog() {
//     console.log('leave');
// };


var scene_ogs = new ScrollMagic.Scene({
    triggerElement: "#trigger_06",
    duration: '100%'
    //畫面最上緣
    // triggerHook: 0,
    //只出現一次
    // reverse: false,
})
.setTween([para01,para02,para03,scrollbg])
.addIndicators()
.addTo(controller);








console.log('end ok')















// TweenMax.to('.box_07', 1, {
//     scale: 1,
//     rotation: 360,
//     repeat: -1,
//     repeatDelay: 0,
//     transformOrigin : 'left top'

// })









console.log('end ok')