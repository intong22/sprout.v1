<?php

    include "connection.php";

    //get user's data
    $get_user_details = "SELECT 
                            account_image, account_default_image, account_firstname, account_lastname, account_mobile, account_email, account_address
                        FROM
                            user_account
                        WHERE
                            account_email = '".$_SESSION["username"]."' ";

    $exec = mysqli_query($con, $get_user_details);

    if(mysqli_num_rows($exec) > 0)
    {
        while($data = mysqli_fetch_assoc($exec))
        {
            $image = "<img src='data:image/jpeg;base64,".base64_encode($data["account_image"])."' alt='User image' class='user-image' </img>";
            $deflt_image = "<img src='data:image/jpeg;base64,".base64_encode($data["account_default_image"])."' alt='User image' class='user-image' </img>";
            $fname = $data["account_firstname"];
            $lname = $data["account_lastname"];
            $mobile = $data["account_mobile"];
            $email = $data["account_email"];
            $address = $data["account_address"];
        }
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

    //update user info
    if(isset($_POST["btnSave"]))
    {
        //UPDATE QUERY GOES HERE
    }
?>