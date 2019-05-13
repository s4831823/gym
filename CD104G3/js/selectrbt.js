  $(document).ready(function () {
            
            $('#checkbtn').click(function() {
                document.getElementById("sendstatus").submit();
            });
            $(".before").each(function(){
                $(this).css({"width": $(this).siblings("input").val() + "%"});
            });

            $('#logout-title').click(function(){
                backToGym();
            })
        });

        function backToGym(){
                    if(memberData == ''){
                    alert('找不到');
                    }else{
                        $('#loginstate-wrap').show();
                        $('#state-pic-X').show();
                        $('#state-pic-V').hide();
                        $('#state-con-inner').html('登出成功')
                        window.location.replace("gym.php");
                    }
                }