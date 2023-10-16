<?php
    include "../backend/bcknd_admin_create_encyclopedia.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="../css/admin_manage_user.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            margin: 20px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-left: 32px;
        }

        .form-container {
            margin: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            padding: 0;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
   </style>
</head>
<body>
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
        <h1 style="margin-left: 32px;">Add Encyclopedia</h1>
        <div class="form-container">
          <form action="admin_create_encyclopedia.php" method="POST" enctype="multipart/form-data">
          
            <br>
              <label for="plant_name">PLANT NAME:</label>
              <input type="text" id="plant_name" name="plant_name" required><br><br>
              <label for="plant_name">GENUS NAME:</label>
              <input type="text" id="genus_name" name="genus_name" required><br><br>
              <label for="plant_name">COMMON NAME:</label>
              <input type="text" id="common_name" name="common_name" required><br><br>
              <label for="plant_name">PLANT TYPE:</label>
              <input type="text" id="plant_type" name="plant_type" required><br><br>
              <label for="plant_name">LIGHT:</label>
              <input type="text" id="plant_light" name="plant_light" required><br><br>
              <label for="plant_name">HEIGHT:</label>
              <input type="text" id="plant_height" name="plant_height" required><br><br>
              <label for="plant_name">WIDTH:</label>
              <input type="text" id="plant_width" name="plant_width" required><br><br>
              <label for="plant_name">FLOWER COLOR:</label>
              <input type="text" id="flower_color" name="flower_color" required><br><br>
              <label for="plant_name">FOLIAGE COLOR:</label>
              <input type="text" id="foliage_color" name="foliage_color" required><br><br>
              <label for="plant_name">SEASON:</label>
              <input type="text" id="season_feat" name="season_feat" required><br><br>
              <label for="plant_name">SPECIAL FEATURES:</label>
              <input type="text" id="spec_feat" name="spec_feat" required><br><br>
              <label for="plant_name">ZONES:</label>
              <input type="text" id="plant_zone" name="plant_zone" required><br><br>
              <label for="plant_name">PROPAGATION:</label><br>
              <textarea id="plant_propa" name="propagation" rows="4" cols="50" required></textarea><br><br>

              <label for="description">Description:</label><br>
              <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

              <label for="image_url">Image URL:</label>
              <input type="file" id="image_url" name="plant_image[]" accept=".jpg, .png. jpeg" multiple required>
              
              <br><br>

              <button name="btnSubmit" class="button">Submit</button>
              </div>
          
          </form>

  </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
</body>
</html>
