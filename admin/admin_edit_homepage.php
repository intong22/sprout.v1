<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_edit_homepage.php";
    include "admin_sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Edit</title>
    
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/admin_edit_homepage.css">
    <link rel="website icon" type="png" href="../assets/logo.png">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/swift.css">
<script src="../js/swift.js"></script>

</head>

<body>

  <?php
    sidebar();
  ?>
  <section class="home-section">
  <header style="background: #1E5631; padding:20px">
    <a href="user_encyclopedia.php" style="text-decoration: none;">
        <i class='bx bx-arrow-back arrow-icon'></i>
    </a>
         
    <h1 class="colored-text"><span class="orange">Ho</span><span class="orange">me</span> <span class="white">Page</h1><br>
    
    </header>
   <div class="container">
      <div class="card">
          <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
          <div class="image-container">
                  <?php
                    displayImages();
                  ?>
                  <input type="file" name="add_images[]" class="upload-photo" class="fi fi-rr-picture"accept=".jpg, .png, .jpeg" id="image-upload" multiple>
                  <span class="tooltip" id="tooltip"><i class="fi fi-rr-picture"></i></span>
           </div>
            <div style="text-align:center;">
                <p><button type="submit" name="btnRemovePhoto" style="border:none;"> Remove photos </button></p>             
            </div>

                 <div class="plant-description">
                   <!-- <form method="POST"> -->
                      <label for="plant_name">PLANT NAME:</label>
                      <input type="text" id="plant_name" name="plant_name" required value="<?php echo $plant_name; ?>"><br><br>
                      <label for="plant_name">GENUS NAME:</label>
                      <input type="text" id="genus_name" name="genus_name" required value="<?php echo $genus_name; ?>"><br><br>
                      <label for="plant_name">PLANT CATEGORY:</label>
               
               <div class="checkboxes">

<!-- CHECKBOX -->
 <div class="checkbox-content">
   <div class="column">
     <input type="checkbox" id="flowering" name="plant_type[]" value="flowering" onchange="updateButtonText()" <?php if(in_array("flowering", $plant_category)){ echo "checked"; } ?>>
     <label for="flowering">Flowering</label><br>

     <input type="checkbox" id="s&c" name="plant_type[]" value="s&c" onchange="updateButtonText()" <?php if(in_array("s&c", $plant_category)){ echo "checked"; } ?>>
     <label for="s&c">Succulents & Cacti</label><br>

     <input type="checkbox" id="fern" name="plant_type[]" value="fern" onchange="updateButtonText()" <?php if(in_array("fern", $plant_category)){ echo "checked"; } ?>>
     <label for="fern">Fern</label><br>

     <input type="checkbox" id="climber" name="plant_type[]" value="climber" onchange="updateButtonText()" <?php if(in_array("climber", $plant_category)){ echo "checked"; } ?>>
     <label for="climber">Climbers</label><br>

     <input type="checkbox" id="fruit" name="plant_type[]" value="fruit" onchange="updateButtonText()" <?php if(in_array("fruit", $plant_category)){ echo "checked"; } ?>>
     <label for="fruit">Fruit Bearing</label><br>

     <input type="checkbox" id="vegetable" name="plant_type[]" value="vegetable" onchange="updateButtonText()" <?php if(in_array("vegetable", $plant_category)){ echo "checked"; } ?>>
     <label for="vegetable">Vegetable Bearing</label><br>
   </div>

   <div class="column">
     
     <input type="checkbox" id="herbal" name="plant_type[]" value="herbal" onchange="updateButtonText()" <?php if(in_array("herbal", $plant_category)){ echo "checked"; } ?>>
     <label for="herbal">Herbal</label><br>

     <input type="checkbox" id="fungi" name="plant_type[]" value="fungi" onchange="updateButtonText()" <?php if(in_array("fungi", $plant_category)){ echo "checked"; } ?>>
     <label for="fungi">Fungi</label><br>

     <input type="checkbox" id="carnivorous" name="plant_type[]" value="carnivorous" onchange="updateButtonText()" <?php if(in_array("carnivorous", $plant_category)){ echo "checked"; } ?>>
     <label for="carnivorous">Carnivorous</label><br>

     <input type="checkbox" id="toxic" name="plant_type[]" value="toxic" onchange="updateButtonText()" <?php if(in_array("toxic", $plant_category)){ echo "checked"; } ?>>
     <label for="toxic">Toxic</label><br>

     <input type="checkbox" id="ornamental" name="plant_type[]" value="ornamental" onchange="updateButtonText()" <?php if(in_array("ornamental", $plant_category)){ echo "checked"; } ?>>
     <label for="ornamental">Ornamental</label><br>
   </div>
 </div>
</div><br><br>
<br><br>
                      <label>Soil Reccomendation</label>
                        <textarea name="soil_recco" required><?php echo $soil_recco; ?></textarea>
                        <br><br>
                      <label>Water Reccomendation</label>
                        <textarea name="water_recco" required><?php echo $water_recco; ?></textarea>
                        <br><br>
                      <label>Sunlight Reccomendation</label>
                        <textarea name="sunlight_recco" required><?php echo $sunlight_recco; ?></textarea>
                        <br><br>
                      <label>Plant Care Tips</label>
                        <textarea name="tips" required><?php echo $tips; ?></textarea>
                      <br><br>
                      <label>Plant Details</label>
                        <textarea name="details" required><?php echo $details; ?></textarea>
                      <br><br>
                      <button name="btnUpdate" class="button">Update</button>        
          </form>   
          
      </div>
    </div>

</section>

<script src="../js/see_plant.js"></script>	

    <script>
        document.getElementById('image-upload').addEventListener('change', function () {
                const fileInput = this;
                const tooltip = document.getElementById('tooltip');
                
                if (fileInput.files.length > 0) {
                    // Display all file names
                    tooltip.textContent = Array.from(fileInput.files).map(file => file.name).join(', ');
                } else {
                    tooltip.textContent = 'Upload Photo';
                }
            });

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
<!-- <script src="../js/swift.js"></script> -->
</body>
</html>