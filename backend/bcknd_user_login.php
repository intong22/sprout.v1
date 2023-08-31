<?php

    include "connection.php";

    if(isset($_GET["btnLogin"]))
    {
        $username = $_GET["username"];
        $password = $_GET["password"];

        $query = "select account_email, account_password from user_account 
                    where 
                        account_email = '$username' and 
                        account_password = '$password' ";

        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec) > 0)
        {
            header("location:homepage.php");
        }
        else
        {
            echo"Invalid credentials. Please try again.";
        }
    }

?>