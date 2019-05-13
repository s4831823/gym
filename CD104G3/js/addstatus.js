 $(document).ready(function () {
            $('#logout-title').click(function(){
                backToGym();
            })
        function backToGym(){
                    if(memberData == ''){
                    alert('判斷成功');
                    }else{
                        $('#loginstate-wrap').show();
                        $('#state-pic-X').show();
                        $('#state-pic-V').hide();
                        $('#state-con-inner').html('登出成功')
                        window.location.replace("gym.php");
                    }
                }
                // $(".addstatus").mousedown(function(){
                //     $(this).css('background-color','#00ffff');
                //  }); 
                //  $(".addstatus").mouseup(function(){
                //     $(this).css('background-color','#f5f5f5');
                //  }); 
                //  $(".lowerstatus").mousedown(function(){
                //     $(this).css('background-color','#00ffff');
                //  }); 
                //  $(".lowerstatus").mouseup(function(){
                //     $(this).css('background-color','#f5f5f5');
                //  }); 
            $('#checkbtn').click(function() {
               $('#checkstatus').css('display','block'); 

            });
            $('#cancelstatus').click(function() {
               $('#checkstatus').css('display','none'); 
            });
            $("#submitstatus").click(function(){

                    document.getElementById("sendstatus").submit();
                  });
                  $(".addstatus").click(function() {
                    $(this).css('background-color','#00ffff');
                    $(this).css('box-shadow','none');
                      $('.customslides').addClass('shadow');
                      shadow = document.querySelectorAll(".shadow");
                      console.log(shadow);
                        shadow[0].addEventListener("animationend",function(){
                            console.log(shadow[0].classList);
                            $('.addstatus').css('background-color','#f5f5f5');
                            $('.addstatus').css('box-shadow','0px 2px 2px 0px #666464, inset 0px -2px 1px 1px #979797, inset 0px -1px 1px 1px #dfdfdf');
                            shadow[0].classList.remove("shadow");
                        });
                  });
                  $(".lowerstatus").click(function() {
                    $(this).css('background-color','#00ffff');
                    $(this).css('box-shadow','none');
                         setTimeout(
                            function() {
                            $(".lowerstatus").css("background-color", "#f5f5f5");
                            $(".lowerstatus").css("box-shadow","0px 2px 2px 0px #666464, inset 0px -2px 1px 1px #979797, inset 0px -1px 1px 1px #dfdfdf");
                        }, 500);
                  });
                  
                  
                  
              var beforewidthvit = parseInt($('#vit').siblings('input').val()) ;
              $('#vit').css("width",beforewidthvit + "%");
              $('#addvit').css("left",beforewidthvit + 25 +"%")
              var beforewidthint = parseInt($('#int').siblings('input').val());
              $('#addint').css("left",beforewidthint + 25 + "%")
              $('#int').css("width",beforewidthint + "%");
              var beforewidthagi =parseInt($('#agi').siblings('input').val());
              $('#agi').css("width",beforewidthagi + "%");
              $('#addagi').css("left",beforewidthagi + 25 + "%")
        });
        var initScore, usedScore=0; //initScore : play game
        //  shadow.addEventListener("animationend",function(){
        //     shadow.remove("shadow");
        //  });
         
        window.addEventListener("load",function(){
        // shadow = document.querySelectorAll(".shadow");
        //  console.log(shadow);
         var addObjs = document.querySelectorAll(".addstatus");
            var lowerObjs = document.querySelectorAll(".lowerstatus");
            var statusbar = document.querySelectorAll(".statusbar");
            var afterObjs = document.querySelectorAll(".after");
             var gameScoreObj = document.getElementById("gamescore");
            var dbScore = document.getElementsByName("dbScore");
            var max = document.querySelectorAll(".max");
            initScore = parseInt(gameScoreObj.value);
            statusbar.width = parseInt(statusbar.innerText);
            document.getElementById("addgamescore").innerText=gameScoreObj.value;
            // if(document.getElementById("gamescore")==""){
            //     gameScoreObj=0;
            // }
            //    var beforewidth = 50;
           
            //  alert(dbScore);
            //  for (let i = 0; i < dbScore.length; i++) {
            //      parseInt(dbScore[i]) = document.querySelectorAll(".before").style.beforewidth+"%";
            //       console.log(dbScore);
            //  }
           
            for( let i=0; i<addObjs.length; i++){
                statusbar[i].width= 100;
                //afterObjs[i].width = 0;
                afterObjs[i].width = 0;
                if(parseInt(dbScore[i].value) == 100){
                            max[i].style.display = "inline-block";
                        }
                    addObjs[i].onclick=function(e){
                         if ( gameScoreObj.value == 0 ) {
                            $('#loginstate-wrap').show();
                            $('#state-pic-X').show();
                            $('#state-pic-V').hide();
                            $('#state-con-inner').html('沒有可加點數')
                            return;
                        } 
                        // if ( initScore < usedScore ) {
                        //     alert("");
                        //     gameScoreObj.innerText = 0;
                        //     return;
                        // }                         
                        let after = afterObjs[i];
                        if( afterObjs[i].width + parseInt(dbScore[i].value) == statusbar[i].width){
                            $('#loginstate-wrap').show();
                            $('#state-pic-X').show();
                            $('#state-pic-V').hide();
                            $('#state-con-inner').html('超過能力值上限')
                            max[i].style.display = "inline-block";
                            return;                            
                        } 
                        
                        
                     
                        usedScore++;
                        afterObjs[i].width += 1;
                        after.style.width= afterObjs[i].width+"%";
                        gameScoreObj.value -= 1;
                        document.getElementById("addgamescore").innerText=document.getElementById("gamescore").value;
                        // if ( gameScoreObj.innerText == -1 ) {
                        //     afterObjs[i].width -= 1;
                        //     console.log(afterObjs[i].width)
                        //     e.target.previousElementSib0ling.style.width= afterObjs[i].width+"%";
                        //     alert("沒有可加點數");
                        //     gameScoreObj.innerText = 0;
                        // }
                      
                        document.getElementById('addvitstatus').value = afterObjs[0].width + parseInt(dbScore[0].value);
                    
                        document.getElementById('addintstatus').value = afterObjs[1].width + parseInt(dbScore[1].value);
               
                        document.getElementById('addagistatus').value = afterObjs[2].width + parseInt(dbScore[2].value);
                        document.getElementById('addrbtAbility').value =afterObjs[0].width +parseInt(dbScore[0].value)+afterObjs[1].width + parseInt(dbScore[1].value)+afterObjs[2].width + parseInt(dbScore[2].value);
                    }
                    
                    lowerObjs[i].onclick=function(e){
                        // if (afterObjs[i].width == 1) {
                            if(afterObjs[i].width == 0){
                                $('#loginstate-wrap').show();
                                $('#state-pic-X').show();
                                $('#state-pic-V').hide();
                                $('#state-con-inner').html('已是初始能力')
                                return; 
                            }

                            usedScore--;
                            afterObjs[i].width -= 1;
                            console.log("- ",afterObjs[i].width+"%")
                            console.log(afterObjs[i].className)
                            afterObjs[i].style.width= afterObjs[i].width+"%";
                            
                            gameScoreObj.value =  parseInt(gameScoreObj.value)+1;
                            console.log(gameScoreObj.value);
                            document.getElementById("addgamescore").innerText=document.getElementById("gamescore").value;
                            max[i].style.display= "none";                   
                            if (initScore < gameScoreObj.value) {
                                gameScoreObj.value = parseInt(gameScoreObj.value)-1;
                                afterObjs[i].width += 1;
                                $('#loginstate-wrap').show();
                                $('#state-pic-X').show();
                                $('#state-pic-V').hide();
                                $('#state-con-inner').html('沒有加任何點數')
                            }
                           
         
                    }
                   
                      
            };
        });
