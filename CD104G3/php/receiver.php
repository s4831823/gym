<?php
    session_start();
    $_SESSION['receiver'] = $_GET["receiver"];
    $_SESSION['email'] = $_GET["email"];
    $_SESSION['addr'] = $_GET["addr"];
    $_SESSION['tel'] = $_GET["tel"];
  
    print_r( $_SESSION);
?>