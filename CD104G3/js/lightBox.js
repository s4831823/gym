
// 我是放session帶回來的資料的!!!!!! //
var memberData = {};
// 我是放session帶回來的資料的!!!!!! //


//==========控制燈箱的jQuery==========//
$(function () {

   $('#robot-head').css({
      transform: 'rotate(15deg)',
      transition: '.8s',
   })

   $('#login-tab').hover(function () {
      $('#robot-head').css({
         transform: 'rotate(15deg)',
         transition: '.8s',
      })
      // $(this).css({
      //    'backgroundColor': 'rgb(127, 211, 224)',
      //    'color': '#fff',
      // })
      // $('#register-tab').css({
      //    'backgroundColor': '#fff',
      //    'color': '#000',
      // })
   })

   $('#register-tab').hover(function () {
      $('#robot-head').css({
         transform: 'rotate(-15deg)',
         transition: '.8s',
      })
      // $(this).css({
      //    'backgroundColor': 'rgb(127, 211, 224)',
      //    'color': '#fff',
      // })
      // $('#login-tab').css({
      //    'backgroundColor': '#fff',
      //    'color': '#000',
      // })
   })

   $('#login-tab').click(function () { //按登入
      $('#robot-head').css({
         transform: 'rotate(15deg)',
         transition: '.8s',
      })
      $(this).css({
         'backgroundColor': 'rgb(127, 211, 224)',
         'color': '#fff',
      })
      $('#register-tab').css({
         'backgroundColor': '#fff',
         'color': '#000',
      })
     
      $('#login-content').show();
      $('#register-option').hide();
      $('#forgetPsw-option').hide();
   })

   $('#register-tab').click(function () { //按註冊
      $('#robot-head').css({
         transform: 'rotate(-15deg)',
         transition: '.8s',
      })
      $(this).css({
         'backgroundColor': 'rgb(127, 211, 224)',
         'color': '#fff',
      })
      $('#login-tab').css({
         'backgroundColor': '#fff',
         'color': '#000',
      })
     
   
      $('#login-content').hide();
      $('#register-option').show();
      $('#forgetPsw-option').hide();
   })

   $('#forgetPsw-link').click(function () { //按忘記密碼
      $('#robot-head').css({
         transform: 'rotate(0deg)',
         transition: '.8s',
      })
      $('#login-tab').css({
         'backgroundColor': '#fff',
         'color': '#000',
      })
      $('#register-tab').css({
         'backgroundColor': '#fff',
         'color': '#000',
      })

      // $('#login-tab').mouseleave(function () {
      //    $(this).css({
      //       'backgroundColor': '#fff',
      //       'color': '#000',
      //    })
      //    $('#robot-head').css({
      //       transform: 'rotate(0deg)',
      //       transition: '.8s',
      //    })
      // })
      // $('#register-tab').mouseleave(function () {
      //    $(this).css({
      //       'backgroundColor': '#fff',
      //       'color': '#000',
      //    })
      //    $('#robot-head').css({
      //       transform: 'rotate(0deg)',
      //       transition: '.8s',
      //    })
      // })

      $('#login-content').hide();
      $('#register-option').hide();
      $('#forgetPsw-option').show();
   })

   //狀態燈箱的淡入淡出


})
//==========控制燈箱的jQuery==========//




//==========登入登出 + 註冊 + 忘記密碼的程式==========//


// ================================================= //
// 我是登入程式我是登入程式 //// 我是登入程式我是登入程式 //
// ================================================= //

function sendForm() {
   var xhr = new XMLHttpRequest();
   xhr.onload = function () {



      var loginMemName = xhr.responseText.split('|')[2];
      var loginMemState = xhr.responseText.split('|')[5];
      // console.log(loginMemName);


      if (xhr.responseText == "not found") {     //登入失敗
         // 登入燈箱收起
         document.getElementById('memlightBox-wrap').style.display = 'none';
         // 狀態燈箱出現
         $('#loginstate-wrap').show();
         $('#state-pic-V').hide();
         $('#state-pic-X').show();
         $('#state-con-inner').html('帳密有誤,再檢查一下吧');
         // 錯誤訊息2.2秒後收起
         setTimeout(function () {
            $('#loginstate-wrap').hide();
         }, 2200)
         //重新走流程
         cancelLogin();
         //出去
         return;
      } else if (xhr.responseText == "error") {  //系統有問題
         alert("系統錯誤");
      } else { //帳密登入成功
         memberData.ourMemNo = xhr.responseText.split('|')[0];
         memberData.ourMemId = xhr.responseText.split('|')[1];
         memberData.ourMemName = xhr.responseText.split('|')[2];
         memberData.ourMemEmail = xhr.responseText.split('|')[3];
         memberData.ourMemImg = xhr.responseText.split('|')[4];
         memberData.ourMemState = xhr.responseText.split('|')[5];
         // console.log(memberData.ourMemName);

         if (loginMemState == 1) { //帳密正確但是你被"停權" memState = 1
            document.getElementById('memlightBox-wrap').style.display = 'none';
            $('#loginstate-wrap').show();
            $('#state-pic-V').hide();
            $('#state-pic-X').show();
            $('#state-con-inner').html('抱歉 , 您已被停權<br>請聯絡TEL : +886-2-2222-2222');
            $('#logout-title').hide();
            $('#login-title').show();
            $('#login-icon').attr('src', 'img/img-header/member-01.png');
            $('#login-title').click(function () {
               cancelLogin();
               document.getElementById('memlightBox-wrap').style.display = 'block';
               // sendForm();

               // $('#loginstate-wrap').show();
               // $('#state-pic-V').hide();
               // $('#state-pic-X').show();
               // $('#state-con-inner').html('抱歉 , 您已被停權<br>請聯絡TEL : +886-2-2222-2222');
            });

         } else {  //帳密正確且會員權限"正常" memState = 1
            showLoginForm();
            $('#logout-title').show();
            $('#login-title').hide();
            memCenterLink.innerHTML = loginMemName + ',您好';
            // icon變成機器人在笑
            $('#login-icon').attr('src', 'img/img-header/member-02.png');
            // 燈箱清空還原
            cancelLogin();
            // 狀態燈箱出現
            $('#loginstate-wrap').show();
            $('#state-pic-X').hide();
            $('#state-pic-V').show();
            $('#state-con-inner').html('主人  ' + loginMemName + '  您好 ~' + '<br>' + '歡迎回來唷');
            // 狀態燈箱2.2秒後消失
            setTimeout(function () {
               $('#loginstate-wrap').hide();
            }, 2200);
         }//else(會員權限"正常" memState = 1)的尾巴
      }//else(帳密登入成功)的尾巴
   }// xhr.onload

   var url = "js/login.php";
   xhr.open("post", url, false);
   xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
   var member = {};
   member.memId = loginMemId.value;
   member.memPsw = loginMemPsw.value;

   var data_info = "jsonStr=" + JSON.stringify(member);
   xhr.send(data_info);

}//sendForm的尾巴


// 檢查你是登入狀態嗎?
function showLoginForm() {
   $.ajax({
      url: 'js/checkLoginOrNot.php',
      type: 'POST',
      async: false,
      data: '',
      dataType: 'text',
      success: function (data) {
         // console.log(data);

         if (data == 'nosession') {  //找不到資料 = "沒登入"
            //面板顯示 登入
            $('#login-title').show();
            $('#logout-title').hide();
            $('#memCenter-link').html('');
            $('#login-title').click(function () {
               $('#memlightBox-wrap').show();
            })

         } else {    //找到資料的話代表 "有登入"  有登入 1.有登入但是是被停權的 2.有登入且是正確的
            memberData.ourMemNo = data.split('|')[0];
            memberData.ourMemId = data.split('|')[1];
            memberData.ourMemName = data.split('|')[2];
            memberData.ourMemEmail = data.split('|')[3];
            memberData.ourMemImg = data.split('|')[4];
            memberData.ourMemState = data.split('|')[5];


            if (memberData.ourMemState == 1) { //1.有登入但是是被停權的 ourMemState = 1
               document.getElementById('memlightBox-wrap').style.display = 'none';
               $('#loginstate-wrap').show();
               $('#state-pic-V').hide();
               $('#state-pic-X').show();
               $('#state-con-inner').html('抱歉 , 您已被停權<br>請聯絡TEL : +886-2-2222-2222');
               $('#logout-title').hide();
               $('#login-title').show();
               $('#login-icon').attr('src', 'img/img-header/member-02.png');
               $('#login-title').click(function () {
                  cancelLogin();
                  document.getElementById('memlightBox-wrap').style.display = 'block';
                  // $('#loginstate-wrap').show();
                  // $('#state-pic-V').hide();
                  // $('#state-pic-X').show();
                  // $('#state-con-inner').html('抱歉 , 您已被停權<br>請聯絡TEL : +886-2-2222-2222');
               });
            } else { //2.有登入且是正確的  ourMemState = 0
               //面板顯示 XXX,您好  登出 
               //按登出 清除session
               $('#logout-title').show();
               $('#login-title').hide();
               $('#memCenter-link').html(memberData.ourMemName + ',您好');
               // $('#memCenter-link').html(',您好');
               $('#login-icon').attr('src', 'img/img-header/member-02.png');
            }//else (2.有登入且是正確的) 的尾巴            
         }//else (找到資料的話代表 "有登入") 的尾巴
      },//success 的尾巴
      error: function () {
         alert();
      },
   });
}//showLoginForm的尾巴


// 按登入燈箱叉叉 收掉燈箱
function cancelLogin() {
   //將登入表單上的資料清空
   //燈箱隱藏
   //頭轉回去登入那邊
   //註冊表單的提示字 + icon收起
   memlightBox.style.display = 'none';
   var allInputs = document.getElementsByClassName('lightBox-input-in');
   for (var i = 0; i < allInputs.length; i++) {
      allInputs[i].value = '';
   }
   $('#robot-head').css({
      transform: 'rotate(15deg)',
      transition: '.8s',
   })
   $('#login-tab').css({
      'backgroundColor': 'rgb(127, 211, 224)',
      'color': '#fff',
   })
   $('#register-tab').css({
      'backgroundColor': '#fff',
      'color': '#000',
   })
   $('#login-content').show();
   $('#register-option').hide();
   $('#forgetPsw-option').hide();
   for (var j = 0; j < checkImg.length; j++) {
      checkImg[j].style.display = 'none';
   }
   for (var k = 0; k < errorTip.length; k++) {
      errorTip[k].style.display = 'none';
   }
}//cancelLogin的尾巴


// 按登出
function logoutWeb() {
   var xhr = new XMLHttpRequest();
   xhr.onload = function () {
      memberData = {};
      // 名字變空
      headerMemName.innerHTML = ' ';
      // 登入出現 登出收走 icon不笑
      $('#login-title').show();
      $('#logout-title').hide();
      $('#login-icon').attr('src', 'img/img-header/member-01.png');
      showLoginForm();
   }
   var url = "js/logout.php";
   xhr.open("post", url, true);
   xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
   xhr.send("");
}//logoutWeb的尾巴
// ================================================= //
//                  我是登入程式的尾巴                 //
// ================================================= //


// ================================================= //
// 我是註冊程式我是註冊程式 //// 我是註冊程式我是註冊程式 //
// ================================================= //

// *****驗證囉!!!!!!!!!*****
// 驗證你輸入的東西裡有沒有奇怪的空格or符號
var memCheckReg = new RegExp(
   /[(\ )(\~)(\!)(\@)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\.)(\/) (\<)(\>)(\?)(\)]+/
);
var emailCheckReg = new RegExp(
   /[(\ )(\~)(\!)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\/) (\<)(\>)(\?)(\)]+/
);



// 驗證    "帳號""帳號""帳號""帳號""帳號""帳號"
function checkRegId() {
   var vLen = registerMemId.value.length;
   var temp = memCheckReg.test(registerMemId.value);

   for (let i = 0; i < vLen; i++) {
      if (temp == false) { //表示沒奇怪符號or空白 -> 進入長度驗證

         if (vLen < 3 | vLen > 12) { //小於3碼或大於12碼
            errorTip[0].style.display = 'block';
            checkImg[0].style.display = 'block';
            checkImg[0].firstChild.setAttribute('src', 'img/img-header/X.png');
            if (vLen < 3) {
               errorMsg[0].innerHTML = '最少3個字元唷';
            } else {
               errorMsg[0].innerHTML = '最多12個字元唷';
            }
         } else { //在4-11碼內 =  OK
            errorTip[0].style.display = 'none';
            checkImg[0].style.display = 'block';
            checkImg[0].firstChild.setAttribute('src', 'img/img-header/V.png');
            $(this).siblings('.lightBox-check').removeClass('unCheck');
         }
      } else {
         errorTip[0].style.display = 'block';
         errorMsg[0].innerHTML = '不可有特殊符號或空白喔';
         checkImg[0].style.display = 'block';
         checkImg[0].firstChild.setAttribute('src', 'img/img-header/X.png');
      }//temp = true or false
   }//for的尾巴
}//checkRegId的尾巴


// 驗證    "密碼""密碼""密碼""密碼""密碼""密碼"
function checkRegPsw() {
   var vLen = registerMemPsw.value.length;
   var temp = memCheckReg.test(registerMemPsw.value);

   for (let i = 0; i < vLen; i++) {
      if (temp == false) {
         if (vLen < 3 | vLen > 12) { //小於3碼或大於12碼
            errorTip[1].style.display = 'block';
            checkImg[1].style.display = 'block';
            checkImg[1].firstChild.setAttribute('src', 'img/img-header/X.png');
            if (vLen < 3) {
               errorMsg[1].innerHTML = '最少3個字元唷';
            } else {
               errorMsg[1].innerHTML = '最多12個字元唷';
            }
         } else { //在4-11碼內 = OK
            errorTip[1].style.display = 'none';
            checkImg[1].style.display = 'block';
            checkImg[1].firstChild.setAttribute('src', 'img/img-header/V.png');
            $(this).siblings('.lightBox-check').removeClass('unCheck');
         }
      } else {
         errorTip[1].style.display = 'block';
         errorMsg[1].innerHTML = '不可有特殊符號或空白喔';
         checkImg[1].style.display = 'block';
         checkImg[1].firstChild.setAttribute('src', 'img/img-header/X.png');
      }//temp = true or false
   }//for的尾巴
}//checkRegPsw的尾巴

// 驗證    "姓名""姓名""姓名""姓名""姓名""姓名"
function checkRegName() {
   var vLen = registerMemName.value.length;
   var temp = memCheckReg.test(registerMemName.value);
   for (let i = 0; i < vLen; i++) {
      if (temp == false) {
         if (vLen > 5) {
            errorTip[2].style.display = 'block';
            errorMsg[2].innerHTML = '最多5個字元唷';
            checkImg[2].style.display = 'block';
            checkImg[2].firstChild.setAttribute('src', 'img/img-header/X.png');
         } else if (vLen = 0) {
            errorTip[2].style.display = 'block';
            errorMsg[2].innerHTML = '最少1個字元唷';
            checkImg[2].style.display = 'block';
            checkImg[2].firstChild.setAttribute('src', 'img/img-header/X.png');
         } else {
            errorTip[2].style.display = 'none';
            checkImg[2].style.display = 'block';
            checkImg[2].firstChild.setAttribute('src', 'img/img-header/V.png');
            $(this).siblings('.lightBox-check').removeClass('unCheck');
         }
      } else {
         errorTip[2].style.display = 'block';
         errorMsg[2].innerHTML = '不可有特殊符號或空白喔';
         checkImg[2].style.display = 'block';
         checkImg[2].firstChild.setAttribute('src', 'img/img-header/X.png');
      }//temp = true or false
   }//for的尾巴
}//checkRegName的尾巴

// 驗證    "信箱""信箱""信箱""信箱""信箱""信箱"
function checkRegEmail() {
   var emailIn = registerMemEmail.value;
   var vLen = emailIn.length;
   var temp = emailCheckReg.test(emailIn);
   for (var i = 0; i < vLen; i++) {
      if (temp == false) {
         if (emailIn.indexOf("@") < 1 || emailIn.indexOf(".com") < 1) {
            errorTip[3].style.display = 'block';
            checkImg[3].style.display = 'block';
            checkImg[3].firstChild.setAttribute('src', 'img/img-header/X.png');
         } else {
            errorTip[3].style.display = 'none';
            checkImg[3].style.display = 'block';
            checkImg[3].firstChild.setAttribute('src', 'img/img-header/V.png');
            $(this).siblings('.lightBox-check').removeClass('unCheck');
         }
      } else {
         errorTip[3].style.display = 'block';
         errorMsg[3].innerHTML = '不可有特殊符號或空白喔';
         checkImg[3].style.display = 'block';
         checkImg[3].firstChild.setAttribute('src', 'img/img-header/X.png');
      }//temp = true or false
   }//for的尾巴
}//checkRegEmail的尾巴


// 送註冊資料去給資料庫~
function sendToRegister() {
   if ($('.lightBox-check').hasClass('unCheck') == true) {  //有unCheck這個class = 還沒驗證好 提醒他
      $('#loginstate-wrap').show();
      $('#state-pic-V').hide();
      $('#state-pic-X').show();
      $('#state-con-inner').html('您的資料還沒有填寫完整唷');

   } else {  //沒有unCheck這個class = OK囉送給php

      //用ajax送去給php

      var xhr = new XMLHttpRequest();
      xhr.onload = function () {
         if (xhr.status == 200) {//送資料去成功 -> 1.成功註冊 2.註冊失敗因為帳號有人用過了

            if (xhr.responseText.indexOf('error') > -1) {
               //註冊失敗因為有人用過//

               $('#loginstate-wrap').show();
               $('#state-pic-V').hide();
               $('#state-pic-X').show();
               $('#state-con-inner').html('帳號已經存在了耶～<br>再想新的吧');

               var checkImg = document.getElementsByClassName('lightBox-check')[0];
               checkImg.firstChild.setAttribute('src', 'img/img-header/X.png');
               setTimeout(function () {
                  $('#loginstate-wrap').hide();
               }, 2200);

            } else {
               //註冊成功//
               // console.log(xhr.responseText);
               memberData.ourMemNo = xhr.responseText.split('|')[0];
               memberData.ourMemId = xhr.responseText.split('|')[1];
               memberData.ourMemName = xhr.responseText.split('|')[2];
               memberData.ourMemEmail = xhr.responseText.split('|')[3];
               memberData.ourMemImg = xhr.responseText.split('|')[4];
               memberData.ourMemState = xhr.responseText.split('|')[5];
               $('#logout-title').show();
               $('#login-title').hide();
               memCenterLink.innerHTML = memberData.ourMemName + ',您好';
               // icon變成機器人在笑
               $('#login-icon').attr('src', 'img/img-header/member-02.png');
               // 燈箱東西清空還原
               cancelLogin();
               // 狀態燈箱出現
               $('#loginstate-wrap').show();
               $('#state-pic-V').show();
               $('#state-pic-X').hide();
               $('#state-con-inner').html('您好唷 , ' + memberData.ourMemName + '<br>歡迎加入達文西');
               // 狀態燈箱2.2秒後消失
               setTimeout(function () {
                  $('#loginstate-wrap').hide();
               }, 2200);

            }

         } else {
            alert(xhr.status);//送資料去失敗 因為系統壞
         }
      }
      xhr.open("post", "js/register.php", false); //設定好所要連結的程式
      xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
      var regObj = {};
      regObj.memId = registerMemId.value;
      regObj.memPsw = registerMemPsw.value;
      regObj.memName = registerMemName.value;
      regObj.memEmail = registerMemEmail.value;
      var jsonStr = JSON.stringify(regObj);
      var data_info = "jsonStr=" + jsonStr;
      xhr.send(data_info);
      // console.log(data_info);
   }
}
// ================================================= //
//                  我是註冊程式的尾巴                 //
// ================================================= //




// ================================================= //
//         我是忘記密碼程式 //// 我是忘記密碼程式       //
// ================================================= //

// 要關防毒阿不然debug 底到死~~~~~ 
// php.ini 把openssl 的註解拿掉喔 
function sendYourPsw() {
   var xhr = new XMLHttpRequest();
   xhr.onload = function () {
      if (xhr.responseText.indexOf("notfound") == 0) {     //信箱或帳號有錯
         // console.log(xhr.responseText);
         data = xhr.responseText;
         // console.log(data);
         $('#loginstate-wrap').show();
         $('#state-pic-V').hide();
         $('#state-pic-X').show();
         $('#state-con-inner').html('帳號或信箱有誤耶<br>再檢查一下吧!');
         // 錯誤訊息2.2秒後收起
         setTimeout(function () {
            $('#loginstate-wrap').hide();
         }, 2200)
         // 登入燈箱2.4秒後出現
         setTimeout(function () {
            document.getElementById('memlightBox-wrap').style.display = 'block';
         }, 2400);
         //轉換回忘記密碼那區塊 登入及註冊頁籤應是白色黑字
         $('#login-tab').css({
            'backgroundColor': '#fff',
            'color': '#000',
         })
         $('#register-tab').css({
            'backgroundColor': '#fff',
            'color': '#000',
         })
         $('#login-content').hide();
         $('#register-option').hide();
         $('#forgetPsw-option').show();
      } else { //驗證成功 + 信寄出
         var forgetPswmemName = xhr.responseText.split('|')[0];
         var forgetPswmemEmail = xhr.responseText.split('|')[1];
         // console.log(forgetPswmemName);
         // console.log(forgetPswmemEmail);
         cancelLogin();
         document.getElementById('memlightBox-wrap').style.display = 'none';
         $('#loginstate-wrap').show();
         $('#state-pic-V').show();
         $('#state-pic-X').hide();
         $('#state-con-inner').html(forgetPswmemName + ' , 您好<br>密碼已經幫您寄送到 : <br>' + forgetPswmemEmail + '<br>快去信箱看看吧!');

         setTimeout(function () {
            $('#loginstate-wrap').hide();
         }, 2200);
      }//else(驗正成功 + 信寄出)的尾巴
   }// xhr.onload

   var url = "js/forgetPsw.php";
   xhr.open("post", url, true);
   xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
   var member = {};
   member.memId = forgetPswMemId.value;
   member.memEmail = forgetPswMemEmail.value;
   var data_info = "jsonStr=" + JSON.stringify(member);
   xhr.send(data_info);
   // console.log(data_info);
}//sendYourPsw
// ================================================= //
//                我是忘記密碼程式的尾巴               //
// ================================================= //


//==========登入登出 + 註冊 + 忘記密碼的程式==========//




function init() {
   // 註冊!!!!大家!!!!的!!!!事件聆聽!!!!

   // 大家共用的
   loginTitle = document.getElementById('login-title');
   memlightBox = document.getElementById('memlightBox-wrap');
   LBcancelBtn = document.getElementById('loginLightBox-can-btn');
   allInput = document.getElementsByTagName('input');

   //登入的
   loginMemId = document.getElementById('loginMemId');
   loginMemPsw = document.getElementById('loginMemPsw');
   loginBtn = document.getElementById('loginBtn');
   headerMemName = document.getElementById('header-memName');
   memCenterLink = document.getElementById('memCenter-link');

   //註冊的
   registerMemId = document.getElementById('registerMemId');
   registerMemPsw = document.getElementById('registerMemPsw');
   registerMemName = document.getElementById('registerMemName');
   registerMemEmail = document.getElementById('registerMemEmail');
   registerBtn = document.getElementById('registerBtn');
   checkImg = document.getElementsByClassName('lightBox-check');
   errorTip = document.getElementsByClassName('error-tip');
   errorMsg = document.getElementsByClassName('error-tip-msg');


   //忘記密碼的
   forgetPswMemId = document.getElementById('forgetPswMemId');
   forgetPswMemEmail = document.getElementById('forgetPswMemEmail');
   forgetPswBtn = document.getElementById('forgetPswBtn');

   //登出的
   logoutTitle = document.getElementById('logout-title');

   //狀態燈箱的
   loginstateCancelBtn = document.getElementById('loginstate-cancel-btn');


   //網頁一load進來先判斷你是否登入狀態(或是登出)
   showLoginForm();
   //我按下燈箱的登入按鈕 執行利用Ajax送出資料
   loginBtn.addEventListener('click', sendForm);
   //你按燈XX 把你資料清空
   LBcancelBtn.addEventListener('click', cancelLogin);
   //我按登出 清除session
   logoutTitle.addEventListener('click', logoutWeb);

   // 驗證帳號是否超過3碼 小於12碼 + 帳號是否有人用過
   registerMemId.addEventListener('input', checkRegId);
   // 驗證密碼是否超過3碼 小於12碼
   registerMemPsw.addEventListener('input', checkRegPsw);
   // 驗證姓名是否超過5個字
   registerMemName.addEventListener('input', checkRegName);
   // 驗證email格式是否正確
   registerMemEmail.addEventListener('input', checkRegEmail);
   // 驗證都OK按註冊 寫入資料庫
   registerBtn.addEventListener('click', sendToRegister);

   // 按忘記密碼 記你的密碼給你
   forgetPswBtn.addEventListener('click', sendYourPsw);

   //按狀態燈箱XX 狀態燈箱關掉
   loginstateCancelBtn.addEventListener('click', function () {
      $('#loginstate-wrap').hide();
   });


}
window.addEventListener('load', init);





