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
    <link rel="website icon" type="png" href="../assets/logo.png">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    flex-wrap: wrap;
    justify-content: center;

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
.plant{
 
}
.column {
    float: left;
    width: 50%;
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
  <header style="background: #1E5631; padding:20px">
    <a href="user_encyclopedia.php" style="text-decoration: none;">
        <i class='bx bx-arrow-back arrow-icon'></i>
    </a>
         
    <h1 class="colored-text"><span class="orange">Ho</span><span class="orange">me</span> <span class="white">Page</h1><br>
    
    </header>
   <div class="container">
      <div class="card">
          <form method="POST" enctype="multipart/form-data">
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
        $(document).ready(function() {

            $(document).on('click', '#update', function() {
                Swal.fire({
                    title: 'Item updated successfully!',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(() => {
                    // window.location.href = 'admin_edit_homepage.php?plant_id=".$plant_id."';
                });
            });
        });
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

            // Swal.fire({
            //     title: 'Item updated successfully!',
            //     icon: 'success',
            //     showCancelButton: false,
            //     confirmButtonText: 'OK',
            //     allowOutsideClick: false
            // }).then(() => {
            //     // window.location.href = 'admin_edit_homepage.php?plant_id=<?php echo $plant_id ?>';
            // });
    </script>
<!-- <script src="../js/swift.js"></script> -->
</body>
</html>