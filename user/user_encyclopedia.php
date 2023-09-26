<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_encyclopedia.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_encyclopedia.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Plant Encyclopedia</title>


    <style>
        
      
.green {
    color: green; 
}

.orange {
    color:orange; 
}
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 5px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
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
<br>
    <h1 class="colored-text"><span class="green">Pl</span><span class="orange">ant </span> Encyclopedia</h1><br>
    <header>
        

  

    </header>
    
    <h3>Popular Plants</h3>
    <div class="container">
        <?php
            popular();
            //unsaon pag limit to 2 lines ra ang
            //ma display sa description?

            //e import lang nya balik ang database
            //kay naa koy ge add didto nga data sa encyclopedia
        ?>

        <div class="plant-card2">
            <img src="flowerr.jpeg" alt="Plant 1" class="plant-image">
            <h2>Plant Name 2</h2>
            <button type="button" class="collapsible">Flower 1</button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div><br>
        </div><br>

        <div class="plant-card3">
            <img src="flowering.jpeg" alt="Plant 1" class="plant-image">
            <h2>Plant Name 3</h2>
            <button type="button" class="collapsible">Flower 2</button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
       
    </div><br><br><br><br>
    <div class="myDiv">
    <h2>Find a topic by its first letter:</h2>

    <button class="button">A</button>
    <button class="button">B</button>
    <button class="button">C</button>
    <button class="button">D</button>
    <button class="button">E</button>
    <button class="button">F</button>
    <button class="button">G</button>
    <button class="button">H</button>
    <button class="button">I</button>
    <button class="button">J</button>
    <button class="button">K</button>
    <button class="button">L</button>
    <button class="button">M</button>
    <button class="button">N</button>
    <button class="button">O</button>
    <button class="button">P</button>
    <button class="button">Q</button>
    <button class="button">R</button>
    <button class="button">S</button>
    <button class="button">T</button>
    <button class="button">U</button>
    <button class="button">V</button>
    <button class="button">W</button>
    <button class="button">X</button>
    <button class="button">Y</button>
    <button class="button">Z</button>
    </div>
</section>

    <script>
        var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </script>
</body>
</html>
