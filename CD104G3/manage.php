<?php
session_start();
try{
    require_once('connect_forum.php');

    //撈文章違規
    $sql1 = "SELECT *
            FROM forumPostRep fpr JOIN member m ON fpr.memNo = m.memNo
                                  JOIN forumPost fp ON fpr.postNo = fp.postNo
            WHERE repPostState NOT IN (3)";

    //撈留言違規
    $sql2 = "SELECT *
    FROM forumMsgRep fmr JOIN member m ON fmr.memNo = m.memNo
                         JOIN forumMsg fm ON fmr.msgNo = fm.msgNo
                         WHERE repMsgState NOT IN (3)";

    $repPosts = $pdo->query($sql1);
    $postRows =$repPosts->fetchAll();

    $repMsgs = $pdo->query($sql2); 
    $msgRows = $repMsgs->fetchAll();
    
    
    
    

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
    <link rel="stylesheet" href="css/manageForum.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">  
    <title>管理頁面</title>
</head>
<body>
    <div class="manage">

        <div class="manage-bar">            
            <ul>
                <li class="manage-bar__header"><img src="img/logo.png" alt="logo image"></li>
                <li><a href="#">客製化管理</a></li>
                <li><a href="#">商城商品管理</a></li>
                <li><a href="#">客製化訂單管理</a></li>
                <li><a href="#">商城訂單管理</a></li>
                <li><a href="#">會員管理</a></li>
                <li><a href="#">討論區管理</a></li>
                <li><a href="#">後台管理員管理</a></li>
                <li><a href="#">服務據點管理</a></li>
            </ul>
        </div>
            

        <section class="manage-page-content">
            <div class="manage-page-content__manage-dashboard">
                <div class="manage-dashboard__title">
                    <h1>討論區管理</h1>
                </div>
                <div class="manage-dashboard__filter">

                    <div class="filter__switch">
                        <div class="filter__switch-post">
                            <span>文章管理</span>
                        </div>
                        <div class="filter__switch-message">
                            <span>留言管理</span>
                        </div>
                    </div>

                    <select name="postStatus" id="postStatus">
                        <option value="1">待審查</option>
                        <option value="2">違規</option>
                    </select>                                      
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
                <?php foreach($postRows as $postRow)  {?>
                    <div class="manage-dashboard__info-item">
                        <ul>
                            <li><span><?php echo $postRow['postTitle']; ?></span> </li>
                            <li><span><?php echo $postRow['repPostState']; ?></span></li>
                            <li><span><?php echo $postRow['repPostCause']; ?></span></li>
                            <li><div><?php echo $postRow['repPostTime']; ?></div> </li>
                            <li><div><?php echo $postRow['memId']; ?></div></li>
                        </ul>
                    </div>   
                <?php }?>                     
                </div>
                
                
            </div>

            
        </section>

        

        <section class="manage-page-content__poster-inner" id="manage-page-content__poster-inner">
            <div class="poster-inner__madal">
                <div class="poster-inner__madal-close">
                    <div class="poster-inner__madal-close-icon" id="poster-inner__madal-close-icon">+</div>
                </div>

                <div class="poster-inner__madal-content">
                        <div class="madal-content-box">
                            <h3 class="margin-bottom-small">Lorem ipsum dolor sit</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi pariatur doloribus, asperiores eum deserunt alias quod optio, ullam neque tenetur recusandae, consequatur quam? Laborum ab minima modi et?</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi pariatur doloribus, asperiores eum deserunt alias quod optio, ullam neque tenetur recusandae, consequatur quam? Laborum ab minima modi et?</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi pariatur doloribus, asperiores dolor sit amet consectetur adipisicing elit. Modi pariatur doloribus, aspereum deserunt alias quod optio, ullam neque tenetur recusandae, consequatur quam? Laborum ab minima modi et?</p>
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

            function repMsg(e) {
                e.preventDefault();
                var that = $(this);
                that.off('click');
                $.ajax({
                    url: 'reportMsg.php',
                    type: 'POST',
                    data: {}.always(()=>{
                        that.on('click', repMsg);
                    }),
                    success: (data)=> {

                    }
                });
            }
            $(document).ready(()=> {
                
                window.onload = ()=> {
                    
                    $.ajax({
                        url: 'forumPostRep.php',
                        type: 'POST',
                        data: {},
                        success: (data) => {
                            dataContent = JSON.parse(data);
                        },
                        complete: ()=> {
                            closeModal();
                            openModal();
                            
                        }   
                    });

                    $('filter__switch-message').on('click', repMsg);
                }
            });

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
            function openModal() {
                var post = document.querySelectorAll('.manage-dashboard__info-item');
                for(var i=0; i < post.length; i++) {
                    post[i].addEventListener('click', function() {
                        modal.style.display = "block";
                    });
                }
            }



         
        
        </script>
</body>
</html>