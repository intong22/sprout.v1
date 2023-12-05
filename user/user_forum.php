<?php
  // error_reporting(0);
  include "../backend/bcknd_user_forum.php";
  include "../backend/bcknd_user_profile.php";
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Forum</title>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="stylesheet" href="../css/user_forum.css">
    <link rel="stylesheet" href="../css/user_forums.css">
    <link rel="stylesheet" href="../css/notif.css">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

     
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
  <section class="home-section">
      <header style="padding: 30px;">
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

        </form>
          <div class="icon topright" onclick="toggleNotifi()">
            <img src="../assets/basil_notification-on-solid.png" alt="">  
                <?php
                  if($total != 0)
                  {
                    echo"<span>".$total."</span>";
                  }
                ?>
          </div>
          
          <?php
            notifs();
          ?>

        <br/>
      </header>

      <div class="child-container">
      <div class="child1">
        <div class="container">
          <form method="POST" action="user_forum.php" enctype="multipart/form-data">
            <div class="profile-image-container" onclick="toggleUploadButton()">
              <?php
              if ($flag == true) {
                echo $image;
              } else {
                echo "<img src='../assets/user_image_def.png' alt='User image' class='forum-image' </img>";
              }
              ?>

              <div class="user-details">
                <a href="user_forum_profile.php" style="text-decoration: none;">
                  &nbsp;&nbsp;&nbsp;<div class="name">
                    <?php echo $fname . " " . $lname; ?>
                  </div>
                  <div class="job">
                    <?php echo $status; ?>
                  </div>
                </a>
              </div>
            </div>
            <textarea name="postDetails" class="form-control status-box" rows="4" style="width: 100%;" placeholder="What's on your mind?"
              required></textarea>
            <div class="button-group pull-right">
              <p class="counter"></p>
                <input type="file" name="addPhotos[]" class="btn btn-primary" multiple /><br>
                <button type="submit" name="btnPost" class="btn btn-primary">Post</button>
            </div>
          </form>
        </div>
        
            <?php
              if(isset($_GET["btnSearch"]))
              {
                search();
              }
              else
              {
                postInfo();
              }
            ?>
            
        

</div>
    </section>
    <script src="../js/notif.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Upvote button click
        $("body").on("click", "[name='btnUpvote']", function (e) {
            e.preventDefault();

            var postID = $(this).val();

            $.ajax({
                type: "POST",
                url: "../backend/bcknd_user_forum.php",
                data: { 
                        btnUpvote: true, 
                        button_value: postID 
                      },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        // Update the container with the new HTML
                        $(".container").html(response.html);
                    } else {
                        alert("Failed to upvote. Please try again. " + response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred. Please check the console for details.");
                }
            });
        });
    });
</script>

  
  </body>
</html>
