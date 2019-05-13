<?php
	session_start();
?>
<!-- header 的 css js  -->
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/lightBox.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/lightBox.js"></script>
    <script src="js/cart.js"></script>
    
<!-- header -->
	<script>
		$(document).ready(function(){
			$('.menu-wrapper').on('click', function() {
				$('.hamburger-menu').toggleClass('animate');
				$('header ul').toggle('showOrHide');
			});

			if(location.pathname.indexOf('productIntroductipn') > -1 ){
				$('ul li span').removeClass("ck");
				$('#productIntroductipn span').addClass("ck");
				}else if(location.pathname.indexOf('customized') > -1 ){
				$('ul li span').removeClass("ck");
				$('#customized span').addClass("ck");
				}else if(location.pathname.indexOf('gym') > -1 ){
				$('ul li span').removeClass("ck");
				$('#gym span').addClass("ck");
				}else if(location.pathname.indexOf('shoppingMall') > -1 ){
				$('ul li span').removeClass("ck");
				$('#shoppingMall span').addClass("ck");
				}else if(location.pathname.indexOf('forum') > -1 ){
				$('ul li span').removeClass("ck");
				$('#forum span').addClass("ck");
				}else if(location.pathname.indexOf('aboutUs') > -1 ){
				$('ul li span').removeClass("ck");
				$('#aboutUs span').addClass("ck");
			}
		});
	</script>

	<script>
		var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
		var currentScrollPos = window.pageYOffset;
		if (prevScrollpos > currentScrollPos) {
			document.getElementById("navbar").style.transition = "1s";
			document.getElementById("navbar").style.top = "0";

		} else {
			document.getElementById("navbar").style.transition = "1s";
			document.getElementById("navbar").style.top = "-170px";
		}
		prevScrollpos = currentScrollPos;
		}
	</script>

</head>
<body>



<?php

$self=$_SERVER['PHP_SELF'];

echo '<header id="navbar">
<div class="menu-wrapper">
  <div class="hamburger-menu"></div>	  
</div>

<div class="logo">

<div class="logoimg"><a href="home.php">
<svg version="1.1" id="logosvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 104.3 27.4" style="enable-background:new 0 0 104.3 27.4;" xml:space="preserve">
   <style type="text/css">
 
   </style>
   <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-1466.5194" y1="-231.3887" x2="-1466.5194" y2="-142.3135">
       <stop  offset="0" style="stop-color:#178AB3;stop-opacity:0.9"/>
       <stop  offset="0.1457" style="stop-color:#1887AF;stop-opacity:0.7688"/>
       <stop  offset="0.2866" style="stop-color:#1C7FA2;stop-opacity:0.6421"/>
       <stop  offset="0.4255" style="stop-color:#1E718D;stop-opacity:0.517"/>
       <stop  offset="0.5633" style="stop-color:#1F5D71;stop-opacity:0.393"/>
       <stop  offset="0.7003" style="stop-color:#1B4651;stop-opacity:0.2697"/>
       <stop  offset="0.8367" style="stop-color:#112C2F;stop-opacity:0.1469"/>
       <stop  offset="0.9702" style="stop-color:#050A0B;stop-opacity:2.677894e-02"/>
       <stop  offset="1" style="stop-color:#040000;stop-opacity:0"/>
   </linearGradient>
   <rect x="-1761.5" y="-231.4" class="st0" width="590" height="89.1"/>
   <g>
       <g>
           <polyline  class="st1" points="-1749.2,-199.4 -1560.1,-199.4 -1533.2,-167.1 -1393.2,-167.1 -1366.3,-199.4 -1183.8,-199.4 		"/>
       </g>
   </g>
   <rect x="-1741.7" y="-194.1" class="st2" width="52.3" height="32.2"/>
   <g>
       <g>
           <path class="st3" d="M-1202.5-208.4c0.2,0.5,0.2,0.9-0.1,1.3c0.1,0,0.2,0,0.3,0c3,0,5.9,0,8.9,0c0.4,0,0.7,0.3,0.7,0.7
               c0,0.3-0.3,0.6-0.6,0.6c-0.1,0-0.2,0-0.3,0c0.3,0.1,0.6,0.3,0.8,0.7c0.2,0.3,0.2,0.7,0.1,1c-0.2,0.6-0.7,0.9-1.4,0.9
               c-0.5,0-1-0.5-1.1-1.1c-0.1-0.5,0.1-1.1,1-1.5c-2.8,0-5.6,0-8.4,0c0.4,0.1,0.7,0.3,0.8,0.6c0.2,0.3,0.2,0.6,0.1,1
               c-0.1,0.6-0.7,1-1.3,1c-0.6,0-1.1-0.4-1.2-1c-0.1-0.6,0.2-1.2,1-1.5c-0.1,0-0.2,0-0.3,0c-0.4,0-0.8-0.4-0.6-0.8
               c0.1-0.3,0.3-0.7,0.5-1c0-0.1,0.1-0.2,0.1-0.4c-0.6-2.6-1.1-5.3-1.7-7.9c0,0,0-0.1,0-0.2c-0.1,0-0.1,0-0.2,0c-0.6,0-1.2,0-1.8,0
               c-0.4,0-0.7-0.3-0.7-0.6c0-0.4,0.3-0.6,0.7-0.6c0.8,0,1.7,0,2.5,0c0.3,0,0.5,0.1,0.6,0.4c0.1,0.1,0.1,0.3,0.1,0.4
               c0,0.1,0.1,0.3,0.1,0.4c0.1,0,0.2,0,0.2,0c3.9,0,7.8,0,11.6,0c0.5,0,0.8,0.3,0.8,0.8c0,1.6,0,3.3,0,4.9c0,0.5-0.2,0.7-0.6,0.7
               c-0.9,0.1-1.7,0.2-2.6,0.3c-1,0.1-2,0.2-3,0.3c-1,0.1-1.9,0.2-2.9,0.3C-1201.2-208.5-1201.8-208.5-1202.5-208.4z"/>
       </g>
       <path class="st3" d="M-1226.8-204.3h12.3c0-2.3-1.2-4.3-3.1-5.3c0.9-0.8,1.4-2,1.4-3.2c0-2.5-2-4.5-4.5-4.5c-2.5,0-4.5,2-4.5,4.5
           c0,1.3,0.5,2.4,1.4,3.2C-1225.6-208.6-1226.8-206.6-1226.8-204.3z"/>
   </g>
   <g>
       
           <image style="overflow:visible;opacity:0.75;" width="310" height="170" xlink:href="data:image/png;base64,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
   x5BRAAAAAElFTkSuQmCC" transform="matrix(0.24 0 0 0.24 -1750.62 -201.0374)">
       </image>
       <g>
           <g>
               <path class="st4" d="M-1727.4-182.9h-8.2v4.1c0,0.8-0.4,1.2-1.2,1.2h-0.7v-1h0.4c0.1,0,0.2-0.1,0.2-0.3v-5h9.4V-182.9z
                    M-1731.5-187.8v0.6h4v0.9h-9.6v-0.9h4.1v-0.6H-1731.5z M-1733.5-185.9l1.4,0.5l1.5-0.5h2.4l-2.8,0.8l2.4,0.8h-2.3l-1.3-0.4
                   l-1.5,0.4h-2.4l2.8-0.8l-2.4-0.8H-1733.5z M-1733.1-182.4l-0.2,0.6h1.5v-0.7h1.2v0.7h2.5v0.9h-2.5v0.8h2.8v0.9h-2.8v0.7h3.2v0.9
                   h-7.9v-0.9h3.5v-0.7h-3v-0.9h3v-0.8h-1.9c-0.1,0.2-0.4,0.3-0.7,0.3h-0.9v-0.9h0.5c0.1,0,0.1,0,0.2-0.1l0.3-0.7H-1733.1z"/>
               <path class="st4" d="M-1721.4-182.3v3.6c0,0.5-0.3,0.8-0.9,0.8h-3.3v-4.4H-1721.4z M-1716.5-187.3v3.2c0,0.6-0.3,0.9-0.9,0.9
                   h-7.8v-4.1H-1716.5z M-1722.6-179.2v-2h-1.8v2.2h1.5C-1722.7-179-1722.6-179.1-1722.6-179.2z M-1717.7-184.6v-1.6h-6.2v1.9h5.9
                   C-1717.9-184.3-1717.7-184.4-1717.7-184.6z M-1716.2-182.3v3.6c0,0.5-0.3,0.8-0.9,0.8h-3.3v-4.4H-1716.2z M-1717.5-179.2v-2h-1.8
                   v2.2h1.5C-1717.6-179-1717.5-179.1-1717.5-179.2z"/>
               <path class="st4" d="M-1706.7-187.5l0.9,1.2c0.2,0.3,0.3,0.4,0.5,0.4h0.8v1.2h-1.3c-0.3,0-0.5-0.1-0.7-0.4l-1-1.3h-4l-1,1.3
                   c-0.2,0.3-0.4,0.4-0.7,0.4h-1.4v-1.2h0.9c0.2,0,0.3-0.1,0.5-0.4l0.8-1.2H-1706.7z M-1712-184.1v5.2c0,0.7-0.4,1-1.2,1h-1.2v-1.1
                   h0.8c0.2,0,0.3-0.1,0.3-0.2v-5H-1712z M-1706-184.1v6.4h-1.2v-6.4H-1706z"/>
               <path class="st4" d="M-1701.5-181.9l-0.4,3c-0.1,0.7-0.4,1-0.8,1h-0.5v-1.1h0.2c0.1,0,0.2-0.2,0.2-0.5l0.3-2.5H-1701.5z
                    M-1700.3-187.9l-1.5,1.8h0.9l0.8-0.9h1.2l-2.8,3.4h1.7c0.1,0,0.2-0.1,0.2-0.2v-1.1h0.9v1.6c0,0.2-0.1,0.3-0.2,0.5
                   c-0.2,0.2-0.4,0.3-0.6,0.3h-0.6v5h-1.1v-5h-1.8v-0.8c0-0.1,0.1-0.3,0.3-0.5l1.1-1.3h-1.4v-0.8c0-0.1,0-0.1,0.1-0.2l1.4-1.8
                   H-1700.3z M-1699.2-181.9l0.4,2.5c0,0.2,0.1,0.3,0.2,0.3h0.1v1.1h-0.6c-0.3,0-0.5-0.3-0.6-0.9l-0.4-3H-1699.2z M-1693.3-187.5
                   v3.6c0,0.6-0.3,0.9-1,0.9h-1.5v-1h1.2c0.2,0,0.3-0.1,0.3-0.2v-2.4h-1.7l-0.4,2.5c-0.1,0.7-0.4,1.1-0.9,1.1h-0.9v-1h0.5
                   c0.1,0,0.2-0.2,0.3-0.5l0.3-2.1h-1.1v-1H-1693.3z M-1693.5-182.3v3.8c0,0.5-0.3,0.7-0.8,0.7h-3.7v-4.5H-1693.5z M-1694.7-179
                   v-2.3h-2.4v2.6h2.1C-1694.8-178.7-1694.7-178.8-1694.7-179z"/>
           </g>
       </g>
   </g>
   <g>
       <g>
           <path class="st5" d="M-1667.7-187l-0.3,0.7h6.5v0.9l-3.3,1.5l0.2,0.1c0.3,0.1,0.7,0.2,1.1,0.2h2.2v1h-3.1c-0.3,0-0.6-0.1-0.8-0.2
               l-1-0.5l-1.1,0.5c-0.3,0.1-0.6,0.2-1.1,0.2h-2.8v-1h2.5c0.3,0,0.6,0,0.8-0.1l0.5-0.2l-1.7-0.9c-0.1,0-0.2,0-0.3,0h-1.6v-0.9h1.1
               c0.2,0,0.3-0.1,0.4-0.3l0.5-1H-1667.7z M-1665.5-189.1v0.8h4.1v1.7h-1.2v-0.7h-7.1v0.8h-1.2v-1.8h4v-0.8H-1665.5z M-1661.6-182.1
               v2.1c0,0.5-0.3,0.7-0.9,0.7h-8.2v-2.8H-1661.6z M-1662.9-180.4v-0.7h-6.7v1h6.4C-1663-180.2-1662.9-180.3-1662.9-180.4z
                M-1667.4-185l1.3,0.5l2.2-1h-4.5l-0.1,0.1c-0.1,0.1-0.1,0.2-0.2,0.3H-1667.4z"/>
           <path class="st5" d="M-1654.4-183.6v0.5h4.2v0.9h-6.5l-0.2,0.4h0.9v1.7c0,0.1,0.1,0.2,0.2,0.2h1.9v0.7h-2.6
               c-0.4,0-0.6-0.1-0.6-0.4v-1.9l-0.9,1.7c-0.2,0.3-0.4,0.5-0.8,0.5h-1.2v-0.9h0.7c0.2,0,0.3-0.1,0.4-0.3l0.9-1.8h-2v-0.9h4.2v-0.5
               H-1654.4z M-1658.1-189l-0.2,0.5h0.9v-0.5h1v0.5h2.4v0.7h-2.4v0.6h2.6v0.7h-2.6v0.5h2.2v1.5c0,0.4-0.3,0.6-1,0.6h-0.6v-0.7h0.3
               c0.1,0,0.2,0,0.2-0.1v-0.6h-1.2v1.5h-1v-1.5h-1.2v1.5h-1v-2.2h2.2v-0.5h-2.5v-0.7h2.5v-0.6h-1.3c-0.1,0.1-0.2,0.2-0.4,0.2h-0.8
               v-0.7h0.4c0.1,0,0.2-0.1,0.2-0.2l0.2-0.5H-1658.1z M-1653.2-181.3h1.2c0.1,0,0.2-0.2,0.3-0.6h1c0,0.5-0.1,0.8-0.3,1
               c-0.1,0.2-0.4,0.3-0.6,0.3h-0.9l0.4,0.4c0.1,0.1,0.2,0.2,0.3,0.2h1.4v0.8h-1.9c-0.2,0-0.4-0.1-0.5-0.2l-2.5-2.5h1.4L-1653.2-181.3
               z M-1650.5-189v4.4c0,0.6-0.3,0.8-1,0.8h-1.8v-0.9h1.5c0.1,0,0.2,0,0.2-0.1v-4.2H-1650.5z M-1652.2-188.8v3.7h-1v-3.7H-1652.2z"/>
           <path class="st5" d="M-1645.6-189.1l-1,2.8v7.1h-1.2v-6h-1.3v-1.2h1c0.2,0,0.3-0.1,0.4-0.4l0.8-2.2H-1645.6z M-1643.5-188.9v4.2
               h2.2c0.2,0,0.3-0.2,0.3-0.5v-2.9h1.2v3.4c0,0.3-0.1,0.6-0.3,0.8c-0.2,0.2-0.4,0.3-0.7,0.3h-2.6v3c0,0.2,0.1,0.2,0.3,0.2h4v1.1
               h-4.7c-0.5,0-0.7-0.2-0.7-0.6v-8.9H-1643.5z"/>
       </g>
   </g>
   <g>
       <g>
           <path class="st5" d="M-1611.9-186.3h-4.7v-1h4.7V-186.3z M-1612.2-184.8h-4.1v-0.9h4.1V-184.8z M-1612.2-183.3h-4.1v-0.9h4.1
               V-183.3z M-1612.4-182.6v2.7c0,0.5-0.2,0.7-0.7,0.7h-3v-3.4H-1612.4z M-1612.5-187.9h-3.5v-0.9h3.5V-187.9z M-1613.4-180.4v-1.3
               h-1.7v1.5h1.5C-1613.4-180.2-1613.4-180.3-1613.4-180.4z M-1610.5-189v8.9c0,0.3-0.1,0.5-0.2,0.6c-0.1,0.2-0.3,0.2-0.6,0.2h-0.7
               v-0.9h0.3c0.1,0,0.2-0.1,0.2-0.4v-8.5H-1610.5z M-1608.9-188.5v8.8h-0.9v-8.8H-1608.9z M-1607-189v9.9h-1v-9.9H-1607z"/>
           <path class="st5" d="M-1604.1-183.4l-0.4,2.9c-0.1,0.7-0.3,1-0.7,1h-0.4v-1.1h0.2c0.1,0,0.1-0.2,0.2-0.5l0.3-2.4H-1604.1z
                M-1603-189.1l-1.3,1.7h0.7l0.6-0.9h1.2l-2.4,3.4h1.3c0.1,0,0.2-0.1,0.2-0.2v-1h0.9v1.5c0,0.2-0.1,0.3-0.2,0.5
               c-0.2,0.2-0.3,0.3-0.5,0.3h-0.3v4.8h-1v-4.8h-1.6v-0.7c0-0.1,0.1-0.3,0.3-0.5l0.9-1.3h-1.2v-0.8c0-0.1,0-0.1,0.1-0.2l1.2-1.7
               H-1603z M-1601.8-183.3l0.1,1.5c0,0.2,0.1,0.3,0.2,0.3h0.2v1h-0.6c-0.3,0-0.4-0.2-0.5-0.6l-0.3-2.2H-1601.8z M-1599.6-182.4
               l-0.5,2.3c-0.1,0.5-0.4,0.8-0.9,0.8h-0.6v-0.9h0.3c0.1,0,0.2-0.1,0.3-0.4l0.5-1.8H-1599.6z M-1595.6-187.6h-2.6v0.9h2.3v3.1
               c0,0.5-0.2,0.7-0.7,0.7h-1.6v3.8h-1v-3.8h-2.3v-3.8h2.3v-0.9h-2.4v-0.9h2.4v-0.6h1v0.6h2.6V-187.6z M-1599.2-185.8h-1.3v0.4h0.6
               l0.7,1.2V-185.8z M-1599.2-184.1h-0.6l-0.7-1.2v1.6h1.3V-184.1z M-1598.2-184.2l0.8-1.2h0.5v-0.4h-1.3V-184.2z M-1596.9-184v-1.2
               l-0.7,1.1h-0.6v0.4h1.1C-1597-183.7-1596.9-183.8-1596.9-184z M-1596.7-182.4l0.5,1.9c0,0.2,0.1,0.3,0.2,0.3h0.3v0.9h-0.8
               c-0.3,0-0.5-0.2-0.6-0.5l-0.7-2.5H-1596.7z"/>
           <path class="st5" d="M-1592.7-184.2v3.7c0,0.2,0.2,0.3,0.7,0.3h7.4v1h-7.6c-0.3,0-0.6-0.1-0.8-0.3c-0.1,0.2-0.4,0.3-0.7,0.3h-0.8
               v-0.9h0.3c0.2,0,0.3-0.1,0.3-0.3v-2.8h-0.6v-1H-1592.7z M-1592.8-188.9v1.8h-1.2v-1.8H-1592.8z M-1592.8-186.6v1.9h-1.2v-1.9
               H-1592.8z M-1589.8-189l0.3,0.9h2.2l0.3-0.9h1.4l-0.3,0.9h1.3v0.9h-3.2l-0.1,0.7h2.8v4.9c0,0.5-0.3,0.8-0.9,0.8h-6v-5.7h2.6
               l0.1-0.7h-3.1v-0.9h1.4l-0.3-0.9H-1589.8z M-1586.3-184.9v-0.7h-4.4v0.7H-1586.3z M-1586.3-183.4v-0.7h-4.4v0.7H-1586.3z
                M-1586.3-182.1v-0.4h-4.4v0.7h4.1C-1586.4-181.8-1586.3-181.9-1586.3-182.1z"/>
           <path class="st5" d="M-1579.9-188.9l0.4,0.5c0.1,0.1,0.2,0.2,0.2,0.2h0.3v0.9h-0.6c-0.2,0-0.3,0-0.4-0.2l-0.6-0.5h-1.1l-0.5,0.5
               c-0.1,0.1-0.2,0.2-0.4,0.2h-0.8v-0.9h0.4c0.1,0,0.2-0.1,0.2-0.2l0.4-0.5H-1579.9z M-1580.5-187.3v0.5h1.4v3.5
               c0,0.4-0.2,0.6-0.7,0.6h-2.3v0.7h3v0.9h-3v0.6c0,0.1,0.1,0.2,0.2,0.2h2.9v0.9h-3.5c-0.5,0-0.7-0.2-0.7-0.7v-6.7h1.5v-0.5H-1580.5z
                M-1582.1-185.1h2v-0.7h-2V-185.1z M-1582.1-184.2v0.7h1.8c0.1,0,0.2-0.1,0.2-0.2v-0.6H-1582.1z M-1575.4-189v0.7h1.8v1.6h-1.1
               v-0.7h-2.8v0.7h-1.1v-1.6h2v-0.7H-1575.4z M-1573.9-186.4v2.2c0,0.6-0.3,0.8-0.9,0.8h-2.5v0.9h3.4v2.2c0,0.5-0.3,0.8-0.9,0.8h-3.5
               v-7.1h1.2H-1573.9z M-1575.2-184.2c0.2,0,0.3-0.1,0.3-0.2v-1h-2.4v1.2H-1575.2z M-1575.2-180.2c0.2,0,0.3-0.1,0.3-0.2v-1h-2.4v1.2
               h0.2H-1575.2z"/>
       </g>
   </g>
   <g>
       <g>
           <path class="st5" d="M-1294.7-186.3h-4.7v-1h4.7V-186.3z M-1295-184.8h-4.1v-0.9h4.1V-184.8z M-1295-183.2h-4.1v-0.9h4.1V-183.2z
                M-1295.1-182.6v2.8c0,0.5-0.2,0.7-0.7,0.7h-3.1v-3.5H-1295.1z M-1295.3-187.9h-3.4v-0.9h3.4V-187.9z M-1296.1-180.4v-1.3h-1.8
               v1.6h1.6C-1296.2-180.1-1296.1-180.2-1296.1-180.4z M-1289.5-186.6h-0.8v6.4c0,0.3-0.1,0.5-0.3,0.7c-0.2,0.2-0.4,0.3-0.7,0.3h-2.4
               v-1h2c0.1,0,0.2-0.2,0.2-0.5v-6h-3v-1h3v-1.4h1.1v1.4h0.8V-186.6z M-1293.1-185.5l0.5,2.3c0.1,0.3,0.2,0.4,0.3,0.4h0.3v1h-0.7
               c-0.5,0-0.8-0.3-0.9-0.9l-0.6-2.9H-1293.1z"/>
           <path class="st5" d="M-1284.6-186.5h-3.7v-0.9h3.7V-186.5z M-1284.7-185h-3.4v-0.9h3.4V-185z M-1284.7-183.5h-3.4v-0.9h3.4V-183.5
               z M-1284.8-187.9h-3.3v-0.9h3.3V-187.9z M-1284.9-182.8v2.9c0,0.4-0.2,0.7-0.7,0.7h-2.5v-3.6H-1284.9z M-1285.8-180.4v-1.6h-1.2
               v1.9h1C-1285.9-180.1-1285.8-180.2-1285.8-180.4z M-1279.9-188.8l0.6,0.8c0.1,0.2,0.2,0.3,0.4,0.3h0.6v0.9h-0.9
               c-0.2,0-0.4-0.1-0.5-0.2l-0.7-0.8h-1.9l-0.7,0.8c-0.1,0.2-0.3,0.2-0.5,0.2h-0.8v-0.9h0.4c0.1,0,0.2-0.1,0.4-0.3l0.6-0.8H-1279.9z
                M-1278.7-180.1c0,0.3-0.1,0.5-0.2,0.6c-0.1,0.2-0.3,0.2-0.6,0.2h-0.7v-0.9h0.3c0.1,0,0.2-0.1,0.2-0.4v-0.9h-0.7v2.1h-0.9v-2.1
               h-0.7v2.1h-0.9v-2.1h-0.7v2.3h-1v-5.4h5.7V-180.1z M-1278.7-185.4h-5.7v-0.9h5.7V-185.4z M-1282.7-182.3v-1.2h-0.7v1.2H-1282.7z
                M-1281.8-182.3h0.7v-1.2h-0.7V-182.3z M-1280.3-182.3h0.7v-1.2h-0.7V-182.3z"/>
           <path class="st5" d="M-1267.5-187.8h-8.3v7.2c0,0.2,0.1,0.3,0.3,0.3h7.9v0.9h-8.2c-0.7,0-1.1-0.3-1.1-0.9v-7.5h-0.6v-1h10V-187.8z
                M-1271.9-183.7v2c0,0.4-0.2,0.6-0.5,0.6h-2.8v-2.6H-1271.9z M-1268.3-187.1v1.9c0,0.4-0.2,0.6-0.5,0.6h-5.9v-2.6H-1268.3z
                M-1272.9-182v-0.9h-1.3v1.1h1.2C-1272.9-181.9-1272.9-181.9-1272.9-182z M-1269.3-185.5v-0.7h-4.4v0.9h4.2
               C-1269.4-185.4-1269.3-185.4-1269.3-185.5z M-1267.9-183.7v2c0,0.4-0.2,0.6-0.5,0.6h-2.8v-2.6H-1267.9z M-1268.9-182v-0.9h-1.3
               v1.1h1.2C-1268.9-181.9-1268.9-181.9-1268.9-182z"/>
       </g>
   </g>
   <g>
       <g>
           <path class="st5" d="M-1238.8-179.1h-1v-9.8h4.1v3c0,0.5-0.3,0.7-0.9,0.7h-2.2V-179.1z M-1238.8-188.1v0.7h2v-0.7h-0.1H-1238.8z
                M-1238.8-186h1.8c0.1,0,0.2-0.1,0.2-0.2v-0.5h-2V-186z M-1236.6-184.9l-0.8,0.9h1c0,0,0.1,0,0.1,0l-0.1-0.5h0.7
               c0,0.3,0.1,0.4,0.1,0.4c0,0,0,0,0,0.1v0.3c0,0.2-0.2,0.3-0.5,0.3h-0.6l-0.7,0.8h1.1c0.1,0,0.1,0,0.1,0l-0.1-0.5h0.7
               c0.1,0.3,0.1,0.4,0.1,0.4c0,0,0,0.1,0,0.1v0.3c0,0.2-0.1,0.3-0.4,0.3v1.9c0,0.2-0.1,0.4-0.2,0.5c-0.1,0.1-0.3,0.2-0.5,0.2h-1.8
               v-0.7h1.4c0.1,0,0.2-0.1,0.2-0.4v-0.2h-1.3v-1h0.7v0.4h0.6v-0.7h-1.6v-0.8l0.7-0.6h-0.7v-0.8l0.8-0.8H-1236.6z M-1233.6-184.9
               l-0.6,0.9h1.1c0,0,0.1,0,0.1,0l-0.2-0.5h0.7c0.1,0.3,0.1,0.4,0.1,0.4c0,0,0,0,0,0.1v0.3c0,0.2-0.2,0.3-0.5,0.3h-0.8l-0.6,0.8h1.1
               c0,0,0.1,0,0.1,0l-0.1-0.5h0.7c0.1,0.3,0.1,0.4,0.1,0.4c0,0,0,0.1,0,0.1v0.3c0,0.2-0.2,0.3-0.5,0.3h-1.1v0.7h0.5
               c0.1,0,0.1,0,0.1-0.1v-0.4h0.7v0.8c0,0.3-0.1,0.4-0.4,0.4h-0.9v1.3h-0.9v-2.7h-0.4v-0.8l0.6-0.7h-0.6v-0.8l0.6-0.7H-1233.6z
                M-1231-188.9v8.9c0,0.5-0.3,0.8-0.9,0.8h-1.2v-0.9h0.8c0.2,0,0.3-0.1,0.3-0.2v-4.9h-2.3c-0.5,0-0.7-0.2-0.7-0.6v-3.1h1.2H-1231z
                M-1232-188.1h-2v0.7h2V-188.1z M-1232-186.6h-2v0.5c0,0.2,0,0.2,0.1,0.2h1.9V-186.6z"/>
           <path class="st5" d="M-1226.2-189v1h1.8v1h-2.8l-0.1,1.1h2.5v5.7c0,0.6-0.3,0.9-1,0.9h-1.3v-1h0.9c0.2,0,0.3-0.1,0.3-0.2v-4.3
               h-1.5l-0.2,4.2c0,0.5-0.1,0.8-0.3,1c-0.2,0.2-0.5,0.4-0.7,0.4h-0.7v-1h0.4c0.2,0,0.3-0.2,0.3-0.6l0.3-6.1h-0.9v-1h1.8v-1H-1226.2z
                M-1220.6-188.8l0.6,1.1c0.1,0.3,0.2,0.4,0.3,0.4h0.4v1h-0.9c-0.2,0-0.4-0.1-0.5-0.3l-0.7-1.2h-0.8l-0.7,1.2
               c-0.1,0.2-0.3,0.3-0.5,0.3h-0.9v-1h0.5c0.1,0,0.2-0.1,0.3-0.4l0.6-1.1H-1220.6z M-1222.4-185.7l0.4,1.3c0,0.2,0.1,0.3,0.3,0.3h2.1
               v1h-2.7c-0.4,0-0.6-0.2-0.7-0.6l-0.6-2.1H-1222.4z M-1222.4-182.3l0.4,1.5c0,0.2,0.1,0.3,0.3,0.3h2.1v1h-2.7
               c-0.4,0-0.6-0.2-0.7-0.6l-0.6-2.2H-1222.4z"/>
           <path class="st5" d="M-1213.5-189c0,0.6-0.1,1-0.3,1.3c-0.2,0.2-0.4,0.4-0.7,0.4h-0.1v1.1h2.3v-2.7h1.2v2.7h2.7v1.1h-2.7v2.9h0.7
               c0.1,0,0.2-0.1,0.2-0.2v-2.1h1.2v2.4c0,0.7-0.4,1-1.1,1h-1v0.7c0,0.2,0.1,0.3,0.3,0.3h2.4v1h-2.7c-0.8,0-1.2-0.4-1.2-1v-0.9h-0.9
               v-1h0.9v-2.9h-2.3v1h1.2v1.1h-1.2v2.8c0,0.7-0.4,1-1.2,1h-1.9v-1.1h1.6c0.2,0,0.3-0.1,0.3-0.2v-1.8l-0.5,0.5
               c-0.2,0.2-0.3,0.2-0.6,0.2h-1.2v-1h0.7c0.2,0,0.4-0.1,0.5-0.2l1-1.2c0,0,0,0,0,0v-1.2h-2.3v-1.1h2.3v-1.1h-2.1v-1h2.9
               c0.2,0,0.3-0.2,0.4-0.6H-1213.5z M-1209.4-188.9v0.9c0,0.1,0.1,0.2,0.2,0.2h0.5v0.9h-1.2c-0.4,0-0.6-0.2-0.6-0.5v-1.4H-1209.4z"/>
           <path class="st5" d="M-1204.8-189.1l-0.7,2.4v7.6h-1.1v-6.2h-0.6v-1.1h0.3c0.1,0,0.2-0.1,0.3-0.4l0.6-2.2H-1204.8z M-1203.3-179.2
               h-1v-9.7h3.1v4.7c0,0.6-0.3,0.8-0.9,0.8h-1.2V-179.2z M-1203.3-188v1.4h1.1v-1.4h-0.1H-1203.3z M-1203.3-184.3h0.9
               c0.1,0,0.2-0.1,0.2-0.2v-1.2h-1.1V-184.3z M-1197.6-188.8v8.8c0,0.6-0.3,0.9-0.9,0.9h-1.4v-0.9h1c0.2,0,0.3-0.1,0.3-0.2v-3h-1.4
               c-0.5,0-0.7-0.2-0.7-0.7v-4.8h1.1H-1197.6z M-1198.6-188h-1.2v1.4h1.2V-188z M-1198.6-185.7h-1.2v1.2c0,0.2,0,0.3,0.1,0.3h1
               V-185.7z"/>
       </g>
   </g>
   <g>
       <g>
           <path class="st5" d="M-1346.6-189.2v0.7h4.2v1h-9.7v-1h4.1v-0.7H-1346.6z M-1349.1-187.2l0.4,1.1h3.3l0.5-1.1h1.2l-0.5,1.1h1.5
               v5.8c0,0.3-0.1,0.6-0.3,0.8c-0.2,0.2-0.4,0.3-0.7,0.3h-1.2v-0.7c-0.1,0.1-0.3,0.2-0.5,0.2h-4.4v-2.8h5.2v2c0,0.2,0,0.3-0.1,0.4
               h0.6c0.1,0,0.2-0.2,0.2-0.5v-4.4h-1.7v0.8c0,0.1,0.1,0.2,0.2,0.2h1.1v0.9h-1.8c-0.4,0-0.6-0.2-0.6-0.5v-1.3h-1.2v1.2
               c0,0.4-0.2,0.5-0.6,0.5h-1.7v-0.9h1.1c0.1,0,0.2-0.1,0.2-0.2v-0.7h-1.7v6h-1.2v-6.9h1.7l-0.4-1.1H-1349.1z M-1345.7-181v-0.7h-3
               v0.9h2.8C-1345.8-180.7-1345.7-180.8-1345.7-181z"/>
           <path class="st5" d="M-1338.1-186.6h-0.9v6.2h0.9v1h-3.1v-1h1v-6.2h-0.9v-1h0.9v-1.4h1.1v1.4h0.9V-186.6z M-1331.1-187h-2.1
               l0.5,4.7h0.2c0.1,0,0.2-0.2,0.2-0.5v-3.5h1v4.2c0,0.3-0.1,0.5-0.3,0.6c-0.1,0.2-0.3,0.2-0.6,0.2h-0.5l0.1,0.7
               c0,0.2,0.1,0.3,0.2,0.3h1v1h-1.6c-0.4,0-0.6-0.3-0.7-0.8l-0.1-1.2h-0.7v-1h0.6l-0.5-4.7h-2.2v1.2h1.9v5.5c0,0.6-0.3,0.9-0.9,0.9
               h-0.7v-0.9h0.4c0.1,0,0.2-0.1,0.2-0.2v-4.2h-0.9v4.7c0,0.6-0.3,0.9-0.8,0.9h-0.7v-1h0.4c0,0,0.1-0.1,0.1-0.2v-7.6h3.1l-0.1-1.1h1
               l0.1,1.1h0.7l-0.1-0.9h1l0.1,0.9h0.5V-187z"/>
       </g>
   </g>
   <g>
       <path class="st6" d="M14,22.4c2.3-0.1,4.5-1.1,6.1-2.9c-1.8-1.2-2.9-3.1-3-5.2c0-0.1,0-0.2,0-0.3H14V22.4z"/>
       <path class="st6" d="M20.3,8.7c-0.6-0.7-1.2-1.3-2-1.8c-1.2-0.8-2.6-1.2-3.9-1.3c-0.1,0-0.2,0-0.3,0v7.8h3.2
           C17.5,11.5,18.6,9.8,20.3,8.7z"/>
       <path class="st6" d="M6.7,9.5c-0.8,1.2-1.2,2.6-1.3,3.9h7.9V5.6C10.7,5.8,8.2,7.1,6.7,9.5z"/>
       <path class="st6" d="M9.2,21.1c1.3,0.8,2.6,1.2,4,1.3V14H5.4C5.4,16.8,6.7,19.5,9.2,21.1z"/>
       <path class="st5" d="M5.4,14H0.3l0,0l3.8,1.5l0.5,1.9l-2.4,3.3l1.4,1.9l3.9-1.3l1.6,1.1l0.3,4.1l2.3,0.6l1.6-2.5v-2.2
           c-1.4-0.1-2.8-0.5-4-1.3C6.7,19.5,5.4,16.8,5.4,14z"/>
       <path class="st5" d="M6.7,9.5c1.5-2.4,4-3.7,6.6-3.9V0.3l-2.1,0.2l-0.8,4L8.6,5.4L4.9,3.6L3.2,5.3l1.9,3.6l-0.8,1.8l-4,1l-0.1,1.7
           h5.1C5.5,12,5.9,10.7,6.7,9.5z"/>
       <path class="st5" d="M18.3,6.9c0.8,0.5,1.5,1.1,2,1.8c0.4-0.3,0.9-0.5,1.4-0.8l-0.6-0.8l1.1-3.9l-2-1.3l-3.2,2.5L15.2,4l-1-2.3
           L14,1.4v4.2c0.1,0,0.2,0,0.3,0C15.7,5.7,17,6.1,18.3,6.9z"/>
       <path class="st5" d="M14,22.4v1.2l1.8-0.2l2.8,2.9l2.1-1l-0.6-4l1.1-1.2c-0.4-0.2-0.8-0.4-1.2-0.7C18.6,21.3,16.3,22.3,14,22.4z"/>
   </g>
   <g>
       <circle class="st5" cx="13.6" cy="13.7" r="2.2"/>
       <path class="st5" d="M13.2,8.9V7.2c-3.3,0.2-5.9,2.9-6.1,6.2h1.6C9,11,10.9,9.1,13.2,8.9z"/>
       <path class="st5" d="M8.8,14H7.2c0.2,3.3,2.8,6,6.1,6.2v-1.7C10.9,18.3,9,16.4,8.8,14z"/>
       <path class="st5" d="M14,18.5v1.7c3.3-0.2,6-2.9,6.2-6.2h-1.7C18.3,16.4,16.4,18.3,14,18.5z"/>
       <path class="st5" d="M18.5,13.4h1.7C20,10,17.4,7.4,14,7.2v1.7C16.4,9.1,18.3,11,18.5,13.4z"/>
   </g>
   <g>
       <rect x="25.8" y="10.3" class="st6" width="7.7" height="3.1"/>
       <rect x="74.2" y="12.9" class="st6" width="5.4" height="0.5"/>
       <rect x="25.8" y="14" class="st6" width="7.7" height="4"/>
       <polygon class="st6" points="57.7,17.3 59.5,14 55.9,14 	"/>
       <rect x="41.4" y="16.6" class="st6" width="5.4" height="1.5"/>
       <path class="st5" d="M25.8,10.3h7.7v3.1h3v-3.2c0-0.8-0.3-1.4-0.8-2c-0.5-0.6-1.2-0.8-2-0.8H22.8v6h2.9V10.3z"/>
       <path class="st5" d="M33.5,18h-7.7v-4h-2.9v7h10.8c0.8,0,1.5-0.3,2-0.8c0.6-0.6,0.8-1.2,0.8-2V14h-3V18z"/>
       <path class="st5" d="M46.8,14h-8.3v4.2c0,0.7,0.3,1.4,0.8,1.9c0.5,0.5,1.2,0.8,1.9,0.8h8.4v-7L46.8,14L46.8,14z M46.8,18.1h-5.4
           v-1.5h5.4V18.1z"/>
       <path class="st5" d="M49.7,12.7c0-0.7-0.3-1.4-0.8-1.9c-0.5-0.5-1.2-0.8-1.9-0.8h-8.4v2.9h8.3v0.5h2.9V12.7z"/>
       <polygon class="st5" points="57.7,17.3 55.9,14 52.6,14 56.4,21 58.9,21 62.8,14 59.5,14 	"/>
       <polygon class="st5" points="65,10 61.7,10 59.8,13.3 63.1,13.3 	"/>
       <polygon class="st5" points="53.7,10 50.4,10 52.2,13.3 55.6,13.3 	"/>
       <rect x="66.2" y="10" class="st5" width="2.9" height="3.4"/>
       <rect x="66.2" y="14" class="st5" width="2.9" height="7"/>
       <rect x="71.3" y="14" class="st5" width="2.9" height="7"/>
       <path class="st5" d="M74.2,12.9h5.4v0.5h2.9v-0.6c0-0.7-0.3-1.4-0.8-1.9c-0.5-0.5-1.2-0.8-1.9-0.8h-8.4v3.4h2.9V12.9z"/>
       <rect x="79.6" y="14" class="st5" width="2.9" height="7"/>
       <path class="st5" d="M86.9,12.9h8.2V10h-8.4c-0.7,0-1.4,0.3-1.9,0.8C84.3,11.3,84,12,84,12.7v0.6h2.9V12.9z"/>
       <path class="st5" d="M84,18.2c0,0.7,0.3,1.4,0.8,1.9c0.5,0.5,1.2,0.8,1.9,0.8h8.4v-2.9h-8.3V14H84V18.2z"/>
       <rect x="97.2" y="14" class="st5" width="2.9" height="7"/>
       <rect x="97.2" y="10" class="st5" width="2.9" height="3.4"/>
   </g>
   <circle class="st5" cx="102.8" cy="20.2" r="1.3"/>
   <g>
       <path class="st4" d="M-1729.2-170.8c-0.3,0.2-0.6,0.3-1.1,0.3h-0.9v2.4h-0.8v-6.2h1.7c0.5,0,0.9,0.1,1.1,0.3c0.3,0.2,0.4,0.6,0.4,1
           v1C-1728.8-171.4-1729-171-1729.2-170.8z M-1729.7-173.4c-0.1-0.1-0.3-0.1-0.5-0.1h-1v2.4h1c0.2,0,0.4-0.1,0.5-0.2
           c0.1-0.1,0.2-0.3,0.2-0.5v-1.2C-1729.6-173.1-1729.6-173.3-1729.7-173.4z"/>
       <path class="st4" d="M-1726.5-168.7v-3.1h-0.6v-0.7h1.3v0.2c0.2-0.2,0.4-0.2,0.7-0.2h0.9v0.7h-1c-0.2,0-0.3,0.1-0.4,0.2
           c-0.1,0.1-0.1,0.2-0.1,0.4v2.5h1v0.7h-2.3v-0.7H-1726.5z"/>
       <path class="st4" d="M-1719.7-168.4c-0.2,0.2-0.6,0.3-1.1,0.3h-0.3c-0.5,0-0.9-0.1-1.1-0.3c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6
           c0-0.5,0.1-0.8,0.4-1.1c0.2-0.2,0.6-0.3,1.1-0.3h0.3c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.6,0.4,1.1v1.6
           C-1719.3-169-1719.4-168.6-1719.7-168.4z M-1720.2-171.6c-0.1-0.1-0.3-0.1-0.5-0.1h-0.5c-0.2,0-0.4,0.1-0.5,0.1
           c-0.1,0.1-0.2,0.2-0.2,0.4v1.9c0,0.2,0.1,0.3,0.2,0.4c0.1,0.1,0.3,0.1,0.5,0.1h0.5c0.2,0,0.4,0,0.5-0.1s0.2-0.2,0.2-0.4v-1.9
           C-1720-171.4-1720.1-171.5-1720.2-171.6z"/>
       <path class="st4" d="M-1716-168.1h-0.4c-0.5,0-0.9-0.1-1.1-0.3c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6c0-0.5,0.1-0.8,0.4-1.1
           c0.2-0.2,0.6-0.3,1.1-0.3h1v-1.8h0.7v6.2h-0.7v-0.2C-1715.5-168.1-1715.7-168.1-1716-168.1z M-1715.4-168.9
           c0.1-0.1,0.1-0.2,0.1-0.3v-2.6h-1.1c-0.2,0-0.4,0.1-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.4v1.9c0,0.2,0.1,0.3,0.2,0.4s0.3,0.1,0.5,0.1
           h0.5C-1715.7-168.7-1715.5-168.8-1715.4-168.9z"/>
       <path class="st4" d="M-1711.3-168.1h-0.3c-0.5,0-0.8-0.1-1.1-0.3s-0.3-0.6-0.3-1.1v-3h0.7v3.2c0,0.2,0.1,0.3,0.2,0.4
           c0.1,0.1,0.2,0.2,0.4,0.2h0.5c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.2-0.3v-3.3h0.7v4.4h-0.7v-0.2
           C-1710.8-168.1-1711-168.1-1711.3-168.1z"/>
       <path class="st4" d="M-1707.6-168.4c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6c0-0.5,0.1-0.8,0.4-1.1c0.2-0.2,0.6-0.3,1.1-0.3h1.1v0.7h-1.2
           c-0.2,0-0.4,0.1-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.4v1.9c0,0.2,0.1,0.3,0.2,0.4c0.1,0.1,0.3,0.1,0.5,0.1h1.2v0.7h-1.1
           C-1707-168.1-1707.4-168.2-1707.6-168.4z"/>
       <path class="st4" d="M-1702.3-168.3c-0.2-0.2-0.2-0.4-0.2-0.8v-2.7h-0.8v-0.7h0.8v-1.1h0.7v1.1h1.3v0.7h-1.3v2.7
           c0,0.1,0,0.2,0.1,0.3c0.1,0.1,0.2,0.1,0.3,0.1h0.9v0.7h-1.1C-1701.9-168.1-1702.1-168.1-1702.3-168.3z"/>
   </g>
   <g>
       <path class="st7" d="M-1677.4-168.4c-0.3-0.2-0.4-0.6-0.4-1.1v-3.2c0-0.5,0.1-0.9,0.4-1.1c0.3-0.2,0.7-0.4,1.2-0.4h1.2v0.7h-1.3
           c-0.2,0-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.3-0.2,0.5v3.5c0,0.2,0.1,0.3,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2h1.3v0.7h-1.2
           C-1676.7-168.1-1677.1-168.2-1677.4-168.4z"/>
       <path class="st7" d="M-1671.5-168.1h-0.3c-0.5,0-0.8-0.1-1.1-0.3c-0.2-0.2-0.3-0.6-0.3-1.1v-3h0.7v3.2c0,0.2,0.1,0.3,0.2,0.4
           c0.1,0.1,0.2,0.2,0.4,0.2h0.5c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.2-0.3v-3.3h0.7v4.4h-0.7v-0.2
           C-1671-168.1-1671.2-168.1-1671.5-168.1z"/>
       <path class="st7" d="M-1665.9-168.3c-0.2,0.2-0.6,0.3-1,0.3h-1.3v-0.7h1.4c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.1-0.3v-0.5
           c0-0.3-0.1-0.4-0.4-0.4h-0.3c-0.4,0-0.7-0.1-0.9-0.3c-0.2-0.2-0.3-0.5-0.3-0.8v-0.3c0-0.4,0.1-0.7,0.3-0.8c0.2-0.2,0.6-0.3,1-0.3
           h1.2v0.7h-1.3c-0.1,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3v0.3c0,0.1,0,0.2,0.1,0.3c0.1,0.1,0.2,0.1,0.3,0.1h0.3
           c0.4,0,0.7,0.1,0.9,0.3c0.2,0.2,0.3,0.5,0.3,0.8v0.4C-1665.5-168.8-1665.7-168.5-1665.9-168.3z"/>
       <path class="st7" d="M-1662.5-168.3c-0.2-0.2-0.2-0.4-0.2-0.8v-2.7h-0.8v-0.7h0.8v-1.1h0.7v1.1h1.3v0.7h-1.3v2.7
           c0,0.1,0,0.2,0.1,0.3c0.1,0.1,0.2,0.1,0.3,0.1h0.9v0.7h-1.1C-1662.1-168.1-1662.3-168.1-1662.5-168.3z"/>
       <path class="st7" d="M-1656.1-168.4c-0.2,0.2-0.6,0.3-1.1,0.3h-0.3c-0.5,0-0.9-0.1-1.1-0.3c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6
           c0-0.5,0.1-0.8,0.4-1.1c0.2-0.2,0.6-0.3,1.1-0.3h0.3c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.6,0.4,1.1v1.6
           C-1655.7-169-1655.9-168.6-1656.1-168.4z M-1656.7-171.6c-0.1-0.1-0.3-0.1-0.5-0.1h-0.5c-0.2,0-0.4,0.1-0.5,0.1
           c-0.1,0.1-0.2,0.2-0.2,0.4v1.9c0,0.2,0.1,0.3,0.2,0.4c0.1,0.1,0.3,0.1,0.5,0.1h0.5c0.2,0,0.4,0,0.5-0.1s0.2-0.2,0.2-0.4v-1.9
           C-1656.5-171.4-1656.6-171.5-1656.7-171.6z"/>
       <path class="st7" d="M-1654-172.4v0.2c0.2-0.1,0.3-0.2,0.5-0.2h0.1c0.4,0,0.7,0.1,0.9,0.4c0.2-0.2,0.4-0.4,0.8-0.4h0.1
           c0.4,0,0.6,0.1,0.8,0.3c0.2,0.2,0.3,0.5,0.3,1v3.2h-0.7v-3.2c0-0.2,0-0.4-0.1-0.5c0-0.1-0.2-0.1-0.3-0.1h-0.1
           c-0.2,0-0.3,0.1-0.4,0.2c-0.1,0.1-0.1,0.3-0.1,0.4v3.2h-0.7v-3.2c0-0.2,0-0.4-0.1-0.5c-0.1-0.1-0.2-0.1-0.3-0.1h-0.1
           c-0.2,0-0.3,0.1-0.4,0.2c-0.1,0.1-0.1,0.2-0.1,0.3v3.3h-0.7v-4.4H-1654z"/>
       <path class="st7" d="M-1649.6-171.8v-0.7h2v3.7h1.3v0.7h-2v-3.7H-1649.6z M-1647.5-174.2v0.8h-0.8v-0.8H-1647.5z"/>
       <path class="st7" d="M-1641.8-168.1h-2.8v-0.7l2.1-3h-1.9v-0.7h2.7v0.8l-2,3h2V-168.1z"/>
       <path class="st7" d="M-1639.6-168.4c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6c0-0.5,0.1-0.9,0.3-1.1c0.2-0.2,0.6-0.3,1.1-0.3h0.4
           c0.4,0,0.7,0.1,0.9,0.3c0.2,0.2,0.3,0.6,0.3,1v1.1h-2.3v0.7c0,0.2,0.1,0.3,0.2,0.4s0.3,0.1,0.5,0.1h1.4v0.7h-1.3
           C-1639-168.1-1639.3-168.2-1639.6-168.4z M-1637.6-171.3c0-0.2,0-0.3-0.1-0.4c-0.1-0.1-0.2-0.1-0.4-0.1h-0.5c-0.2,0-0.4,0-0.4,0.1
           s-0.1,0.2-0.1,0.4v0.6h1.6V-171.3z"/>
       <path class="st7" d="M-1633.4-168.1h-0.4c-0.5,0-0.9-0.1-1.1-0.3c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6c0-0.5,0.1-0.8,0.4-1.1
           c0.2-0.2,0.6-0.3,1.1-0.3h1v-1.8h0.7v6.2h-0.7v-0.2C-1632.9-168.1-1633.2-168.1-1633.4-168.1z M-1632.9-168.9
           c0.1-0.1,0.1-0.2,0.1-0.3v-2.6h-1.1c-0.2,0-0.4,0.1-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.4v1.9c0,0.2,0.1,0.3,0.2,0.4s0.3,0.1,0.5,0.1
           h0.5C-1633.1-168.7-1633-168.8-1632.9-168.9z"/>
   </g>
   <g>
       <path class="st7" d="M-1612.8-168.1v-5.5h-1.4v-0.7h3.6v0.7h-1.4v5.5H-1612.8z"/>
       <path class="st7" d="M-1608.5-168.7v-3.1h-0.6v-0.7h1.3v0.2c0.2-0.2,0.4-0.2,0.7-0.2h0.9v0.7h-1c-0.2,0-0.3,0.1-0.4,0.2
           c-0.1,0.1-0.1,0.2-0.1,0.4v2.5h1v0.7h-2.3v-0.7H-1608.5z"/>
       <path class="st7" d="M-1601.9-168.1c-0.1,0-0.2-0.1-0.2-0.2c-0.1,0.2-0.3,0.3-0.5,0.3h-0.8c-0.4,0-0.8-0.1-1-0.3
           c-0.2-0.2-0.3-0.5-0.3-0.9v-0.2c0-0.9,0.4-1.4,1.3-1.4h1.1v-0.4c0-0.2-0.1-0.3-0.2-0.4c-0.1-0.1-0.3-0.1-0.5-0.1h-1.4v-0.7h1.3
           c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.6,0.4,1.1v2.1c0,0.1,0,0.2,0.1,0.2c0.1,0,0.2,0.1,0.3,0.1v0.6h-0.5
           C-1601.7-168.1-1601.8-168.1-1601.9-168.1z M-1602.4-168.8c0-0.1,0.1-0.2,0.1-0.3v-1h-1.1c-0.2,0-0.3,0.1-0.4,0.1
           c-0.1,0.1-0.1,0.2-0.1,0.4v0.4c0,0.2,0,0.3,0.1,0.3c0.1,0.1,0.2,0.1,0.3,0.1h0.8C-1602.6-168.7-1602.4-168.8-1602.4-168.8z"/>
       <path class="st7" d="M-1599.8-171.8v-0.7h2v3.7h1.3v0.7h-2v-3.7H-1599.8z M-1597.8-174.2v0.8h-0.8v-0.8H-1597.8z"/>
       <path class="st7" d="M-1594.3-172.4v0.2c0.2-0.1,0.4-0.2,0.7-0.2h0.4c0.5,0,0.8,0.1,1.1,0.3c0.2,0.2,0.3,0.6,0.3,1.1v3h-0.7v-3.2
           c0-0.2-0.1-0.3-0.2-0.4c-0.1-0.1-0.2-0.2-0.4-0.2h-0.6c-0.2,0-0.3,0.1-0.4,0.2c-0.1,0.1-0.1,0.2-0.1,0.3v3.3h-0.7v-4.4H-1594.3z"/>
       <path class="st7" d="M-1590.3-171.8v-0.7h2v3.7h1.3v0.7h-2v-3.7H-1590.3z M-1588.3-174.2v0.8h-0.8v-0.8H-1588.3z"/>
       <path class="st7" d="M-1584.8-172.4v0.2c0.2-0.1,0.4-0.2,0.7-0.2h0.4c0.5,0,0.8,0.1,1.1,0.3c0.2,0.2,0.3,0.6,0.3,1.1v3h-0.7v-3.2
           c0-0.2-0.1-0.3-0.2-0.4c-0.1-0.1-0.2-0.2-0.4-0.2h-0.6c-0.2,0-0.3,0.1-0.4,0.2c-0.1,0.1-0.1,0.2-0.1,0.3v3.3h-0.7v-4.4H-1584.8z"/>
       <path class="st7" d="M-1577.8-166.9c-0.2,0.2-0.6,0.3-1.1,0.3h-1.8v-0.7h1.9c0.2,0,0.4,0,0.5-0.1c0.1-0.1,0.2-0.2,0.2-0.3v-0.3
           c0-0.1-0.1-0.2-0.2-0.3c-0.1-0.1-0.3-0.1-0.5-0.1h-1.5v-1.2c-0.2-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.1-0.5-0.1-0.8v-0.2
           c0-0.5,0.1-0.8,0.4-1.1c0.2-0.2,0.6-0.3,1.1-0.3h1.8v1.6c0,0.4-0.1,0.8-0.4,1c-0.2,0.2-0.6,0.4-1,0.4h-0.7v0.4h0.7
           c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.5,0.4,0.9v0.1C-1577.4-167.3-1577.6-167-1577.8-166.9z M-1578.5-170.2
           c0.1-0.1,0.1-0.2,0.2-0.4v-1.2h-1.2c-0.2,0-0.4,0.1-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.4v0.6c0,0.2,0.1,0.3,0.2,0.4
           c0.1,0.1,0.3,0.1,0.5,0.1h0.6C-1578.7-170.1-1578.6-170.1-1578.5-170.2z"/>
   </g>
   <g>
       <path class="st7" d="M-1348.6-168.4c-0.3,0.2-0.7,0.4-1.2,0.4h-1.2v-0.7h1.3c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5v-0.9
           c0-0.2,0-0.3-0.1-0.4c-0.1-0.1-0.2-0.2-0.4-0.2h-0.3c-0.4,0-0.8-0.1-1-0.4c-0.3-0.3-0.4-0.6-0.4-1.1v-0.3c0-0.5,0.1-0.9,0.4-1.1
           c0.3-0.2,0.7-0.4,1.2-0.4h1.3v0.7h-1.3c-0.2,0-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.3-0.2,0.5v0.7c0,0.2,0.1,0.3,0.2,0.5
           c0.1,0.1,0.3,0.2,0.5,0.2h0.3c0.4,0,0.7,0.1,1,0.4c0.2,0.2,0.3,0.6,0.3,1.1v0.6C-1348.2-169-1348.3-168.7-1348.6-168.4z"/>
       <path class="st7" d="M-1345.8-174.2v1.9c0.2-0.1,0.4-0.2,0.7-0.2h0.4c0.5,0,0.8,0.1,1.1,0.3c0.2,0.2,0.3,0.6,0.3,1.1v3h-0.7v-3.2
           c0-0.2-0.1-0.3-0.2-0.4c-0.1-0.1-0.2-0.2-0.4-0.2h-0.6c-0.2,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3v3.3h-0.7v-6.2H-1345.8z"/>
       <path class="st7" d="M-1338.9-168.4c-0.2,0.2-0.6,0.3-1.1,0.3h-0.3c-0.5,0-0.9-0.1-1.1-0.3c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6
           c0-0.5,0.1-0.8,0.4-1.1c0.2-0.2,0.6-0.3,1.1-0.3h0.3c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.6,0.4,1.1v1.6
           C-1338.5-169-1338.6-168.6-1338.9-168.4z M-1339.4-171.6c-0.1-0.1-0.3-0.1-0.5-0.1h-0.5c-0.2,0-0.4,0.1-0.5,0.1
           c-0.1,0.1-0.2,0.2-0.2,0.4v1.9c0,0.2,0.1,0.3,0.2,0.4c0.1,0.1,0.3,0.1,0.5,0.1h0.5c0.2,0,0.4,0,0.5-0.1c0.1-0.1,0.2-0.2,0.2-0.4
           v-1.9C-1339.3-171.4-1339.3-171.5-1339.4-171.6z"/>
       <path class="st7" d="M-1336.3-172.4v0.2c0.2-0.1,0.4-0.2,0.7-0.2h0.3c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.6,0.4,1.1v1.6
           c0,0.5-0.1,0.8-0.4,1.1c-0.2,0.2-0.6,0.3-1.1,0.3h-1v1.5h-0.7v-5.9H-1336.3z M-1336.1-171.6c-0.1,0.1-0.1,0.2-0.1,0.3v2.6h1.1
           c0.2,0,0.4,0,0.5-0.1c0.1-0.1,0.2-0.2,0.2-0.4v-1.9c0-0.2-0.1-0.3-0.2-0.4c-0.1-0.1-0.3-0.1-0.5-0.1h-0.5
           C-1335.9-171.8-1336-171.7-1336.1-171.6z"/>
   </g>
   <g>
       <path class="st7" d="M-1292.1-171.5v0.6h-2v2.8h-0.8v-6.2h2.9v0.6h-2.2v2.1H-1292.1z"/>
       <path class="st7" d="M-1287.3-168.4c-0.2,0.2-0.6,0.3-1.1,0.3h-0.3c-0.5,0-0.9-0.1-1.1-0.3c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6
           c0-0.5,0.1-0.8,0.4-1.1c0.2-0.2,0.6-0.3,1.1-0.3h0.3c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.6,0.4,1.1v1.6
           C-1287-169-1287.1-168.6-1287.3-168.4z M-1287.9-171.6c-0.1-0.1-0.3-0.1-0.5-0.1h-0.5c-0.2,0-0.4,0.1-0.5,0.1
           c-0.1,0.1-0.2,0.2-0.2,0.4v1.9c0,0.2,0.1,0.3,0.2,0.4c0.1,0.1,0.3,0.1,0.5,0.1h0.5c0.2,0,0.4,0,0.5-0.1c0.1-0.1,0.2-0.2,0.2-0.4
           v-1.9C-1287.7-171.4-1287.8-171.5-1287.9-171.6z"/>
       <path class="st7" d="M-1284.7-168.7v-3.1h-0.6v-0.7h1.3v0.2c0.2-0.2,0.4-0.2,0.7-0.2h0.9v0.7h-1c-0.2,0-0.3,0.1-0.4,0.2
           c-0.1,0.1-0.1,0.2-0.1,0.4v2.5h1v0.7h-2.3v-0.7H-1284.7z"/>
       <path class="st7" d="M-1278.9-168.1h-0.3c-0.5,0-0.8-0.1-1.1-0.3c-0.2-0.2-0.3-0.6-0.3-1.1v-3h0.7v3.2c0,0.2,0.1,0.3,0.2,0.4
           c0.1,0.1,0.2,0.2,0.4,0.2h0.5c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.2-0.3v-3.3h0.7v4.4h-0.7v-0.2
           C-1278.4-168.1-1278.7-168.1-1278.9-168.1z"/>
       <path class="st7" d="M-1275.7-172.4v0.2c0.2-0.1,0.3-0.2,0.5-0.2h0.1c0.4,0,0.7,0.1,0.9,0.4c0.2-0.2,0.4-0.4,0.8-0.4h0.1
           c0.4,0,0.6,0.1,0.8,0.3c0.2,0.2,0.3,0.5,0.3,1v3.2h-0.7v-3.2c0-0.2,0-0.4-0.1-0.5c0-0.1-0.2-0.1-0.3-0.1h-0.1
           c-0.2,0-0.3,0.1-0.4,0.2c-0.1,0.1-0.1,0.3-0.1,0.4v3.2h-0.7v-3.2c0-0.2,0-0.4-0.1-0.5c-0.1-0.1-0.2-0.1-0.3-0.1h-0.1
           c-0.2,0-0.3,0.1-0.4,0.2c-0.1,0.1-0.1,0.2-0.1,0.3v3.3h-0.7v-4.4H-1275.7z"/>
   </g>
   <g>
       <path class="st7" d="M-1236.1-169.6l-0.3,1.6h-0.8l1.5-6.2h1l1.5,6.2h-0.8l-0.3-1.6H-1236.1z M-1234.5-170.3l-0.7-3.4l-0.7,3.4
           H-1234.5z"/>
       <path class="st7" d="M-1229.3-168.4c-0.2,0.2-0.6,0.3-1.1,0.3h-1.7v-6.2h0.7v1.9c0.2-0.1,0.4-0.2,0.7-0.2h0.3
           c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.6,0.4,1.1v1.6C-1228.9-169-1229-168.6-1229.3-168.4z M-1231.2-171.6
           c-0.1,0.1-0.1,0.2-0.1,0.3v2.6h1.1c0.2,0,0.4,0,0.5-0.1c0.1-0.1,0.2-0.2,0.2-0.4v-1.9c0-0.2-0.1-0.3-0.2-0.4
           c-0.1-0.1-0.3-0.1-0.5-0.1h-0.5C-1231-171.8-1231.1-171.7-1231.2-171.6z"/>
       <path class="st7" d="M-1224.5-168.4c-0.2,0.2-0.6,0.3-1.1,0.3h-0.3c-0.5,0-0.9-0.1-1.1-0.3c-0.2-0.2-0.4-0.6-0.4-1.1v-1.6
           c0-0.5,0.1-0.8,0.4-1.1c0.2-0.2,0.6-0.3,1.1-0.3h0.3c0.5,0,0.9,0.1,1.1,0.3c0.2,0.2,0.4,0.6,0.4,1.1v1.6
           C-1224.1-169-1224.3-168.6-1224.5-168.4z M-1225.1-171.6c-0.1-0.1-0.3-0.1-0.5-0.1h-0.5c-0.2,0-0.4,0.1-0.5,0.1
           c-0.1,0.1-0.2,0.2-0.2,0.4v1.9c0,0.2,0.1,0.3,0.2,0.4c0.1,0.1,0.3,0.1,0.5,0.1h0.5c0.2,0,0.4,0,0.5-0.1c0.1-0.1,0.2-0.2,0.2-0.4
           v-1.9C-1224.9-171.4-1224.9-171.5-1225.1-171.6z"/>
       <path class="st7" d="M-1220.9-168.1h-0.3c-0.5,0-0.8-0.1-1.1-0.3c-0.2-0.2-0.3-0.6-0.3-1.1v-3h0.7v3.2c0,0.2,0.1,0.3,0.2,0.4
           c0.1,0.1,0.2,0.2,0.4,0.2h0.5c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.2-0.3v-3.3h0.7v4.4h-0.7v-0.2
           C-1220.4-168.1-1220.6-168.1-1220.9-168.1z"/>
       <path class="st7" d="M-1216.6-168.3c-0.2-0.2-0.2-0.4-0.2-0.8v-2.7h-0.8v-0.7h0.8v-1.1h0.7v1.1h1.3v0.7h-1.3v2.7
           c0,0.1,0,0.2,0.1,0.3c0.1,0.1,0.2,0.1,0.3,0.1h0.9v0.7h-1.1C-1216.3-168.1-1216.5-168.1-1216.6-168.3z"/>
       <path class="st7" d="M-1206.6-168.1h-0.3c-0.5,0-0.8-0.1-1.1-0.3c-0.2-0.2-0.3-0.6-0.3-1.1v-3h0.7v3.2c0,0.2,0.1,0.3,0.2,0.4
           c0.1,0.1,0.2,0.2,0.4,0.2h0.5c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.2-0.3v-3.3h0.7v4.4h-0.7v-0.2
           C-1206.1-168.1-1206.4-168.1-1206.6-168.1z"/>
       <path class="st7" d="M-1201-168.3c-0.2,0.2-0.6,0.3-1,0.3h-1.3v-0.7h1.4c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.1-0.3v-0.5
           c0-0.3-0.1-0.4-0.4-0.4h-0.3c-0.4,0-0.7-0.1-0.9-0.3c-0.2-0.2-0.3-0.5-0.3-0.8v-0.3c0-0.4,0.1-0.7,0.3-0.8c0.2-0.2,0.6-0.3,1-0.3
           h1.2v0.7h-1.3c-0.1,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3v0.3c0,0.1,0,0.2,0.1,0.3c0.1,0.1,0.2,0.1,0.3,0.1h0.3
           c0.4,0,0.7,0.1,0.9,0.3c0.2,0.2,0.3,0.5,0.3,0.8v0.4C-1200.7-168.8-1200.8-168.5-1201-168.3z"/>
   </g>
   <polyline class="st8" points="-1542.8,-186.2 -1536.4,-186.2 -1536.4,-194.9 -1532.7,-183.3 -1531.8,-199.4 -1528.7,-179.9 
       -1526.4,-190.1 -1523.9,-186.9 -1516.9,-186.9 "/>
   <polyline class="st8" points="-1383.2,-186.2 -1389.7,-186.2 -1389.7,-194.9 -1393.3,-183.3 -1394.3,-199.4 -1397.3,-179.9 
       -1399.6,-190.1 -1402.1,-186.9 -1409.1,-186.9 "/>
   <g>
       <circle class="st9" cx="-1184.4" cy="-207.9" r="5.1"/>
       <g>
           <path class="st10" d="M-1185.3-204.4v-4.5h-0.9v-0.5l1.9-1.3h0.6v6.2H-1185.3z"/>
       </g>
   </g>
   <g>
       <path class="st5" d="M-1241.5-211c-0.6,1.5-2,2.7-3.3,3.3c0-0.1-0.2-0.2-0.2-0.3c0.6-0.3,1.3-0.7,1.8-1.2c-0.3-0.3-0.7-0.7-1.1-0.9
           l0.2-0.2c0.4,0.2,0.9,0.6,1.2,0.9c0.4-0.4,0.7-0.8,0.9-1.3h-2.4v-0.3h2.6l0.1,0L-1241.5-211z M-1239.5-205.8
           c-0.2,0.4-0.4,0.9-0.7,1.2h2.5v0.4h-7.1v-0.4h4.3c0.2-0.4,0.5-1,0.7-1.3L-1239.5-205.8z M-1239-206.1h-4.5v-1.9h4.5V-206.1z
            M-1239.4-207.6h-3.7v1.2h3.7V-207.6z M-1242.4-204.7c-0.1-0.3-0.3-0.8-0.5-1.1l0.4-0.1c0.2,0.3,0.5,0.8,0.5,1.1L-1242.4-204.7z
            M-1242.7-209.1h3v0.3h-3V-209.1z M-1237.8-210.2c-0.4,0.4-0.9,0.8-1.3,1c0.5,0.4,1.1,0.8,1.6,1c-0.1,0.1-0.2,0.2-0.3,0.3
           c-1.4-0.6-2.7-2-3.4-3.5l0.3-0.1c0.2,0.4,0.4,0.7,0.7,1.1c0.4-0.3,0.9-0.7,1.2-1.1l0.3,0.2c-0.4,0.4-0.9,0.8-1.3,1.1
           c0.2,0.3,0.4,0.5,0.7,0.7c0.4-0.3,0.9-0.7,1.3-1L-1237.8-210.2z"/>
       <path class="st5" d="M-1232.8-210.9c0,1.4,0.2,4.5,3.5,6.5c-0.1,0.1-0.3,0.2-0.3,0.3c-2.2-1.3-3.1-3.3-3.4-4.9
           c-0.6,2.3-1.7,3.9-3.4,4.9c-0.1-0.1-0.2-0.2-0.3-0.3c1.9-1,2.9-2.7,3.4-5l0.3,0c-0.1-0.4-0.1-0.8-0.1-1.1h-2.1v-0.4H-1232.8z"/>
   </g>
   </svg>
</a></div>

		</div>
		
		<ul class="nav">';
		echo '
		
		<li><a href="customized.php" id="customized"><span >客製化</span> <span class="en">Customized</span></a></li>
        <li class="leftline" ><a href="gym.php" id="gym"><span>訓練道館</span> <span class="en">Training</span></a></li>
        <li class="rightline" ><a href="shoppingMall.php" id="shoppingMall"><span>商城</span> <span class="en">Shop</span></a></li>
		<li class="bk"></li>
        <li><a href="forum.php" id="forum"><span>討論區</span> <span class="en">Forum</span></a></li>
        <li ><a href="productIntroductipn.php" id="productIntroductipn"><span>使用手冊</span> <span class="en">Product</span></a></li>
		<li><a href="aboutUs.php" id="aboutUs"><span>關於我們</span> <span class="en">About us</span></a></li>';
	echo '</ul>	
	<div class="memicon header__login-box">
		<div class="membericon">
		 

			<span id="header-memName"><a href="memCenter.php" id="memCenter-link"></a></span>
			<span class="login" id="login-title">登入</span>
			<span class="login" id="logout-title">登出</span>
			<img src="img/img-header/member-01.png" alt="user" class="header__login header__login--user" id="login-icon">
			<img id="cartIcon" src="img/img-header/cart-01-01.png">
			<div id="buyQty"></div>
		</div>
	</div>
    </header> ';
    		// <div class="cart"></div><div></div>
		// echo "<p style='color:#fff; font-size:20px; '>",$self,"</p>"; class="ch"<img src="img/img-header/login.png">
?>


<!-- ######## 我 是 登 入 燈 箱 ######## -->

<div id="memlightBox-wrap">

	<div id="lightBox-login" class="lightBox_model">
	
		<!-- 會動的裝飾 -->
		<div class="dec dec-top" id="decoration">
			<span class=parallelogram></span>
			<span class=parallelogram></span>
			<span class=parallelogram></span>
			<span class=parallelogram></span>
			<span class=parallelogram></span>
			<span class=parallelogram></span>
		</div>
		<div class="dec dec-bottom" id="decoration">
			<span class=parallelogram></span>
			<span class=parallelogram></span>
			<span class=parallelogram></span>
			<span class=parallelogram></span>
			<span class=parallelogram></span>
			<span class=parallelogram></span>
		</div>
		<!-- 會動的裝飾 -->


	<!-- 右上叉叉按鈕 -->
	<div class="cancel-btn" id="loginLightBox-can-btn">
		<div class="exitBtn">
			<div class="exitBtn--hoverZone"></div>
			<div class="exitBtn--line-R"></div>
			<div class="exitBtn--line-L"></div>
			<span class="exitBtn--border exitBtn--row1"></span>
			<span class="exitBtn--border exitBtn--row2"></span>
			<span class="exitBtn--border exitBtn--col1"></span>
			<span class="exitBtn--border exitBtn--col2"></span>
		</div>
	</div>
	<!-- 右上叉叉按鈕 -->
	
	
		<div class="lightBox-top">
			<div class="lightBox-logo">
				<img src="img/img-header/logo.png">
			</div>
			<div class="lightBox-robot-top">
				<div class="robotall">
					<div id="robot-head">
						<img src="img/img-header/robot-head-01.png" id="head-img">
					</div>
					<img src="img/img-header/robot-body-01.png">
				</div>
			</div>
		</div>
	
		<!-- 頁籤的頭 -->
		<div class="lighBox-tab">
			<div class="tab" id="login-tab">
				登入
			</div>
			<div class="tab" id="register-tab">
				註冊
			</div>
		</div>
		<!-- 頁籤的尾 -->
	
		<div class="loginLightBox-content">
		</div>
	
		<!-- 登入這邊開始 -->
		<div class="option" id="login-option">
			<div class="content" id="login-content">
				<div class="lightBox-input">
					<label class="lightBox-label">帳號</label>
					<input type="text" class="lightBox-input-in" id="loginMemId" name="loginMemId">
				</div>
				<div class="lightBox-input">
					<label class="lightBox-label">密碼</label>
					<input type="password" class="lightBox-input-in" id="loginMemPsw" name="loginMemPsw">
				</div>
				<div class="lightBox-btn">
					<div class="share-btn-box">
						<button class="share-btn" id="loginBtn">
							登入
							<div class="light"></div>
						</button>
					</div>
				</div>
				<div class="forgetPsw">
					<span id="forgetPsw-link">
					   主人<br>忘記密碼了嗎 ?<br>
					</span>
				</div>
			</div>
		</div>
		<!-- 登入這邊結束 -->
	
		<!-- 註冊那邊開始 -->
		<div class="option" id="register-option">
			<div class="content" id="register-content">
				<div class="lightBox-input">
					<label class="lightBox-label">帳號</label>
					<div class="error-tip">
						<span class="error-tip-msg">還差5個字唷</span>
					</div>
					<input type="text" class="lightBox-input-in" id="registerMemId" name="registerMemId" placeholder="最少3碼唷">
					<span class="lightBox-check unCheck"><img src=""></span>
				</div>
				<div class="lightBox-input">
					<label class="lightBox-label">密碼</label>
					<div class="error-tip">
						<span class="error-tip-msg">還差5個字唷</span>
					</div>
					<input type="password" class="lightBox-input-in" id="registerMemPsw" name="registerMemPsw" placeholder="最少3碼唷">
					<span class="lightBox-check unCheck"><img src=""></span>
				</div>
				<div class="lightBox-input">
					<label class="lightBox-label">姓名</label>
					<div class="error-tip">
						<span class="error-tip-msg">超過五個字了喔</span>
					</div>
					<input type="text" class="lightBox-input-in" id="registerMemName" name="registerMemName">
					<span class="lightBox-check unCheck"><img src=""></span>
				</div>
				<div class="lightBox-input">
					<label class="lightBox-label">信箱</label>
					<div class="error-tip">
						<span class="error-tip-msg">格式不對喔</span>
					</div>
					<input type="text" class="lightBox-input-in" id="registerMemEmail" name="registerMemEmail">
					<span class="lightBox-check unCheck"><img src=""></span>
				</div>
				<div class="lightBox-btn" id="register-btn-wrap">
					<div class="share-btn-box">
						<button class="share-btn" id="registerBtn">
							註冊
							<div class="light"></div>
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- 註冊那邊結束 -->
	
	
		<!-- 忘記密碼區開始 -->
		<div class="option" id="forgetPsw-option">
			<div class="content" id="forgetPsw-content">
				<div class="lightBox-input">
					<label class="lightBox-label">帳號</label>
					<input type="text" class="lightBox-input-in" id="forgetPswMemId" name="forgetPswMemId">
				</div>
				<div class="lightBox-input">
					<label class="lightBox-label">信箱</label>
					<input type="text" class="lightBox-input-in" id="forgetPswMemEmail" name="forgetPswMemEmail">
				</div>
				<div class="lightBox-btn">
					<div class="share-btn-box">
						<button class="share-btn" id="forgetPswBtn">
							寄送密碼
							<div class="light"></div>
						</button>
					</div>
				</div>
				<div class="forgetPsw-ans">
	
					<span id="tipsword" class="forgetPsw-tips">
						主人<br>
						趕快輸入帳號和email唷!
					</span>
				</div>
			</div>
		</div>
		<!-- 忘記密碼區結束 -->
	
	</div>
</div>
<!-- ######## 我 是 登 入 燈 箱 ######## -->

<!-- ######## 我 是 登 入 後 "狀 態" 燈 箱 ######## -->
<div id="loginstate-wrap">
        <div id="loginstate-box">

		    <!-- 狀態燈箱的XX -->
			<div id="loginstate-cancel-btn">
				<div class="exitBtn">
					<div class="exitBtn--hoverZone"></div>
					<div class="exitBtn--line-R"></div>
					<div class="exitBtn--line-L"></div>
					<span class="exitBtn--border exitBtn--row1"></span>
					<span class="exitBtn--border exitBtn--row2"></span>
					<span class="exitBtn--border exitBtn--col1"></span>
					<span class="exitBtn--border exitBtn--col2"></span>
            	</div>
			</div>
			<!-- 狀態燈箱的XX -->

            <div class="state-panel">
                <div class="state-pic" id="state-pic-V">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#003e3e" stroke-width="6" stroke-miterlimit="10"
                            cx="65.1" cy="65.1" r="62.1" />
                        <polyline class="path check" fill="none" stroke="#003e3e" stroke-width="6" stroke-linecap="round"
                            stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                    </svg>
                </div>
                <div class="state-pic" id="state-pic-X">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#ae0000" stroke-width="6" stroke-miterlimit="10"
                            cx="65.1" cy="65.1" r="62.1" />
                        <line class="path line" fill="none" stroke="#ae0000" stroke-width="6" stroke-linecap="round"
                            stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3" />
                        <line class="path line" fill="none" stroke="#ae0000" stroke-width="6" stroke-linecap="round"
                            stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2" />
                    </svg>
                </div>
                <div id="state-con">
                    <div id="state-con-inner">
                        
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- ######## 我 是 登 入 後 "狀 態" 燈 箱 ######## -->



<!-- ====================================================== -->
<!--                            購物車                       -->
<!-- ======================================================= -->
<div class="cart">
	<div class="exitBtn" id="cart--exit">
		<div class="exitBtn--hoverZone"></div>
		<div class="exitBtn--line-R"></div>
		<div class="exitBtn--line-L"></div>
		<span class="exitBtn--border exitBtn--row1"></span>
		<span class="exitBtn--border exitBtn--row2"></span>
		<span class="exitBtn--border exitBtn--col1"></span>
		<span class="exitBtn--border exitBtn--col2"></span>
	</div>
	<div class="cart_list mCustomScrollbar" id="cartList" data-mcs-theme="Default scrollbar">
		<div class="cart_list_title" id="cartTitle">
			<span><h1>Shopping List</h1></span>
		</div> <!-- end of &_title -->

		<span id="cart--nullTxt">購物車內無商品</span>

		<!-- 複製item架構 -->
		<div class="cart_list_item" style="display:none;">
			<span style="display:none;"></span>
			<div class="cart_list_item_prod">
				<img src="#">
				<div class="cart_list_item_prod_label">
					<span>商品名稱</span>
					<span class="subTotal">$</span>
					<span class="cartPrice" style="display:none;"></span>
				</div>
			</div>
			<div class="cart_list_item_qty">
				<div class="cart_list_item_qty--less">-</div>
				<div class="cart_list_item_qty--num">1</div>
				<div class="cart_list_item_qty--add">+</div>
			</div>
		</div> <!-- end of &_item -->
		<!-- 頁面重新載入時產生cart_list_item -->
		<?php
		if(isset($_SESSION["prodNo"])){
			foreach($_SESSION["prodNo"] as $i=>$prodNo){
		?>
			<div class="cart_list_item">
				<span style="display:none;"><?php echo $_SESSION["prodNo"][$i];?></span>
				<div class="cart_list_item_prod">
					<img src="<?php echo $_SESSION["prodImg"][$i];?>">
					<div class="cart_list_item_prod_label">
						<span><?php echo $_SESSION["prodName"][$i];?></span>
						<span class="subTotal">$<?php echo $_SESSION["prodPrice"][$i]*$_SESSION["prodQty"][$i];?></span>
						<span class="cartPrice" style="display:none;"><?php echo $_SESSION["prodPrice"][$i];?></span>
					</div>
				</div>
				<div class="cart_list_item_qty">
					<div class="cart_list_item_qty--less">-</div>
					<div class="cart_list_item_qty--num"><?php echo $_SESSION["prodQty"][$i];?></div>
					<div class="cart_list_item_qty--add">+</div>
				</div>
			</div>	
		<?php
			}
		}
		?>

		<div class="cart_list_sum" id="cartSum">
			<h2>總計：</h2>
			<h2 id="sum">$0</h2>
		</div> <!-- end of &_sum -->

		<div class="shareBtn--box">
			<button class="shareBtn" id="btn--checkout">結帳去
				<div class="light"></div>   
			</button>
		</div>
	</div> <!-- end of .cart_list -->
</div> 
<!-- end of .cart-->

<!-- ====================================================== -->
<!--                          結帳步驟                       -->
<!-- ====================================================== -->
<div class="popupBG" id="checkout--popupBG"></div>
<div id="checkout">
	<div class="exitBtn" id="checkout--exit">
		<div class="exitBtn--hoverZone"></div>
		<div class="exitBtn--line-R"></div>
		<div class="exitBtn--line-L"></div>
		<span class="exitBtn--border exitBtn--row1"></span>
		<span class="exitBtn--border exitBtn--row2"></span>
		<span class="exitBtn--border exitBtn--col1"></span>
		<span class="exitBtn--border exitBtn--col2"></span>
	</div>
	<div id="checkout--wrap">
		<div class="checkout_content" id="checkout--post">
			<h1>填寫寄送資料</h1>
			<div class="checkout_content--inline">
				<label for="receiver">收件人</label>
				<input type="text" maxlength="15" class="postInfo" id="receiver">
			</div>
			<div class="checkout_content--inline">
				<label for="addr">收件地址</label>
				<input type="text" minlength="5" maxlength="50" class="postInfo" id="addr">
			</div>
			<div class="checkout_content--inline">
				<label for="email">e-mail</label>
				<input type="email" class="postInfo" id="email">
			</div>
			<div class="checkout_content--inline">
				<label for="tel">電話</label>
				<input type="tel" maxlength="10" class="postInfo" id="tel">
			</div>
			<div class="shareBtn--box">
				<button class="shareBtn" id="btn--toEnd">送出
					<div class="light"></div>
				</button>
			</div>
		</div>
	</div> <!-- end of #checkout--wrap -->
</div> <!-- end of #checkout -->
