<?php
    //啟動 Session
    session_start();

    //清除所有已登記的 Session 變數
    session_unset();

    // 銷毀現有的 Session連線紀錄
    session_destroy();
    
    header("Location:mgr_login.html");
?>