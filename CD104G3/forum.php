<?php 
$errMsg = "";
try {
    require_once('connect_forum.php');

    $sql = "SELECT * 
    FROM forumPost fp JOIN member m ON fp.memNo = m.memNo
                      JOIN forumPostImg fpi ON fp.postNo = fpi.postNo";
    
    $posts = $pdo->query($sql);

}catch(PDOException $e) {
    echo '錯誤訊息：'. $e->getMessage(). '錯誤行號：'. $e->getLine();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet"> 
    <link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      
    
    <title>DAVINCI 討論區</title>
    <script>
       
    </script>
</head>
<?php require_once('header.php') ?>
<body id="body">
     
     <link rel="stylesheet" href="css/forum.css">  
     

    <!-- BANNER -->
    <section class="section__forum-title">    
        <div class="section__forum-title--box">
            <div class="block__heading--title">
                <h1 class="heading--title margin-bottom-medium">
                    討論區
                </h1>
                <p class="heading--subtitle">
                    
                </p>
                <span class="top-left">
                <div class="icon"></div>
                <div class="icon"></div>
                <div class="icon"></div>
                <div class="icon"></div>
                </span>
                <span class="top-right"></span>
                <span class="bottom-left"></span>
                <span class="bottom-right">
                <div class="icon"></div>
                <div class="icon"></div>
                <div class="icon"></div>
                <div class="icon"></div>
                </span>
            </div>
        </div>    
    </section>
    <!-- END BANNER -->

    

    <!-- 發文 + 搜尋 -->
    <section class="section__function">
        <div class="row">
            <div class="btn--post" id="btn-post">
                <div class="btn--post-box">
                    <img src="img/btn.png" alt="" class="btn--post-box-img">
                </div>                
                <span>發文</span>
            </div>
            
            <input type="text" class="search-bar" id="searchBar" placeholder="搜尋.."><img src="" alt="">
        </div>
    </section>
    <!-- END 發文 + 搜尋 -->
     
    <!-- 發文頁面 -->
    <section class="section__editor">
        <div class="newPost">
            <h3>發表文章</h3>
            <div class="editor-close">
                +
            </div>
            <form id="form" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="輸入標題..." name="postTitle" id="title" required>
                <input type="hidden" name="memNo" value="" id="sentPostmemNo">
                <input type="hidden" name="memId" value="" id="sentPostmemId">
                
                <div class="toolbar">
                    <button type="button" data-func="bold"><i class="fa fa-bold"></i></button>
                    <button type="button" data-func="italic"><i class="fa fa-italic"></i></button>
                    <button type="button" data-func="underline"><i class="fa fa-underline"></i></button>
                    <button type="button" data-func="justifyleft"><i class="fa fa-align-left"></i></button>
                    <button type="button" data-func="justifycenter"><i class="fa fa-align-center"></i></button>
                    <button type="button" data-func="justifyright"><i class="fa fa-align-right"></i></button>
                    <button type="button" data-func="insertunorderedlist"><i class="fa fa-list-ul"></i></button>
                    <button type="button" data-func="insertorderedlist"><i class="fa fa-list-ol"></i></button>
                    
                    <div class="customSelect">
                    <select data-func="formatblock" name="postCat" required id="postCat">
                        <option value="" >文章分類</option>
                        <option name="postCat" value="1">開箱分享</option>
                        <option name="postCat" value="2">攻略分享</option>
                        
                    </select>
                    </div>
                </div>
                <textarea class="editor" contenteditable name="postInner" id="content"  required></textarea>
                <div class="buttons">
                    <input type="file" name="imgURL" style="float:left" id="imgURL" accept="image/*" id="imgURL">
                    <button data-func="clear" type="button" id="clear">clear</button>
                    <button data-func="save" type="button" id="save" name="save">save</button>
                </div>
            </form>    
        </div>
    </section>

    <!-- 文章區  -->
    <section class="section__post">
        <div class="section__post--block">
            <!-- 分類 -->
            <div class="post__cat">
                <ul>
                    <li><a class="post__cat--item active1" id="postAll" postcat="4">全部文章</a></li>
                    <li><a class="post__cat--item" id="postSec" postcat="1">開箱分享</a></li>
                    <li><a class="post__cat--item" id="postSkill" postcat="2">攻略分享</a></li>
                </ul>
            </div>

            <!-- 排序 -->
            <div class="post__order">
                <ul>
                    <li>排序:</li>
                    <li><a class="post__order--cat active2" order="fp.postTime">最新</a></li>
                    <li><a class="post__order--cat" order="fp.readCount">人氣</a></li>                    
                    <li><a class="post__order--cat" order="fp.saveCount">收藏</a></li>
                    <li><a class="post__order--cat" order="fp.msgCount">留言</a></li>
                </ul>
            </div>

            <!-- 討論區文章 -->
            <div class="post__content">
               
            </div>

              
        </div>    
    </section>
    <!-- END 文章區  -->

    <!-- 討論區內文 -->
    <section class="section__inner" id="section__inner">
        <div id="click__out"></div>
        <div class="previous-post__block">
            <div class="previous-post__block-post">
                <div class="show">
                    <img src="img/back.png" alt="back button" class="btn__left--next"> 
                    <div class="content__preview">
                        <div class="content__preview-text">
                            <div class="content__preview--user-info">
                                <img src="img/userphoto.png" alt="user image" class="content__preview-user-img" width="30px">
                                <span class="content__preview--username">王小明</span> 
                            </div>
                            
                            <h3 class="content__preview--title">達文西好棒</h3> 
                            <p class="content__preview--inner">Lorem ipsum dolor sit.</p>
                            <div class="content__preview--info">
                                <span class="content__preview-view">觀看：11</span>
                                <span class="content__preview-reply">回應：22</span>
                                <span class="content__preview-save">收藏：33</span>
                            </div>                  
                        </div>
                        <div class="content__preview-img">
                            <img src="img/robot-1.png" alt="img post" class="content__preview-postImg"  height="80px">
                        </div>
                        <div class="clearfix"></div>
                    </div>   
                    <div class="clearfix"></div>           
                </div>
            </div>
        </div>
        <div class="section__inner-page">
            <div class="inner-page__user">
                <img src="" alt="user portrait" class="inner-page__user-img">
                <span class="user__name"></span>
                <div class="close" id="close-modal">+</div>
            </div>
            <div class="inner-page__content">
                <div class="inner-page__content--title"></div>
                <div class="inner-page__content--cat"></div>

                <div class="inner-page__content--text"></div>

                <div class="inner-page__content--info">
                    <div class="content--info-VRS">
                        <div class="view">
                            <img src="img/view-white.png" alt="view img" class="view-img">
                            <span class="view-num"></span>
                        </div>
                        <div class="response">
                            <span class="response-title">回應</span>
                            <span class="response-num"></span>
                        </div>
                        <div class="save">
                            <img src="img/coll-white.png" alt="collection img" class="save-img">
                            <span class="save-num" ></span>
                        </div>                    
                    </div>

                    <div class="content--info-report">
                        <img src="img/report.png" alt="report img" class="reportPost" reportNo="">
                        <img src="img/coll-white.png" alt="collection img" class="reportSave" reportNo="">                     
                    </div>
                </div>

                <div class="msg">
                    <div class="msg__block">
                        <div class="msg__block--top">
                            <div class="user-img">
                                <img src="" alt="user image">
                            </div>
                            <div class="user-info">
                                <div class="user-info__userName"></div>
                                <div class="user-info__replyDate"></div>
                            </div>
                            <div class="user-info__report">
                                <img src="img/report.png" alt="report image" class="reportMsg">
                            </div>
                        </div>

                        <div class="msg__block--bottom">
                            <div class="msg__block--bottom-content">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="inner-page__content--response-box" id="inner-page__content--response-box">
                    
                    <div class="response-box" id="response-box">
                        <div class="expend-btn"><span>回應...</span></div>
                    </div>
                    <div class="page-down" id="page-down">
                        <div class="btn-goDown">
                            <img src="img/arrow-down.png" alt="arrow down">
                        </div>
                    </div>
                    <form class="response-box__expend" id="formMsg">
                        <input type="hidden" name="memNo" value="" id="sentMsgmemNo">
                        <input type="hidden" name="memId" value="" id="sentMsgmemId">
                        <input type="hidden" name="postno" value=""  id="sentMsgpostNo">
                        <div class="response-box__expend__user">
                            <img src="" alt="userphoto" class="replyUserPhoto">
                            <span class="username"></span>
                            <div class="response-box__expend__user-close" id="response-box__expend__user-close">+</div>
                        </div>
                        <div action="" class="response-box__expend__form">
                            <div class="response-box__expend__form-content">
                                <input type="text" name="msgInner">
                            </div>
                            <div class="response-box__expend__form-footer">                                                           
                                <input type="submit" value="送出" id="submit">
                            </div> 
                        </div>                                        
                    </form>
                </div>
            </div>
        </div>    
        <div class="next-post__block">            
            <div class="next-post__block-post">
                <div class="show">
                    <img src="img/next.png" alt="next button" class="btn__right--next">
                    <span class="content__next">
                        <div class="content__next-text">
                            <div class="content__next--user-info">
                                <img src="img/userphoto.png" alt="user image" class="content__next-user-img">
                                <span class="content__next--username">王小明</span> 
                            </div>
                            
                            <h3 class="content__next--title">達文西好棒</h3>  
                            <p class="content__next--inner">Lorem ipsum dolor sit</p>
                            <div class="content__next--info">
                                <span class="content__next-view">觀看：11</span>
                                <span class="content__next-reply">回應：22</span>
                                <span class="content__next-save">收藏：33</span>
                            </div>                  
                        </div>
                        <div class="content__next-img">
                            <img src="img/robot-1.png" alt="img post" class="content__next-postImg">
                        </div>
                        <div class="clearfix"></div>
                    </div>   
                    <div class="clearfix"></div>         
                </div>
            </div>                        
        </div>
    </section>

    <!-- 文章檢舉視窗 -->
    <div class="report__Modal--post-blur"></div>
    <div class="report__Modal--post">
        <h3>協助我們了解狀況？</h3>
        <form  id="reportPostForm">
            <input type="hidden" name="reportPostNo" value="" id="reportPostNo">
            <input type="hidden" name="memNo" value="" id="sentrepPostmemNo">
            <input type="hidden" name="repPostState" value="1">
            <p><input type="radio" name="repPostCause" id="porn" value="色情、暴力等不當內容"><label for="porn">色情、暴力等不當內容</label></p>
            <p><input type="radio" name="repPostCause" id="rude" value="歧視、謾罵他人"><label for="rude">歧視、謾罵他人</label></p>
            <p><input type="radio" name="repPostCause" id="illegal" value="其他違規、違法項目" checked><label for="illegal">其他違規、違法項目</label></p>
            <div class="modal__btn">
                <button class="post-submit" type="submit">確 認</button>
                <span class="post-cancel">取消</span>
            </div>
        </form>        
    </div> 

    <!-- 文章儲存 -->
    <div class="save__Modal--post">
        <h3>文章已儲存</h3>
        <p><i class="fas fa-check"></i></p>
    </div>


    <!-- FOOTER -->
    <footer class="footer">
        <h4>&copy; 2018 Davinci - Robot Company</h4>
    </footer>
    <!-- END FOOTER -->

   
    
    <!-- <script src="js/forum.js"></script> -->

    <script type="text/javascript">
/********************************************
                 以下JS
********************************************/
//關閉'回報視窗'
// function closeReport() {
    $('.post-cancel').off().on('click', 
        ()=> {
            $(this).off('submit');
            $('.report__Modal--post').css('display', 'none');

        }
    );
// }
//打開'回報視窗'
function openReport() {    
    $('.report__Modal--post').css('display', 'block');        
}

//回報文章
function reportPost() {
    //打開'文章回報'視窗，抓取該篇文章號碼
    $('.reportPost').off().on('click', 
        (e)=> {
            if(memberData.ourMemNo) {            
                openReport();
                reportPostNo = $(e.currentTarget).attr('reportNo');   
                $('#reportPostNo').val(reportPostNo);     
                
            }else {
                document.getElementById('memlightBox-wrap').style.display = 'block';
            }
                  
        }
    );

    //送出'回報表單' post-submit
    $('#reportPostForm').off().on('submit', 
        ()=> {
            $.ajax({
                url: 'reportPost.php',
                type: 'POST',
                data:  $('#reportPostForm').serialize(),
                success: (data)=> {
                },
            });
        }
    );
}
//回報留言
function reportMsg() {
    //打開'文章回報'視窗，抓取該篇文章號碼
    $('.reportMsg').off().on('click', 
        (e)=> {
            if(memberData.ourMemNo) {            
                openReport();
                reportMsgNo = $(e.currentTarget).attr('repmsgno');   
                $('#reportPostNo').val(reportMsgNo);    
                
            }else {
                document.getElementById('memlightBox-wrap').style.display = 'block';
            }
                 
        }
    );

    //送出'回報表單' post-submit
    $('#reportPostForm').off().on('submit', 
        ()=> {
            $.ajax({
                url: 'reportMsg.php',
                type: 'POST',
                data:  $('#reportPostForm').serialize(),
                success: (data)=> {
                },
            });
        }
    );
}
 
 


        
// 文字輸入效果
function keyIn() {
    var title = document.querySelector(".heading--subtitle");
    var titleText = '分享機器人 分享愛';
    var CHAR_TIME = 150;

    var text = void 0,index = void 0;

    function requestCharAnimation(char, value) {
    setTimeout(function () {
        char.textContent = value;
        char.classList.add("fade-in");
    }, CHAR_TIME);
    }

    function addChar() {
        var char = document.createElement("span");
        char.classList.add("char");
        char.textContent = "▌";
        title.appendChild(char);
        requestCharAnimation(char, text.substr(index++, 1));
        if (index < text.length) {
            requestChar();
        }
    }

    function requestChar() {
        var delay = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
        setTimeout(addChar, CHAR_TIME + delay);
    }

    function start() {
    index = 0;
    text = titleText.trim();
    title.textContent = "";
    requestChar(1000);
    }
    start();
}

//開啟文章內頁
var modal = document.getElementById('section__inner'); 
function openModal() {
    var post = document.querySelectorAll('.post__block');
    for(var i = 0; i<post.length; i++) {
        post[i].addEventListener('click', function() {
            modal.style.display = "flex";
            document.documentElement.style.overflow = 'scroll';
            document.body.scroll = "yes";
        })
    }
};
//關閉文章內頁
function closeModal() {
    var close1 = document.getElementById('close-modal');
    $('#close-modal').off().on('click', 
     function() {
        modal.style.display = "none";
        document.body.scroll = "yes";
    });
};

// 開啟文章留言欄
function openResponse() {
    responseWhole = document.getElementById('inner-page__content--response-box');
    responsePart = document.getElementById("response-box");
    pageDown = document.getElementById('page-down');
    $('#response-box').off().on('click', 
     function() {

        
        if(memberData.ourMemNo) {            
            responseWhole.classList.add("show-responseBox"); 
            responsePart.style.display = "none";   
            pageDown.style.display = "none";   
            
        }else {
            document.getElementById('memlightBox-wrap').style.display = 'block';
        }
            
          
               
    });

} 
// 關閉文章留言欄
function closeResponse() {
    var closeExp = document.getElementById('response-box__expend__user-close');
    $('#response-box__expend__user-close').off().on('click', 
     function() {
        responseWhole.classList.remove("show-responseBox");
        responsePart.style.display = "block";  
        pageDown.style.display = "block";   
    });
}


//開啟文章編輯器
var postEditor = document.getElementById('btn-post');
var editorArea = document.querySelector('.section__editor');
function openEditor() {
    
    postEditor.addEventListener('click', () => {
        if(memberData.ourMemNo) {
            if(editorArea.style.display = "none") {
                editorArea.style.display = "block";
            }
        }else {
            document.getElementById('memlightBox-wrap').style.display = 'block';
        }
        
    })
}
//關閉文章編輯器
var editorClose = document.querySelector('.editor-close');
function closeEditor() {
    $('.editor-close').off().on('click', 
     () => {
        if(editorArea.style.display = "block") {
            editorArea.style.display = "none";
        }
    })
}

//留言送出
function insertMsg() {
     memNo = $('#sentMsgmemNo').val(memberData.ourMemNo);
     memId = $('#sentMsgmemId').val(memberData.ourMemId);  
    $('#submit').off().on('click', 
        ()=> {
        $.ajax({
            url: 'insertMsg.php',
            type: 'post',
            data: $('#formMsg').serialize(),
            success:(b) => {
                // alert('留言已送出');
                $('#formMsg')[0].reset();

                //alert
                $('#loginstate-wrap').show();
                $('#state-pic-V').hide();  //要打勾就 V -> show  X -> hide
                $('#state-pic-X').show();  //要打擦就 X -> show  V -> hide
                $('#state-con-inner').html('留言已送出');
            }
        });
    });
}

//標示停留頁面-文章分類
$('.post__cat--item').click(
    function() {
    $(this).addClass('active1');
    $('.post__cat--item').not(this).removeClass('active1');
});
//標示停留頁面-文章排序
$('.post__order--cat').click(
    function() {
    $(this).addClass('active2');
    $('.post__order--cat').not(this).removeClass('active2');
});



//發文送出 問題：會連續點擊很多次造成很多比資料 *****************************





/********************************************
                 以下AJAX
********************************************/


// 開文章內文
function openPost() {
    var postInner = document.getElementById('section__inner');    
    // var openPost = document.querySelectorAll('.box-rotate-wrap');
    memNo = $('#sentPostmemNo').val(memberData.ourMemNo);
    memId = $('#sentPostmemId').val(memberData.ourMemId); 
    $('.replyUserPhoto').attr('src', memberData.ourMemImg);
    $('.username').text(memberData.ourMemName);
    
        $('.box-rotate-wrap').off().on('click', 
            (e)=>{    
            var currentPostNo = e.currentTarget.getAttribute('postno');
            var previousPostNo = currentPostNo-1;
            var nextPostNo = parseInt(currentPostNo)+1;
            postInner.style.display = "flex";
            //撈內文內容
            $.ajax({
                url: 'get_forumPostInner.php',
                type: 'post',
                data: {currentPostNo: currentPostNo},
                success:(data) => {
                    postInnerData = JSON.parse(data);
                    for( myObj in postInnerData) {
                        var postCat = ['', '開箱分享', '攻略分享'];
                        $('.inner-page__user-img').attr('src', `${postInnerData[myObj].memImg}`);
                        $('.user__name').html(postInnerData[myObj].memName);
                        $('.inner-page__content--title').html(postInnerData[myObj].postTitle);
                        $('.inner-page__content--cat').html(`<a href="#" class="content--cat">${postCat[parseInt(postInnerData[myObj].postCat)]}</a>
                        <span class="content--date">${postInnerData[myObj].postTime}</span>`);
                        $('.inner-page__content--text').html(`<img src="img/${postInnerData[myObj].imgURL}" alt="post img">
                        <p>${postInnerData[myObj].postInner}</p>`);
                        $('.view-num').html(postInnerData[myObj].readCount);
                        $('.response-num').html(postInnerData[myObj].msgCount);
                        $('.save-num').html(postInnerData[myObj].saveCount);
                        
                        $('#postno').attr('value', currentPostNo);//塞被點擊文章的postNo給留言區抓資料
                        $('.reportPost').attr('reportNo', currentPostNo);//在當篇文章的report按鈕裡塞當篇的文章編號
                        $('.reportSave').attr('reportNo', currentPostNo);//在當篇文章的save按鈕裡塞當篇的文章編號
                        $('#sentMsgpostNo').val(currentPostNo);//在當篇文章的留言表單塞當篇文章編號
                    }                    
                },
                complete: ()=> {
                    var memNo = $('#sentrepPostmemNo').val(memberData.ourMemNo);   
                    reportPost();
                    //文章收藏
                    $('.reportSave').off().on('click',      
                        (e)=> {
                                if(memberData.ourMemNo) {            
                                    reportno = $(e.target).attr('reportno');   
                                    $('.save__Modal--post').show().delay(600).fadeOut("slow");   
                                    
                                    $.ajax({
                                        url: 'savePost.php',
                                        type: 'POST',
                                        data:  {reportno: reportno, memNo: memberData.ourMemNo},
                                    
                                    }); 
                                
                            }else {
                                document.getElementById('memlightBox-wrap').style.display = 'block';
                            }          
                                           
                        }
                        
                    );

                }
            });

            //撈'上一篇'內文內容            
            $.ajax({
                url: 'get_forumPostInner1.php',
                type: 'post',
                data: {previousPostNo: previousPostNo},
                success:(data) => {
                    postInnerData = JSON.parse(data);
                    for( myObj in postInnerData) {
                        var postCat = ['', '心得分享', '二手拍賣', '攻略分享'];
                        $('.content__preview-user-img').attr('src', `${postInnerData[myObj].memImg}`);
                        $('.content__preview--username').html(postInnerData[myObj].memName);
                        $('.content__preview--title').html(postInnerData[myObj].postTitle);                        
                        $('.content__preview--inner').html(`${postInnerData[myObj].postInner}<span>...</span>`);
                        $('.content__preview-view').html(`觀看：${postInnerData[myObj].readCount}`);
                        $('.content__preview-reply').html(`回應：${postInnerData[myObj].msgCount}`);
                        $('.content__preview-save').html(`收藏：${postInnerData[myObj].saveCount}`);
                    }
                }
            });

            //撈'下一篇'內文內容            
            $.ajax({
                url: 'get_forumPostInner2.php',
                type: 'post',
                data: {nextPostNo: nextPostNo},
                success:(data) => {
                    postInnerData = JSON.parse(data);
                    for( myObj in postInnerData) {
                        var postCat = ['', '心得分享', '二手拍賣', '攻略分享'];
                        $('.content__next-user-img').attr('src', `${postInnerData[myObj].memImg}`);
                        $('.content__next--username').html(postInnerData[myObj].memName);
                        $('.content__next--title').html(postInnerData[myObj].postTitle);                        
                        $('.content__next--inner').html(`${postInnerData[myObj].postInner}<span>...</span>`);
                        $('.content__next-view').html(`觀看：${postInnerData[myObj].readCount}`);
                        $('.content__next-reply').html(`回應：${postInnerData[myObj].msgCount}`);
                        $('.content__next-save').html(`收藏：${postInnerData[myObj].saveCount}`);
                    }
                    
                }
            });

            //撈內文留言
            $.ajax({
                url: 'get_forumMsg.php',
                type: 'post',
                data: {currentPostNo: currentPostNo},
                success: (data) => {
                    
                    var postMsgData = JSON.parse(data); 
                    output ="";
                    for(var myObj in postMsgData) {
                        output += `
                        <div class="msg__block">
                            <div class="msg__block--top">
                                <div class="user-img">
                                    <img src="${postMsgData[myObj].memImg}" alt="user image">
                                </div>
                                <div class="user-info">
                                    <div class="user-info__userName">${postMsgData[myObj].memName}</div>
                                    <div class="user-info__replyDate">${postMsgData[myObj].msgTime}</div>
                                </div>
                                <div class="user-info__report">
                                    <img src="img/report.png" alt="report image" class="reportMsg" repmsgno="${postMsgData[myObj].msgNo}">
                                </div>
                            </div>

                            <div class="msg__block--bottom">
                                <div class="msg__block--bottom-content">
                                    <p>${postMsgData[myObj].msgInner}</p>
                                </div>
                            </div>
                        </div>
                        `;
                    }    
                    $('.msg').html(output);
                },
                complete: () => {
                    openResponse();//開留言區
                    closeResponse();//關留言區
                    //存留言
                    var memNo = $('#sentMsgmemNo').val(memberData.ourMemNo);
                    var memId = $('#sentMsgmemId').val(memberData.ourMemId);  
                    $('#submit').off().on('click', 
                        ()=> {
                        $.ajax({
                            url: 'insertMsg.php',
                            type: 'post',
                            data: $('#formMsg').serialize(),
                            success:(b) => {
                                // alert('留言已送出');
                                $('#formMsg')[0].reset();
                                //alert 
                                $('#loginstate-wrap').show();
                                $('#state-pic-V').hide();  //要打勾就 V -> show  X -> hide
                                $('#state-pic-X').show();  //要打擦就 X -> show  V -> hide
                                $('#state-con-inner').html('留言已送出');
                            }
                        });
                    });

                    reportMsg();//回報留言
                }

            });
            
        });  
    
}

//排序後開內文
function openPostAffter() {
    var postInner = document.getElementById('section__inner');    

    memNo = $('#sentPostmemNo').val(memberData.ourMemNo);
    memId = $('#sentPostmemId').val(memberData.ourMemId); 
    $('.replyUserPhoto').attr('src', memberData.ourMemImg);
    $('.username').text(memberData.ourMemName);
    $('.box-rotate-wrap').off().on('click', 
        (e)=>{
       
        var currentPostNo = e.currentTarget.getAttribute('postno');            
        var next = e.currentTarget.nextElementSibling;
        var prev = e.currentTarget.previousElementSibling;

        var currentPost = e.currentTarget;          
        if(prev) {
            
            var prevPostNo =prev.getAttribute('postno');
            $('.previous-post__block').css('display', 'block');
            $('.previous-post__block-post .show').off().on('click', 
                ()=>{
                currentPost.previousElementSibling.click();
            });
        }else {
            $('.previous-post__block').css('display', 'none');
        }
        if(next){
            var nextPostNo =next.getAttribute('postno');
            $('.next-post__block').css('display', 'block');
            $('.next-post__block-post .show').off().on('click', 
                ()=>{
                currentPost.nextElementSibling.click();
            });
        }else {
            $('.next-post__block').css('display', 'none');
        }
        postInner.style.display = "flex";
        //撈內文內容
        $.ajax({
            url: 'get_forumPostInner.php',
            type: 'post',
            data: {currentPostNo: currentPostNo},
            success:(data) => {
                postInnerData = JSON.parse(data);
                for( myObj in postInnerData) {
                    var postCat = ['', '開箱分享', '攻略分享'];
                    $('.inner-page__user-img').attr('src', `${postInnerData[myObj].memImg}`);
                    $('.user__name').html(postInnerData[myObj].memName);
                    $('.inner-page__content--title').html(postInnerData[myObj].postTitle);
                    $('.inner-page__content--cat').html(`<a href="#" class="content--cat">${postCat[parseInt(postInnerData[myObj].postCat)]}</a>
                    <span class="content--date">${postInnerData[myObj].postTime}</span>`);
                    $('.inner-page__content--text').html(`<img src="img/${postInnerData[myObj].imgURL}" alt="post img">
                    <p>${postInnerData[myObj].postInner}</p>`);
                    $('.view-num').html(postInnerData[myObj].readCount);
                    $('.response-num').html(postInnerData[myObj].msgCount);
                    $('.save-num').html(postInnerData[myObj].saveCount);
                    
                    $('#postno').attr('value', currentPostNo);//塞被點擊文章的postNo給留言區抓資料
                    $('.reportPost').attr('reportNo', currentPostNo);//在當篇文章的report按鈕裡塞當篇的文章編號
                    $('.reportSave').attr('reportNo', currentPostNo);//在當篇文章的save按鈕裡塞當篇的文章編號
                    $('#sentMsgpostNo').val(currentPostNo);//在當篇文章的留言表單塞當篇文章編號
                }                    
            },
            complete: ()=> {
                var memNo = $('#sentrepPostmemNo').val(memberData.ourMemNo);   
                reportPost();
                //文章收藏
                $('.reportSave').off().on('click',       
                    (e)=> {
                            if(memberData.ourMemNo) {            
                                reportno = $(e.target).attr('reportno');   
                                $('.save__Modal--post').show().delay(600).fadeOut("slow");   
                                
                                $.ajax({
                                    url: 'savePost.php',
                                    type: 'POST',
                                    data:  {reportno: reportno, memNo: memberData.ourMemNo},
                                
                                }); 
                            
                        }else {
                            document.getElementById('memlightBox-wrap').style.display = 'block';
                        }
                        
                    }
                );

            }
        });

        //撈'上一篇'內文內容            
        $.ajax({
            url: 'get_forumPostInner1.php',
            type: 'post',
            data: {previousPostNo: prevPostNo},
            success:(data) => {
                postInnerData = JSON.parse(data);
                for( myObj in postInnerData) {
                    var postCat = ['', '心得分享', '二手拍賣', '攻略分享'];
                    $('.content__preview-user-img').attr('src', `${postInnerData[myObj].memImg}`);
                    $('.content__preview--username').html(postInnerData[myObj].memName);
                    $('.content__preview--title').html(postInnerData[myObj].postTitle);                        
                    $('.content__preview--inner').html(`${postInnerData[myObj].postInner}<span></span>`);
                    $('.content__preview-view').html(`觀看：${postInnerData[myObj].readCount}`);
                    $('.content__preview-reply').html(`回應：${postInnerData[myObj].msgCount}`);
                    $('.content__preview-save').html(`收藏：${postInnerData[myObj].saveCount}`);
                    $('.content__preview-postImg').attr('src', `img/${postInnerData[myObj].imgURL}`);
                }
            }
        });

        //撈'下一篇'內文內容            
        $.ajax({
            url: 'get_forumPostInner2.php',
            type: 'post',
            data: {nextPostNo: nextPostNo},
            success:(data) => {
                postInnerData = JSON.parse(data);
                for( myObj in postInnerData) {
                    var postCat = ['', '心得分享', '二手拍賣', '攻略分享'];
                    $('.content__next-user-img').attr('src', `${postInnerData[myObj].memImg}`);
                    $('.content__next--username').html(postInnerData[myObj].memName);
                    $('.content__next--title').html(postInnerData[myObj].postTitle);                        
                    $('.content__next--inner').html(`${postInnerData[myObj].postInner}<span></span>`);
                    $('.content__next-view').html(`觀看：${postInnerData[myObj].readCount}`);
                    $('.content__next-reply').html(`回應：${postInnerData[myObj].msgCount}`);
                    $('.content__next-save').html(`收藏：${postInnerData[myObj].saveCount}`);                        
                    $('.content__next-postImg').attr('src', `img/${postInnerData[myObj].imgURL}`);//
                }
                
            }
        });

        //撈內文留言
        $.ajax({
            url: 'get_forumMsg.php',
            type: 'post',
            data: {currentPostNo: currentPostNo},
            success: (data) => {
                
                var postMsgData = JSON.parse(data); 
                output ="";
                for(var myObj in postMsgData) {
                    output += `
                    <div class="msg__block">
                        <div class="msg__block--top">
                            <div class="user-img">
                                <img src="${postMsgData[myObj].memImg}" alt="user image">
                            </div>
                            <div class="user-info">
                                <div class="user-info__userName">${postMsgData[myObj].memName}</div>
                                <div class="user-info__replyDate">${postMsgData[myObj].msgTime}</div>
                            </div>
                            <div class="user-info__report">
                                <img src="img/report.png" alt="report image" class="reportMsg" repmsgno="${postMsgData[myObj].msgNo}">
                            </div>
                        </div>

                        <div class="msg__block--bottom">
                            <div class="msg__block--bottom-content">
                                <p>${postMsgData[myObj].msgInner}</p>
                            </div>
                        </div>
                    </div>
                    `;
                }    
                $('.msg').html(output);
            },
            complete: () => {
                openResponse();//開留言區
                closeResponse();//關留言區
                //存留言
                var memNo = $('#sentMsgmemNo').val(memberData.ourMemNo);
                var memId = $('#sentMsgmemId').val(memberData.ourMemId);  
                $('#submit').off().on('click', 
                    ()=> {
                    $.ajax({
                        url: 'insertMsg.php',
                        type: 'post',
                        data: $('#formMsg').serialize(),
                        success:(b) => {
                            // alert('留言已送出');
                            $('#formMsg')[0].reset();

                            //alert
                            $('#loginstate-wrap').show();
                            $('#state-pic-V').hide();  //要打勾就 V -> show  X -> hide
                            $('#state-pic-X').show();  //要打擦就 X -> show  V -> hide
                            $('#state-con-inner').html('留言已送出');
                        }
                    });
                });

                reportMsg();//回報留言
            }

        });
    });    
            
    
    
}






   
    //jQuery 作法
    $(document).ready(function() {
        //window onload 顯示所有文章
        window.onload =  () => {
            setTimeout(keyIn, 1100);
            $(".top-left").hide().delay(1500).fadeIn('slow');
            $(".bottom-right").hide().delay(1500).fadeIn('slow');


            //點背景關掉文章
            $('#click__out').click(()=> {
                $('.section__inner').css('display', 'none');
            });
            

            //清發文內文
            $('button[data-func="clear"]').click(function(){
                $('.editor').val('');
                $('#title').val('');
            });


            //發文檔案上傳
            document.getElementById("imgURL").onchange = function(e){
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
            };
            
            //如果沒選擇文章種類，給預設值全部
            currentPostCate= undefined;

            $.ajax({
                
                url: 'get_forumPost1.php',
                type: 'POST',
                data: {postcat: currentPostCate},
                
                success: (data) => {
                    dataContent = JSON.parse(data); // 將回傳的string轉成object
                    
                    output ="";
                    for(var myObj in dataContent) { // 將object分row 取出                    

                    output += `<div class="box-rotate-wrap" postNo="${dataContent[myObj].postNo}">
                                    <div class="box box-rotate box-rotate-back">
                                        <div class="front">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${dataContent[myObj].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${dataContent[myObj].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${dataContent[myObj].postTitle }</h3>  
                                                    <div class="post__content--info">
                                                        <span class="view-count">觀看：${dataContent[myObj].readCount}</span>
                                                        <span class="reply-count">回應：${dataContent[myObj].msgCount}</span>
                                                        <span class="save-count">收藏：${dataContent[myObj].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${dataContent[myObj].imgURL}" alt="img post" class="post-img">
                                                </div>
                                            </div>                          
                                        </div>
                                        <div class="back">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${dataContent[myObj].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${dataContent[myObj].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${dataContent[myObj].postTitle }</h3>  
                                                    <div class='post__content--info'>
                                                        <span class="view-count">觀看：${dataContent[myObj].readCount}</span>
                                                        <span class="reply-count">回應：${dataContent[myObj].msgCount}</span>
                                                        <span class="save-count">收藏：${dataContent[myObj].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${dataContent[myObj].imgURL}" alt='img post' class="post-img">
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class='top'>
                                        </div>
                                        <div class='bottom'>
                                        </div>
                                    </div>
                    </div>  `;
                    }
                    $('.post__content').html(output);
                },
                complete: function() {
                    
                    openModal();//開視窗
                    closeModal();//關視窗
                    openEditor();//開啟發文
                    closeEditor();//關閉發文
                    // openPost();//撈內文
                    openPostAffter();
                }
            });

            //監聽搜尋列-找keyword文章
            keywords = '';
            $('#searchBar').keyup(                
                ()=> {
                    keywords = $('#searchBar').val();
                    $.ajax({
                
                        url: 'get_forumPost1.php',
                        type: 'POST',
                        data: {postcat: currentPostCate, keyword: keywords}, //抓'分類二'的postcat值 讓AJAX傳給sql
                        
                        success: (data) => {
                            dataContent = JSON.parse(data); // 將回傳的string轉成object
                            output ="";
                            for(var myObj in dataContent) { // 將object分row 取出                    

                            output += `<div class="box-rotate-wrap" postNo="${dataContent[myObj].postNo}">
                                            <div class="box box-rotate box-rotate-back">
                                                <div class="front">  
                                                    <div class="post__block">
                                                        <div class="post__content--block-text">
                                                            <div class="post__content--user-info">
                                                                <img src="${dataContent[myObj].memImg}" alt="user image" class="post__content-user-img">
                                                                <span class="post__content--username">${dataContent[myObj].memName}</span> 
                                                            </div>
                                                            
                                                            <h3 class="post__content--title">${dataContent[myObj].postTitle }</h3>  
                                                            <div class="post__content--info">
                                                                <span class="view-count">觀看：${dataContent[myObj].readCount}</span>
                                                                <span class="reply-count">回應：${dataContent[myObj].msgCount}</span>
                                                                <span class="save-count">收藏：${dataContent[myObj].saveCount}</span>
                                                            </div>                  
                                                        </div>
                                                        <div class="post__content--block-img">
                                                            <img src="img/${dataContent[myObj].imgURL}" alt="img post" class="post-img">
                                                        </div>
                                                    </div>                          
                                                </div>
                                                <div class="back">  
                                                    <div class="post__block">
                                                        <div class="post__content--block-text">
                                                            <div class="post__content--user-info">
                                                                <img src="${dataContent[myObj].memImg}" alt="user image" class="post__content-user-img">
                                                                <span class="post__content--username">${dataContent[myObj].memName}</span> 
                                                            </div>
                                                            
                                                            <h3 class="post__content--title">${dataContent[myObj].postTitle }</h3>  
                                                            <div class='post__content--info'>
                                                                <span class="view-count">觀看：${dataContent[myObj].readCount}</span>
                                                                <span class="reply-count">回應：${dataContent[myObj].msgCount}</span>
                                                                <span class="save-count">收藏：${dataContent[myObj].saveCount}</span>
                                                            </div>                  
                                                        </div>
                                                        <div class="post__content--block-img">
                                                            <img src="img/${dataContent[myObj].imgURL}" alt='img post' class="post-img">
                                                        </div>
                                                    </div>                    
                                                </div>
                                                <div class='top'>
                                                </div>
                                                <div class='bottom'>
                                                </div>
                                            </div>
                            </div>  `;
                            }
                            $('.post__content').html(output);
                        },
                        complete: function() {
                            
                            openModal();//開視窗
                            closeModal();//關視窗
                            openEditor();//開啟發文
                            closeEditor();//關閉發文
                            // openPost();//撈內文
                            openPostAffter();
                        }
                    });
                }
            );

            
            //選分類
            
            //分類文章
                $('.post__cat--item').click(
                    (e)=> {

               
                // postCate[i].onclick = (e)=> {
                    currentPostCate = e.currentTarget.getAttribute('postcat');
                    
                    //撈所有資料
                    $.ajax({
                        url: 'get_forumPost1.php',
                        type: 'POST',
                        data: {postcat:currentPostCate}, 
                        
                        success: (data) => {
                            dataContent = JSON.parse(data); // 將回傳的string轉成object
                            output ="";
                            for(var myObj in dataContent) { // 將object分row 取出                    

                            output += `<div class="box-rotate-wrap" postNo="${dataContent[myObj].postNo}">
                                            <div class="box box-rotate box-rotate-back">
                                                <div class="front">  
                                                    <div class="post__block">
                                                        <div class="post__content--block-text">
                                                            <div class="post__content--user-info">
                                                                <img src="${dataContent[myObj].memImg}" alt="user image" class="post__content-user-img">
                                                                <span class="post__content--username">${dataContent[myObj].memName}</span> 
                                                            </div>
                                                            
                                                            <h3 class="post__content--title">${dataContent[myObj].postTitle }</h3>  
                                                            <div class="post__content--info">
                                                                <span class="view-count">觀看：${dataContent[myObj].readCount}</span>
                                                                <span class="reply-count">回應：${dataContent[myObj].msgCount}</span>
                                                                <span class="save-count">收藏：${dataContent[myObj].saveCount}</span>
                                                            </div>                  
                                                        </div>
                                                        <div class="post__content--block-img">
                                                            <img src="img/${dataContent[myObj].imgURL}" alt="img post" class="post-img">
                                                        </div>
                                                    </div>                          
                                                </div>
                                                <div class="back">  
                                                    <div class="post__block">
                                                        <div class="post__content--block-text">
                                                            <div class="post__content--user-info">
                                                                <img src="${dataContent[myObj].memImg}" alt="user image" class="post__content-user-img">
                                                                <span class="post__content--username">${dataContent[myObj].memName}</span> 
                                                            </div>
                                                            
                                                            <h3 class="post__content--title">${dataContent[myObj].postTitle }</h3>  
                                                            <div class='post__content--info'>
                                                                <span class="view-count">觀看：${dataContent[myObj].readCount}</span>
                                                                <span class="reply-count">回應：${dataContent[myObj].msgCount}</span>
                                                                <span class="save-count">收藏：${dataContent[myObj].saveCount}</span>
                                                            </div>                  
                                                        </div>
                                                        <div class="post__content--block-img">
                                                            <img src="img/${dataContent[myObj].imgURL}" alt='img post' class="post-img">
                                                        </div>
                                                    </div>                    
                                                </div>
                                                <div class='top'>
                                                </div>
                                                <div class='bottom'>
                                                </div>
                                            </div>
                            </div>  `;
                            }
                            $('.post__content').html(output);
                        },
                        complete: function() {
                            
                            openModal();//開視窗
                            closeModal();//關視窗
                            openEditor();//開啟發文
                            closeEditor();//關閉發文
                            // openPost();//撈內文
                            openPostAffter();
                        }
                    });

                });    
            
            
            

            //選排序            
            var postOrder = $('.post__order--cat');
            
                $('.post__order--cat').click(
                    (e)=>{

                
                    //抓當下點擊的order值            
                    currentPostOrder = e.target.getAttribute('order');
                    

                    //依照人氣排序
                    if(currentPostOrder == 'fp.readCount'){
                        let arrSorted = dataContent.sort(function (a, b) {
                            return b.readCount - a.readCount;
                        });

                        let postContent = document.querySelector('.post__content');
                        postContent.innerHTML = '';
                        for(let i=0,len=arrSorted.length;i<len;i++){
                            postContent.innerHTML +=`
                                <div class="box-rotate-wrap" postNo="${arrSorted[i].postNo}">
                                    <div class="box box-rotate box-rotate-back">
                                        <div class="front">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${arrSorted[i].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${arrSorted[i].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${arrSorted[i].postTitle }</h3>  
                                                    <div class="post__content--info">
                                                        <span class="view-count">觀看：${arrSorted[i].readCount}</span>
                                                        <span class="reply-count">回應：${arrSorted[i].msgCount}</span>
                                                        <span class="save-count">收藏：${arrSorted[i].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${arrSorted[i].imgURL}" alt="img post" class="post-img">
                                                </div>
                                            </div>                          
                                        </div>
                                        <div class="back">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${arrSorted[i].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${arrSorted[i].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${arrSorted[i].postTitle }</h3>  
                                                    <div class='post__content--info'>
                                                        <span class="view-count">觀看：${arrSorted[i].readCount}</span>
                                                        <span class="reply-count">回應：${arrSorted[i].msgCount}</span>
                                                        <span class="save-count">收藏：${arrSorted[i].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${arrSorted[i].imgURL}" alt='img post' class="post-img">
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class='top'>
                                        </div>
                                        <div class='bottom'>
                                        </div>
                                    </div>
                                </div>`;   
                        }
                        openPostAffter();//打開排序後的文章

                    }
                    //依照最新排序
                    if(currentPostOrder == 'fp.postTime'){
                        let arrSorted = dataContent.sort(function (a, b) {
                            return b.postNo - a.postNo;

                        });

                        let postContent = document.querySelector('.post__content');
                        postContent.innerHTML = '';
                        for(let i=0,len=arrSorted.length;i<len;i++){
                            postContent.innerHTML +=`
                                <div class="box-rotate-wrap" postNo="${arrSorted[i].postNo}">
                                    <div class="box box-rotate box-rotate-back">
                                        <div class="front">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${arrSorted[i].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${arrSorted[i].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${arrSorted[i].postTitle }</h3>  
                                                    <div class="post__content--info">
                                                        <span class="view-count">觀看：${arrSorted[i].readCount}</span>
                                                        <span class="reply-count">回應：${arrSorted[i].msgCount}</span>
                                                        <span class="save-count">收藏：${arrSorted[i].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${arrSorted[i].imgURL}" alt="img post" class="post-img">
                                                </div>
                                            </div>                          
                                        </div>
                                        <div class="back">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${arrSorted[i].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${arrSorted[i].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${arrSorted[i].postTitle }</h3>  
                                                    <div class='post__content--info'>
                                                        <span class="view-count">觀看：${arrSorted[i].readCount}</span>
                                                        <span class="reply-count">回應：${arrSorted[i].msgCount}</span>
                                                        <span class="save-count">收藏：${arrSorted[i].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${arrSorted[i].imgURL}" alt='img post' class="post-img">
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class='top'>
                                        </div>
                                        <div class='bottom'>
                                        </div>
                                    </div>
                                </div>`;
                        }
                        openPostAffter();
                    }
                    //依照收藏排序
                    if(currentPostOrder == 'fp.saveCount'){
                        let arrSorted = dataContent.sort(function (a, b) {
                            return b.saveCount - a.saveCount;
                        });

                        let postContent = document.querySelector('.post__content');
                        postContent.innerHTML = '';
                        for(let i=0,len=arrSorted.length;i<len;i++){
                            postContent.innerHTML +=`
                                <div class="box-rotate-wrap" postNo="${arrSorted[i].postNo}">
                                    <div class="box box-rotate box-rotate-back">
                                        <div class="front">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${arrSorted[i].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${arrSorted[i].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${arrSorted[i].postTitle }</h3>  
                                                    <div class="post__content--info">
                                                        <span class="view-count">觀看：${arrSorted[i].readCount}</span>
                                                        <span class="reply-count">回應：${arrSorted[i].msgCount}</span>
                                                        <span class="save-count">收藏：${arrSorted[i].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${arrSorted[i].imgURL}" alt="img post" class="post-img">
                                                </div>
                                            </div>                          
                                        </div>
                                        <div class="back">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${arrSorted[i].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${arrSorted[i].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${arrSorted[i].postTitle }</h3>  
                                                    <div class='post__content--info'>
                                                        <span class="view-count">觀看：${arrSorted[i].readCount}</span>
                                                        <span class="reply-count">回應：${arrSorted[i].msgCount}</span>
                                                        <span class="save-count">收藏：${arrSorted[i].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${arrSorted[i].imgURL}" alt='img post' class="post-img">
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class='top'>
                                        </div>
                                        <div class='bottom'>
                                        </div>
                                    </div>
                                </div>`;
                        }
                        openPostAffter();
                    }
                    //依照留言排序
                    if(currentPostOrder == 'fp.msgCount'){
                        let arrSorted = dataContent.sort(function (a, b) {
                            return b.msgCount - a.msgCount;
                        });

                        let postContent = document.querySelector('.post__content');
                        postContent.innerHTML = '';
                        for(let i=0,len=arrSorted.length;i<len;i++){
                            postContent.innerHTML +=`
                                <div class="box-rotate-wrap" postNo="${arrSorted[i].postNo}">
                                    <div class="box box-rotate box-rotate-back">
                                        <div class="front">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${arrSorted[i].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${arrSorted[i].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${arrSorted[i].postTitle }</h3>  
                                                    <div class="post__content--info">
                                                        <span class="view-count">觀看：${arrSorted[i].readCount}</span>
                                                        <span class="reply-count">回應：${arrSorted[i].msgCount}</span>
                                                        <span class="save-count">收藏：${arrSorted[i].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${arrSorted[i].imgURL}" alt="img post" class="post-img">
                                                </div>
                                            </div>                          
                                        </div>
                                        <div class="back">  
                                            <div class="post__block">
                                                <div class="post__content--block-text">
                                                    <div class="post__content--user-info">
                                                        <img src="${arrSorted[i].memImg}" alt="user image" class="post__content-user-img">
                                                        <span class="post__content--username">${arrSorted[i].memName}</span> 
                                                    </div>
                                                    
                                                    <h3 class="post__content--title">${arrSorted[i].postTitle }</h3>  
                                                    <div class='post__content--info'>
                                                        <span class="view-count">觀看：${arrSorted[i].readCount}</span>
                                                        <span class="reply-count">回應：${arrSorted[i].msgCount}</span>
                                                        <span class="save-count">收藏：${arrSorted[i].saveCount}</span>
                                                    </div>                  
                                                </div>
                                                <div class="post__content--block-img">
                                                    <img src="img/${arrSorted[i].imgURL}" alt='img post' class="post-img">
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class='top'>
                                        </div>
                                        <div class='bottom'>
                                        </div>
                                    </div>
                                </div>`;
                        }
                        openPostAffter();
                    }
                });    
                // }
            // }

            
        }  
        //-----註冊發文送出
        var save = document.getElementById('save');
        //發文驗證：是否都有填寫
        function validateForm() {
            var isValid = true;
            $('#form').each(function() {
                if ( $(this).val() === '' )
                    isValid = false;
            });
            return isValid;
            }
        

        save.addEventListener('click', () => {
            var sendTitle = $('#title').val();
            var sendPostCat = $('#postCat').val();
            var sendContent = $('#content').val();
            var imgURL = $('#imgURL').val();
            if(sendTitle == "") {
                alert("標題未填寫");
            }else if(sendPostCat == "") {
                alert("文章分類未選擇");
            }else if(sendContent == "") {
                alert("內文未填寫");
            }else {
                //關發文頁面
                if(editorArea.style.display = "block") {
                    editorArea.style.display = "none";
                }

                var xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    //複製文章欄
                    //
                    //放到文章區最上面
                    // alert("發文成功");           
                    //alert
                    $('#loginstate-wrap').show();
                    $('#state-pic-V').hide();  //要打勾就 V -> show  X -> hide
                    $('#state-pic-X').show();  //要打擦就 X -> show  V -> hide
                    $('#state-con-inner').html('發文成功');         
                }
                setTimeout(function(){ history.go(0); }, 100);
                var formData = new FormData(form);
                xhr.open('post', 'insertPost.php', true);
                xhr.send(formData);

            }
            
            
        }) 
    });
    </script>

</body>
</html>