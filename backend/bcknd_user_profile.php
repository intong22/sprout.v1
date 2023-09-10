<?php
    include "connection.php";

    $image = "";
    $fname = "";
    $lname = "";

    $query = "select 
                    account_image, account_firstname, account_lastname
                from
                    user_account
                where
                    account_email = '".$_SESSION["username"]."'
                and
                    account_password = '".$_SESSION["password"]."' ";
    
    $exec = mysqli_query($con, $query);

    if(mysqli_num_rows($exec) > 0)
    {
        while($profile = mysqli_fetch_assoc($exec))
        {
            $image = "<img src='data:image/jpeg;base64,".base64_encode($profile["account_image"])."' alt='User image' class='user-image'>";
            $fname = $profile["account_firstname"];
            $lname = $profile["account_lastname"];
        }
    }
?>