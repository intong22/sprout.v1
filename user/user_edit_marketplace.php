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
        
.plant-image {
    text-align: center;
}

.plant-description {
    margin-top: 20px;
    font-size: 16px;


}
        h1 {
            margin-left: 32px;
        }

        .form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-top: 10px;
}

input[type="text"],
textarea,
input[type="file"] {
    width: 100%; /* Set the width to 100% to occupy the entire column */
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
        .button1 {
           
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 5vh; 

        }

        button:hover {
            background-color: #45a049;
        }

        .upload-photo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    /* Hide the default file input appearance */
    cursor: pointer;
    /* Show the hand cursor on hover */
}

.tooltip {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.image-container:hover .tooltip {
    opacity: 2;
}
.fi-rr-picture{
    position: relative;
    text-align: center;
    top: 25%;
    left: 50%;
    transform: translate(-50%, -5%);
    display: inline-block;
    opacity: 75%;
    transition: opacity 0.3s;
    background-color: rgba(101, 91, 91, 0.10);
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}
.image-container {
    position: relative;
    display: inline-block;
}

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