<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_homepage.php";
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

     <style>
 
     </style>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="#">
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
       <a href="#">
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
       <a href="#">
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
              echo $deflt_image;   
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
    <h1 class="colored-text"> <span class="white">S p r</span><span class="orange"> o u t</span> </h1><br>
        <div class="navbar">
    
    <br>
    <!-- <a href="#">Home</a>
    <a href="#">Plant Encyclopedia</a> -->
    
 
        </div>
    </div>
</div>
    </div>
    </form>
    <br>
    <!-- CATEGORIES -->
    <form method="GET" action="user_homepage.php">
        <h2 class="category-label">Categories</h2>
        <div class="box">
      <div class="saple-plants">
        <div class="div">
          
       
        <div class="categories-container">
            
            <div class="category" id="flowering-plants">
                <img src="assets\sampleplant.jpg" class="plant-image"></img>
                <button type="submit" name="floweringPlants">Flowering Plants</button>
                <p>Flowering plants are a type of vascular <p>
                    <p>plant that produces flowers in order to reproduce.</p> 
              
               
            </div>
            <div class="category">
                <button type="submit" name="succulents&cacti">Succulents & Cacti</button>
            </div>
            <div class="category">
                <button type="submit" name="ferns">Ferns</button>
            </div>
            <div class="category">
                <button type="submit" name="climbers">Climbers</button>
            </div>
            <div class="category">
                <button type="submit" name="fruitBearing">Fruit-bearing Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="vegetableBearing">Vegetable-bearing Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="herbal">Herbal Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="fungi">Fungi</button>
            </div>
            <div class="category">
                <button type="submit" name="carnivorous">Carnivorous Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="toxic">Toxic Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="ornamental">Ornamental Plants</button>
            </div>
        </div>
    </form>
        <br>
    <h2 class="category-label">Plants</h2>

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