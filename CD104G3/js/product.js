
//===Section1===
$('.intro-lens').mouseover(function(){
	$('.pro_intro-lens').css('display','block');
});
$('.intro-lens').mouseleave(function(){
	$('.pro_intro-lens').css('display','none');
});

$('.intro-heart').mouseover(function(){
	$('.pro_intro-heart').css('display','block');
});
$('.intro-heart').mouseleave(function(){
	$('.pro_intro-heart').css('display','none');
});

$('.intro-motor').mouseover(function(){
	$('.pro_intro-motor').css('display','block');
});
$('.intro-motor').mouseleave(function(){
	$('.pro_intro-motor').css('display','none');
});

$('.intro-chip').mouseover(function(){
	$('.pro_intro-chip').css('display','block');
});
$('.intro-chip').mouseleave(function(){
	$('.pro_intro-chip').css('display','none');
});

$('.intro-joint').mouseover(function(){
	$('.pro_intro-joint').css('display','block');
});
$('.intro-joint').mouseleave(function(){
	$('.pro_intro-joint').css('display','none');
});

//===Section2===
$('.point').mouseover(function(){
	$(this).hide();
	$('.point-circle').hide();
	$('.scanlines').fadeIn(1000);
	$('.fingerprint').fadeIn(1000);
	$('.scanlines').fadeOut(4000);
	$('.fingerprint').fadeOut(4000);
	$('.eyelash').fadeOut(5000);
	$('.mouth').fadeOut(5000);

	$('#eye-blink').fadeIn(10000);
	$('.smile').fadeIn(10000);
});

//===Section3===停止動畫===
$('.image-robot3').click(function(){
	$('.stave--bar').removeClass('moveBar');
	$('.talk').removeClass('talking');
	
	//$('#myvoice').pause();//==audio停止
	$('#myvoice').remove();//==audio停止
});
	
//===Section5===
$('.hand').mouseenter(function(){
	$('.image-robot5-02').css('display','none');
	$('.image-robot5-01').css('display','block');
});
//.mouseout(function(){
// 	$('.image-robot5-02').css('display','block');
// 	$('.image-robot5-01').css('display','none');
// });
