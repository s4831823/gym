<?php
  $dsn = "mysql:host=localhost;dbname=cd104g3;port=3306;charset=utf8";
  $user = "cd104g3";
  $password = "cd104g3";
  $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  $pdo = new PDO($dsn, $user, $password, $options);
?>