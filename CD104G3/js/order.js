$(document).ready(function(){
    // ---- 訂單狀態數字變中文 ----
    (function(){
        let state = document.getElementsByClassName('orderState');
        let stateBtn = document.getElementsByClassName('changeState');
        let len = state.length;
            // console.log(state[1]);
        for(let i=0; i<len; i++){
            let stateTxt = stateBtn[i].nextSibling.nextSibling.innerText;
            // console.log(stateTxt);
            
            if(stateTxt == '0'){
                state[i].innerText = '待出貨';
                stateBtn[i].innerText = '結單';
            }
            else if(stateTxt == '1'){
                state[i].innerText = '已結單';
                stateBtn[i].innerText = '取消結單';
            }
        }
    })();

    // ---- 點 查看：send訂單編號，resp寄件資訊、訂單明細 ----
    $('.showDetail').click(function(e){
        $('#order_popup').show();
        
        // ---- 寄件資訊呈現在popup ----
        (function(){
            let xhr = new XMLHttpRequest();
            //回傳寄件資訊
                xhr.onload = function(){
                    let sendInfo = JSON.parse(xhr.responseText); 
                        // console.log(sendInfo);
                    // 資料寫進表格中    
                    $('#orderReceiver').text(sendInfo[0].orderReceiver);
                    $('#orderEmail').text(sendInfo[0].orderEmail);
                    $('#orderAddr').text(sendInfo[0].orderAddr);
                    $('#orderTel').text(sendInfo[0].orderTel);
                }
                xhr.open("POST", "php/showSendInfo.php",true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded"); 
               
            let obj = {};
                obj.orderNo = e.target.parentNode.parentNode.parentNode.getElementsByTagName("span")[0].innerText;     
            let jsonStr = JSON.stringify(obj);
            let send_info = "jsonStr=" + jsonStr;
                xhr.send(send_info);
                    // console.log(send_info);
        })();

        // ---- 訂單明細呈現在popup ----
        (function(){
            let xhr = new XMLHttpRequest();
            //回傳訂單明細
                xhr.onload = function(){
                    let itemInfo = JSON.parse(xhr.responseText);
                        // console.log(itemInfo);
                    // 資料寫進表格中 
                    let item_table = document.getElementById('orderitem');
                        
                    let len = itemInfo.length; 
                    for(let i=0; i<=len; i++){
                        let item_tr = document.createElement('tr');
                            item_tr.className = 'itemRow';
                            item_table.appendChild(item_tr);

                        let td_orderName = document.createElement('td');
                            td_orderName.className = 'prodName';
                            td_orderName.innerText = itemInfo[i].prodName;
                        item_tr.appendChild(td_orderName);
                                
                        let td_prodPrice = document.createElement('td');
                            td_prodPrice.className = 'prodPrice';
                            td_prodPrice.innerText = itemInfo[i].prodPrice;
                        item_tr.appendChild(td_prodPrice);
                        
                        let td_prodQty = document.createElement('td');
                            td_prodQty.className = 'prodQty';
                            td_prodQty.innerText = itemInfo[i].prodQty;
                        item_tr.appendChild(td_prodQty);

                        let td_subTotal = document.createElement('td');
                            td_subTotal.className = 'subTotal';
                            td_subTotal.innerText = itemInfo[i].subtotal;
                        item_tr.appendChild(td_subTotal);
                    };
                }
                xhr.open("POST", "php/showItemInfo.php",true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded"); 
               
            let obj = {};
                obj.orderNo = e.target.parentNode.parentNode.parentNode.getElementsByTagName("span")[0].innerText;     
            let jsonStr = JSON.stringify(obj);
            let date_info = "jsonStr=" + jsonStr;
                xhr.send(date_info);
                    // console.log(date_info);
        })();
    })

    // ---- 點 已出貨/待出貨 ----
    $('.changeState').click(function(e){
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "php/showSendInfo.php",true);
            //隱藏狀態碼
            var orderState = e.target.nextSibling.nextSibling;
            //狀態碼文字化： 結單=1 | 待出貨=0
            var stateTxt = e.target.parentNode.parentNode.parentNode.getElementsByClassName('orderState')[0];
                // console.log("點擊時stateTxt : "+stateTxt.innerText);
                // console.log("點擊時orderState : "+orderState.innerText);

        xhr.onload = function(){
            var response = xhr.responseText;
                // console.log('res:', response);  
            
            if(response == '0'){
                stateTxt.innerText = '待出貨';
                e.target.innerText = '結單';
                orderState.innerText = response;
                    // console.log('if == 0:', stateTxt.innerText); 
            }
            else if(response == '1'){
                stateTxt.innerText = '已結單';
                e.target.innerText = '取消結單';
                orderState.innerText = response;
                    // console.log('if == 1:', stateTxt.innerText); 
            }
        }
                // console.log(e.target.parentNode.parentNode.parentNode.getElementsByTagName("span")[0].innerText);    
                // console.log('orderState:', orderState.innerText); 
            let url = `php/orderState.php`
                    + `?orderState=${orderState.innerText}`
                    + `&orderNo=${e.target.parentNode.parentNode.parentNode.getElementsByTagName("span")[0].innerText}`;
        xhr.open('GET', url);
        xhr.send();
        alert('修改成功！');
    })

    // ---- popup close -----
    $('#popup--exit').click(function(){
        $('.itemRow').remove();
        $('#order_popup').hide();
    })
    $('#odPassBtn').click(function(){
        $('.itemRow').remove();
        $('#order_popup').hide();
    })
}) // end of $(document).ready
