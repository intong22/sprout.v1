<?php
    include "connection.php";

    if(isset($_POST["btnSignup"]))
    {

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpass = $_POST["confirmpass"];


        if($password == $confirmpass)
        {
            $insertQuery = "insert into 
                            user_account
                                (account_lastname, account_firstname, account_email, account_password)
                            values
                                ('".$lastname."', '".$firstname."', '".$username."', '".$password."')";

            mysqli_query($con, $insertQuery);
        }
        else
        {
            echo"Passwords do not match. Please try again.";
        }

    }

?>