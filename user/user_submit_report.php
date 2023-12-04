<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_submit_report.php";
    include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_submit.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Report</title>
    <style>
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

    <!-- form for comlaint details -->
    <section class="home-section">
      <div class="card">
        <img src="../assets/report.png">
        <br>
        <p>We appreciate your concern. We aim to provide all our users with a great experience. You report can help keep our app safe.</p>
        
        <p>Please provide details to your report for fast review. Your report will be submitted and reviewed by the admin. Once a violation has been made, proper actions shall be taken.</p>

        <form method="POST" enctype="multipart/form-data">
            <textarea id="description" name="description" rows="4" required placeholder="Description..."></textarea><br><br>

            <input type="file" name="addReportPhotos" class="btn btn-primary"/><br><br><br>

            <button type="submit" name="btnReport" class="button">Report</button> 
        </form>
      </div>
    </section>      
</body>

</html>