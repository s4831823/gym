<?php

try {
    require_once('connect_forum.php');
   

    // $msg = "";
    $memNo =$_POST["memNo"]; //抓會員登錄資料
    $memId =$_POST["memId"]; //抓會員登錄資料

    //上傳圖檔
    switch( $_FILES["imgURL"]["error"]){
        case UPLOAD_ERR_OK : 
            
            $from = $_FILES["imgURL"]["tmp_name"];
            $path_parts = pathinfo( $_FILES["imgURL"]["name"] );
            // echo "dirname : ", $path_parts['dirname'], "<br>";
            // echo "basename : ", $path_parts['basename'], "<br>";
            // echo "extension : ", $path_parts['extension'], "<br>";
            // echo "filename : ", $path_parts['filename'], "<br>";
            //exit( $to );
            $to = "img/" . time(). "." . $path_parts['extension'] ;  //8
            copy($from, $to);	
            echo "上傳成功<br>";
            echo $from;
            break;
        case 1 :
            echo "上傳檔案太大, 不得超過", ini_get("max_file_size"),"<br>";
            break;
        case 2 :
            echo "上傳檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"],"位元組(bytes)<br>";
            break;
        case 3 :
            echo "上傳檔案不完整";
            break;
        case 4 : 
            echo "檔案没選";
    }
    
    
   

    if(!empty( $_POST["postTitle"]) || !empty( $_POST["postInner"]) || !empty( $_POST["postCat"]) || !empty( $_FILES["file"]['name'])  ) {
        $uploadedFile = "";
        if(!empty( $_FILES["imgURL"]['type']) ) {
            $fileName = $_FILES["imgURL"]['name'];
            $valid_extensions = array('jpeg', 'jpg', 'png');
            $temporary = explode('.', $_FILES["imgURL"]['type']);
            $file_extension = end($temporary);

            if((($_FILES["imgURL"]['type'] == 'image/png') || ($_FILES["imgURL"]['type'] == 'image/jpg') || ($_FILES["imgURL"]['type'] == 'image/jpeg')) && in_array($file_extension, $valid_extensions)) {
                $sourcePath = $_FILES["imgURL"]['tmp_name'];
                $targetPath = "final_project/src/img/". $fileName;
                if(move_uploaded_file($sourcePath, $targetPath)) {
                    $uploadedFile = $fileName;
                }
            }
        }
        $postTitle =$_POST["postTitle"];
        $postInner =$_POST["postInner"];
        $postCat =$_POST["postCat"];
    }
    
    // echo "圖片名字： ".$_FILES["imgURL"]['name']." postTitle: ".$postTitle." postInner: ".$postInner." postTime: ".date("Y-M-D")." postCat: ".$postCat;
    // echo "INSERT INTO forumPost ( memNo, memId, postTitle, postInner, postTime, postCat) 
    //                      VALUES ( '{$memNo}', '{$memId}','{$postTitle}', '{$postInner}', now(), '{$postCat}')";
    // echo "INSERT INTO forumPostImg (imgURL, postNo) VALUES ( '{$_FILES["imgURL"]['name'] }', '{$postNo }')";   
    //     exit();
    //insert form data into DB
    $insert1 = $pdo->query("INSERT INTO forumPost ( memNo, memId, postTitle, postInner, postTime, postCat) 
                         VALUES ( '{$memNo}', '{$memId}','{$postTitle}', '{$postInner}', now(), '{$postCat}')");
                         

    $postNo =  $pdo->lastInsertId('forumPost');
    $fileName = time(). "." . $path_parts['extension'];
    $insert2 = $pdo->query("INSERT INTO forumPostImg (imgURL, postNo) VALUES ( '{$fileName}', '{$postNo }')"); 
                   
    echo "INSERT INTO forumPostImg (imgURL, postNo) VALUES ( '{$fileName}', '{$postNo }')";
    echo $insert1? 'text input OK':'text input ERR';
    echo $insert2? 'img input OK':'img input ERR';

    
}catch(PDOException $e) {
    echo "錯誤訊息： ".$e->getMessage()."錯誤行號： ".$e->getLine();
}



    

                 

?>