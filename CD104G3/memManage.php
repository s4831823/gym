<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/manage.css">
    <link rel="stylesheet" href="css/memManage.css">
    <link rel="stylesheet" href="css/login_public.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700,900" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                    <h1>會員管理</h1>
                </div>
                <?php  require_once('login_public.php') ?>
                
                <div class="manage-dashboard__filter">

                    <div class="filter__switch">
                        <div class="filter__switch-post memsearch" id="search-by-name">
                            <span>以會員帳號搜尋</span>
                        </div>
                        <div class="filter__switch-message memsearch" id="search-by-reptimes">
                            <span>以檢舉次數搜尋</span>
                        </div>
                        <div class="filter__switch-message search-input">
                            <input type="text" id="mem-serach-input">
                        </div>
                        <div class="filter__switch-message search-btn">
                            <button id="mem-search-btn" class="odBtn" style="    width: 100px;
    font-family: 'Noto Sans TC', sans-serif;
    font-weight: 300;
    font-size: 1.5rem;
    color: #fff;
    padding: 5px;
    margin: 0 5px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background: transparent;
    cursor: pointer;">搜尋</button>
                        </div>
                    </div>
                    <!-- <select name="postStatus" id="postStatus">
                        <option value="1"></option>
                        <option value="2">違規</option>
                        <option value="3">正常</option>
                    </select>                                       -->
                </div>
                <div class="manage-dashboard__cat">
                    <ul>
                        
                        <li>會員編號</li>
                        <li>會員帳號</li>
                        <li>會員姓名</li>
                        <li>會員狀態</li>
                        <li>被檢舉次數</li>
                        <li>詳情</li>
                        <li>修改狀態</li>
                    </ul>
                </div>
                <div class="manage-dashboard__info" id="memPanel">
                    <div class="manage-dashboard__info-item">
                        <ul>
                            <!-- <li><span class="m-memNo">1</span></li>
                            <li><span class="m-memId">a123123</span></li>
                            <li><span class="m-memName">王慢慢</span></li>
                            <li><div class="m-memState">正常</div> </li>
                            <li><div class="m-memRepTimes">0</div></li>
                            <li><span class="mem_detail">詳細資訊</span></li> -->
                            <!-- <li><button class="change-btn" id="m-edit-btn">修改</button></li> -->
                        </ul>
                    </div>
                    
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
                            <h3 class="margin-bottom-small">
                                會員:<span id="LB-memName"></span>的詳細資訊
                            </h3>
                            <p>
                                <table id="mem-table">
                                    <tr>
                                        <th>會員密碼</th>
                                        <th>信箱</th>
                                        <th>註冊日期</th>
                                        <th>大頭貼</th>
                                    </tr>
                                    <tr>
                                        <td id="td-memPsw"></td>
                                        <td id="td-memEmail"></td>
                                        <td id="td-memRegDate"></td>
                                        <td id="td-memImg"><img src="" id="memImg-in"></td>
                                    </tr>
                                </table>
                            </p>
                            
                        </div>
                </div>
            </div>
        </section>

        </div>

        <script>

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
            function getAllMem(){
                $.ajax({
                url: 'getAllMem.php',
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    // console.log(data);
                    for(let i=0;i<data.length;i++){
                        var memBox = document.createElement('div');
                        memBox.className='manage-dashboard__info-item';
                        memBox.setAttribute('id','memShowBox'+data[i].memNo);
                        document.getElementById('memPanel').appendChild(memBox);

                        var mrmUl = document.createElement('ul');
                        mrmUl.setAttribute('memNoul',data[i].memNo);
                        memBox.appendChild(mrmUl);

                        var NoLi = document.createElement('li');
                        mrmUl.appendChild(NoLi);
                        var NoSapn = document.createElement('span');
                        NoSapn.innerHTML = data[i].memNo;
                        NoLi.appendChild(NoSapn);

                        var IdLi = document.createElement('li');
                        mrmUl.appendChild(IdLi);
                        var IdSpan = document.createElement('span');
                        IdSpan.innerHTML = data[i].memId;
                        IdLi.appendChild(IdSpan);

                        var NameLi = document.createElement('li');
                        mrmUl.appendChild(NameLi);
                        var NameSpan = document.createElement('span');
                        NameSpan.innerHTML = data[i].memName;
                        NameLi.appendChild(NameSpan);

                        var StateLi = document.createElement('li');
                        StateLi.className='stateLiNo';
                        StateLi.setAttribute('stateLiNo',data[i].memNo)
                        mrmUl.appendChild(StateLi);
                        var StateSpan = document.createElement('select');
                        StateSpan.setAttribute('memStateNo',data[i].memNo);
                        StateSpan.setAttribute('id','memstateNoE'+data[i].memNo);
                        StateSpan.className ='memStateSpan';
                        var option0 = document.createElement('option');
                        option0.innerHTML='正常';
                        option0.setAttribute('value',0);
                        StateSpan.appendChild(option0);
                        var option1 = document.createElement('option');
                        option1.innerHTML='停權';
                        option1.setAttribute('value',1);
                        StateSpan.appendChild(option1);
                        if(data[i].memState == 0){ //memState = 0 正常
                            option0.setAttribute('selected','true');
                            option0.className='sel';
                        }else{//memState = 1 停權  
                            data[i].memState='停權';
                            option1.setAttribute('selected','true');
                            option0.className='sel';
                        }
                        StateLi.appendChild(StateSpan);

                        var RepTimesLi = document.createElement('li');
                        mrmUl.appendChild(RepTimesLi);
                        var RepTimesSpan = document.createElement('span');
                        RepTimesSpan.innerHTML = data[i].memRepTimes;
                        RepTimesLi.appendChild(RepTimesSpan);

                        var DetailLi = document.createElement('li');
                        mrmUl.appendChild(DetailLi);
                        var DetailLink = document.createElement('span');
                        DetailLink.setAttribute('memNo',data[i].memNo);
                        DetailLink.className = 'mem_detail';
                        DetailLink.innerHTML = '詳細資訊';
                        DetailLi.appendChild(DetailLink);

                        var ButtonLi = document.createElement('li');
                        mrmUl.appendChild(ButtonLi);
                        var ButtonEdit = document.createElement('button');
                        ButtonEdit.setAttribute('btnmemNo',data[i].memNo);
                        ButtonEdit.className = 'odBtn';
                        ButtonEdit.innerHTML = '修改';
                        ButtonLi.appendChild(ButtonEdit);

                        $('.mem_detail').click(function(){
                            $('#manage-page-content__poster-inner').show();

                            if($(this).attr('memNo') == data[i].memNo){
                                $('#LB-memName').html(data[i].memId);
                                $('#td-memPsw').html(data[i].memPsw);
                                $('#td-memEmail').html(data[i].memEmail);
                                $('#td-memRegDate').html(data[i].memRegDate.split(' ')[0]);
                                $('#memImg-in').attr('src',data[i].memImg);
                            }
                        })
                        $('.memStateSpan').addClass('selectbtn');

                    }//for
                    editMemState();
                },//success 的尾巴
                error: function () {
                    alert();
                },
                 });
            }//getAllMem的尾巴

        
            function editMemState(){
                $('.memStateSpan').change(function(){
                    var memstateNo = $(this).attr('memstateno'); //抓到改變的memNO
                    var optionsE =  $(this).val();
                    // console.log(memstateNo);
                    // console.log(optionsE);
                    $('.odBtn').click(function(){
                        if( memstateNo == $(this).attr('btnmemNo') ){
                            console.log('會員編號是:'+memstateNo);
                            console.log('會員狀態是:'+optionsE);
                                $.ajax({
                                    url: 'editMemState.php',
                                    type: 'POST',
                                    async: false,
                                    data:{
                                        'memNo' : memstateNo,
                                        'state' : optionsE,
                                    },
                                    dataType: 'text',
                                    success: function (data) {
                                        // console.log(data);
                                        if(optionsE == 0){
                                            optionsE ='正常';
                                        }else{
                                            optionsE ='停權';
                                        }
                                        alert('會員編號 : ' + memstateNo +' 的狀態已改為 : ' + optionsE);
                                    },
                                    error : function(){},
                                });
                        }else{
                            alert('請點選對應按鈕喔');
                        }

                    })
                })//.memStateSpan change
            }

            function searchBymemName(){
    
                    function searchBymemNameIn(){
                            var memIdS = $('#mem-serach-input').val();
                            // console.log(memIdS);
                            $.ajax({
                                url: 'searchBymemName.php',
                                type: 'POST',
                                data:{
                                    'memIdS' : memIdS,
                                },
                                dataType: 'text',
                                success: function (data) {
                                    console.log(data);
                                    if(data.indexOf('not') == -1){
                                        var memShowBox = document.getElementById('memShowBox'+data);
                                        console.log(memShowBox);
                                        $('.manage-dashboard__info-item').attr('style','display:none;');
                                        memShowBox.style.display='block';
                                    }else{
                                        alert('查無此帳號');
                                        $('.manage-dashboard__info-item').attr('style','display:block;');
                                    }
                                },
                                error: function(){
                                    // alert('??');
                                },
                            });//ajax
                    }//searchBymemNameIn

                $('#mem-search-btn').click(function(){
                    if($(this).attr('class') == 'btnforid'){
                        if(document.getElementById('mem-serach-input').value != ''){
                        searchBymemNameIn();
                        }else{
                             alert('還沒輸入會員帳號喔');
                        }
                    }else{

                    }
                    
                })

            }//searchBymemName

            function searchBymemRepTimes(){

                function searchBymemRepTimesIn(){                            
                            var repTimes = $('#mem-serach-input').val();
                            console.log(repTimes);
                            $.ajax({
                                url: 'searchBymemRepTimes.php',
                                type: 'POST',
                                data:{
                                    'repTimes' : repTimes,
                                },
                                dataType: 'json',
                                success: function (data) {
                                    console.log(data);
                                    if(data.indexOf('not') == -1){
                                        var repMemNo =[];
                                        $('.manage-dashboard__info-item').attr('style','display:none;');
                                        for(let i=0;i<data.length;i++){
                                            repMemNo[i] = data[i].memNo;
                                            // console.log(repMemNo[i]);
                                            $('#memShowBox' + repMemNo[i]).attr('style','display:block;');
                                        }
                                        
                                    }
                                },
                                error: function(){
                                    alert('檢舉次數沒有超過 '+ repTimes +' 次的會員名單');
                                    $('.manage-dashboard__info-item').attr('style','display:block;');
                                },
                            });//ajax
                }//searchBymemRepTimesIn

                $('#mem-search-btn').click(function(){
                    if($(this).attr('class') == 'btnforrep'){
                        if(document.getElementById('mem-serach-input').value != ''){
                            searchBymemRepTimesIn();
                        }else{
                             alert('還沒輸入檢舉次數喔');
                        }
                    }else{

                    }
                })

                    

            }//searchBymemRepTimes


            function doFirst() {
                closeModal();
                getAllMem();


                $(function(){
                    
                    $('.memsearch').click(function(){
                        $('.memsearch').removeClass('memcheck');
                        $(this).addClass('memcheck');
                        var searchOptions = $(this).attr('id');
                        if(searchOptions == 'search-by-name'){
                            searchBymemName(); 
                            $('#mem-serach-input').attr('placeholder','請輸入會員帳號');
                            $('#mem-search-btn').attr('class','btnforid');
                        }else{
                            searchBymemRepTimes();
                            $('#mem-serach-input').attr('placeholder','請輸入被檢舉次數');
                            $('#mem-search-btn').attr('class','btnforrep');
                        }
                    })

                    //預設會員帳號搜尋被點
                    $('#search-by-name').click();
                })

            }
            window.onload = doFirst;
        
        </script>
</body>
</html>