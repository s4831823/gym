<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/product_03.css">
    <link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="node_modules\gsap\src\minified\TweenMax.min.js"></script>  <!-- node_modules->gsap->src->TweenMax.min.js右鍵 Copy Relative Path -->
    <script src="node_modules\gsap\src\minified\plugins\ScrollToPlugin.min.js"></script> <!-- node_modules->gsap->src->plugins->Scroll右鍵 Copy Relative Path -->
    <script src="node_modules\gsap\src\minified\plugins\TextPlugin.min.js"></script> <!-- node_modules->gsap->src->plugins->TextPlugin右鍵 Copy Relative Path -->
    <script src="js/parallax.min.js"></script>
    <script src="js/SplitText.min.js"></script> 
   
    <!-- ScrollMagic -->
    <script src="node_modules\scrollmagic\scrollmagic\minified\ScrollMagic.min.js"></script><!-- node_modules->scrollmagic->minified->ScrollMagic.min右鍵 Copy Relative Path -->
    <script src="node_modules\scrollmagic\scrollmagic\uncompressed\plugins\animation.gsap.js"></script>  
    <script src="node_modules\scrollmagic\scrollmagic\uncompressed\plugins\debug.addIndicators.js"></script>  
    
    <!-- 聲控 -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js"></script>
    <script src="js/annyang.min.js" ></script>

    <title>DAVINCI 使用手冊</title>
</head>
<body>   
<?php require_once('header.php');
?>
<div id="dowebok">
        <div class="section">
                <div id="prod_section-1">
                    <!--透視 Start-->
                    <div class="contentArea">
                        <!-- robot-01 start-->
                        <svg class=maskpic1 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="100%" height="100%" fill="transparent"/><!-- 背景底顏色 -->
                                <image id="maskpic" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="images/img-product/robot_01.svg" width="100%" height="100%"/><!-- 進去後看到的第一張圖 -->
                        </svg>
                        <!-- robot-01 end-->
                    
                        <!-- robot-gear start-->
                        <svg class=maskpic1 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
                            <defs>
                                <clipPath id="mask">
                                    <circle id="mask-circle" cx="30%" cy="30%" r="5%" style="fill:#fff"/>
                                </clipPath>
                            </defs>
                            <g clip-path="url(#mask)">
                                <rect width="100%" height="100%" fill="transparent"/>
                                <image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="images/img-product/robot_gear.svg" width="100%" height="100%"/><!-- 遮罩看到的圖 -->
                            </g>
                            <circle id="circle-border" cx="30%" cy="30%" r="5%" style="stroke:#106481; fill:transparent; stroke-width:2;"/><!-- 遮罩的邊框顏色 -->
                        </svg>
                        <!-- robot-gear end-->
                        <div class="textbox"><img src="images/img-product/textbox01.png" alt=""></div>
                        <div class="intro intro-lens">
                            <div class="text_inner text_inner01"></div>
                        </div>
                        <div class="intro intro-heart">
                            <div class="text_inner text_inner02"></div>
                        </div>
                        <div class="intro intro-motor">
                            <div class="text_inner text_inner03"></div>
                        </div>
                        <div class="intro intro-chip">
                            <div class="text_inner text_inner04"></div>
                        </div>
                        <div class="intro intro-joint">
                            <div class="text_inner text_inner05"></div>
                        </div>
                        <div class="image-robot-intro">
                                    <div class="pro_intro pro_intro-lens">
                                        <div class="pro_intro-inner"><h2>眼睛</h2>
                                            <p>Davinci機器人的投影鏡頭是配置高規格的玻璃光學鏡頭，可確保影像在透過鏡頭投射在投影布幕上時，仍保有清澈、立體、銳利，且色彩表現自然真實的高品質呈現。</p>
                                        </div>
                                        
                                    </div>
                                    <div class="pro_intro pro_intro-heart">
                                        <div class="pro_intro-inner">
                                            <h2>心臟</h2>
                                            <p>Davinci機器人的心臟為EV3主機。<br>EV3可程式化主機，核心具有ARM9處理器，負責傳送指令給各個零件。</p>
                                        </div>
                                    </div>
                                    <div class="pro_intro pro_intro-motor">
                                        <div class="pro_intro-inner">
                                            <h2>引擎</h2>
                                            <p>Davinci機器人的馬達裝有角度感應器，藉由控制馬達旋轉的角度，可以非常精確的控制機器人的動作，此項由本公司獨家創新的技術，大幅提升機器人的靈活度。</p>
                                        </div>
                                        
                                    </div>
                                    <div class="pro_intro pro_intro-chip">
                                        <div class="pro_intro-inner">
                                            <h2>腦袋</h2>
                                            <p>Davinci機器人內嵌的晶片是採用SiP技術，SiP是將多種功能芯片，包括處理器、存儲器等功能芯片集成在一個封裝內，從而實現Davinci機器人基本完整的功能。</p>
                                        </div>
                                        
                                    </div>
                                    <div class="pro_intro pro_intro-joint">
                                        <div class="pro_intro-inner">
                                            <h2>關節</h2>
                                            <p>Davinci機器人的齒輪關節，具有高強度低噪音的特性，且運轉平穩，組成之零件皆經由嚴格把關，保證為全球最高品質。</p>
                                        </div>
                                    </div> 
                        </div>
                    </div>  
                </div><!--透視 End-->
        </div>
    
        <div id="triggerSection2"></div>
        <div class="section">
            <div id="prod_section-2">

                    <div class="prod-text prod-text1">
                        <div class="prod-text-h2">
                            <span class="triangle triangle01"></span>
                            <span class="triangle triangle02"></span>
                            <span class="triangle triangle03"></span>
                            <span class="triangle triangle04"></span>
                            <h2>如何開機？</h2>
                        </div>    
                        <div class="prod-text-p">
                            <span id="cursor"></span>
                            <p>
                            <span class="animate animate1">Davinci機器人的按鈕皆具有觸控功能，觸控面版是採用最先進的「多點觸控」技術，為你帶來更快速、更靈敏的使用體驗。</span>
                            </p>
                            <p>
                            <span class="animate animate1">開機請輕碰機器人人中。</span>
                            </p>
                        </div>
                    </div>
                    <div class="image-robot image-robot2">
                        <div class="robot2">
                            <img src="images/img-product/robot_2.svg" alt="Image">
                        </div>
                        <div class="prod-bigcircle_2">
                            <img src="images/img-product/prod-bigcircle_2.svg" alt="Image">
                        </div>
                        <div class="eyelash" >
                            <img src="images/img-product/eyelash.svg" alt="Image">
                        </div> 
                        <div id="eye-blink">
                            <div class="eye eye-left blink02"></div>
                            <div class="eye eye-right blink02"></div>
                        </div>
                        <div class="senses">
                            <div class="mouth"><img src="images/img-product/mouth.svg" alt=""></div>
                            <div class="mouth smile"><img src="images/img-product/smile.png" alt=""></div>
                        </div>
                        <!-- <span class="finger"><img src="images/img-product/finger.png" alt="Image"></span> -->
                        
                        <span class="point"><img src="images/img-product/start-power-button.png" alt="Image"></span>
                            
                        <div class=" scanlines"><!-- section2===scan=Start＝= -->
                            <span class="fingerprint"><img src="images/img-product/fingerprint.svg" alt=""></span>
                        </div><!-- section2===scan=End＝= -->
                        <div class="point-circle"></div>     
                    </div>
            </div>
        </div>
        <div id="triggerSection3"></div>
        <div class="section">
          
            <div id="prod_section-3" class="section_03">
                <audio id="myvoice" src="Dancingrobotsong.mp3" loop></audio>
                    <div class="prod-text prod-text2">
                            <div class="prod-text-h2">
                                    <span class="triangle triangle01"></span>
                                    <span class="triangle triangle02"></span>
                                    <span class="triangle triangle03"></span>
                                    <span class="triangle triangle04"></span>
                                    <h2 id="hello">語音模式</h2>
                                </div>    
                        <div class="prod-text-p">
                                    <p>
                                    <span class="animate animate2">Davinci機器人搭載了史上最高規格的聲音感應器感，靈敏感測週圍聲音的音頻，可以用聲音來控制機器人的行為。</span>
                                    </p>
                                    <p>
                                    <span class="animate animate2">請發聲下達指令。</span>
                                    </p>
                                </div>
                    </div>
                    <div class="image-robot image-robot3">
                        <div class="img-robot03">
                            <img src="images/img-product/robot_3.svg" alt="Image">
                            <div class="img-robot03--face">
                                <div class="talk talking"></div>
                            </div>
                        </div> 
            
                        <div class="stave">
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"><img src="images/img-product/note01.png" alt=""></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"><img src="images/img-product/note02.png" alt=""></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"><img src="images/img-product/note03.png" alt=""></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"><img src="images/img-product/note04.png" alt=""></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"><img src="images/img-product/note05.png" alt=""></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"><img src="images/img-product/note04.png" alt=""></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"></div>
                                <div class="stave--bar moveBar"><img src="images/img-product/note06.png" alt=""></div>
                            </div>
                    </div>
                    
            </div>
        </div>

        <div id="triggerSection4"></div>
        <div class="section">
            <div id="prod_section-5">
                <div class="prod-text prod-text3">
                    <div class="prod-text-h2">
                        <span class="triangle triangle01"></span>
                        <span class="triangle triangle02"></span>
                        <span class="triangle triangle03"></span>
                        <span class="triangle triangle04"></span>
                        <h2>如何強制關機？</h2>
                    </div>    
                    <div class="prod-text-p">
                        <p>
                        <span class="animate animate3">Davinci機器人的按鈕皆具有觸控功能，觸控面版是採用最先進的「多點觸控」技術，為你帶來更快速、更靈敏的使用體驗。</span>
                        </p>
                        <p>
                        <span class="animate animate3">強制關機請拍打機器人後腦勺。</span>
                        </p>
                    </div>
                </div>
                <div class="image-robot image-robot5">
                    <div class="image-robot5-0 image-robot5-01">
                        <div class="img-robot501">
                            <img  src="images/img-product/robot_5.svg" alt="Image">
                        </div>
                        <div class="hand image-hand"><img src="images/img-product/hand.png" alt="Image"></div>
                        <div class="dumbbell"><img src="images/img-product/dumbbell.png" alt=""></div>
                    </div>
                    <div class="image-robot5-0 image-robot5-02">
                        <div class="img-robot502">
                            <img src="images/img-product/robot_5-1.svg" alt="Image">
                        </div>
                        <div class="shoulder"><img src="images/img-product//shoulder_5-1.svg" alt=""></div>
                        <div class="rightarm"><img src="images/img-product/robot-rightarm_5-1.svg" alt="Image"></div>
                        <div class="hand image-hand-02"><img src="images/img-product/hand.png" alt="Image"></div>
                    </div>
                </div>
                <!-- <div id="coding-bg">
                    <p class="text" data-text="nblocks = nblocks ? : 1; /n group_info = kmalloc(sizeof(*group_info) + nblocks*sizeof(gid_t *)); /nif (!group_info) /nreturn NULL;/ngroup_info->nblocks = nblocks; /n atomic_set(&group_info->usage, 1); /nif (gidsetsize <= NGROUPS_SMALL) /n group_info->blocks[0] = group_info->small_block; /nelse { /nfor (i = 0; i < nblocks; i++) { /ngid_t *b; /n /nstruct group_info *groups_alloc(int gidsetsize){ /nstruct group_info *group_info; /nnt nblocks; /nint i;group_info->blocks[0] = group_info->small_block; /nelse { /nor (i = 0; i < nblocks; i++) { /ngid_t *b; /nb = (void*)__get_free_page(GFP_USER); /nif (!b)goto out_undo_partial_alloc; /n group_info->blocks[i] = b; /n }return group_info;/n /nout_undo_partial_alloc: /nwhile (--i >= 0) { /nfree_page((unsigned long)group_info->blocks[i]);/n}free(group_info); /nreturn NULL;/n}nblocks = nblocks ? : 1; /ngroup_info = kmalloc(sizeof+ nblocks*sizeof(gid_t *), GFP_USER); /nnvoid groups_free(struct group_info *group_info){ /nif (group_info->blocks[0] != group_info->small_block)/nint i; /nfor (i = 0; i < group_info->nblocks; i++) /necho('Hello World');"></p>
                </div> -->
            </div>
        </div>
 
        
        <div class="section">
            <div id="prod_section-6">
                <div class="section06">
                    <div class="box">
                        <div class="box1">
                            <div class="line">
                                    <span class="line1"></span>
                                    <span class="line2"></span>
                                    <span class="line3"></span>
                                    <span class="line4"></span>
                                    <span class="line5"></span>
                                    <span class="line6"></span>
                                    <span class="line7"></span>
                                    <span class="line8"></span>
                                </div>
                                </div>
                                <div class="box2">
                                        <div class="line">
                                                <span class="line1 line_1"></span>
                                                <span class="line2 line_1"></span>
                                                <span class="line3 line_1"></span>
                                                <span class="line4 line_1"></span>
                                                <span class="line5 line_1"></span>
                                                <span class="line6 line_1"></span>
                                                <span class="line7 line_1"></span>
                                                <span class="line8 line_1"></span>
                                                <span class="line9 line_1"></span>
                                                <span class="line10 line_1"></span>
                                                <span class="line11 line_1"></span>
                                                <span class="line12 line_1"></span>
                                                <span class="line13 line_1"></span>
                                                <span class="line14 line_1"></span>
                                        </div>
                                </div>
                                <div class="box3">
                                        <div class="line">
                                                <span class="line1"></span>
                                                <span class="line2"></span>
                                                <span class="line3"></span>
                                                <span class="line4"></span>
                                                <span class="line5"></span>
                                                <span class="line6"></span>
                                                <span class="line7"></span>
                                                <span class="line8"></span>
                                                <span class="line9"></span>
                                                <span class="line10"></span>
                                                <span class="line11"></span>
                                                <span class="line12"></span>
                                                <span class="line13"></span>
                                                <span class="line14"></span>
                                        </div>
                                    </div>
                                    <div class="box4">
                                            <div class="line">
                                                    <span class="line1"></span>
                                                    <span class="line2"></span>
                                                    <span class="line3"></span>
                                                    <span class="line4"></span>
                                                    <span class="line5"></span>
                                                    <span class="line6"></span>
                                                    <span class="line7"></span>
                                                    <span class="line8"></span>
                                                    <span class="line9"></span>
                                                    <span class="line10"></span>
                                                    <span class="line11"></span>
                                                    <span class="line12"></span>
                                                    <span class="line13"></span>
                                                    <span class="line14"></span>
                                                    <span class="line15"></span>
                                                    <span class="line16"></span>
                                                    <span class="line17"></span>
                                            </div>
                                        </div>
                                        <div class="box5">
                                                <div class="line">
                                                        <span class="line1 line_1"></span>
                                                        <span class="line2 line_1"></span>
                                                        <span class="line3 line_1"></span>
                                                        <span class="line4 line_1"></span>
                                                        <span class="line5 line_1"></span>
                                                        <span class="line6 line_1"></span>
                                                        <span class="line7 line_1"></span>
                                                        <span class="line8 line_1"></span>
                                                        <span class="line9 line_1"></span>
                                                        <span class="line10 line_1"></span>
                                                        <span class="line11 line_1"></span>
                                                        <span class="line12 line_1"></span>
                                                        <span class="line13 line_1"></span>
                                                        <span class="line14 line_1"></span>
                                                        
                                                </div>
                                            </div>
                                            <div class="box6">
                                                    <div class="line">
                                                            <span class="line1"></span>
                                                            <span class="line2"></span>
                                                            <span class="line3"></span>
                                                            <span class="line4"></span>
                                                            <span class="line5"></span>
                                                            <span class="line6"></span>
                                                            <span class="line7"></span>
                                                            <span class="line8"></span>
                                                            <span class="line9"></span>
                                                            <span class="line10"></span>
                                                            <span class="line11"></span>
                                                            <span class="line12"></span>
                                                            <span class="line13"></span>
                                                            <span class="line14"></span>
                                                            <span class="line15"></span>
                                                            <span class="line16"></span>
                                                            <span class="line17"></span>
                                                    </div>
                                                </div>
                                            
                                                <div class="item_1">
                                                <div id="firefighter" class="flip-container" onclick="fliplefta();">
                                                    <div class="flipper">
                                                    <div class="front front1">
                                                        <div class="card b">
                                                                <span>消防<br>技能</span>
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="back back1">
                                                        <div class="card k">
                                                        <div class="backinfo">
                                                        <?php
                                                        $errMsg = "";
                                                        try {
                                                            require_once("connectcd104g3.php"); 
                                                            $sql = "select * from robotskill where rbSkillNo=1";
                                                            $pdoStatement = $pdo->query( $sql);
                                                            $row = $pdoStatement->fetchObject();
                                                        } catch (PDOException $e) {
                                                            $errMsg ="錯誤原因 : " . $e->getMessage(). "<br>".	"錯誤行號 : ". $e->getLine(). "<br>";
                                                        }  
                                                        ?> 
                                                            <p><?php echo $row->rbtSkillInfo;?></p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                </div>
                                            </div> 
                                                <div class="item_2">
                                                        <div id="coding" class="flip-container" onclick="fliprighta();">
                                                        <div class="flipper">
                                                            <div class="front front2">
                                                            <div class="card b">
                                                                    <span>碼農<br>技能</span>
                                                            </div>
                                                            
                                                            </div>
                                                            <div class="back back2">
                                                            <div class="card k">
                                                                <div class="backinfo">
                                                        <?php
                                                        $errMsg = "";
                                                        try {
                                                            require_once("connectcd104g3.php"); 
                                                            $sql = "select * from robotskill where rbSkillNo=2";
                                                            $pdoStatement = $pdo->query( $sql);
                                                            $row = $pdoStatement->fetchObject();
                                                        } catch (PDOException $e) {
                                                            $errMsg ="錯誤原因 : " . $e->getMessage(). "<br>".	"錯誤行號 : ". $e->getLine(). "<br>";
                                                        }  
                                                        ?> 
                                                            <p><?php echo $row->rbtSkillInfo;?></p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        
                                                    </div>
                                                    </div> 
                                                    <div class="item_3">
                                                        <div id="longtermcare" class="flip-container" onclick="flipleftb();">
                                                        <div class="flipper">
                                                            <div class="front front3">
                                                            <div class="card b">
                                                                <span>長照<br>技能</span>
                                                            </div>
                                                            
                                                            </div>
                                                            <div class="back back3">
                                                            <div class="card k">
                                                                <div class="backinfo">
                                                        <?php
                                                        $errMsg = "";
                                                        try {
                                                            require_once("connectcd104g3.php"); 
                                                            $sql = "select * from robotskill where rbSkillNo=3";
                                                            $pdoStatement = $pdo->query( $sql);
                                                            $row = $pdoStatement->fetchObject();
                                                        } catch (PDOException $e) {
                                                            $errMsg ="錯誤原因 : " . $e->getMessage(). "<br>".	"錯誤行號 : ". $e->getLine(). "<br>";
                                                        }  
                                                        ?> 
                                                            <p><?php echo $row->rbtSkillInfo;?></p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>  
                                                    </div>
                                                    <div class="item_4">
                                                        <div id="entertainment" class="flip-container" onclick="fliprightb();">
                                                        <div class="flipper">
                                                            <div class="front front4">
                                                            <div class="card b">
                                                                <span>藝能<br>技能</span>
                                                            </div>
                                                            
                                                            </div>
                                                            <div class="back back-zin back4">
                                                            <div class="card k">
                                                                <div class="backinfo">
                                                        <?php
                                                        $errMsg = "";
                                                        try {
                                                            require_once("connectcd104g3.php"); 
                                                            $sql = "select * from robotskill where rbSkillNo=4";
                                                            $pdoStatement = $pdo->query( $sql);
                                                            $row = $pdoStatement->fetchObject();
                                                        } catch (PDOException $e) {
                                                            $errMsg ="錯誤原因 : " . $e->getMessage(). "<br>".	"錯誤行號 : ". $e->getLine(). "<br>";
                                                        }  
                                                        ?> 
                                                            <p><?php echo $row->rbtSkillInfo;?></p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        
                                                    </div>
                                                    </div>     
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
                <div id="prod_section-7">
                    <div class="section06">
                        <div class="box">
                                                    <div class="item_1">
                                                    <div id="firefighter" class="flip-container" onclick="fliplefta();">
                                                        <div class="flipper">
                                                        <div class="front">
                                                            <div class="card b">
                                                                    <span>消防<br>技能</span>
                                                            </div>
                                                        
                                                        </div>
                                                        <div class="back back1">
                                                            <div class="card k">
                                                            <div class="backinfo">
                                                        <p>消防型機器人擁有特殊材質的防火衣，且具備良好的力量、速度、耐力和柔韌性等特性，能適應在複雜、多變和危險的環境中進行滅火戰鬥的需要，以最短的時間、最快的速度去完成任務需要。</p>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                </div> 
                                                    <div class="item_2">
                                                            <div id="coding" class="flip-container" onclick="fliprighta();">
                                                            <div class="flipper">
                                                                <div class="front">
                                                                <div class="card b">
                                                                        <span>碼農<br>技能</span>
                                                                </div>
                                                                
                                                                </div>
                                                                <div class="back back2">
                                                                <div class="card k">
                                                                    <div class="backinfo">
                                                                <p>碼農型機器人精通前後端開發，充分理解網頁正常運行的每一個環節，不僅通曉前端 JavaScript 的哲學，以及 CSS 背後的設計情懷，也能熟悉使用後端PHP語言來編寫應用程序，用MySQL來查找、存儲和修改數據。</p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            
                                                        </div>
                                                        </div> 
                                                        <div class="item_3">
                                                            <div id="longtermcare07" class="flip-container" onclick="flipleftb();">
                                                            <div class="flipper">
                                                                <div class="front front3">
                                                                <div class="card b">
                                                                    <span>長照<br>技能</span>
                                                                </div>
                                                                
                                                                </div>
                                                                <div class="back back3">
                                                                <div class="card k">
                                                                    <div class="backinfo">
                                                        <?php
                                                        $errMsg = "";
                                                        try {
                                                            require_once("connectcd104g3.php"); 
                                                            $sql = "select * from robotskill where rbSkillNo=3";
                                                            $pdoStatement = $pdo->query( $sql);
                                                            $row = $pdoStatement->fetchObject();
                                                        } catch (PDOException $e) {
                                                            $errMsg ="錯誤原因 : " . $e->getMessage(). "<br>".	"錯誤行號 : ". $e->getLine(). "<br>";
                                                        }  
                                                        ?> 
                                                            <p><?php echo $row->rbtSkillInfo;?></p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>  
                                                        </div>
                                                        <div class="item_4">
                                                            <div id="entertainment07" class="flip-container" onclick="fliprightb();">
                                                            <div class="flipper">
                                                                <div class="front front4">
                                                                <div class="card b">
                                                                    <span>藝能<br>技能</span>
                                                                </div>
                                                                
                                                                </div>
                                                                <div class="back back-zin back4">
                                                                <div class="card k">
                                                                    <div class="backinfo">
                                                        <?php
                                                        $errMsg = "";
                                                        try {
                                                            require_once("connectcd104g3.php"); 
                                                            $sql = "select * from robotskill where rbSkillNo=4";
                                                            $pdoStatement = $pdo->query( $sql);
                                                            $row = $pdoStatement->fetchObject();
                                                        } catch (PDOException $e) {
                                                            $errMsg ="錯誤原因 : " . $e->getMessage(). "<br>".	"錯誤行號 : ". $e->getLine(). "<br>";
                                                        }  
                                                        ?> 
                                                            <p><?php echo $row->rbtSkillInfo;?></p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            
                                                        </div>
                                                        </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="footer">
            <h4>&copy; 2018 Davinci - Robot Company</h4>
        </footer>
    </div><!--======dowebok==End========-->
</div>



<!--Terminal Texts Effect===Start＝=-->
<script>
$('.animate').addClass('hide');

function typeText(animateNo){
    //console.log('13');
    // setup vars
    var currentLine = "";
    var typeSpeed = 70;
    var pauseLength = 1000;

    // get ref to DOM Elements
    var cursor = $("#cursor");
    var animate = $(`.${animateNo}`);
    var input = $("#inputcmd");
    var output = $("#output");

    // set up Event Listeners
    input.keypress(keypressInput);
    $("#terminal-window").click(openKeyboard);

    // hide text so we can animate it
    animate.each(function(index) {
    $(this).addClass("hide");
    });

    // make first call to printCharaters() for animation 開始打字
    var temp = setTimeout(printCharaters, typeSpeed);

    // this function animates printing of text inside DOMS with the .animate class.
    function printCharaters() {
    // check if current line array is empty
    if (currentLine.length == 0) {
        // stop cursor from blinking
        cursor.removeClass("blink");

        // get first line of text and add it to an array
        currentLine = animate.first().text().split("");
        currentLine = currentLine.reverse();

        // remove text from dom and unhide element
        animate.first().html("");
        animate.first().removeClass("hide");
        cursor.appendTo(animate.first());
    }

    // animate typing
    animate.first().append(currentLine.pop()).append(cursor);

    // =======================================================
    // check if we just popped the last element of the array off
    if (currentLine.length == 0) {
        // remove animated DOM Element from animation
        animate.first().removeClass(animateNo);
        // get new list of DOM Elements to animate
        animate = $(`.${animateNo}`);
        // make cursor blink at the end-of-line.
        cursor.addClass("blink");

        // Animate next DOM Element if any remain
        if (animate.length > 0) {
        setTimeout(printCharaters, pauseLength);
        } else {
        // all text in the DOM Elements have been animated
        input.after(cursor);
        input.focus();
        }
    } else {
        // Animate next character in DOM Element
        setTimeout(printCharaters, typeSpeed);
    }
    }
    // =======================================================

    function keypressInput(e) {
    // received enter key, send cmd and clear input
    if (e.keyCode == 13) {
        var command = input.text();
        output.html(proccessCMD(command));
        input.html("");
        e.preventDefault();
    }
    }

    function proccessCMD(cmd) {
    cmd = cmd.trim().toLowerCase();
    //there is only one command here. But you get the idea. Plug in your API call here.
    if (cmd == "--help") {
        return "Sorry. There are no commands aside from '--help'. But you get the idea.";
    }
    return "unknown command. type '--help' for list of commands.";
    }

    //open iOS keyboard
    function openKeyboard(){
    input.focus();
    }
}
</script>
<!--Terminal Texts Effect===End＝=-->


<script src="js/tweenmax.js" async></script>
<script src="js/product.js"></script>
<script src="js/pro_06.js"></script>
<script src="js/lightBox.js"></script>
<!--section1===透視 Start==-->
<script>
        var svgElement = document.querySelector('.maskpic1');
		var maskedElement = document.querySelector('#mask-circle');
		var circleFeedback = document.querySelector('#circle-border');
		var svgPoint = svgElement.createSVGPoint();

		// 

		function cursorPoint(e, svg) {
		    svgPoint.x = e.clientX;
		    svgPoint.y = e.clientY;
		    return svgPoint.matrixTransform(svg.getScreenCTM().inverse());
		}

		function update(svgCoords) {
		    maskedElement.setAttribute('cx', svgCoords.x);
		    maskedElement.setAttribute('cy', svgCoords.y);
		    circleFeedback.setAttribute('cx', svgCoords.x);
		    circleFeedback.setAttribute('cy', svgCoords.y);
  
		}

		window.addEventListener('mousemove', function(e) {
		  update(cursorPoint(e, svgElement));
		}, false);

		document.addEventListener('touchmove', function(e) {
		    e.preventDefault();
		    var touch = e.targetTouches[0];
		    if (touch) {
		        update(cursorPoint(touch, svgElement));
		    }
		}, false);
</script>
<!--section1===透視 End==-->






<!-- ===section-6==Start=== -->
<script>
    function fliplefta() {
      
      if ($("#firefighter").hasClass("flip")) {
        hidelefta();
      } else {
        document.querySelector("#firefighter").classList.toggle("flip");
         
      }
    }
    
    function hidelefta(){
      $("#firefighter").addClass("hide").removeClass("flip").removeClass("line_1");
        setTimeout(function() {
          $("#firefighter").removeClass("hide");
        }, 900)
    }
    $("#firefighter .card").mouseover(function() {
          $('.box1 .line span').addClass("line_1");
    });
    $("#firefighter .card").mouseout(function() {
          $('.box1 .line span').removeClass("line_1");
    });
    $("#firefighter .k").mouseover(function() {
          $('.box1 .line span').removeClass("line_1");
    });
    function fliprighta() {
      if ($("#coding").hasClass("flip")) {
        hiderighta()
      } else {
        document.querySelector("#coding").classList.toggle("flip");
      }
    }
    
    function hiderighta(){
      $("#coding").addClass("hide").removeClass("flip");
        setTimeout(function() {
          $("#coding").removeClass("hide");
        }, 900)
    }
    $("#coding .card").mouseover(function() {
          $('.box3 .line span').addClass("line_1");
    });
    $("#coding .card").mouseout(function() {
          $('.box3 .line span').removeClass("line_1");
    });
    $("#coding .k").mouseover(function() {
          $('.box3 .line span').removeClass("line_1");
    });
    function flipleftb() {
      if ($("#longtermcare").hasClass("flip")) {
        hideleftb();
      } else {
        document.querySelector("#longtermcare").classList.toggle("flip");
      }
    }
    
    function hideleftb(){
      $("#longtermcare").addClass("hide").removeClass("flip");
        setTimeout(function() {
          $("#longtermcare").removeClass("hide");
        }, 900)
    }
    $("#longtermcare .card").mouseover(function() {
          $('.box4 .line span').addClass("line_1");
    });
    $("#longtermcare .card").mouseout(function() {
          $('.box4 .line span').removeClass("line_1");
    });
    $("#longtermcare .k").mouseover(function() {
          $('.box4 .line span').removeClass("line_1");
    });
    function fliprightb() {
      if ($("#entertainment").hasClass("flip")) {
        hiderightb();
      } else {
        document.querySelector("#entertainment").classList.toggle("flip");
      }
    }
    
    function hiderightb(){
      $("#entertainment").addClass("hide").removeClass("flip");
        setTimeout(function() {
          $("#entertainment").removeClass("hide");
        }, 900)
    }
    $("#entertainment .card").mouseover(function() {
          $('.box6 .line span').addClass("line_1");
    });
    $("#entertainment .card").mouseout(function() {
          $('.box6 .line span').removeClass("line_1");
    });
    $("#entertainment .k").mouseover(function() {
          $('.box6 .line span').removeClass("line_1");
    });



    $('#prod_section-6 .item_1').click(function(){
        $('.front1').toggleClass('op0');
        $('.back1').toggleClass('op1');
    });

    $('#prod_section-6 .item_2').click(function(){
        $('.front2').toggleClass('op0');
        $('.back2').toggleClass('op1');
    });
    $('#prod_section-6 .item_3').click(function(){
        $('.front3').toggleClass('op0');
        $('.back3').toggleClass('op1');
    });

    $('#prod_section-6 .item_4').click(function(){
        $('.front4').toggleClass('op0');
        $('.back4').toggleClass('op1');
    });
    </script>
<!-- ===section-6==End=== -->
<!-- ===section-7==Start=== -->
<script>
$('#prod_section-7 .item_3').click(function(){
    $('#longtermcare07').toggleClass('flip');
    $('.front3').toggleClass('op0');
    $('.back3').toggleClass('op1');
});

$('#prod_section-7 .item_4').click(function(){
    $('#entertainment07').toggleClass('flip');
    $('.front4').toggleClass('op0');
    $('.back4').toggleClass('op1');
});
</script>
<!-- ===section-7==End=== -->


<!-- ===聲控==Start==== -->
<script>
        "use strict";
      
        // first we make sure annyang started succesfully
        if (annyang) {
      
        // define the functions our commands will run.
        //   var hello = function() {
        //     $('#myvoice').attr('autoplay','true');
        //   };
        //   var stop = function() {
        //     $('#myvoice').removeAttr('autoplay');
        //   };
        
           var stop = function() {
            $('#myvoice').remove();
          };
      
      
          var getStarted = function() {
            window.location.href = 'https://github.com/TalAter/annyang';
          }
      
          // define our commands.
          // * The key is the phrase you want your users to say.
          // * The value is the action to do.
          //   You can pass a function, a function name (as a string), or write your function as part of the commands object.
          var commands = {
            // 'hello (there)':        hello,
            'stop (there)':        stop,
          };
      
          // OPTIONAL: activate debug mode for detailed logging in the console
          annyang.debug();
      
          // Add voice commands to respond to
          annyang.addCommands(commands);
      
          // OPTIONAL: Set a language for speech recognition (defaults to English)
          // For a full list of language codes, see the documentation:
          // https://github.com/TalAter/annyang/blob/master/docs/FAQ.md#what-languages-are-supported
          annyang.setLanguage('en');
      
          // Start listening. You can call this here, or attach this call to an event, button, etc.
          annyang.start();
        } else {
          $(document).ready(function() {
            $('#unsupported').fadeIn('fast');
          });
        }
      
        var scrollTo = function(identifier, speed) {
          $('html, body').animate({
              scrollTop: $(identifier).offset().top
          }, speed || 1000);
        }
        </script> 
<!-- ===聲控==End==== -->

</body>


</html>