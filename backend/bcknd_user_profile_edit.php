<?php

    include "connection.php";

    //get user's data
    $get_user_details = "SELECT 
                            account_image, account_firstname, account_lastname, account_mobile, account_email, account_address, account_password
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
            $deflt_image = "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";
            $fname = $data["account_firstname"];
            $lname = $data["account_lastname"];
            $mobile = $data["account_mobile"];
            $email = $data["account_email"];
            $address = $data["account_address"];
            $password = $data["account_password"];
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
    if(isset($_POST["save"]))
    {
        //NOT YET FINAL

        // $uploaded_image = $_FILES["add_image"];
        // $fname = $_POST["firstname"];
        // $lname = $_POST["lastname"];
        // $mobile = $_POST["mobilenumber"];
        // $home_add = $_POST["homeaddress"];
        // $new_pass = $_POST["newpassword"];
        // $confirm_pass = $_POST["confirmpassword"];

        // if($new_pass != $confirm_pass)
        // {
        //     echo"Passwords do not match. Please try again.";
        // }
        // else
        // {

        //     $update = "UPDATE
        //                 user_account
        //             SET
        //                 account_image = '$uploaded_image', account_firstname = '$fname', account_lastname = '$lname', account_mobile = '$mobile', account_address = '$home_add', account_password = '$confirm_pass'
        //             WHERE
        //                 account_email = '".$_SESSION["username"]."' ";
        
        //     mysqli_query($con, $update);
            
        //     header("location: user_profile.php");

        // }

    }
?>