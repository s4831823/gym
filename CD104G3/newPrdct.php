<?php 
$errMsg="";

// $jsonStr = $_REQUEST["jsonStr"];
// $newPrdct_info = json_decode($jsonStr);


try{

    $dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
    $user = "cd104g3";
    $password = "cd104g3";
    $options=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn,$user,$password,$options);


    $sql = "insert into product (prodBirth,prodName,prodCat,prodPrice,prodInfo,prodImg,prodState) values(now(),:prodName,:prodCat,:prodPrice,:prodInfo,:prodImg,:prodState)";
    $pdoStatment = $pdo->prepare($sql);

   

    $pdoStatment->bindValue(":prodName", $_REQUEST["prodName"]);
    $pdoStatment->bindValue(":prodCat", $_REQUEST["prodCat"]);
    $pdoStatment->bindValue(":prodPrice", $_REQUEST["prodPrice"]);
    $pdoStatment->bindValue(":prodInfo", $_REQUEST["prodInfo"]);
    $pdoStatment->bindValue(":prodImg", "");
    $pdoStatment->bindValue(":prodState", $_REQUEST["prodState"]);

    $pdoStatment->execute();

    $prodNo=$pdo->lastInsertId();



    
    $prodImg="";

    if($_FILES["prodImg"]["error"] == 'UPLOAD_ERR_OK'){ ///表上傳成功
        if( file_exists("imagesForMemImg") === false){
            mkdir("imagesForMemImg"); //做路徑
        }

        $from = $_FILES["prodImg"]["tmp_name"];
        $prodImg = "{$prodNo}_{$_FILES["prodImg"]["name"]}";
        $to = "img/img-shop/$prodImg";
        $path_parts = pathinfo( $to );
        copy($from, $to);		


    }else if($_FILES["prodImg"]["error"] == 'UPLOAD_ERR_NO_FILE'){
        $prodImg="";
    }else{
        echo'error';
    }

    echo $prodImg;
    $sql = "update product set prodImg ='$prodImg' where prodNo=:prodNo";
    $product = $pdo->prepare($sql);
    $product -> bindValue(":prodNo",$prodNo);
    $product->execute();

}catch(PDOException $e){
    $errMsg = "錯誤原因：".$e->getMessage()."<br>"."錯誤行號：".$e->getLine()."<br>";
};

if($errMsg == ""){
    echo "新增成功！";
}else{
    echo $errMsg;
};

?>