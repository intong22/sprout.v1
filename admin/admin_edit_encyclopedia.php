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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="../css/user_sidebar.css">

    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/swift.css">
<script src="../js/swift.js"></script>

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
.plant-image{
    width:50%;
    height:10%;
    padding:10px;
    align-items: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
    max-width: 800px;
    padding: 20px;

  }
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}
.card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            max-width: 1000px;
        } 
        .checkbox-content {
  display: flex;
  justify-content: space-between;
}

.column {
  width: 48%; /* Adjust the width as needed */
}

input[type="checkbox"] {
  margin-right: 5px;
}

/* Clear floats after the columns */
.checkbox-content::after {
  content: "";
  display: table;
  clear: both;
}

   </style>
</head>
<body>
    <?php
        sidebar();
    ?>
<section class="home-section">
    <br>
    <header style="background: #1E5631; padding:10px; color:white">
    <h1 style="margin-left: 32px;">Edit Encyclopedia</h1>
   
        </header>
    <br>
<div class="container">
<div class="card">
    <form  method="POST" enctype="multipart/form-data">
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

 <div class="checkbox-content">
   <div class="column">
     <input type="checkbox" id="flowering" name="plant_type[]" value="flowering" >Flowering
     <!-- <label for="flowering">Flowering</label> --><br>
     <input type="checkbox" id="s&c" name="plant_type[]" value="s&c" >Succulents & Cacti
     <!-- <label for="s&c">Succulents & Cacti</label> --><br>
     <input type="checkbox" id="fern" name="plant_type[]" value="fern">Fern
     <!-- <label for="fern">Fern</label> --><br>
     <input type="checkbox" id="climber" name="plant_type[]" value="climber" >Climbers
     <!-- <label for="climber">Climbers</label> --><br>
     <input type="checkbox" id="fruit" name="plant_type[]" value="fruit" >Fruit Bearing
     <!-- <label for="fruit">Fruit Bearing</label> --><br>
    
    
   </div>

   <div class="column">
   <input type="checkbox" id="vegetable" name="plant_type[]" value="vegetable" >Vegetable Bearing
   <!-- <label for="vegetable">Vegetable Bearing</label> --><br>
     <input type="checkbox" id="herbal" name="plant_type[]" value="herbal" >Herbal
     <!-- <label for="herbal">Herbal</label> --><br>
     <input type="checkbox" id="fungi" name="plant_type[]" value="fungi" >Fungi
     <!-- <label for="fungi">Fungi</label> --><br>
     <input type="checkbox" id="carnivorous" name="plant_type[]" value="carnivorous">Carnivorous
     <!-- <label for="carnivorous">Carnivorous</label> --><br>
     <input type="checkbox" id="toxic" name="plant_type[]" value="toxic" >Toxic
     <!-- <label for="toxic">Toxic</label> --><br>
     <input type="checkbox" id="ornamental" name="plant_type[]" value="ornamental" >Ornamental
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
   
    </script>
     <script>
                    Swal.fire({
                        title: 'Updated successfully!',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    }).then(() => {
                        
                    });
                </script>";
</body>
</html>
