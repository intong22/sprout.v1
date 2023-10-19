<?php

    session_start();

    $_SESSION = array();
    session_destroy();
    unset($_SESSION);  
    
    header("location: ../user/user_login.php");
    exit;

?>