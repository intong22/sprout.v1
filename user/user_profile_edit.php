<?php

    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_profile_edit.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    <link rel="website icon" type="png" href="assets\logo.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_profile_edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>

</head>

<body>
    <div class="grand-parent">
        <div class="parent">
           
            <div class="back">
                <a href="user_profile.php"><i class="fi fi-rr-arrow-small-left"></i></a>
            </div>
            <div class="title">
                <p>&nbsp&nbsp Sprout | Edit Profile<p>
            </div>

        </div>
        <div class="child-container">
        
        <form method="POST" action="user_profile_edit.php" enctype="multipart/form-data">
            <div class="child1">
                    <?php
                        if($flag == true)
                        {
                            echo $image;
                        }
                        else
                        {
                            echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";
                        }
                        //echo"<input type='file'  name='add_image' accept='.jpg, .jpeg, .png' >";
                    ?>
                

                    <br>
                    <br>

                    <div style="text-align:center;">
                        <h2 class="removeB">&nbsp <?php echo $fname." ".$lname; ?></h2>
                    </div>
            </div>

            <div class="child2">

                <input type="text" name="firstname" placeholder="Firstname" value=<?php echo $fname; ?>>

                <input type="text" name="lastname" placeholder="Lastname" value=<?php echo $lname; ?>>

                <input type="text" name="mobilenumber" placeholder="Mobile Number" value=<?php echo $mobile; ?>>		
                
                <input type="text" name="emailaddress" placeholder="Email Address" value=<?php echo $email; ?> readonly>		
            
                <input type="text" name="homeaddress" placeholder="Home Address" value=<?php echo $address; ?>>		
            
                <input type="text" name="password" placeholder="Password" value=<?php echo $password; ?>>	
                    
                <input type="text" name="newpassword" placeholder="New Password">

                <input type="text" name="confirmpassword" placeholder="Confirm Password">	

                <br>

                <input type="submit" name="save" value="Upload">		                
            </div>
        </form>
    </div>
</body>
</html>