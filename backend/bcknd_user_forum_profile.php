<?php

    include "connection.php";

    //add comment
    if(isset($_POST["btnComment"]))
    {
        $postID = $_POST["btnComment"];
        $comment = mysqli_real_escape_string($con, $_POST["inputComment"]);

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

        $commentQuery = "INSERT INTO
                                    post_comments(account_id, post_id, post_comment)
                                VALUES
                                    (".$getID.", ".$postID.", '".$comment."')";

        mysqli_query($con, $commentQuery);
    }

    //delete post
    if(isset($_POST["btnDelete"]))
    {
        $postID = $_POST["btnDelete"];

        $deletePost = "DELETE FROM
                            post_information
                        WHERE
                            post_id = ".$postID." ";
        
        mysqli_query($con, $deletePost);
    }

    //delete comment
    if(isset($_POST["delComment"]))
    {
        $id = $_POST["delComment"];
        
        $del = "DELETE FROM
                    post_comments
                WHERE
                    comment_id = ".$id." ";
        
        mysqli_query($con, $del);
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
                    account_email = '".$_SESSION["username"]."' ";

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

    if($subscribed == 'P')
    {
        $status = "Premium User";
    }
    else if($subscribed == 'B')
    {
        $status = "Basic User";
    }
    else if($subscribed == 'R')
    {
         $status = "Requesting";
    }

    
    //forum profile card
    function forumProfile()
    {
        include "connection.php";
        //get user posts
        $getPosts = "SELECT 
                        user_account.account_email, user_account.account_image, user_account.account_firstname, user_account.account_lastname, 
                        post_information.post_id, post_information.post_description, post_information.votes,
                        MAX(post_images.post_image) AS post_image
                    FROM 
                        user_account
                    INNER JOIN 
                        post_information ON user_account.account_id = post_information.account_id
                    LEFT JOIN 
                        post_images ON post_information.post_id = post_images.post_id
                    WHERE
                        account_email = '".$_SESSION["username"]."'
                    GROUP BY 
                        post_information.post_id ";
        
        $exec = mysqli_query($con, $getPosts);
        if(mysqli_num_rows($exec))
        {
            while($populate = mysqli_fetch_assoc($exec))
            {
                card($populate);
            }
        }
    }

    //card
    function card($populate)
    {
        include "connection.php";       

        echo"<form method='POST' action='user_forum_profile.php'>
          <div class='container'>
           <ul class='posts'>";

           if($_SESSION["username"] == $populate["account_email"])
           {
                echo "<button type='submit' name='btnDelete' value='".$populate["post_id"]."' style='border: none; float: right;'>Delete post</button>";
           }

        echo"        <div style='text-align:left'>
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
                    <br>";

        //comments go here
        //get comments
        $comments = "SELECT
                        user_account.account_image, user_account.account_email, user_account.account_firstname, user_account.account_lastname,
                        post_comments.comment_id, post_comments.account_id, post_comments.post_comment
                    FROM
                        user_account
                    INNER JOIN
                        post_comments ON post_comments.account_id = user_account.account_id
                    WHERE
                        post_id = '".$populate["post_id"]."' ";

        $getComments = mysqli_query($con, $comments);

            if (mysqli_num_rows($getComments) > 0) 
            {
                while ($post_comments = mysqli_fetch_assoc($getComments)) 
                {
                    if(!empty($post_comments["account_image"]))
                    {
                        echo "<p>
                        <img src='data:image/jpeg;base64,".base64_encode($post_comments["account_image"])."' alt='User image'>";
                    }
                    else
                    {
                        echo"<img src=../assets/user_image_def.png>";
                    }
                    echo $post_comments["account_firstname"]." ".$post_comments["account_lastname"];
                    echo $post_comments["post_comment"];
                    
                    if($_SESSION["username"] == $post_comments["account_email"])
                    {
                        echo"<button type='submit' name='delComment' value='".$post_comments["comment_id"]."' style='border: none;'>Delete</button>";
                    }
                    echo"</p>";
                }
            } 
        

        echo"                <div class='text-wrapper-6'> ".$populate["votes"]."
                            <input type='hidden' name='button_value' value='".$populate["post_id"]."'>
                            <button type='submit' name='upvote' value='upvote'>Upvote</button>
                        </div>
                        <div class='text-wrapper-7'>
                            <input type='text' name='inputComment' placeholder='Comment'>
                            <button type='submit' name='btnComment'  value='".$populate["post_id"]."'>Comment</button>
                        </div>  
                    <button type='submit' name='btnReport' value='".$populate["post_id"]."'>Report</button>
                    <br><br>
            </ul>
            </div>
            </form>";
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