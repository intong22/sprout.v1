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
    

     <style>
      @media only screen and (max-width: 600px) {
    body {
        font-size: 14px;
    }
}
img {
    max-width: 100%;
    height: auto;
}
@media only screen and (max-width: 600px) {
    /* Add responsive styles here */
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
 

  <section class="home-section">
      <header style="padding: 30px;">
        <a href="user_forum.php" style="text-decoration: none">
          <h1 class="colored-text">
            <span class="white">See</span
            ><span class="orange"> Photos</span>
          </h1>
          <br />
        </a>
       
          <div class="icon topright" onclick="toggleNotifi()">
            <img src="../assets/basil_notification-on-solid.png" alt="">  
                <?php
                  if($total != 0)
                  {
                    echo"<span>".$total."</span>";
                  }
                ?>
          </div>
          
        

        <br />
      </header>

      <div class="child-container">
      <div class="child1">
      
           
            <div class="button-group pull-right">
              <p class="counter"></p>
             
                <!--<input type="file" name="addPhotos[]" class="btn btn-primary" multiple>-->
              
            </div>
          </form>
        </div>
        
            <?php
              postInfo();
            ?>

<button id="myBtn">Report</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Make a report:</h2><br><br>
    </div>
    <div class="modal-body">
        <form action="user_marketplace.php" method="POST" enctype="multipart/form-data">
                

                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>


               
                <br><br>

                <button name="btnAddItem" class="button">Report</button>   
                
          </form>   

  </div>

</div>
    </section>
    <script src="../js/notif.js"></script>
    <script src="../js/modal.js"></script>

   

  
  
  </body>
</html>
