<?php
    
    session_start();

    if(isset($_SESSION["logged_in"]))
    {
        header("location: user_homepage.php");
        exit;
    }

?>