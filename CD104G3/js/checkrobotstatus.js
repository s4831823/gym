$(document).ready(function () {
              var addvitstatus =  $('#updatevit').siblings('input').val();
              console.log(addvitstatus);
              $('#updatevit').css("width",addvitstatus +"%");
              var addintstatus =  $('#updateint').siblings('input').val();
              $('#updateint').css("width",addintstatus +"%");
              var addagistatus =  $('#updateagi').siblings('input').val();
              $('#updateagi').css("width",addagistatus +"%");
              
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
        });