//.......關於達文西............//
// about
//公司介紹滑鼠觸發往前效果
var control = new TimelineMax();
control.add(TweenMax.fromTo('.info_about', 1, {
    scale: 1,
    opacity: 1,//1清楚是0透明
},{
    scale: 1.5,
    opacity: 0,
}))
// var controller = new ScrollMagic.Controller();
//1000
control.add(TweenMax.fromTo('.info_1000' ,1, {
    scale: 0.5,
    opacity: 0,
    
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))


//wei
control.add(TweenMax.fromTo('.info_wei' ,1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))

//peter
control.add(TweenMax.fromTo('.info_peter' ,1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))

//sam
control.add(TweenMax.fromTo('.info_sam' ,1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))

//wang
control.add(TweenMax.fromTo('.info_wang' ,1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))

//lin
control.add(TweenMax.fromTo('.info_lin' ,1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))

//lai
control.add(TweenMax.fromTo('.info_lai' ,1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))

//Meng
control.add(TweenMax.fromTo('.info_Meng' ,1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))




control.add(TweenMax.fromTo('.info_vision' ,1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))



control.add(TweenMax.fromTo('.info_honor', 1, {
    scale: 0.5,
    opacity: 0,
},{
    scale: 1.5,
    opacity: 1,
    display:'none'
}))
if($(window).width()<768){
    control.add(TweenMax.fromTo('.info_technology', 1, {
        // display:'none';
        scale: 0.5,
        opacity: 0,
    },{
        scale: 1.2,
        opacity: 1
    }))
}


//全球據點滑入
// var controller = new ScrollMagic.Controller();
// var titlemap = TweenMax.fromTo('.map_t',3,{
//     x:-100,
//     y:100
// },{
//     x:50,
//     y:30

// });

// var scene = new ScrollMagic.Scene({
//     triggerElement:"trigger2",

//     repeat: -1,
//     reverse: false,
//     offset: 600,
// }).setTween(titlemap).addIndicators().addTo(controller);

// RWD修正
if($(window).width()>768){
    control.add(TweenMax.fromTo('.info_technology', 1, {
        // display:'none';
        scale: 0.5,
        opacity: 0,
    },{
        scale: 2,
        opacity: 1
    }))
}


var controller = new ScrollMagic.Controller();
var scene_s = new ScrollMagic.Scene({
    triggerElement: "#trigger_01",
    duration: '400%',
    triggerHook: 0,
})
    .setPin('.info')
    .setTween(control)
    //可以拿掉的標示
    // .addIndicators({
    //     name: 'stickview'
    // })
    .addTo(controller);
//觸發事件

// RWD地點下拉選單
$('.contain').removeClass('hide');

if(screen.width < 768){
    $('.contain').addClass('hide');
    $('.shop h3').click(function(){
        $(this).next().next().next().toggleClass('hide');
      });
}

