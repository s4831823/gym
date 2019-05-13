

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/manage.css">
    <link rel="stylesheet" href="css/login_public.css">
    <link rel="icon" href="img/img-header/title.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">  
    <title>管理頁面</title>
</head>
<body>
    <div class="manage">

        <div class="manage-bar">            
            <ul>
                <li class="manage-bar__header"><img src="img/logo.png" alt="logo image"></li>    
                <li><a href="mgr_login.php">後台管理員管理</a></li>    
                <li><a href="aboutmanage.php">服務據點管理</a></li> 
                <li><a href="manageForum.php">討論區管理</a></li>       
                <li><a href="manageProd.php">商城商品管理</a></li>
                <li><a href="rbtOrder.php">客製化訂單管理</a></li>
                <li><a href="manage-order.php">商城訂單管理</a></li>
                <li><a href="memManage.php">會員管理</a></li>
            </ul>
        </div>
            

        <section class="manage-page-content">
            <div class="manage-page-content__manage-dashboard">
                <div class="manage-dashboard__title">
                    <h1>討論區管理</h1>
                </div>
                <?php require_once('login_public.php')?>
                <div class="manage-dashboard__filter">

                    <div class="filter__switch">
                        <div class="filter__switch-post filter article_see active" repstate="seePost">
                            <span>待審查文章</span>
                        </div>
                        <div class="filter__switch-message filter message_see" repstate="seeMsg">
                            <span>待審查留言</span>
                        </div>  
                        <div class="filter__switch-post filter article_ban" repstate="banPost">
                            <span>違規文章</span>
                        </div>                                              
                        <div class="filter__switch-message filter message_ban" repstate="banMsg">
                            <span>違規留言</span>
                        </div>
                    </div>
                    
                                    
                </div>
                <div class="manage-dashboard__cat">
                    <ul>
                        <li>文章標題</li>
                        <li>檢舉狀態</li>
                        <li>檢舉理由</li>
                        <li>檢舉日期</li>
                        <li>被檢舉人</li>
                    </ul>
                </div>
                
                <div class="manage-dashboard__info">
                                   
                </div>
                
                
            </div>

            
        </section>

        

        <section class="manage-page-content__poster-inner" id="manage-page-content__poster-inner" postno="">
            <div class="poster-inner__madal">
                <div class="poster-inner__madal-close">
                    <div class="poster-inner__madal-close-icon" id="poster-inner__madal-close-icon">+</div>
                </div>

                <div class="poster-inner__madal-content">
                        <div class="madal-content-box">
                            <h3>針對該內篇內容您要？</h3>
                        </div>
                </div>

                <div class="poster-inner__madal-btn">
                    <div class="poster-inner__madal-btn-group">
                        <button class="ban">下架</button>
                        <button class="pass">保留</button>
                    </div>
                </div>
            </div>
        </section>

        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>

            
            
                    
                      
            
            function openModal() {
                var post = document.querySelectorAll('.manage-dashboard__info-item');
                for(var i=0; i < post.length; i++) {
                    post[i].addEventListener('click', function() {
                        modal.style.display = "block";
                    });
                }
            }
          
            
            //標示停留頁面-文章排序
            function closeModal() {
                var close = document.getElementById('poster-inner__madal-close-icon');
                 modal = document.getElementById('manage-page-content__poster-inner');
                close.addEventListener('click', function() {
                    // alert('hello');
                    if(modal.style.display = "block") {
                        modal.style.display = "none";
                    }
                });
            }
           

            
            $(document).ready(function() {
                //一開始網頁ready預設先撈違規文章
                filter_data = "";
                getPostState();
                $('.filter').click(function() {
                    $(this).addClass('active');
                    $('.filter').not(this).removeClass('active');
                    filter_data =  $(this).attr('repstate');
                    
                });
                $('.filter__switch-post').click(function() {
                    filter_data =  $(this).attr('repstate');
                    getPostState();
                }); 
                $('.filter__switch-message').click(function() {
                    filter_data =  $(this).attr('repstate');
                    getMsgState();
                });   

                $('.filter').click(function() {
                    if($(this).attr('repstate') == 'banMsg' || $(this).attr('repstate') == 'banPost') {
                        
                    }
                        
                })  

                
                



                

            });
            
            //撈文章-違規、待審查
            function getPostState() {
                $.ajax({
                    url: 'manageForumPost.php',
                    type: 'POST',
                    data: {filter: filter_data},
                    success: (data)=> {                        
                        dataContent = JSON.parse(data);
                        output = "";
                        var state = ['', '待審查', '違規', 'ˋ正常'];
                        for(var myObj in dataContent) { // 將object分row 取出  
                            output += `
                            <div class="manage-dashboard__info-item" id="">
                                <ul>
                                    <li><span>${dataContent[myObj].postTitle}</span> </li>
                                    <li><span>${state[dataContent[myObj].repPostState]}</span></li>
                                    <li><span>${dataContent[myObj].repPostCause}</span></li>
                                    <li><div>${dataContent[myObj].repPostTime}</div> </li>
                                    <li><div>${dataContent[myObj].memName}</div></li>
                                    <input type="hidden" value="${dataContent[myObj].postNo}" class="postno">
                                </ul>
                            </div>  
                            `;
                        }
                        $('.manage-dashboard__info').html(output);
                    },
                    complete: ()=> {
                        //開燈箱
                        var item = document.querySelectorAll('.manage-dashboard__info-item');
                        var modal = document.getElementById('manage-page-content__poster-inner');
                        for(var i=0; i<item.length; i++ ) {
                            item[i].addEventListener('click', function(e) {  
                                var postno = $(e.currentTarget).find('.postno').val();     
                                $('#manage-page-content__poster-inner').attr('postno', postno);                         
                                modal.style.display = "block";
                                closeModal();
                            })
                        }
                        //保留、送出按鈕
                        $('.ban').click((e) => {
                            var poststate = 2;
                            var postno =  $('#manage-page-content__poster-inner').attr("postno");
                            console.log(postno);
                            console.log('poststate', poststate);
                            $.ajax({
                                url: 'changePost.php',
                                type: 'post',
                                data: {postno: postno, poststate: poststate},
                                success: (data)=> {
                                },
                                complete: ()=> {
                                    modal.style.display = "none";
                                    location.reload();

                                }    
                            });
                        });    
                        $('.pass').click((e) => {
                            var poststate = 3;
                            var postno = $('#manage-page-content__poster-inner').attr("postno");
                            console.log(postno);
                            console.log('poststate', poststate);
                            $.ajax({
                                url: 'changePost.php',
                                type: 'post',
                                data: {postno: postno, poststate: poststate},
                                success: (data)=> {
                                },
                                complete: ()=> {
                                    modal.style.display = "none";
                                    location.reload();
                                }
                            });
                        }); 
                    }
                })          
            }
            //撈留言-違規、待審查
            function getMsgState() {
                $.ajax({
                    url: 'manageForumPost.php',
                    type: 'POST',
                    data: {filter: filter_data},
                    success: (data)=> {                        
                        dataContent = JSON.parse(data);
                        output = "";
                        var state = ['', '待審查', '違規', 'ˋ正常'];
                        for(var myObj in dataContent) { // 將object分row 取出  
                            output += `
                            <div class="manage-dashboard__info-item" id="">
                                <ul>
                                    <li><span>${dataContent[myObj].msgInner}</span> </li>
                                    <li><span>${state[dataContent[myObj].repMsgState]}</span></li>
                                    <li><span>${dataContent[myObj].repMsgCause}</span></li>
                                    <li><div>${dataContent[myObj].repMsgTime}</div> </li>
                                    <li><div>${dataContent[myObj].memName}</div></li>
                                    <input type="hidden" value="${dataContent[myObj].msgNo}" class="msgno">
                                </ul>
                            </div>  
                            `;
                        }
                        $('.manage-dashboard__info').html(output);
                    },
                    complete: ()=> {
                        var item = document.querySelectorAll('.manage-dashboard__info-item');
                        var modal = document.getElementById('manage-page-content__poster-inner');
                        for(var i=0; i<item.length; i++ ) {
                            item[i].addEventListener('click', function(e) {
                                msgno = $(e.currentTarget).find('.msgno').val();     
                                $('#manage-page-content__poster-inner').attr('msgno', msgno); 
                                modal.style.display = "block";
                                closeModal();
                            });
                        }
                        //保留、送出按鈕
                        $('.ban').click(() => {
                                    var poststate = 2;
                                    var msgno = $('#manage-page-content__poster-inner').attr("msgno");
                                    console.log('msgno', msgno);
                                    console.log('poststate', poststate);
                                    $.ajax({
                                        url: 'changeMsg.php',
                                        type: 'post',
                                        data: {msgno: msgno, poststate: poststate},
                                        success: (data)=> {
                                        },
                                        complete: ()=> {
                                            modal.style.display = "none";
                                            location.reload();

                                        }    
                                    });
                                });    
                        $('.pass').click(() => {
                            var poststate = 2;
                            var msgno = $('#manage-page-content__poster-inner').attr("msgno");
                            console.log('msgno', msgno);
                            console.log('poststate', poststate);
                            $.ajax({
                                url: 'changeMsg.php',
                                type: 'post',
                                data: {msgno: msgno, poststate: poststate},
                                success: (data)=> {
                                },
                                complete: ()=> {
                                    modal.style.display = "none";
                                    location.reload();
                                }
                            });
                        }); 
                       
                    }
                })
            }

            



         
        
        </script>
</body>
</html>