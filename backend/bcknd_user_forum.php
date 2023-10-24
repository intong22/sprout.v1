<?php

    include "connection.php";

    //notifications
    function notifications()
    {
        
    }

    //display card
    function postInfo()
    {
        include "connection.php";

        //get posts from  users
        $getQuery = "SELECT 
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
                    ORDER BY
                        votes DESC";

        $exec = mysqli_query($con, $getQuery);

        if(mysqli_num_rows($exec))
        {
            while($populate = mysqli_fetch_assoc($exec))
            {
                card($populate);
            }
        }
    }

    //insert post information
    if(isset($_POST["btnPost"]))
    {
        //get account ID of poster
        $getIDQuery = "SELECT
                            account_id
                        FROM
                            user_account
                        WHERE
                            account_email = '".$_SESSION["username"]."' ";
             
        $id = mysqli_query($con, $getIDQuery);
 
        if(mysqli_num_rows($id) > 0)
        {
            $userID = mysqli_fetch_assoc($id);
            $getID = $userID["account_id"];
        }
 
        //get post input
        $postDetails = mysqli_real_escape_string($con, $_POST["postDetails"]);
             
        if($postDetails == "")
        {
            echo"<script>
                    alert('No post details.');
                    window.location.href = 'user_forum.php';
                </script>";
        }
        else
        {
            $postInfo = "INSERT INTO
                            post_information(account_id, post_description)
                        VALUES
                            ('".$getID."', '".$postDetails."')";
             
            mysqli_query($con, $postInfo);

            //check if post image is added
            if(isset($_FILES["post_image"]) && count($_FILES["post_image"]["error"]) > 0) 
            {
                foreach($_FILES["post_image"]["error"] as $key => $error) 
                {
                    if ($error == 0) 
                    {
                        $post_image = addslashes(file_get_contents($_FILES["post_image"]["tmp_name"][$key]));

                        $postImage = "INSERT INTO
                            post_images_commentspsot_id, (post_image)
                        VALUES
                            (LAST_INSERT_ID(), '".$post_image."')";

                        mysqli_query($con, $postImage);
                    }
                }
            }

        }
    }

    //upvote
    if(isset($_POST["upvote"]))
    {
        $postID = $_POST["button_value"];
        
        $vote = "UPDATE
                    post_information
                SET
                    votes = votes + 1
                WHERE
                    post_id = $postID";
        
        $voted = mysqli_query($con, $vote);

        if($voted)
        {
            $color = "blue;";
        }
        else
        {
            $color = "";
        }
    }

    //card
    function card($populate)
    {
        include "connection.php";

        echo"<form method='POST' action='user_forum.php'>
                <div style='text-align:left'>
                <div class='profile-image-container'>
                    
                    <div style='image-align:left'>
                    
                    <p style='display:inline-block;'>";
                        
                        if(!empty($populate["account_image"]))
                        {
                            echo "<img src='data:image/jpeg;base64,".base64_encode($populate["account_image"])."' alt='User image' class='forum-image'>";
                        }
                        else
                        {
                            echo "<img src='../assets/user_image_def.png' alt='User image' class='forum-image'>";   
                        }
        echo"
                            ".$populate["account_firstname"]." ".$populate["account_lastname"]."
                    </p>
                            <div style='text-align:left'>
                            <p class='card-text'>".$populate["post_description"]."</p>
                        
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class='img'>";

                            if(!empty($populate["post_image"]))
                            {
                                echo"<img src='data:image/jpeg;base64,".base64_encode($populate["post_image"])."' class='brand-logo' alt='Post image'>";
                            }
                            
        echo"                   </div>
                            <div class='card' style='width: 18rem;'>
                            </div>
                        </div>
                    </div>
                    </div>
                ";
                echo"
                    <br>
                        <div class='text-wrapper-6'> ".$populate["votes"]."
                            <input type='hidden' name='button_value' value='".$populate['post_id']."'>
                            <button type='submit' name='upvote' value='upvote'>Upvote</button>
                        </div>
                        <div class='text-wrapper-7'>
                            <input type='submit' name='comment' value='Comment'>
                        </div>  
                    <button type='submit' name='btnReport' value='".$populate['post_id']."'>Report</button>
                    <br><br>
                
            </form>";
    }

    //report post
    if(isset($_POST["btnReport"]))
    {
        $report_id = $_POST["btnReport"];
        $complaint_details = "";
        $complaint_image = null;
        //mysqli_real_escape_string($con, $_POST["complaint_details"]);

        //check if image is added
        if(isset($_FILES["plant_image"]) && count($_FILES["plant_image"]["error"]) > 0) {
            foreach($_FILES["plant_image"]["error"] as $key => $error) {
                if ($error == 0) {
                    $complaint_image = addslashes(file_get_contents($_FILES["plant_image"]["tmp_name"][$key]));
                }
            }
        }

        $reportQuery = "INSERT INTO
                            complaints(post_id, complaints_details, complaints_image)
                        VALUES
                            (".$report_id.", '".$complaint_details."', '".$complaint_image."' )";

        if(mysqli_query($con, $reportQuery))
        {
            echo "<script>
                alert('Your report has been submitted.');
                window.location.href = 'user_forum.php';
            </script>";
        }
    }

     //display user details
     $query = "SELECT 
                    user_account.account_image, user_account.account_firstname, user_account.account_lastname,
                    subscriptions.subscription_status
                FROM
                    user_account
                INNER JOIN
                    subscriptions ON user_account.account_id = subscriptions.account_id
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
                $subscribed = $profile["subscription_status"];
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