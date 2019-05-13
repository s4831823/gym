//.......關於達文西............//
// about
//公司介紹滑鼠觸發往前效果
var control = new TimelineMax();
control.add(TweenMax.fromTo('.about img', 1, {
    scale: 1,
    opacity: 1,//1清楚是0透明
    // display:'none'
},{
    scale: 2,
    opacity: 0
}))
// var controller = new ScrollMagic.Controller();
control.add(TweenMax.fromTo('.vision img', 1, {
    scale: 1,
    opacity: 0,
    // display:'none'
},{
    scale: 2,
    opacity: 1,
    display:'none'
}))

control.add(TweenMax.fromTo('.honor img', 1, {
    scale: 1,
    opacity: 0,
},{
    scale: 2,
    opacity: 1,
    display:'none'
}))

control.add(TweenMax.fromTo('.scale img', 1, {
    // display:'none';
    scale: 2,
    opacity: 0,
},{
    scale: 2,
    opacity: 1
}))

var controller = new ScrollMagic.Controller();
var scene_s = new ScrollMagic.Scene({
    triggerElement: "#trigger_01",
    duration: '400%',
    triggerHook: 0,
})
    .setPin('.info')
    .setTween(control)
    .addIndicators({
        name: 'stickview'
    })
    .addTo(controller);
//觸發事件


