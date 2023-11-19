<?php

    include "connection.php";

    //count notifs
    $count = "SELECT *
                FROM
                    post_notification
                WHERE
                    viewed = 'false' 
                AND
                    account_id =
                    (SELECT
                        account_id
                    FROM
                        user_account
                    WHERE
                        account_email = '".$_SESSION["username"]."' )";
    
    $total = mysqli_num_rows(mysqli_query($con, $count));

    //get notifs
    function notifs()
    {
        include "connection.php";

        $query = "SELECT
                        post_notification.notification_id, post_notification.notification_user, post_notification.notification_description,
                        admin.admin_display_name
                    FROM
                        post_notification
                    LEFT JOIN
                        admin ON post_notification.admin_id = admin.admin_id 
                    WHERE
                        post_notification.account_id =
                        (
                            SELECT
                                account_id
                            FROM
                                user_account
                            WHERE
                                account_email = '".$_SESSION["username"]."'
                        )
                    AND
                        post_notification.viewed = 0 ";
        
        $exec = mysqli_query($con, $query);

        //count number of notifs
        $total = mysqli_num_rows($exec);
        if($total == 0)
        {
            $total_notifs = "0";
        }
        else
        {
            $total_notifs = $total;
        }

        if(mysqli_num_rows($exec) > 0)
        {
            echo"<div class='notifi-box' id='box'>
                    <h2>Notifications <span>".$total_notifs."</span></h2>";
            while($notifs = mysqli_fetch_assoc($exec))
            {
                //get interactor image
                // $get_image = "SELECT
                //                     account_image
                //                 FROM
                //                     user_account
                //                 WHERE
                //                     account_id = ".$notiifs["account_id"]." ";

                // $results = mysqli_query($con, $get_image);

                //check user image
                if(!empty($img["account_image"]) && !empty($notifs["admin_id"]))
                {
                    $image = '<img src="data:image/jpeg;base64,' . base64_encode($img["account_image"]) . '">';
                }
                else
                {
                    $image = "<img src='../assets/user_image_def.png' alt='img'>";
                }

                //check name
                if(!empty($notifs["admin_display_name"]))
                {
                    $name = $notifs["admin_display_name"];

                    echo"<a href='../user/user_subscription.php?notification_id=".$notifs["notification_id"]." ' style='text-decoration: none;'>
                    <div class='notifi-item' style='height:81px;'>
                        ".$image."
                        <div class='text'>
                            <h4>".$name."</h4>
                            <p>".$notifs["notification_description"]."</p>
                        </div> 
                    </div>
                    </a>";
                }
                else
                {
                    $name = $notifs["notification_user"];

                    echo"<a href='../user/user_open_notif.php?notification_id=".$notifs["notification_id"]."' style='text-decoration: none;'>
                    <div class='notifi-item' style='height:81px;'>
                        ".$image."
                        <div class='text'>
                            <h4>".$name."</h4>
                            <p>".$notifs["notification_description"]."</p>
                        </div> 
                    </div>
                    </a>";
                }
            }
            echo"</div>";
        }
        else
        {
            echo"<div class='notifi-box' id='box'>
                    <h2>Notifications <span>".$total_notifs."</span></h2>";
            echo"<div class='notifi-item' style='height:81px;'>
                        <div class='text'>
                            <h4>No notifications.</h4>
                        </div> 
                    </div>";
            echo"</div>";
        }
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

    //search
    function search()
    {
        include "connection.php";

        if(isset($_GET["btnSearch"]))
        {
            $search_input = $_GET["searchInput"];

            //echo"<center><h1>".$search_input."</h1></center>";  
            
            $search = "SELECT 
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
                            account_firstname LIKE '%$search_input%'
                        OR
                            account_lastname LIKE '%$search_input%'
                        OR
                            post_description LIKE '%$search_input%'
                        GROUP BY 
                            post_information.post_id
                        ORDER BY 
                            votes DESC ";
            
            $exec = mysqli_query($con, $search);

            if (mysqli_num_rows($exec)) 
            {
                while ($populate = mysqli_fetch_assoc($exec)) {
                    card($populate);
                }
            }
        }
    }

    //display card
    function postInfo()
    {
        include "connection.php";

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

            // Get the last inserted post ID
            $lastInsertID = mysqli_insert_id($con);
            
            //check if post image is added
            if(isset($_FILES["addPhotos"]) && count($_FILES["addPhotos"]["error"]) > 0) 
            {
                foreach($_FILES["addPhotos"]["error"] as $key => $error) 
                {
                    if ($error == 0) 
                    {
                        $post_image = addslashes(file_get_contents($_FILES["addPhotos"]["tmp_name"][$key]));

                        $postImage = "INSERT INTO
                            post_images(account_id, post_id, post_image)
                        VALUES
                            (".$getID.", '".$lastInsertID."', '".$post_image."')";

                        mysqli_query($con, $postImage);
                    }
                }
            }

        }
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
        }
    }

    //card
    function card($populate)
    {
        include "connection.php";       

        echo"<form method='POST' action='user_forum.php'>
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
        
        echo"<div class='text-wrapper-6'style='display:flex; justify-content:center; align-items:center; margin-top:10px; margin:5px'> ".$populate["votes"]."
                            <input type='hidden' name='button_value' value='".$populate["post_id"]."'>
                            <button type='submit' name='btnUpvote' >Upvote</button>
                        </div>
                        <div class='text-wrapper-7' style='display:flex; justify-content:center; align-items:center; margin-top:10px; margin:5px'>
                            <input type='text' name='inputComment' placeholder='Comment'>
                            <button type='submit' name='btnComment'  value='".$populate["post_id"]."'>Comment</button>
                        </div>  
                    <button type='submit' name='btnReport' style='display:flex; justify-content:center; align-items:center; margin-top:10px; margin:5px' value='".$populate["post_id"]."'>Report</button>
                    <br>
                    
                    Comments
                    <br>
            ";

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
                        echo"<button type='submit' name='delComment' value='".$post_comments["comment_id"]."' style='border: none;'>Delete</button>";
                    }
                    echo"</p>";
                }
            } 

        echo"</ul>
            </div>
            </form>";
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
            echo"<script>
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
                $image = "<img src='data:image/jpeg;base64,".base64_encode($profile["account_image"])."' alt='User image' class='forum-image' />";
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