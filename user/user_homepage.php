<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_homepage.php";
    include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>User Homepage</title>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       <a href="user_settings.php">
         <i class='bx bx-cog' ></i>
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
    <header style="padding:20px;">
    <a href="user_homepage.php" style="text-decoration: none">
      <h1 class="colored-text"> <span class="white">S p r</span><span class="orange"> o u t</span> </h1><br>
    </a>
    <form method="GET" action="user_homepage.php">
            <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
    </form>
       
    <br>    
    </header>
    
</div>
    </div>
  
    <br>
    <!-- CATEGORIES -->
    <form method="GET" action="user_homepage.php">
        <h2 class="category-label" style="margin-left:25px">Categories</h2>
        <div class="box">
      <div class="saple-plants">
        <div class="div">
          
       
        <div class="categories-container">
            
            <div class="category" id="flowering-plants">
                
             
                <button name="floweringPlants" class="button"> Flowering Plants</button>
          
            </div>
            <div class="category">
               
                <button name="succulents&cacti" class="button"> Succulents & Cacti</button>
            </div>
            <div class="category">
               
                <button name="ferns" class="button1"> Ferns</button>
            </div>
            <div class="category">
              
                <button name="climbers" class="button1"> Climbers</button>
            </div>
            <div class="category">
                <button name="fruitBearing" class="button2">Fruit-bearing Plants</button>
            </div>
            <div class="category">
                <button name="vegetableBearing" class="button2">Vegetable-bearing Plants</button>
            </div>
            <div class="category">
                <button name="herbal" class="button">Herbal Plants</button>
            </div>
            <div class="category">
                <button name="fungi" class="button1">Fungi</button>
            </div>
            <div class="category">
                <button name="carnivorous" class="button">Carnivorous Plants</button>
            </div>
            <div class="category">
            <button name="toxic" class="button">Toxic Plants</button>
            </div>
            <div class="category">
                <button name="ornamental" class="button">Ornamental  Plants</button>
            </div>
        </div>
    </form>
        <br>
    <h2 class="category-label" style="margin-left:25px">Plants</h2>

    <!-- PLANTS -->
    <div class="plants">    

        <?php
            if(isset($_GET["btnSearch"]))
            {
                search();
            }
            else
            {
                categories();
            }
        ?>        
    
    </div>
<!-- The tabs container should start here -->

        </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>About Us</h3>
                    <p>We are dedicated to providing you with information about plants and helping you take care of them.</p>
                </div>
                <div class="col-md-6">
                    <h3>Contact Us</h3>
                    <p>Email: @Sprout.com<br>Phone: 123-456-7890</p>
                </div>
            </div>
        </div>
    </footer>
  </section>
 

 
</body>

</html>