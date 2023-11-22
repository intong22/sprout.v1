<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_edit_encyclopedia.php";
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
    <link rel="stylesheet" href="../css/user_encyclopedia.css">
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
        width: 80%;
        margin: 50px auto;
        padding: 30px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

        h1 {
            margin-left: 32px;
        }

        label {
            font-weight: bold;
    display: block;
    margin-top: 10px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 50%;
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

        * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}


/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
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
    opacity: 1;
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
    margin: auto;
}
   </style>
</head>
<body>

<div class="sidebar">
    <div class="logo-details">
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="admin_home.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">HOME</span>
            </a>
            <span class="tooltip">HOME</span>
        </li>
        <li>
            <a href="admin_manage_user.php">
                <i class='bx bx-user'></i>
                <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>
        <li>
            <a href="admin_manage_post.php">
                <i class='bx bx-chat'></i>
                <span class="links_name">Posts</span>
            </a>
            <span class="tooltip">Posts</span>
        </li>
        <li>
            <a href="admin_create_encyclopedia.php">
                <i class='bx bx-pie-chart-alt-2'></i>
                <span class="links_name">Encyclopedia</span>
            </a>
            <span class="tooltip">Encyclopedia</span>
        </li>
        <li>
            <a href="admin_manage_report.php">
                <i class='bx bx-folder'></i>
                <span class="links_name">Reports</span>
            </a>
            <span class="tooltip">Reports</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cart-alt'></i>
                <span class="links_name">Order</span>
            </a>
            <span class="tooltip">Order</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-heart'></i>
                <span class="links_name">Saved</span>
            </a>
            <span class="tooltip">Saved</span>
        </li>
        <li>
            <a href="admin_subscriptions.php">
                <i class='bx bxs-badge-dollar'></i>
                <span class="links_name">Subscription</span>
            </a>
            <span class="tooltip">Subscription</span>
        </li>
     <li class="profile">
         <div class="profile-details">
            <div class="name_job">
                <div class="name">Admin</div>
                <!-- <div class="job"><?php echo $status; ?></div> -->
            </div>
            <a href="../admin_sessions/session_end.php">
                <i class='bx bx-log-out' id="log_out"></i>
            </a>
        </li>
    </ul>
</div>
<script src="../js/homepage.js"></script>
<section class="home-section">
    <br>
    <header style="background: #1E5631; padding:10px; color:white">
    <h1 style="margin-left: 32px;">Edit Encyclopedia</h1>
   
        </header>
    <br>

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
        
                <label for="plant_name">PLANT NAME:</label>
                <input type="text" id="plant_name" name="plant_name" required value="<?php echo $plant_name; ?>"><br><br>
                <label for="plant_name">GENUS NAME:</label>
                <input type="text" id="genus_name" name="genus_name" required value="<?php echo $plant_genus_name; ?>"><br><br>
                <label for="plant_name">COMMON NAME:</label>
                <input type="text" id="common_name" name="common_name" required value="<?php echo $common_name; ?>"><br><br>
                <label for="plant_name">PLANT CATEGORY:</label>
                <select id="plant_type" name="plant_type" required>
                    <option value="flowering" <?php if($plant_type == "flowering"){ echo "selected"; }?>>Flowering</option>
                    <option value="s&c" <?php if($plant_type == "s&c"){ echo "selected"; }?>>Succulents & Cacti</option>
                    <option value="fern" <?php if($plant_type == "fern"){ echo "selected"; }?>>Fern</option>
                    <option value="climber" <?php if($plant_type == "climber"){ echo "selected"; }?>>Climbers</option>
                    <option value="fruit" <?php if($plant_type == "fruit"){ echo "selected"; }?>>Fruit Bearing</option>
                    <option value="vegetable" <?php if($plant_type == "vegetable"){ echo "selected"; }?>>Vegetable Bearing</option>
                    <option value="herbal" <?php if($plant_type == "herbal"){ echo "selected"; }?>>Herbal</option>
                    <option value="fungi" <?php if($plant_type == "fungi"){ echo "selected"; }?>>Fungi</option>
                    <option value="carnivorous" <?php if($plant_type == "carnivorous"){ echo "selected"; }?>>Carnivorous</option>
                    <option value="toxic" <?php if($plant_type == "toxic"){ echo "selected"; }?>>Toxic</option>
                    <option value="ornamental" <?php if($plant_type == "ornamental"){ echo "selected"; }?>>Ornamental</option>
                </select><br><br>
                <label for="plant_name">LIGHT REQUIREMENT:</label>
                <input type="text" id="plant_light" name="light" required value="<?php echo $light; ?>"><br><br>
                <label for="plant_name">HEIGHT:</label>
                <input type="text" id="plant_height" name="height" required value="<?php echo $height; ?>"><br><br>
                <label for="plant_name">WIDTH:</label>
                <input type="text" id="plant_width" name="width" required value="<?php echo $width; ?>"><br><br>
                <label for="plant_name">FLOWER COLOR:</label>
                <input type="text" id="flower_color" name="flower_color" required value="<?php echo $flower_color; ?>"><br><br>
                <label for="plant_name">FOLIAGE COLOR:</label>
                <input type="text" id="foliage_color" name="foliage_color" required value="<?php echo $foliage_color; ?>"><br><br>
                <label for="plant_name">SEASON:</label>
                <input type="text" id="season_feat" name="season_ft" required value="<?php echo $season_ft; ?>"><br><br>
                <label for="plant_name">SPECIAL FEATURES:</label>
                <input type="text" id="spec_feat" name="special_ft" required value="<?php echo $special_ft; ?>"><br><br>
                <label for="plant_name">ZONES:</label>
                <input type="text" id="plant_zone" name="zones" required value="<?php echo $zones; ?>"><br><br>
                <label for="plant_name">PROPAGATION:</label><br>
                <textarea id="plant_propa" name="propagation" rows="4" cols="50" required><?php echo $propagation; ?></textarea><br><br>
                <label for="plant_description">DESCRIPTION:</label><br>
                <textarea id="plant_propa" name="description" rows="4" cols="50" required><?php echo $plant_description; ?></textarea><br><br>

                <button name="btnUpdate" class="button">Update</button>    
        </form>   
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

</body>
</html>
