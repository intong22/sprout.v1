<?php

    session_start();

    $_SESSION = array();
    session_destroy();
    unset($_SESSION);  
    
    header("location: ../admin/admin_login.php");
    exit;

?>