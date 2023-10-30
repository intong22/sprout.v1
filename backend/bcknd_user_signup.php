<?php
    include "connection.php";

    if(isset($_POST["btnSignup"]))
    {

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpass = $_POST["confirmpass"];

        $check_email = "SELECT 
                            account_email
                        FROM
                            user_account
                        WHERE
                            account_email = '$username' ";
        
        $check = mysqli_query($con, $check_email);

        if(mysqli_num_rows($check) > 0)
        {
            echo "Email already exists. Please try again";
        }
        else
        {
            if($password == $confirmpass)
            {
                $insertQuery = "INSERT INTO 
                                user_account
                                    (account_lastname, account_firstname, account_email, account_password, account_status)
                                VALUES
                                    ('".$lastname."', '".$firstname."', '".$username."', '".$password."', 'A')";

                mysqli_query($con, $insertQuery);

                $insertSubs = "INSERT INTO
                                subscriptions
                                    (account_id, subscription_status)
                                VALUES
                                    (LAST_INSERT_ID(), 'B')";

                mysqli_query($con, $insertSubs);
            }
            else
            {
                echo"Passwords do not match. Please try again.";
            }
        }

    }

?>