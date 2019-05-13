
                // function sendGameForm(){
                //   document.getElementById("addstatus").submit();
                // }

                $(function() {
                  $("#gameStart").click(function() {
                    // alert('ok');
                    catchGame.Start();
                  });
                });
              
                $("#gameLogin").click(function(){
                        if(memberData.ourMemId){ //already login
                            
                            document.getElementById("addstatus").submit();
                        }else{
                                // let storage = sessionStorage;
                                // storage.setItem("currentFunc", "sendGameForm()");
                                document.getElementById("memlightBox-wrap").style.display = "block";
                                sendNowMember();
                        }
                    });

                    function sendNowMember(){
                        $('#loginBtn').click(function(){
                            if (memberData.ourMemId == undefined) {
                                
                            }else{
                                $("#gamestatus").attr("value",c);
                                document.getElementById("addstatus").submit();
                            }
                        })
                    }