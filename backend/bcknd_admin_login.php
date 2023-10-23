<?php

    include "connection.php";

    if(isset($_GET["admin_btnLogin"]))
    {

        $admin_username = $_GET["admin_username"];
        $admin_password = $_GET["admin_password"];

        $query = "SELECT 
                        admin_username, admin_password 
                    FROM
                        admin
                    WHERE 
                        admin_username = '$admin_username'
                    AND
                        admin_password = '$admin_password' ";
        
        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec) > 0)
        {
            $_SESSION["logged_in"] = true;
            $_SESSION["admin_username"] = $admin_username;
            $_SESSION["admin_password"] = $admin_password; 
            
            header("location: admin_home.php");
        }
        else
        {
            echo"<script>
                    alert('Invalid credentials. Please try again.');
                </script>";
        }

    }

?>