<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_edit_marketplace.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Plant Details</title>
    <link rel="stylesheet" type="text/css" href="../css/user_see_plant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    
    <style>
        

    </style>
</head>
<body>
    <header style="padding:20px;">
       
    <a href="user_marketplace_profile.php"><i class='fas fa-arrow-left' style='font-size:36px; color:orange'></i></a>

       
    
    </header>
    <div class="container">
        <div class="card">
            <form method="POST" enctype="multipart/form-data">
                <div class="image-container"> 
                    <?php
                        displayImages();
                    ?>
                    <br><br>
                
                    <input type="file" name="add_images[]" class="upload-photo" class="fi fi-rr-picture"accept=".jpg, .png, .jpeg" id="image-upload" multiple>

                    <span class="tooltip" id="tooltip">
                        <i class="fi fi-rr-picture"></i>
                    </span>
                </div>
                    <div style="text-align:center;">
                            <p><button type="submit" name="btnRemovePhoto" style="border:none;"> Remove photos </button></p>              
                    </div>
                    <div class="plant-description">
                        <h2>PLANT NAME:</h2>
                            <input type="text" id="plant_name" name="plant_name" required value="<?php echo $plant_name; ?>"><br><br>
                        <h2>Description</h2>
                            <textarea id="description" name="description" rows="4" cols="50" required><?php echo $description; ?></textarea><br><br>
                        <h2>PLANT TYPE:</h2>
                        <select id="plant_type" name="plant_type" required>
                            <option value="flowering" <?php if($plant_type == "flowering"){ echo"selected"; } ?>>Flowering</option>
                            <option value="s&c" <?php if($plant_type == "s&c"){ echo"selected"; } ?>>Succulents & Cacti</option>
                            <option value="fern" <?php if($plant_type == "fern"){ echo"selected"; } ?>>Fern</option>
                            <option value="climber" <?php if($plant_type == "climber"){ echo"selected"; } ?>>Climbers</option>
                            <option value="fruit" <?php if($plant_type == "fruit"){ echo"selected"; } ?>>Fruit Bearing</option>
                            <option value="vegetable" <?php if($plant_type == "vegetable"){ echo"selected"; } ?>>Vegetable Bearing</option>
                            <option value="herbal" <?php if($plant_type == "herbal"){ echo"selected"; } ?>>Herbal</option>
                            <option value="fungi" <?php if($plant_type == "fungi"){ echo"selected"; } ?>>Fungi</option>
                            <option value="carnivorous" <?php if($plant_type == "carnivorous"){ echo"selected"; } ?>>Carnivorous</option>
                            <option value="toxic" <?php if($plant_type == "toxic"){ echo"selected"; } ?>>Toxic</option>
                            <option value="onramental" <?php if($plant_type == "ornamental"){ echo"selected"; } ?>>Ornamental</option>
                        </select><br><br>
                        <h2>Price:</h2><br>
                            ₱ <input type="number" name="price" step=".01" required value="<?php echo $price; ?>"><br><br>    
                    </div>
                    <br><br>
                    <br><br>
                    <button type='submit' name='btnUpdate' class="buy" style="background:#1e5631;color:white;">Update</button>
            </form>
        </div>
    </div>

    

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
    </script>


</body>
</html>