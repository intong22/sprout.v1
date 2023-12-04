<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_create_encyclopedia.php";
    include "../backend/bcknd_admin_display_encyclopedia.php";
    include "admin_sidebar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_encyclopedia.css">
    <link rel="stylesheet" href="../css/admin_create_encyclopedia.css">

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
    
    <header style="background: #1E5631; padding:1rem 0; color:white">
    <br>
    <h1 style="margin-left: 32px;">Add Encyclopedia</h1><br>
    <form method="GET" action="admin_create_encyclopedia.php">
    <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
    </form>
        </header>
    <br>
    <button type="button" style="margin-left:6vh" class="btn btn-success" data-toggle="modal" data-target="#createModal">
        Create
    </button> <br>

    <?php
        if(isset($_GET["btnSearch"]))
        {
            search();
        }
        else
        {
            plants();
        }
    ?>
</section>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="colored-text" id="createModalLabel"><span class="green">Add</span> <span class="orange">Plant</span></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

        <form action="admin_create_encyclopedia.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <label for="plant_name">PLANT NAME:</label>
                <input type="text" id="plant_name" name="plant_name" required><br><br>
                <label for="plant_name">GENUS NAME:</label>
                <input type="text" id="genus_name" name="genus_name" required><br><br>
                <label for="plant_name">COMMON NAME:</label>
                <input type="text" id="common_name" name="common_name" required><br><br>
                <label for="plant_name">PLANT CATEGORY:</label>
               
                <div class="checkboxes">

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
                <textarea id="plant_propa" name="propagation" rows="4" required style="width: 100%;"></textarea><br><br>

                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="4" required style="width: 100%;"></textarea><br><br>

                <label for="image_url">Image URL:</label>
                <input type="file" id="image_url" name="plant_image[]" accept=".jpg, .png, .jpeg" multiple required>
                <br><br>

                <button name="btnSubmit" class="button" style="background-color:green;width:75px;color:white">Submit</button>   
                
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
