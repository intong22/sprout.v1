<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_homepage.php";
    include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>My Favorites</title>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_favorite.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
        <i class='bx bx-menu' id="btn" ></i>
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="user_homepage.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">HOME</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="user_profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="user_forum.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Community Forum</span>
       </a>
       <span class="tooltip">Community Forum</span>
     </li>
     <li>
       <a href="user_encyclopedia.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">Encyclopedia</span>
     </li>
     <li>
       <a href="user_marketplace.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Marketplace</span>
       </a>
       <span class="tooltip">Marketplace</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     <li>
       <a href="user_favorite.php">
       <i class='bx bx-book-bookmark' ></i>
         <span class="links_name">Bookmark</span>
       </a>
       <span class="tooltip">Bookmark</span>
     </li>
     <li>
       <a href="user_like.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
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
            <div class="name_job">
                <div class="name"><?php echo $fname." ".$lname; ?></div>
                <div class="job"><?php echo $status; ?></div>
            </div>
         </div>
         <a href="../backend/session_end.php">
            <i class='bx bx-log-out' id="log_out" ></i>
          </a>
     </li>
    </ul>
  </div>
  
 
    <script src="../js/homepage.js"></script>	

  <section class="home-section">
    <div class="search-bar">
      <h1 class="colored-text header"> <span class="white">S p r</span><span class="orange"> o u t </span><span class="white">| My Favorites</span></h1><br>
        <div class="navbar">   
        </div>
    </div>
    <br>
    <div class="card-container">
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
<div class="card">
  <span>
  <img src="../assets/sampleplant.jpg" alt="Sample Plant" style="width:100%">
  <a href="#"><i class='bx bxs-bookmark' ></i></a>
  </span>
  <h1 class="plantName">Sample Plant</h1>
  <p class="plantDef">Some text about the plants. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
</div>
          </div>
  </section>
  

</body>
</html>