<?php

    include "connection.php";

    if(isset($_POST["btnSignup"]))
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpass = $_POST["confirmpass"];

        $insert = "insert into user_account
                        (account_id, account_lastname, account_firstname, account_email, account_password, account_status)
                    values
                        ('2', '".$lastname."', '".$firstname."', '".$email."', '".$confirmpass."', 'A')";

        if($password != $confirmpass)
        {
            echo"Passwords do not match. Please try again.";
        }
        else
        {
            mysqli_query($con, $insert);
        }
            
    }

?>