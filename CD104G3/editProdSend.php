<?php
$errMsg="";
// $jsonStr = $_REQUEST["jsonStr"];
// $editProd_info = json_decode($jsonStr);

$prodNo= $_REQUEST["prodNoEdt"];

try{
    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";
    $password ="cd104g3";
    $options=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn,$user,$password,$options);


    


    if($_FILES["prodImgEdt"]["error"] == UPLOAD_ERR_OK){ ///表上傳成功
        if( file_exists("imagesForMemImg") === false){
            mkdir("imagesForMemImg"); //做路徑
        }
        $prodImg="";
        $from = $_FILES["prodImgEdt"]["tmp_name"];
        $prodImg = "{$prodNo}_{$_FILES["prodImgEdt"]["name"]}";
        $to = "img/img-shop/$prodImg";
        $path_parts = pathinfo( $to );
        copy($from, $to);	
        unlink("img/img-shop/{$_REQUEST["$prodImgSrc"]}");


    }else if($_FILES["prodImgEdt"]["error"] == UPLOAD_ERR_NO_FILE){
        $prodImg= $_REQUEST["prodImgSrc"];
    }else{
        echo'error';
    }


    $sql = "UPDATE product SET prodName = :prodName,prodCat = :prodCat,prodPrice = :prodPrice,prodInfo = :prodInfo,prodImg = :prodImg,prodState = :prodState WHERE prodNo = :prodNo ";
    $pdoStatment = $pdo->prepare($sql);
    // $pdoStatment->bindValue(":prodName", $editProd_info->prodName);
    // $pdoStatment->bindValue(":prodCat", $editProd_info->prodCat);
    // $pdoStatment->bindValue(":prodPrice", $editProd_info->prodPrice);
    // $pdoStatment->bindValue(":prodInfo", $editProd_info->prodInfo);
    // $pdoStatment->bindValue(":prodImg", $editProd_info->prodImg);
    // $pdoStatment->bindValue(":prodState", $editProd_info->prodState);
    // $pdoStatment->bindValue(":prodNo", $editProd_info->prodNo);



       

    $pdoStatment->bindValue(":prodName", $_REQUEST["prdctNameEdt"]);
    $pdoStatment->bindValue(":prodCat", $_REQUEST["prodCatEdt"]);
    $pdoStatment->bindValue(":prodPrice", $_REQUEST["prodPriceEdt"]);
    $pdoStatment->bindValue(":prodInfo", $_REQUEST["prodInfoEdt"]);
    $pdoStatment->bindValue(":prodImg", $prodImg);
    $pdoStatment->bindValue(":prodState", $_REQUEST["prodStateEdt"]);
    $pdoStatment->bindValue(":prodNo", $_REQUEST["prodNoEdt"]);
    
    $pdoStatment->execute();
    
}catch(PDOException $e){
    echo "錯誤原因：".$e->getMessage()."<br>"."錯誤行號：".$e->getLine()."<br>";
};

if($errMsg == ""){
    echo "修改成功！";
}else{
    echo $errMsg;
};


?>