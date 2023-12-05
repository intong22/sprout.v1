<?php

    include "connection.php";

    if(isset($_GET["post_id"]))
    {
        $post_id = $_GET["post_id"];

        //display card
        function postInfo()
        {
            include "connection.php";

            global $post_id;

            $getQuery = "SELECT 
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
                            post_information.post_id = ".$post_id."
                        GROUP BY 
                            post_information.post_id
                        ORDER BY 
                            votes DESC";

            $exec = mysqli_query($con, $getQuery);

            if (mysqli_num_rows($exec)) 
            {
                while ($populate = mysqli_fetch_assoc($exec)) {
                    card($populate);
                }
            }
        }

        //card
        function card($populate)
        {
            include "connection.php";       

            echo"<div class='container'>
            <ul class='posts'>";
                
            if($_SESSION["username"] == $populate["account_email"])
            {
                    echo "<form method='POST' action='user_forum.php'>
                    <button type='submit' name='btnDelete' value='".$populate["post_id"]."' style='border: none; float: right;'>Delete post</button>
                    </form>";
            }

            echo"<div style='text-align:left'>
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
                                <div style='text-align:center'>
                                <p class='card-text'>".$populate["post_description"]."</p>
                            
                            <div class='row'>
                                <div class='col-md-4'>
                                    <div class='img'>";
                                
                                //post images go here
                                if(!empty($populate["post_image"]))
                                {
                                    postImage($populate);
                                }
                                
            echo"                   </div>
                                <div class='card' style='width: 18rem;'>
                                </div>
                            </div>
                        </div>
                        </div>
                    ";
                    echo"
                        <br><br>";
            
            echo"<div class='text-wrapper-6'style='display:flex; justify-content:left; align-items:left; margin-top:10px; margin:5px'> ".$populate["votes"]."
                            <form method='POST'>
                                <input type='hidden' name='button_value' value='".$populate["post_id"]."'>
                                <button type='submit' name='btnUpvote' >
                                <box-icon type='solid' name='chevron-up-circle'></box-icon>
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                            </form>
                            
                            <div class='text-wrapper-7' style='display:flex; justify-content:left; align-items:left; margin-top:10px; '>
                            <form method='POST'>
                                <input type='text' name='inputComment' placeholder='Comment' required>
                                <button type='submit' name='btnComment'  value='".$populate["post_id"]."'>
                                <box-icon type='solid' name='send'></box-icon>
                                </button>
                            </form>
                            </div> 
                            </div> 

                        <a href='user_submit_report.php?post_id=".$populate["post_id"]."' style='text-decoration: none;'>Report</a>
                        
                        <br>
                        <br>
                        <hr>
                        Comments
                        <br><br>
                ";
            
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
                        echo "<div class='comment-container'>";
                        if(!empty($post_comments["account_image"]))
                        {
                            echo "<p>
                                    <img src='data:image/jpeg;base64,".base64_encode($post_comments["account_image"])."' alt='User image' style='width:5vh; height:5vh;'>";
                        }
                        else
                        {
                            echo"<img src=../assets/user_image_def.png>";
                        }

                        echo $post_comments["account_firstname"]." ".$post_comments["account_lastname"]."<br>";

                        echo $post_comments["post_comment"];

                        if($_SESSION["username"] == $post_comments["account_email"])
                        {
                            echo"&nbsp;&nbsp;&nbsp;
                            <form method='POST'>
                                <button type='submit' name='delComment' value='".$post_comments["comment_id"]."' style='border: none;'>Delete</button>
                            </form>";
                        }
                        echo"</p>";
                        echo "</div>";
                    }
                } 
            echo"</ul>
                </div>";
        }

        //get post images
        function postImage($populate)
        {
            $counter = 0;

            include "connection.php";

            $plant_image = "SELECT
                                post_image
                            FROM
                                post_images
                            WHERE
                                post_id = ".$populate["post_id"]." ";

            $img = mysqli_query($con, $plant_image);

            if(mysqli_num_rows($img) > 0)
            {
                echo"<div class='slideshow-container'>";
                while($image = mysqli_fetch_assoc($img))
                {
                    $counter++;
                    echo"<div class='mySlides fade'>
                            <img src='data:image/jpeg;base64,".base64_encode($image["post_image"])."' alt='Plant image' style='width:100%; height:50vh; align-item:center; border-radius:0;'>
                        </div>";
                }
                echo"
                    <div>
                        <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
                        <a class='next' onclick='plusSlides(1)'>&#10095;</a>
                    </div><br>

                    <div style='text-align:center'>";
                for($i = 0; $i < $counter; $i++)
                {
                    echo"<span class='dot' onclick='currentSlide(".$i.")'></span>";
                }
                echo"</div>
            
                </div>";
            }
        }

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

        $notif = "INSERT INTO
                        post_notification(notification_user, account_id, post_id, notification_description)
                    VALUES
                        (
                            (SELECT
                                CONCAT(account_firstname, ' ', account_lastname) AS name
                            FROM
                                user_account
                            WHERE
                                account_email = '".$_SESSION["username"]."'), 
                            (SELECT 
                                account_id
                            FROM
                                post_information
                            WHERE
                                post_id = ".$postID."), ".$postID.", 'Commented your post.')";
        
        mysqli_query($con, $notif);
    }

    //upvote
    if(isset($_POST["btnUpvote"]))
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
            $notif = "INSERT INTO
                            post_notification(notification_user, account_id, post_id, notification_description)
                        VALUES
                            (
                                (SELECT
                                    CONCAT(account_firstname, ' ', account_lastname) AS name
                                FROM
                                    user_account
                                WHERE
                                    account_email = '".$_SESSION["username"]."'), 
                                (SELECT 
                                    account_id
                                FROM
                                    post_information
                                WHERE
                                    post_id = ".$postID."), ".$postID.", 'Upvoted your post.')";
            mysqli_query($con, $notif);

            // Return updated votes count to the client
            // $updatedVotes = mysqli_fetch_assoc(mysqli_query($con, "SELECT votes FROM post_information WHERE post_id = $postID"));
            // echo json_encode(["success" => true, "votes" => $updatedVotes["votes"]]);
            // exit;
        } 
        // else
        // {
        //     echo json_encode(["success" => false, "message" => "Failed to upvote."]);
        //     exit;
        // }
    }
?>