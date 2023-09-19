<?php
    include "connection.php";
    
    if(isset($_GET["btnLogin"]))
    {
        $username = $_GET["username"];
        $password = $_GET["password"];
        
        $query = "select account_email, account_password 
                from 
                    user_account 
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

            //get account_id
            //NOT YET FINAL
            $acc_id = "select 
                            account_id
                        from
                            user_account
                        where
                            account_email = '.$username.'
                        and
                            account_password = '.$password.' ";

                    $get_id = mysqli_query($con, $acc_id);

                    if(mysqli_num_rows($get_id) > 0)
                    {
                        while($id = mysqli_fetch_assoc($get_id))
                        {
                            $_SESSION["account_id"] = $id["account_id"];
                        }
                    }

            header("location: user_homepage.php");
            exit;
        }
        else
        {
            echo"Invalid credentials. Please try again.";
        }

    }

?>