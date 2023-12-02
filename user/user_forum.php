<?php
    include "../backend/session_logged_in.php";
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
    <link rel="stylesheet" href="../css/notif.css">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
    
    

     <style>
      .profile-image-container img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
   
}
      @media only screen and (max-width: 600px) {
    body {
        font-size: 14px;
    }
}
img {
    max-width: 100%;
    height: auto;
    border:none;
}
@media only screen and (max-width: 600px) {
    /* Add responsive styles here */
}
.tooltip {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}
button[name="btnUpvote"], button[name="btnComment"]{
background-color: transparent;
color: white;
padding: 5px 10px;
border: none;
cursor: pointer;
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
          if ($flag == true) 
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
          <div class="name">
            <?php echo $fname . " " . $lname; ?>
          </div>
          <div class="job">
            <?php echo $status; ?>
          </div>
        </div>
      </div>
      <a href="../backend/session_end.php">
        <i class='bx bx-log-out' id="log_out"></i>
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

        <br />
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
             
                <!--<input type="file" name="addPhotos[]" class="btn btn-primary" multiple>-->
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
   
 <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) 
    {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) { slideIndex = 1 }
      if (n < 1) { slideIndex = slides.length }

      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
    
  </script>
  
  </body>
</html>
