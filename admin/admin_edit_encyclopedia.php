<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_edit_encyclopedia.php";
    include "admin_sidebar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="../css/admin_edit_encyclopedia.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
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
   
    <header style="background: #1E5631; padding:10px; color:white">
    <br> <a href="admin_create_encyclopedia.php" style="text-decoration: none;">
        <i class='bx bx-arrow-back arrow-icon'></i>
    </a>
    <h1 style="margin-left: 32px;">Edit Encyclopedia</h1>
   
        </header>
    <br>
<div class="container">
<div class="card">
    <form  method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="image-container">
     
            <?php
                encycImages();
            ?>
            <input type="file" name="add_images[]" class="upload-photo" class="fi fi-rr-picture" accept=".jpg, .png, .jpeg" multiple id="image-upload"><span class="tooltip" id="tooltip"><i class="fi fi-rr-picture"></i></span>
        </div>
        <div style="text-align:center;">
            <p><button type="submit" name="btnRemovePhoto" style="border:none;"> Remove photos </button></p>             
        </div>
        
        <div class="plant-description">
            <div class="form-group">
                <label for="plant_name">PLANT NAME:</label>
                <input type="text" id="plant_name" name="plant_name" required value="<?php echo $plant_name; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">GENUS NAME:</label>
                <input type="text" id="genus_name" name="genus_name" required value="<?php echo $plant_genus_name; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">COMMON NAME:</label>
                <input type="text" id="common_name" name="common_name" required value="<?php echo $common_name; ?>"><br><br>
            </div>
            <label for="plant_name">PLANT CATEGORY:</label>
               
               <div class="checkboxes">

<!-- CHECKBOX -->
 <div class="checkbox-content">
   <div class="column">
     <input type="checkbox" id="flowering" name="plant_type[]" value="flowering" <?php if(in_array("flowering", $plant_category)){ echo "checked"; } ?> >Flowering
     <!-- <label for="flowering">Flowering</label> --><br>
     <input type="checkbox" id="s&c" name="plant_type[]" value="s&c" <?php if(in_array("s&c", $plant_category)){ echo "checked"; } ?> >Succulents & Cacti
     <!-- <label for="s&c">Succulents & Cacti</label> --><br>
     <input type="checkbox" id="fern" name="plant_type[]" value="fern" <?php if(in_array("fern", $plant_category)){ echo "checked"; } ?>>Fern
     <!-- <label for="fern">Fern</label> --><br>
     <input type="checkbox" id="climber" name="plant_type[]" value="climber" <?php if(in_array("climber", $plant_category)){ echo "checked"; } ?>>Climbers
     <!-- <label for="climber">Climbers</label> --><br>
     <input type="checkbox" id="fruit" name="plant_type[]" value="fruit" <?php if(in_array("fruit", $plant_category)){ echo "checked"; } ?>>Fruit Bearing
     <!-- <label for="fruit">Fruit Bearing</label> --><br>
    
    
   </div>

   <div class="column">
   <input type="checkbox" id="vegetable" name="plant_type[]" value="vegetable" <?php if(in_array("vegetable", $plant_category)){ echo "checked"; } ?>>Vegetable Bearing
   <!-- <label for="vegetable">Vegetable Bearing</label> --><br>
     <input type="checkbox" id="herbal" name="plant_type[]" value="herbal" <?php if(in_array("herbal", $plant_category)){ echo "checked"; } ?>>Herbal
     <!-- <label for="herbal">Herbal</label> --><br>
     <input type="checkbox" id="fungi" name="plant_type[]" value="fungi" <?php if(in_array("fungi", $plant_category)){ echo "checked"; } ?>>Fungi
     <!-- <label for="fungi">Fungi</label> --><br>
     <input type="checkbox" id="carnivorous" name="plant_type[]" value="carnivorous" <?php if(in_array("carnivorous", $plant_category)){ echo "checked"; } ?>>Carnivorous
     <!-- <label for="carnivorous">Carnivorous</label> --><br>
     <input type="checkbox" id="toxic" name="plant_type[]" value="toxic" <?php if(in_array("toxic", $plant_category)){ echo "checked"; } ?>>Toxic
     <!-- <label for="toxic">Toxic</label> --><br>
     <input type="checkbox" id="ornamental" name="plant_type[]" value="ornamental" <?php if(in_array("ornamental", $plant_category)){ echo "checked"; } ?>>Ornamental
     <!-- <label for="ornamental">Ornamental</label> --><br>
   </div>
 </div>
</div><br><br>

            <div class="form-group">
                <label for="plant_name">LIGHT REQUIREMENT:</label>
                <input type="text" id="plant_light" name="light" required value="<?php echo $light; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">HEIGHT:</label>
                <input type="text" id="plant_height" name="height" required value="<?php echo $height; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">WIDTH:</label>
                <input type="text" id="plant_width" name="width" required value="<?php echo $width; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">FLOWER COLOR:</label>
                <input type="text" id="flower_color" name="flower_color" required value="<?php echo $flower_color; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">FOLIAGE COLOR:</label>
                <input type="text" id="foliage_color" name="foliage_color" required value="<?php echo $foliage_color; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">SEASON:</label>
                <input type="text" id="season_feat" name="season_ft" required value="<?php echo $season_ft; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">SPECIAL FEATURES:</label>
                <input type="text" id="spec_feat" name="special_ft" required value="<?php echo $special_ft; ?>"><br><br>
            </div>
            <div class="form-group">
                <label for="plant_name">ZONES:</label>
                <input type="text" id="plant_zone" name="zones" required value="<?php echo $zones; ?>"><br><br>
            </div>
            <div class="form-group"> 
                <label for="plant_name">PROPAGATION:</label><br>
                <textarea id="plant_propa" name="propagation" rows="4" cols="50" required><?php echo $propagation; ?></textarea><br><br>
            </div>
            <div class="form-group">
                <label for="plant_description">DESCRIPTION:</label><br>
                <textarea id="plant_propa" name="description" rows="4" cols="50" required><?php echo $plant_description; ?></textarea><br><br>
            </div>
                <button name="btnUpdate" class="button">Update</button>    
        </form>  


    </div>
</div>  

</section>
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
</body>
</html>
