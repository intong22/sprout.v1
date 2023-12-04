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
<style>
  
</style>

   
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
            
          <form action="admin_home.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
          
              <br>
              <label for="plant_name">PLANT NAME:</label>
              <input type="text" id="plant_name" name="plant_name" required><br><br>
              <label for="plant_name">PLANT CATEGORY:</label>
               
               <div class="checkboxes">

<!-- CHECKBOX -->
 <div class="checkbox-content">
   <div class="column">
     <input type="checkbox" id="flowering" name="plant_type[]" value="flowering" onchange="updateButtonText()">
     <label for="flowering">Flowering</label><br>

     <input type="checkbox" id="s&c" name="plant_type[]" value="s&c" onchange="updateButtonText()">
     <label for="s&c">Succulents & Cacti</label><br>

     <input type="checkbox" id="fern" name="plant_type[]" value="fern" onchange="updateButtonText()">
     <label for="fern">Fern</label><br>

     <input type="checkbox" id="climber" name="plant_type[]" value="climber" onchange="updateButtonText()">
     <label for="climber">Climbers</label><br>

     <input type="checkbox" id="fruit" name="plant_type[]" value="fruit" onchange="updateButtonText()">
     <label for="fruit">Fruit Bearing</label><br>
     <input type="checkbox" id="vegetable" name="plant_type[]" value="vegetable" onchange="updateButtonText()">
     <label for="vegetable">Vegetable Bearing</label><br>
   </div>

   <div class="column">
     
     <input type="checkbox" id="herbal" name="plant_type[]" value="herbal" onchange="updateButtonText()">
     <label for="herbal">Herbal</label><br>

     <input type="checkbox" id="fungi" name="plant_type[]" value="fungi" onchange="updateButtonText()">
     <label for="fungi">Fungi</label><br>

     <input type="checkbox" id="carnivorous" name="plant_type[]" value="carnivorous" onchange="updateButtonText()">
     <label for="carnivorous">Carnivorous</label><br>

     <input type="checkbox" id="toxic" name="plant_type[]" value="toxic" onchange="updateButtonText()">
     <label for="toxic">Toxic</label><br>

     <input type="checkbox" id="ornamental" name="plant_type[]" value="ornamental" onchange="updateButtonText()">
     <label for="ornamental">Ornamental</label><br>
   </div>
 </div>
</div><br><br>
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
      function validateForm() {
            // Get all checkboxes with the name "plant_type[]"
            var checkboxes = document.getElementsByName("plant_type[]");

            // Check if at least one checkbox is checked
            var isChecked = false;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            // Display an alert if no checkbox is checked
            if (!isChecked) {
                alert("Please select at least one plant category.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>
    
</body>
</html>
