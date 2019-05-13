<!-- 檔案名稱取名->對應的資料桶子 -->
<?php 
	$dsn = "mysql:host=localhost;port=3306;dbname=cd104g3;charset=utf8";
	$user = "cd104g3";
	$password = "cd104g3";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
	$pdo = new PDO($dsn, $user, $password, $options);
?>