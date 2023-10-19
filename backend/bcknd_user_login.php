<?php
    include "connection.php";
    
    if(isset($_GET["btnLogin"]))
    {
        $username = $_GET["username"];
        $password = $_GET["password"];
        
        $query = "SELECT 
                        account_id, account_email, account_password, account_status
                    FROM 
                        user_account 
                    WHERE 
                        account_email = '$username' 
                    AND 
                        account_password = '$password' 
                    AND
                        account_status = 'A' ";

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
            echo"<script>
                    alert('Invalid credentials. Please try again.');
                </script>";
        }

    }

?>