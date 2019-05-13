// ===========================================================================
//                                  function 
// ===========================================================================
// ---- 判斷購物內有無商品：隱藏/顯示"購物車內無商品"、購物數量 ----
function nullText(){
    setTimeout(function(){
        itemLen = $('.cart_list_item').length; 
        // console.log(itemLen);

        if(itemLen>=2){
            $('#cart--nullTxt').css('opacity', '0');
            $('#buyQty').text(itemLen-1).show();
        }
        else{
            $('#cart--nullTxt').css('opacity', '1');
            $('#buyQty').hide();
        }
    }, 200);
}

// ---- 購物車價錢計算 ----
function cartChange(){
    let lessBtns = document.querySelectorAll('.cart_list_item_qty--less');
    let addBtns = document.querySelectorAll('.cart_list_item_qty--add');
    let prodNums = document.querySelectorAll('.cart_list_item_qty--num');
    let lenBtns = lessBtns.length;
    let total=0;

    for(let i=1; i<lenBtns; i++){
        //單價
        let price = lessBtns[i].parentNode.parentNode.getElementsByTagName("span")[3].innerText;
        //數量
        let num = prodNums[i].innerText;
        //小計、總計
        subTotal = price * num;
        total += subTotal;
        //總計算完後，放回
        document.getElementById("sum").innerText = "$" + total.toString();
        //小計放回
        lessBtns[i].parentNode.parentNode.getElementsByTagName("span")[2].innerText = "$" + subTotal.toString();		
    } //end of for迴圈
};

// ---- 購物車中click事件&數量異動 ----  有使用到 nullText() cartChange()
function updateCart(){
    // ---- 建立新品項的事件聆聽功能與發生事件
    let cartLists = document.querySelectorAll(".cart_list_item");
    let cart = document.querySelector(".cart");	
    let lessBtns = cart.querySelectorAll(".cart_list_item_qty--less");
    let numBtns = cart.querySelectorAll(".cart_list_item_qty--num");
    let addBtns = cart.querySelectorAll(".cart_list_item_qty--add");

    // ---- 減號 lessBtn.click事件
    for( let i=1; i<lessBtns.length; i++){
        lessBtns[i].addEventListener("click",function(e){
            let xhr = new XMLHttpRequest();

            if( parseInt(numBtns[i].innerText) >0 )
                numBtns[i].innerText = parseInt(numBtns[i].innerText) - 1;

            cartChange();

            if( parseInt(numBtns[i].innerText) <=0 )
                numBtns[i].parentNode.parentNode.remove();
            
            nullText();

            //異動資料傳回session	
            let url = `php/cartUpdate.php?`
                    + `prodNo=${e.target.parentNode.parentNode.getElementsByTagName("span")[0].innerText}`
                    + `&prodQty=${e.target.nextSibling.nextSibling.innerText}`;
            xhr.open('GET', url);
            xhr.send();

        }); // end of lessBtn.click事件

        // ---- 加號 addBtn.click事件 
        addBtns[i].addEventListener("click",function(e){
            let xhr = new XMLHttpRequest();
            
            numBtns[i].innerText = parseInt(numBtns[i].innerText) + 1;

            cartChange();

            //異動資料傳回session	
            let url = `php/cartUpdate.php`
                    + `?prodNo=${e.target.parentNode.parentNode.getElementsByTagName("span")[0].innerText}`
                    + `&prodQty=${e.target.previousSibling.previousSibling.innerText}`;
            xhr.open('GET', url);
            xhr.send();
        }); // end of addBtn.click事件			
    }

    cartChange();
};


// ===========================================================================
//                                load 事件
// ===========================================================================
window.addEventListener('load',updateCart);


$(document).ready(function(){
    
    (function(){
        $("#cartList").mCustomScrollbar();
    })();

   
// ===========================================================================
//                                    cart
// ===========================================================================
    // ---- 開啟購物車 ---- 
    $('#cartIcon').click(function(){$('.cart').css('right','0')});

    // ---- 關閉購物車 ---- 
    $('#cart--exit').click(function(){$('.cart').css('right','-2000px')});
    
    // ---- 判斷隱藏/顯示"購物車內無商品" ---- 
    nullText();

// ===========================================================================
//                                   chrckout
// ===========================================================================
    // ---- checkout popup ----
    $('#checkout--exit').click(function(){
        console.log('有按到');
        $('#checkout--post').css('display', 'flex');
        $('#checkout--end').hide();
        $('#checkout').hide();
        $('#checkout--popupBG').hide();
    })
    $('#btn--checkout').click(function(){
        let itemLen = $('.cart_list_item').length; 
        // console.log(itemLen);
        if(itemLen>=2){
            if(memberData.ourMemNo == null){
                // console.log('no longin');
                document.getElementById('memlightBox-wrap').style.display = 'block';
            }else{
                // console.log('longin');
                $('#checkout--popupBG').show();
                $('#checkout').show(300);
            }
        }else{
            $('#loginstate-wrap').show();
            $('#state-pic-V').hide();
            $('#state-pic-X').show();
            $('#state-con-inner').html('你還沒有選購商品喔!');
            $('.cart').css('right','-2000px');
        }
        
    }) 
    $('#btn--toEnd').click(function(){
        if($('.postInfo').eq(0).val() == "" ||
           $('.postInfo').eq(1).val() == "" ||
           $('.postInfo').eq(2).val() == "" ||
           $('.postInfo').eq(3).val() == "" ){
                $('#loginstate-wrap').show();
                $('#state-pic-V').hide();
                $('#state-pic-X').show();
                $('#state-con-inner').html('寄送資料填寫不完全!');
        }else{
                // console.log('pass');
                $('#loginstate-wrap').show();
                $('#state-pic-V').show();
                $('#state-pic-X').hide();
                $('#state-con-inner').html('訂購成功！');
                $('#checkout--popupBG').hide();
                $('#checkout').hide();

            // ---- checkout寄送資訊寫入session ----
            let xhr = new XMLHttpRequest();

            xhr.onload = function(){
                // console.log('return', xhr.responseText);
            }

                let url = `php/receiver.php`
                        + `?receiver=${$('#receiver').val()}`
                        + `&email=${$('#email').val()}`
                        + `&addr=${$('#addr').val()}`
                        + `&tel=${$('#tel').val()}`;
            xhr.open('GET', url);
            xhr.send();

            
            $('.postInfo').val('');

            // ---- 購物資料寫入資料庫，並清空session與購物車 ----
            (function(){
                let xhr = new XMLHttpRequest();

                xhr.onload = function(){
                    // console.log(xhr.responseText);
                    
                    let itemLen = $('.cart_list_item').length; 
                    // console.log(itemLen);
                    for(let i=1; i<itemLen; i++){
                        $('.cart_list_item').eq(1).remove();
                    }
                    
                    $('#cart--nullTxt').css('opacity', '1');
                    $('#buyQty').hide();
                    $('#sum').text('$0');
                }

                    let url = "php/cartToDB.php";
                xhr.open('GET', url);
                xhr.send();    
            })();
        }
    })
}) //end of $(document).ready