var btn_play = document.getElementById('item_1');
btn_play.onclick=function () {
    if(btn_play.style.zIndex < 10){

        TweenMax.to('.item_1',2.5 , {
            rotationX: 360,
            zIndex:10,
            scale:1,
            // yoyo: 1,
            // reverse:false,
            bezier: {
                curviness: 1.25,
                values: [{
                    x: 0,
                    y: 0
                }, {
                    x: -100,
                    y: 150
                }, {
                    x: 0,
                    y: 150
                },{
                    x: 350,
                    y: 100
                }
            ],
            
              autoRotate: false ,
            },
            ease: Power4.easeOut,
           
        });
        TweenMax.to('.skillfirefighter',0,{
            display:'none',
            delay:.5,
            rotationX: 360,
            scale:1,
        });
        TweenMax.to('.firefighter',.3,{
            display:'block',
            delay:.5,
            scale:2,
            rotationX: 360,
        });
    }else if(btn_play.style.zIndex == 10){
        TweenMax.to('.item_1',2.5 , {
            rotationX: 360,
            zIndex:1,
            scale:1,
            // yoyo: 1,
            // reverse:false,
            bezier: {
                curviness: 1.25,
                values: [{
                    x: 0,
                    y: 0
                }, {
                    x: -100,
                    y: -150
                }, {
                    x: -150,
                    y: 0
                },{
                    x: -350,
                    y: 100
                }
            ],
            
              autoRotate: false ,
            },
            ease: Power4.easeOut,
           
        });
        TweenMax.to('.skillfirefighter',0,{
            display:'none',
            delay:.5,
            rotationX: 360,
            scale:1,
        });
        TweenMax.to('.firefighter',.3,{
            display:'block',
            delay:.5,
            scale:.5,
            rotationX: 360,
        });
    }
}
var btn_play = document.getElementById('item_2');
btn_play.onclick = function () {
    TweenMax.to('.item_2',2.5 , {
        rotationX: 360,
        zIndex:10,
        scale:1,
        bezier: {
            curviness: 1.25,
            values: [{
                x: 0,
                y: 0
            }, {
                x: 100,
                y: 150
            }, {
                x: 0,
                y: 150
            },{
                x: -350,
                y: 100
            }
        ],
        
          autoRotate: false ,
        },
        ease: Power4.easeOut,
       
    });
    TweenMax.to('.skillcoding',0,{
        display:'none',
        delay:.5,
        rotationX: 360,
        scale:1,
    });
    TweenMax.to('.coding',.3,{
        display:'block',
        delay:.5,
        scale:2,
        rotationX: 360,
    });
}
var btn_play = document.getElementById('item_3');
btn_play.onclick = function () {
    TweenMax.to('.item_3',2.5 , {
        rotationX: 360,
        zIndex:10,
        scale:1,
        bezier: {
            curviness: 1.25,
            values: [{
                x: 0,
                y: 0
            }, {
                x: 100,
                y: 50
            },{
                x: 350,
                y: -250
            }
        ],
        
          autoRotate: false ,
        },
        ease: Power4.easeOut,
       
    });
    TweenMax.to('.skilllongtermcare',0,{
        display:'none',
        delay:.5,
        rotationX: 360,
        scale:1,
    });
    TweenMax.to('.longtermcare',.3,{
        display:'block',
        delay:.5,
        scale:2,
        rotationX: 360,
    });
}
var btn_play = document.getElementById('item_4');
btn_play.onclick = function () {
    TweenMax.to('.item_4',2.5 , {
        rotationX: 360,
        zIndex:10,
        scale:1,
        bezier: {
            curviness: 1.25,
            values: [{
                x: 0,
                y: 0
            }, {
                x: -100,
                y: 50
            },{
                
                x: -350,
                y: -250
            }
        ],
        
          autoRotate: false ,
        },
        ease: Power4.easeOut,
       
    });
    TweenMax.to('.skillentertainment',0,{
        display:'none',
        delay:.5,
        rotationX: 360,
        scale:1,
    });
    TweenMax.to('.entertainment',.3,{
        display:'block',
        delay:.5,
        scale:2,
        rotationX: 360,
    });
}
var btn_play = document.getElementsByID('firefighter');
btn_play.onclick = function () {
    TweenMax.to('.firefighter',2.5 , {
        rotationX: 360,
        scale:1,
        bezier: {
            curviness: 1.25,
            values: [{
                x: 0,
                y: 0
            }, {
                x: -100,
                y: -50
            },{
                
                x: -350,
                y: 250
            }
        ],
        
          autoRotate: false ,
        },
        ease: Power4.easeOut,
       
    });
    TweenMax.to('.skillentertainment',0,{
        display:'block',
        delay:.5,
        rotationX: 360,
        scale:1,
    });
    TweenMax.to('.entertainment',.3,{
        display:'none',
        delay:.5,
        scale:.5,
        rotationX: 360,
    });
}