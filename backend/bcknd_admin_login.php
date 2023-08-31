<?php

    include "connection.php";

    if(isset($_GET["admin_btnLogin"]))
    {

        $admin_username = $_GET["admin_username"];
        $admin_password = $_GET["admin_password"];

        $query = "select admin_username, admin_password from admin
                    where 
                        admin_username = '$admin_username'
                    and
                        admin_password = '$admin_password' ";
        
        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec) > 0)
        {
            header("location: admin_home.php");
        }
        else
        {
            echo"Invalid credentials. Please try again.";
        }

    }

?>