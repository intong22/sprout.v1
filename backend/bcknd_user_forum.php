<?php

    include "connection.php";
    
    //get posts from  users
    $getQuery = "SELECT 
                    user_account.account_image, user_account.account_firstname, user_account.account_lastname, post_information.post_description, post_information.post_image
                FROM
                    user_account
                INNER JOIN
                    post_information
                ON
                    user_account.account_id = post_information.account_id";

    //$accountid = $_GET[""];
        
    $exec = mysqli_query($con, $getQuery);


    //display card
    function postInfo()
    {

    }

    //insert post information
    // $postInfo = "INSERT INTO
    //                 post_information
    //                 (account_id, post_description, post_image)
    //             values
    //                 (account_id, )";
?>