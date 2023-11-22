<?php
  include "../admin_sessions/session_logged_in.php";
  include "../backend/bcknd_admin_home.php";
  include "../backend/bcknd_admin_display_home.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="../css/admin_home.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   
</head>

<body>
<div class="sidebar">
    <div class="logo-details">
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="admin_home.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">HOME</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="admin_manage_user.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="admin_manage_post.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Posts</span>
       </a>
       <span class="tooltip">Posts</span>
     </li>
     <li>
       <a href="admin_create_encyclopedia.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">Encyclopedia</span>
     </li>
     <li>
       <a href="admin_manage_report.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Reports</span>
       </a>
       <span class="tooltip">Reports</span>
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
       <a href="admin_subscriptions.php">
         <i class='bx bxs-badge-dollar'></i>
         <span class="links_name">Subscription</span>
       </a>
       <span class="tooltip">Subscription</span>
     </li>
     <li class="profile">
         <div class="profile-details">
            <div class="name_job">
                <div class="name">Admin</div>
                <!-- <div class="job"><?php echo $status; ?></div> -->
            </div>
         </div>
         <a href="../admin_sessions/session_end.php">
            <i class='bx bx-log-out' id="log_out" ></i>
          </a>
     </li>
    </ul>
  </div>
  <script src="../js/homepage.js"></script>	
  <section class="home-section">
    <header>
        <br><h1 style="margin-left: 35px; color:white;height:80px;">Dashboard</h1>
    </header> 
    
    <br>
    <form method="GET" action="admin_home.php">
            <input type="text" name="searchInput" class="search-input" style="width:50%" placeholder="Search...">
            <button type="submit" hidden name="btnSearch" class="search-button">Search</button>
    </form><br>

      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#homeModal">
        Create
    </button>

    <div class="plants">
      <?php
        if(isset($_GET["btnSearch"]))
        {
          search();
        }
        else
        {
          
          deflt();
        }
      ?>
    </div>
  </section>
  <div class="modal fade" id="homeModal" tabindex="-1" role="dialog" aria-labelledby="homeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="colored-text" id="homeModalLabel"><span class="green">Add</span> <span class="orange">Plant</span></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            
          <form action="admin_home.php" method="POST" enctype="multipart/form-data">
          
              <br>
              <label for="plant_name">PLANT NAME:</label>
              <input type="text" id="plant_name" name="plant_name" required><br><br>
              <label for="plant_category">PLANT CATEGORY:</label>
              <select id="plant_category" name="plant_category" required>
                <option value="flowering">Flowering</option>
                <option value="s&c">Succulents & Cacti</option>
                <option value="fern">Fern</option>
                <option value="climber">Climbers</option>
                <option value="fruit">Fruit Bearing</option>
                <option value="vegetable">Vegetable Bearing</option>
                <option value="herbal">Herbal</option>
                <option value="fungi">Fungi</option>
                <option value="carnivorous">Carnivorous</option>
                <option value="toxic">Toxic</option>
                <option value="onramental">Ornamental</option>
              </select><br><br>
              <label for="genus_name">GENUS NAME:</label>
              <input type="text" id="genus_name" name="genus_name" required><br><br>
              <label for="plant_information">PLANT DETAILS:</label>
              <input type="text" id="plant_information" name="plant_details" required><br><br>
              <label for="plant_soil_recco">PLANT SOIL RECCOMENDATION:</label>
              <input type="text" id="plant_soil_recco" name="plant_soil_recco" required><br><br>
              <label for="plant_water_recco">PLANT WATER RECCOMENDATION:</label>
              <input type="text" id="plant_water_recco" name="plant_water_recco" required><br><br>
              <label for="plant_sunlight_recco">PLANT SUNLIGHT RECCOMENDATION:</label>
              <input type="text" id="plant_sunlight_recco" name="plant_sunlight_recco" required><br><br>
              <label for="plant_care_tips">PLANT CARE TIPS:</label>
              <textarea id="plant_care_tips" name="plant_care_tips" required></textarea><br><br>

              <label for="image_url">Images:</label>
              <input type="file" id="image_url" name="plant_image[]" accept=".jpg, .png, .jpeg" multiple required>
              
              <br><br>

              <button name="btnSubmit" class="button">Submit</button>          
          </form>
      
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
</body>
</html>
