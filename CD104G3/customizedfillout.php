
<?php 
session_start(); 
$errMsg = "";
$memNo=$_SESSION["memNo"];
$memId=$_SESSION["memId"];
// 
$time=date("ymdhisa");
// $memNo=$_POST["memNo"];
$rbtName=$_POST["rbtName"];
$rbtAddr=$_POST["rbtAddr"];
$rbtSkillNo=$_POST["rbSkillNo"];
// $rbtOdTime=;
$rbtOdState='0';
$rbtINT=$_POST["rbtINT"];
$rbtVIT=$_POST["rbtVIT"];
$rbtAGI=$_POST["rbtAGI"];
$rbtAbility=$rbtINT+$rbtVIT+$rbtAGI;
// 
$rbtImg='images/customized/' . $time . $memId . '.png';
try{

	$dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
	$user = "cd104g3";
	$password = "cd104g3";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn, $user, $password, $options);

    $sql = "INSERT INTO rbtorder (rbtNo,memNo,rbtSkillNo,rbtName, rbtAddr,rbtOdTime,rbtOdState,rbtINT,rbtVIT,rbtAGI,rbtAbility,rbtImg) 
            VALUES (null,:memNo,:rbtSkillNo, :rbtName, :rbtAddr,now(),:rbtOdState,:rbtINT,:rbtVIT,:rbtAGI,:rbtAbility,:rbtImg)";
                
                $pdoStatement = $pdo->prepare( $sql);
                $pdoStatement->bindValue(":memNo", $memNo);
                $pdoStatement->bindValue(":rbtSkillNo", $rbtSkillNo);
                $pdoStatement->bindValue(":rbtName", $rbtName);
                $pdoStatement->bindValue(":rbtAddr", $rbtAddr);
                $pdoStatement->bindValue(":rbtOdState", $rbtOdState);
                $pdoStatement->bindValue(":rbtINT", $rbtINT);
                $pdoStatement->bindValue(":rbtVIT", $rbtVIT);
                $pdoStatement->bindValue(":rbtAGI", $rbtAGI);
                $pdoStatement->bindValue(":rbtAbility", $rbtAbility);
                $pdoStatement->bindValue(":rbtImg", $rbtImg);
                $pdoStatement->execute();
                //   $('.customizedfillout').css('display','none');
                //                  $('.jump').css('display','block');
                //  echo "<script>
                //  alert('新增成功');
                //  </script>";
    // $sql = "select * from robothair";
    // $sql1 = "select * from robotskill";
    // $pdohair = $pdo->query( $sql);
    // $pdoskill = $pdo->query( $sql1);
    // $hairs = $pdohair->fetchAll();
    // $skills = $pdoskill->fetchAll();
}catch(PDOException $ex){
    $errMsg ="錯誤原因 : " . $e->getMesage(). "<br>".   "錯誤行號 : ". $e->getLine(). "<br>";
}
?>