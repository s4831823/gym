window.onload=function(){



    //bryan 新增的
    var controller = new ScrollMagic.Controller();


    //===第一屏=== 
    TweenMax.fromTo('#maskpic',2,{
        y: -1100,
        opacity:0
        },{
        y:0,
        opacity:1,
        ease: Bounce.easeOut
    })
    TweenMax.fromTo('.textbox',4,{
        opacity: 0,
        },{
        opacity:1,
        delay: 2 
    })



    //===第二屏=== 
    let prodText1 = TweenMax.to('.prod-text1',2,{   //==文字
        rotationY: 360,
        yoyo:true,
    })
    let imageRobot2 = TweenMax.fromTo('.image-robot2', 2, { //==機器人
        opacity: 0,
        scale: .5
    }, {
        opacity: 1,
        scale: 1,
        ease: Elastic.easeOut,
        delay: 2 
    })
    prodText1.pause();     //==文字暫停
    imageRobot2.pause();  //==機器人暫停

    var section2 = new ScrollMagic.Scene({
        triggerElement: "#triggerSection2",
        offset: 50 
    })
    .on("enter", function () {
        typeText('animate1'); //==Terminal Texts Effect
        prodText1.play();    //==文字開始動畫
        imageRobot2.play(); //==機器人開始動畫
    })
    .on("leave", function () {
        prodText1.reverse();    //==文字動畫恢復
        imageRobot2.reverse(); //==機器人動畫恢復
    })
    // .addIndicators({    ->開發時做標記,上線時要拿掉
    //     name: 'section2'
    // })
    .addTo(controller)

    //===第二屏--圈圈=== 
    TweenMax.fromTo('.point-circle', 2, {
        x: 0,
        opacity: 1
    }, {
        scale: 4,
        opacity: 0,
        repeat: -1, //動作無限循環
        ease: Expo.easeOut
    })


    //===第三屏=== 
    let prodText2 = TweenMax.to('.prod-text2',2,{   //==文字
        rotationY: 360,
        yoyo:true,
    })
    let imageRobot3 = TweenMax.fromTo('.image-robot3', 2, {
        opacity: 0,
        scale: 1.5,
    }, {
        opacity: 1,
        scale: 1,
        ease: Elastic.easeOut,
        delay: 2 
    })
    prodText2.pause();     //==文字暫停
    imageRobot3.pause();  //==機器人暫停


    var section3 = new ScrollMagic.Scene({
            triggerElement: "#triggerSection3",
            offset: 50 
        })
        .on("enter", function () {
            document.getElementById('myvoice').play();//==audio播放 
            //document.getElementById('myvoice').removeAttribute('muted');//==audio播放 
            typeText('animate2');//==Terminal Texts Effect
            prodText2.play();    //==文字開始動畫
            imageRobot3.play(); //==機器人開始動畫
        })
        .on("leave", function () {
            document.getElementById('myvoice').pause();//==audio停止
            prodText2.reverse();    //==文字動畫恢復
            imageRobot3.reverse(); //==機器人動畫恢復
        })
        // .addIndicators({
        //     name: 'section3'
        // })
        .addTo(controller)

    //bryan 新增的
        // let fullPageInstance = new fullpage('#dowebok', {
        //     navigation: true,
        
        // });    

    console.log('end ok') //測試 debug.addIndicators.js是否引用成功



    //===第四屏=== 
    let prodText3 = TweenMax.to('.prod-text3',2,{   //==文字
        rotationY: 360,
        yoyo:true,
    })
    let imageRobot5 = TweenMax.fromTo('.image-robot5', 3.5, {
        x:-900
    }, {
        x:0,
        ease: Elastic.easeOut,
        delay: 2 
    })
    prodText3.pause();     //==文字暫停
    imageRobot5.pause();  //==機器人暫停

    var section4 = new ScrollMagic.Scene({
        triggerElement: "#triggerSection4",
        offset: 50 
    })
    .on("enter", function () {
        typeText('animate3');
        prodText3.play();    //==文字開始動畫
        imageRobot5.play(); //==機器人開始動畫
        //document.getElementById('myvoice').setAttribute('muted', '');//==audio停止
        document.getElementById('myvoice').pause();//==audio停止
        console.log('3');
        
    })
    .on("leave", function () {
        prodText3.reverse();    //==文字動畫恢復
        imageRobot5.reverse(); //==機器人動畫恢復
    })
    // .addIndicators({
    //     name: 'section4'
    // })
    .addTo(controller)



}