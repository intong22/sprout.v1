<?php
    include "connection.php";

    if(isset($_POST["btnSignup"]))
    {

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpass = $_POST["confirmpass"];

        $check_email = "select 
                        account_email
                    from
                        user_account
                    where
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
                $insertQuery = "insert into 
                                user_account
                                    (account_lastname, account_firstname, account_email, account_password, account_default_image, account_subscribed, account_status)
                                values
                                    ('".$lastname."', '".$firstname."', '".$username."', '".$password."','../assets/default_img.jpg' , 'false', 'A')";

                mysqli_query($con, $insertQuery);
            }
            else
            {
                echo"Passwords do not match. Please try again.";
            }
        }

    }

?>