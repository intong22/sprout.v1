<?php
    include "connection.php";
    
    if(isset($_GET["btnLogin"]))
    {
        $username = $_GET["username"];
        $password = $_GET["password"];
        
        $query = "select account_email, account_password from user_account 
                where 
                    account_email = '$username' 
                and 
                    account_password = '$password' ";

        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec) > 0)
        {
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password; 
            header("location: user_homepage.php");
            exit;
        }
        else
        {
            echo"Invalid credentials. Please try again.";
        }

    }

?>