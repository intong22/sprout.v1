<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_profile.php";
    include "../backend/bcknd_user_forum.php";
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Community Forum</title>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="stylesheet" href="../css/notif.css">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <style>
        .container {
            width: 80%;
            height: 50%;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .post-box {
            padding: 20px; /* Adjust the padding for more space */
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 70%; /* Adjust the width as needed (e.g., 70%) */
            align-items: center;
        }

        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-avatar {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ccc;
        }

        .user-info {
            margin-left: 20px;
        }

        .post-content {
            margin-top: 10px;
        }

        .like-button {
            display: inline-block;
            cursor: pointer;
        }

        .comment-box {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }

        .comment {
            margin-top: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .profile-image-container {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .profile-image-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #007bff;
        }

        .button-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 5px; /* Adjust the margin as needed */
}

        .profile-image-container input[type="file"] {
            display: none;
        }

        .notification-icon {
            position: absolute;
            right: 20px;
            width: 30px;
            height: 30px;
            cursor: pointer;
            color: orange;
        }

        .material-icons {
            text-align: right;
            margin-right: 20vh;
        }

        .notification-container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }
    </style>

   </head>
 
   

<body>
  <!--SIDEBAR-->
  <div class="sidebar">
    <div class="logo-details">
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
       <i class='bx bx-menu' id="btn" > </i>         
        <div class="logo_name">Sprout</div>
       
    </div>
    <ul class="nav-list">
      <li>
        <a href="user_homepage.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
     <li>
       <a href="user_encyclopedia.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">ENCYCLOPEDIA</span>
     </li>
     <li>
       <a href="user_forum.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
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
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
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
         <i class='bx bxs-badge-dollar'></i>
         <span class="links_name">Subscription</span>
       </a>
       <span class="tooltip">Subscription</span>
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
  
 

  <section class="home-section">
      <header style="padding: 20px;">
        <a href="user_forum.php" style="text-decoration: none">
          <h1 class="colored-text">
            <span class="white">C O M M U N I T Y</span
            ><span class="orange"> F O R U M</span>
          </h1>
          <br />
        </a>
        <form method="GET" action="user_forum.php">

          <input name="searchInput" class="search-input" type="text" placeholder="Search..."/>
          <button name="btnSearch" class="search-button" type="submit">Search</button>
          <div class="icon topright" onclick="toggleNotifi()">
			      <img src="../assets/basil_notification-on-solid.png" alt=""> <span>17</span>
          </div>
          <div class="notifi-box" id="box">
            <h2>Notifications <span>17</span></h2>

            <div class="notifi-item" style="height:81px;">
              <img src="../assets/avatar1.png" alt="img">
              <div class="text">
                <h4>Elias Abdurrahman</h4>
                <p>@lorem ipsum dolor sit amet</p>
                </div> 
            </div>

            <div class="notifi-item" style="height:81px;">
              <img src="../assets/avatar2.png" alt="img">
              <div class="text">
                <h4 style="font-size: 16px;margin-top: 10px;">John Doe</h4>
                <p style="font-size: 12px;">@lorem ipsum dolor sit amet</p>
                </div> 
            </div>

            <div class="notifi-item" style="height:81px;">
              <img src="../assets/avatar3.png" alt="img">
              <div class="text">
                <h4>Emad Ali</h4>
                <p>@lorem ipsum dolor sit amet</p>
                </div> 
            </div>

            <div class="notifi-item" style="height:81px;">
              <img src="../assets/avatar4.png" alt="img">
              <div class="text">
                <h4>Ekram Abu </h4>
                <p>@lorem ipsum dolor sit amet</p>
                </div> 
            </div>

            <div class="notifi-item" style="height:81px;">
              <img src="../assets/avatar5.png" alt="img">
              <div class="text">
                <h4>Jane Doe</h4>
                <p>@lorem ipsum dolor sit amet</p>
                </div> 
            </div>
          </div>

        </form>

        <br />
      </header>

      <div class="child-container">
        <div class="child1">
          <div class="container">
            <form method="POST" action="user_forum.php" enctype="multipart/form-data">
              <div class="profile-image-container" onclick="toggleUploadButton()">
                <?php 
                  if($flag == true)
                  {
                    echo $image; 
                  }
                  else
                  {
                    echo "<img src='../assets/user_image_def.png' alt='User image' class='forum-image' </img>";   
                  } 
                ?> 
               
               <div class="user-details">
                &nbsp;&nbsp;&nbsp;<div class="name"><?php echo $fname . " " . $lname; ?></div>
                <div class="job"><?php echo $status; ?></div>
            </div>
        </div>
              <textarea name="postDetails" class="form-control status-box" rows="5" placeholder="What's on your mind?" required></textarea>
              <div class="button-group pull-right">
                <p class="counter"></p>
                <center>
                  <!--<input type="file" name="addPhotos[]" class="btn btn-primary" multiple>-->
                  <input type="file" name="addPhotos[]" class="btn btn-primary" multiple /><br>
                  <button type="submit" name="btnPost" class="btn btn-primary">Post</button>
                </center>
              </div>
            </form>
          </div>

            <?php
              postInfo();
            ?>
          
        </div>
        <br />
      </div>
    </section>
    <script src="../js/notif.js"></script>
  </body>
</html>
   
  </body>
</html>
