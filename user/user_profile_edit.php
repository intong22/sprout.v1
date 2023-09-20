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
            <div class="child1">

                <form method="GET" action="user_profile.php">
                    <img src="static\user_images\user_image_def.png" class="user-image"> </img>
                </form>

                <br>

                <div style="text-align:center;">
                    <form method="POST" action="user_profile.php">
                        <h2 class="removeB">&nbsp Juanita Dela Cruz</h2>
                    </form>
                </div>
            </div>

            <div class="child2">
            <form method="POST" action="user_profile_edit.php">

			<input type="text" name="firstname" placeholder="Firstname">

			<input type="text" name="lastname" placeholder="Lastname">

			<input type="text" name="username" placeholder="Username">

			<input type="text" name="mobilenumber" placeholder="Mobile Number">		
		
			<input type="text" name="emailaddress" placeholder="Email Address">		
	
			<input type="text" name="homeaddress" placeholder="Home Address">		
	
			<input type="text" name="password" placeholder="Password">		

            <input type="text" name="confirmpassword" placeholder="Confirm Password">	

            <br>

			<input type="submit" name="save" href="user_profile.php" value="Save">		
		    </form>
                
            </div>
        <div>
    </div>
</body>
</html>