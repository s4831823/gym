
<!-- 連到資料庫 -->
<?php
$errMsg ="";
$msg = "";
try{
    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";
    $password ="cd104g3";
    $options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn,$user,$password,$options);
    $sql="select * from companybase ";
    $member = $pdo->query($sql);

    $members = $pdo->query($sql)->fetchAll();
    $members = json_encode($members);

    }catch(PDOException $e){
        $errMsg ="錯誤原因:" . $e->getMessage()."<br>"."錯誤行號:". $e->getLine()."<br>";
}
?>

<!-- 以下是關於我們頁面內容 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/aboutUs.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/lightBox.css">
    <link rel="stylesheet" type="text/css" href="css/shopNew.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="js/lightBox.js"></script>
    <script src="node_modules/gsap/src/minified/TweenMax.min.js"></script>
    <script src="node_modules/scrollmagic/scrollmagic/minified/ScrollMagic.min.js"></script>
    <script src="node_modules/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js"></script>
    <script src="node_modules/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"></script>
    <script src="node_modules/gsap/src/uncompressed/plugins/ScrollToPlugin.js"></script>
    <!-- 波形效果 -->
    <script src="js/waveform-min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <title>DAVINCI 關於我們</title>
    <style>
    /* 地圖大小調整 */
        #map {
            height: 500px;
            width: 100vw;
        }
    </style>
</head>
<body>
<!-- nav-->
<?php
  require_once('header.php');
 ?>

<!-- 公司介紹內容 -->
<div id="trigger_01"></div>
<div class="info">
    <div class="info_about desc">
        <h3>團隊介紹</h3><br><span class="ename">TEAM</span>
        <p>DAVINCI 創立於2018由8名工程師創辦<br>
          主要生產服務型機器人如今已是世界知名企業<br>
          2018年名列十大國際品牌
        </p>
    </div>

    <div class="info_1000 desc">
        <h3>呂奕芊</h3><br><span class="ename">TRACY</span>
        <p>負責公司會員中心與後端會員管理規劃與設計</p>
    </div>

    <div class="info_wei desc">
        <h3>陳宏瑋</h3><br><span class="ename">AWEI</span>
        <p>達文西關於我們前端設計與後端服務據點管理</p>
    </div>

    <div class="info_peter desc">
        <h3>王景儀</h3><br><span class="ename">PETER</span>
        <p>達文西討論區介面與程式設計</p>
    </div> 

    <div class="info_sam desc">
        <h3>張鈺煌</h3><br><span class="ename">SAM</span>
        <p>達文西訓練道館前後端設計師與協助團隊成員</p>
    </div>

    <div class="info_wang desc">
        <h3>王淳</h3><br><span class="ename">CHUN</span>
        <p>達文西官方網站首頁設計與商城資料管理設計</p>
    </div>

    <div class="info_lin desc">
        <h3>林筱芳</h3><br><span class="ename">LINDA</span>
        <p>負責達文西機器人客製化功能</p>
    </div>
    
    <div class="info_lai desc">
        <h3>賴筱涵</h3><br><span class="ename">LAI</span>
        <p>達文西商城前端與後端訂單管理</p>
    </div>


    <div class="info_Meng desc">
        <h3>許孟涵</h3><br><span class="ename">JESSIE</span>
        <p>達文西使用手冊與管理員登入與管理</p>
    </div>
  

    <div class="info_honor desc">
        <h3>探索極致</h3><br><span class="ename">EXPLORE</span>
        <p>研發期間從發想到落實不斷調整與研究<br>
        期許未來在前端領域持續探索邁向更好的達文西</p>      
    </div>


    <div class="info_technology desc">
        <h3>全球佈局</h3><br><span class="ename">SERVICE</span>
        <p>達文西為了提供更好的服務<br>
         在全球各地皆有直營店為您提供美好的購物體驗<br>
        </p>    
    </div>

    <div class="mouse">
      <div class="wheel"></div> 
    </div>

<!-- 背景波形 -->
    <canvas id="welcomeCanvas"></canvas>
</div>


<!-- 公司據點分佈圖 -->
<!-- 背景 -->
<div id="map_bg">
<!-- 地圖位置 (預計要載入地圖的地方)-->
<div class="map_title">
    全球服務據點
</div>
    <div id="map">
    </div> 
    
    <div class="shop_map">
       <?php 
            if( $errMsg !=""){
            echo "錯誤";
            }else{
            while($prodRow = $member->fetchObject()){      
        ?>

         <div class="shop">
              <h3><i class="fas fa-building" style="font-size:25px;"></i>&nbsp;<?php echo $prodRow->siteName;?></h3><br><br>
              <div class="contain hide">
                  <p><i class="fas fa-map-marked-alt" style="font-size:20px;"></i>&nbsp;<?php echo $prodRow->siteAddr;?></p><br>
                  <div><i class="fas fa-phone-square" style="font-size:26px;"></i>&nbsp;<?php echo $prodRow->siteTel;?></div>
              </div>
         </div>


         <?php
            }
            } 
         ?> 
<script>
// Initialize and add the map

function initMap() {
    var pointers = <?php echo $members; ?>;
    var map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 2,
            center: {
                lat: +pointers[0].lat,
                lng: +pointers[0].lng
            },
            // 地圖樣式
            styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8ec3b9"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1a3646"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#64779e"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#334e87"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6f9ba5"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "poi.business",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3C7680"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#304a7d"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2c6675"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#255763"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b0d5ce"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3a4762"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#0e1626"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#4e6d70"
      }
    ]
  }
]







        }

            
    );

    

//產生一個地圖標記
    pointers.forEach(function (pointer) {
        var marker = new google.maps.Marker({
            position: {
                lat: +pointer.lat,
                lng: +pointer.lng
            },
            // animation: google.maps.Animation.DROP,
            animation: google.maps.Animation.BOUNCE,//圖標掉入動畫
            icon:'images/map_mark.png',
            map: map
        });
// 可以在圖標上加地理資訊視窗
       
        if (pointer.siteAddr) {
            var infowindow = new google.maps.InfoWindow({
            //   content:contentString,
              maxWidth:250,
              content: pointer.siteName+pointer.siteAddr+pointer.siteTel
            });

            marker.addListener('click', function() {
              infowindow.open(map, marker);
            });
        }
    })
}
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEjSk1qPIpgy8le8a1gaAABNvQrIxmyjI&callback=initMap
">
</script>
    </div>  
    <!-- footer -->
    <footer class="footer">
     <h4>© 2018 Davinci - Robot Company</h4>
    </footer>
</div>

 



<script src="js/aboutUs.js"></script>
<script src="js/waveform.js"></script>
</body>
</html>