<?php
  include "../admin_sessions/session_logged_in.php";
  include "../backend/bcknd_admin_home.php";
  include "../backend/bcknd_admin_display_home.php";
  include "admin_sidebar.php";
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
    <link rel="stylesheet" href="../css/swift.css">
<script src="../js/swift.js"></script>

   
</head>

<body>
  <?php
    sidebar();
  ?>
  
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

    <script>
        Swal.fire({
            title: 'Item created successfully!',
            icon: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(() => {
            // window.location.href = 'admin_edit_homepage.php?plant_id=".$plant_id."';
        });
    </script>
    
</body>
</html>
