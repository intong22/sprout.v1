<?php

    include "connection.php";

    //display user details
    $query = "SELECT 
                    account_image, account_firstname, account_lastname, account_subscribed
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
            $image = "<img src='data:image/jpeg;base64,".base64_encode($profile["account_image"])."' alt='User image' class='forum-image' </img>";
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

    
    function displayCard()
    {
        include "connection.php";

        //check if account image is set
        $account_image_isset = "SELECT
                                    account_image
                                FROM
                                    user_account
                                WHERE
                                    account_image IS NOT NULL
                                AND
                                    account_email = '".$_SESSION["username"]."' ";

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

        //get user posts
        $getPosts = "SELECT 
                        user_account.account_image, user_account.account_firstname, user_account.account_lastname, 
                        post_information.post_id, post_information.post_description, post_information.votes,
                        post_images_comments.post_image, post_images_comments.post_comment
                    FROM
                        user_account
                    INNER JOIN
                        post_information
                    ON
                        user_account.account_id = post_information.account_id
                    LEFT JOIN
                        post_images_comments
                    ON 
                        post_information.post_id = post_images_comments.post_id
                    WHERE
                        account_email = '".$_SESSION["username"]."' ";
        
        $exec = mysqli_query($con, $getPosts);

        if(mysqli_num_rows($exec))
        {
            while($populate = mysqli_fetch_assoc($exec))
            {

                echo"
                    <div class='card-body'>
                    <div style='text-align:left'>
                        <div class='img'>
                    
                        <div style='image-align:left'>
                        <p style='display:inline-block;'>";
                        
                        if($flag == true)
                        {
                            echo "<img src='data:image/jpeg;base64,".base64_encode($populate["account_image"])."' alt='User image' class='forum-image' </img>";
                        }
                        else
                        {
                            echo "<img src='../assets/user_image_def.png' alt='User image' class='forum-image' </img>";   
                        }
                echo"
                            ".$populate["account_firstname"]." ".$populate["account_lastname"]."
                        </p>
                        
                            <div style='text-align:left'>
                            <p class='card-text'>".$populate["post_description"]."</p>
                        
                        <div class='row'>
                            <div class='col-md-4'>
                            <div class='img'>
                            <img src='data:image/jpeg;base64,".base64_encode($populate["post_image"])."' class='brand-logo' alt='Post image'' </img>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    </div>
                ";
                echo"
                    <br>
                    <div class='text-wrapper-6'> ".$populate["votes"]."
                        <input type='submit' name='upvote' value='upvote'> 
                    </div>
                    <div class='text-wrapper-7'>
                        <input type='submit' name='Comment' value='Comment'>
                    </div>
                    
                    <input type='submit' name='Report' value='Report'> 
                
                    </div>
                    </div>
                    </div>
                ";
            }
        }
        else
        {
            echo "No posts yet.";
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

?>