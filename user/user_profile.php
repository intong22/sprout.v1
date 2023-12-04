<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_profile.php";
    include "../backend/bcknd_user_profile_edit.php";
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="website icon" type="png" href="assets\logo.png">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_profile.css">
    <link rel="stylesheet" href="../css/user_prof.css">
    <!-- <link rel="stylesheet" href="../css/user_profile_edit.css"> -->
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <title> User Profile </title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
   
   </style>
</head>
<body>
<div class="sidebar">
<div class="logo-details">
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <i class='bx bx-menu' id="btn" > </i>         
      <div class="logo_name">Sprout</div>  
      </div>
      <ul class="nav-list">
    <li>
      <a href="user_homepage.php">
        <i class='bx bx-home' ></i>
        <span class="links_name">Home</span>
      </a>
      <span class="tooltip">HOME</span>
      </li>
    <li>
    <a href="user_encyclopedia.php">
      <i class='bx bx-book-open' ></i>
        <span class="links_name">Encyclopedia</span>
    </a>
      <span class="tooltip">ENCYCLOPEDIA</span>
    </li>
    <li>
    <a href="user_forum.php">
      <i class='bx bx-chat' ></i>
      <span class="links_name">Community Forum</span>
    </a>
    <span class="tooltip">COMMUNITY FORUM</span>
    </li>
    <li>
    <a href="user_marketplace.php">
      <i class='bx bx-folder' ></i>
      <span class="links_name">Marketplace</span>
    </a>
      <span class="tooltip">MARKETPLACE</span>
    </li>
    <li>
    <a href="user_bookmark.php">
      <i class='bx bx-book-bookmark' ></i>
      <span class="links_name">Bookmark</span>
    </a>
      <span class="tooltip">BOOKMARK</span>
    </li>
    <li>
    <a href="user_like.php">
      <i class='bx bxs-cart-add' ></i>
        <span class="links_name">Cart</span>
    </a>
      <span class="tooltip">CART</span>
    </li>
    <li>
    <a href="user_profile.php">
    <i class='bx bx-user' ></i>
      <span class="links_name">User</span>
    </a>
    <span class="tooltip">USER PROFILE</span>
    </li>
    <li>
    <a href="user_subscription.php">
    <i class='bx bx-dollar' ></i>
      <span class="links_name">Subscription</span>
    </a>
    <span class="tooltip">SUBSCRIPTION</span>
    </li>
     <li class="profile">
         <div class="profile-details">
         <div class="profile-image-container" onclick="toggleUploadButton()">
            <?php 
                if($flag == true)
                {
                  echo $image; 
                }
                else
                {
                  echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";   
                } 
            ?> 
        </div>
            <div class="name_job">
              <div class="name"><?php echo $fname." ".$lname; ?></div>
              <div class="job"><?php echo $status; ?></div>
            </div>
        </div>
		   <a href="../backend/session_end.php">
         <i class='bx bx-log-out' id="log_out" ></i>
		 </a>
		   <span class="tooltip">LOGOUT</span>
     </li>
    </ul>
  </div>
  
<script src="../js/homepage.js"></script>

  <div class="grand-parent">
        <div class="parent">
        <h1 class="colored-text"> <span class="white">S p r</span><span class="orange"> o u t </span><span class="white">| User Profile</span></h1>
        <form method="POST" action="user_profile.php">
        </form> 
      </div>
        <div class="child-container">
            <div class="child1">

            <div class="profile-details">
            <div class="profile-image-container" onclick="toggleUploadButton()">
                    <?php 
                        if($flag == true)
                        {
                            echo $image; 
                        }
                        else
                        { 
          
                            echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";   
                        } 
                    ?> 
                      <input type="file" id="upload-photo" accept="image/*" style="display: none;">
        </div>
        <!-- Button to trigger file input -->
        
        <div class="name_job">
          <br>
            <div class="job"><?php echo $status; ?></div>
        </div>
    </div>
  </form>

                <br>

                <div style="text-align:center;">
                    <form method="POST" action="user_profile.php">
                        <h2 class="removeB">&nbsp <?php echo $fname." ".$lname; ?><a href="user_profile_edit.php">&nbsp<i class="fi fi-rr-pencil"></i></a>
                        </h2>
                    </form>
                </div>

                <br>

                <div style="text-align:center;">
                    <a href="user_history.php" class="removeB">View Purchase History </a>
                </div>

            </div>

          
            <div class="child2">
            <input type="text" name="firstname" placeholder="Firstname" readonly value="<?php echo $fname; ?>">

            <input type="text" name="lastname" placeholder="Lastname" readonly value="<?php echo $lname; ?>">

            <input type="text" name="mobilenumber" placeholder="Mobile Number" readonly value="<?php echo $mobile; ?>">	

            <input type="text" name="emailaddress" placeholder="Email Address" readonly value="<?php echo $email; ?>">		

            <input type="text" name="homeaddress" placeholder="Home Address" readonly value="<?php echo $address; ?>" >
 
            
            </div>
        <div>
    </div>
    <script>
      function toggleUploadButton() {
            var uploadButton = document.getElementById("upload-button");
            var uploadPhoto = document.getElementById("upload-photo");

            if (uploadButton.style.display === "none") {
                uploadButton.style.display = "block";
                uploadPhoto.style.display = "block";
            } else {
                uploadButton.style.display = "none";
                uploadPhoto.style.display = "none";
            }
        }
    </script>
  </body>
</html>
