<?php
    include "connection.php";

    //display
    $query = "SELECT 
                    account_image, account_default_image, account_firstname, account_lastname, account_subscribed
                FROM
                    user_account
                WHERE
                    account_email = '".$_SESSION["username"]."'
                AND
                    account_password = '".$_SESSION["password"]."' ";
    
    $exec = mysqli_query($con, $query);

    if(mysqli_num_rows($exec) > 0)
    {
        while($profile = mysqli_fetch_assoc($exec))
        {
            $image = "<img src='data:image/jpeg;base64,".base64_encode($profile["account_image"])."' alt='User image' class='user-image' </img>";
            $deflt_image = "<img src='data:image/jpeg;base64,".base64_encode($profile["account_default_image"])."' alt='User image' class='user-image' </img>";
            $fname = $profile["account_firstname"];
            $lname = $profile["account_lastname"];
            $subscribed = $profile["account_subscribed"];
        }
    }

    if($subscribed)
    {
        $status = "Premium User";
    }
    else
    {
        $status = "Basic User";
    }

    //check if account image is set
    $account_image_isset = "SELECT
                                account_image
                            FROM
                                user_account
                            WHERE
                                account_image IS NOT NULL
                            AND
                                account_email = '".$_SESSION["username"]."'
                            AND
                                account_password = '".$_SESSION["password"]."' ";
    
    $results = mysqli_query($con, $account_image_isset);

    if(mysqli_num_rows($results) > 0)
    {
        //image is set
        $flag = true;
    }
    else
    {
        //image is not set
        $flag = false;
    }
     
?>