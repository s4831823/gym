


        //=====================================燈箱的關閉======================================
                    var close = document.querySelectorAll('.poster-inner__madal-close-icon'); //叉叉按鈕
                    // var modal = document.querySelectorAll('.manage-page-content__poster-inner');
        
                    function closeModal() {
                        for(var i=0; i<close.length; i++){
                            
                            close[i].addEventListener('click', function(){
                                //alert('hi!');
                                if(newPrdctWin.style.display == 'block'){ 
                                   newPrdctWin.style.display = 'none';//新增商品燈箱關閉
                                 }
        
                                 if(edtPrdctWin.style.display == 'block'){
                                    edtPrdctWin.style.display = 'none';//修改商品燈箱關閉
                                 }
                            });
                        }
                    }   
        //=====================================================================================
                        
        
        
                    
        //========================出現新增商品燈箱==============================     
        
                var newPrdct = document.getElementById('newPrdct');  // 新增商品按鈕
                var newPrdctWin = document.getElementById('newPrdctWin'); //新增商品視窗
                newPrdct.addEventListener('click',function(){
                    newPrdctWin.style.display = 'block';
                }); 
        
        //================================================================
        
        
        //========================修改商品燈箱==============================     
                
                //修改商品－第一部分：點選「修改」(e.target)後頁面出現燈箱，並顯示商品目前的資料
                function edtPrdctUseE(e){ 
                        var obj = e.target;
                        //console.log(obj); 
                        edtPrdctWin.style.display = 'block'; //出現修改商品燈箱

                        //將資料庫資料顯示在燈箱內
                        var xhr = new XMLHttpRequest();
                        xhr.onload = function(){
                            console.log(xhr.responseText);
                            console.log(JSON.parse(xhr.responseText));
                            var prodData = JSON.parse(xhr.responseText); 
                            document.getElementById('prdctNameEdt').value = prodData.prodName;
                            
                            //console.log(prodData.prodNo);
                
                            // let tempIndex;
                            // switch(prodData.prodCatEdt){
                            //     case "機油":
                            //         tempIndex = 0;
                            //         break;
                            //     case "美容":
                            //         tempIndex = 1;
                            //         break;
                            //     case "其他":
                            //         tempIndex = 2;
                            // } //董董說的另外一種抓select值的方式


                            //比較好的抓select值的方式，能抓取資料庫的值，並顯示在頁面的select上。
                            let catType = ["機油","美容","其他"]; //先令一個陣列，裡面放value
                            let tempIndex = catType.indexOf(prodData.prodCat);//然後用indexOf的方式，去找prodData中prodCat的value
                            let stateType = ["1", "0"];
                            let stateTempIndex = stateType.indexOf(prodData.prodState);

                            document.getElementById('prodCatEdt').selectedIndex = tempIndex; //select所選到的部分 = 上面的變數tempIndex
                            document.getElementById('prodStateEdt').selectedIndex = stateTempIndex; //select所選到的部分 = 上面的變數stateTempIndex
                            document.getElementById('prodPriceEdt').value = prodData.prodPrice;
                            document.getElementById('prodInfoEdt').value = prodData.prodInfo;
                            //document.getElementById('prodImgDb').innerHTML = prodData.prodImg;//把資料echo到燈箱的<span></span>中
                            document.getElementById('prodImgSrc').value = prodData.prodImg;
                            document.getElementById('prodNoEdt').value = prodData.prodNo;
                            
                        }
                        
                        xhr.open("GET", "edtPrdctGet.php?prodNo="+obj.id,true);
                        //console.log("edtPrdctGet.php?prodNo="+obj.id);
                        xhr.send();
                    }//



                     //修改商品－第二部分：將更改後的資料重新寫回資料庫
                    function sendEditProd(e){
                        //console.log(document.getElementById('prodImgEdt').value);
                        var myForm = new FormData(e.target.form);
                        var xhr = new XMLHttpRequest();
                    
                        xhr.onload = function(){ 

                            if(xhr.status == 200){
                               console.log(xhr.responseText);

                                alert('商品修改成功！');
                                
                                location.reload();//自動重新整理頁面

                            }else{
                            
                                alert( xhr.status );
                            }

                        }
                        xhr.open("POST","editProdSend.php",true);
                        //xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

                        // var editProdObj = {};
                        // editProdObj.prodName = document.getElementById('prdctNameEdt').value;
                        // editProdObj.prodCat = document.getElementById('prodCatEdt').value;
                        // editProdObj.prodPrice = document.getElementById('prodPriceEdt').value;
                        // editProdObj.prodInfo = document.getElementById('prodInfoEdt').value;
                        // editProdObj.prodImg = document.getElementById('prodImgEdt').value;
                        // document.getElementById('prodImgEdt').value;
                        //     if(editProdObj.prodImg == ""){
                        //         var prodImgDb = document.getElementById('prodImgDb').innerHTML;
                        //         editProdObj.prodImg = prodImgDb;
                        //     }
                        // editProdObj.prodState = document.getElementById('prodStateEdt').value;
                        // editProdObj.prodNo = document.getElementById('prodNoEdt').value;

                        // var jsonStr = JSON.stringify(editProdObj);
                        // var editProd_info = "jsonStr=" + jsonStr;
                        // console.log(jsonStr);
                        // xhr.send(editProd_info);
                        xhr.send(myForm);
                       
                    }
        
        //================================================================
        
        
        
        
        
        //======================新增商品================================
        var newPrdctOk = document.getElementById('newPrdctOk');
        newPrdctOk.addEventListener('click' , upDatePrdct);
        
        function upDatePrdct(e){
            var myForm = new FormData(e.target.form);
            var xhr = new XMLHttpRequest();
            xhr.onload = function(){
                //console.log("onload : ", xhr.readyState);
        
                if(xhr.status == 200){
                    console.log(xhr.responseText);

                    alert('商品新增成功！');
                    location.reload();
                }else{
                
                    alert( xhr.status );
                }
            }          
            // var prodImg = document.getElementById("prodImg").files[0];
            // var formData = new FormData(prodImg);

            //var prodImg = document.getElementById("prodImg");
            xhr.open("post","newPrdct.php",true);//設定好要連結的程式
            // xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
  

            // var newPrdctObj = {};
            // newPrdctObj.prodName = document.getElementById('prodName').value;
            // newPrdctObj.prodCat = document.getElementById('prodCat').value;
            // newPrdctObj.prodPrice = document.getElementById('prodPrice').value;
            // newPrdctObj.prodInfo = document.getElementById('prodInfo').value;
            // newPrdctObj.prodImg = document.getElementById('prodImg').value;
            // newPrdctObj.prodState = document.getElementById('prodState').value;
        
            // var jsonStr = JSON.stringify(newPrdctObj);
            // var newPrdct_info = "jsonStr=" + jsonStr; //欄位名稱+值

            xhr.send(myForm);//要帶回php去的資料
            //console.log(newPrdct_info);
        }
        
            
        
    window.addEventListener('load',function(){
        
        newPrdctCancel = document.getElementById('newPrdctCancel'); //新增商品取消紐
        newPrdctCancel.addEventListener('click',function(){  
            if(newPrdctWin.style.display == 'block'){
                newPrdctWin.style.display = 'none';
              }
        })

        edtPrdcts = document.getElementsByClassName('edtPrdct'); //修改商品鈕
        edtPrdctWin = document.getElementById('edtPrdctWin'); //修改商品燈箱
            for(var i=0; i<edtPrdcts.length; i++){  //所有修改鈕裝上事件聆聽功能
            edtPrdcts[i].addEventListener('click',edtPrdctUseE);
            }

        editProdOk = document.getElementById('editProdOk'); //修改商品確定鈕
        editProdOk.addEventListener('click', sendEditProd);

        editProdCancel = document.getElementById('editProdCancel'); //修改商品取消鈕
        editProdCancel.addEventListener('click', function(){
            
            if(edtPrdctWin.style.display == 'block'){
               edtPrdctWin.style.display = 'none';
             }
        });

    }) //window.addEventListener end

    function doFirst() {
             closeModal();    
    }
        
    window.onload = doFirst;
    