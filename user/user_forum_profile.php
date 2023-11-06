<?php
  //error_reporting(0);
  include "../backend/session_logged_in.php";
  include "../backend/bcknd_user_forum_profile.php";
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
      width: 40%;
      height: 50%;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-top: 20px;
    }

    /* .post-box {
            padding: 20px; 
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 70%; 
            align-items: center;
        } */

    .post-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .user-avatar {
      width: 10px;
      height: 10px;
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
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #007bff;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 5px;
    }

    .profile-image-container input[type="file"] {
      display: none;
      width: 80px;
      height: 80px;
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


    .slideshow-container {
      max-width: 500px;
      position: relative;
      margin: auto;
    }


    .mySlides {
      display: none;
    }

    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      text-align: left;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }
  </style>

</head>



<body>
  <!--SIDEBAR-->
  <div class="sidebar">
    <div class="logo-details">
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
      <i class='bx bx-menu' id="btn"> </i>
      <div class="logo_name">Sprout</div>
    </div>
    <ul class="nav-list">
      <li>
        <a href="user_homepage.php">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">HOME</span>
      </li>
<<<<<<< HEAD
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
             <input type="file" id="upload-photo" accept="image/*" style="display: none;">
        </div>
        <!-- Button to trigger file input -->
        <label for="upload-photo" id="upload-button" class="upload-button">
            <i class="bx bx-camera"></i> Upload Profile 
        </label>
            <div class="name_job">
              <div class="name"><?php echo $fname." ".$lname; ?></div>
              <div class="job"><?php echo $status; ?></div>
=======
      <li>
        <a href="user_encyclopedia.php">
          <i class='bx bx-book-open'></i>
          <span class="links_name">Encyclopedia</span>
        </a>
        <span class="tooltip">ENCYCLOPEDIA</span>
      </li>
      <li>
        <a href="user_forum.php">
          <i class='bx bx-chat'></i>
          <span class="links_name">Community Forum</span>
        </a>
        <span class="tooltip">COMMUNITY FORUM</span>
      </li>
      <li>
        <a href="user_marketplace.php">
          <i class='bx bx-folder'></i>
          <span class="links_name">Marketplace</span>
        </a>
        <span class="tooltip">MARKETPLACE</span>
      </li>
      <li>
        <a href="user_bookmark.php">
          <i class='bx bx-book-bookmark'></i>
          <span class="links_name">Bookmark</span>
        </a>
        <span class="tooltip">BOOKMARK</span>
      </li>
      <li>
        <a href="user_like.php">
          <i class='bx bxs-cart-add'></i>
          <span class="links_name">Cart</span>
        </a>
        <span class="tooltip">CART</span>
      </li>
      <li>
        <a href="user_profile.php">
          <i class='bx bx-user'></i>
          <span class="links_name">User</span>
        </a>
        <span class="tooltip">USER PROFILE</span>
      </li>
      <li>
        <a href="user_subscription.php">
          <i class='bx bx-dollar'></i>
          <span class="links_name">Subscription</span>
        </a>
        <span class="tooltip">Subscription</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <div class="profile-image-container" onclick="toggleUploadButton()">
            <?php
            if ($flag == true) {
              echo $image;
            } else {
              echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";
            }
            ?>
          </div>
          <div class="name_job">
            <div class="name">
              <?php echo $fname . " " . $lname; ?>
>>>>>>> fc5c56d6ca60cd79166810a5f3dfb8a5a8a50495
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
    <header style="padding: 20px;">
      <a href="user_forum.php" style="text-decoration: none">
        <h1 class="colored-text">
          <span class="white">M Y </span><span class="orange"> P O S T S</span>
        </h1>
        <br />
      </a>
      <form method="GET" action="user_forum.php">

        <input name="searchInput" class="search-input" type="text" placeholder="Search..." />
        <button name="btnSearch" class="search-button" type="submit">Search</button>

      </form>

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
            <textarea name="postDetails" class="form-control status-box" rows="5" placeholder="What's on your mind?"
              required></textarea>
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
          forumProfile();
        ?>

  </section>


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

    function showSlides(n) {
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