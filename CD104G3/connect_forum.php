
<?php
$host = 'localhost';
$user = 'cd104g3';
$password = 'cd104g3';
$dbname = 'cd104g3';
$dsn = 'mysql:host='. $host . ';dbname='. $dbname .';charset=utf8';
$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,  PDO::ATTR_CASE=>PDO::CASE_NATURAL);

$pdo = new PDO($dsn, $user, $password);
?>
