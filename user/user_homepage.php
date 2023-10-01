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

     <style>
    .button {
    background-color: #1E5631;
    border: 1px;
    border-radius: 8px;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    margin: 4px 5px;
    margin-top: 10px;
    cursor: pointer;
    }
    
   
    .button:hover {
    background-color: orange; /* Green */
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
    .button1 {
    background-color: #1E5631;
    border: 1px;
    border-radius: 8px;
    color: white;
    padding: 20px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    justify-content: center;
    font-size: 16px;
    font-weight: bold;
    margin: 4px 5px;
    margin-top: 10px;
    cursor: pointer;
    }
    
   
    .button1:hover {
    background-color: orange; /* Green */
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
    .button2 {
    background-color: #1E5631;
    border: 1px;
    border-radius: 8px;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    margin: 4px 5px;
    margin-top: 10px;
    cursor: pointer;
    }
    
   
    .button2:hover {
    background-color: orange; /* Green */
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
    .button2{
      width:200px;
    }
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
                
             
                <a href='#' class="button"> Flowering Plants</a>
          
            </div>
            <div class="category">
               
                <a href='#' class="button"> Succulents & Cacti</a>
            </div>
            <div class="category">
               
                <a href='#' class="button1"> Ferns</a>
            </div>
            <div class="category">
                <!-- <button type="submit" name="climbers">Climbers</button> -->
                <a href='#' class="button1"> Climbers</a>
            </div>
            <div class="category">
                <!-- <button type="submit" name="fruitBearing">Fruit-bearing Plants</button> -->
                <a href='#' class="button2">Fruit-bearing Plants</a>
            </div>
            <div class="category">
                <!-- <button type="submit" name="vegetableBearing"></button> -->
                <a href='#' class="button2">Vegetable-bearing Plants</a>
            </div>
            <div class="category">
                <!-- <button type="submit" name="herbal">Herbal Plants</button> -->
                <a href='#' class="button">Herbal Plants</a>
            </div>
            <div class="category">
                <!-- <button type="submit" name="fungi">Fungi</button> -->
                <a href='#' class="button1">Fungi</a>
            </div>
            <div class="category">
                <!-- <button type="submit" name="carnivorous">Carnivorous Plants</button> -->
                <a href='#' class="button">Carnivorous Plants</a>
            </div>
            <div class="category">
            <a href='#' class="button">Carnivorous Plants</a>
               
            </div>
            <div class="category">
                <!-- <button type="submit" name="ornamental">Ornamental Plants</button> -->
                <a href='#' class="button">Ornamental  Plants</a>
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