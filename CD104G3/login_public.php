<?php session_start(); ?>
<div class="mgrname">
    <i class="fas fa-robot"></i>
    <?php
    if(isset($_SESSION["mgrName"])){
        echo $_SESSION["mgrName"],"&nbsp|";
    }
    ?>
    <span id="logout"><a href="logout.php">登出</a></span>
</div>