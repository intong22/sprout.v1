<?php

    session_start();

    include "connection.php";

    $query = "SELECT 
                    account_status
                FROM 
                    user_account 
                WHERE 
                    account_email = '".$_SESSION["username"]."' ";

    $exec = mysqli_query($con, $query);

    $res = mysqli_fetch_assoc($exec);

    $_SESSION["status"] = $res["account_status"];

    if(!isset($_SESSION["logged_in"]))
    {
        header("location: user_login.php");
        exit;
    }

    if(isset($_SESSION["status"]) && $_SESSION["status"] == "I")
    {
        session_unset();
        session_destroy();
        header("location: ../user/user_login.php");
        exit;
    }
?>